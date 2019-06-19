<?php

namespace App\Http\Controllers;

use App\Advertising;
use Illuminate\Http\Request;

class AdminAdvertisingController extends Controller
{
    public function index(){
        $advertisings = Advertising::orderBy('active')->orderBy('id','desc')->paginate(20);
        return view('admin.advertising.index',compact('advertisings'));
    }
    public function accept(Advertising $advertising){
        $advertising->active = 2 ;
        $advertising->save();
        return back()->with('messsage','آگهی تایید شده');
    }
    public function reject(Advertising $advertising){
        $advertising->active = 1 ;
        $advertising->save();
        return back()->with('messsage','آگهی رد شده');

    }
    public function delete(Advertising $advertising){
        $advertising->delete();
        return back()->with('messsage','آگهی حذف شد');

    }
}
