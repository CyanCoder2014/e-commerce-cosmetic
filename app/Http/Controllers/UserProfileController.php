<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 2/28/2019
 * Time: 8:07 PM
 */

namespace App\Http\Controllers;


use App\Province;
use App\User;
use App\UserProfile;
use App\UserProfileBrands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Modules\ShopModule\Products\Brand;

//use Illuminate\Support\Facades\Cookie;

class UserProfileController extends Controller
{
    public function __construct()
    {

//        $this->middleware('UserMiddleware');
    }

    public function showRegistrationForm()
    {
//        $roll_seller=Role::where('id','=', '2')->get();
//        if($roll_seller)
//
//        $roll_repairman=Role::where('id','=', '3')->get();

        $provinces=Province::all();
        $brands=Brand::all();
        if(Auth::check()){
            $profile = UserProfile::where('users_id',Auth::id())->first();
            if ($profile)
//                return dd($profile);
                return view('user.registerform', compact('provinces','profile'));
        }
        return view('user.registerform', compact('provinces'));
    }

    public function store(Request $request)
    {
        ///////////////// update/create user ///////////////////
        if(Auth::check()){
            $user = Auth::user();
            $profile = $user->profile;
            $user_validation = [
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|string|digits:11|unique:users',
            ];
            if ($user->email == $request->email)
                unset($user_validation['email']);
            if ($user->username == $request->username)
                unset($user_validation['username']);
            if ($user->mobile == $request->mobile)
                unset($user_validation['mobile']);

        }
        else{

            $user_validation = [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'mobile' => 'required|string|digits:11|unique:users',
                'agree' => 'required',
            ];
            $user = new User();
            $user->activation_code = $this->getActivationCode();
            $user->network    =  '1';
        }
        $this->validate($request,$user_validation);
        $user->username = $request->username;
        $user->name = $request->firstname;
        $user->family = $request->lastname;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if (isset($request->password))
            $user->password = bcrypt($request->password);

        $user->save();
        ////////////////////////////////////////////////
        ///////////////// update/create user Profile ///////////////////
        if(!isset($profile) or !$profile){
            $profile = new UserProfile();
            $profile->users_id = $user->id;

        }

        $profile_validation= [
            'type' => 'required',
            'type_sub' => 'required',
            'person' => 'required',
            'tell' => 'required|string|max:255',
            'post_code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'site' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'country_id' => 'required|exists:city,id',
            'brands' => 'required|array|min:1',
        ];
        if(!isset($profile->license_img))
            $profile_validation['license_img']= 'required|image';

        $this->validate($request,$profile_validation);
//        return 'ff';
        if ($request->hasFile('license_img')) {
            $image = $request->file('license_img');
            $name = time() .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('image');
            $profile->license_img = 'image/'.  $name;
            $image->move($destinationPath, $name);

        }

        if ($request->hasFile('logo_img')) {
            $image = $request->file('logo_img');
            $name = time() .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('image');
            $profile->logo_img = 'image/'.  $name;
            $image->move($destinationPath, $name);

        }

        if ($request->hasFile('place_img')) {
            $image = $request->file('place_img');
            $name = time() .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('image');
            $profile->place_img = 'image/'.  $name;
            $image->move($destinationPath, $name);

        }
        $profile->person = $request->person;
        $profile->type = $request->type;
        $profile->type_sub = $request->type_sub;
        $profile->company = $request->company;
        $profile->country_id = $request->country_id;

        $profile->tell = $request->tell;
        $profile->post_code = $request->post_code;
        $profile->address = $request->address;
        $profile->site = $request->site;
        $profile->save();
        $profileBrands = $profile->brands;
        foreach ($request->brands as $brand){
            if ($profileBrands->isEmpty()){
                $rel = new UserProfileBrands();
                $rel->profile_id = $profile->id;
            }
            else
                $rel = $profileBrands->pop();

            $rel->brand_id = $brand;
            $rel->save();

        }
//        dd($profile);
//        $user->image = $cover->getClientMimeType();
//        if ($file=$request->file('img_profile')) {
////            $file = $request->file('img_profile');
//            $imageName = time() . '.' . $file->getClientOriginalExtension();
//            $file->move(public_path('user'), $imageName);
//            $user->image = 'user/'.$imageName;
//
//
//        }




//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->activation_code = $this->getActivationCode();
//        $user->network    =  '1';
//        $user->syncRoles($request->roles);
        if(Auth::check())
            return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
        else
            return redirect(route('login'))->with('message','ثبت نام شما باموفقیت انجام شد حالا میتوانید وارد سایت بشوید');
    }



//    public function store(Request $request)
//    {
//        $this->validate($request,[
////            'roles' =>'required|array',
//            'firstname' => 'required|string|max:255',
//            'lastname' => 'required|string|max:255',
//            'username' => 'required|string|max:255|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6',
//            'mobile' => 'required|string|digits:11|unique:users'
//        ]);
//        $user = new User();
//
////        $user->username = $request->username;
//        $user->name = $request->firstname;
//        $user->family = $request->lastname;
//        $user->mobile = $request->mobile;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->activation_code = $this->getActivationCode();
//        $user->network    =  '1';
//        $user->save();
//        $user->syncRoles($request->roles);
//        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
//    }

    public function update(Request $request, $id)
    {
        $this->middleware('auth');
        if ($id != 1 )// cannot edit super admin
        {
            $this->validate($request,[
                'roles' =>'required|array'
            ]);
            $user_ = User::find($id);
            $user_->syncRoles($request->roles);
        }

        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }

    public function delete($id)
    {
        $this->middleware('auth');
        $delete = Post::where('users_id', $id)->delete();
        $delete = PostComment::where('users_id', $id)->delete();
        $delete = Forum::where('users_id', $id)->delete();
        $delete = ForumPost::where('users_id', $id)->delete();
        $delete = ForumComment::where('users_id', $id)->delete();
        $delete = File::where('users_id', $id)->delete();
        $delete = Course::where('users_id', $id)->delete();
        $delete = CourseComment::where('users_id', $id)->delete();
        $delete = Event::where('users_id', $id)->delete();
        $delete = UserProfile::where('users_id', $id)->delete();
        $delete = UserSkill::where('users_id', $id)->delete();
        $delete = UserWork::where('users_id', $id)->delete();
        $delete = UserActivity::where('users_id', $id)->delete();
        $delete = UserEdu::where('users_id', $id)->delete();
        $delete = ChatUserData::where('id', $id)->delete();
        $delete = ChatConnection::where('user_id', $id)->delete();

        $delete = User::find( $id )->delete();


//        User::where('id', $id)->update(array(
//            //'actived'    =>  '1',
//            'state'    =>  '99',
//        ));

        return back()->with('message', 'عملیات شما با موفقیت انجام شد ');
    }





}