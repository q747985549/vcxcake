<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
	public $table = "cake";
    public function get_list($pid,$cate_id){
    	$map = [
    		'pid'=>$pid,
    		'status'=>1,
    	];
    	if(!is_null($cate_id)){
    		$map['cate_id'] = $cate_id;
    	}
    	return $this->where($map)->orderBy('order_id','desc')->paginate(20);
    }
}
