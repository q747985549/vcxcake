<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Setting;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct(){
    	app('view')->share('s',Setting::pluck('value','name'));
    	if(Auth::check()){
    		app('view')->share('cart_count',Cart::where('uid','=',Auth::user()->id)->count());
    	}
    }
}
