<?php

namespace App\Http\Controllers;

use App\Questions;
use App\QCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QuestionController extends Controller
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
    public function index($id)
    {
//        $qcat=QCategories::select('id','title')->get();;
//        $contents=Questions::orderby('id','desc')->paginate(20);
//        return view('admin.test.Question-manage',compact('contents','qcat','id'));

        $qcat=QCategories::select('id','title')->get();
        $contents=Questions::where('test_id',$id)->paginate(20);
        return view('admin.test.Question-manage',[
            'contents'=> $contents,
            'qcat'=> $qcat,
            'id'=> $id]);
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
            'qcontent' => 'required',
            'test_id' => 'required',
            'type' => 'required|exists:question_cat,id',
            'option' => 'required',
        ]);
        $cat= New Questions();
        $cat->title=$request->title;
        $cat->content=$request->qcontent;
        $cat->type=$request->type;
        $cat->test_id=$request->test_id;

        $options=[];
        $qcat= QCategories::find($request->type);

        foreach ($request->option as $type => $array)
            foreach ($array as $index => $val)
            {
                if(!isset($options[$index]))
                    $options[$index]=[];
//                if(!isset($options[$index]['type_title']))
//                    $options[$index]['type_title']=$qcat->options[$val]['title'];
                $options[$index][$type]=$val;
            }

        foreach ($options as $key => $option)
            $options[$key]['type_title']=$qcat->options[$option['type']]['title'];

        $cat->options=$options;

        $cat->save();
        return redirect()->back()->with('message','سوال با موفقیت اضافه شد');
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
            'qcontent' => 'required',
            'type' => 'required|exists:question_cat,id',
            'option' => 'required',

        ];
        $this->validate($request,$validation);

        $cat= Questions::find($id);
        $cat->title=$request->title;
        $cat->content=$request->qcontent;
        $cat->type=$request->type;

        $qcat= QCategories::find($request->type);
        $options=[];
        foreach ($request->option as $type => $array)
            foreach ($array as $index => $val)
            {
                if(!isset($options[$index]))
                    $options[$index]=[];
                $options[$index][$type]=$val;
            }
        foreach ($options as $key => $option)
            $options[$key]['type_title']=$qcat->options[$option['type']]['title'];
        $cat->options=$options;

        $cat->save();
        return redirect()->back()->with('message','سوال با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Questions::destroy($id);
        return redirect()->back()->with('message','سوال با موفقیت حذف شد');
    }

}
