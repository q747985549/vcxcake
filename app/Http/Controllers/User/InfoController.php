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
               return redirect('user')->withMsg('修改成功');
           }else{
               return view('user.password')->withMsg('原密码错误');
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
           $user->fillable(["realname","gender","email","birthday","family_type","family_birthday","interest"])->update($data);
       }
       return view('user.info')->withUser(Auth::user());
   }
   public function change_mobile(){
    $d = request()->all();
        if($d['captcha'] == session()->get('code'.$d['mobile'])){
            $user = Auth::user();
            $user->mobile = $d['mobile'];
            $user->save();
            return 'ok';
        }else{
            return '验证码错误';
        }
   }
   public function address(){
   }

}
