<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use EasyWeChat\Factory;
use App\libs\lib\JsApiPay;
use App\libs\lib\WxPayApi;
use App\Models\orders; //订单表

class WechatController extends Controller 
{
    public function pay(Request $request){
        $config = [
            'app_id'             => env('WECHAT_PAYMENT_APPID', 'wx2fffc402a50e03a5'),
            'mch_id'             => env('WECHAT_PAYMENT_MCH_ID', '1439601702'),
            'key'                => env('WECHAT_PAYMENT_KEY', 'def56bbd76f33932dbce862cd87d59de'),
            'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'E:\Apache24\htdocs\marchsoft_pageant\public\path\to\apiclient_cert.pem'),    // XXX: 绝对路径！！！！
            'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'E:\Apache24\htdocs\marchsoft_pageant\public\path\to\apiclient_key.pem'),      // XXX: 绝对路径！！！！
            'notify_url'         => 'http://jk.mrwangqi.com/payments/wechatNotify',                           // 默认支付结果通知地址
        ];
        
        $app = Factory::payment($config);
        $code=$request->get('code');
        $get_token_url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2fffc402a50e03a5&secret=956397f1970f6d1b114a8ac835bc0a77&code=".$code."&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$get_token_url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $openid = curl_exec($ch);
        $openId=json_decode($openid);
        curl_close($ch);
        $result = $app->order->unify([
            'body' => '助力三月',
            'out_trade_no' => time(),
            'total_fee' => 1,
            'notify_url' => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => $openId->openid,
        ]);
        $config = $app->order->configForJSSDKPayment($prepayId);
        dump($result['prepay_id']);
    }
    public function wechatNotify(){
        echo "dasdasd";
    }
}