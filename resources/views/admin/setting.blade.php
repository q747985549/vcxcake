@extends('admin/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="{{asset('js/time/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
<script type="text/javascript" src="{{asset('js/time/js/jquery-1.8.3.min.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('js/time/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/time/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{asset('js/time/js/locales/bootstrap-datetimepicker.fr.js')}}" charset="UTF-8"></script>

<!-- 上传控件 -->
<script type="text/javascript" src="//cdn.bootcss.com/plupload/2.1.8/plupload.full.min.js" charset="utf-8"></script>
 <script type="text/javascript">
 $(function(){
  $(".time").datetimepicker({format: 'hh:ii',startView:1});
 })
                    
</script>  
	<style>
	.w100{
		width:100px!important;
	}
	</style>
<div class="tuan_content">
<div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">本店管理 </div>
        </div>
    </div>
    <div class="tabnr_change  show">
    	<form method="post"  action="" onsubmit="return issubmit();">
    		{{  csrf_field() }}
	    	<table class="tuanfabu_table" width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
	                <td width="120"><p class="tuanfabu_t">网站名称</p></td>
	                <td>
		                <div class="tuanfabu_nr">
              
                      <input type="text" name="name" value="{{$s['name'] or ''}}" class="tuanfabu_int tuanfabu_intw2 " />
                     
		                </div>
	                </td>
	            </tr>
              <tr>
                  <td width="120"><p class="tuanfabu_t">官方淘宝店连接</p></td>
                  <td>
                    <div class="tuanfabu_nr">
              
                      <input type="text" name="taobao" value="{{$s['taobao'] or ''}}" class="tuanfabu_int tuanfabu_intw2 " />
                     
                    </div>
                  </td>
              </tr>
               <tr>
                  <td width="120"><p class="tuanfabu_t">客服电话</p></td>
                  <td>
                    <div class="tuanfabu_nr">
              
                      <input type="text" name="telephone" value="{{$s['telephone'] or ''}}" class="tuanfabu_int tuanfabu_intw2 " />
                     
                    </div>
                  </td>
              </tr>
              
	             <tr>
                  <td width="120"><p class="tuanfabu_t">LOGO：</p></td>
                  <td>
                    <div class="tuanfabu_nr logoimgclass">
                      <button type="button" id="logo" class="btn btn-default" >上传</button>
                      <span id="percent"></span>
                      <input type="hidden" name="logo" value="{{$s['logo'] or ''}}" />
                      @if(!empty($s['logo']))
                          <span class="imgss" >
                            <i class="glyphicon glyphicon-remove" onclick="del(this)"></i>
                            <img style='max-width:200px;'  src='{{url("/files/getimg/".$s["logo"])}}' />
                          </span>
                      @endif

                    </div>
                  </td>
              </tr>
               <tr>

                  <td width="120"><p class="tuanfabu_t">会员等级示图：</p></td>
                  <td>
                    <div class="tuanfabu_nr user_levelimgclass">
                      <button type="button" id="user_level" class="btn btn-default" >上传</button>
                      <span id="percent"></span>
                      <input type="hidden" name="user_level" value="{{$s['user_level'] or ''}}" />
                      @if(!empty($s['user_level']))
                          <span class="user_level" >
                            <i class="glyphicon glyphicon-remove" onclick="del(this)"></i>
                            <img style='max-width:200px;'  src='{{url("/files/getimg/".$s["user_level"])}}' />
                          </span>
                      @endif

                    </div>
                  </td>
              </tr>
              <tr>
                  <td width="120"><p class="tuanfabu_t">版权信息：</p></td>
                  <td>
                    <div class="tuanfabu_nr">
                      <textarea name="copy_right" class="tuanfabu_int" style="width:700px" row="2">{{$s['copy_right'] or ''}}</textarea>
                    </div>
                  </td>
              </tr>
               <tr>
                  <td width="120"><p class="tuanfabu_t">品牌故事组图：</p></td>
                  <td>
                    <div class="tuanfabu_nr img">
                      <button type="button" id="imgs" class="btn btn-default" >上传</button>
                      <span id="percent"></span>
                      <input type="hidden" name="imgs" value="{{$info['imgs'] or ''}}" />
                      @if(!empty($s['imgs']))
                        @foreach(explode(',',$s['imgs']) as $id)
                          <span class="imgs"  data-id="{{$id}}" value="{{$id}}" >
                            <i class="glyphicon glyphicon-remove" onclick="del(this)"></i>
                            <img class="us"  src='{{url("/files/getimg/".$id)}}' />
                          </span>
                        @endforeach
                      @endif

                    </div>
                  </td>
              </tr>

	             <tr>
                  <td width="120"><p class="tuanfabu_t">配送费</p></td>
                  <td>
                    <div class="tuanfabu_nr">
              
                      <input type="text" name="send_fee" value="{{$s['send_fee'] or ''}}" class="tuanfabu_int tuanfabu_intw2 " />
                      <span color="gray">*单位：元</span>
                    </div>
                  </td>
              </tr>

	            <script>
                 var user_level = new plupload.Uploader({
                           runtimes : 'html5,silverlight,flash,html4',
                   browse_button : 'user_level',
                           chunk_size : '0',
                   url : '{{url("/files/upload")}}',
                   multipart : true,
                   multi_selection : false,
                           unique_names : true,
                   //         resize : { width : 320, height : 240, quality : 90 },
                           filters : {
                                 max_file_size : '10mb',
                                 mime_types: [
                                     {title : "图片", extensions : "jpg,png,gif"}
                                 ]
                           },
 
                   flash_swf_url :  'http://cdn.bootcss.com/plupload/2.1.8/Moxie.swf',
                           init : {
                     UploadProgress: function(up, file) {
 
                       var percent = Math.round(file.loaded * 100 / file.size);
                       $("#percent").html(percent + "%");    
                             },
                     FilesAdded : function(up,file){
                         user_level.start();
                     },
                       FileUploaded: function(up, file, info) {
                         info = JSON.parse(info.response);
                           $(".user_levelimgclass").find('.imgss').remove();
                           $(".user_levelimgclass").append(" <span data-id="+info.id+" class='user_level'><i style='position: absolute;right: 0px;top: -45px;' onclick='del(this)' class='glyphicon glyphicon-remove'></i><img  id='only' style='max-width:200px;' src='"+info.img+"' /></span>");
                           $('[name=user_level]').val(info.id);
                        
                       },
                     UploadComplete: function(up, files) {
                     },
                    }
                     });
                 user_level.init();

            
	            	var logo = new plupload.Uploader({
                          runtimes : 'html5,silverlight,flash,html4',
                  browse_button : 'logo',
                          chunk_size : '0',
                  url : '{{url("/files/upload")}}',
                  multipart : true,
                  multi_selection : false,
                          unique_names : true,
                  //         resize : { width : 320, height : 240, quality : 90 },
                          filters : {
                                max_file_size : '10mb',
                                mime_types: [
                                    {title : "图片", extensions : "jpg,png,gif"}
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
                          $('[name=logo]').val(info.id);
                       
                      },

                    UploadComplete: function(up, files) {
                    },
                   }
                    });
                logo.init();

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
                                    {title : "图片", extensions : "jpg,png,gif"}
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