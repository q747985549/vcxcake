@extends('shangjia/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">
	<form method="get" action="{{ url('/shangjia/user/list') }}">
		<div class="radius5 tuan_top">
			<div class="tuan_top_t">
				<div class="left tuan_topser_l">
					手机号
					<input type="text" class="radius3 tuan_topser" name="keyword" value="">
					<input type="submit" style="margin-left:10px;" class="radius3 sjgl_an tuan_topbt" value="搜 索"></div>
				
			</div>
		</div>
	</form>
	<div class="tuanfabu_tab">
		<ul>
			<li class="tuanfabu_tabli @if(($order == 'id')) on @endif">
				<a href="{{url('/shangjia/user/list')}}">默认</a>
			</li>
			<li class="tuanfabu_tabli @if(($order == 'buy_num')) on @endif">
				<a href="{{url('/shangjia/user/list',['buy_num'])}}">按订单数排行</a>
			</li>
			<li class="tuanfabu_tabli @if(($order == 'buy_total')) on @endif">
				<a href="{{url('/shangjia/user/list',['buy_total'])}}">按购买额排行</a>
			</li>
		</ul>
	</div>
	<table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr style="background-color:#eee;">
				<td>头像</td>
				<td>昵称</td>
				<td>手机号</td>
				<td>订单数</td>
				<td>购买额</td>
				<td>储值</td>
				<td>加入本店时间</td>
				<td>状态</td>
				<td>操作</td>
			</tr>
			@foreach($list as $v)
			<tr>
				<td style="padding:0 0"><img width="28px" src="{{$v['headimg']}}"></td>
				<td>{{$v['nickname']}}</td>
				<td>{{$v['mobile']}}</td>
				<td>{{$v['buy_num']}}</td>
				<td>{{$v['buy_total']}}</td>
				<td>{{$v['wallet']}}</td>
				<td>{{$v['create_time']}}</td>
				<td>@if($v['status'] == 1)正常@else拉黑@endif</td>
				<td>
				@if($v['status'] == 1)
					<a href="javascript:void(0);" onclick=" onconfirm({{$v['id']}});return ">拉黑</a>
				@else
					<a href="{{url('/shangjia/user/huifu',$v['id'])}}" >恢复</a>
				@endif
				</td>

			</tr>
			@endforeach
			<script>
			function onconfirm($id){
				if(confirm('确定拉黑？')){
					location.href = "{{url('/shangjia/user/lahei')}}/" + $id;
				};
			}
			</script>
		</tbody>
	</table>

	<nav class="">
		{{$list->links()}}
	</nav>
</div>

@endsection()