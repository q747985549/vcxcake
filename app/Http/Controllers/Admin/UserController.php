<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
class UserController extends Controller
{
    public function lists(Request $request,$order='id'){
    	$map[] = ['is_admin','<>',1];
		if($request->only('keyword')['keyword'] != null){
			$map['mobile'] = $request->only('keyword');
		}
		$list = Users::where($map)->orderBy($order,'desc')->paginate(15);
    	return view("admin.user.list",['list'=>$list,'order'=>$order]);
    }
    public function lahei($id){
		$user = Users::find($id);
			$user->status = 0;
			$user->save();
		return redirect('/admin/user/list');
	}
	public function huifu($id){
		$user = Users::find($id);
			$user->status = 1;
			$user->save();
		return redirect('/admin/user/list');
	}

    public function admin_list(){
    	$list = Users::where('is_admin','=',1)->get();
    	return view("admin.user.admin_list",['list'=>$list]);
    }
}
