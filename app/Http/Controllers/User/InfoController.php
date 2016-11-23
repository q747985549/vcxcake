<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Auth;
class InfoController extends Controller
{
    public function add_addr(Request $re){
    	if($re->isMethod('post')){
    		$data = $re->except('_token','s');
    		$data['uid'] = Auth::user()->id;
    		return Address::create($data);
    	}
    }
    public function del_addr($id){
    	Address::where(['uid'=>Auth::user()->id,'id'=>$id])->delete();
    }
    public function index(){
    	return view('user.index');
    }
}
