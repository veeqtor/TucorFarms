<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@allProducts')->name('allProduct');


Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin/dashboard/', 'AdminController@index')->name('dashboard');


    Route::get('/admin/dashboard/category', 'AdminController@category')->name('dashboard.category');
    Route::post('/admin/dashboard/category', 'AdminController@addCategory')->name('dashboard.addCategory');
    Route::get('/admin/dashboard/category/{id}/edit', 'AdminController@editCategory')->name('dashboard.editCategory');
    Route::patch('/admin/dashboard/category/{id}', 'AdminController@updateCategory')->name('dashboard.updateCategory');
    Route::delete('/admin/dashboard/category/delete/{id}', 'AdminController@deleteCategory')->name('dashboard.deleteCategory');


    Route::get('/admin/dashboard/products', 'AdminController@products')->name('dashboard.products');
    Route::post('/admin/dashboard/product', 'AdminController@addProduct')->name('dashboard.addProduct');
    Route::get('/admin/dashboard/product/{id}/edit', 'AdminController@editProduct')->name('dashboard.editProduct');
    Route::patch('/admin/dashboard/product/{id}', 'AdminController@updateProduct')->name('dashboard.updateProduct');
    Route::delete('/admin/dashboard/product/delete/{id}', 'AdminController@deleteProduct')->name('dashboard.deleteProduct');


    Route::get('/admin/dashboard/order', 'AdminController@order')->name('dashboard.order');
    Route::get('/admin/dashboard/order/reference', 'AdminController@ajaxOrderReferenceSearch');
    Route::get('/admin/dashboard/order/reference/mark-delivered', 'AdminController@ajaxMarkAsDelivered');
    Route::get('/admin/dashboard/order/reference/shipped', 'AdminController@ajaxMarkAsShipped');
    Route::get('/admin/dashboard/allOrder', 'AdminController@ajaxAllOrdersCount');
    Route::get('/admin/dashboard/order/reference/pending', 'AdminController@ajaxAllPendingOrders');
    Route::get('/admin/dashboard/order/reference/processed', 'AdminController@ajaxAllProcessedOrders');
    Route::get('/admin/dashboard/order/reference/delivered', 'AdminController@ajaxAllDeliveredOrders');
    Route::get('/admin/dashboard/order/processing', 'AdminController@ajaxOrderProcessing');
});


Route::resource('/cart', 'CartController');


Route::group(['middleware' => 'user'], function () {

    Route::get('/cart', 'CartController@availProducts')->name('cartItems');

    Route::get('/user/accounts/history/load', 'AccountController@loadHistory');
    Route::get('/user/accounts/history/load/print', 'AccountController@loadPrint');
    Route::get('/user/accounts/history/print', 'AccountController@printHistory');
    Route::get('/user/accounts/history/', 'AccountController@allHistory')->name('user.history');
    Route::get('/user/accounts/{id}/edit', 'AccountController@edit')->name('user.edit');
    Route::get('/user/accounts/history/view', 'AccountController@allPurchaseAjax');
    Route::patch('/user/accounts/{id}', 'AccountController@update');

    Route::get('/user/checkout/billing/{id}', 'CheckoutController@billing')->name('checkout.billing');
    Route::get('/user/checkout/delivery/{id}', 'CheckoutController@delivery')->name('checkout.delivery');
    Route::get('/user/checkout/payment/{id}', 'CheckoutController@payment')->name('checkout.payment');
    Route::get('/user/checkout/review/{id}', 'CheckoutController@review')->name('checkout.review');
    Route::get('/user/checkout/delivery/{id}', 'CheckoutController@delivery')->name('checkout.delivery');
    Route::get('/user/checkout/print/', 'CheckoutController@print')->name('checkout.print');

    Route::patch('/user/checkout/delivery/{id}', 'CheckoutController@deliveryUpdate');
    Route::patch('/user/checkout/address/{id}', 'CheckoutController@addressUpdate');
    Route::patch('/user/checkout/payment/{id}', 'CheckoutController@PaymentUpdate');
    Route::patch('/user/checkout/checkout/create', 'CheckoutController@Checkout');


    Route::get('/user/checkout/ajaxRequest', 'CheckoutController@ajaxRequest');
    Route::post('/user/checkout/ajaxRequest', 'CheckoutController@ajaxRequestPost');

});


