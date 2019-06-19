<?php
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}
Route::group(array('prefix' => Config::get('app.locale_prefix')), function () {
    Route::group(['middleware' => 'web', 'prefix' => 'content', 'namespace' => 'Modules\BlogModule\Http\Controllers'], function()
{
//    Route::get('/', 'BlogModuleController@index');



    Route::get('/', 'HomeController@index')->name('home');


    Route::get('/show/{id}', 'HomeController@show')->name('content.show');
    Route::get('/category/{id}', 'HomeController@category')->name('content.cat');
    Route::get('/magazine/all', 'HomeController@magazine')->name('content.magazine');


    Route::post('/comment/send','CommentController@postComment')->name('content.comment.send');




    Route::get('/home/intro', 'AdminController@index');
    Route::get('/admin', 'AdminController@index');


    Route::get('/admin/data', 'AdminController@data');
    Route::post('/admin/data/add/', 'AdminController@dataAdd');
    Route::post('/admin/data/update/{id}', 'AdminController@dataUpdate');
    Route::get('/admin/data/delete/{id}', 'AdminController@dataDelete');


    Route::get('/admin/content/manage', 'AdminController@contentList')->name('content.index')
        ->middleware('permission:add content|edit content|delete content');
    Route::get('/admin/content/add/', 'AdminController@contentCreate')
        ->middleware('permission:add content');

    Route::post('/admin/content/add/', 'AdminController@contentAdd')->name('content.add')
        ->middleware('permission:add content');
    Route::get('/admin/content/edit/{id}', 'AdminController@contentEdit')->name('content.edit')
        ->middleware('permission:edit content');

    Route::post('/admin/content/update/{id}', 'AdminController@contentUpdate')
        ->middleware('permission:edit content');
    Route::get('/admin/content/delete/{id}', 'AdminController@contentDelete')
        ->middleware('permission:delete content');

    Route::get('/admin/category/manage', 'AdminController@listContentCat')
        ->middleware('permission:add ccat|edit ccat|delete ccat');
    Route::post('/admin/category5/update/{id}', 'AdminController@updateContentCat')
        ->middleware('permission:edit ccat');
    Route::post('/admin/category5/add', 'AdminController@addContentCat')
        ->middleware('permission:add ccat');
    Route::get('/admin/category5/destroy/{id}', 'AdminController@destroyContentCat')
        ->middleware('permission:delete ccat');

    Route::get('/admin/content/comment/manage', 'AdminCommentController@index')->name('content.comment.list')
        ->middleware('permission:apply ccomment|reply ccomment|delete ccomment');
    Route::get('/admin/content/comment/accept/{id}', 'AdminCommentController@accept')->name('content.comment.accept')
        ->middleware('permission:apply ccomment');
    Route::get('/admin/content/comment/deny/{id}', 'AdminCommentController@deny')->name('content.comment.deny')
        ->middleware('permission:apply ccomment');
    Route::get('/admin/content/comment/delete/{id}', 'AdminCommentController@destroy')->name('content.comment.delete')
        ->middleware('permission:delete ccomment');
    Route::post('/admin/content/comment/reply', 'AdminCommentController@store')->name('content.comment.reply')
        ->middleware('permission:reply ccomment');













});
});