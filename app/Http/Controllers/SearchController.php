<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Product;
use App\UserProfile;
use Illuminate\Http\Request;
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
}
