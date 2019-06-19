<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Advertising;
use App\Province;
use App\UserProfile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductModel;
use Modules\ShopModule\Products\Provider;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (isset($request->page) && !empty($request->page))
            $currentPage = $request->page;
        else
            $currentPage = 1;

        if(isset($request->perPage)&& !empty($request->perPage))
            $perPage = $request->perPage;
        else
            $perPage = 20;

        $result = new Collection();
        if (isset($request->search)){
            $products= ProductModel::where('name', 'like', '%' . $request->search . '%')->get();
            $cats= ProductCatModel::where('name', 'like', '%' . $request->search . '%')->get();
            $brands= Brand::where('name', 'like', '%' . $request->search . '%')->get();
            $providers= Provider::where('name', 'like', '%' . $request->search . '%')->get();

            $result = $result->merge($products);
            foreach ($cats as $cat)
                $result = $result->merge($cat->products());
            foreach ($brands as $brand)
                $result = $result->merge($brand->products);
            foreach ($providers as $provider)
                $result = $result->merge($provider->products);

        }

        $products = new Paginator($result->forPage($currentPage, $perPage),$result->count(),$perPage, $currentPage,[
            'path'  => $request->url(),
            'query' => $request->query(),
        ]);
        $products->setPath('/'.$request->path());
        $products->appends($request->except('page'));
//        return $currentPage;
//        $name = 'جستجو - '.$request->search;
        $name = '';

        $advertisings= Advertising::activate()->orderBy('id','desc');
        if (isset($request->brand) && ctype_digit($request->brand))
            $advertisings = $advertisings->where('brand_id',$request->brand);
        if (isset($request->collection) && ctype_digit($request->collection))
            $advertisings = $advertisings->where('collection_id',$request->collection);
        if (isset($request->status) && ctype_digit($request->status))
            $advertisings = $advertisings->where('status',$request->status);
        if (isset($request->province_id) && ctype_digit($request->province_id) && !isset($request->city_id)){
            $province = Province::find($request->province_id);
            if($province){
                $advertisings = $advertisings->whereIn('city_id',$province->cities->pluck('id'));
            }
        }
        if (isset($request->city_id) && ctype_digit($request->city_id))
            $advertisings = $advertisings->where('city_id',$request->city_id);

        if(isset($request->usage) &&isset($request->motor) &&isset($request->accessories) &&isset($request->complexity)
            && isset($request->sex) && isset($request->sex) && isset($request->material) && isset($request->waterproof))
            $advertisings = $advertisings->whereHas('product',function ($query) use ($request){
                if (isset($request->usage) && ctype_digit($request->usage))
                    $query = $query->where('usage',$request->usage);
                if (isset($request->motor) && ctype_digit($request->motor))
                    $query = $query->where('motor',$request->motor);
                if (isset($request->accessories) && ctype_digit($request->accessories))
                    $query = $query->where('accessories',$request->accessories);
                if (isset($request->sex) && ctype_digit($request->sex))
                    $query = $query->where('sex',$request->sex);
                if (isset($request->waterproof) && ctype_digit($request->waterproof))
                    $query = $query->where('waterproof',$request->waterproof);
                if (isset($request->complexity) && is_array($request->complexity))
                    foreach ($request->complexity as $cond)
                    $query = $query->where('complexity','LIKE','%"'.$cond.'"%');
                if (isset($request->material) && is_array($request->material))
                    foreach ($request->material as $cond)
                    $query = $query->where('material','LIKE','%"'.$cond.'"%');
                return $query;
            });
        if (isset($request->seller) && $request->seller == 0)
            $advertisings->has('profile');
        else
            $advertisings->doesntHave('profile');

        $advertisings=  $advertisings->paginate(20);
        $provinces =  Province::all();





        $profilesellers = UserProfile::orderBy('id','desc')->has('user');//->paginate(10);
