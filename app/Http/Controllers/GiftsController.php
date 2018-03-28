<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\gifts;
use App\Models\orders;
use Illuminate\Support\Facades\Input;  
use App\Http\Controllers\AlipayController;
use Log;
class GiftsController extends Controller
{
    public function phpinfo(){
        phpinfo();
    }
    //用于存放所有礼物的金额，便于之后获得所送礼物的总价钱
    private $gift_price = [];

    private $gift_info = [];

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
        Log::info("dddddddddddddddddddddddddddddddddd");
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
            return  $jsApiParameters;
    }
    /**
     * 赠送礼物的方法
     * 
     */
    public function give_gift(Request $request) {
        $give_all = $request->all();
        // dd($give_all);
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

        $out_trade_no = get_rand_string();
        $arr = ['give_name'=>$give_name,'gifts_id'=>$gifts_id,'total'=>$total,'out_trade_no'=>$out_trade_no];
        $insert_id = orders::insert_gift_order($arr);
        
        if($insert_id>0) {
            $wait_order = orders::find_order($insert_id);

            return responseToJson(0,'/alipay/pay',$wait_order);
        }else {
            return responseToJson(1,'暂时无法支付');
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

    private function get_gift_namimg($order_gift) {

        if($this->gift_info == []) {
            $this->gift_info = gifts::get_namimg();
        }

        $gift_arr = [];

        if(is_string($order_gift) && $order_gift != '') {
            foreach($this->gift_info as $gift) {
                if($gift->id == (int)$order_gift) {
                    array_push($gift_arr,(array)$gift);
                }
            }
        }else if(is_array($order_gift) && $order_gift != []) {
            foreach($order_gift as $key => $value) {
                foreach($this->gift_info as $gift) {
                    if($gift->id == (int)$value) {
                        array_push($gift_arr,(array)$gift);
                    }
                }
            }
        }
        return $gift_arr;
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
        $out_trade_no = $request->out_trade_no;
        $alipay = new AlipayController();
        $alipay->pay($id,0.01,$out_trade_no);
        // orders::update_order_state($id);
    }


    /**
     * 获得已支付订单中name,并通过gift_id获得礼物名称和图片名称
     */
    public function get_orders_info() {
        $orders_info = orders::find_orders_info();
       foreach($orders_info as $order) {
           foreach($order as $key => $value) {
               if($key == 'gifts_id' && (strpos($value,',') > 0)) {
                   $order->$key = explode(',',$value);
               }
               else continue;
               
           }
       }
       foreach($orders_info as $order) {
           $order->gifts_id = $this->get_gift_namimg($order->gifts_id);
       }
       return responseToJson(0,'',$orders_info);
    }


    /**
     * 通过指定的支付宝订单号获得礼物名称和图片名称
     */
    public function get_trade_order_info(Request $request) {
       
        $all = $request->all();
        if(array_key_exists('trade',$all) && $all['trade'] != '') {
            $find_order = orders::find_order_trade($all['trade']);
            foreach($find_order as $key => $value) {
                if($key == 'gifts_id' && (strpos($value,',') > 0)) {
                    $order->$key = explode(',',$value);
                }
                else continue;
                
            }
            $find_order->gifts_id = $this->get_gift_namimg($find_order->gifts_id);
            return responseToJson(0,'',$find_order);
        }

    }


    /**
     * 获取送礼金额排名前三的记录
     */
    public function get_three_top_order() {

        $find_three = orders::find_top_three_order();
        // dd($find_three);
        return count($find_three) > 0 ? responseToJson(0,'',$find_three) : responseToJson(1,'数据库查询失败');
        
    }


    /**
     * 获取自己送礼金额排名的记录
     */
    public function get_personal_totle_rank(Request $request) {
        $trade_arr = $request->all();
        $find_personal = null;

        // dd($trade_arr);

        if(array_key_exists('trade',$trade_arr) && $trade_arr['trade'] != '') {
            $find_personal = orders::find_personal_sumtotle($trade_arr['trade']);
        }else if(array_key_exists('name',$trade_arr) && $trade_arr['name'] != '') {
            $find_personal = orders::find_personal_sumtotle($trade_arr['trade'],1);
        }

        // dd($find_personal);

        return $find_personal != null ? responseToJson(0,'',$find_personal) : responseToJson(1,'数据库查询失败');
    }

}