<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\gifts;
use App\Models\orders;
use Illuminate\Support\Facades\Input;  
use App\libs\lib\WxPayApi;
use App\Http\Controllers\AlipayController;
use App\libs\lib\WxPayDataBase;
use App\libs\lib\WxPayConfig;
use App\libs\lib\JsApiPay;

class GiftsController extends Controller
{

    //用于存放所有礼物的金额，便于之后获得所送礼物的总价钱
    private $gift_price = [];

    public function wxgive_gift(Request $request) {
        $give_all = $request->all();
        $give_name = trim($give_all['name']);
        $gifts = $give_all['gifts'];
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
       
        $arr = ['give_name'=>$give_name,'gifts_id'=>$gifts_id,'total'=>$total];
        $insert_id = orders::insert_gift_order($arr);
        
        if($insert_id>0) {
            $wait_order = orders::find_order($insert_id);
            return responseToJson(0,'/alipay/wxpay',$wait_order);
        }else {
            return responseToJson(1,'暂时无法支付');
        }
        //微信支付
        //支付成功后
        //call_user_func(callback,$state);DB::commit();
        //如果没有成功
    }
    public function wxPay(){
        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = $tools->GetOpenid();

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("助力三月");
        $input->SetAttach("三月软件工作室");
        $input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
        $input->SetTotal_fee("1");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("捐款");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        printf_info($order);
        $jsApiParameters = $tools->GetJsApiParameters($order);

        //获取共享收货地址js函数参数
        $editAddress = $tools->GetEditAddressParameters();

        orders::update_order_state($id);

    }
    /**
     * 赠送礼物的方法
     * 
     */
    public function give_gift(Request $request) {
        $give_all = $request->all();
        $give_name = trim($give_all['name']);
        $gifts = $give_all['gifts'];
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

        $arr = ['give_name'=>$give_name,'gifts_id'=>$gifts_id,'total'=>$total];
        $insert_id = orders::insert_gift_order($arr);
        
        if($insert_id>0) {
            $wait_order = orders::find_order($insert_id);
            return responseToJson(0,'/alipay/pay',$wait_order);
            // $alipay = new AlipayController($wait_order);
            // if($alipay) {
            //     orders::update_order_state($insert_id);
            //     // return responseToJson(0,'支付成功');
            // }
        }else {
            return responseToJson(1,'暂时无法支付');
        }
        //微信支付
        //支付成功后
        //call_user_func(callback,$state);DB::commit();
        //如果没有成功
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
     * 得到所有礼物的信息
     * return Array $gifts_info_msg
     */
    public function get_gifts_info() {
        $gifts_info_msg = gifts::get_gifts_msg();

        if(count($gifts_info_msg) >= 1) {
            return responseToJson(0,'',$gifts_info_msg);
        }else {
            return responseToJson(1,'无法获得礼物信息');
        }
    }


    public function alipay(Request $request) {
        $id = $request->id;
        $totle = $request->totle;
        $alipay = new AlipayController();
        $alipay->pay($id,$totle);

        orders::update_order_state($id);


    }

}