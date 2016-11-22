@extends('admin/base')
@section('content')
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="tuan_content">
	<div class="tuanfabu_tab">
		<ul>
			<li class="tuanfabu_tabli @if(($pid == 1)) on @endif">
				<a href="{{url('/admin/article/list/1')}}">关于我们</a>
			</li>
			<li class="tuanfabu_tabli @if(($pid == 2)) on @endif">
				<a href="{{url('/admin/article/list/2')}}">配送方式</a>
			</li>
			<li class="tuanfabu_tabli @if(($pid == 3)) on @endif">
				<a href="{{url('/admin/article/list/3')}}">购物指南</a>
			</li>
		</ul>
	</div>
	<table class="tuan_table" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr style="background-color:#eee;">
				<td>编号</td>
				<td>标题</td>
				<td>创建时间</td>
				<td>修改时间</td>
				<td>操作</td>
			</tr>
			@foreach($list as $v)
			<tr>
				<td>{{$v['id']}}</td>
				<td>{{$v['title']}}</td>
				<td>{{$v['created_at']}}</td>
				<td>{{$v['updated_at']}}</td>
				<td>
					<a href="{{url('/admin/article/edit',[$v['id']])}}">编辑</a>
					<a href="{{url('/admin/article/del',[$v['id']])}}">删除</a>
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
</div>

@endsection()