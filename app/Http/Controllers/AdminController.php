<?php

namespace App\Http\Controllers;

use App\Contents\Content;
use App\Contents\CourseCat;
use App\Contents\EventCat;
use App\Contents\FileCat;
use App\Contents\ForumCat;
use App\Contents\Post;
use App\Inspection;
use App\Repositories\Content\ContentRepository;
use App\SectionModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\BlogModule\Contents\ContentCat;
use Modules\ShopModule\Http\Controllers\OrderController;
use Modules\ShopModule\Products\OrderItemModel;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductModel;

class AdminController extends Controller
{


    public $post;
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index()
    {
        $product=[];
        $product['month']= OrderItemModel::join('order','order_id','=','order_item.order_id')
            ->where('order.state',OrderController::$payment_successNum)
            ->select('product_id','product.id','name','order.created_at',DB::raw('count(*) as total'))
            ->join('product','product.id', '=', 'order_item.product_id')
            ->groupby('product_id')
            ->havingRaw('created_at >= DATE_SUB(NOW(),INTERVAL 1 MONTH)')
            ->orderby('total','desc')
            ->take(6)
            ->get();
        $product['lastmonth']= OrderItemModel::join('order','order_id','=','order_item.order_id')
            ->where('order.state',OrderController::$payment_successNum)
            ->select('product_id','product.id','name','order.created_at',DB::raw('count(*) as total'))
            ->join('product','product.id', '=', 'order_item.product_id')
            ->groupby('product_id')
            ->havingRaw('created_at < DATE_SUB(NOW(),INTERVAL 1 MONTH)')
            ->havingRaw('created_at >= DATE_SUB(NOW(),INTERVAL 2 MONTH)')
            ->orderby('total','desc')
            ->take(6)
            ->get();
        $product['year']= OrderItemModel::join('order','order_id','=','order_item.order_id')
            ->where('order.state',OrderController::$payment_successNum)
            ->select('product_id','product.id','name','order.created_at',DB::raw('count(*) as total'))
            ->join('product','product.id', '=', 'order_item.product_id')
            ->groupby('product_id')
            ->havingRaw('created_at >= DATE_SUB(NOW(),INTERVAL 1 YEAR)')
            ->orderby('total','desc')
            ->take(6)
            ->get();
        $cats = ProductCatModel::select('product_cat.id','product_cat.name',DB::raw('CONVERT(GROUP_CONCAT(product.id SEPARATOR \',\') USING utf8) AS products'))
            ->join('product','product.category_id', '=', 'product_cat.id')
            ->groupby('id')
            ->get();

        $cat_percent=[];

        foreach ($cats as $cat)
        {
            $ids=explode(',',$cat->products);
            $view=$this->getcountInspects($ids,'product');
            $buy=OrderItemModel::whereIn('product_id',$ids)->count();
            if ( $view == 0 || $buy ==0)
                $cat_percent[$cat->id] = 0;
            else
                $cat_percent[$cat->id] = 100*$buy/$view;
        }
//        return json_encode($cat_percent);

        $view=[];
        $view['month']=Inspection::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->count();
        $view['all']=Inspection::count();
        $sell=[];
        $sell['month']=OrderItemModel::join('order','order_id','=','order_item.order_id')->where('state',OrderController::$payment_successNum)->where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->count();
        $s =OrderItemModel::join('order','order_id','=','order_item.order_id')->where('state',OrderController::$payment_successNum)->count();
        if($s == 0)
            $s =1;
        $sell['all']=$s;
        $register=[];
        $register['month']=User::where('created_at', '>=', Carbon::now()->subDays(30)->toDateTimeString())->count();
        $register['all']=User::count();

        $products = ProductModel::select('product_cat.name as cat_name','product.id','product.name','product.created_at')
            ->leftjoin('product_cat','product.category_id', '=', 'product_cat.id')
            ->orderby('id','desc')
            ->take(6)
            ->get();
        $product_sell=[];
        $product_percent=[];
        foreach ($products as $pr){
            $product_sell[$pr->id] =  OrderItemModel::join('order','order_id','=','order_item.order_id')
                ->where('order.state',OrderController::$payment_successNum)
                ->select(DB::raw('count(*) as total'))
                ->where('product_id',$pr->id)
                ->where('created_at', '>=', Carbon::now()->subMonth(10)->toDateTimeString())
                ->groupby(DB::raw('MONTH(created_at)'))
                ->orderby('created_at')
                ->get();
            $v=$this->getcountInspect($pr->id,'product');
            $buy=OrderItemModel::join('order','order_id','=','order_item.order_id')
                ->where('order.state',OrderController::$payment_successNum)
                ->where('product_id',$pr->id)->count();
            if ( $v == 0 || $buy ==0)
                $product_percent[$pr->id] = 0;
            else
                $product_percent[$pr->id] = 100*$buy/$v;
        }
//                    return $product_sell;

        return view('admin.index',compact('product',
            'products',
            'product_sell',
            'product_percent',
            'cats',
            'cat_percent',
            'sell',
            'view',
            'register'
        ));
    }




