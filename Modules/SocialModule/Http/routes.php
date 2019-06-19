<?php

Route::group(['middleware' => 'web', 'prefix' => 'socialmodule', 'namespace' => 'Modules\SocialModule\Http\Controllers'], function()
{
    Route::get('/', 'SocialModuleController@index');
});
