<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
//    protected function redirectTo()
//    {
//
//        if (Auth::check() && Auth::user()->roles()->count() > 0) {
//            return redirect('/admin');
//        }else{
//            return back()->with('message', Auth::user()->name."  خوش آمدید  ");
//        }
//
//    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    /**
     * Additional condition for auth.
     *
     */
    public function authenticated(Request $request, $user)
    {
        $network = $user->network;
        $state = $user->state;

        if ($network == 0) {
            auth()->logout();
            return back()->with('alert', 'لطفا برای ورود ابتدا ایمیل فعالسازی ارسال شده را تایید نمایید.');
        }
        //elseif($state == 0){
        //return redirect()->with('alert', 'لطفا برای ورود ابتدا ایمیل فعالسازی ارسال شده را تایید نمایید.');

        // }
        $url=$request->session()->get('redirect_to');
        $cookieurl=$request->cookie('redirect_to');
        Cookie::forget('redirect_to');
        if($url)
            return redirect($url);
        elseif ($cookieurl)
            return redirect($cookieurl);
        elseif ($request->redirect_to)
            return redirect($request->redirect_to);

        if ($user->permissions->count() > 0) {
            return redirect('/admin');
        }else{
            return back()->with('message', Auth::user()->name."  خوش آمدید  ");
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

}
