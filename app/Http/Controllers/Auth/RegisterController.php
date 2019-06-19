<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Province;
use App\User;
use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Notifications\UserRegister;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    public function showRegistrationForm()
    {
        $provinces=Province::all();
        return view('auth.register', compact('provinces'));
    }







    public function activateUser($emailConfirm)
    {
        $user = User::where('activation_code', $emailConfirm)->first();

        if($user !== null){
        $user->update(array(
            //'actived'    =>  '1',
            'network'    =>  '1',
        ));
            $role = \App\Role::find(4);
            $role->user()->save($user);

        $this->guard()->login($user);


            $users = User::where('id', $user->id)->get();
            Notification::send($users, new \App\Notifications\Event('80', 'خوش آمدگویی', 'به جامعه انرژی خوش آمدید'));


        return redirect('/')->with('message', 'ثبت نام شما با موفقیت انجام شد');
        }else{
            return redirect('/')->with('error', 'خطا در فعالسازی اکانت!');
        }
    }





    protected function registered(Request $request, $user)
    {
        auth()->login($user);
        $url=$request->session()->get('redirect_to');
        $cookieurl=$request->cookie('redirect_to');
        Cookie::forget('redirect_to');
        if($url)
            return redirect($url);
        elseif ($cookieurl)
            return redirect($cookieurl);
        elseif ($request->redirect_to)
            return redirect($request->redirect_to);
//        $user->notify(new UserRegister($user->activation_code));
//        return back()->with('alert', '   مرحله اول ثبت نام با موفقیت انجام شد. لطفا برای تکمیل ثبت نام </b> لینک فعالسازی ارسال شده به ایمیلتان </b> را تایید نمایید. (در صورت عدم دریافت ایمیل فولدر spam خود را چک فرمایید)');
        return redirect(url('/'))->with('message','ثبت نام شما با موفقیت انجام شد');
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //    protected $redirectTo = '/';
    protected function redirectTo()
    {

        return  back()->with('alert', 'لطفا برای تکمیل ثبت نام لینک فعالسازی ارسال شده به ایمیلتان را تایید نمایید.');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|string|digits:11|unique:users',
            'postcode' => 'required|string|digits:10',
            'address' => 'required|string',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
            'agree' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * ertwertret
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        var_dump(json_encode($data['city_id']));

        $user = new User();

        $user->username = $data['username'];
        $user->name = $data['firstname'];
        $user->family = $data['lastname'];
        $user->mobile = $data['mobile'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->activation_code = $this->getActivationCode();
        $user->network    =  '1';
        $user->save();

        $profile = UserAddress::create([
            'user_id' => $user->id,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['mobile'],
            'company_name' => $data['company'],
            'fax' => $data['fax'],
            'address' => $data['address'],
            'postcode' => $data['postcode'],
            'province_id' => $data['province_id'],
            'city_id' => $data['city_id'],

        ]);




        return $user;



    }
}
