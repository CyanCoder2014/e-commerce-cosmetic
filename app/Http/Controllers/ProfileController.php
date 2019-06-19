<?php

namespace App\Http\Controllers;

use App\ChatConnection;
use App\ChatUserData;
use App\City;
use App\Contents\Post;
use App\Province;
use App\User;
use App\UserActivity;
use App\UserAddress;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Advertising;

class ProfileController extends Controller
{




    public function registerComplete()
    {

        $this->middleware('auth');
        $provinces = Province::all();
        $user = Auth::user();
        return view('profile.register',compact('provinces','user'));
    }


    public function updateregisterComplete(Request $request)
    {

        $this->middleware('auth');
        $user = Auth::user();
        $profile = $user->profile;
        if(!$profile){
            $profile = new UserProfile();
            $profile->user_id = Auth::id();
        }
        $user->name = ($request->name)?$request->name:$user->name;
        $user->family = ($request->family)?$request->family:$user->family;
        $user->save();
        $profile->perosn = $request->person;
        $profile->type = $request->type;
        $profile->type_sub = $request->type_sub;
        $profile->country_id = $request->country_id;
        $profile->job = $request->job;
        $profile->eduaction = $request->eduaction;
        $profile->tell = $request->tell;
        $profile->mobile = $request->mobile;
        $profile->post_code = $request->post_code;
        $profile->address = $request->address;
        $profile->site = $request->site;
        $profile->site = $request->site;
        $profile->save();

        return back()->with('message','پروفایل شما با موفقیت ویرایش شد');
    }




    public function profileseller($url){

        $dataDetail = explode('-', $url);
        $dataId = $dataDetail[1];

        $profileseller = UserProfile::where('id' , $dataId)->first();
        if ($profileseller->active != 2)
            return abort(404);

        $advertisings = Advertising::activate()->orderby('id','desc')->where('user_id',$profileseller->user_id)->paginate(20);


//        $setting=Utility::where('type',"setting")->orderBy('id', 'desc')->first();
//        $utility=array();
//        $utility['about_us']=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();
//
////        $content = ContentModel::where('id',$dataId)->first();
//
////->where('published', '1')
//        $comments = CommentModel::where('post_id',$dataId)->where('parent_id',null)->where('published',1)->orderby('id', 'desc')->paginate(100);
//
//        $content_11 = ContentModel::where('catid','11')->where('publish','0')->orderby('id','desc')->paginate(4);
//        $content_22 = ContentModel::where('catid','22')->where('publish','0')->orderby('id','desc')->paginate(4);
//
//        $content_19 = ContentModel::where('catid','19')->where('publish','0')->orderby('id','desc')->paginate(4);
//        $content_17 = ContentModel::where('catid','17')->where('publish','0')->orderby('id','desc')->paginate(4);
//
//        $content_28 = ContentModel::where('catid','28')->where('publish','0')->orderby('id','desc')->paginate(4);
//        $content_49 = ContentModel::where('catid','49')->where('publish','0')->orderby('id','desc')->paginate(4);
//
//        $prcategories = PrCategoryModel::orderby('id', 'desc')->paginate(70);
//
//        $categories = CategoryModel::orderby('id', 'desc')->paginate(70);
//        $utility['contact']=Utility::where('type',"contact")->orderBy('id', 'desc')->first();


        return view('user.profileseller' , ['profileseller' => $profileseller,
            'advertisings' => $advertisings
        ] );

    }

    public function sellerList(Request $request){


        $profilesellers = UserProfile::activate()->orderBy('id','desc')->has('user');//->paginate(10);
        if (isset($request->type) && ctype_digit($request->type))
            $profilesellers = $profilesellers->where('type',$request->type);
        if (isset($request->province_id) && ctype_digit($request->province_id) && !isset($request->city_id)){
            $province = Province::find($request->province_id);
            if($province){
                $profilesellers = $profilesellers->whereIn('country_id',$province->cities->pluck('id'));
            }
        }
        if (isset($request->city_id) && ctype_digit($request->city_id))
            $profilesellers = $profilesellers->where('country_id',$request->city_id);

        if (isset($request->type_sub) && ctype_digit($request->type_sub))
            $profilesellers = $profilesellers->where('type_sub',$request->type_sub);

        if (isset($request->brand_id) && ctype_digit($request->brand_id))
            $profilesellers = $profilesellers->with('brands')->whereHas('brands', function($query) use ($request) {
                $query->where('brand_id', $request->brand_id);
            });

        $profilesellers = $profilesellers->paginate(10);

        $provinces = Province::all();



        return view('profile.sellerList' , compact('profilesellers','provinces') );

    }






