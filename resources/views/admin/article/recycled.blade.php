@extends('shangjia/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">
	<form method="get" action="{{ url('/shangjia/recycled/list') }}">
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
			<li class="tuanfabu_tabli @if(($order == 'id')) on @endif">
				<a href="{{url('/shangjia/recycled/list')}}">默认</a>
			</li>
			<li class="tuanfabu_tabli @if(($order == 'saled')) on @endif">
				<a href="{{url('/shangjia/recycled/list',['saled'])}}">按销量排行</a>
			</li>
			<li class="tuanfabu_tabli @if(($order == 'order_id')) on @endif">
				<a href="{{url('/shangjia/recycled/list',['order_id'])}}">按序号排行</a>
			</li>
		</ul>
	</div>
	<table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr style="background-color:#eee;">
				<td><input type="checkbox" id="select_all"></td>
				<td>编号</td>
				<td>缩略图</td>
				<td>标题</td>
				<td>价格</td>
				<td>排序</td>
				<td>销量</td>
				<td>订餐类型</td>
				<td>状态</td>
				<td>创建时间</td>
				<td>操作</td>
			</tr>
			@foreach($list as $v)
			<tr>
				<td><input type="checkbox" name="idarr" value="{{$v['id']}}"></td>
				<td>{{$v['id']}}</td>
				<td style="padding:0 0"><img width="66px" src="{{url('/files/getimg/'.$v['img'])}}"></td>
				<td>{{$v['title']}}</td>
				<td>{{$v['price']}}</td>
				<td>{{$v['order_id']}}</td>
				<td>{{$v['saled']}}</td>
				<td>@if($v['delivery'] == 1)
				外卖
				@elseif($v['delivery'] == 2)
				到店用
				@else
				外卖 + 到店用
				@endif
				</td>
				<td>
					回收站
				</td>
				<td>{{$v['created_at']}}</td>
				<td>
					<a href="{{url('/shangjia/recycled/recover',[$v['id']])}}">恢复</a>
					<a href="{{url('/shangjia/recycled/del',[$v['id']])}}">删除</a>
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
			
			</script>
		</tbody>
	</table>

	<nav class="">
		<ul class="pagination">
			<li><a href="javascript:void(0)" onclick="set_all_status(0)"><span>删除</span></a></li>
			<li><a href="javascript:void(0)" onclick="set_all_status(1)"><span>恢复</span></a></li>
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
	        	if($status == 0){
	        		location.href = "{{url('/shangjia/recycled/del')}}/" + idstr;
	        	}else{
	        		location.href = "{{url('/shangjia/recycled/recover')}}/" + idstr;
	        	}
	        }
        }
        </script>
	</nav>
</div>

@endsection()