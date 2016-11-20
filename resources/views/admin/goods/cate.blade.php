@extends('shangjia/base')
@section('content')
	<style>
	.w18{
		width:25% !important;
	}
	</style>
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">

<table class="table table-hover">
	<tr>
		<td>编号</td>
		<td>名称</td>
		<td>排序</td>
		<td>操作</td>
	</tr>
	<tbody id="container">
	@foreach($list as $v)
	<tr>
		<td>{{$v['id']}}</td>
		<td><input type="text" class="w18 form-control title" data-id="{{$v['id']}}" value="{{$v['title']}}"  /></td>
		<td><input type="text" class="w18 form-control order" data-id="{{$v['id']}}" value="{{$v['order_id']}}" /></td>
		<td>
			<a href="{{ url('/shangjia/cates/del/'.$v['id']) }}" class="btn btn-default del"  >删除</a>
		</td>
	</tr>
	@endforeach
	</tbody>

		<a href="javascript:void(0);" class="btn btn-default add">添加</a>
</table>
	</div>
	<script>
	$(function(){
		$('.order').change(function(){
			var id = $(this).attr('data-id');
			var order_id = this.value;
			var node = this;
			$.get("{{ url('/shangjia/cates/order') }}" +"/"+ id + "/" + order_id,function(){
				$(node).parent().append('修改完成');
			});
		});
		$('.title').change(function(){
			var id = $(this).attr('data-id');
			var title = this.value;
			var node = this;
			$.get("{{ url('/shangjia/cates/title') }}" +"/"+ id + "/" + title,function(){
				$(node).parent().append('修改完成');
			});
		});
		$('.add').click(function(){
			var html = "<tr><td></td>";
			html += '<td><input type="text"  class="w18 form-control title" value="" /></td>';
			html += '<td><input type="text" class="w18 form-control order"  value="" /></td>';
			html += '<td><a href="javascript:void(0);" class="btn btn-default confirm">确认</a></td></tr>';
			$("#container").append(html);
			$(".confirm").click(function(){
				var title = $(this).parent().parent().find(".title").val();
				var order = $(this).parent().parent().find(".order").val();
				var url = "{{url('/shangjia/cates/add')}}"+"/"+title+"/"+order;
				location.href=url;
			});
		});


	})
	</script>
@endsection()