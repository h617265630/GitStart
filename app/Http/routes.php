<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::any('admin/login','admin\LoginController@login');
Route::get('admin/logout','admin\LoginController@logout');
Route::get('admin/config/putfile','admin\ConfigController@putfile');
Route::group(['middleware'=>['admin.login']],function()
{
    Route::resource('admin/good','admin\GoodController');
    Route::resource('admin/index','admin\IndexController');
    Route::resource('admin/cate','admin\CategoryController');
    Route::resource('admin/order','admin\OrderController');
    Route::resource('admin/nav','admin\NavController');
    Route::resource('admin/link','admin\LinkController');
    Route::resource('admin/config','admin\ConfigController');
    Route::post('admin/config/changeContent','admin\ConfigController@changeContent');
    Route::get('admin/', function () {
        return view('admin.index');
    });
});

Route::group([],function()
{
   Route::resource('home/user','home\UserController');
    Route::resource('/','home\IndexController');
    Route::resource('/userinfo','home\UserInfoController');
    Route::resource('/wishlist','home\WishListController');
    Route::get('/about','home\IndexController@about');
    Route::any('/addtocart/{id}','home\CartController@addtocart');
    Route::get('/myaccount','home\IndexController@myaccount');
    Route::get('/categrid','home\IndexController@categrid');
    Route::get('/remove/{id}','home\CartController@remove');
    Route::get('/good/{id}','home\IndexController@showitem');
    Route::any('/search','home\IndexController@search');
    Route::any('/login','home\UserController@login');
    Route::any('/signup','home\UserController@signup');
    Route::any('/logout','home\UserController@logout');
    Route::get('/test','home\CartController@test');
    Route::get('/addtowishlist/{id}','home\WishListController@addtowishlist');
    Route::any('/removewish/{id}','home\WishListController@removeWish');
    Route::get('/quickview/{id}','home\IndexController@quickview');
    Route::get('/getCardToken/{cardNumber,cardExpiry,customer_id,cardCVC}','home\PaymentController@getCardToken');
    Route::get('/test','home\PaymentController@test');
    Route::post('/addorder','home\PaymentController@addOrder');
    Route::get('/getpayment','home\PaymentController@getPayment');
    Route::get('/getpayment','home\PaypalController@getPayment');
    Route::post('/pay','home\PaymentController@testpay');
    Route::resource('/comment','home\CommentController');
});

Route::group(['middleware'=>['login']],function(){
    Route::resource('/cart','home\CartController');
    Route::get('/checkout','home\IndexController@checkout');
    Route::get('/clearcart','home\CartController@clearcart');
    Route::any('/updatecart','home\CartController@updatecart');
});