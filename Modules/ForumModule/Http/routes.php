<?php

Route::group(['middleware' => 'web', 'prefix' => 'forummodule', 'namespace' => 'Modules\ForumModule\Http\Controllers'], function()
{
    Route::get('/', 'ForumModuleController@index');
});
