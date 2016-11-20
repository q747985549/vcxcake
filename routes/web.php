<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Mews\Captcha\Captcha;

Route::group(['prefix' => 'admin','namespace'=>'Admin',"middleware"=>'auth.admin'], function() {
    Route::get('',"PublicController@index");
    Route::any('setting',"PublicController@setting");
});

Route::get('/', function () {
    return view('index');
});
Route::get('/us',"HomeController@us");
Route::get('help/{id?}',"HelpController@index");
/*Upload*/
Route::any('/files/upload',"FileController@upload");
Route::get('/files/getimg/{id}',"FileController@getImg");

/*Cake*/
Route::get('/list/{pid}/{cate_id?}',"CakeController@lists");
Route::get('/detail/{id}',"CakeController@detail")/*->middleware('auth')*/;
Route::get('/ajax_get_info/{id}',"CakeController@ajax_get_info");
Route::post('/addcart',"PayController@addcart")->middleware('addcart');

/*Public*/
Route::any('/register',"PublicController@register");
Route::any('/login',"PublicController@login");
Route::any('/login1',"PublicController@login1");
Route::any('/loginout',"PublicController@loginout");

Route::get('/sendsms',"PublicController@sendsms");
Route::get('captcha',function(){
	return captcha();
});