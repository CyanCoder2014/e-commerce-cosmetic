<?php

namespace App\Http\Controllers;

use App\Inspection;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    protected function getActivationCode()
    {
        return time().hash_hmac('sha256', str_random(20), config('activation.key'));
    }


    protected $inspecType = [
        'article' => 1,
        'product' => 2,
    ];
    protected function setInspect($id,$type){
        if(Cookie::get('view_id')){
            $viewid =Cookie::get('view_id');
            $before = Inspection::where('id',$viewid)->where('type',$this->inspecType[$type])->where('inner_id',$id)->first();
        }
        else{

            $counter = Inspection::where('type',127)->first();
            if(!$counter){
                $counter = new Inspection();
                $counter->id = 1;
                $counter->type = 127;
                $counter->count = 1;
                $counter->save();
            }
            $viewid = $counter->count;


            $counter->count++;
            Inspection::where('type',127)->update(['count' => $counter->count]);
            Cookie::queue('view_id',$viewid);

        }


        if(isset($before) && $before){
            $before->count++;
            if ($before->user_id == null && Auth::check()){
                Inspection::where('id',$viewid)->update(['user_id'=>Auth::id()]);
            }
            $before->save();
        }
        else{
            $new = new Inspection();
            $new->id = $viewid;
            $new->inner_id = $id;
            $new->type = $this->inspecType[$type];
            if (Auth::check()){
                $new->user_id = Auth::id();
            }
            $new->save();


        }





    }
    protected function getInspect($id,$type){
        return Inspection::where('type',$this->inspecType[$type])->where('inner_id',$id)->get();
    }
    protected function getInspects( array $ids,$type){
        return Inspection::where('type',$this->inspecType[$type])->whereIn('inner_id',$ids)->get();
    }
    protected function getcountInspect($id,$type){
        return Inspection::where('type',$this->inspecType[$type])->where('inner_id',$id)->count();
    }
    protected function getcountInspects( array $ids,$type)
    {
        return Inspection::where('type', $this->inspecType[$type])->whereIn('inner_id', $ids)->count();
    }
}
