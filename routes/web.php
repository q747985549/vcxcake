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
    Route::get('change_password/{p}',"PublicController@change_password");

    /*banner管理*/
    Route::group(['prefix'=>'banner'],function(){
    	Route::get('','BannerController@lists');
    	Route::any('add','BannerController@add');
    	Route::get('order/{id}/{order_id}',"BannerController@order");
		Route::any('edit/{id}',"BannerController@edit");
		Route::any('del/{id}',"BannerController@del");
    });
    /*会员管理*/
	Route::group(['prefix'=>'user'],function(){
		Route::any('list/{order?}',"UserController@lists");
		Route::get('lahei/{id}',"UserController@lahei");
		Route::get('huifu/{id}',"UserController@huifu");

		Route::any('admin_list/{order?}',"UserController@admin_list");
		Route::get('lahei/{id}',"UserController@lahei");
		Route::get('huifu/{id}',"UserController@huifu");
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

	Route::any('add_address',"InfoController@add_addr");
	Route::any('addr',"InfoController@addr");
	Route::get('addr_get/{id}',"InfoController@addr_get");
	Route::get('addr_setd/{id}',"InfoController@addr_setd");
	Route::get('addr_del/{id}',"InfoController@addr_del");

	Route::get('del_addr/{id}',"InfoController@del_addr");

	Route::get('',"InfoController@index");
	Route::any('password',"InfoController@password");
	Route::any('info',"InfoController@info");
	Route::post('change_mobile',"InfoController@change_mobile");
});
Route::group(['prefix' => 'm','namespace'=>'Mobile'], function() {
	Route::any('',"PublicController@index");
	Route::any('login',"PublicController@login");
	Route::any('register',"PublicController@register");
	Route::any('login1',"PublicController@login1");
	Route::any('logout',"PublicController@loginout");

	Route::get('list/{pid}/{cate_id?}',"CakeController@lists");
	Route::get('detail/{id}',"CakeController@detail");

	Route::group(['prefix'=>'user'],function(){
		Route::get('','UserController@index');
		Route::any('info',"UserController@info");
		Route::any('addr',"UserController@addr");
		Route::any('addr_edit/{id}',"UserController@addr_edit");
		Route::any('addr_add',"UserController@addr_add");

		Route::any('cart',"OrderController@cart");
		Route::any('change_cart_num/{id}/{num}',"OrderController@change_cart_num");
		Route::any('del_cart/{id}',"OrderController@del_cart");
		Route::any('del_cart_all',"OrderController@del_cart_all");
	});
	Route::any('addcart',"OrderController@addcart");

});


Route::get('/', "HomeController@index");

Route::get('/us',"HomeController@us");
Route::get('help/{id?}',"HelpController@index");

/*Upload*/
Route::any('/files/upload',"FileController@upload");
Route::any('/files/upload_head',"FileController@upload_head");
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

Route::get('/sendsms/{mobile}',"PublicController@sendsms")->where('mobile','^1[34578]\d{9}$');
Route::get('captcha',function(){
	return captcha();
});