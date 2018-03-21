<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use EasyWeChat\Factory;
use App\libs\lib\JsApiPay;
use App\libs\lib\WxPayApi;
use App\Models\orders; //订单表
use Session;
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
        $result = $app->order->unify([
            'body' => '助力三月',
            'out_trade_no' => time(),
            'total_fee' => 1,
            'notify_url' => 'http://jk.mrwangqi.com/payments/wechatNotify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI',
            'openid' => session('openId'),
        ]);
        $paySign=$this->MakeSign($result);
        $result['paySign']=$paySign;
        return responseToJson(1,'下单成功',$result);
    }

    /**
	 * 生成签名
	 * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
	 */
	public function MakeSign($sign)
	{
        //签名步骤一：按字典序排序参数
		ksort($sign);
		$string = $this->ToUrlParams($sign);
		//签名步骤二：在string后加入KEY
		$string = $string . "&key=def56bbd76f33932dbce862cd87d59de";
		//签名步骤三：MD5加密
		$string = md5($string);
		//签名步骤四：所有字符转为大写
		$result = strtoupper($string);
		return $result;
	}

    /**
	 * 格式化参数格式化成url参数
	 */
	public function ToUrlParams($sign)
	{
		$buff = "";
		foreach ($sign as $k => $v)
		{
			if($k != "sign" && $v != "" && !is_array($v)){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
    
    
    public function wechatNotify(){
        echo "dasdasd";
    }

    public function index(Request $request){
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
            if($request->get('code')){
                $code=$request->get('code');
                $get_token_url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2fffc402a50e03a5&secret=956397f1970f6d1b114a8ac835bc0a77&code=".$code."&grant_type=authorization_code";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_token_url);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
                $openid = curl_exec($ch);
                $Id=json_decode($openid);
                session(['openId' => $Id->openid]);
                curl_close($ch);
            }else{
                return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2fffc402a50e03a5&redirect_uri=http://jk.mrwangqi.com/front/hehe&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");                
            }
        } 
        return view('hehe');
    }
}