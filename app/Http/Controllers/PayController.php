<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
class PayController extends Controller
{
    public funciton addcart(Request $request){
    	if($request->isMethod('post')){
    		$rules = [
    			'id'=>"required|numeric|",
    			'weight'=>"required|numeric",
    			'num'=>"required|numeric|min:1",
    		];
    		$this->validate($request->all(),$rules);
    		$info = Cake::find($request->input('input'));
    		if($info){
    			ab
    		}
    	}
    }
}
