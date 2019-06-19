<?php

namespace Modules\ShopModule\Http\Controllers;


use App\ProductFiles;
use App\SectionModel;
use Modules\ShopModule\Products\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{



    public function __construct()
    {

        if (Auth::check()){
            $this->middleware('ProfileComplete');
        }

    }

    public function download($id){

        $file = ProductFiles::find($id);

        if($file->havAccess())
        {
            $path=$file->file;
            $path_arr=explode('/',$path);
            $filename=$path_arr[count($path_arr)-1];
            $file_path = public_path();
            $file_path= $file_path.$path;
            if (file_exists($file_path))
            {
                // Send Download
                return Response::download($file_path, $filename, [
                    'Content-Length: '. filesize($file_path)
                ]);
            }
            else
            {
                // Error
                exit('Requested file does not exist on our server!');
            }
        }


        return 'Access Denied';
    }
    public function getvideo($id){

        $file = ProductFiles::find($id);

        if($file->havAccess() )
        {
            $path=$file->file;
            $path_arr=explode('/',$path);
            $filename=$path_arr[count($path_arr)-1];
            $file_path = public_path();
            $file_path= $file_path.$path;
            if (file_exists($file_path))
            {
                // Send Download
//                    return Response::make($file_path, $filename, [
//                        'Content-Length: '. filesize($file_path),
//                        'Content-Type:'. "video/mp4"
//                    ]);

//                    $response = Response::make($file_path, 200);
//                    $response->header('Content-Type', "video/mp4");
//                    return $response;

                $fileContents = File::get($file_path);

                $response = Response::make($fileContents, 200);

                $response->header('Content-Type', "video/mp4");

                $i = 0 ;

                return $response;
            }
            else
            {
                // Error
                exit('Requested file does not exist on our server!');
            }
        }

        return 'Access Denied';
    }


    public function listDownload(){

        if(Auth::check()){
            $buyeditem= UserProduct::select('product_id')->where('user_id',Auth::id())->get();
            $product_ids=[];
            foreach ($buyeditem as $item)
                $product_ids[]=$item->product_id;

            $products = ProductModel::whereIn('id',$product_ids)->get();

            return view('shopmodule::buyedlist',compact('products'));


        }
    }







}
