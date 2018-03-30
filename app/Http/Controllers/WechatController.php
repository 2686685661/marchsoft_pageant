<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
// use EasyWeChat\Factory;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order; 
use App\Models\gifts;
use App\libs\lib\JsApiPay;
use App\libs\lib\WxPayApi;
use App\Models\orders; //订单表
use Session;
use DB;
class WechatController extends Controller 
{
    private $gift_price = [];
    protected $app = null;
    public function pay(Request $request){
        // $config = [
        //     'app_id'             => env('WECHAT_PAYMENT_APPID', 'wx2fffc402a50e03a5'),
        //     'merchant_id'        => env('WECHAT_PAYMENT_MCH_ID', '1439601702'),
        //     'key'                => env('WECHAT_PAYMENT_KEY', 'def56bbd76f33932dbce862cd87d59de'),
        //     'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', '/var/www/marchsoft_pageant/public/path/to/apiclient_cert.pem'),    // XXX: 绝对路径！！！！
        //     'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', '/var/www/marchsoft_pageant/public/path/to/apiclient_key.pem'),      // XXX: 绝对路径！！！！
        //     'notify_url'         => 'http://jk.marchsoft.cn/payments/wechatNotify',                           // 默认支付结果通知地址
        // ];
        $options = [
             'debug'  => true,
             'app_id'  => 'wx2fffc402a50e03a5',         // AppID
             'secret'  => '956397f1970f6d1b114a8ac835bc0a77',     // AppSecret
             'token'   => 'weixin',          // Token
             'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
             'log' => [
                 'level'      => 'debug',
                 'permission' => 0777,
                 'file'       => '/tmp/easywechat.log',
             ],
             'oauth' => [
                 'scopes'   => ['snsapi_userinfo'],
                 'callback' => '/examples/oauth_callback.php',
             ],
             'payment' => [
                 'merchant_id'        => '1439601702',
                 'key'                => 'def56bbd76f33932dbce862cd87d59de',
                 'cert_path'          => '/var/www/marchsoft_pageant/public/path/to/apiclient_cert.pem', // XXX: 绝对路径！！！！
                 'key_path'           => '/var/www/marchsoft_pageant/public/path/to/apiclient_key.pem',      // XXX: 绝对路径！！！！
                 'notify_url'         => 'http://jk.marchsoft.cn/payments/wechatNotify',  
             ],
         ];

        // $app = Factory::payment($config);
        $this->app = new Application($options);
        $payment =$this->app->payment;

        $give_name = trim($request->get('name'));
        $gifts = $request->get('gifts');
        if($give_name == '')
            return responseToJson(1,'昵称不能为空');
        else if(mb_strlen($give_name,'utf-8') >= 10) 
            return responseToJson(1,'昵称长度不能超过10个字符');
        else if(!count($gifts)) 
            return responseToJson(1,'礼物不能为空');


        $total = $this->get_gifts_total($gifts);
        $gifts_id = '';
        for($i=0;$i<count($gifts);$i++) {
            if($i == count($gifts)-1) {
                $gifts_id .= $gifts[$i];
            }else{
                $gifts_id .= $gifts[$i].',';
            }
        }
        $out_trade_no = time();
        $arr = ['give_name'=>$give_name,'gifts_id'=>$gifts_id,'total'=>$total,'out_trade_no'=>$out_trade_no];
        $insert_id = orders::insert_gift_order($arr);
        if($insert_id){
            // $result = $app->order->unify([
            //     'body' => '助力三月',
            //     'out_trade_no' => time(),
            //     'total_fee' => $total*100,
            //     'notify_url' => 'http://jk.marchsoft.cn/payments/wechatNotify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            //     'trade_type' => 'JSAPI',
            //     'openid' => session('openId'),
            // ]);
            $attributes=[
                'body' => '助力三月',
                'out_trade_no' => $out_trade_no,
                'total_fee' => 1,
                'notify_url' => 'http://jk.marchsoft.cn/payments/wechatNotify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
                'trade_type' => 'JSAPI',
                'openid' => session('openId'),
            ];
            $order = new Order($attributes);
            $result = $payment->prepare($order);

            // dump($result);
            $wcPayParams = [
                "appId" => 'wx2fffc402a50e03a5',     //公众号名称，由商户传入
                "timeStamp" => time(),         //时间戳，自1970年以来的秒数
                "nonceStr" => $result['nonce_str'], //随机串
                // 通过统一下单接口获取
                "package" => "prepay_id=".$result['prepay_id'],
                "signType" => "MD5",         //微信签名方式：
            ];
            $paySign=$this->MakeSign($wcPayParams);
            $wcPayParams['paySign']=$paySign;
            $wcPayParams['payId']=$insert_id;
            return responseToJson(1,'下单成功',$wcPayParams);
        }else{
            return responseToJson(0,'下单失败',$wcPayParams);
        }
    }

    /**
     * 计算前台赠送的礼物总价值
     * return int $total
     */
    private function get_gifts_total($gifts = []) {
        
        $total = 0;
        if($this->gift_price == []) {
            $this->gift_price = gifts::get_gifts_price();
        }



        foreach($gifts as $gift_id) {
            if(is_stat($gift_id,$this->gift_price)) {
                $total += $this->gift_price[$gift_id];
            }
        }

        return $total;
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
        $response =$this->app->payment->handleNotify(function($notify, $successful){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = DB::table('orders')->where('out_trade_no',$notify->out_trade_no)->first();
            if (!$order) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 用户是否支付成功
            if ($successful) {
                DB::table('orders')->where('out_trade_no',$notify->out_trade_no)->update([
                    'status'=>1
                ]);
                return true;
            } else { // 用户支付失败
                return false;
            }
            return true;
        });
        return $response;
    }

    public function updateOrder(Request $request){
        $id = $request->get('id');
        $res=orders::update_order_state($id);
        return responseToJson(1,'更新结果',$res);
    }

    public function index(Request $request){
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { //如果是微信浏览器
            if($request->get('code')){  //如果有code参数
                $code=$request->get('code');
                $get_token_url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2fffc402a50e03a5&secret=956397f1970f6d1b114a8ac835bc0a77&code=".$code."&grant_type=authorization_code";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_token_url);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
                $openid = curl_exec($ch);   //拿code换区opeid存session
                $Id=json_decode($openid);   
                session(['openId' => $Id->openid]);
                curl_close($ch);
            }else{  //没有code就先 跳转 然后回调到这里 执行上面的if获取Openid
                return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2fffc402a50e03a5&redirect_uri=http://jk.marchsoft.cn/front/hehe&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");                
            }
        } 
        return view('test');
    }
}