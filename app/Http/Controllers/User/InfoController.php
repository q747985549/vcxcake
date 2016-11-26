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
        $user = Auth::user();
        $user['level'] = get_level($user['level']);
    	return view('user.index')->withUser($user);
    }

    public function password(Request $re){
        if($re->isMethod('post')){
            $user = Auth::user();
            if($user['password'] == bcrypt($re->input('old_password'))){
                $user->password = bcrypt($re->input('password'));
                $user->save();
            }else{
                return view('user.password')->withError('原密码错误');
            }
        }
        return view('user.password');
    }
    public function info(Request $re){
        if($re->isMethod('post')){
            $rules = [
                'realname'=>"max:9",
                'gender'=>"boolean",
                'mail'=>'max:30',
            ];
            $this->validate($re,$rules);
            $data = $re->except('s','_token');
            $user = Auth::user();
            $user->update($data);

            
        }
        return view('user.info');
    }
    public function address(){

    }
}
