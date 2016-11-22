<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Cart;
use App\Models\Cake;
class OrderController extends Controller
{

    public function cart(){
    	$list = Cart::join('cake as c','c.id','=','cart.cake_id')->select('cart.*','c.img')->where('uid','=',Auth::user()->id)->get();
    	return view('user.cart',['list'=>$list])->withHot(Cake::where('status','=',1)->limit(4)->orderBy('selled','desc')->get());
    }
    public function del_cart($id){
    	$map = [
	    	'id'=>$id,
	    	'uid'=>Auth::user()->id,
    	];
    	Cart::where($map)->delete();
    }
    public function go_order(){
    	$list = Cart::join('cake as c','c.id','=','cart.cake_id')->select('cart.*','c.img')->where('uid','=',Auth::user()->id)->get();
    	return view('user.go_order',['list'=>$list]);
    }
}
