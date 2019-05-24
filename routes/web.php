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

//首页
Route::get('/', 'IndexController@index')->name('home');
Route::prefix('/index')->group(function () {
    Route::get('add','IndexController@create' );
    Route::post('add_do','IndexController@store' );
    Route::get('index','IndexController@index' );
    Route::get('destroy/{id}','IndexController@destroy');
    Route::get('edit/{id}','IndexController@edit');
    Route::match(['get','post'],'update/{id}','IndexController@update');
});

//所有商品
Route::prefix('/Prolist')->group(function () {
    Route::get('index','index\ProlistController@index' );
    Route::get('proinfo/{id}/{error?}','index\ProlistController@proinfo');
    Route::post('addComment','index\ProlistController@addComment' );
    Route::post('GoNumber','index\ProlistController@GoNumber' );
    Route::post('ShopPrice','index\ProlistController@ShopPrice' );



    Route::get('add','index\ProlistController@create' );
    Route::post('add_do','index\ProlistController@store' );
    Route::get('destroy/{id}','index\ProlistController@destroy');
    Route::get('edit/{id}','index\ProlistController@edit');
    Route::match(['get','post'],'update/{id}','index\ProlistController@update');
});


//购物车
Route::prefix('/Car')->group(function () {
    Route::get('index','index\CarController@index' );
    Route::get('GoShop/{id}/{buy_number}','index\CarController@GoShop');
    Route::post('getCount','index\CarController@getCount');
    Route::post('SaveBuyNumber','index\CarController@SaveBuyNumber');
    Route::post('RemoveGoodsId/{goods_id}','index\CarController@RemoveGoodsId');
    Route::get('Pay/{cate_id}','index\CarController@Pay');


    Route::get('add','index\CarController@create' );
    Route::post('add_do','index\CarController@store' );
    Route::get('destroy/{id}','index\CarController@destroy');
    Route::get('edit/{id}','index\CarController@edit');
    Route::match(['get','post'],'update/{id}','index\CarController@update');
});

//用户

Route::prefix('/User')->group(function () {
    Route::get('index','index\UserController@index' );
    Route::get('address','index\UserController@address' );
    Route::get('GetAddress/{id}','index\UserController@GetAddress' );
    Route::post('doAddress','index\UserController@doAddress' );
    Route::get('RessList','index\UserController@RessList' );
    Route::get('success','index\UserController@success' );




    Route::get('add','index\UserController@create' );
    Route::post('add_do','index\UserController@store' );
    Route::get('destroy/{id}','index\UserController@destroy');
    Route::get('edit/{id}','index\UserController@edit');
    Route::match(['get','post'],'update/{id}','index\UserController@update');
});

//支付
Route::prefix('/Pay')->group(function () {
    Route::get('indexPC','index\PayController@indexPC' );
    Route::get('pagepayPc','index\PayController@pagepayPc' );
    Route::post('notifyUrl','index\PayController@notifyUrl' );
    Route::get('returnUrl','index\PayController@returnUrl' );





    Route::get('add','index\UserController@create' );
    Route::post('add_do','index\UserController@store' );
    Route::get('destroy/{id}','index\UserController@destroy');
    Route::get('edit/{id}','index\UserController@edit');
    Route::match(['get','post'],'update/{id}','index\UserController@update');
});
Auth::routes();

Route::prefix('/login')->group(function () {
    Route::get('login','LoginController@login' );
    Route::get('reg','LoginController@reg' );
    Route::post('DoReg','LoginController@DoReg' );
    Route::post('CheckEmail','LoginController@CheckEmail' );
    Route::post('SendEmail','LoginController@SendEmail' );
    Route::post('CheckPhone','LoginController@CheckPhone' );
    Route::post('SendPhone','LoginController@SendPhone' );
    Route::post('checkCode','LoginController@checkCode' );
    Route::post('checkCode','LoginController@checkCode' );
    Route::post('register','LoginController@register' );
    Route::get('EscLogin','LoginController@EscLogin' );


    //备用
    Route::get('destroy/{id}','index\UserController@destroy');
    Route::get('edit/{id}','index\UserController@edit');
    Route::match(['get','post'],'update/{id}','index\UserController@update');
});