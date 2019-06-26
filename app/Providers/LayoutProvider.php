<?php

namespace App\Providers;

use App\Menu;
use App\Province;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\Utility;
use Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\ProductCatModel;

class LayoutProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $cats = ContentCat::where('id', '!=', '25')->orderBy('id', 'desc')->paginate(6);
//
        $contact=Utility::where('type','contact')->orderBy('id', 'desc')->first();
        $setting=Utility::where('type','setting')->orderBy('id', 'desc')->first();
//        $blogs= Content::orderBy('id', 'desc')->take(3)->get();
        $categories = ProductCatModel:: whereNull('parent_id')->get();
//        $categories = ContentCat::paginate(10);
//        $footer_title=Utility::where('type',"footer_title")->first();
//        $footer_1=Utility::where('type',"footer_1")->orderBy('id', 'desc')->get();
//        $footer_2=Utility::where('type',"footer_2")->orderBy('id', 'desc')->get();
//        $footer_3=Utility::where('type',"footer_3")->orderBy('id', 'desc')->get();
//        $footer_4=Utility::where('type',"footer_4")->orderBy('id', 'desc')->get();
//        $banners=Utility::where('type',"banners")->orderBy('id', 'desc')->first();
//        $brands=Brand::paginate(100);
        $provinces=Province::all();


        view()->share([
            'contact' => $contact,
//            'banners' => $banners,
            'setting' => $setting,
//            'blogs' => $blogs,
            'categories' => $categories,
//            'footer_title' => $footer_title,
//            'footer_1' => $footer_1,
//            'footer_2' => $footer_2,
//            'footer_3' => $footer_3,
//            'footer_4' => $footer_4,
//            'cats' => $cats,
//            'brands' => $brands,
            'provinces' => $provinces,

        ]);


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
