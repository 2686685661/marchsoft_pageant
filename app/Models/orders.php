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

        $insert_id = DB::table('orders')->insertGetId([
            'name' => $arr['give_name'],
            'gifts_id' => $arr['gifts_id'],
            'total' => $arr['total']
        ]);

        return $insert_id;
    }


    /**
     * 更新订单支付状态
     * state = 0　未支付
     * state = 1  已支付
     */
    public static function update_order_state($order_id = 0) {
        DB::table('orders')->where('id',$order_id)->update(['state' => 1]);
    }


    /**
     * 查询某条订单信息
     */
    public static function find_order($order_id = 0) {

        $order_find = DB::table('orders')->where('id',$order_id)->first();
        return $order_find;
    }
}