@extends('base')
@section('title','修改密码')
@section('content')
<link href="{{asset('css/member-center.css')}}" rel="stylesheet" />

<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="{{url('/')}}" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span>
                <a href="#" alt="" title="">修改密码</a>
            </span>
            
        </div>
        <div class="member-area">
            <!-- 会员中心主内容区 -->
            <div class="page-article">
                <!-- 修改密码 -->
                <div class="member-title">
                    <h2>修改密码</h2>
                </div>
                <div id="member_changepass" class="member-changepass member-mod">
                    <form action="" method="post" class="mod-content signupin-content">
                    {{csrf_field()}}
                        <ul>
                            <li class="form-item">
                                <label for="" class="form-label">旧密码：</label>
                                <span class="form-act">
                            <input type="password" name="old_password" id="" class="x-input" maxlength="20" autofocus="autofocus" vtype="required" data-caution="请填写旧密码">
                        </span>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label">新密码：</label>
                                <span class="form-act">
                        <input type="password" name="password" class="x-input auto-password-check-handle" maxlength="20" placeholder="6-20个字符">
                        <span class="password-check" style="visibility: visible;">
                            <q>密码强度：</q>
                            <em class="poor">差</em><em class="weak">弱</em><em class="good">中</em><em class="strong">强</em>
                            <span class="progress">
                                <span class="percent"></span></span>
                                </span>
                                <span class="validation-messagebox"></span>
                                </span>
                            </li>
                            <li class="form-item">
                                <label for="" class="form-label">确认新密码：</label>
                                <span class="form-act">
                        <input type="password" name="repassword" id="" class="x-input" maxlength="20" vtype="equal:passwd" data-caution="两次密码输入不相符，请重新输入">
                        <span class="validation-messagebox"></span>
                                </span>
                            </li>
                            <li class="form-item-normal">
                                <label for="" class="form-label"></label>
                                <span class="form-act">
                        <button type="submit" class="btn btn-caution action-confirm" rel="_request">
                        <span>
                            <span>确定</span>
                                </span>
                                </button>
                                </span>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
