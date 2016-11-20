@extends('shangjia/base')
@section('content')

<script type="text/javascript" src="//cdn.bootcss.com/plupload/2.1.8/plupload.full.min.js" charset="utf-8"></script>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.w100{
		width:100px!important;
	}
	</style>
<div class="tuan_content">
<div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">商品添加 </div>
        </div>
    </div>
    <div class="tabnr_change  show">
    	<form method="post"  action="{{url('/shangjia/goods/add')}}">
    		{{  csrf_field() }}

    		<input type="hidden" name="id" value="{{$info['id'] or 0}}" />

	    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
	                <td width="120"><p class="tuanfabu_t">标题：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="title" value="{{$info['title'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">分类：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<select name="cate_id"  class="form-control w100">
		                		@foreach($cates as $cate)
		                			<option @if(isset($info['cate_id']) and $info['cate_id'] == $cate['id']) selected @endif value="{{$cate['id']}}">{{$cate['title']}}</option>
		                		@endforeach
		                	</select>
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">缩略图：</p></td>
	                <td>
		                <div class="tuanfabu_nr img">
		                	<button type="button" id="upload" class="btn btn-default" >上传</button>
		                	<span id="percent"></span>
		                	<input type="hidden" name="img" value="{{$info['img'] or ''}}" />
		                	@if(isset($info['img']))
		                		<img style='max-width:200px;' id="only" src='{{url("/files/getimg/".$info["img"])}}' />
		                	@endif
		                </div>
	                </td>
	            </tr>
	            <script>
	            	var uploader = new plupload.Uploader({
                          runtimes : 'html5,silverlight,flash,html4',
                  browse_button : 'upload',
                          chunk_size : '0',
                  url : '{{url("/files/upload")}}',
                  multipart : true,
                  multi_selection : false,
                          unique_names : true,
                          resize : { width : 320, height : 240, quality : 90 },
                          filters : {
                                max_file_size : '10mb',
                                mime_types: [
                                    {title : "图片", extensions : "jpg,png"}
                                ]
                          },

                  flash_swf_url :  'http://cdn.bootcss.com/plupload/2.1.8/Moxie.swf',
                          init : {
                    UploadProgress: function(up, file) {

                      var percent = Math.round(file.loaded * 100 / file.size);
                      $("#percent").html(percent + "%");    
                            },
                    FilesAdded : function(up,file){
                      if(uploader.state == plupload.STARTED){
                        alert('当前有文件正在上传，请上传完成之后重试！');
                        return false;
                      }
                        uploader.start();
                    },
                      FileUploaded: function(up, file, info) {
                        info = JSON.parse(info.response);
                        if(info.id){
                        	$("[name=img]").val(info.id);
                        	if($("#only").get(0)){
                        		$("#only").attr('src',info.img);
                        	}else{
                        		$(".img").append("<img id='only' style='max-width:200px;' src='"+info.img+"' />");
                        	}
                        }else{
                        	$("#percent").html(info.error);    
                        }
                      },

                    UploadComplete: function(up, files) {
                    },
                   }
                    });
                uploader.init();
	            </script>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">原价：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="marketprice" value="{{$info['marketprice'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">折扣价：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="price" value="{{$info['price'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">类型：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	限到店买
		                	<input type="radio" name="delivery" @if(isset($info['delivery']) and $info['delivery'] == 1) checked @endif value="1" @if(!isset($info['delivery'])) checked @endif class="w100 tuanfabu_int tuanfabu_intw2" />
		                	限外卖
		                	<input type="radio" name="delivery" @if(isset($info['delivery']) and $info['delivery'] == 2) checked @endif value="2" class="w100 tuanfabu_int tuanfabu_intw2" />
		                	两者都可以
		                	<input type="radio" name="delivery" @if(isset($info['delivery']) and $info['delivery'] == 3) checked @endif value="3" class="w100 tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>
	           
	            <tr>
	                <td width="120"><p class="tuanfabu_t">状态：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	下架
		                	<input type="radio" name="status" @if(isset($info['status']) and $info['status'] == 0) checked @endif @if(!isset($info['status'])) checked @endif value="0" class="w100 tuanfabu_int tuanfabu_intw2" />
		                	上架
		                	<input type="radio" name="status" @if(isset($info['status']) and $info['status'] == 1) checked @endif value="1" class="w100 tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">排序：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="order_id" value="{{$info['order_id'] or $order_id}}" class="tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">描述：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<textarea type="text" name="description" name="order_id" class="form-control ">{{$info['description'] or ''}}</textarea>
		                </div>
	                </td>
	            </tr>

				<tr>
	                <td width="120"><p class="tuanfabu_t">操作：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="submit" value="提交" class="btn btn-success" />
		                	@foreach($errors->all() as $error)
		                	{{$error}}
		                	@endforeach
		                </div>
	                </td>
	            </tr>
	        </table>
    	</form>
    </div>
	</div>
@endsection()