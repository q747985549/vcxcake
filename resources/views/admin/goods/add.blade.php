@extends('admin/base')
@section('content')

<script type="text/javascript" src="//cdn.bootcss.com/plupload/2.1.8/plupload.full.min.js" charset="utf-8"></script>
 <script type="text/javascript" charset="utf-8" src="{{asset('js/edit/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('js/edit/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('js/edit/lang/zh-cn/zh-cn.js')}}"></script>

<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style>
	.w100{
		width:200px!important;
	}
	.tuanfabu_intw2{
		width:50px!important;
	}
	.message{
		color: #a5a0a0;
	}

	</style>
<div class="tuan_content">
<div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">商品添加 </div>
        </div>
    </div>
    <div class="tabnr_change  show">
    	<form method="post"  action="{{url('/admin/goods/add')}}" onsubmit="issubmit();">
    		{{  csrf_field() }}

    		<input type="hidden" name="id" value="{{$info['id'] or 0}}" />
    		<?php var_dump($info);exit;?>
    		<input type="hidden" name="pid" value="{{$info['pid'] or $pid}}" />

	    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
	                <td width="120"><p class="tuanfabu_t">标题：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="title" value="{{$info['title'] or ''}}" class="tuanfabu_int w100" />
		                	
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">分类：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<select name="cate_id"  class="form-control w100">
		                		@foreach($cates as $cate)
		                			<option @if(isset($info['cate_id']) and $info['cate_id'] == $cate['id']) selected @endif value="{{$cate['id']}}">{{$cate['name']}}</option>
		                		@endforeach
		                	</select>
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">缩略图：</p></td>
	                <td>
		                <div class="tuanfabu_nr logoimgclass">
		                	<button type="button" id="img" class="btn btn-default" >上传</button>
		                	<span id="percent"></span>
		                	<input type="hidden" name="img"  value="{{$info['img'] or ''}}" />
		                	@if(isset($info['img']))
		                		<img style='max-width:200px;' class="imgss" id="only" src='{{url("/files/getimg/".$info["img"])}}' />
		                	@endif
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">组图：</p></td>
	                <td>
		                <div class="tuanfabu_nr img">
                      	<button type="button" id="imgs" class="btn btn-default" >上传</button>
                      	<span id="percent"></span>
                      	<input type="hidden" name="imgs" value="{{$info['imgs'] or ''}}" />
                      	@if(isset($info))
                      	  @foreach(explode(',',$info['imgs']) as $id)
                      	    <span class="imgs"  data-id="{{$id}}" value="{{$id}}" >
                      	      <i class="glyphicon glyphicon-remove" onclick="del(this)"></i>
                      	      <img class="us"  src='{{url("/files/getimg/".$id)}}' />
                      	    </span>
                      	  @endforeach
                      	@endif
                    </div>
	                </td>
	            </tr>
	            <style>
              .us{
                width:200px;height:100px;
              }
              #imgs{
                float: left;
              }
              .imgs{
                position: relative;
                float: left;
              }
              .glyphicon{
                position: absolute;right: 0px;top: 0px;z-index: 99999;
              }
              </style>
	            <script>
	            $(function(){
   					 var ue = UE.getEditor('content');

	            })
	              function del(e){
	                $(e).parent().remove();
	              }

	              function issubmit(){
	                var arr = [];
	                $('.imgs').each(function(i,v){
	                  arr.push($(this).attr('data-id'));
	                });
	                $("[name=imgs]").val(arr.join(','));
	              }
			            	var logo = new plupload.Uploader({
                          runtimes : 'html5,silverlight,flash,html4',
                  browse_button : 'img',
                          chunk_size : '0',
                  url : '{{url("/files/upload")}}',
                  multipart : true,
                  multi_selection : false,
                          unique_names : true,
                  //         resize : { width : 320, height : 240, quality : 90 },
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
                      if(logo.state == plupload.STARTED){
                        alert('当前有文件正在上传，请上传完成之后重试！');
                        return false;
                      }
                        logo.start();
                    },
                      FileUploaded: function(up, file, info) {
                        info = JSON.parse(info.response);
                          $(".logoimgclass").find('.imgss').remove();
                        	$(".logoimgclass").append(" <span data-id="+info.id+" class='imgss'><i style='position: absolute;right: 0px;top: -45px;' onclick='del(this)' class='glyphicon glyphicon-remove'></i><img  id='only' style='max-width:200px;' src='"+info.img+"' /></span>");
                          $('[name=img]').val(info.id);
                       
                      },

                    UploadComplete: function(up, files) {
                    },
                   }
                    });
                logo.init();

		                var uploader = new plupload.Uploader({
                          runtimes : 'html5,silverlight,flash,html4',
                  browse_button : 'imgs',
                          chunk_size : '0',
                  url : '{{url("/files/upload")}}',
                  multipart : true,
                  multi_selection : true,
                          unique_names : true,
                  //         resize : { width : 320, height : 240, quality : 90 },
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
                          $(".img").append(" <span data-id="+info.id+" class='imgs'><i onclick='del(this)' class='glyphicon glyphicon-remove'></i><img  id='only' class='us'  src='"+info.img+"' /></span>");
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
	                <td width="120"><p class="tuanfabu_t">首页推荐：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                是
		                	<input type="radio" name="flag" @if(isset($info['flag']) and $info['flag'] == 1)checked @endif value="1" class="tuanfabu_int tuanfabu_intw2" />
		                否
		                	<input type="radio" name="flag" @if(isset($info['flag']) and $info['flag'] == 0)checked @endif value="0" @if(!isset($info))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">单价：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="price" value="{{$info['price'] or ''}}" class="tuanfabu_int tuanfabu_intw2" /><span class="message">*每磅的价格</span>
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
	                <td width="120"><p class="tuanfabu_t">详细内容：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<script id="content" type="text/plain" name="content" style="width:1024px;height:500px;"></script>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">销量：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="selled" value="{{$info['selled'] or rand(0,100)}}" class="tuanfabu_int tuanfabu_intw2" />

		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">尺寸：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="size" value="{{$info['size'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">*例：13x13cm</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">可供几人食用：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="person" value="{{$info['person'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">*例：3-5人</span>

		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">赠品：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="present" value="{{$info['present'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">*例：含5套餐具</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">提前预定的时间：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="wait_time" value="{{$info['wait_time'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">*单位：小时，会提示用户，要提前多少小时预定</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">品牌：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="brand" value="{{$info['brand'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">口味：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="kouwei" value="{{$info['kouwei'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">蛋糕种类：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="dangaocate" value="{{$info['dangaocate'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">适合人群：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="renqun" value="{{$info['renqun'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">适合节日：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="jieri" value="{{$info['jieri'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr> 
	            <tr>
	                <td width="120"><p class="tuanfabu_t">甜度：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="tiandu" value="{{$info['tiandu'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">请填写数字1-5，1代表一颗星</span>
		                </div>
	                </td>
	            </tr>
	           	<tr>
	                <td width="120"><p class="tuanfabu_t">保鲜方法：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="baoxian" value="{{$info['baoxian'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">使用材料：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="cailiao" value="{{$info['cailiao'] or ''}}" class="tuanfabu_int tuanfabu_intw2" />
		                	<span class="message">可不填</span>
		                </div>
	                </td>
	            </tr>

	            
	            <tr>
	                <td width="120"><p class="tuanfabu_t">重量分组：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                0.5磅<input type="checkbox" name="weight_arr[]" value="0.5" @if(isset($info) && strpos($info['weight_arr'],'0.5') === false)checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                1.0磅<input type="checkbox" name="weight_arr[]" value="1.0" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                1.5磅<input type="checkbox" name="weight_arr[]" value="1.5" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                2.0磅<input type="checkbox" name="weight_arr[]" value="2.0" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                2.5磅<input type="checkbox" name="weight_arr[]" value="2.5" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                3.0磅<input type="checkbox" name="weight_arr[]" value="3.0" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                3.5磅<input type="checkbox" name="weight_arr[]" value="3.5" @if(isset($info) && strpos($info['weight_arr'],'0.5'))checked @endif class="tuanfabu_int tuanfabu_intw2" />
		                <span class="message">*请选择商品在大小上多少种的分类</span>
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