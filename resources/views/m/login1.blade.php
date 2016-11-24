@extends('m.base')
@section('title','登录')
@section('top','none')
@section('content')
    <div class="full-screen">
        <header style="margin-top: -50px">
            <div class="a-bar" style="border:none">
                <a href="/" class="a-back">
                    <img alt="返回" src="/wap_themes/21cake/images/icon/btn_back.gif">
                </a>
            </div>
        </header>
        <ul class="banner">
            <li class="telbtn link">
                <a href="{{murl('login1')}}">快键登录</a>
            </li>
            <li class="cakebtn ">
                <a href="{{murl('login')}}">{{$s['name']}}会员登录</a>
            </li>
        </ul>
        <div class="full-padding">
            <img src="{{url('files/getimg/'.$s['logo'])}}" width="100%" alt="">
            <form id="fast-login" action="" class="form" method="post">
            {{csrf_field()}}
                <ul class="tellist">
                    <li class="item">
                        <input type="text" name="mobile" value="" placeholder="请输入手机号码" class="text" required="required">
                        <button class="btn-code" type="button" id="dynamic-code" onclick="sendMobileCode();">获取动态码</button>
                    </li>
                     <script>
                        var i = 60,go = false;
                        function sendMobileCode(){
                            if(go){
                                return false;
                            }
                            var mobile = $("[name=mobile]").val();
                            $.get('{{url("sendsms")}}/'+mobile,function(a){
                            	if(a != 1){
                            		alert(a);
                            	}
                                var b = a;
                                var bk = setInterval(function(){
                                    go = true;
                                    $(".btn-code").html(i--+"秒后可以重新发送");
                                    if(i == 0){
                                        clearInterval(bk);
                                        $(".btn-code").html("获取动态码");
                                        go = false;
                                    }
                                },1000);
                            });
                        }
                    </script>
                    <li class="item">
                        <input type="text" name="password" value="" placeholder="请输入动态码" class="text" maxlength="6" required="required">
                    </li>
                </ul>
                <input type="checkbox" checked="checked" name="is_remember" id="remember_me">
                <div class="c-g-c btn-bar">
                    <button id="fast-login-submit" type="submit" class="btn login" rel="_request">登录</button>
                </div>
                <br>
                <div class="telexplain">说明：登录/注册说明您已同意<a href="/passport-agreement.html">《{{$s['name']}}用户协议》</a></div>
            </form>
            <div class="index_complete_mask" style="display:none"></div>
            <ul id="metro_wifi" class="login_metro_wifi" style="display:none">
                <img src="/wap_themes/21cake/images/metro_wifi.png">
            </ul>
            <p id="error" class="txt-error bgnone"></p>
        </div>
    </div>
@endsection