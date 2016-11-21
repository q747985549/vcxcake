@extends('admin/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">
	<form method="get" action="{{ url('/admin/goods/list') }}">
		<div class="radius5 tuan_top">
			<div class="tuan_top_t">
				<div class="left tuan_topser_l">
					标题
					<input type="text" class="radius3 tuan_topser" name="keyword" value="">
					<input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"></div>
				
			</div>
		</div>
	</form>
	<div class="tuanfabu_tab">
		<ul>
			<li class="tuanfabu_tabli @if(($pid == 1)) on @endif">
				<a href="{{url('/admin/goods/list/1')}}">蛋糕</a>
			</li>
			<li class="tuanfabu_tabli @if(($pid == 2)) on @endif">
				<a href="{{url('/admin/goods/list/2')}}">新品</a>
			</li>
		</ul>
	</div>
	<table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr style="background-color:#eee;">
				<td><input type="checkbox" id="select_all"></td>
				<td>编号</td>
				<td>缩略图</td>
				<td>分类</td>
				<td>标题</td>
				<td>排序</td>
				<td>已售</td>
				<td>单价</td>
				<td>状态</td>
				<td>创建时间</td>
				<td>操作</td>
			</tr>
			@foreach($list as $v)
			<tr>
				<td><input type="checkbox" name="idarr" value="{{$v['id']}}"></td>
				<td>{{$v['id']}}</td>
				<td style="padding:0 0"><img width="66px" src="{{url('/files/getimg/'.$v['img'])}}"></td>
				<td>{{$v['cate_name']}}</td>
				<td>{{$v['title']}}</td>
				<td><input class="tuanfabu_int" style="width:38px" onchange="change_order_id({{$v['id']}},this)" value="{{$v['order_id']}}" /></td>
				<td>{{$v['selled']}}</td>
				<td>{{$v['price']}}
				</td>
				<td>@if($v['status'] == 0)
				下架
				@elseif($v['status'] == 1)
				上架中
				@endif
				</td>
				<td>{{$v['created_at']}}</td>
				<td>
					<a href="{{url('/admin/goods/edit',[$v['id']])}}">编辑</a>
					<a href="{{url('/admin/goods/set',[$v['id'],-1])}}">删除</a>

					@if($v['status'] == 0)
					<a href="{{url('/admin/goods/set',[$v['id'],1])}}" >上架</a>
					@elseif($v['status'] == 1)
					<a href="{{url('/admin/goods/set',[$v['id'],0])}}" >下架</a>
					@endif
				</td>
			</tr>
			@endforeach
			<script>
			$("#select_all").click(function(){
				if($(this).get(0).checked){
					$("[name=idarr]").each(function(i,v){
						v.checked = true;
					});
				}else{
					$("[name=idarr]").each(function(i,v){
						v.checked = false;
					});
				}
			});
			function del($id){
				if(confirm('确定删除？')){
					location.href = "{{url('/admin/goods/del')}}/" + $id;
				}
			}
			function change_order_id($id,e){
				var url = "{{ url('/admin/goods/order/') }}/" + $id + "/" +e.value;
				$.get(url,function(){});
			}
			</script>
		</tbody>
	</table>

	<nav class="">
		<ul class="pagination">
			<li><a href="javascript:void(0)" onclick="set_all_status(-1)"><span>删除</span></a></li>
			<li><a href="javascript:void(0)" onclick="set_all_status(1)"><span>上架</span></a></li>
			<li><a href="javascript:void(0)" onclick="set_all_status(0)"><span>下架</span></a></li>
        </ul>
		{{$list->links()}}
        <script>
        function set_all_status($status){
        	if(confirm('确定？')){
	        	var idarr = [],idstr;
	        	$('[name=idarr]:checked').each(function(i,v){
	        		idarr.push(v.value);
	        	});
	        	idstr = idarr.join(',');
	        	location.href = "{{url('/admin/goods/set')}}/" + idstr + '/' + $status;
	        }
        }
        </script>
	</nav>
</div>

@endsection()