<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Auth;
class FileController extends Controller
{
    public function upload(Request $request){
    	if($file = $request->file('file') and strpos($file->getClientMimeType(),'image') !== false){
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
    public function upload_head(Request $request){
        $file = $request->file('file');
        if($file){
            if(strpos($file->getClientMimeType(),'image') === false){
                return "<script>parent.msg('只能上传图片')</script>";
            }
            if($file->getClientSize() > 2*1024*1024){
                return "<script>parent.msg('图片的尺寸不能大于2M')</script>";
            }
            $path = $file->store('upload');
            if($path){
                $id = Files::insertGetId(['path'=>$path,'file_name'=>$file->getClientOriginalName()]);
                Auth::user()->head = $id;
                Auth::user()->save();
                return "<script>parent.msg('上传成功，请刷新页面查看')</script>";
            }else{
                return "<script>parent.msg('上传失败')</script>";
            }
        }
    }
}
