<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Models\Cate;
use Auth;
class GoodsController extends Controller
{
	//商品列表
    public function lists(Request $request,$pid = 1){
        $map[] = ['status','<>',-1];
        $map['pid'] = $pid;
		if($request->only('keyword')['keyword'] != null){
			$map['title'] = $request->only('keyword');
            unset($map['pid']);
		}
		$list = Cake::where($map)->orderBy('id','desc')->paginate(13);
		return view('admin.goods.list',['list'=>$list,'pid'=>$pid]);
    }
    /*更改排序*/
    public function order($id,$order_id){
		$goods = $this->checkself($id);
    	if($goods){
    		$goods->order_id = $order_id;
    		$goods->save();
    	}
    }
    /*商品状态更改*/
    public function set($id,$status){
    	foreach (explode(',', $id) as $key => $v) {
			$goods = $this->checkself($v);
	    	if($goods){
	    		$goods->status = $status;
	    		$goods->save();
	    	}
		}
    	return redirect('/admin/goods/list');
    }
    /*商品删除*/
    public function del($id){
		foreach (explode(',', $id) as $key => $v) {
			$goods = $this->checkself($v);
	    	if($goods){
	    		$goods->delete();
	    	}
		}
    	return redirect('/admin/goods/list');
    }
    private function checkself($id){
    	$map = [
		'id' => $id
		];
    	return Cake::where($map)->first();
    }
    /*商品修改*/
    public function edit($id){
        $info = Cake::find($id);
    	return view('admin.goods.add')->withInfo($info)->withCates(Cate::where('pid','=',$info['pid'])->get())->withCates(Cate::all());
    }
    /*商品发布*/
    public function add(Request $request,$pid = 1){
    	if(request()->isMethod('post')){
    		if($request->input('id') == 0){
    			Cake::addGoods($request);
    		}else{
    			Cake::editGoods($request);
    		}
    		return redirect('/admin/goods/list');
    	}else{
    		return view('admin.goods.add')->withOrder_id(Cake::max('order_id') + 1)->withCates(Cate::where('pid','=',$pid)->get())->withPid($pid);
    	}
    }


}
