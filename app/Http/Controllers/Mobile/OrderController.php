<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Cart;
use App\Models\Cake;
use App\Models\Address;
class OrderController extends Controller
{
    public function addcart(Request $request){
        $info = Cake::findOrFail($request->input('id'));
        if($info){
            $a = Cart::create([
                'uid'=>Auth::user()->id,
                'cake_id'=>$info['id'],
                'cake_title'=>$info['title'],
                'weight'=>unserialize($info['weight_arr'])[0],
                'price'=>$info['price'],
                'num'=>1
                ]);
            if($a){
                return 1;
            }
        }
    }
    public function cart(){
    	$list = Cart::join('cake as c','c.id','=','cart.cake_id')->select('cart.*','c.img','c.weight_arr','c.title')->where('uid','=',Auth::user()->id)->get();
        $total = 0;
        foreach ($list as $key => &$value) {
            $total += ($value['price'] * $value['weight'] * $value['num']);
            $value['weight_arr'] = unserialize($value['weight_arr']);
        }
    	return view('m.user.cart',['list'=>$list])
        ->withHot(Cake::where('status','=',1)->limit(4)->orderBy('selled','desc')->get())
        ->withTotal($total);
    }
    public function change_cart_num($id,$num){
        $cart = Cart::where(['uid'=>Auth::user()->id,'id'=>$id])->firstOrFail();
        $num = (int)$num;
        if($num > 0){
            $cart->num = $num;
            $cart->save();
        }
    }
    public function del_cart($id){
    	$map = [
	    	'id'=>$id,
	    	'uid'=>Auth::user()->id,
    	];
    	Cart::where($map)->delete();
    }
    public function del_cart_all(){
        $map = [
            'uid'=>Auth::user()->id,
        ];
        Cart::where($map)->delete();
    }
    public function go_order(){
    	$list = Cart::join('cake as c','c.id','=','cart.cake_id')->select('cart.*','c.img')->where('uid','=',Auth::user()->id)->get();
    	$total = Cart::total($list);
    	$addr = Address::where('uid','=',Auth::user()->id)->get();
    	return view('user.go_order',['list'=>$list,'addr'=>$addr,'total'=>$total]);
    }
}
