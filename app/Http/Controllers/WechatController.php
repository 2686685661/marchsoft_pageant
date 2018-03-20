<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Input;  
use Auth,Redirect;  
use Validator; 

use EasyWeChat\Foundation\Application;  
// use EasyWeChat\Payment\Order;  
use Overtrue\Wechat\src\Payment;
use Overtrue\Wechat\src\Payment\Order;
use Overtrue\Wechat\src\Payment\Business;
use Overtrue\Wechat\src\Payment\UnifiedOrder;

use App\Models\orders; //订单表

class WechatController extends Controller 
{



    protected $business = null;

    /**
     * 定义商户
     */
    protected function re_business() {
        if($this->business == null) {
            $this->business = new Business(
                'wx2fffc402a50e03a5',
                '956397f1970f6d1b114a8ac835bc0a77',
                '1439601702',
                'def56bbd76f33932dbce862cd87d59de'
            );
        }
        return $this->business;
    }

    /**
     * 定义订单
     */
    public function define_order($order_find) {
        if(is_object($order_find)) {

            $order = new Order();
            dd('aaa');
            $order->body = $order_find->name;
            $order->trade_type = 'MWEB';
            $order->out_trade_no = md5(uniqid().microtime()).$order_find->id;
            $order->total_fee = $order_find->totle; // 单位为 “分”, 字符串类型
            $order->notify_url = 'http://xxx.com/wechat/payment/notify';

            return $order;
        }else {
            return 0;
        }

    }

    /**
     * 统一下单
     */
    protected function unified_order($business = null, $order = null) {
        $unifiedOrder = new UnifiedOrder($business, $order);
        return $unifiedOrder;
    }

    /**
     * 生成支付配置文件
     */
    protected function create_payment($unifiedOrder = null) {
        $payment = new Payment($unifiedOrder);
        return $payment;
    }


    public function pay(Request $request) {
        // $id = Input::get('order_id');
        // dd($request->get('order_id'));
        // $order_find = orders::find_order($id);

        //test
        $arr = array('id'=>1,'name'=>'lishanlei','totle'=>'500.00');
        $order_find = (object)$arr;


        $order = $this->define_order($order_find);
        $unifiedOrder = unified_order($this->re_business(),$order);
        $payment = create_payment($unifiedOrder);
    }
}