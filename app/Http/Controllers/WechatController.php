<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use EasyWeChat\Factory;

use App\Models\orders; //订单表

class WechatController extends Controller 
{
    public function pay(){
        $config = [
            'app_id'             => env('WECHAT_PAYMENT_APPID', 'wx2fffc402a50e03a5'),
            'mch_id'             => env('WECHAT_PAYMENT_MCH_ID', '1439601702'),
            'key'                => env('WECHAT_PAYMENT_KEY', 'def56bbd76f33932dbce862cd87d59de'),
            'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'E:\Apache24\htdocs\marchsoft_pageant\public\path\to\apiclient_cert.pem'),    // XXX: 绝对路径！！！！
            'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'E:\Apache24\htdocs\marchsoft_pageant\public\path\to\apiclient_key.pem'),      // XXX: 绝对路径！！！！
            'notify_url'         => 'http://jk.mrwangqi.com/payments/wechatNotify',                           // 默认支付结果通知地址
        ];
        $app = Factory::payment($config);
        return $app;
    }
    public function wechatNotify(){
        echo "dasdasd";
    }
}