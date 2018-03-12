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
    
}