    public function profilerepairman(){
        $user=Auth::user();
        return view('user.profilerepairman',compact('user'));
    }


    public function editprofile(){
        $user=Auth::user();
        return view('profile.editprofile',compact('user'));
    }
    public function updateprofile(Request $request){
        $user=Auth::user();
        $validation=[
            'name' => 'required',
        ];
        if($request->email == $user->email)
            $validation['email'] = 'required|email';
        else
            $validation['email'] = 'required|email|unique:users';
        if($request->username == $user->username)
            $validation['username'] = 'required|string|max:255';
        else
            $validation['username'] = 'required|string|max:255|unique:users';
        if($request->mobile == $user->mobile)
            $validation['mobile'] = 'required|digits:11';
        else
            $validation['mobile'] = 'required|digits:11|unique:users';
        if (isset($request->password))
            $validation['password']  = 'string|min:6|confirmed';
        $this->validate($request,$validation);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        if (isset($request->password))
            $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('message','اطلاعات کاربری شما ویرایش شد');
    }
    public function indexAddress(){
        $addresses=UserAddress::where('user_id',Auth::id())->get();
        return view('profile.address_index',compact('addresses'));
    }

    public function addAddress(){
        $provinces=Province::all();
        return view('profile.address_add',compact('provinces'));
    }
    public function createAddress(Request $request){
        $this->validate($request,[
            'postcode' => 'required|string|digits:10',
            'address' => 'required|string',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);
        $user = Auth::user();
        $address = New UserAddress();
        $address->postcode= $request->postcode;
        $address->address= $request->address;
        $address->province_id= $request->province_id;
        $address->city_id= $request->city_id;
        $address->user_id= $user->id;
        $address->company_name= $user->company;
        $address->firstname= (isset($request->firstname))? $request->firstname : $user->name ;
        $address->lastname= (isset($request->lastname))? $request->lastname : $user->family ;
        $address->phone= (isset($request->phone))? $request->phone : $user->mobile ;
        $address->save();
        if(isset($request->redirect) && $request->redirect == 0)
            return redirect(route('address'))->with('message', 'آدرس جدید شما با موفقیت افزوده شد');
        return back()->with('message', 'آدرس جدید شما با موفقیت افزوده شد');


    }
    public function editAddress($id){
        $address=UserAddress::findOrFail($id);
        $provinces=Province::all();
        if($address->user_id == Auth::id())
            return view('profile.address_edit',compact('address','provinces'));
        else
            return view('errors.404');
    }
    public function updateAddress(Request $request,$id){
        $this->validate($request,[
            'postcode' => 'required|string|digits:10',
            'address' => 'required|string',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);
        $user = Auth::user();
        $address=UserAddress::findOrFail($id);
        if($address->user_id != Auth::id())
            return view('errors.404');
        $address->postcode= $request->postcode;
        $address->address= $request->address;
        $address->province_id= $request->province_id;
        $address->city_id= $request->city_id;
        $address->user_id= $user->id;
        $address->company_name= $user->company;
        $address->firstname= (isset($request->firstname))? $request->firstname : $user->name ;
        $address->lastname= (isset($request->lastname))? $request->lastname : $user->family ;
        $address->phone= (isset($request->phone))? $request->phone : $user->mobile ;
        $address->save();
        return redirect(route('address'))->with('message', 'آدرس شما با موفقیت به روز رسانی شد');


    }
    public function deleteAddress($id){
        $address=UserAddress::findOrFail($id);
        if($address->user_id != Auth::id())
            return view('errors.404');
        $address->delete();
        return redirect(route('address'))->with('message', 'آدرس شما با موفقیت حذف شد');
    }

//    public $user;
//
//
//    public function show(Request $request, $userCode)
//    {
//        $userDetail = explode('-', $userCode);
//        $userId = $userDetail[1];
//        $user = User::find($userId);
//
//        $posts = Post::where('users_id', $userId)->paginate(5);
//        if ($request->ajax()) {
//            $view = view('data', compact('posts'))->render();
//            return response()->json(['html' => $view]);
//        }
//        return view('profile.show', compact('user', 'posts'));
//    }
//
//
//
//    public function showPost(Request $request, $userCode, $id)
//    {
//        $userDetail = explode('-', $userCode);
//        $userId = $userDetail[1];
//        $user = User::find($userId);
//
//        $notification = Auth::user()->notifications()->where('id', $id)->first();
//        $notification->markAsRead();
//
//        $posts = Post::where('id', $notification->data['id'])->paginate(5);
//
//
//
//        if ($request->ajax()) {
//            $view = view('data', compact('posts'))->render();
//            return response()->json(['html' => $view]);
//        }
//        return view('profile.showPost', compact('user', 'posts'));
//    }
//
//
//
//
//    public function follow($userCode)
//    {
//        $id = Auth::id();
//        $userFollower = User::find($id);
//
//        $userDetail = explode('-', $userCode);
//        $userId = $userDetail[1];
//        $userFollowing = User::find($userId);
//
//        if (UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->first() !== null) {
//            $error = '2';
//            $message = 'همراهی شده لغو شد';
//
//            $userFollower->connections()->where('connections_id', '10')->where('followings_id', $userId)->delete();
//            $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $id)->delete();
//
//            UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
//            UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();
//
//
//            /*
//             * For chat user connection
//             */
//            ChatConnection::where('user_id', $id)->where('connection_id', $userId)->delete();
//
//
//        } else {
//            $connection1 = $userFollower->connections()->create([
//                'followings_id' => $userId,
//                'connections_id' => '10',
//            ]);
//
//            $connection2 = $userFollowing->connections()->create([
//                'followers_id' => $id,
//                'connections_id' => '10',
//            ]);
//
//            $activity = new UserActivity;
//            $activity->types_id = '10';
//            $activity->users_id = $id;
//            $activity->targets_id = $userId;
//            $activity->save();
//
//            $activity = new UserActivity;
//            $activity->types_id = '10';
//            $activity->users_id = $userId;
//            $activity->targets_id = $id;
//            $activity->save();
//
//            $error = '0';
//            $message = 'شما به شبکه همراهان این کاربر پیوستید';
//
//
//            $users = User::where('id', $userId)->get();
//            //Notification::send($users, new \App\Notifications\Event($id, 'همراهی', 'شما را همراهی کرد'));
//
//
//            /*
//             * For chat user connection
//             */
//            if (UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->first() !== null) {
//                $activity = new ChatConnection;
//                $activity->user_id = $id;
//                $activity->connection_id = $userId;
//                $activity->save();
//
//                $activity1 = new ChatConnection;
//                $activity1->user_id = $userId;
//                $activity1->connection_id = $id;
//                $activity1->save();
//            }
//
//
//        }
//
//        return back()->with('message', $message);
//    }
//
//    public function completeRegister()
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//        $posts = Post::where('users_id', $id)->paginate(5);
//
//        return view('profile.register', compact('user', 'posts'));
//    }
//
//
//    public function edit()
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//        $posts = Post::where('users_id', $id)->paginate(5);
//
//        return view('profile.edit', compact('user', 'posts'));
//    }
//
//
//    public function profileStore(Request $request)
//    {
////        $user = User::find(Auth::id());
////        if ($user !== null) {
////            $user->update(array(
////                'actived' => '1',
////            ));
////        }
//
//        if ($request->mobile == "") {
//            $request->mobile = "000";
//        }
//        if ($request->introduce == "") {
//            $request->introduce = "نامشخص";
//        }
//        if ($request->site == "") {
//            $request->site = "نامشخص";
//        }
//        if ($request->tell == "") {
//            $request->tell = "00";
//        }
//        if ($request->mobile == "") {
//            $request->mobile = "00";
//        }
//        if ($request->name == "") {
//            $request->name = "نامشخص";
//        }
//        if ($request->family == "") {
//            $request->family = "نامشخص";
//        }
//        if ($request->job == "") {
//            $request->job = "نامشخص";
//        }
//        if ($request->education == "") {
//            $request->education = "نامشخص";
//        }
//
//
//
//        if ($request->remove_image == "1") {
//            $request->image = "0077.jpg";
//        } else {
//
//            if ($request->image_u !== null) {
//                $imageName = time() . '.' . $request->image_u->getClientOriginalExtension();
//                $request->image_u->move(public_path('user-img'), $imageName);
//                $FileName = time() . '.' . $request->file('image_u')->getClientOriginalExtension();
//                $request->image = $FileName;
//            }
//        }
//
//        if ($request->remove_image_b == "1") {
//            $request->image_b = "3-sm.jpg";
//        } else {
//            if ($request->image_ub !== null) {
//                $imageName = time() . '.' . $request->image_ub->getClientOriginalExtension();
//                $request->image_ub->move(public_path('user-img'), $imageName);
//                $FileName = time() . '.' . $request->file('image_ub')->getClientOriginalExtension();
//                $request->image_b = $FileName;
//            }
//        }
//
//
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $information = $user->update([
//            'name' => $request->name,
//            'family' => $request->family,
//            'actived' => '1',
//        ]);
//
//
//        if ($user->profile == null) {
//            $profile = $user->profile()->create([
//                'users_id' => $id,
//                'job' => $request->job,
//                'education' => $request->education,
//                'tell' => $request->tell,
//                'mobile' => $request->mobile,
//                'introduce' => $request->introduce,
//                'site' => $request->site,
//                'image' => $request->image,
//                'image_b' => $request->image_b,
//            ]);
//        } else {
//            $profile = $user->profile()->update([
//                'job' => $request->job,
//                'education' => $request->education,
//                'tell' => $request->tell,
//                'mobile' => $request->mobile,
//                'introduce' => $request->introduce,
//                'site' => $request->site,
//                'image' => $request->image,
//                'image_b' => $request->image_b,
//            ]);
//        }
//
//        if ($user->social == null) {
//            $social = $user->social()->create([
//                'users_id' => $id,
//                'linkedin' => $request->linkedin,
//                'instagram' => $request->instagram,
//                'facebook' => $request->facebook,
//                'tweeter' => $request->tweeter,
//                'google' => $request->google,
//                'karamun' => $request->karamun,
//
//            ]);
//        } else {
//            $social = $user->social()->update([
//                'linkedin' => $request->linkedin,
//                'instagram' => $request->instagram,
//                'facebook' => $request->facebook,
//                'tweeter' => $request->tweeter,
//                'google' => $request->google,
//                'karamun' => $request->karamun,
//
//            ]);
//        }
//
//
//        $userChat  = ChatUserData::where('id', $id)->first();
//        $userChat->update([
//            'picname' => $request->image_b,
//        ]);
//
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function profileComplete(Request $request)
//    {
////        $user = User::find(Auth::id());
////        if ($user !== null) {
////            $user->update(array(
////                'actived' => '1',
////            ));
////        }
//
//        if ($request->mobile == "") {
//            $request->mobile = "000";
//        }
//        if ($request->introduce == "") {
//            $request->introduce = "نامشخص";
//        }
//        if ($request->site == "") {
//            $request->site = "نامشخص";
//        }
//        if ($request->tell == "") {
//            $request->tell = "00";
//        }
//        if ($request->mobile == "") {
//            $request->mobile = "00";
//        }
//        if ($request->name == "") {
//            $request->name = "نامشخص";
//        }
//        if ($request->family == "") {
//            $request->family = "نامشخص";
//        }
//        if ($request->job == "") {
//            $request->job = "نامشخص";
//        }
//        if ($request->education == "") {
//            $request->education = "نامشخص";
//        }
//
//
//        if ($request->image == "") {
//            $request->image = "0077.jpg";
//        }
//        if ($request->education == "") {
//            $request->image_b = "3-sm.jpg";
//        }
//
//
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $information = $user->update([
//            'name' => $request->name,
//            'family' => $request->family,
//            'actived' => '1',
//        ]);
//
//        if ($user->profile == null) {
//            $profile = $user->profile()->create([
//                'users_id' => $id,
//                'job' => $request->job,
//                'education' => $request->education,
//                'tell' => $request->tell,
//                'mobile' => $request->mobile,
//                'introduce' => $request->introduce,
//                'site' => $request->site,
//                'image' => "0077.jpg",
//                'image_b' => "3-sm.jpg",
//            ]);
//        } else {
//            $profile = $user->profile()->update([
//                'job' => $request->job,
//                'education' => $request->education,
//                'tell' => $request->tell,
//                'mobile' => $request->mobile,
//                'introduce' => $request->introduce,
//                'site' => $request->site,
//                'image' => "0077.jpg",
//                'image_b' => "3-sm.jpg",
//            ]);
//        }
//
//        $users = User::where('id', $id)->get();
//        Notification::send($users, new \App\Notifications\Event('80', 'خوش آمدگویی', 'اطلاعات با موفقیت تکمیل شد'));
//
//
//        return redirect('/')->with('message', 'تکمیل مشخصات با موفقیت انجام شد');
//    }
//
//
//    public function deleteFollower($userCode)
//    {
//        $id = Auth::id();
//        $userFollower = User::find($id);
//
//        $userDetail = explode('-', $userCode);
//        $userId = $userDetail[1];
//        $userFollowing = User::find($userId);
//
//        $userFollower->connections()->where('connections_id', '10')->where('followings_id', $id)->delete();
//        $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $userId)->delete();
//
//        UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
//        UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();
//
//        /*
//         * For chat user connection
//         */
//        ChatConnection::where('user_id', $userId)->where('connection_id', $id)->delete();
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function deleteFollowing($userCode)
//    {
//        $id = Auth::id();
//        $userFollower = User::find($id);
//
//        $userDetail = explode('-', $userCode);
//        $userId = $userDetail[1];
//        $userFollowing = User::find($userId);
//
//        $userFollower->connections()->where('connections_id', '10')->where('followings_id', $userId)->delete();
//        $userFollowing->connections()->where('connections_id', '10')->where('followers_id', $id)->delete();
//
//        UserActivity::where('types_id', '10')->where('users_id', $id)->where('targets_id', $userId)->delete();
//        UserActivity::where('types_id', '10')->where('users_id', $userId)->where('targets_id', $id)->delete();
//
//        /*
//         * For chat user connection
//         */
//        ChatConnection::where('user_id', $id)->where('connection_id', $userId)->delete();
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function addEducation(Request $request)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $profile = $user->educations()->create([
//            'users_id' => $id,
//            'title' => $request->title,
//            'start_month' => $request->start_month,
//            'start_year' => $request->start_year,
//            'finish_month' => $request->finish_month,
//            'finish_year' => $request->finish_year,
//            'major' => $request->major,
//            'place' => $request->place,
//        ]);
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function editEducation(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $edu = \App\UserEdu::where('id', $eduId)->where('users_id', $id);
//        $edu->update([
//            'users_id' => $id,
//            'title' => $request->title,
//            'start_month' => $request->start_month,
//            'start_year' => $request->start_year,
//            'finish_month' => $request->finish_month,
//            'finish_year' => $request->finish_year,
//            'major' => $request->major,
//            'place' => $request->place,
//        ]);
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function deleteEducation($userCode)
//    {
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function addWork(Request $request)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $profile = $user->works()->create([
//            'users_id' => $id,
//            'title' => $request->title,
//            'start_month' => $request->start_month,
//            'start_year' => $request->start_year,
//            'finish_month' => $request->finish_month,
//            'finish_year' => $request->finish_year,
//            'major' => $request->major,
//            'place' => $request->place,
//        ]);
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function editWork(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $edu = \App\UserWork::where('id', $eduId)->where('users_id', $id);
//        $edu->update([
//            'users_id' => $id,
//            'title' => $request->title,
//            'start_month' => $request->start_month,
//            'start_year' => $request->start_year,
//            'finish_month' => $request->finish_month,
//            'finish_year' => $request->finish_year,
//            'major' => $request->major,
//            'place' => $request->place,
//        ]);
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function deleteWork($userCode)
//    {
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function addArticle(Request $request)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        if ($request->file !== null) {
//            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
//            $request->file->move(public_path('article-file'), $imageName);
//            $FileName = time() . '.' . $request->file('file')->getClientOriginalExtension();
//            $request->file = $FileName;
//        }
//        if ($request->file == "") {
//            $request->file = 'null';
//        }
//
//        $profile = $user->articles()->create([
//            'users_id' => $id,
//            'title' => $request->title,
//            'publish_date' => $request->publish_date,
//            'journal' => $request->journal,
//            'link' => $request->link,
//            'file' => $request->file,
//            'coworker' => $request->coworker,
//            'type' => $request->type,
//        ]);
//
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function editArticle(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//
//        if ($request->file_b !== null) {
//            $imageName = time() . '.' . $request->file_b->getClientOriginalExtension();
//            $request->file_b->move(public_path('article-file'), $imageName);
//            $FileName = time() . '.' . $request->file('file_b')->getClientOriginalExtension();
//            $request->file = $FileName;
//        }
//        if ($request->file == "") {
//            $request->file = 'null';
//        }
//
//        $edu = \App\UserArticle::where('id', $eduId)->where('users_id', $id);
//        $edu->update([
//            'users_id' => $id,
//            'title' => $request->title,
//            'publish_date' => $request->publish_date,
//            'journal' => $request->journal,
//            'link' => $request->link,
//            'file' => $request->file,
//            'coworker' => $request->coworker,
//            'type' => $request->type,
//        ]);
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function deleteArticle(Request $request, $eduId)
//    {
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function addSkill(Request $request)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $profile = $user->skills()->create([
//            'users_id' => $id,
//            'title' => $request->title,
//
//        ]);
//
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function editSkill(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $edu = \App\UserSkill::where('id', $eduId)->where('users_id', $id);
//        $edu->update([
//            'users_id' => $id,
//            'title' => $request->title,
//
//        ]);
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function deleteSkill(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $edu = \App\UserSkill::where('id', $eduId)->where('users_id', $id);
//        $edu->delete();
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//    public function endorseSkill($eduId)
//    {
//        $this->user = Auth::id();
//
//        if (UserActivity::where('types_id', '99')->where('users_id', $this->user)->where('targets_id', $eduId)->first() !== null) {
//            $error = '2';
//            $message = 'تایید شما از این مهارت لغو شد';
//
//            $edu = \App\UserSkill::where('id', $eduId);
//            $edu->update([
//                'score' => \App\UserSkill::find($eduId)->score - 1,
//
//            ]);
//            UserActivity::where('types_id', '99')->where('users_id', $this->user)->where('targets_id', $eduId)->delete();
//
//
//        } else {
//
//
//            $edu = \App\UserSkill::where('id', $eduId);
//            $edu->update([
//                'score' => \App\UserSkill::find($eduId)->score + 1,
//
//            ]);
//
//
//            $activity = new UserActivity;
//            $activity->types_id = '99';
//            $activity->users_id = $this->user;
//            $activity->targets_id = $eduId;
//            $activity->save();
//
//            $error = '0';
//            $message = 'ok';
//
//
//        }
//
//        return response()->json(['message' => $message, 'error' => $error, 'result' => \App\UserSkill::find($eduId)->score]);
//
//    }
//
//
//
//
//
//
//
//
//
//    public function endorseList($id)
//    {
//
//        $usersLike = UserActivity::where('types_id', '99')->where('targets_id', $id)->paginate(200);
//
//
//        $view = view('likes', compact('usersLike'))->render();
//        return response()->json(['users' => $view]);
//
//    }
//
//
//
//
//
//
//    public function editAbout(Request $request, $eduId)
//    {
//        $id = Auth::id();
//        $user = User::find($id);
//
//        $profile = $user->profile()->update([
//            'intro' => $request->intro,
//        ]);
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }
//
//
//    public function deleteForum($userCode)
//    {
//
//        return back()->with('message', 'تغییرات با موفقیت انجام شد');
//    }


}
