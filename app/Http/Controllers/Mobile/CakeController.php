<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Support\Facades\DB;
class CakeController extends Controller
{
	public function __construct(){
        parent::__construct();
    } 
    public function lists($pid = 1,$cate_id = null){
    	$list = with(new Cake())->get_list($pid,$cate_id);
    	$cate = DB::table('cate')->where("pid","=","$pid")->get();
        $realpid = $pid;
        $pid = $pid == 1? "蛋糕":"新品";
    	return view('m.list')->with(['list'=>$list,'cate'=>$cate,'cate_id'=>$cate_id,'pid'=>$pid,'realpid'=>$realpid]);
    }
    public function ajax_get_info($id){
        $info = Cake::find($id);
        $info['weight_arr'] = unserialize($info['weight_arr']);
        return $info;
    }
    public function detail($id){
        $info = Cake::where('status','=',1)->find($id);
        if($info){
            $info['weight_arr'] = unserialize($info['weight_arr']);
            $info['imgs'] = explode(",", $info['imgs']);
            return view('m.detail',['info'=>$info,'cate_name'=>DB::table('cate')->where('id','=',$info['cate_id'])->value('name'),'hot'=>Cake::where('status','=',1)->limit(5)->orderBy('selled','desc')->get()]);
        }else{
            return abort(403);
        }
    }
}
