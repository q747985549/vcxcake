<?php 
function murl($url){
	return url('m/'.$url);
}
function get_level($level){
	switch ($level) {
		case 0:$name = "注册会员";
			break;
		case 1:$name = "初阶会员";
			break;
		case 2:$name = "中阶会员";
			break;
		case 3:$name = "高阶会员";
			break;
		case 4:$name = "尊客";
			break;
		default:
			$name = "注册会员";
			break;
	}
	return $name;
}
