<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use App\Advertising;

class ShowController extends Controller
{
    public function Advertise($url){
        $dataDetail = explode('-', $url);
        $dataId = $dataDetail[1];
        $advertise = Advertising::findOrFail($dataId);
        if ($advertise->active != 2)
            return abort(404);
        return view('show.advertise',compact('advertise'));
    }
    public function seller($url){

        $dataDetail = explode('-', $url);
        $dataId = $dataDetail[1];

        $profileseller = UserProfile::where('id' , $dataId)->first();

        $advertisings = Advertising::activate()->orderby('id','desc')->where('user_id',$profileseller->user_id)->paginate(20);

        return view('user.profileseller' , ['profileseller' => $profileseller,
            'advertisings' => $advertisings
        ] );

    }
}
