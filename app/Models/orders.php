<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class orders extends Model
{
    

    /**
     * 新增订单信息
     */
    public static function insert_gift_order($arr = []) {
        $insert_id = null;

        if(array_key_exists('out_trade_no',$arr)) {
            $insert_id = DB::table('orders')->insertGetId([
                'name' => $arr['give_name'],
                'gifts_id' => $arr['gifts_id'],
                'totle' => $arr['total'],
                'out_trade_no' =>$arr['out_trade_no']
            ]);
        }else {
            $insert_id = DB::table('orders')->insertGetId([
                'name' => $arr['give_name'],
                'gifts_id' => $arr['gifts_id'],
                'totle' => $arr['total']
            ]);
        }
        return $insert_id;
    }


    /**
     * 通过订单id更新订单支付状态
     * state = 0　未支付
     * state = 1  已支付
     */
    public static function update_order_state($order_id = 0) {
        DB::table('orders')->where('id',$order_id)->update(['status' => 1]);
    }


    /**
     * 通过订单号更新订单支付状态
     */
    public static function update_order_state_trade($order_trade = '') {
        DB::table('orders')->where('out_trade_no',$order_trade)->update(['status' =>1]);
    }


    /**
     * 查询某条订单信息
     */
    public static function find_order($order_id = 0) {

        $order_find = DB::table('orders')->where('id',$order_id)->first();
        return $order_find;
    }

    /**
     * 通过支付宝订单号查询订单信息
     */
    public static function find_order_trade($order_trade = 0) {
        $order_find = DB::table('orders')->where('out_trade_no',$order_trade)->first();

        return $order_find;
    }



    public static function find_orders_info() {
        $orders_info = DB::table('orders')->where('status',1)->select('id','name','gifts_id')->get()->toArray();
        return $orders_info;
    }


}