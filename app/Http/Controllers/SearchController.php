<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Agency;
use App\Product;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\BlogModule\Contents\Content;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\Collection;

class SearchController extends Controller
{
    public function ajax(Request $request){
        $this->validate($request,[
            'q' => 'required|string|max:255'
        ]);
        $result=[];

        $result =[];
        $products = Product::search($request->q)
            ->take(5)
            ->get();
        foreach ($products as $product){
            $result[]= [
                'name' => $product->name,
                'url' => $product->link(),
                'type' => 'محصول',
            ];
        }
        $brands = Brand::search($request->q)
            ->take(5)
            ->get();
        foreach ($brands as $brand){
            $result[]= [
                'name' => $brand->name,
                'url' => $brand->link(),
                'type' => 'برند',
            ];
        }
        $collections = Collection::search($request->q)
            ->take(5)
            ->get();
        foreach ($collections as $collection){
            $result[]= [
                'name' => $collection->name,
                'url' => $collection->link(),
                'type' => 'کالکشن',
            ];
        }
        $contents = Content::search($request->q)
            ->take(5)
            ->get();
        foreach ($contents as $content){
            $result[]= [
                'name' => $content->title,
                'url' => $content->link(),
                'type' => 'بلاگ',
            ];
        }
        $contents = Advertising::activate()->search($request->q)
            ->take(5)
            ->get();
        foreach ($contents as $content){
            $result[]= [
                'name' => $content->title,
                'url' => $content->link(),
                'type' => 'آگهی',
            ];
        }
        $contents = UserProfile::activate()->search($request->q)
            ->take(5)
            ->get();
        foreach ($contents as $content){
            $result[]= [
                'name' => $content->company,
                'url' => $content->link(),
                'type' => 'فروشندگان و تعمیرکاران',
            ];
        }



        return json_encode($result);

    }

    public  function agencies(Request $request){
//        $this->validate($request,[
//           'city_id' => 'exists:cities,id',
//           'province_id' => 'exists:provinces,id'
//        ]);
        $Agencies = Agency::orderBy('id','desc');
        if (isset($request->agency_id)  and ctype_digit($request->agency_id))
            $Agencies = $Agencies->where('id',$request->agency_id);
        if (isset($request->city_id)  and ctype_digit($request->city_id))
            $Agencies = $Agencies->where('city_id',$request->city_id);
        if (isset($request->province_id) and ctype_digit($request->province_id))
            $Agencies = $Agencies->where('province_id',$request->province_id);
        $Agencies = $Agencies->paginate(15);
        return view('Agency.search',compact('Agencies'));
    }
}
