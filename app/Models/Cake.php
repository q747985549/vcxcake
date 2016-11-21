<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cate;
class Cake extends Model
{
	public $table = "cake";
    public $fillable = ['id','pid','title','cate_id','img','imgs','flag','price','description','selled','size','person','present','wait_time','brand','kouwei','dangaocate','renqun','jieri','tiandu','baoxian','cailiao','status','order_id','cate_name'];
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
    public static function addGoods($r){
        $data = $r->except('s','_token','id');
        $data['cate_name'] = Cate::where('id','=',$data['cate_id'])->value('name');
        static::create($data);
    }
}
