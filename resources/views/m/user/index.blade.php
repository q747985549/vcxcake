@extends('m.base')
@section('title','个人中心')
@section('content')

<div class="full-screen">
    <header>
    <div class="a-bar">
         <a href="javascript:history.back()" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
        </a>
        <div class="a-name">
            我的廿一客
        </div>
    </div>
    </header>
        <div class="mem-info c-fix">
            
                       
            <div class="person_info">
                <div class="my_info">
                    <div class="mem_logo">
                    @if($user['head'] != 0)
                        <img src="{{url('files/getimg/'.$user['head'])}}">
                    @else
                        <img src="{{asset('img/avator-photo.png')}}">
                    @endif
                    </div>
                    <ul class="mem_info">
                        <li>{{$s['name']}}</li>
                        <li class="phone"><a href="">{{$user['mobile']}}</a></li>
                                                <li class="modify_info"><a href="{{url('m/user/info')}}">修改个人信息 &gt;</a></li>
                                            </ul>
                </div>
                <div class="activity">
                    <a href="javascript:void(0);">
                        <ul class="balance">
                            <li class="a_title">￥{{$user['buy_total']}}</li>
                            <li class="a_txt">购买总额</li>
                        </ul>
                    </a>
                    <a href="javascript:void(0);">
                        <ul class="coupon">
                            <li class="a_title">{{$user['buy_num']}}次</li>
                            <li class="a_txt">购买次数</li>
                        </ul>
                    </a>
                </div>
            </div>
            <ul class="menu-list">
                    <li style="background:url({{asset('img/member0.png')}}) 12px center no-repeat; background-size:23px">
                        <a href="javascript:alert('等待支付接口');">
                            <div>
                                <strong>待付订单</strong>
                            </div>
                        </a>
                    </li>
                    <li style="background:url({{asset('img/member2.png')}}) 12px center no-repeat; background-size:23px">
                        <a href="javascript:alert('等待支付接口');">
                            <div>
                                <strong>全部订单</strong>
                            </div>
                        </a>
                    </li>
                    <li style="background:url({{asset('img/member1.png')}}) 12px center no-repeat; background-size:23px">
                        <a href="{{url('m/user/addr')}}">
                            <div>
                                <strong>地址管理</strong>
                            </div>
                        </a>
                    </li>
                </ul>
        </div>
    <div class="btnbox02"> </div>
</div>
@stop