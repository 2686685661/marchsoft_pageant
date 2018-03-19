<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class comments extends Model
{
    public static function insert_msg($name = '', $msg = '') {
        $id = DB::table('comments')->insertGetId([
            'give_name' => $name,
            'message' => $msg,
            'create_time' => time()
        ]);

        return $id;
    }

    public static function get_all_msg() {
        $all_msg = DB::table('comments')->select('id','give_name','message')->orderBy('create_time','desc')->get();

        return $all_msg;
    }

    public static function delete_msgs($del_msg = []) {
        $del_boo = DB::table('comments')->first();
        return $del_boo;
    }
 }