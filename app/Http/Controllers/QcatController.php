<?php

namespace App\Http\Controllers;

use App\QCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QcatController extends Controller
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
        $qcat=QCategories::orderby('id','desc')->paginate(20);
        return view('admin.test.Qcat-manage',['contents' => $qcat]);
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
            'title' => 'required|unique:question_cat,title',
            'option.title.*' => 'required',
            'option.content.*' => 'required',
            'option.grade.*' => 'required',
            'option.label.*' => 'required',
            'grade' => 'required',
        ]);
        $cat= New QCategories();
        $cat->title=$request->title;
        $cat->grade=$request->grade;
        $options=[];
        foreach ($request->option as $type => $array)
            foreach ($array as $index => $val)
            {
                if(!isset($options[$index]))
                    $options[$index]=[];
                $options[$index][$type]=$val;
            }

        $cat->options=$options;
        $cat->save();
        return redirect()->back()->with('message','دسته بندی با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QCategories  $qCategories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QCategories  $qCategories
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
     * @param  \App\QCategories  $qCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation=[
            'option.title.*' => 'required',
            'option.content.*' => 'required',
            'option.grade.*' => 'required',
            'option.label.*' => 'required',
            'grade' => 'required',
        ];
        $cat= QCategories::find($id);
        if($cat->title == $request->title)
            $validation=array_merge($validation,['title' => 'required']);
        else
            $validation=array_merge($validation,['title' => 'required|unique:question_cat,title']);


        $this->validate($request,$validation);
        $cat->title=$request->title;
        $cat->grade=$request->grade;
        $options=[];
        foreach ($request->option as $type => $array)
            foreach ($array as $index => $val)
            {
                if(!isset($options[$index]))
                    $options[$index]=[];
                $options[$index][$type]=$val;
            }

        $cat->options=$options;
        $cat->save();
        return redirect()->back()->with('message','دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QCategories  $qCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QCategories::destroy($id);
        return redirect()->back()->with('message','دسته بندی با موفقیت حذف شد');
    }


    public function getoptions(Request $request)
    {
        $cat= QCategories::find($request->id);
        return json_encode($cat->options);
    }
}
