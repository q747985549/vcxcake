<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')|{{$s['name']}}</title>
    <link href="{{asset('css/basic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/stylecake.css')}}" rel="stylesheet" />
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
    <link href="{{asset('css/index.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
    <script src="//cdn.bootcss.com/layer/2.4/layer.min.js"></script>
      <script>
    var $j = $;
    </script>
</head>

<body>
    <div class="head-area">
        <div class="head-inner">
            <div class="nav-area fl-l clearfix">
                <a href="/" class="global-logo fl-l"><img src="{{url('files/getimg/'.$s['logo'])}}"></a>
                <ul class="head-nav fl-l clearfix">
                    <li class="nav-item ">
                        <a href="{{url('/')}}">首页</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{url('/list/1')}}">蛋糕</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{url('/list/2')}}">新品</a>
                    </li>
                    
                    <li class="nav-item ">
                        <a href="{{url('/us')}}">品牌故事</a>
                    </li>
                    
                    <li class="nav-item  last">
                        <a href="{{url('/help/4')}}" target="_blank">订购帮助</a>
                    </li>
                </ul>
            </div>
            <div class="login-mes fl-r" style="position: relative;">
                <ul class="head-nav fl-l clearfix">
                @if (Auth::check())
                    <li class="" id="j_header_logout">
                        <a href="/member.html" style="padding:0;">&nbsp;&nbsp;个人中心</a>
                        <a href="{{url('/admin')}}" style="padding:0;">&nbsp;&nbsp;后台管理</a><a href="/loginout">[退出]</a>
                    </li>
                    <li id="j_header_order">
                        <a id="j_header_order_link" href="/member-orders_v2_static.html">订单</a>
                    </li>
                    <li class="last">
                        <a href="/cart.html" class="shop-car" id="j_header_cart_number">0</a>
                    </li>
                @else
                    <li id="j_header_login">
                        <a href="/login" id="IDheaderlogin">登录</a>
                    </li>
                    <li class="last">
                        <a href="/register" id="IDheadersignup">注册</a>
                    </li>
                @endif
               
                </ul>
            </div>
        </div>
    </div>
 @yield('content')

    <div class="footer-area">
        <div class="footer-inner">
            <div class="fl-l foo-mes">
                
                <p class="copyright">
                    {{$s['copy_right']}}
                </p>
            </div>
            <div class="fl-r foo-link clearfix">
                <!--<a target="_blank" href="/tryeat.html">企业试吃</a><span class="foo-line">&nbsp;|&nbsp;</span>-->
                <a target="_blank" href="{{url('help/2')}}">联系我们</a><span class="foo-line">&nbsp;|&nbsp;</span>
                <a target="_blank" href="{{url('help/4')}}">订购帮助</a><span class="foo-line">&nbsp;|&nbsp;</span>
                <a target="_blank" href="{{url('help/5')}}">企业合作</a>
            </div>
            <div style="visibility: hidden">
            </div>
        </div>
    </div>
</body>

</html>