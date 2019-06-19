<?php

namespace App\Http\Controllers;

use App\Questions;
use App\TestResult;
use App\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestFrontController extends Controller
{
    public function show($id){
        $dataDetail = explode('-', $id);
        $dataId = $dataDetail[1];
        $questions=Questions::where('test_id',$dataId)->get();
        $test=Tests::find($dataId);
        return view('test.test',compact('questions','test'));
    }

    public function save(Request $request,$id){
//        $questions=Questions::select('questions.options as qoptions','question_cat.*')-> where('test_id',$request->test_id)->join('question_cat','question_cat.id','questions.type')->get();
        $questions=Questions::where('test_id',$request->test_id)->get();
//        return $request->all();
        $result=[];
        foreach ($questions as $key => $question)
        {
            $cat=$question->category;
            if(isset($request->answer[$question->id])){
                if(!isset($result[$question->type]))
                    $result[$question->type]=[];

                if (!isset($result[$question->type]['options'])){
                    $result[$question->type]['grade']=$cat->grade;
                    $result[$question->type]['title']=$cat->title;
                    $result[$question->type]['options']=[];
                    foreach ($cat->options as $option)
                    {
                        $result[$question->type]['options'][$option['title']]=[];
                        $result[$question->type]['options'][$option['title']]['freq']=0;
                        $result[$question->type]['options'][$option['title']]['grade']=$cat->option[$question->option[$request->answer[$question->id]]['type']]['grade'];

                    }
                }


//                return $request->answer[$question->id];
//                return var_dump($question->qoptions);
//                return $question->qoptions[0];
                if (isset($result[$question->type]['options'][$cat->options[$question->options[$request->answer[$question->id]]['type']]['title']])){
                    $result[$question->type]['options'][$cat->options[$question->options[$request->answer[$question->id]]['type']]['title']]['freq']++;
                }
                else{
                    $result[$question->type]['options'][$cat->options[$question->options[$request->answer[$question->id]]['type']]['title']]=[];
                    $result[$question->type]['options'][$cat->options[$question->options[$request->answer[$question->id]]['type']]['title']]['freq']=1;
                    $result[$question->type]['options'][$cat->options[$question->options[$request->answer[$question->id]]['type']]['title']]['grade']=$cat->option[$question->option[$request->answer[$question->id]]['type']]['grade'];

                }


            }
            else
                return back()->with('error','به تمام سوالات پاسخ بدهید');


        }


        foreach ($result as $val){
            foreach ($val['options'] as $key => $item){
                if(!isset($max)){
                    $max = $item['freq'];
                    $max_title=$key;
                }
                elseif($item['freq'] > $max) {
                    $max = $item['freq'];
                    $max_title=$key;
                }
            }
            if(!isset($final_result))
                $final_result=$max_title;
            else
                $final_result.=' - '.$max_title;
            unset($max);

        }

        $testR=new TestResult();
        $testR->result=$result;
        $testR->grade=0;
        $testR->test_id=$request->test_id;
        if(Auth::user())
            $testR->user_id=Auth::id();
        $testR->final_result=$final_result;
        $testR->save();

        return redirect(route('front.testResult',['id' => $testR->id]));

    }

    public function result(Request $request,$id){
        if(!Auth::user())
            return redirect(route('login'))->withCookie('redirect_to',$request->url(),15)->with('redirect_to',$request->url());
        else
            $r =TestResult::find($id);
            if($r->user_id == null){
                $r->user_id=Auth::id();
                $r->save();
            }

//            return var_dump($r->result);
            return view('test.result1',['record'=>$r]);
    }
}
