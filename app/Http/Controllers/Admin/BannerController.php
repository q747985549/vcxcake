<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
class BannerController extends Controller
{
    public function lists($type = 1){
    	$list = Banner::where('type','=',$type)->get();
    	return view('admin.banner.list',['list'=>$list,'type'=>$type]);
    }
    public function add(){
    	if(request()->isMethod('post')){
    		if(request()->input('id') == 0){
	    		Banner::create(request()->except('_token','s'));
    		}else{
	    		Banner::where('id','=',request()->input('id'))->update(request()->except('_token','s','id'));
    		}
    		return redirect('admin/banner');
    	}
    	return view('admin.banner.add',['order_id'=>Banner::max('order_id') + 1]);
    }
    public function edit($id){
    	return view('admin.banner.add',['info'=>Banner::find($id)]);
    }
    /*删除分类*/
    public function del($id){
        $cate = Banner::find($id);
    	$cate->delete();
    	return redirect('/admin/banner/');
    }
    /*更改排序*/
    public function order($id,$order_id){
        $cate = Banner::find($id);
		$cate->order_id = $order_id;
		$cate->save();
    }
}
