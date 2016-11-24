@extends('m.base')
@section('top','none')
@section('title','登录')
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
            <li class="telbtn ">
                <a href="{{murl('login1')}}">快键登录</a>
            </li>
            <li class="cakebtn link">
                <a href="{{murl('login')}}">{{$s['name']}}会员登录</a>
            </li>
        </ul>
        <div class="full-padding">
            <img src="{{url('files/getimg/'.$s['logo'])}}" width="100%" alt="">
            <form id="fast-login" action="" class="form" method="post">
            {{csrf_field()}}
                
                <div class="c-g">
                    <label class="c-l user">
                        账号
                    </label>
                    <div class="c">
                        <input type="text" name="mobile" value="" placeholder="手机号" class="text" required="required">
                    </div>
                </div>
                <div class="c-g">
                    <label class="c-l  pwd1">密码</label>
                    <div class="c">
                        <input type="password" name="password" placeholder="填写密码" class="text pwd2" required="required">
                    </div>
                </div>
                @if(isset($error))
                    <div class="c-g-c">
                    <label class="jizhu JQ_jizhu ck" for="remember_me">
                    {{$error}}
                     </label>
                    </div>
                @endif
                <div class="btn-bar">
                    <button type="submit" class="btn login" rel="_request">登录</button>
                </div>
                <a href="{{murl('register')}}" class="btn-style-a">注册</a>
            </form>

            <div class="index_complete_mask" style="display:none"></div>
            <ul id="metro_wifi" class="login_metro_wifi" style="display:none">
                <img src="/wap_themes/21cake/images/metro_wifi.png">
            </ul>
            <p id="error" class="txt-error bgnone"></p>
        </div>
    </div>
@endsection