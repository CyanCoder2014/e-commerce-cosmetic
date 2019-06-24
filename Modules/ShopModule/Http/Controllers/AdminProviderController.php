<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\ProductFiles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
//use  Modules\BlogModule\Contents\Content;
//use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductPackage;
use Modules\ShopModule\Products\Provider;

class AdminProviderController extends Controller
{




    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index()
    {
        $providers = Provider::orderby('id','desc')->paginate(20);

        return View('shopmodule::admin.providers.manages3',[   'providers'=>$providers       ]);
    }
    public function create()
    {
        return view('shopmodule::admin.providers.add');
    }

    public function store(Request $request){

//        return var_dump($request->file_name);
        $validation =[
            'name' => 'required',
            'phone' => 'numeric',
        ];
        $this->validate($request,$validation);

        $provider = new Provider();
        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->logo = $request->logo;
        $provider->save();


        return redirect(route('providers.index'))->with('message', 'تولید کننده   با موفقیت اضافه شد');
    }

    public function edit($id)
    {
        $provider = Provider::find($id);

        return view('shopmodule::admin.providers.edit',compact(
            'provider'
        ));
    }
    public function update(Request $request, $id){

        $validation =[
            'name' => 'required',
            'phone' => 'numeric',
        ];
        $this->validate($request,$validation);

        $provider = Provider::find($id);
        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->logo = $request->logo;
        $provider->save();

        return redirect(route('providers.index'))->with('message', 'تولیدکننده با موفقیت ویرایش شد');
    }


    public function destroy($id){

        Provider::destroy($id);

        return back()->with('message', 'تولید کننده  با موفقیت حذف شد');
    }





}
