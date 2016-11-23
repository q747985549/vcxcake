<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public $timestamps = false;
    public $table = "cart";
    protected $fillable = ['uid','cake_id','cake_title','price','weight','num'];
    public static function total($list){
    	$total = 0;
    	foreach ($list as $key => $v) {
    		$total += $v['weight'] * $v['price'] * $v['num'];
    	}
    	return $total;
    }
}
