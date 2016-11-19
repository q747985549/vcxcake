<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use Illuminate\Support\Facades\DB;
class CakeController extends Controller
{
    public function lists($pid = 1,$cate_id = null){
    	$list = with(new Cake())->get_list($pid,$cate_id);
    	$cate = DB::table('cate')->where("pid","=","$pid")->get();
    	return view('list',['list'=>$list,'cate'=>$cate,'cate_id'=>$cate_id]);
    }
    public function addcart(){
    	return view('cart');
    }
 
}
