<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\gifts;
use App\Models\orders;

class GiftsController extends Controller
{

    private $gift_price = [];

    public function give_gift(Request $request) {
        $give_all = $request->all();
        $give_name = trim($give_all['name']);

        //$gifts是一个包含礼物id的一维数组
        $gifts = $give_all['gifts'];
        if($give_name == '') return responseToJson(1,'昵称不能为空');
        else if(mb_strlen($give_name,'utf-8') >= 10) return responseToJson(1,'昵称长度不能超过10个字符');
        else if(!count($gifts)) return responseToJson(1,'礼物不能为空');
        $total = get_gifts_total($gifts);

        $gifts_id = '';
        for($i=0;$i<count($gifts);$i++) {
            if($i == count($gifts)-1) {
                $gifts_id += $gifts[$i];
            }
            $gifts_id += $gifts[$i].',';
        }
        $arr = ['give_name'=>$give_name,'gifts_id'=>$gifts_id,'total'=>$total];

        $insert_id = orders::insert_gift_order($arr);

        //微信支付
        //支付成功后
        //call_user_func(callback,$state);DB::commit();
        //如果没有成功
    }

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

    public function get_gifts_info() {
        $gifts_info_msg = gifts::get_gifts_msg();

        if($gifts_info_msg) {
            return responseToJson(0,'',$gifts_info_msg);
        }else {
            return responseToJson(1,'无法获得礼物信息');
        }
    }
}