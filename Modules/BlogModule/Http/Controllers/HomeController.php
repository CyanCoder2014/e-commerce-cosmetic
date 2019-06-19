<?php

namespace Modules\BlogModule\Http\Controllers;


use App\SectionModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use  Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
use Modules\BlogModule\Contents\PostComment;
use Modules\ShopModule\Products\ProductModel;

class HomeController extends Controller
{


    public $post;
    public $user;


    public function __construct()
    {
//        $this->post = $content;
//        if (Auth::check()){
//            $this->middleware('ProfileComplete');
//    }

    }


    public function index()
    {

        $contents = Content::orderBy('id', 'desc')->paginate(10);
//        $cat1 = ContentCat::where('state', '1')->first();
//        $contents1 = Content::where('cat_id', $cat1->id)->orderBy('state', 'desc')->paginate(6);

        $product = ProductModel::orderBy('id', 'desc')->paginate(6);

        return view('blogmodule::index-new', compact('contents','product'
        ));
    }


    public function search(Request $request)
    {
        //$posts = Post::where('intro', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(2);
        $producers = Content::where('title', 'LIKE', '%' . $request->input . '%')->orwhere('intro', 'LIKE', '%' . $request->input . '%')->orderby('id', 'desc')->paginate(30);

//
//        if ($request->ajax()) {
//            $view = view('search.search', compact('users', 'forums', 'forumCats'))->render();
//            return response()->json(['result' => $view]);
//        }

        return view('producer.list', compact('producers'));
    }


    public function show($id)
    {

        $dataDetail = explode('-', $id);
        $dataId = $dataDetail[1];

        $content = Content::find($dataId);
        if(!$content->active[App::getLocale()])
            return view('errors.404');
        $this->setInspect($dataId,'article');
        $contentCats = ContentCat::where('parent_id', '0')->orderby('id', 'desc')->paginate(30);

        $contentsV = Content::orderBy('view', 'desc')->paginate(3);

        $contentsL = Content::orderBy('created_at', 'desc')->where('id','!=',$dataId)->paginate(3);
        $contentsR = Content::where('cat_id', $dataId)->orderBy('id', 'desc')->paginate(3);

        $comments = PostComment::where('post_id',$dataId)->where('approved',1)->get();

        if($content->related_products)
            $products = ProductModel::whereIn('id',$content->related_products)->get();
        else
            $products=[];



        $viewCount = Content::where('id', $dataId)->update(array(
            'view' => Content::find($dataId)->view + 1,
        ));

        return view('blogmodule::single3', compact('content' ,
            'contentCats',
            'contentsV',
            'contentsL',
            'contentsR',
            'comments',
            'products'
        ));
    }



    public function category($id)
    {
        $dataDetail = explode('-', $id);
        $dataId = $dataDetail[1];
        $cat = ContentCat::find($dataId);

        $cats = ContentCat::where('id', '!=', '25')->orderby('id', 'desc')->paginate(20);

        if($cat){
            $product = ProductModel::orderBy('id', 'desc')->paginate(6);
            $contents = Content::where('cat_id', $dataId)->orderby('id', 'desc')->paginate(20);

            return view('blogmodule::category', compact(
                'contents',
                'product',
                'cats',
                'cat'
            ));
        }
        else
            return view('errors.404');

    }


    public function magazine()
    {

        $cat = ContentCat::orderBy('id', 'desc')->first();


            $product = ProductModel::orderBy('id', 'desc')->paginate(6);
            $contents = Content::where('cat_id', '!=', '25')->orderby('id', 'desc')->paginate(20);
        $cats = ContentCat::where('id', '!=', '25')->orderby('id', 'desc')->paginate(20);


        return view('blogmodule::category', compact(
                'contents',
                'product',
                'cats',
                'cat'
            ));


    }


    public function categoryList()
    {
        $contents = ContentCat::where('news', '1')->orderby('id', 'desc')->paginate(20);
        $productCats = ContentCat::orderby('id', 'desc')->paginate(15);

        return view('blogmodule::category', compact('contents', 'productCats'));
    }





}
