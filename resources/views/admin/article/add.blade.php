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
    	<form method="post"  action="{{url('/admin/article/add')}}" onsubmit="issubmit();">
    		{{  csrf_field() }}

    		<input type="hidden" name="id" value="{{$info['id'] or 0}}" />
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
		                	<select name="pid"  class="form-control w100">
	                			<option @if(isset($info['pid']) and $info['pid'] == 1) selected @endif value="1">关于我们</option>
	                			<option @if(isset($info['pid']) and $info['pid'] == 2) selected @endif value="2">配送方式</option>
	                			<option @if(isset($info['pid']) and $info['pid'] == 3) selected @endif value="3">订购帮助</option>
		                	</select>
		                </div>
	                </td>
	            </tr>
	         	
	            <tr>
	                <td width="120"><p class="tuanfabu_t">详细内容：</p></td>
	                <td>
		                <div class="tuanfabu_nr">
		                	<script id="content" type="text/plain" name="content" style="width:1024px;height:500px;">{!! $info['content'] or '' !!}</script>
		                </div>
	                </td>
	            </tr>
	             <script>
	            $(function(){
   					 var ue = UE.getEditor('content');

	            })
	            </script>
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