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
            <div class="left tuan_topser_l">幻灯片添加 </div>
        </div>
    </div>
    <div class="tabnr_change  show">
    	<form method="post"  action="{{url('/admin/banner/add')}}" onsubmit="issubmit();">
    		{{  csrf_field() }}

    		<input type="hidden" name="id" value="{{$info['id'] or 0}}" />

	    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
	                <td width="120"><p class="tuanfabu_t">链接：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="href" value="{{$info['href'] or ''}}" class="tuanfabu_int w100" />
		                	
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">位置：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<select name="type">
		                		<option value="1" @if(isset($info['type']) and $info['type'] == 1)selected @endif>首页顶部</option>
		                		<option value="2" @if(isset($info['type']) and $info['type'] == 2)selected @endif>首页中部</option>
		                		<option value="3" @if(isset($info['type']) and $info['type'] == 3)selected @endif>首页底部</option>
		                	</select>
		                </div>
	                </td>
	            </tr>

	            <tr>
	                <td width="120"><p class="tuanfabu_t">子位置：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                <select name="type_con">
		                		<option value="1" @if(isset($info['type_con']) and $info['type_con'] == 1)selected @endif>一号</option>
		                		<option value="2" @if(isset($info['type_con']) and $info['type_con'] == 2)selected @endif>二号</option>
		                		<option value="3" @if(isset($info['type_con']) and $info['type_con'] == 3)selected @endif>三号</option>
		                		<option value="4" @if(isset($info['type_con']) and $info['type_con'] == 4)selected @endif>四号</option>
		                		<option value="5" @if(isset($info['type_con']) and $info['type_con'] == 5)selected @endif>五号</option>
		                	</select>
		                	<span> * 位置在首页中部的时候需要选择这条</span>
		                </div>
	                </td>
	            </tr>

	         	<tr>
	                <td width="120"><p class="tuanfabu_t">排序：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="text" name="order_id" value="{{$info['order_id'] or $order_id}}" class="tuanfabu_int w100" />
		                </div>
	                </td>
	            </tr>
	            <tr>
	                <td width="120"><p class="tuanfabu_t">大图：</p></td>
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

		          </script>

				<tr>
	                <td width="120"><p class="tuanfabu_t">操作：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<input type="submit" value="提交" class="btn btn-success" />
		                </div>
	                </td>
	            </tr>
	        </table>
    	</form>
    </div>
	</div>
@endsection()