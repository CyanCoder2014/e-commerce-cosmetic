<?php

Route::group(['middleware' => 'web', 'prefix' => 'sellmodule', 'namespace' => 'Modules\SellModule\Http\Controllers'], function()
{
    Route::get('/', 'SellModuleController@index');
});
