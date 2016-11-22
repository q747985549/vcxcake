<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use Auth;
class CateController extends Controller
{
    //分类列表
    public function lists(Request $request,$pid){
        $map['pid'] = $pid;
		$list = Cate::where($map)->orderBy('id','desc')->get();
		return view('admin.goods.cate',['list'=>$list,'pid'=>$pid]);
    }
    /*删除分类*/
    public function del($id){
        $cate = Cate::find($id);
    	$cate->delete();
    	return redirect('/admin/cates/list/1');
    }
    /*更改排序*/
    public function order($id,$order_id){
        $cate = Cate::find($id);
		$cate->order_id = $order_id;
		$cate->save();
    }
    /*更改标题*/
    public function title($id,$title){
        
        $cate = Cate::find($id);

		$cate->name = $title;
		$cate->save();
    }
    /*增加*/
    public function add($title,$order_id,$pid){
		Cate::insert([
			'name'=>$title,
			'order_id'=>$order_id,
            'pid'=>$pid
			]);
		return redirect('/admin/cates/list/'.$pid);
    }
}
