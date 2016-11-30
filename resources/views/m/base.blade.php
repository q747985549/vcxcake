<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no">
    <link href="{{asset('css/m/styles.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/m/mini_styles.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/m/mdetail.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/jquery-1.8.2.min.js')}}"></script>
    <script src="//cdn.bootcss.com/layer/2.4/layer.min.js"></script>
    <title>@yield('title')|{{$s['name']}}</title>
     <script src="//cdn.bootcss.com/layer/2.4/layer.min.js"></script>
      <script>
      @if(isset($msg))
      $(function(){
        layer.msg("{{$msg}}");
      });
      @endif
    var $j = $;
    </script>
</head>

<body class=" hPC">
    <div class="home-nav daohang fixed" style="display:@yield('top','block')">
        <a href="{{url('m')}}" class="item bg4 new_list"><i class="iconfont type"></i><p>首页</p></a>
        <a href="{{url('m/list/1')}}" class="item bg1 new_list"><i class="iconfont"></i><p>蛋糕</p></a>
        <a href="{{url('m/list/2')}}" class="item bg5 new_list">
            <div class="l_icecream"></div>
            <p>新品</p>
        </a>
        <a href="{{url('m/user')}}" class="item bg5 new_list red_icon_l"><i class="iconfont">&#xe605;</i><p>个人中心</p></a>
        <a href="{{url('m/user/cart')}}" class="item bg4 new_list"><i class="iconfont type J_cart">&#xe606;<?php 
                        if(Auth::check()){
                            echo '<em class="mini_goods_num fixed_num">'.\App\Models\Cart::where("uid",'=',Auth::user()->id)->count().'</em>';
                        }
                        ?>
        </i><p>购物车</p></a>
    </div> 
@yield('content')
    <div id="footer" style="clear: both;display:@yield('footer','block')">
        <div class="full-screen">
            <div class="home-to-top">
                <div style="float:right;">
                    <a href="#" class="to-top" style="padding-right:115px;">
                    返回顶部
                  </a>
                </div>
                @if (Auth::check())
                <div id="footerlogout" style="">
                    <a id="footerloginuname" class="loginname" href="{{url('m/user')}}">个人中心</a> | <a href="{{url('m/logout')}}" id="logout" class="lnk">退出</a>
                </div>
                 @else
                <div id="footerlogin">
                    <a href="{{url('m/login')}}" class="lnk">登录</a> | <a href="{{url('m/register')}}" class="lnk">注册</a>
                </div>
                @endif
            </div>
        </div>
        <div class="footer">
            <div class="contact-us">
                <p class="copyright">{{$s['copy_right']}}</p>
            </div>
            <div class="msg" id="success">
                <table align="center">
                    <tbody>
                        <tr>
                            <td>
                                <div class="checkout-success">123123</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="visibility: hidden">
        </div>
    </div>
</body>
</html>
