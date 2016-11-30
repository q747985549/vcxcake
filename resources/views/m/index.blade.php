@extends('m.base')
@section('title','首页')
@section('top','none')
@section('content')
    <div class="page">
    <header id="head" style="border:1px solid #ccc">
        <h1>
            <a href="{{murl('/')}}" class="logo">
                <img alt="" src="{{url('files/getimg/'.$s['logo'])}}">
            </a>
        </h1>
        @if (Auth::check())
        <a href="{{murl('logout')}}" class="download-app">退出</a>
        <a href="{{murl('user')}}" class="download-app">个人中心</a>
        @else
        <a href="{{murl('register')}}" class="download-app">注册</a>
        <a href="{{murl('login')}}" class="download-app">登录</a>
        @endif
    </header>
    <div class="main-banner">
        <div id="slider-1" class="swipe" style="visibility: visible;">
            <ul class="swipe-wrap" style="width: 3840px;">
            @foreach($banner as $b)
                <li data-index="0">
                    <a href="{{$b['href']}}">
                        <img alt="" title="" src="{{url('files/getimg/'.$b['img'])}}">
                    </a>
                </li>
            @endforeach
            </ul>
            <div id="position-1" class="position">
            @foreach($banner as $b)
                <a href="#" class="on"></a>
            @endforeach
              
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/banner.js')}}"></script>
    <div class="full-screen" style="margin-top:0px;">
        <div class="home-nav index_nav">
            <a href="{{murl('list/1')}}" class="item bg1"><i class="iconfont"></i><p>蛋糕</p></a>
            <a href="{{murl('list/2')}}" class="item bg4">
                <div class="icecream"></div>
                <p>新品</p>
            </a>
            <a href="{{murl('user')}}" class="item bg5 red_icon_f"><i class="iconfont"></i><p>我的廿一客</p></a>
            <a href="{{murl('cart')}}" class="item bg4"><i class="iconfont type J_cart"><em class="mini_goods_num fixed_num">{{$cart_count or 0}}</em></i><p>我的购物车</p></a>
        </div>
    </div>

    <div class="home-hot">
        <div class="tab J-tab">
            <ul class="panel-list">
                <li class="panel c-fix act">
                @foreach($hot as $h)
                    <div class="add-title">
                        <div class="pt-item" data-salearea="1">
                            <a target="_blank" href="{{murl('detail/'.$h['id'])}}">
                                <div class="pt-img">
                                    <img  src="{{url('files/getimg/'.$h['img'])}}">
                                </div>
                                <div class="pt-name">{{$h['title']}}</div>
                                <div class="price"> {{$h['price']}}元 / 磅</div>
                            </a>
                        </div>
                    </div>
                @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection