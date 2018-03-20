<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use EasyWeChat\Factory;

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
        $curlobj = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2fffc402a50e03a5&secret=956397f1970f6d1b114a8ac835bc0a77&code='+$code+'&grant_type=authorization_code'); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出 
        $openid=curl_exec($ch); 
        curl_close($ch); 
        dump($openid);
        $res=$app->authCodeToOpenid($openid);
        dump($res);
        // $result = $app->order->unify([
        //     'body' => '腾讯充值中心-QQ会员充值',
        //     'out_trade_no' => '20150806125346',
        //     'total_fee' => 88,
        //     'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
        //     'notify_url' => 'https://pay.weixin.qq.com/wxpay/pay.action', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
        //     'trade_type' => 'JSAPI',
        //     'openid' => 'oUpF8uMuAJO_M2pxb1Q9zNjWeS6o',
        // ]);
        // dump($result);
    }
    public function wechatNotify(){
        echo "dasdasd";
    }
}