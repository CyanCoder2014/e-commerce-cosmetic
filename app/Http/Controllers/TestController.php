<?php

namespace App\Http\Controllers;

use App\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TestQusetions;
use App\Questions;


class TestController extends Controller
{
    public function __construct()
    {
        if ( Auth::check() ) {
            $this->middleware('UserMiddleware');
        }else{
            $this->middleware('auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Questions::select('id','title')->get();
        $contents=Tests::orderby('id','desc')->paginate(20);
        return view('admin.test.Test-manage',compact('contents','questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);
        $t= New Tests();
        $t->title=$request->title;
        $t->description=$request->description;
        $t->link_name=$request->link_name;
        $t->link=$request->link;
        $t->final_desc=$request->final_desc;
        $t->image=$request->image;
        $t->save();
        return redirect()->back()->with('message','آزمون با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=[
            'title' => 'required',
            'description' => 'required',
        ];
        $this->validate($request,$validation);


        $t= Tests::find($id);
        $t->title=$request->title;
        $t->description=$request->description;
        $t->link_name=$request->link_name;
        $t->link=$request->link;
        $t->final_desc=$request->final_desc;
        $t->image=$request->image;
        $t->save();

        return redirect()->back()->with('message','آزمون با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tests::destroy($id);
        return redirect()->back()->with('message','آزمون با موفقیت حذف شد');
    }

}