//        if (isset($request->type) && ctype_digit($request->type))
//            $profilesellers = $profilesellers->where('type',$request->type);
//        if (isset($request->province_id) && ctype_digit($request->province_id) && !isset($request->city_id)){
//            $province = Province::find($request->province_id);
//            if($province){
//                $profilesellers = $profilesellers->whereIn('country_id',$province->cities->pluck('id'));
//            }
//        }
//        if (isset($request->city_id) && ctype_digit($request->city_id))
//            $profilesellers = $profilesellers->where('country_id',$request->city_id);

        $profilesellers = $profilesellers->paginate(10);





        return view('shopmodule::search',compact('products','name','advertisings','provinces','profilesellers'));


    }


    public function brand(Request $request,$url){

        $array=explode('-',$url);

        if(isset($request->perPage)&& !empty($request->perPage))
            $perPage = $request->perPage;
        else
            $perPage = 20;
        $provinces=Province::all();
        if(isset($array[1]) && ctype_digit($array[1]))
        {

            $products = ProductModel::where('brand_id',$array[1]);
            $brand = Brand::findOrFail($array[1]);
            if (isset($request->search)){
                $products->where('name', 'like', '%' . $request->search . '%');
            }
            $products = $products->paginate($perPage);
            $products->appends($request->except('page'));
            $name = $brand;

//            $advertisings=Advertising::where('brand_id', $brand->id)->paginate(20);
            $advertisings=Advertising::activate()->where('brand_id', $brand->id)->paginate(20);

            return view('shopmodule::search',compact('products','name','advertisings','provinces'));

        }
        else
            return view('errors.404');

    }
    public function category($url){


//        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
//        $utility=array();
//        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();


        $categories = ContentCat::orderby('id', 'desc')->paginate(70);


        $cat = ContentCat::find($url);

        $contents = Content::where('cat_id',$url)->orderby('id','desc')->paginate(10);


        $advertisings=Advertising::activate()->paginate(20);


        return View('shopmodule::category', [

            'contents' => $contents,
            'categories' => $categories,
            'cat'=>$cat,
            'advertisings'=>$advertisings,
        ]);

    }

//    public function category(Request $request,$url){
//
//        $array=explode('-',$url);
//
//        if(isset($request->perPage)&& !empty($request->perPage))
//            $perPage = $request->perPage;
//        else
//            $perPage = 20;
//
//        if(isset($array[1]) && ctype_digit($array[1]))
//        {
//
//            $products = ProductModel::where('pc_id',$array[1]);
//            $cat = ProductCatModel::select('name')->findOrFail($array[1]);
//            if (isset($request->search)){
//                $products->where('name', 'like', '%' . $request->search . '%');
//
//            }
//            $products = $products->paginate($perPage);
//            $name = 'دسته بندی - '.$cat->name;
//            $products->appends($request->except('page'));
//            return view('shopmodule::category',compact('products','name'));
//
//        }
//        else
//            return view('errors.404');
//
//    }


    public function list(){


//        $array=explode('-',$url);
//        if(isset($request->perPage)&& !empty($request->perPage))
//            $perPage = $request->perPage;
//        else
//            $perPage = 20;

//
//        if(isset($array[1]) && ctype_digit($array[1]))
//        {
//
//            $products = ProductModel::where('pc_id',$array[1]);
//            $cat = ProductCatModel::select('name')->findOrFail($array[1]);
//            if (isset($request->search)){
//                $products->where('name', 'like', '%' . $request->search . '%');
//
//            }
//            $products = $products->paginate(20);
//            $name = 'دسته بندی - '.$cat->name;
//            $products->appends($request->except('page'));
//            return view('shopmodule::list',compact('products','name'));
//        }
//        else
//            return view('errors.404');

        $brands=Brand::orderBy('id', 'desc')->paginate(6);
        return view('shopmodule::list',compact('brands'));
    }




    public function collection(Request $request,$url){

        $array=explode('-',$url);

        if(isset($request->perPage)&& !empty($request->perPage))
            $perPage = $request->perPage;
        else
            $perPage = 20;
        $provinces = Province::all();
        if(isset($array[1]) && ctype_digit($array[1]))
        {

            $products = ProductModel::where('collection_id',$array[1]);
            $provider = ProductCatModel::select('name')->findOrFail($array[1]);
            if (isset($request->search)){
                $products->where('name', 'like', '%' . $request->search . '%');

            }


            $products = $products->paginate($perPage);
            $name = ' کالکشن - '.$provider->name;
            $products->appends($request->except('page'));


            $advertisings=Advertising::activate()->paginate(20);



            return view('shopmodule::search',compact('products','name','advertisings','provinces'));

        }
        return view('errors.404');

    }




    public function provider(Request $request,$url){

        $array=explode('-',$url);

        if(isset($request->perPage)&& !empty($request->perPage))
            $perPage = $request->perPage;
        else
            $perPage = 20;
        $provinces = Province::all();

        if(isset($array[1]) && ctype_digit($array[1]))
        {

            $products = ProductModel::where('provider_id',$array[1]);
            $provider = ProductCatModel::select('name')->findOrFail($array[1]);
            if (isset($request->search)){
                $products->where('name', 'like', '%' . $request->search . '%');

            }
            $products = $products->paginate($perPage);
            $name = 'تامین کننده - '.$provider->name;
            $products->appends($request->except('page'));

            $advertisings=Advertising::activate()->paginate(20);



            return view('shopmodule::search',compact('products','name','advertisings','provinces'));

        }
        return view('errors.404');

    }
}
