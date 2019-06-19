<?php

namespace Modules\BlogModule\Http\Controllers;


use Modules\BlogModule\Contents\PostComment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function postComment(Request $request)
    {
        if(Auth::user()){
            $validator = Validator::make($request->all(), [

                'comment' => 'required|max:1024',
                'post_id'=> 'required',
            ]);

        }
        else{
            $validator = Validator::make($request->all(), [
                'email'=> 'required|email',
                'name'=> 'required|max:255',
                'comment' => 'required|max:1024',
                'post_id'=> 'required',

            ]);

        }


        if ($validator->passes()) {

            $comment= new PostComment();
            if(Auth::user())
                $comment->users_id=Auth::id();
            else{
                $comment->name=$request->name;
                $comment->email=$request->email;
            }
            $comment->post_id=$request->post_id;
            if(isset($comment->parent_id))
                $comment->parent_id=$request->parent_id;
            $comment->comment=$request->comment;
            $comment->approved=0;
            $comment->ban=0;
            $comment->like=0;
            $comment->view=0;
            $comment->save();

            return redirect()->back()->with('success','نظر شما با موفقیت ارسال شد');
        }


        return back()->with(['errors'=>$validator->errors()]);
    }





}
