<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Users;
use Curl\Curl;
use Illuminate\Support\Facades\Cache;
class PublicController extends Controller
{
	public function sendsms(Request $request,$mobile){
    	if(Cache::get("code".$mobile)){
    		return "您的发送次数太频繁";
    	}
    	$app = app();
    	$code = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    	Cache::put("code".$mobile,$code,1);
    	session()->set('code'.$mobile,$code);
        // return $code;
        
        $http = "http://utf8.sms.webchinese.cn/?Uid={$app['config']['sms.username']}&Key={$app['config']['sms.key']}&smsMob=$mobile&smsText=您的验证码是$code,千万不要告诉别人哦！";
        return file_get_contents($http);
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
        if($request->isMethod('post')){
            if(session()->get('code'.$request->input('mobile')) != $request->input('password')){
                return view('login1',['error'=>'验证码错误']);
            }else{
                $user = Users::where('mobile','=',$request->input('mobile'))->first();
                if($user){
                    Auth::login($user);
                    return redirect(url('/'));
                }else{
                    return view('login1',['error'=>'请先注册']);
                }
            }
        }
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

    		if(session()->get('code'.$request->input('mobile')) != $request->input('captcha')){
    			return view('register',['error'=>'验证码错误']);
    		}

            $user = Users::where('mobile','=',$request->input('mobile'))->first();
    		if(!$user){
                Users::create([
                'mobile'=>$request->input('mobile'),
                'password'=>bcrypt($request->input('password'))
                ]);
    			return redirect(url('login'));
    		}else{
    			return view('register')->withError('当前手机号已被注册');
    		}
    	}
    	return view('register');
    }
}
