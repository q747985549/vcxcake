<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Users;
use Curl\Curl;
use Illuminate\Support\Facades\Cache;
class PublicController extends Controller
{
	public function sendsms(Request $request){
    	$mobile = $request->input('mobile');
    	if(Cache::get("code".$mobile)){
    		return "您的发送次数太频繁";
    	}
    	$app = app();
    	$code = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    	Cache::put("code".$mobile,$code,1);
    	session()->set('code'.$mobile,$code);
    	$curl = new Curl();
    	// $true = $curl->get('http://www.thgzsms.com/get/sendsms.php',[
    	// 	'loginname'=>$app['config']['sms.loginname'],
    	// 	'password'=>$app['config']['sms.password'],
    	// 	'number'=>$mobile,
    	// 	'content'=>"【大商圈】您的验证码".$code.",千万不要告诉别人哦！",
    	// 	]);
    	// if($true == ''){
    	// 	return 1;
    	// }else{
    	// 	return $true;
    	// }
    }

    public function login(Request $request){
    	if($request->isMethod('post')){
    		if(Auth::attempt(['mobile' => $request->input('mobile'), 'password' => $request->input('password')],$request->input('is_remember'))){
    			return redirect('/');
    		}else{
    			return view('login')->withError('密码错误');
    		}
    	}
    	return view('login');
    }
    public function login1(Request $request){
    	return view('login1');
    }
    public function loginout(Request $request){
    	Auth::logout();
    	return redirect('/');
    }
    public function register(Request $request){
    	if($request->isMethod('post')){
    		$rules = [
    		'mobile'=>'required|size:11',
    		'password'=>'required|min:6|max:20',
    		'repassword'=>'required|same:password'
    		];
    		$this->validate($request,$rules);

    		// if(session()->get('code'.$request->input('mobile')) != $request->input('captcha')){
    		// 	return view('register',['error'=>'验证码错误']);
    		// }

    		if(Users::create([
                'mobile'=>$request->input('mobile'),
                'password'=>bcrypt($request->input('password'))
                ])){
    			return redirect('/login');
    		}else{
    			return view('register')->withError('当前手机号已被注册');
    		}
    	}
    	return view('register');
    }
}
