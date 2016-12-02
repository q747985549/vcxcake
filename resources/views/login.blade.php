@extends('basenew')
@section('title','登录')
@section('content')
@section('style')
    <link href="{{asset('css/basic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/stylecake.css')}}" rel="stylesheet" />
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
    <link href="{{asset('css/index.css')}}" rel="stylesheet" />
@stop
    <div id="container" class="page-container clearfix">
        <div class="inner-wrap">
            <div class="bread-crumbs">
            </div>
            <div class="signin-page-wrap clearfix">
                <div id="page_signin" class="signupin-content signin">
                    <div class="sign-title">
                        <h2>普通方式登录</h2>
                    </div>
                    <form action="" autocomplete="off" method="post" style="height:290px;">
                        {{csrf_field()}}
                        <ul>
                            <li class="form-item3">
                                <a style="padding-left:310px" href="/login1">手机号快捷登录</a>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label">登录帐号：</label>
                                <span class="form-act"><input class="x-input input-top" type="text" name="mobile" id="" value="" placeholder="手机号码" vtype="required" data-caution="请填写登录帐号" autofocus="autofocus" autocomplete="off"></span>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label"> 密码：</label>
                                <span class="form-act"><input class="x-input input-center" type="password" name="password" id="" placeholder="填写密码" autocomplete="off"></span>
                            </li>
                          
                            <!--   -->
                            <li class="form-item3">
                                <label for="" class="form-label"></label>
                                <span class="from-inner-mm">
                <input type="checkbox" name="is_remember" id="for_remember" class="x-check action-remember-account" checked="checked">
                <label for="for_remember" class="form-sub-label">记住帐号</label>
            </span>
                                <span style="color: #ff6600;"><a style="margin-left:-5px;padding-left: 0" href="/passport-lost.html">忘记密码？</a></span>
                            </li>
                            <li id="login_error" style=" position:relative; Zoom:1" class="error">{{$error or ''}}</li>
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