@extends('m.base')
@section('title','注册')
@section('content')
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="javascript:history.back()" class="a-back">
                <img src="{{asset('img/btn_back.gif')}}" alt="返回">
            </a>
            <div class="a-name">
                新用户注册
            </div>
        </div>
    </header>
    <div class="full-padding zhuce">
        <form action="" method="post" class="form">
            {{csrf_field()}}
            <div class="c-g">
                <div class="c signup_c">
                    <input type="text" name="mobile" id="sendtomobile" class="text" placeholder="手机号码" required="required">
                </div>
            </div>
            <div class="notice"></div>
            <div class="c-g">
                <div class="c signup_c">
                    <input type="password" name="password" maxlength="20" placeholder="密码（6-20个大小写英文字母、符号或数字）" required="required" pattern=".{6,20}" class="text password">
                </div>
            </div>
            <div class="notice"></div>
            <div class="c-g">
                <div class="c signup_c">
                    <input type="password" name="repassword" maxlength="20" placeholder="确认密码" required="required" pattern=".{6,20}" class="text password" data-caution="确认密码不能为空">
                </div>
            </div>
            <div class="notice"></div>
            <div class="c-g code">
                <div class="c signup_c">
                    <input type="text" name="captcha" class="text" placeholder="短信验证码" required="required" >
                </div>
                <div class="getcode" id="sendButtonValue" style="width:120px">
                    <button type="button" class="get" id="doSendMobile" href="javascript:;" onclick="sendMobileCode();">获取短信验证码</button>
                </div>
            </div>
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
                            $("#doSendMobile").html(i--+"秒后可以重新发送");
                            if(i == 0){
                                clearInterval(bk);
                                $("#doSendMobile").html("获取动态码");
                                go = false;
                            }
                        },1000);
                    });
                }
            </script>
            <div class="notice"></div>
             @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                    {{$error or ''}}
            <div class="btn-bar">
                <button type="submit" class="btn login" repeart="0" id="repeart" rel="_request">免费注册</button>
            </div>
            <div class="a-right">
                <a href="{{murl('login')}}" class=" btn-style-a">
                登录
            </a>
            </div>
        </form>
    </div>
</div>
@endsection