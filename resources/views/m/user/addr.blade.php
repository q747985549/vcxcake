@extends('m.base')
@section('title','收货地址')
@section('content')
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="javascript:history.back()" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                我的收货地址
            </div>
            <a href="{{url('m/user/addr_add')}}" class="add-adr"><img src="{{asset('img/btn_add_adr.gif')}}" alt=""></a>
        </div>
    </header>
    <div class="address">
    @foreach($list as $v)
        <div class="item">
            <p>
                {{$v['address']}}
                <br> {{$v['name']}}
                <br> {{$v['mobile']}}
                <br>
            </p>
            <a href="{{url('m/user/addr_edit/'.$v['id'])}}">编辑收货地址</a>
            <a href="javascript:void(0);" class="set-default" data-id="{{$v['id']}}">设为默认</a>
            <a href="javascript:void(0);" class="del" data-id="{{$v['id']}}">删除</a>
            @if($v['default'] == 1)
            <span>默认</span>
            @endif
        </div>
    @endforeach
    </div>
        <script>
        var dialog = $("#member_address_submit");
        $(".set-default").click(function(){
            var id = $(this).attr('data-id');
            $.get("{{url('user/addr_setd')}}/"+id,function(){
                layer.msg('修改成功');
                location.reload();
            });
        });
         $(".del").click(function(){
            var id = $(this).attr('data-id');
            $.getJSON("{{url('user/addr_del')}}/"+id,function(data){
                layer.msg('删除成功');
                location.reload();
            });
        });
        </script>
</div>
@stop