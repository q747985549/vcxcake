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
                    <form action="http://www.21cake.com/openapi/pam_callback/login/module/pam_passport_basic/type/member/appid/b2c/redirect/L3Bhc3Nwb3J0LXBvc3RfbG9naW4tYUhSMGNEb3ZMM2QzZHk0eU1XTmhhMlV1WTI5dEx3PT0uaHRtbA%3D%3D" autocomplete="off" method="post" style="height:290px;">
                        <input type="hidden" name="forward" value="">
                        <ul>
                            <li class="form-item3">
                                <a style="padding-left:310px" href="/login">
               普通方式登录           </a>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label">登录帐号：</label>
                                <span class="form-act"><input class="x-input input-top" type="text" name="uname" id="" value="" placeholder="用户名/手机号码/邮箱地址" vtype="required" data-caution="请填写登录帐号" autofocus="autofocus" autocomplete="off"><button id="dynamic-code" type="button" class="btn-code">
                    获取动态码                 </button></span>
                            </li>
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