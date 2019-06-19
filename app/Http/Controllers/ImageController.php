<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCrop()
    {
        return view('admin.image.imageCrop');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageCropPost(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.jpg';
        $path = public_path() . "/photos/shares/" . $image_name;



        file_put_contents($path, $data);
        if ($request->logo == 1){
            $img = Image::make($path); //your image I assume you have in public directory
            $watermark = Image::make(public_path('watermark.png'));
            $watermark->widen($img->width()/10)->opacity(80);
            $img->insert($watermark, 'bottom-right', 10, 10); //insert watermark in (also from public_directory)
            $img->save($path); //save created image (will override old image)
        }



        return response()->json("/photos/shares/" . $image_name);
    }
}