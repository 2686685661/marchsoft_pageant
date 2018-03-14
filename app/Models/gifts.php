<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class gifts extends Model
{

    public static function get_gifts_price() {
        $gifts_price = DB::table('gifts')->pluck('id','price');
        return $gifts_price;
    }
    

    public static function get_gifts_msg() {
        $gifts_info_msg = DB::table('gifts')->where('v_state',0)->select('id','name','price','image','blessings')->get();

        return $gifts_info_msg;
    }
}