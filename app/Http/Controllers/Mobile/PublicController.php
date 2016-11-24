<?php

namespace App\Http\Controllers\Mobile;

use Auth;
use Curl\Curl;
use App\Models\Cake;
use App\Models\Users;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
class PublicController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
    		if(Auth::attempt(['mobile' => $request->input('mobile'), 'password' => $request->input('password')],1)){
    			return redirect(murl('/'));
    		}else{
    			return view('m.login')->withError('密码错误');
    		}
    	}
    	return view('m.login');
    }
    public function login1(Request $request){
        if($request->isMethod('post')){
            if(session()->get('code'.$request->input('mobile')) != $request->input('password')){
                return view('m/login1',['error'=>'验证码错误']);
            }else{
                $user = Users::where('mobile','=',$request->input('mobile'))->first();
                if($user){
                    Auth::login($user);
                    return redirect(url('m'));
                }else{
                    return view('m/login1',['error'=>'请先注册']);
                }
            }
        }
    	return view('m.login1');
    }
    public function index(){
    	return view('m.index',['banner'=>Banner::all(),'hot'=>Cake::where('flag','=',1)->limit(4)->get()]);
    }
    public function loginout(Request $request){
    	Auth::logout();
    	return redirect(url('m'));
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
    			return view('m.register',['error'=>'验证码错误']);
    		}

            $user = Users::where('mobile','=',$request->input('mobile'))->first();
    		if(!$user){
                Users::create([
                'mobile'=>$request->input('mobile'),
                'password'=>bcrypt($request->input('password'))
                ]);
    			return redirect(murl('login'));
    		}else{
    			return view('m.register')->withError('当前手机号已被注册');
    		}
    	}
    	return view('m.register');
    }
}
