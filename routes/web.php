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
//微信支付处理
Route::get('/alipay/wxpay/{id}/{totle}','GiftsController@wxPay');
//支付宝支付处理
Route::get('/alipay/pay/{id}/{totle}','GiftsController@alipay');
Route::get('/alipay/pay/{id}/{totle}/{out_trade_no}','GiftsController@alipay');

//支付后同步跳转跳转页面
Route::get('/alipay/return','AlipayController@return_url');

Route::any('/wechat','WechatController@pay');
Route::any('/updateOrder','WechatController@updateOrder');
Route::any('/payments/wechatNotify','WechatController@wechatNotify');

Route::group(['prefix' => 'admin'],function() {

    Route::group(['prefix' => 'message'],function() {
        Route::post("/insert",'MessageController@insert_message');
        Route::post("/selectmsg",'MessageController@select_message');
        Route::post("/delete",'MessageController@delete_message');
    });

    Route::group(['prefix' => 'gift'],function() {
        Route::post("/give",'GiftsController@give_gift');
        Route::post("/wxgive",'GiftsController@wxgive_gift');
        Route::post("/getgift",'GiftsController@get_gifts_info');
        Route::get('/phpinfo','GiftsController@phpinfo');
    });

    Route::group(['prefix' => 'order'],function() {
        Route::post("/getorder",'GiftsController@get_orders_info');

        Route::post('/getoneorder','GiftsController@get_trade_order_info');
    });
});



Route::group(['prefix' => 'front'],function() {

	Route::get("celebration/{trade?}",'WechatController@index');

    Route::get("hehe",'WechatController@index');
});


