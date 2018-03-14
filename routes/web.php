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

//支付宝支付处理
Route::get('alipay/pay','OmniPayController@pay');
//支付后跳转页面
Route::post('alipay/return','AlipayController@result');

Route::any('/wechat','WechatController@pay');

Route::group(['prefix' => 'admin'],function() {

    Route::group(['prefix' => 'message'],function() {
        Route::post("/insert",'MessageController@insert_message');
        Route::post("/selectmsg",'MessageController@select_message');
        Route::post("/delete",'MessageController@delete_message');
    });

    Route::group(['prefix' => 'gift'],function() {
        Route::post("/give",'GiftsController@give_gift');
    });
});

