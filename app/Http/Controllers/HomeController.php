<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Content\EloquentPostRepository;
use App\SectionModel;
use App\TestQusetions;
use App\Tests;
use App\User;
use App\UserActivity;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductModel;
use Symfony\Component\Yaml\Tests\A;
use App\Utility;



class HomeController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $post;
    public $user;


    public function __construct(ContentRepository $content)
    {
        $this->post = $content;
//        if (Auth::check()) {
//            $this->middleware('ProfileComplete');
//        }
        //asc

    }

    public function index()
    {

        $sellers = UserProfile::activate()->whereIn('type',[0,1])->has('user')->orderby('id', 'desc')->paginate(4);
        $contents = Content::where('cat_id', '!=', '25')->orderBy('id', 'desc')->paginate(6);

        $products = ProductModel::where('active', 1)->orderBy('id', 'desc')->paginate(10);
        $slides=Utility::where('type',"slider")->orderBy('id', 'desc')->take(4)->get();
        $slider2=Utility::where('type',"slider2")->orderBy('id', 'desc')->take(4)->get();
        $banner2= Utility::where('type',"banner2")->orderBy('id', 'desc')->take(2)->get();
        $lastproduct= ProductModel::orderby('id','desc')->take(6)->get();
        $introduction= Utility::where('type',"introduction")->orderBy('id', 'desc')->first();
        $sliderFirst= Utility::where('type',"sliderFirst")->orderBy('id', 'desc')->take(6)->get();

        $cats = ProductCatModel::where('id', '!=', '25')->orderBy('id', 'desc')->paginate(6);

        $brandsHome = Brand::paginate(15);

        return view('index', compact( 'slides',
            'introduction',
            'sliderFirst',
            'lastproduct',
            'lastproduct',
            'contents',
            'products',
            'banner2',
            'banner2',
            'cats',
            'brandsHome',
            'sellers'
           ));
    }





    public function indexss(Request $request)
    {
        $posts = Post::where('news', '1')->paginate(4);

        if ($request->ajax()) {
            $view = view('data', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('general', compact('posts'));
    }






    public function search(Request $request)
    {
        //$posts = Post::where('intro', 'LIKE', '%' . $request->input . '%')->orderby('id','desc')->paginate(2);
        $users = User::where('username', 'LIKE', '%' . $request->input . '%')->orwhere('name', 'LIKE', '%' . $request->input . '%')->orwhere('family', 'LIKE', '%' . $request->input . '%')->orderby('id', 'desc')->paginate(3);
        $forums = Forum::where('title', 'LIKE', '%' . $request->input . '%')->orderby('id', 'desc')->paginate(2);
        $forumCats = ForumCat::where('title', 'LIKE', '%' . $request->input . '%')->orderby('id', 'desc')->paginate(2);

        if ($request->ajax()) {
            $view = view('search.search', compact('users', 'forums', 'forumCats'))->render();
            return response()->json(['result' => $view]);
        }
        return view('search.search', compact('users', 'forums', 'forumCats'));
    }







    public function sale()
    {
        $slides=Utility::where('type',"slider")->orderBy('id', 'desc')->take(4)->get();
        $banner2= Utility::where('type',"banner2")->orderBy('id', 'desc')->take(2)->get();
        $introduction= Utility::where('type',"introduction")->orderBy('id', 'desc')->first();

        $brandsHome = Brand::paginate(12);
        $sellers = UserProfile::activate()->whereIn('type',[0,1])->has('user')->orderby('id', 'desc')->paginate(4);


        return view('sale', compact('brandsHome', 'slides', 'banner2', 'introduction', 'sellers'));
    }




    public function page($id)
    {
        $content = Content::find($id);

        return view('pages.single', compact('content'));
    }


}
