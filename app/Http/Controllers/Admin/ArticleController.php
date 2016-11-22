<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
class ArticleController extends Controller
{
    public function lists($pid){
    	$list = Article::where('pid','=',$pid)->get();
    	return view("admin.article.list",['list'=>$list,'pid'=>$pid]);
    }
    public function edit($id){
    	$info = Article::find($id);
    	return view("admin.article.add",['info'=>$info]);
    }
    public function add(Request $re){
    	if($re->isMethod('post')){
    		if($re->input('id') == 0){
    			Article::create($re->except('_token','s','id'));
    		}else{
	    		Article::where('id','=',$re->input('id'))->update($re->except('_token','s'));
    		}
	    	return redirect('/admin/article/list/'.$re->input('pid'));
    	}
    	return view('admin.article.add');
    }
    public function del($id){
    	Article::where('id','=',$id)->delete();
	    return redirect('/admin/article/list/1');
    }
}
