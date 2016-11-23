@extends('admin/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">
<div class="radius5 tuan_top">
        <div class="tuan_top_t">
            <div class="left tuan_topser_l">幻灯片列表 </div>
        </div>
    </div>
	<table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr style="background-color:#eee;">
				<td>编号</td>
				<td>缩略图</td>
				<td>链接</td>
				<td>排序</td>
				<td>点击量</td>
				<td>创建时间</td>
				<td>修改时间</td>
				<td>操作</td>
			</tr>
			@foreach($list as $v)
			<tr>
				<td>{{$v['id']}}</td>
				<td style="padding:0 0"><img width="66px" src="{{url('/files/getimg/'.$v['img'])}}"></td>
				<td>{{$v['href']}}</td>
				<td><input class="tuanfabu_int" style="width:38px" onchange="change_order_id({{$v['id']}},this)" value="{{$v['order_id']}}" /></td>
				<td>{{$v['view']}}</td>
				<td>{{$v['created_at']}}</td>
				<td>{{$v['updated_at']}}</td>
				<td>
					<a href="{{url('/admin/banner/edit',[$v['id']])}}">编辑</a>
					<a href="{{url('/admin/banner/del',[$v['id']])}}">删除</a>
				</td>
			</tr>
			@endforeach
			<script>
			function change_order_id($id,e){
				var url = "{{ url('/admin/banner/order/') }}/" + $id + "/" +e.value;
				$.get(url,function(){});
			}
			</script>
		</tbody>
	</table>
	</nav>
</div>

@endsection()