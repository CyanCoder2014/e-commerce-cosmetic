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
use Modules\ShopModule\Products\ShippingProduct;

class AdminController extends Controller
{


    public $product;
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }









    public function productList()
    {
        $products = ProductModel::orderby('id','desc')->paginate(20);
//        $productCats = ProductCatModel::orderby('id','desc')->paginate(100);
//        $detailgroup= ProductDetailGroupModel::orderby('id','desc')->get();
//        $Pfiles = ProductFiles::all();
//        $pid=array();
//        foreach ($products as $product)
//            $pid[]=$product->id;
//        $productsDetail=ProductDetailModel::whereIn('product_id',$pid)->orderby('product_id','desc')->get();
//        return var_dump($detailgroup);
        return View('shopmodule::admin.products.manages3',[   'products'=>$products,
//                                                                'productCats'=>$productCats,
//                                                                'detailgroup' => $detailgroup,
//                                                                'productsDetail' => $productsDetail,
//                                                                'products_file' => $Pfiles,
            ]);
    }
    public function productAddPage()
    {
        $productCats = ProductCatModel::orderby('id','desc')->get();
        $detailgroup= ProductDetailGroupModel::orderby('id','desc')->get();
        $brands= Brand::orderby('id','desc')->get();
        $providers= Provider::orderby('id','desc')->get();
        return view('shopmodule::admin.products.add',compact('productCats','detailgroup','brands','providers'));
    }

    public function productAdd(Request $request){

//        return var_dump($request->file_name);
        $validation =[
//            'active_fa' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|digits_between:0,100',
            'name_fa' => 'required|max:255',
            'description_fa' => 'required',
            'details_fa' => 'required',
        ];
        $this->validate($request,$validation);
//        return var_dump($request->all());
//        $product = new ProductModel($request->all());

        $product = new ProductModel();
        $active=[];
        $product->active_fa = ($request->input('active_fa'))? true : false ;
        $product->active_en = ($request->input('active_en'))? true : false ;
        $product->active_ar = ($request->input('active_ar'))? true : false ;

//        return var_dump($request->all());
//        $image = [];
//        if ($request->Images != null) {
//            $file=$request->file('Images');
//            foreach ($request->Images as $key => $img)
//                if($img){
//                $imageName = time() . '.' . $img->getClientOriginalName();
//                $img->move(public_path('post-img'), $imageName);
//                $image[] = 'post-img/'.$imageName;
//            }
//
//        }


        if(isset($request->Images))
            $product->image = $request->Images;
        else
            $product->image = [];

//        if ($request->file('file')) {
//            $file=$request->file('file');
//            $FileName = time() . '.' . $file->getClientOriginalName();
//            $file->move(public_path('files/shares'), $FileName);
//            $product->file = 'files/shares/'.$FileName;
//
//
//
//        }

        $product->file = $request->file;


        $product->name_fa = $request->name_fa;
        $product->name_en = $request->name_en;
        $product->name_ar = $request->name_ar;


        $product->description_fa = $request->description_fa;
        $product->description_en = $request->description_en;
        $product->description_ar = $request->description_ar;

        $product->details_fa = $request->details_fa;
        $product->details_en = $request->details_en;
        $product->details_ar = $request->details_ar;
       

        if ($request->discount == null) {
            $product->discount = '0';
        }else {$product->discount = $request->discount; };

        if ($request->price == null) {
            $product->price = '0';
        }else {$product->price = $request->price; };



        $product->state = $request->state;
        $product->pc_id = $request->pc_id;

        $product->user_id = Auth::id();
        $product->weight =$request->weight;
        $product->dimensions =$request->dimensions;
        $product->brand_id =$request->brand_id;
        $product->provider_id =$request->provider_id;
        $product->quantity =$request->quantity;
        $product->special =($request->input('special'))? true : false;

        $product->save();
        ////////////////////////****** shipping *******//////////////////////////////
        if(isset($request->shipping_list))
            foreach ($request->shipping_list as $shipping){
                $new = new ShippingProduct();
                $new->shipping_id = $shipping;
                $new->product_id = $product->id;
                $new->save();

            }
        /////////////////////////////////////////////////////////////////////////////
        if($request->input('file_file'))
            foreach ($request->input('file_file') as  $key => $fileseq)
            {
                if ($request->input('file_name.'.$key) == null )
                    return back()->with('message','فایل های محصول باید نام داشته باشند');
//                $file=$request->file('file_file.'.$key);
//                $imageName = $file->getClientOriginalName();
//                $file->move(storage_path('file'), $imageName);
//                $FileName =  $file->getClientOriginalName();
                $Pfile = new ProductFiles;
//                $Pfile->file = 'file/'.$FileName;
                $Pfile->file =$request->input('file_file.'.$key);
                $Pfile->name = $request->input('file_name.'.$key);
                $Pfile->type = $request->input('file_type.'.$key);
                $Pfile->time = $request->input('file_time.'.$key);
                $Pfile->product_id = $product->id;
                if ($Pfile->time == null)
                    $Pfile->time='نامشخص';
                $Pfile->save();
            }

        $detail_price=$request->input('detail_price');
        for ($i=0; $request->input('detail_name.'.$i);$i++)
        {
            if (! $request->input('detail_description.'.$i) )
                return back()->with("پر کردن توضیح مشخصات الزامی است ");
            $detail= new ProductDetailModel();
            $detail->product_id=$product->id;
            $detail->title=$request->input('detail_name.'.$i);
            $detail->description=$request->input('detail_description.'.$i);
            $detail->group_id=$request->input('detail_price.'.$i);
            $detail->save();
        }
        ///////////////////////////////// package /////////////////////////////////////
        if($request->input('package_name')){
            foreach ($request->input('package_desc') as $index => $pname){
                if (!$request->input('package_desc.'.$index))
                    return back()->with('message',"پر کردن توضیح فارسی پکیج الزامی است ");
                if (!$request->input('package_name.'.$index) )
                    return back()->with('message',"پر کردن نام فارسی پکیج الزامی است ");

                $package = new ProductPackage();
                $package->product_id = $product->id;
//                $package->name = $request->package_name[$index];
//                $package->description = $request->package_desc[$index];
                $package->name=$request->input('package_name.'.$index);
                $package->description=$request->input('package_desc.'.$index);
                $package->image = $request->package_image[$index];
                $package->product_details = [];
                $package->price=0;
                $package->save();



            }

        }

        //////////////////////////////////  end    ////////////////////////////////////////

        return redirect(route('product.index'))->with('message', 'محصول  با موفقیت اضافه شد');
    }

    public function productEdit($id)
    {
        $product = ProductModel::find($id);
        $productCats = ProductCatModel::orderby('id','desc')->get();
        $detailgroup= ProductDetailGroupModel::orderby('id','desc')->get();
        $productsDetail=ProductDetailModel::where('product_id',$id)->get();
        $products_file = ProductFiles::where('product_id',$id)->get();
        $products_package = ProductPackage::where('product_id',$id)->get();
        $brands= Brand::orderby('id','desc')->get();
        $providers= Provider::orderby('id','desc')->get();
        $shippings = ShippingProduct::where('product_id',$product->id)->get();
        return view('shopmodule::admin.products.edit',compact(
            'productCats',
            'detailgroup',
            'product',
            'productsDetail',
            'products_file',
            'products_package',
            'brands',
            'shippings',
            'providers'
        ));
    }
    public function productUpdate(Request $request, $id){

//        return var_dump($request->package_details);
        $validation =[
//            'active_fa' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|digits_between:0,100',
            'name_fa' => 'required|max:255',
            'description_fa' => 'required',
            'details_fa' => 'required',
        ];
        $this->validate($request,$validation);
//        return var_dump($request->all());
//        $product = new ProductModel($request->all());


//        $image=array();
////        return var_dump($request->all());
//        if ($request->privious_images != null)
//        foreach ($request->privious_images as $img)
//            $image[] =$img;
//        if ($request->Images != null) {
//            $file=$request->file('Images');
////            return var_dump($request->file('Images'));
//            foreach ($request->Images as $key => $img)
//                if ($img){
//                $imageName = time() . '.' . $file[$key]->getClientOriginalName();
//                $img->move(public_path('post-img'), $imageName);
//                $FileName = time() . '.' . $file[$key]->getClientOriginalName();
//                $image[] = 'post-img/'.$FileName;
//            }
//
//        }

        $delete_id =[] ;
        foreach(ProductFiles::select('id')->where('product_id',$id)->get() as $pfile)
            $delete_id[]=$pfile->id;
        if($request->input('pre_file_type'))
            foreach ($request->input('pre_file_type') as $key => $fid)
            {

                if ($request->input('pre_file_name.'.$key) == '' )
                    return back()->with('message','فایل های محصول باید نام داشته باشند');
                $file= ProductFiles::find($key);
                $file->type=$request->input('pre_file_type.'.$key);
                $file->name = $request->input('pre_file_name.'.$key);
                $file->time=$request->input('pre_file_time.'.$key);
                $file->file=$request->input('pre_file_file.'.$key);
                if ($file->time == null)
                    $file->time='نامشخص';
                $file->save();

                $index=array_search($key, $delete_id);
                unset($delete_id[$index]);


            }


        ProductFiles::destroy($delete_id); // delete what user delete

        if($request->input('file_file'))
            foreach ($request->input('file_file') as  $key => $fileseq)
            {
                if ($request->input('file_name.'.$key) == null )
                    return back()->with('message','فایل های محصول باید نام داشته باشند');
                if ($request->input('file_file.'.$key) == null )
                    return back()->with('message','فایل های محصول باید فایل داشته باشند');
//                $file=$request->file('file_file.'.$key);
//                $FileName = time() . $file->getClientOriginalName();
//                $file->move(storage_path('file'), $FileName);
                $new = new ProductFiles;
                $new->file =$request->input('file_file.'.$key);
                $new->name = $request->input('file_name.'.$key);
                $new->type = $request->input('file_type.'.$key);
                $new->time = $request->input('file_time.'.$key);
                if ($new->time == null)
                    $new->time='نامشخص';
                $new->product_id = $id;
                $new->save();

            }


        $product = ProductModel::findOrFail($id);
        $FileName='';
//        if ($request->file('file')) {
//            $file=$request->file('file');
//            $FileName = time() . '.' . $file->getClientOriginalName();
//            $file->move(public_path('files/shares'), $FileName);
//            $product->file = 'files/shares/'.$FileName;
//
//
//
//        }



        $product->file = $request->file;
        $product->active_fa = ($request->input('active_fa'))? true : false ;
        $product->active_en = ($request->input('active_en'))? true : false ;
        $product->active_ar = ($request->input('active_ar'))? true : false ;




        $product->name_fa = $request->name_fa;
        $product->name_en = $request->name_en;
        $product->name_ar = $request->name_ar;


        $product->description_fa = $request->description_fa;
        $product->description_en = $request->description_en;
        $product->description_ar = $request->description_ar;

        $product->details_fa = $request->details_fa;
        $product->details_en = $request->details_en;
        $product->details_ar = $request->details_ar;

        if(isset($request->Images))
            $product->image = $request->Images;
        else
            $product->image = [];
        $product->pc_id = $request->pc_id;
        $product->discount = $request->discount;
        $product->price = $request->price;
        $product->user_id =$request->user_id;
        $product->weight =$request->weight;
        $product->dimensions =$request->dimensions;
        $product->brand_id =$request->brand_id;
        $product->provider_id =$request->provider_id;
        $product->quantity =$request->quantity;
        $product->special =($request->input('special'))? true : false;

        $product->save();
        ////////////////////////****** shipping *******//////////////////////////////
        ShippingProduct::where('product_id',$product->id)->delete();
        if(isset($request->shipping_list))
            foreach ($request->shipping_list as $shipping){
                $new = new ShippingProduct();
                $new->shipping_id = $shipping;
                $new->product_id = $product->id;
                $new->save();

            }
        /////////////////////////////////////////////////////////////////////////////


        //////////////////////// product details ////////////////////////////////
        $detail_price= [];
        $previous_details=ProductDetailModel::where('product_id',$id)->get();
        $detail_price=$request->input('detail_price');
        for ($i=0; $request->input('detail_name.'.$i);$i++)
        {
            if (!$request->input('detail_description.'.$i))
                return back()->with('message',"پر کردن توضیح مشخصات الزامی است ");
            $detail =  null;
            if($request->detail_id[$i] == 0)
                $detail = new ProductDetailModel();
            else{
                foreach ($previous_details as $key => $olddetails)
                    if($request->detail_id[$i] == $olddetails->id){
                        $detail = $olddetails;
                        unset($previous_details[$key]);
                        break;
                    }
//                $detail = ProductDetailModel::find($request->detail_id[$i]);

            }
            if($detail !=  null){
                $detail->product_id=$id;
                $detail->title=$request->input('detail_name.'.$i);
                $detail->description=$request->input('detail_description.'.$i);
//                $detail->title=$detail_name[$i];
//                $detail->description=$detail_description[$i];
                $detail->group_id=$request->input('detail_price.'.$i);
                $detail->save();
                $detail_price[$detail->id]=$detail->group_id;
            }

        }
//        return var_dump($detail_price);
        foreach ($previous_details as $olddetails)
            $olddetails->delete();
        ///////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////// package /////////////////////////////////////
        if($request->input('package_name')){
            $previous_package = ProductPackage::where('product_id',$id)->get();
            foreach ($request->input('package_desc') as $index => $pname){
                if (!$request->input('package_desc.'.$index))
                    return back()->with('message',"پر کردن توضیح فارسی پکیج الزامی است ");
                if (!$request->input('package_name.'.$index) )
                    return back()->with('message',"پر کردن نام فارسی پکیج الزامی است ");
                $package = null;
                if($request->package_id[$index] == 0)
                    $package = new ProductPackage();
                else{
                    foreach ($previous_package as $key => $oldpackage)
                        if($request->package_id[$index] == $oldpackage->id){
                            $package = $oldpackage;
                            unset($previous_package[$key]);
                            break;
                        }
                }

                if($package != null){
                    $package->product_id = $id;
//                    $package->name = $request->package_name[$index];
//                    $package->description = $request->package_desc[$index];
                    $package->name=$request->input('package_name.'.$index);;
                    $package->description=$request->input('package_desc.'.$index);
                    if(isset($request->package_details[$index]))
                        $package->product_details = $request->package_details[$index];
                    else
                        $package->product_details = [];
                    $package->image = $request->package_image[$index];
                    $price=0;
                    if(isset($request->package_details[$index]))
                    foreach ($request->package_details[$index] as $detail_id)
                        $price += $detail_price[$detail_id];
                    $package->price=$price;
                    $package->save();


                }
            }
            foreach ($previous_package as $key => $oldpackage)
                $oldpackage->delete();
        }

        //////////////////////////////////  end    ////////////////////////////////////////

        return redirect(route('product.index'))->with('message', 'محصول با موفقیت ویرایش شد');
    }


    public function productDelete($id){

        ProductDetailModel::where('product_id',$id)->delete();
        ProductModel::destroy($id);

        return back()->with('message', 'محصول با موفقیت حذف شد');
    }











