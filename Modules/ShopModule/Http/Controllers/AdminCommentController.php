<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Modules\ShopModule\Products\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminCommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }


    public function index()
    {
        if (Auth::check()) {
            $this->middleware('BaseMiddleware');
        }
        $this->middleware('auth');

        //$id = Auth::user()->id;
        $comments = ProductComment::orderby('id', 'desc')->paginate(100);

        return View('shopmodule::admin/comment/comments', ['comments' => $comments]);
    }


    public function store(Request $request)
    {
        $comment = new ProductComment($request->all());
        $comment->users_id = Auth::user()->id;
        $comment->product_id=$request->product_id;
        $comment->parent_id=$request->parent_id;
        $comment->comment=$request->comment;
        $comment->approved=1;
        $comment->ban=0;
        $comment->like=0;
        $comment->view=0;
        $comment->save();

        return back()->with('message','پاسخ شما با موفقیت ارسال شد');
    }

    public function accept($id)
    {

        ProductComment::where('id', $id)->update(array(
            'approved' => '1',
        ));
        return back()->with('message','نظر تایید شد');
    }

    public function deny($id)
    {
        ProductComment::where('id', $id)->update(array(
            'approved' => '0',
        ));
        return back()->with('message','نظر رد شد');
    }

    public function destroy($id)
    {
        $delete = ProductComment::destroy($id);
        return back()->with('message','نظر حذف شد');
    }




}
