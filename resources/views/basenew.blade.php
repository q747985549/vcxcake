<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>@yield('title')|{{$s['name']}}</title>
    <meta name="keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    @yield('style')
    <style>
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            background-image: url();
            background-position: center top;
            background-color: #ffffff;
            background-repeat: repeat-x;
        }
        table{
            margin:auto;
        }
    </style>
    <script src="{{asset('new/js/jquery-1.7.2.js')}}"></script>
    <script src="{{asset('new/js/js.js')}}"></script>
    <link rel="stylesheet" href="{{asset('new/css/flexslider.css')}}" type="text/css" media="screen" />
    <script defer src="{{asset('new/js/jquery.flexslider.js')}}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="{{asset('new/css/css.css')}}" rel="stylesheet" type="text/css" />
    <script src="//cdn.bootcss.com/layer/2.4/layer.min.js"></script>
        <script>
    $(document).ready(function(e) {
        $(window).scroll(function() {
            //alert($(window).scrollTop())
            if ($(window).scrollTop() > 10) {
                $("#top_logo").stop();
                $("#top_logo").animate({
                    height: '60'
                });
            } else {
                $("#top_logo").stop();
                $("#top_logo").animate({
                    height: '99'
                });
            }
        });
        $(".index_fwly_img_div ").mouseover(function() {
            $(this).children('.index_fwly_img_div2 ').animate({
                opacity: '0'
            }, 300);
        });
        $(".index_fwly_img_div ").mouseout(function() {
            $(this).children('.index_fwly_img_div2 ').animate({
                opacity: '1'
            }, 300);
        });
    });
    </script>
</head>

<body>

    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="position:fixed; top:0;z-index:999;">
        <tr bgcolor="#FFFFFF">
            <td style="">
                <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="">
                    <tr>
                        <td width="218">
                            <a href="{{url('/')}}"><img src="{{url('files/getimg/'.$s['logo'])}}" alt="" name="top_logo" width="218" height="99" border="0" id="top_logo" /></a>
                        </td>
                        <td width="40">&nbsp;</td>
                        <td width="580">
                            <table width="610" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="70">
                                        <a href="{{url('/')}}" target="_blank">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div">
                                            <img src="{{asset('new/Images/top_01.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2">
                                            <img src="{{asset('new/Images/top_01.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;">
                                            </div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/us')}}" target="">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_02.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_02.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/list/1')}}" target="">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_03.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_03.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/list/2')}}" target="">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_04.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_04.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/list/3')}}" target="">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_05.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_05.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/list/4')}}" target="">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_06.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_06.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                    <td width="20" align="center">·</td>
                                    <td width="70">
                                        <a href="{{url('/help/6')}}" target="_blank">
                                            <div style="height:40px; width:70px; overflow:hidden;position:relative;" class="index_fwly_img_div"><img src="{{asset('new/Images/top_007.gif')}}" width="70" height="80" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/Images/top_007.gif')}}" width="70" height="80" border="0" style="position:absolute;left:0px; top:-40px;z-index:1;"></div>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="170" valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
                                <tr>
                                    <td height="30" style="color:#00768E;">
                					@if (!Auth::check())
                                        <div style="width:30px; text-align:center; float:left;"><a href="{{url('login')}}" style="color:#00768E;">登录</a></div>
                                        <div style="width:10px; text-align:center; float:left;"> | </div>
                                        <div style="width:30px; text-align:center; float:left;"><a href="{{url('register')}}" style="color:#00768E;">注册</a></div>
                                    @else
                                    	@if(Auth::user()->is_admin == 1)
                                    	<div style="width:55px; text-align:center; float:left;"><a href="{{url('/admin')}}" style="color:#00768E;">管理中心</a></div>
                                        @else
                                        <div style="width:55px; text-align:center; float:left;"><a href="{{url('user')}}" style="color:#00768E;">个人中心</a></div>
                                        @endif
                                        <div style="width:10px; text-align:center; float:left;"> | </div>
                                        <div style="width:30px; text-align:center; float:left;"><a href="{{url('loginout')}}" style="color:#00768E;">退出</a></div>

                                        <div style="width:10px; text-align:center; float:left;"> | </div>
                                        <div style="width:30px; text-align:center; float:left;"><a href="javascript:alert('等待支付接口');" style="color:#00768E;">订单</a></div>
                                        <div style="width:10px; text-align:center; float:left;"> | </div>
                                        <div style="width:20px; text-align:center; float:left;">
                                        <a href="{{url('/user/cart')}}">
                                        	<img src="{{asset('new/images/top_10.gif')}}" width="17" height="14" align="absbottom">
                                    	</a>
                                        </div>
                                        <div style="width:15px; text-align:left; float:left;"><?php 
				                        if(Auth::check()){
				                            echo \App\Models\Cart::where("uid",'=',Auth::user()->id)->count();
				                        }else{
				                            echo 0;
				                        }
				                        ?></div>
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <form name="form1" method="get" action="{{url('list/1')}}">
                                        <td>
                                            <div style="width:3px; height:26px; text-align:center; float:left;"><img src="{{asset('new/images/top_07.gif')}}" width="3" height="26" align="absbottom"></div>
                                            <div style="width:130px; height:26px; line-height:26px; text-align:center; float:left; background-image:url({{asset('new/images/top_08.gif')}});">
                                                <input name="keyword" type="text" style="border:none; height:20px; line-height:20px; width:125px;">
                                            </div>
                                            <div style="width:29px; height:26px; text-align:center; float:left;" onclick="form1.submit()"><img src="{{asset('new/images/top_09.gif')}}" width="29" height="26" align="absbottom"></div>
                                        </td>
                                    </form>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="1" bgcolor="#000"> </td>
        </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="100">&nbsp;</td>
        </tr>
    </table>

 @yield('content')


    <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td height="50">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:15px;">
        <tr>
            <td height="1" bgcolor="#000"> </td>
        </tr>
        <tr>
            <td valign="top">
                <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><img src="{{asset('new/images/lest_02.gif')}}" width="1100" height="138"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="55" align="center" background="{{asset('new/images/lest.gif')}}"><span style="color:#FFFFFF;">
                    {{$s['copy_right']}}
            </span></td>
        </tr>
    </table>
</body>

</html>
