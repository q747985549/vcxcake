<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Auth;
class FileController extends Controller
{
    public function upload(Request $request){
    	if($file = $request->file('file') and strpos($file->getClientMimeType(),'image') !== false){
            // var_dump($file);exit;
    		$path = $file->store('upload');
    		if($path){
    			$id = Files::insertGetId(['path'=>$path,'file_name'=>$file->getClientOriginalName()]);
    			return array('id'=>$id,'img'=>url('/files/getimg/'.$id));
    		}else{
    			return array('error'=>'上传失败');
    		}
    		
    	}
    }
    public function getImg($id){
    	$info = Files::find($id);
    	if($info){
    		$fileres = file_get_contents(storage_path('app/'.$info['path']));
			header('Content-type: image/jpeg');
			echo $fileres;
    	}
    }
}
