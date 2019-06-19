<?php

Route::group(['middleware' => 'web', 'prefix' => 'notifymodule', 'namespace' => 'Modules\NotifyModule\Http\Controllers'], function()
{
    Route::get('/', 'NotifyModuleController@index');
});