    public function slide()
    {
        $text = SectionModel::where('id', '5')->first();
        $text1 = SectionModel::where('id', '6')->first();
        $text2 = SectionModel::where('id', '7')->first();

        return View('admin.section.slides', ['text' => $text, 'text1' => $text1, 'text2' => $text2]);
    }
    public function slideEdit(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }





        if ($request->images_u_1 !== null) {
            $imageName = time() . '.' . $request->images_u_1->getClientOriginalExtension();
            $request->images_u_1->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u_1')->getClientOriginalExtension();
            $request->images_1 = $FileName;
        }

        if ($request->images_u_2 !== null) {
            $imageName = time() . '.' . $request->images_u_2->getClientOriginalExtension();
            $request->images_u_2->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u_2')->getClientOriginalExtension();
            $request->images_2 = $FileName;
        }

        if ($request->images_u_3 !== null) {
            $imageName = time() . '.' . $request->images_u_3->getClientOriginalExtension();
            $request->images_u_3->move(public_path('teachers-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u_3')->getClientOriginalExtension();
            $request->images_3 = $FileName;
        }





        SectionModel::where('id', $id)->update(array(
            'title' => $request->title,
            'title_fa' => $request->title_fa,
            'link' => $request->link,
            'link_fa' => $request->link_fa,
            'colored' => $request->colored,
            'colored_fa' => $request->colored_fa,
            'subtitle' => $request->subtitle,
            'subtitle_fa' => $request->subtitle_fa,
            'description' => $request->description,
            'description_fa' => $request->description_fa,
            'image' => $request->images,

            'image_b' => $request->images_1,
            'position' => $request->images_2,
            'number' => $request->images_3,
            'ordering' => $request->ordering,

            'active' => '1',
        ));
        return back()->with('message', 'مشخصات با موفقیت ویرایش شد');
    }



























    public function listCat2()
    {
        $categories = ForumCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list',['categories'=>$categories]);

    }


    public function addCat2(Request $request)
    {

        $content = new ForumCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;

        }

        $content->save();
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');
    }


    public function updateCat2(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        ForumCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,
        ));
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat2($id)
    {
        $delete = ForumCat::find($id)->delete();
        $categories = ForumCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }


















    public function listCat3()
    {
        $categories = FileCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list3',['categories'=>$categories]);

    }


    public function addCat3(Request $request)
    {

        $content = new FileCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;
        }

        $content->save();
        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat3(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        FileCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,
        ));

        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat3($id)
    {
        $delete = FileCat::find($id)->delete();
        $categories = FileCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }









    public function listCat4()
    {
        $categories = EventCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list4',['categories'=>$categories]);

    }


    public function addCat4(Request $request)
    {

        $content = new EventCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;
        }

        $content->save();
        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateCat4(Request $request, $id)
    {
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        EventCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,
        ));

        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyCat4($id)
    {
        $delete = EventCat::find($id)->delete();
        $categories = EventCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }








    public function listContentCat()
    {
        $categories = CourseCat::orderby('id','desc')->paginate(200);

        return View('admin.category.list2',['categories'=>$categories]);

    }


    public function addContentCat(Request $request)
    {

        $content = new CourseCat($request->all());

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;

        }

        $content->save();
        $categories = ContentCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateContentCat(Request $request, $id)
    {

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->images = $FileName;
        }

        ContentCat::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'parent_id'    =>  $request->parent_id,
            'image'    =>  $request->images,

        ));
        $categories = ContentCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyContentCat($id)
    {
        $delete = ContentCat::find($id)->delete();
        $categories = CourseCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }





    public function create(Request $request)
    {
        $content = new Content($request->all());
        $content->save();

        return back()->with('message', 'صفحه  با موفقیت اضافه شد');
    }


    public function update(Request $request, $id)
    {
        Content::where('id', $id)->update(array(
            'title'    =>  $request->title,
            'intro'    =>  $request->intro,
        ));

        return back()->with('message', 'صفحه با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        $delete = Content::find($id)->delete();

        return back()->with('message', 'صفحه با موفقیت حذف شد');
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
