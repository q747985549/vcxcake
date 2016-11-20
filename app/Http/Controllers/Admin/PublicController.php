<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
class PublicController extends Controller
{
    public function index(){
    	return view('admin.index');
    }
    public function setting(Request $request){
    	if($request->isMethod('post')){
    		foreach ($_POST as $key => $value) {
    			Setting::updateOrInsert(['name'=>$key],['name'=>$key,'value'=>$value]);
    		}
    	}
    	$s = Setting::pluck('value','name');
    	return view('admin.setting',['s'=>$s]);
    }
}
