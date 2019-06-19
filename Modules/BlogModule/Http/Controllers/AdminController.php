<?php

namespace Modules\BlogModule\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use Modules\BlogModule\Contents\Content;
use Modules\BlogModule\Contents\ContentCat;
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









    public function contentList()
    {
        $contents = Content::orderby('id','desc')->paginate(20);
        $contentCats = ContentCat::orderby('id','desc')->paginate(100);

        return View('blogmodule::admin.contents.manage',['contents'=>$contents, 'contentCats'=>$contentCats]);

    }

    public function contentCreate(){
        $contentCats = ContentCat::orderby('id','desc')->paginate(100);
        $products = ProductModel::select('id','name')->get();

        return View('blogmodule::admin.contents.add',['contentCats'=>$contentCats,
            'products' =>$products
        ]);

    }


    public function contentAdd(Request $request){


        $validation =[
            'active' => 'required'
        ];
        if($request->input('active.fa'))
            $validation = array_merge($validation,[
                'title.fa' => 'required',
                'intro.fa' => 'required',
                'text.fa' => 'required',
            ]);
        if($request->input('active.en'))
            $validation = array_merge($validation,[
                'title.en' => 'required',
                'intro.en' => 'required',
                'text.en' => 'required',
            ]);
        $this->validate($request,$validation);
        $content = new Content($request->all());

        $content = new Content();
        $active= [];

        $active['fa'] = ($request->input('active.fa'))? true : false ;
        $active['en'] = ($request->input('active.en'))? true : false ;
        $content->active = $active;
        if ($request->images == null) {
            $content->image = 'null';
        }
        else{
            $content->image = $request->images;
        }
//        else{
//            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
//            $request->image->move(public_path('post-img'), $imageName);
//            $FileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
//            $content->image = $FileName;
//        }

        if ($request->title == null) {
            $content->title = 'null';
        }else {$content->title = $request->title; };

        $content->intro = $request->intro;
        $content->comment = ($request->input('commentable'))? 1 : 0 ;

        if ($request->text == null) {
            $content->text = 'null';
        }else {$content->text = $request->text; };

        if ($request->news == null) {
            $content->news = '0';
        }else {$content->news = $request->news; };
        $content->title =$request->title;
        $content->state = $request->state;
        $content->cat_id = $request->cat_id;
        $content->previous_link = $request->previous_link;
        $content->next_link = $request->next_link;
        $content->related_products = $request->related_products;

        $content->users_id = Auth::id();

        $content->save();

        return redirect(route('content.index'))->with('message', 'مطلب  با موفقیت اضافه شد');
    }
    public function contentEdit(Request $request,$id){



        $content = Content::find($id);
        $contentCats = ContentCat::orderby('id','desc')->paginate(100);
        $products = ProductModel::select('id','name')->get();

        return View('blogmodule::admin.contents.edit',['content'=>$content, 'contentCats'=>$contentCats, 'products'=>$products]);

    }


    public function contentUpdate(Request $request, $id){

        $validation =[
            'active' => 'required'
        ];
        if($request->input('active.fa'))
            $validation = array_merge($validation,[
                'title.fa' => 'required',
                'intro.fa' => 'required',
                'text.fa' => 'required',
            ]);
        if($request->input('active.en'))
            $validation = array_merge($validation,[
                'title.en' => 'required',
                'intro.en' => 'required',
                'text.en' => 'required',
            ]);
        $this->validate($request,$validation);
//        if ($request->image_u !== null) {
//            $imageName = time() . '.' . $request->image_u->getClientOriginalExtension();
//            $request->image_u->move(public_path('post-img'), $imageName);
//            $FileName = time() . '.' . $request->file('image_u')->getClientOriginalExtension();
//            $request->image = $FileName;
//        }
        $content = Content::find($id);
        $active=[];
        $active['fa'] = ($request->input('active.fa'))? true : false ;
        $active['en'] = ($request->input('active.en'))? true : false ;
        $content->active = $active;
        $content->comment = ($request->input('commentable'))? 1 : 0 ;
        $content->title =$request->title;
        $content->intro = $request->intro;
        $content->text = $request->text;
        $content->state = $request->state;
        $content->cat_id = $request->cat_id;
        $content->previous_link = $request->previous_link;
        $content->next_link = $request->next_link;
        $content->related_products = $request->related_products;
        $content->image = $request->images;
        $content->news = $request->news;
        $content->save();
//        $post = Content::where('id', $id)->update(array(
//            'title' => $request->title,
//            'intro' => $request->intro,
//            'text' => $request->text,
//            'image' => $request->images,
//            'cat_id' => $request->cat_id,
//            'news' => $request->news,
//            'users_id' =>$request->users_id,
//            'previous_link' => $request->previous_link,
//            'next_link' => $request->next_link,
//            'related_products' => $request->related_products
//        ));

        return redirect(route('content.index'))->with('message', 'مطلب با موفقیت ویرایش شد');
    }


    public function contentDelete($id){


        $delete = Content::find($id)->delete();

        return back()->with('message', 'مطلب با موفقیت حذف شد');
    }











    public function listContentCat()
    {
        $categories = ContentCat::orderby('id','desc')->paginate(200);

        return View('blogmodule::admin.category.list2',['categories'=>$categories]);

    }


    public function addContentCat(Request $request)
    {

        $this->validate($request, [
            'title.en' => 'required|max:255',
            'title.fa' => 'required|max:255',
            'intro.fa' => 'required',
            'intro.en' => 'required',
        ]);

        $content = new ContentCat($request->all());
        $content->title=$request->title;
        $content->intro=$request->intro;

        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $request->image = $FileName;
            $content->image = $FileName;

        }

        $content->save();
//        $categories = ContentCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت اضافه شد');

    }


    public function updateContentCat(Request $request, $id)
    {
        $this->validate($request, [
            'title.en' => 'required|max:255',
            'title.fa' => 'required|max:255',
            'intro.fa' => 'required',
            'intro.en' => 'required',
        ]);
        $content = ContentCat::find($id);
        $content->title=$request->title;
        $content->intro=$request->intro;
        $content->parent_id=$request->parent_id;
        $content->state=$request->state;
        if ($request->images_u !== null) {
            $imageName = time() . '.' . $request->images_u->getClientOriginalExtension();
            $request->images_u->move(public_path('cat-img'), $imageName);
            $FileName = time() . '.' . $request->file('images_u')->getClientOriginalExtension();
            $content->image = $FileName;
        }

        $content->save();
//        $categories = ContentCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'مشخصات دسته بندی با موفقیت تغییر کرد');
    }


    public function destroyContentCat($id)
    {
        $delete = ContentCat::find($id)->delete();
        $categories = ContentCat::orderby('id','desc')->paginate(20);

        return back()->with('message', 'دسته بندی با موفقیت حذف شد');

    }






    public function index()
    {
        $contents = Content::orderby('id','desc')->paginate(20);

        return View('admin.contents.manage',['contents'=>$contents]);
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
