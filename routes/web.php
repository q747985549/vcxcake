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

    /*会员管理*/
	Route::group(['prefix'=>'user'],function(){
		Route::any('list/{order?}',"UserManagerController@lists");
		Route::get('lahei/{id}',"UserManagerController@lahei");
		Route::get('huifu/{id}',"UserManagerController@huifu");
	});

	/*商品管理*/
	Route::group(['prefix'=>'goods'],function(){
		Route::any('list/{order?}',"GoodsController@lists");
		Route::get('order/{id}/{order_id}',"GoodsController@order");
		Route::get('set/{id}/{status}',"GoodsController@set")->where(['status'=>"(0|1|-1)"]);
		Route::any('add/{pid?}',"GoodsController@add");
		Route::any('edit/{id}',"GoodsController@edit");

	});

	/*分类管理*/
	Route::group(['prefix'=>'cates'],function(){
		Route::get('list/{pid}',"CateController@lists");
		Route::get('del/{id}',"CateController@del");
		Route::get('order/{id}/{order_id}',"CateController@order");
		Route::get('title/{id}/{title}',"CateController@title");
		Route::get('add/{title}/{order_id}/{pid}',"CateController@add");
	});

	/*分类管理*/
	Route::group(['prefix'=>'article'],function(){
		Route::get('list/{pid}',"ArticleController@lists");
		Route::get('del/{id}',"ArticleController@del");
		Route::get('edit/{id}',"ArticleController@edit");
		Route::any('add/',"ArticleController@add");
		Route::get('order/{id}/{order_id}',"ArticleController@order");
		Route::get('title/{id}/{title}',"ArticleController@title");
		Route::get('add/{title}/{order_id}/{pid}',"ArticleController@add");
	});
	
});

Route::group(['prefix' => 'user','namespace'=>'User',"middleware"=>'auth'], function() {
	Route::get('cart',"OrderController@cart");
	Route::get('del_cart/{id}',"OrderController@del_cart");
	Route::get('go_order',"OrderController@go_order");

	
    Route::get('',"PublicController@index");
    Route::any('setting',"PublicController@setting");

    /*会员管理*/
	Route::group(['prefix'=>'user'],function(){
		Route::any('list/{order?}',"UserManagerController@lists");
		Route::get('lahei/{id}',"UserManagerController@lahei");
		Route::get('huifu/{id}',"UserManagerController@huifu");
	});

	/*商品管理*/
	Route::group(['prefix'=>'goods'],function(){
		Route::any('list/{order?}',"GoodsController@lists");
		Route::get('order/{id}/{order_id}',"GoodsController@order");
		Route::get('set/{id}/{status}',"GoodsController@set")->where(['status'=>"(0|1|-1)"]);
		Route::any('add/{pid?}',"GoodsController@add");
		Route::any('edit/{id}',"GoodsController@edit");

	});

	/*分类管理*/
	Route::group(['prefix'=>'cates'],function(){
		Route::get('list/{pid}',"CateController@lists");
		Route::get('del/{id}',"CateController@del");
		Route::get('order/{id}/{order_id}',"CateController@order");
		Route::get('title/{id}/{title}',"CateController@title");
		Route::get('add/{title}/{order_id}/{pid}',"CateController@add");
	});

	/*分类管理*/
	Route::group(['prefix'=>'article'],function(){
		Route::get('list/{pid}',"ArticleController@lists");
		Route::get('del/{id}',"ArticleController@del");
		Route::get('edit/{id}',"ArticleController@edit");
		Route::any('add/',"ArticleController@add");
		Route::get('order/{id}/{order_id}',"ArticleController@order");
		Route::get('title/{id}/{title}',"ArticleController@title");
		Route::get('add/{title}/{order_id}/{pid}',"ArticleController@add");
	});
	
});


Route::get('/', "HomeController@index");

Route::get('/us',"HomeController@us");
Route::get('help/{id?}',"HelpController@index");

/*Upload*/
Route::any('/files/upload',"FileController@upload");
Route::get('/files/getimg/{id}',"FileController@getImg"); 

/*Cake*/
Route::get('/list/{pid}/{cate_id?}',"CakeController@lists");
Route::get('/detail/{id}',"CakeController@detail")->middleware('auth');
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