<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="{{asset('css/basic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/stylecake.css')}}" rel="stylesheet" />
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
    <link href="{{asset('css/index.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
      <script>
    var $j = $;
    </script>
</head>

<body>
    <div class="head-area">
        <div class="head-inner">
            <div class="nav-area fl-l clearfix">
                <a href="/" class="global-logo fl-l"><img src="{{asset('img/c_logo.png')}}"></a>
                <ul class="head-nav fl-l clearfix">
                    <li class="nav-item ">
                        <a href="/">首页</a>
                    </li>
                    <li class="nav-item ">
                        <a href="/list/1">蛋糕</a>
                    </li>
                    <li class="nav-item ">
                        <a href="/list/2">新品</a>
                    </li>
                    
                    <li class="nav-item ">
                        <a href="/">品牌故事</a>
                    </li>
                    <li class="nav-item  last">
                        <a href="/" target="_blank">订购帮助</a>
                    </li>
                </ul>
            </div>
            <div class="login-mes fl-r" style="position: relative;">
                <a id="qqbrown" style="display:none;" href="http://q.url.cn/s/6igyY" target="_blank"></a>
                <ul class="head-nav fl-l clearfix">
                @if (Auth::check())
                    <li class="" id="j_header_logout">
                        <a href="/member.html" style="padding:0;">&nbsp;&nbsp;您好，<span id="j_header_uname">{{Auth::user()->realname}}</span></a><a href="/loginout">[退出]</a>
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
                <p>订购专线：<b>400 650 2121</b>（服务时间 08:00–22:00）
                    <br> 客服电话：021-23099721（全国）&nbsp;|&nbsp;
                    <a href="mailto:kefu@21cake.com">kefu@21cake.com（邮箱）</a>
                    <a href="http://weibo.com/21cake?topnav=1&amp;wvr=5&amp;topsug=1" class="weibo"><img src="http://www.21cake.com/themes/21cake/images/img/weibo.png"></a>
                    <a target="_blank" class="weixin"><img src="http://www.21cake.com/themes/21cake/images/img/weixin.png">
                        <span class="third-enter-dia">
            <span class="third-enter-dia-inner">
              <img src="/themes/21cake/images/2wm_wx_2.jpg">
              <span>扫描21cake方形<br>微信二维码</span>
                        </span>
                        </span>
                    </a>
                    <span>
        <span id="cnzz_stat_icon_1255778095"><a href="http://www.cnzz.com/stat/website.php?web_id=1255778095" target="_blank" title="站长统计"><img border="0" hspace="0" vspace="0" src="http://icon.cnzz.com/img/pic.gif"></a></span>
                    </span>
                    <br>
                    <b>北京/杭州/广州：提前5小时预订；上海：提前6-8小时预订；天津/苏州/无锡/深圳：提前8小时预订</b>（当日22点以后订单，于次日8点开始审核）
                    <br>
                    <b>当日蛋糕配送截止下单时间：北京：16:50；上海：16:30；杭州/广州：13:50；天津/苏州/无锡/深圳：11:00</b>
                </p>
                <p class="copyright">
                    Copyright© 21Cake蛋糕官网商城 2007-2015, 版权所有 京ICP备14006254号-1 公司: 上海廿一客食品有限公司 地址: 上海市松江区新桥镇新效支路518号
                </p>
            </div>
            <div class="fl-r foo-link clearfix">
                <!--<a target="_blank" href="/tryeat.html">企业试吃</a><span class="foo-line">&nbsp;|&nbsp;</span>-->
                <a target="_blank" href="/article-about-55.html">联系我们</a><span class="foo-line">&nbsp;|&nbsp;</span>
                <a target="_blank" href="/article-distribution-40.html">订购帮助</a><span class="foo-line">&nbsp;|&nbsp;</span>
                <a target="_blank" href="/article-about-56.html">企业合作</a>
            </div>
            <div style="visibility: hidden">
            </div>
        </div>
    </div>
</body>

</html>
<script[\s\S]+?script>