<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class HelpController extends Controller
{
    public function index($id = null){
    	$info = $id ? Article::find($id):Article::first() ;
    	return view('help',['info'=>$info,'list'=>Article::all()]);
    }
}
