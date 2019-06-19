<?php

namespace Modules\ShopModule\Http\Controllers;


use App\ProductFiles;
use App\SectionModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use  Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductComment;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;
use Modules\ShopModule\Products\ProductPackage;
use Modules\ShopModule\Products\UserProduct;

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


        $postsNews = ContentCat::where('parent_id', '0')->orderby('id', 'desc')->paginate(12);


        $postsNew = Content::where('news', '1')->orderby('id', 'desc')->paginate(4);
        $postsMost = Content::where('news', '3')->orderby('id', 'desc')->paginate(4);

        $text = SectionModel::where('id', '5')->first();
        $text1 = SectionModel::where('id', '6')->first();
        $text2 = SectionModel::where('id', '7')->first();

        return view('index', compact('producers', 'postsNews', 'postsNew', 'postsMost', 'productCats' , 'cities'));
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

        $product = ProductModel::find($dataId);
        if (!$product)
            return view('errors.404');
        $this->setInspect($dataId,'product');
//        $contentCats = ProductCatModel::where('parent_id', '0')->orderby('id', 'desc')->paginate(30);

        $related = ProductModel::where('pc_id', $product->pc_id)->where('id','!=',$dataId)->paginate(3);
//
//        $contentsL = ProductModel::orderBy('created_at', 'desc')->paginate(4);
//        $contentsR = Content::where('cat_id', $dataId)->orderBy('id', 'desc')->paginate(4);

//        $productdetailsQ= ProductDetailModel::where('product_id',$product->id)->join('product_detail_group','product_detail_group.id','product_detail.group_id')->select('product_detail_group.title as groupname','product_detail_group.description as groupdescription','product_detail.*')->orderBy('product_detail.group_id','desc')->get();
        $productdetails=ProductDetailModel::where('product_id',$product->id)->get();
        $groupid=array();
        foreach ($productdetails as $detail){
            $groupid[]=$detail->group_id;
        }
        $ProductFile = ProductFiles::where('Product_id',$dataId)->get();
        $groups=ProductDetailGroupModel::whereIn('id',$groupid)->get();
//        return var_dump($groups);
//        $viewCount = ProductModel::where('id', $dataId)->update(array(
//            'view' => ProductModel::find($dataId)->view + 1,
//        ));
        $comments= ProductComment::where('product_id',$product->id)->where('approved',1)->where('parent_id',0)->get();
        $packages= ProductPackage::where('product_id',$product->id)->get();
        if(Auth::check() && count(UserProduct::where('user_id',Auth::id())->where('product_id',$dataId)->get())>0)
            $buyed=true;
        else
            $buyed=false;
        return view('shopmodule::single2', compact('product' ,
            'groups', 'productdetails', 'related','buyed','ProductFile','comments','packages'));
    }



    public function category($id)
    {
        $dataDetail = explode('-', $id);
        $dataId = $dataDetail[1];


        $cat = ProductCatModel::find($dataId);
        $contentCat = ProductCatModel::where('parent_id', $dataId)->orderby('id', 'desc')->paginate(15);

        $contents = ProductModel::where('pc_id', $dataId)->orderby('id', 'desc')->paginate(20);
        $contentCats = ProductCatModel::where('parent_id', '0')->orderby('id', 'desc')->paginate(30);

//        $contentsV = ProductModel::orderBy('view', 'desc')->paginate(4);

        return view('shopmodule::category', compact('contents', 'contentCats', 'contentCat', 'cat', 'contentsV'));
    }




    public function categoryList()
    {
        $contents = ContentCat::where('news', '1')->orderby('id', 'desc')->paginate(20);
        $productCats = ContentCat::orderby('id', 'desc')->paginate(15);

        return view('ShopModule::category', compact('contents', 'productCats'));
    }





}
