<?php
if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));
    Config::set('app.locale_prefix', Request::segment(1));
}
Route::group(array('prefix' => Config::get('app.locale_prefix')), function () {
    Route::group(['middleware' => 'web', 'prefix' => 'shop', 'namespace' => 'Modules\ShopModule\Http\Controllers'], function () {
        Route::get('/', 'BlogModuleController@index');

        Route::get('/getcollections/{id}', 'AjaxController@getcollection')->name('getcollections');

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/download/{id}', 'DownloadController@download')->name('Pfile.download');
        Route::get('/stream/{id}', 'DownloadController@getvideo')->name('Pfile.stream');
        Route::get('/show/', 'DownloadController@listDownload')->name('shop.listp');
        Route::get('/history/', 'OrderController@history')->name('shop.history');
        Route::get('/search', 'SearchController@search')->name('shop.search');
        Route::post('/search', 'SearchController@search')->name('shop.search');
        Route::get('/brand/{url}', 'SearchController@brand')->name('shop.brand');
        Route::get('/brand/list/all',function ()
        {
            $brands=\Modules\ShopModule\Products\Brand::orderBy('id', 'desc')->get();
                return view('shopmodule::list',compact('brands'));}
        );

        Route::get('/category/{url}', 'SearchController@category')->name('shop.category');
        Route::get('/collection/{url}', 'SearchController@collection')->name('shop.category');
        Route::get('/provider/{url}', 'SearchController@provider')->name('shop.provider');


        Route::get('/show/{id}', 'HomeController@show')->name('shop.show');
//        Route::get('/category/{id}', 'HomeController@category')->name('shop.category');

        Route::post('/product/comment', 'CommentController@productComment')->name('product.comment.add');

        Route::get('/Order/add', 'OrderController@AddOrder')->name('shop.addorder');

        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', 'OrderController@index')->name('shop.basket');
            Route::get('/checkout', 'OrderController@checkout_in')->name('shop.checkout');
            Route::post('/shipping', 'OrderController@shipping')->name('shop.shipping');
            Route::post('/comfirmation', 'OrderController@comfirmation')->name('shop.comfirmation');
            Route::get('/payment', 'OrderController@payment')->name('shop.payment');
            Route::post('/payment/{id}', 'OrderController@payment_verify')->name('shop.payment.verify');
            Route::get('add', 'CartController@addCart')->name('cart.add');
            Route::get('update/', 'CartController@updateCart')->name('cart.update');
            Route::get('updatePage/', 'CartController@updateCartPage')->name('cart.updatePage');
            Route::get('delete', 'CartController@deleteCart')->name('cart.delete');
            Route::get('get', 'CartController@getCart')->name('cart.get');
        });


        Route::get('/advertising/manage', 'AdvertisingController@productList')->name('advertising.index');
        Route::get('/advertising/show/{id}', 'AdvertisingController@advertiseShow')->name('advertising.show')
           ;
        Route::get('/advertising/add/', 'AdvertisingController@productAddPage')->name('advertising.addpage')
            ;
        Route::post('/advertising/add/', 'AdvertisingController@productAdd')->name('advertising.add')
            ;
        Route::get('/advertising/edit/{id}', 'AdvertisingController@productEdit')->name('advertising.edit')
           ;
        Route::post('/advertising/update/{id}', 'AdvertisingController@productUpdate')->name('advertising.update')
            ;
        Route::get('/advertising/delete/{id}', 'AdvertisingController@productDelete')->name('advertising.delete')
            ;





        Route::get('/home/intro', 'AdminController@index');
        
        Route::group(['prefix' => 'admin'],function (){
            Route::get('/', 'AdminController@index');

            Route::get('/data', 'AdminController@data');
            Route::post('/data/add/', 'AdminController@dataAdd');
            Route::post('/data/update/{id}', 'AdminController@dataUpdate');
            Route::get('/data/delete/{id}', 'AdminController@dataDelete');


            Route::get('/product/manage', 'AdminController@productList')->name('product.index')
                ->middleware('permission:add product|edit product|delete product');
            Route::get('/product/add/', 'AdminController@productAddPage')->name('product.addpage')
                ->middleware('permission:add product');
            Route::post('/product/add/', 'AdminController@productAdd')->name('product.add')
                ->middleware('permission:add product');
            Route::get('/product/edit/{id}', 'AdminController@productEdit')->name('product.edit')
                ->middleware('permission:edit product');
            Route::post('/product/update/{id}', 'AdminController@productUpdate')->name('product.update')
                ->middleware('permission:edit product');
            Route::get('/product/delete/{id}', 'AdminController@productDelete')->name('product.delete')
                ->middleware('permission:delete product');

            Route::get('/product/category/manage', 'AdminController@listpCategory')->name('pcategory.list')
                ->middleware('permission:add pcat|edit pcat|delete pcat');
            Route::post('/product/category/add', 'AdminController@pcategoryAdd')->name('pcategory.add')
                ->middleware('permission:add pcat');
            Route::post('/product/category/update/{id}', 'AdminController@pcategoryUpdate')->name('pcategory.update')
                ->middleware('permission:edit pcat');
            Route::get('/product/category/destroy/{id}', 'AdminController@pcategoryDestroy')->name('pcategory.delete')
                ->middleware('permission:delete pcat');

            Route::get('/product/comment/manage', 'AdminCommentController@index')->name('product.comment.list')
                ->middleware('permission:apply pcomment|reply pcomment|delete pcomment');
            Route::get('/product/comment/accept/{id}', 'AdminCommentController@accept')->name('product.comment.accept')
                ->middleware('permission:apply pcomment');
            Route::get('/product/comment/deny/{id}', 'AdminCommentController@deny')->name('product.comment.deny')
                ->middleware('permission:apply pcomment');
            Route::get('/product/comment/delete/{id}', 'AdminCommentController@destroy')->name('product.comment.delete')
                ->middleware('permission:delete pcomment');
            Route::post('/product/comment/reply', 'AdminCommentController@store')->name('product.comment.reply')
                ->middleware('permission:reply pcomment');




            Route::get('/providers/', 'AdminCollectionController@index')->name('providers.index')
                ->middleware('permission:add provider|edit provider|delete provider');
            Route::get('/providers/add/', 'AdminCollectionController@create')->name('providers.create')
                ->middleware('permission:add provider');
            Route::post('/providers/add/', 'AdminCollectionController@store')->name('providers.add')
                ->middleware('permission:add provider');
            Route::get('/providers/edit/{id}', 'AdminCollectionController@edit')->name('providers.edit')
                ->middleware('permission:edit provider');
            Route::post('/providers/update/{id}', 'AdminCollectionController@update')->name('providers.update')
                ->middleware('permission:edit provider');
            Route::get('/providers/delete/{id}', 'AdminCollectionController@destroy')->name('providers.delete')
                ->middleware('permission:delete provider');



            Route::get('/collections/', 'AdminCollectionController@index')->name('collections.index')
                ->middleware('permission:add provider|edit provider|delete provider');
            Route::get('/collections/add/', 'AdminCollectionController@create')->name('collections.create')
                ->middleware('permission:add provider');
            Route::post('/collections/add/', 'AdminCollectionController@store')->name('collections.add')
                ->middleware('permission:add provider');
            Route::get('/collections/edit/{id}', 'AdminCollectionController@edit')->name('collections.edit')
                ->middleware('permission:edit provider');
            Route::post('/collections/update/{id}', 'AdminCollectionController@update')->name('collections.update')
                ->middleware('permission:edit provider');
            Route::get('/collections/delete/{id}', 'AdminCollectionController@destroy')->name('collections.delete')
                ->middleware('permission:delete provider');



//
//            Route::get('/providers/', 'AdminProviderController@index')->name('providers.index')
//                ->middleware('permission:add provider|edit provider|delete provider');
//            Route::get('/providers/add/', 'AdminProviderController@create')->name('providers.create')
//                ->middleware('permission:add provider');
//            Route::post('/providers/add/', 'AdminProviderController@store')->name('providers.add')
//                ->middleware('permission:add provider');
//            Route::get('/providers/edit/{id}', 'AdminProviderController@edit')->name('providers.edit')
//                ->middleware('permission:edit provider');
//            Route::post('/providers/update/{id}', 'AdminProviderController@update')->name('providers.update')
//                ->middleware('permission:edit provider');
//            Route::get('/providers/delete/{id}', 'AdminProviderController@destroy')->name('providers.delete')
//                ->middleware('permission:delete provider');
//
//


            Route::get('/brands/', 'AdminBrandController@index')->name('brands.index')
                ->middleware('permission:add brand|edit brand|delete brand');
            Route::get('/brands/add/', 'AdminBrandController@create')->name('brands.create')
                ->middleware('permission:add brand');
            Route::post('/brands/add/', 'AdminBrandController@store')->name('brands.add')
                ->middleware('permission:add brand');
            Route::get('/brands/edit/{id}', 'AdminBrandController@edit')->name('brands.edit')
                ->middleware('permission:edit brand');
            Route::post('/brands/update/{id}', 'AdminBrandController@update')->name('brands.update')
                ->middleware('permission:edit brand');
            Route::get('/brands/delete/{id}', 'AdminBrandController@destroy')->name('brands.delete')
                ->middleware('permission:delete brand');




            Route::get('/order/manage', 'AdminOrderController@orders_list')->name('order.list')
                ->middleware('permission:order');
            Route::get('/order/{id}', 'AdminOrderController@order_details')->name('order.detail')
                ->middleware('permission:order');


            Route::get('/invoice/manage', 'AdminInvoiceController@invoices_view')
                ->name('invoice.list')
                ->middleware('permission:invoice');
            Route::get('/invoiceget', 'AdminInvoiceController@invoices_list')->name('invoice.listget'); // get invoice list with ajax
            Route::get('/invoice/{id}', 'AdminInvoiceController@invoice_details')->name('invoice.detail')
                ->middleware('permission:edit invoice');
            Route::get('/NextLoading/{id}', 'AdminInvoiceController@NextLoadingStatus')->name('loading.next')
                ->middleware('permission:edit invoice');
            Route::get('/PreviousLoading/{id}', 'AdminInvoiceController@PreviousLoadingStatus')->name('loading.previous')
                ->middleware('permission:edit invoice');
            Route::resource('shipping','AdminShippingController')->only(['index','store','update','destroy'])
                ->middleware([
                    'index' => 'permission:add pshipping|edit pshipping|delete pshipping',
                    'store' => 'permission:add pshipping',
                    'update' => 'permission:edit pshipping',
                    'destroy' => 'permission:delete pshipping',
                ]);
            ;
            Route::get('shipping/find','AdminShippingController@find')->name('shipping.find');

        });



    });
});