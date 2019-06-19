<?php

namespace App\Http\Controllers;

use Modules\BlogModule\Contents\Content;
use App\Tests;
use Illuminate\Http\Request;

use Modules\ShopModule\Products\ProductModel;

class SitemapController extends Controller
{

    public function sitemap(){
        $products = ProductModel::orderBy('id', 'desc')->paginate(100);
        $tests = Tests::orderBy('id', 'desc')->paginate(100);
        $contents = Content::orderBy('id', 'desc')->paginate(100);

        return response()->view('sitemap', [
            'products' => $products,
            'tests' => $tests,
            'contents' => $contents,
        ])->header('Content-Type', 'text/xml');
    }



}
