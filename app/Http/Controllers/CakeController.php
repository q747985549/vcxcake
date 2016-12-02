<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use Illuminate\Support\Facades\DB;
class CakeController extends Controller
{
    public function __construct(){
        parent::__construct();
    }
    public function lists($pid = 1,$cate_id = null){
    	$list = with(new Cake())->get_list($pid,$cate_id);
        if($keyword = request()->input('keyword')){
    	   $list = Cake::where('title','like','%'.$keyword.'%')->paginate();
        }else{
           $list = with(new Cake())->get_list($pid,$cate_id);
        }
        $cate = DB::table('cate')->where("pid","=","$pid")->get();
        $realpid = $pid;
        switch ($pid) {
            case '1': $pid = "蛋糕";
                break;
            case '2':$pid = "面包";
                break;
            case '3':$pid = "咖啡";
                break;
            case '4':$pid = "伴手礼";
                break;
            default:
                # code...
                break;
        }
    	return view('list')->with(['list'=>$list,'cate'=>$cate,'cate_id'=>$cate_id,'pid'=>$pid,'realpid'=>$realpid]);
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
            // dd(Cake::where('status','=',1)->limit(5)->orderBy('selled','desc')->get());
            $info['imgs'] = explode(",", $info['imgs']);
            return view('detail',['info'=>$info,'cate_name'=>DB::table('cate')->where('id','=',$info['cate_id'])->value('name')]);
        }else{
            return abort(403);
        }
    }
 
}
