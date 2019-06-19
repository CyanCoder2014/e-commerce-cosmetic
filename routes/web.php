<?php
use App\ChatUserData;
use App\Notifications\Newsletter;
use App\Notifications\UserRegister;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;


Route::get('/sitemap.xml', 'SitemapController@sitemap');

if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}
Route::group(array('prefix' => Config::get('app.locale_prefix')), function () {

//    Route::get('/', 'PostController@index')->name('home');
    Route::get('/getcity/{id}', 'CityController@getcities')->name('getcities');

    Route::get('/', 'HomeController@index')->name('general');
    \App\Advertising::Route_list();
    \App\Product::Route_list();

    Route::get('/content/page/{id}', 'HomeController@page');

    Route::post('/search', 'HomeController@search')->name('search');
    Route::get('/search/ajax', 'SearchController@ajax')->name('search.ajax');
    Route::get('/sale', 'HomeController@sale')->name('sale');

    Route::get('register/activation/{url}', 'Auth\RegisterController@activateUser')->name('activation');

    Route::get('/profile/register', function () {
        return view('profile.register');
    })->name('registerComplete');


    Route::post('/contactus/send', 'ContactusController@send')->name('send.contactus');
    Route::get('/contactus', 'ContactusController@form')->name('form.contactus');
    Route::post('/mail/store', 'ContactusController@subscribe')->name('subscribe');


    Route::get('/aboutus', 'AboutusFrontController@show')->name('Aboutus');

    Route::get('test/{id}','TestFrontController@show')->name('front.test');
    Route::post('test/{id}','TestFrontController@save')->name('front.testDone');
    Route::get('result/{id}','TestFrontController@result')->name('front.testResult');


    Route::get('/test', function () {
        return view('chat.chat');
    });


    //////////////////// profile //////////////////////
    Route::group(['middleware' => 'auth','prefix' => 'profile'], function () {

        Route::get('/', function () {
            return view('layouts.userProfile_layout');
        })->name('profile');
        Route::get('/edit', 'ProfileController@editprofile')->name('profile.edit');
        Route::post('/edit', 'ProfileController@updateprofile');
        Route::get('/address', 'ProfileController@indexAddress')->name('address');
        Route::get('/address/add', 'ProfileController@addAddress')->name('address.create');
        Route::post('/address/add', 'ProfileController@createAddress')->name('address.add');
        Route::get('/address/{id}', 'ProfileController@editAddress')->name('address.edit');
        Route::post('/address/{id}', 'ProfileController@updateAddress')->name('address.update');
        Route::get('/address/delete/{id}', 'ProfileController@deleteAddress')->name('address.delete');


    });

    Route::get('/admin/', 'AdminController@index');


    Route::get('admin/advertising','AdminAdvertisingController@index')->name('admin.advertising');
    Route::get('admin/advertising/accept/{advertising}','AdminAdvertisingController@accept')->name('admin.advertising.accept');
    Route::get('admin/advertising/reject/{advertising}','AdminAdvertisingController@reject')->name('admin.advertising.reject');
    Route::get('admin/advertising/delete/{advertising}','AdminAdvertisingController@delete')->name('admin.advertising.delete');

    Route::get('admin/userprofile','AdminProfileController@index')->name('admin.userprofile');
    Route::get('admin/userprofile/accept/{userprofile}','AdminProfileController@accept')->name('admin.userprofile.accept');
    Route::get('admin/userprofile/reject/{userprofile}','AdminProfileController@reject')->name('admin.userprofile.reject');
    Route::get('admin/userprofile/delete/{userprofile}','AdminProfileController@delete')->name('admin.userprofile.delete');

    Route::get('/admin/provinces/find', 'ProvinceController@find');
    Route::get('/admin/city/find', 'CityController@find');


    Route::group(['prefix' => 'home'], function () {

        Auth::routes();
        Route::get('/logout', 'Auth\LoginController@logout');



        Route::get('admin/contactus/', ['uses'=>'ContactusController@index'])
            ->name('contactus')
            ->middleware('permission:reply contactus|delete contactus');
//        Route::post('admin//contactus/send', 'ContactusController@notify');
        Route::post('admin/contactus/reply/{url}', ['uses'=>'ContactusController@reply'])->name('contactus.reply')
            ->middleware('permission:reply contactus');
        Route::get('admin/contactus/destroy/{url}', ['uses'=>'ContactusController@destroy'])->name('contactus.delete')
            ->middleware('permission:delete contactus');
        Route::get('image-crop', 'ImageController@imageCrop');
        Route::post('image-crop', 'ImageController@imageCropPost')->name('upload.image');


        Route::get('/admin/slide/manage', 'AdminController@slide');
        Route::post('/admin/slide/{url}', 'AdminController@slideEdit');

//        Route::get('/intro', 'HomeController@index')->name('general');
//        Route::get('/intro/showMore/{url}', 'PostController@showMore');
//        Route::get('/intro/editPost/{url}', 'PostController@editPost');
//        Route::post('/intro/storePost/{url}', 'PostController@storePost');
//        Route::get('/intro/getComments/{url}/{id}', 'PostController@getComments');
//        Route::post('/intro/store', 'PostController@postStore');
//        Route::get('/post/ban/{id}', 'PostController@postBan');
//        Route::get('/post/report/{id}', 'PostController@postReport');
//        Route::get('/post/delete/{id}', 'PostController@postDelete');
//        Route::get('/post/edit/{id}', 'PostController@postUpdate');
//        Route::get('/post/like/{id}', 'PostController@postLike');
//        Route::post('/post/share/{id}', 'PostController@postShare');
//        Route::post('/intro/commentStore', 'PostController@postComment');
//        Route::get('/intro/commentRemove/{id}', 'PostController@deleteComment');
//        Route::get('/intro/likes/{id}', 'PostController@likeList');


//        Route::get('/forum/show/{url}', 'ForumController@forum');
//        Route::get('/forumdata', 'ForumController@forumdata');
//        Route::get('/forum/showMore/{url}', 'ForumController@showMore');
//        Route::get('/forum/getComments/{url}/{id}', 'ForumController@getComments');
//        Route::post('/forum/store', 'ForumController@postStore');
//        Route::get('/forum/ban/{id}', 'ForumController@postBan');
//        Route::get('/forum/report/{id}', 'ForumController@postReport');
//        Route::get('/forum/delete/{id}', 'ForumController@postDelete');
//        Route::get('/forum/edit/{id}', 'ForumController@postUpdate');
//        Route::get('/forum/like/{id}', 'ForumController@postLike');
//        Route::get('/forum/share/{id}', 'ForumController@postShare');
//        Route::post('/forum/commentStore', 'ForumController@postComment');
//        Route::get('/forum/category', 'ForumController@forumCat');
//        Route::get('/forum/list/{url}', 'ForumController@forumList');
//        Route::post('/forum/make', 'ForumController@forumMake');
//        Route::get('/forum/destroy/{id}', 'ForumController@forumDelete');
//        Route::get('/forum/request/{id}', 'ForumController@forumReq');
//        Route::get('/forum/accept/{id}/{userId}', 'ForumController@forumAccept');
//        Route::get('/forum/getdataby/{id}', 'ForumController@forumListGroup');
//        Route::post('/forum/groupadd', 'ForumController@groupMake');
//        Route::post('/forum/groupedit/{id}', 'ForumController@groupUpdate');
//        Route::get('/forum/groupremove/{id}', 'ForumController@groupDelete');


//        Route::get('/admin/category', function () {
//            return view('admin.category.category');
//        });
//        Route::get('/admin/list/2', 'AdminController@listCat2');
//        Route::get('/admin/category/destroy/{id}', 'AdminController@destroyCat2');
//        Route::post('/admin/category/update/{id}', 'AdminController@updateCat2');
//        Route::post('/admin/category/add', 'AdminController@addCat2');
//
//
//        Route::get('/admin/list/5', 'AdminController@listCat5');
//        Route::get('/admin/category5/destroy/{id}', 'AdminController@destroyCat5');
//        Route::post('/admin/category5/update/{id}', 'AdminController@updateCat5');
//        Route::post('/admin/category5/add', 'AdminController@addCat5');
//
//        // Route::get('/admin/category', 'AdminController@category');
//        Route::get('/admin/list/3', 'AdminController@listCat3');
//        Route::get('/admin/category3/destroy/{id}', 'AdminController@destroyCat3');
//        Route::post('/admin/category3/update/{id}', 'AdminController@updateCat3');
//        Route::post('/admin/category3/add', 'AdminController@addCat3');
//
//        Route::get('/admin/list/4', 'AdminController@listCat4');
//        Route::get('/admin/category4/destroy/{id}', 'AdminController@destroyCat4');
//        Route::post('/admin/category4/update/{id}', 'AdminController@updateCat4');
//        Route::post('/admin/category4/add', 'AdminController@addCat4');
//
//        Route::get('/admin/content/manage', 'AdminController@index');
//        Route::post('/admin/content/create', 'AdminController@create');
//        Route::post('/admin/content/update/{id}', 'AdminController@update');
//        Route::get('/admin/content/delete/{id}', 'AdminController@delete');

//        Route::get('/admin/post/manage', 'AdminController@postManage');
//        Route::get('/admin/post/allow/{id}', 'AdminController@postAllow');
//        Route::get('/admin/post/dismiss/{id}', 'AdminController@postDismiss');
//        Route::get('/admin/post/delete/{id}', 'AdminController@postDelete');

        Route::get('/admin/newsletter', 'UserController@newsletter')
            ->middleware('permission:newsletter');
        Route::get('/admin/managers', 'UserController@index')
            ->middleware('permission:add manager|edit manager|delete manager');
        Route::post('/admin/users', 'UserController@store')
            ->middleware('permission:add manager');
        Route::get('/admin/users', 'UserController@index2')
            ->middleware('permission:add user|edit user|delete user');
        Route::post('/admin/user/update/{id}', 'UserController@update')
            ->middleware('permission:edit manager|edit user');
        Route::get('/admin/user/active/{id}', 'UserController@active')->middleware('permission:edit manager|edit user');
        Route::get('/admin/user/ban/{id}', 'UserController@ban')->middleware('permission:edit manager|edit user');
        Route::get('/admin/user/ok/{id}', 'UserController@ok')->middleware('permission:edit manager|edit user');
        Route::get('/admin/user/delete/{id}', 'UserController@delete')
            ->middleware('permission:delete manager|delete user');
        Route::post('/admin/user/addForumCat/{id}', 'UserController@addForumCat');
        Route::get('/admin/user/removeForumCat/{id}/{cat}', 'UserController@removeForumCat');


//        Route::get('/profile/show/{user}', 'ProfileController@show')->name('profile');
//        Route::get('/profile/show/{user}/{id}', 'ProfileController@showPost')->name('post');
//        Route::get('/profile/follow/{user}', 'ProfileController@follow');
//        Route::get('/profile/deleteFollowing/{user}', 'ProfileController@deleteFollowing');
//        Route::get('/profile/deleteFollower/{user}', 'ProfileController@deleteFollower');
//        Route::get('/profile/edit', 'ProfileController@edit');
//        Route::get('/profile/complete', 'ProfileController@completeRegister');
//        Route::post('/profile/profileStore', 'ProfileController@profileStore');
//        Route::post('/profile/profileComplete', 'ProfileController@profileComplete');
//
//        Route::post('/profile/deleteFollower/{user}', 'ProfileController@deleteFollower');
//        Route::get('/profile/deleteFollowing/{user}', 'ProfileController@deleteFollowing');
//
//        Route::post('/profile/addEducation', 'ProfileController@addEducation');
//        Route::post('/profile/editEducation/{id}', 'ProfileController@editEducation');
//        Route::get('/profile/deleteEducation/{id}', 'ProfileController@deleteEducation');
//
//        Route::post('/profile/addWork', 'ProfileController@addWork');
//        Route::post('/profile/editWork/{id}', 'ProfileController@editWork');
//        Route::get('/profile/deleteWork/{id}', 'ProfileController@deleteWork');
//
//        Route::post('/profile/addArticle', 'ProfileController@addArticle');
//        Route::post('/profile/editArticle/{id}', 'ProfileController@editArticle');
//        Route::get('/profile/deleteArticle/{id}', 'ProfileController@deleteArticle');
//
//        Route::post('/profile/addSkill', 'ProfileController@addSkill');
//        Route::post('/profile/editSkill/{id}', 'ProfileController@editSkill');
//        Route::get('/profile/deleteSkill/{id}', 'ProfileController@deleteSkill');
//        Route::get('/profile/eSkill/{id}', 'ProfileController@endorseSkill');
//
//        Route::get('/profile/endorses/{id}', 'ProfileController@endorseList');
//
//        Route::post('/profile/editAbout/{id}', 'ProfileController@editAbout');
//
//        Route::post('/profile/addForum', 'ProfileController@addForum');
//        Route::get('/profile/deleteForum/{id}', 'ProfileController@deleteForum');

//
//        Route::get('/file/category', 'FileController@cats');
//        Route::get('/file/list/{id}', 'FileController@index');
//        Route::get('/file/delete/{id}', 'FileController@delete');
//        Route::post('/file/upload', 'FileController@upload')->name('upload');
//        Route::post('/file/search', 'FileController@search');


//        Route::get('/event/manage', 'EventController@manageList');
//        Route::post('/event/add', 'EventController@add');
//        Route::post('/event/edit/{id}', 'EventController@edit');
//        Route::get('/event/delete/{id}', 'EventController@delete');
//        Route::get('/event/list/{id}', 'EventController@index');
//        Route::get('/event/category', 'EventController@cat');


        Route::get('/mail/send/{asd}', 'MailController@mailto')->name('mail');
        Route::get('/post', 'HomeController@index')->name('home');


//        Route::get('/course/categories', 'CourseController@courseCat');
//        Route::get('/course/list/{id}', 'CourseController@courseList');
//        Route::get('/course/show/{id}', 'CourseController@show');
//        Route::get('/course/media/{id}', 'CourseController@media');
//
//        Route::get('/course/create', 'CourseController@courseCreate');
//        Route::post('/course/store', 'CourseController@courseStore');
//
//        Route::get('/course/edit/{id}', 'CourseController@edit');
//        Route::post('/course/update/{id}', 'CourseController@update');
//        Route::get('/course/delete/{id}', 'CourseController@delete');
//        Route::get('/course/manage', 'CourseController@manage');
//
//        Route::get('/slide/manage/{id}', 'CourseController@slideManage');
//        Route::post('/slide/add/{id}', 'CourseController@slideStore');
//        Route::get('/slide/remove/{id}', 'CourseController@slideRemove');
//
//        Route::get('/podcast/manage/{id}', 'CourseController@podManage');
//        Route::post('/podcast/add/{id}', 'CourseController@podStore');
//        Route::get('/podcast/remove/{id}', 'CourseController@podRemove');




































        Route::get('message/inbox/{id}', 'MessageController@inbox');
        Route::post('admin/message/{id}', 'MessageController@message');
        Route::post('admin/send/group', 'MessageController@notify');
        Route::get('admin/get/usernames', 'MessageController@getUsernames');


        Route::post('admin/Qcat/get','QcatController@getoptions')->name('Qcat.get');
        Route::resource('admin/Qcat', 'QcatController',['names' =>[
            'index' => 'Qcat.index',
            'store' => 'Qcat.add',
            'update' => 'Qcat.update',
            'destroy' => 'Qcat.delete'
        ],
            'only' =>['index','store','update','destroy']
            ,
            'middleware' => [
                'index' => 'permission:create-post',
                'create' => 'permission:create-post',
                'store' => 'permission:create-post',
                'destroy' => 'permission:create-post',
            ],
        ]);

        Route::get('admin/Question/{id}','QuestionController@index')->name('Q.index');
        Route::resource('admin/Question', 'QuestionController',['names' =>[
            'store' => 'Q.add',
            'update' => 'Q.update',
            'destroy' => 'Q.delete'
        ],
            'only' =>['store','update','destroy']]);

        Route::resource('admin/Test', 'TestController',['names' =>[
            'index' => 'Test.index',
            'store' => 'Test.add',
            'update' => 'Test.update',
            'destroy' => 'Test.delete'
        ],
            'only' =>['index','store','update','destroy']]);
        Route::resource('admin/role', 'AdminRoleController',['names' =>[
            'index' => 'role.index',
            'store' => 'role.add',
            'update' => 'role.update',
            'destroy' => 'role.delete'
        ],
            'only' =>['index','store','update','destroy'],
            'middleware' => [
                'index' => 'permission:add role|edit role|delete role',
                'store' => 'permission:add role',
                'update' => 'permission:edit role',
                'destroy' => 'permission:delete role',
            ],
        ]);
        Route::get('/admin/role/find', 'AdminRoleController@find')->name('role.find');

        Route::group(['middleware' => ['auth','permission:setting'], 'prefix' => '/admin/utility'], function()
        {
            Route::get('/{name}',['as'=>'utility.index','uses'=>'Utility\UtiliyController@index']);
            Route::post('/{name}',['as'=>'utility.store','uses'=>'Utility\UtiliyController@store']);
            Route::post('/{name}/{id}',['as'=>'utility.update','uses'=>'Utility\UtiliyController@update']);
            Route::get('/{name}/delete/{id}',['as'=>'utility.destroy','uses'=>'Utility\UtiliyController@destroy']);

        });
    });








    //ezafe
    Route::post('user/show', 'UserProfileController@store');
    Route::get('user/register', 'UserProfileController@showRegistrationForm');

    Route::group(['middleware' => 'auth','prefix' => 'profile'], function () {
//           $type=\App\UserProfile::orderby('type','desc')-> get() ;
//            if ( )
//                endif
        Route::get('/seller', function () {
            return view('layouts.userProfile_layout');
        })->name('profile');
        Route::get('/edit', 'ProfileController@editprofile')->name('profile.edit');
        Route::post('/edit', 'ProfileController@updateprofile');
        Route::get('/address', 'ProfileController@indexAddress')->name('address');
        Route::get('/address/add', 'ProfileController@addAddress')->name('address.create');
        Route::post('/address/add', 'ProfileController@createAddress')->name('address.add');
        Route::get('/address/{id}', 'ProfileController@editAddress')->name('address.edit');
        Route::post('/address/{id}', 'ProfileController@updateAddress')->name('address.update');
        Route::get('/address/delete/{id}', 'ProfileController@deleteAddress')->name('address.delete');


    });
//ezafe


    Route::get('/profile/seller/{url}', 'ProfileController@profileseller')->name('profileseller');
    Route::get('/profile/sellerList', 'ProfileController@sellerList')->name('sellerList');
    Route::get('/advertise/{url}', 'ShowController@Advertise')->name('advertise.show');
    Route::get('/profile/repairman/{url}', 'ProfileController@profilerepairman');





    Route::get('/profile/register', 'ProfileController@registerComplete');

    Route::get('/advertising/creating', 'AdvertisingController@create');
    Route::get('/getcollection', 'AdvertisingController@getCollection');
    Route::get('/getproduct', 'AdvertisingController@getProduct');
    Route::post('/advertising/creating', 'AdvertisingController@store');








});