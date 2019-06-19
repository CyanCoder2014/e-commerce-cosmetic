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
use Modules\ShopModule\Products\Collection;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductPackage;
use Modules\ShopModule\Products\Provider;

class AdminCollectionController extends Controller
{




    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index()
    {
        $providers = Collection::orderby('id','desc')->paginate(20);

        return View('shopmodule::admin.collections.manages3',[   'providers'=>$providers       ]);
    }
    public function create()
    {
        $brands = Brand::get();

        return view('shopmodule::admin.collections.add',compact(
            'brands'
        ));
    }

    public function store(Request $request){

//        return var_dump($request->file_name);
        $validation =[
            'name' => 'required',
//            'phone' => 'numeric',
        ];
        $this->validate($request,$validation);

        $provider = new Collection();
        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->brand_id = $request->brand_id;
//        $provider->address = $request->address;
        $provider->image = $request->image;
        $provider->save();


        return redirect(route('collections.index'))->with('message', 'کالکشن   با موفقیت اضافه شد');
    }

    public function edit($id)
    {
        $provider = Collection::find($id);


        $brands = Brand::get();

        return view('shopmodule::admin.collections.edit',compact(
            'provider','brands'
        ));
    }
    public function update(Request $request, $id){

        $validation =[
            'name' => 'required',
//            'phone' => 'numeric',
        ];
        $this->validate($request,$validation);

        $provider = Collection::find($id);
        $provider->name = $request->name;
        $provider->description = $request->description;
        $provider->brand_id = $request->brand_id;
//        $provider->address = $request->address;
        $provider->image = $request->image;
        $provider->save();

        return redirect(route('collections.index'))->with('message', 'کالکشن با موفقیت ویرایش شد');
    }


    public function destroy($id){

        Collection::destroy($id);

        return back()->with('message', 'کالکشن  با موفقیت حذف شد');
    }





}
