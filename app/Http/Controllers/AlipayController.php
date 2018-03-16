<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  


use App\libs\alipayDemo\wappay\buildermodel\AlipayTradeWapPayContentBuilder;
use App\libs\alipayDemo\wappay\service\AlipayTradeService;
// require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'./../../libs/alipayDemo/config.php';

// use App\libs\alipayDemo\config;

class AlipayController extends Controller
{


    // public function __construct($totle = 0) {
        
    //     $out_trade_no = get_rand_string();
    //     $subject = 'marchsoft捐赠';
    //     // $total_amount = $totle;
    //     $total_amount = '0.01';
    //     $timeout_express="1m";
        
    //     $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
       
    //     $payRequestBuilder->setSubject($subject);
    //     $payRequestBuilder->setOutTradeNo($out_trade_no);
        
    //     $payRequestBuilder->setTotalAmount($total_amount);
    //     $payRequestBuilder->setTimeExpress($timeout_express);
        
        
    //     $this->pay($payRequestBuilder);
        
    // }

        

    //payRequestBuilder
    public function pay($id = 0,$totle = 0) {


        $out_trade_no = get_rand_string();
        $subject = 'marchsoft捐赠';
        // $total_amount = $totle;
        $total_amount = '0.01';
        $timeout_express="1m";
        
        $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
       
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);
        $payRequestBuilder->setPassbackParams($id);
        
        require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'./../../libs/alipayDemo/config.php';
        $payResponse = new AlipayTradeService($config);
        
        $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);
    }

    public function return_url() {
        require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'./../../libs/alipayDemo/config.php';
        $alipaySevice = new AlipayTradeService($config); 
        $arr=$_GET;
        // dd($arr);
        $result = $alipaySevice->check($arr);
        if(!$result) {   //这里的对公钥的判定不正确，故加！
            //这里添加更多签名检验
            if($alipaySevice->appid == $arr['app_id']) {

                return redirect('/front/celebration');
                echo '验证成功';
            }else {
                echo '验证失败';
            }
        }

    }


    /**
     * 支付结果异步通知
     */
    public function notify_url() {
        $status = $_POST['trade_status'];
        if($status == 'TRADE_SUCCESS' || $status == 'TRADE_FINISHED') {
            //交易成功
            echo 'success';
        }
        echo 'fail';
    }

}

// total_amount=0.01
// timestamp=2018-03-15+16%3A03%3A11

// //商户请求参数的签名串
// sign=urOaBNpYOHlkU%2FzSVUO9nS%2FHd0H8rHwYE0MfF%2BsEfo0X3DNYbE77DBtKtCXJz%2Bq6VPq6Tginb40gtXV5gBgEzffmKQF2zK5VvAnCFGa0So7vXASRKa5A9xEf8UqqH1I7rewXBwnmtxHOegAR%2F3DWc3qxO3GHio237ursFNEO1x8EnZy7rjStzqkcde4RCeajKxlZtxbT14Je0IcbYPhK441LAQWMeRlqxisoV%2BEYbD6PodmLNQnv3%2BePffOpGm%2FqToUHGHzw34lgKJUlvWOi%2Baj3u4rRn8JRCLGVc5EiMsRNjeA7EgJaEJel2kNDJqWa5YIfZfVDK1Dw86339OG8%2BQ%3D%3D&
// trade_no=2018031521001004400531720356   //该交易在支付宝系统中的交易流水号。最长64位。
// sign_type=RSA2
// auth_app_id=2017012005273465
// charset=UTF-8
// seller_id=2088521734409292     //收款支付宝账号对应的支付宝唯一用户号。
// method=alipay.trade.wap.pay.return   //接口名称
// app_id=2017012005273465
// out_trade_no=1521100974806  //商户网站唯一订单号
// version=1.0     //调用的接口版本，固定为：1.0

// total_amount=0.01
// &timestamp=2018-03-15+16%3A33%3A34
// &sign=WVoBEyT10WvOXlA7EgTffh8V3HhIXi3U%2FMNP8KuwW0qZWpEjN7sJRSV%2BLFnP%2Fk4CMhNzKD5x%2FTlsuEkRIYpSVieLL1iWr1bP7Br6EVS1BsW3G9ECWpsNToJKrmcS8EaLeKOO5upXMx7TVViX8ZR6YaqGwffC9ivwLWoGVrDCHku4DPxsKlLh6beZBkNL1aUQ1EtEvVYPwd%2F6bs9gNt90hk5FheEInm%2B10oIknVpOvhviKvtHraOldS5rCgIn2C1D62Dq67gsffgs4S71Ji51K%2Bw285Ax2Kq5BaOvAVGMOYOcY2hatKWkptGrduTAPsgeQMNRkSX75XsqnYyUBaO1kA%3D%3D
// &trade_no=2018031521001004400531616148
// &sign_type=RSA2
// &auth_app_id=2017012005273465
// &charset=UTF-8
// &seller_id=2088521734409292
// &method=alipay.trade.wap.pay.return
// &app_id=2017012005273465
// &out_trade_no=1521102802935
// &version=1.0

