@extends('base')
@section('title','登陆')
@section('content')
    <div id="container" class="page-container clearfix">
        <div class="inner-wrap">
            <div class="bread-crumbs">
            </div>
            <div class="signin-page-wrap clearfix">
                <div id="page_signin" class="signupin-content signin">
                    <div class="sign-title">
                        <h2>
            手机号快捷登录        </h2>
                    </div>
                    <form action="" autocomplete="off" method="post" style="height:290px;">
                    {{csrf_field()}}
                        <input type="hidden" name="forward" value="">
                        <ul>
                            <li class="form-item3">
                                <a style="padding-left:310px" href="/login">
               普通方式登录           </a>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label">登录帐号：</label>
                                <span class="form-act"><input class="x-input input-top" type="text" name="mobile" id="" value="" placeholder="手机号码" vtype="required" data-caution="请填写登录帐号" autofocus="autofocus" autocomplete="off"><button onclick="sendMobileCode();" id="dynamic-code" type="button" class="btn-code">
                                获取动态码                 
                                </button>
                                <span class="caution-content">
                                   @foreach($errors->all() as $error)
                                            {{$error}}
                                            @endforeach
                                    {{$error or ''}}</span>
                                </span>
                            </li>
                            <script>
                                var i = 60,go = false;
                                function sendMobileCode(){
                                    if(go){
                                        return false;
                                    }
                                    var mobile = $("[name=mobile]").val();
                                    $.get('{{url("sendsms")}}/'+mobile,function(a){
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
                            <li class="form-item">
                                <label for="" class="form-label"> 密码：</label>
                                <span class="form-act"><input class="x-input input-center" type="password" name="password" id="" placeholder="动态码" autocomplete="off"></span>
                            </li>
                            <li class="form-item3">
                                <label for="" class="form-label"></label>
                                <span class="from-inner-mm">
                <input type="checkbox" name="is_remember" id="for_remember" class="x-check action-remember-account" checked="checked">
                <label for="for_remember" class="form-sub-label">记住帐号</label>
            </span>
                                <span style="color: #ff6600;"><a style="margin-left:-5px;padding-left: 0" href="/passport-lost.html">忘记密码？</a></span>
                            </li>
                            <li id="login_error" style="display:none; position:relative; Zoom:1" class="error">&nbsp;</li>
                            <li class="form-item-normal" style="margin-top:10px;">
                                <label for="" class="form-label"></label>
                                <span class="form-act"><button type="submit" class="btn-major signin-btn400 submit-login" rel="_request" id="IDlogin">登　录</button></span>
                            </li>
                            <li><span id="activity_notification" style="font-size: 13px;display:block;float:left;width:400px;"></span></li>
                        </ul>
                    </form>
         
                </div>
            </div>
        </div>
    </div>
@endsection