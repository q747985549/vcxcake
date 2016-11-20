<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use App\Models\Cart;
use Auth;
class PayController extends Controller
{
    public function addcart(Request $request){
    	if($request->isMethod('post')){
    		$rules = [
    			'id'=>"required|numeric|",
    			'weight'=>"required|numeric",
    			'num'=>"required|numeric|min:1",
    		];
    		$this->validate($request,$rules);
    		$info = Cake::find($request->input('id'));
    		if($info){
    			$a = Cart::create([
                    'uid'=>Auth::user()->id,
                    'cake_id'=>$info['id'],
                    'cake_title'=>$info['title'],
                    'weight'=>$request->input('weight'),
                    'price'=>$info['price'],
                    'num'=>$request->input('num')
                    ]);
                
                if($a){
                    return 1;
                }
    		}
            return "添加购物车失败！";

    	}
    }
}
