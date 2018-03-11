<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class orders extends Model
{
    
    public static function insert_gift_order($arr = []) {

        $insert_id = DB::table('orders')->insertGetId([
            'name' => $arr['give_name'],
            'gifts_id' => $arr['gifts_id'],
            'total' => $arr['total']
        ]);

        return $insert_id;
    }

    public static function update_order_state($order_id = 0) {
        DB::table('orders')->where('id',$order_id)->update(['state' => 1]);
    }
}