<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller as Controller;

use Illuminate\Http\Request;

use Modules\ShopModule\Products\Brand;

class AdminBrandController extends Controller
{




    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index()
    {
        $brands = Brand::orderby('id','desc')->paginate(20);

        return View('shopmodule::admin.brands.manages3',[   'brands'=>$brands       ]);
    }
    public function create()
    {
        return view('shopmodule::admin.brands.add');
    }

    public function store(Request $request){

//        return var_dump($request->file_name);
        $validation =[
            'name' => 'required',
        ];
        $this->validate($request,$validation);

        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->logo = $request->logo;
        $brand->founder = $request->founder;
        $brand->country = $request->country;
        $brand->year = $request->year;
        $brand->variety = $request->variety;
        $brand->site = $request->site;
        $brand->company = $request->company;
        $brand->classification = $request->classification;
        $brand->image = $request->image;

        $brand->save();


        return redirect(route('brands.index'))->with('message', 'برند  با موفقیت اضافه شد');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('shopmodule::admin.brands.edit',compact(
            'brand'
        ));
    }
    public function update(Request $request, $id){

        $validation =[
            'name' => 'required',
//            'phone' => 'numeric',
        ];
        $this->validate($request,$validation);

        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->logo = $request->logo;
        $brand->founder = $request->founder;
        $brand->country = $request->country;
        $brand->year = $request->year;
        $brand->variety = $request->variety;
        $brand->site = $request->site;
        $brand->company = $request->company;
        $brand->classification = $request->classification;
        $brand->image = $request->image;

        $brand->save();

        return redirect(route('brands.index'))->with('message', 'برند با موفقیت ویرایش شد');
    }


    public function destroy($id){

        Brand::destroy($id);

        return back()->with('message', 'برند با موفقیت حذف شد');
    }





}
