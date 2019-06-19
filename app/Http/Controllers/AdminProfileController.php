<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index(){
        $userprofiles = UserProfile::orderBy('active')->orderBy('id','desc')->paginate(20);
        return view('admin.userprofile.index',compact('userprofiles'));
    }
    public function accept(UserProfile $userprofile){
        $userprofile->active = 2 ;
        $userprofile->save();
        return back()->with('messsage','آگهی تایید شده');
    }
    public function reject(UserProfile $userprofile){
        $userprofile->active = 1 ;
        $userprofile->save();
        return back()->with('messsage','آگهی رد شده');

    }
    public function delete(UserProfile $userprofile){
        $userprofile->delete();
        return back()->with('messsage','آگهی حذف شد');

    }
}
