<?php

Route::group(['middleware' => 'web', 'prefix' => 'coursemodule', 'namespace' => 'Modules\CourseModule\Http\Controllers'], function()
{
    Route::get('/', 'CourseModuleController@index');
});
