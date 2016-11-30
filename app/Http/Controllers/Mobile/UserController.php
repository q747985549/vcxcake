<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Auth;
class UserController extends Controller
{
   public function addr(){
    return view('m/user/addr')->withList(Address::where('uid','=',Auth::user()->id)->get());
  }
   public function addr_get($id){
    return Address::where(['uid'=>Auth::user()->id,'id'=>$id])->firstOrFail();
  }
  public function addr_setd($id){
    $info = Address::where(['uid'=>Auth::user()->id,'id'=>$id])->firstOrFail();
    Address::where(['uid'=>Auth::user()->id])->update(['default'=>0]);
    $info->default = 1;
    $info->save();
  }
  public function addr_add(Request $re){
    if($re->isMethod('post')){
      $data = $re->except('_token','s','_method');
      $data['uid'] = Auth::user()->id;
      if(isset($data['default'])){
          Address::where(['uid'=>Auth::user()->id])->update(['default'=>0]);
      }
      with(new Address())->create($data);
      return redirect(url('m/user/addr'));
    }
    return view('m.user.addr_edit');
    
  }
  public function addr_edit($id,Request $re){
    if($re->isMethod('post')){
      $data = $re->except('_token','s','_method');
      $data['uid'] = Auth::user()->id;
      if(isset($data['default'])){
          Address::where(['uid'=>Auth::user()->id])->update(['default'=>0]);
      }
      with(new Address())->where(['id'=>$data['id'],'uid'=>$data['uid']])->update($data);
      return redirect(url('m/user/addr'));
    }
    return view('m.user.addr_edit')->withInfo(Address::where(['uid'=>Auth::user()->id,'id'=>$id])->firstOrFail());
  }
    public function addr_del($id){
      $s = Address::where(['uid'=>Auth::user()->id,'id'=>$id])->delete();
      if($s){
        return '1';
      }else{
        return abort(403);
      }
    }
    public function index(){
    	$user = Auth::user();
        $user['level'] = get_level($user['level']);
        return view('m.user.index')->withUser($user);
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
           return view('m.user.info')->withUser(Auth::user())->withMsg('修改成功');
       }
       return view('m.user.info')->withUser(Auth::user());
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
