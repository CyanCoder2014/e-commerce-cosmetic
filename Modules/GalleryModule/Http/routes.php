<?php

Route::group(['middleware' => 'web', 'prefix' => 'gallerymodule', 'namespace' => 'Modules\GalleryModule\Http\Controllers'], function()
{
    Route::get('/', 'GalleryModuleController@index');
});
