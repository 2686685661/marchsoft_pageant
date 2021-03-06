<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class gifts extends Model
{

    public static function get_gifts_price() {

        $gifts_price = DB::table('gifts')->pluck('price','id')->toArray();

        return $gifts_price;
    }
    

    public static function get_gifts_msg() {
        $gifts_info_msg = DB::table('gifts')->where('v_state',0)->select('id','name','price','image','blessings')->get();

        return $gifts_info_msg;
    }

    public static function get_namimg() {
        $gift_namimg = DB::table('gifts')->where('v_state',0)->select('id','name','image')->get()->toArray();
        return $gift_namimg;
    }
}