//    public function listContentCat()
//    {
//        $categories = ContentCat::orderby('id','desc')->paginate(200);
//
//        return View('ShopModule::admin.category.list2',['categories'=>$categories]);
//
//    }
//
//
//    public function addContentCat(Request $request)
//    {
//
//        $content = new ProductCatModel($request->all());
//
//        if ($request->images_u !== null) {
//            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
//            $request->images_u->move(public_path('cat-img'), $imageName);
//            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
//            $request->image = $FileName;
//            $content->image = $FileName;
//
//        }
//
//        $content->save();
//        $categories = ProductCatModel::orderby('id','desc')->paginate(20);
//
//        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');
//
//    }
//
//
//    public function updateContentCat(Request $request, $id)
//    {
//
//        if ($request->images_u !== null) {
//            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
//            $request->images_u->move(public_path('cat-img'), $imageName);
//            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
//            $request->images = $FileName;
//        }
//
//        ProductCatModel::where('id', $id)->update(array(
//            'title'    =>  $request->title,
//            'parent_id'    =>  $request->parent_id,
//            'image'    =>  $request->images,
//            'state'    =>  $request->state,
//            'intro'    =>  $request->intro,
//
//        ));
//        $categories = ProductCatModel::orderby('id','desc')->paginate(20);
//
//        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
//    }
//
//
//    public function destroyContentCat($id)
//    {
//        $delete = ProductCatModel::find($id)->delete();
//        $categories = ProductModel::orderby('id','desc')->paginate(20);
//
//        return back()->with('message', 'دسته بندی با موفقیت حذف شد');
//
//    }






    public function listpCategory()
    {
        $categories = ProductCatModel::orderby('id','desc')->paginate(20);
        //return 'hello world';
        return View('shopmodule::admin.category.category',['categories'=>$categories]);
    }


    public function pcategoryAdd(Request $request)
    {
        $cat = new ProductCatModel();
        $cat->name=$request->input('name');
        if($request->input('parent_id') != 0)
            $cat->parent_id=$request->input('parent_id');
        else
            $cat->parent_id=null;
        $cat->save();

        return back()->with('message', 'دسته با موفقیت اضافه شد');
    }


    public function pcategoryUpdate(Request $request, $id)
    {
        $cat = ProductCatModel::find($id);
        $cat->name=$request->input('name');
        if($request->input('parent_id') != 0)
            $cat->parent_id=$request->input('parent_id');
        else
            $cat->parent_id=null;
        $cat->save();

        return back()->with('message', 'دسته با موفقیت ویرایش شد');
    }


    public function pcategoryDestroy($id)
    {
        $delete = ProductCatModel::destroy($id);

        return back()->with('message', 'دسته با موفقیت حذف شد');
    }


































    public function postManage()
    {
        $contents = Post::orderby('id','desc')->paginate(20);

        return View('admin.contents.posts',['contents'=>$contents]);
    }



    public function postAllow($id)
    {
        Post::where('id', $id)->update(array(
            'state'    =>  '1',
        ));

        return back()->with('message', 'وضعیت پست با موفقیت تغییر کرد');
    }


    public function postDismiss($id)
    {
        Post::where('id', $id)->update(array(
            'state'    =>  '0',

        ));

        return back()->with('message', 'وضعیت پست با موفقیت تغییر کرد');
    }


    public function postDelete($id)
    {
        $delete = Post::find($id)->delete();

        return back()->with('message', 'پست با موفقیت حذف شد');
    }

}
