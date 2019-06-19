<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;


class ProfileComplete
{

    public function handle($request, Closure $next)
    {
        if (User::find(Auth::id())->actived == '0') {
            return redirect('/home/profile/complete')->with('alert', "لطفا جهت دسترسی کامل <a href='../../home/profile/edit'> پروفایل </a> خود را تکمیل نمایید.");
        }
//        if (User::find(Auth::id())->state == '99') {
//            return redirect('/')->with('alert', "اکانت شما مسدود شده است");
//        }
        return $next($request);
    }
}
