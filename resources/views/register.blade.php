@extends('base')
@section('title','注册')
@section('content')
    <div id="container" class="page-container clearfix">
  <div class="inner-wrap">
    <div class="bread-crumbs">
      
    </div>
    <div class="signup-article">
    <div id="page_signup" class="signupin-content signup">
        <div class="sign-title">
            <h2>新用户注册</h2>
        </div>
        <form action="" autocomplete="off" method="post">
    {{csrf_field()}}
    <ul>
        
        <li class="form-item">
            <label for="" class="form-label">
                      <em class="warn">*</em>手机号：</label>
                <span class="form-act">
                    <input class="x-input x-input action-mobile-check input-top" type="text" id="sendtomobile" maxlength="11" name="mobile" placeholder="手机号码" vtype="required&amp;&amp;number" data-caution="手机号码" autocomplete="off"><span id="_build_tips_inline_error_16" class="caution error notice-inline"><q class="icon">!</q><span class="caution-content">
                   @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                    {{$error or ''}}</span></span>                    <span class="validation-messagebox"></span>
                    
                </span>
        </li>
                     
                    <li class="form-item">
            <label for="" class="form-label">
                <em class="warn">*</em>密码：</label>
                <span class="form-act">
                    <input class="x-input auto-password-check-handle input-center clickpswd" type="password" name="password" maxlength="20" placeholder="密码" vtype="required&amp;&amp;minLength:6&amp;&amp;maxLength:20" data-caution="请填写密码，6-20个字符&amp;&amp;输入不正确，最少6个字符&amp;&amp;输入不正确，最多20个字符" id="dom_el_3233422" oncontextmenu="return false;" onpaste="return false;"> <span class="password-check" style="visibility: visible;"><q>密码强度：</q><em class="poor">差</em><em class="weak">弱</em><em class="good">中</em><em class="strong">强</em><span class="progress"><span class="percent"></span></span></span>                 <p class="fnote">请输入您的密码<span class="i"></span></p>
                </span>
        </li>
        <li class="form-item">
            <label for="" class="form-label">
                <em class="warn">*</em>确认密码：
            </label>
            <span class="form-act"><input class="x-input input-center" type="password" name="repassword" id="dom_el_3233423" maxlength="20" placeholder="确认密码" vtype="equal:pam_account[login_password]" data-caution="密码与确认密码不相符，请重新填写" oncontextmenu="return false;" onpaste="return false;">                <span class="validation-messagebox"></span>
                <p class="fnote">请再次确认您的密码<span class="i"></span></p>
            </span>
        </li>
         <li class="form-item">
            <label for="" class="form-label"><em class="warn">*</em>短信验证码：</label>
                <span class="form-act">
                    <input class="x-input verify-input input-bottom" type="text" name="captcha" placeholder="短信验证码" vtype="required" autocomplete="off" id="dom_el_3233424">                    <span>
                        <button class="doSendMobile"  id="doSendMobile" onclick="sendMobileCode();" type="button">
                            <span><span id="sendButtonValue">获取短信验证码</span></span>
                        </button>
                    </span>
                </span>
                <script>
                    var i = 60,go = false;
                    function sendMobileCode(){
                        if(go){
                            return false;
                        }
                        $.get('/sendsms',function(){
                            var bk = setInterval(function(){
                                go = true;
                                $("#sendButtonValue").html(i--+"秒后可以重新发送");
                                if(i == 0){
                                    clearInterval(bk);
                                    $("#sendButtonValue").html("获取短信验证码");
                                    go = false;
                                }
                            },1000);
                        });
                        $("#sendButtonValue")
                    }
                     

                </script>
        </li>
        <li class="form-item">
            <div class="pt10 pb10">
            <label for="" class="form-label"></label>
            <span class="form-act">
                <input type="checkbox" name="license" checked="checked" id="xieyi_check" class="x-check" vtype="onerequired" data-caution="">
                <label for="" id="xieyi" class="form-sub-label">
                    我已阅读并同意                    <a href="http://www.21cake.com/article-help-36.html" class="lnklike" target="_blank">会员注册协议</a>
                    和                    <a href="http://www.21cake.com/article-help-35.html" class="lnklike" target="_blank">隐私保护政策</a></label>
                <span class="validation-messagebox"></span>
            </span></div>
        </li>
        <li class="form-item">
            <label for="" class="form-label"></label>
            <span class="form-act">
                <button type="submit" id="IDsignup" class="btn btn-major signin-btn400" rel="_request"><span><span>注　册</span></span></button>            </span>
        </li>
    </ul>
</form>

    </div>
</div>
<div class="signup-aside">
    <span class="descrip">已经有会员帐号请直接登录</span>
    <a href="/passport-login.html" class="btn btn-import btn-huge"><span><span>转到登录页</span></span></a>
</div>


  </div>
</div>
@endsection
   