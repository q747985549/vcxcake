@extends('base')
@section('title','个人信息')
@section('content')
<link href="{{asset('css/member-center.css')}}" rel="stylesheet" />
<style>
    .whyGreendata {
    border: none;
    width: 293px;
    height: 30px;
    line-height: 30px;
    padding: 0 0 0 5px;
}
    .Wdate {
    background: #fff url(../img/js_Spec_06.png) no-repeat right;
    color: #8d6a54;
    cursor: pointer;
}
</style>

<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="{{url('/')}}" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span>
                <a href="{{url('user')}}" alt="" title="">会员中心</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">个人信息</span>
            <input type="hidden" id="isCakeList" value="个人信息">
        </div>
        <div class="member-area">
            <!-- 会员中心主内容区 -->
            <div class="page-article">
                <!-- 个人信息 -->
                <div id="member_information" class="member-information">
                    <div class="member-title">
                        <h2>个人信息</h2>
                        <p> | 立即完善个人信息。</p>
                    </div>
                    <div class="member-mod" style="position: relative">
                        <form action="" method="post" class="signupin-content" id="J_signupin-content">
                            {{csrf_field()}}
                            <ul>
                                <li class="form-item">
                                    <label for="" class="form-label"><em class="warn">*</em> 姓名：</label>
                                    <span class="form-act">
                            <input class="x-input" type="text" name="realname" vtype="required" value="{{$user['realname']}}">                        </span>
                                </li>
                                <li class="form-item-normal">
                                    <label for="" class="form-label"><em class="warn">*</em> 性别：</label>
                                    <span class="form-act">
                            <div style="visibility: hidden">
                            <input value="1" type="radio" id="input_gender-m" @if($user['gender'] == 1)checked @endif name="gender" value="1">
                             <label for="input_gender-m">男</label>&nbsp;
                             <input value="0" type="radio" id="input_gender-fm" @if($user['gender'] == 0)checked @endif name="gender" value="0"> <label for="input_gender-fm">女</label></div>
                            <div class="ac_gender">
                                    <div class="ac_sex @if($user['gender'] == 1)selected @endif " name="profile[gender]" data-value="1" data-msg="请选择性别"></div>男
                                    <div class="ac_sex add-margin @if($user['gender'] == 0)selected @endif" name="profile[gender]" data-value="0" data-msg="请选择性别"></div>女
                            </div>
                        </span>
                                </li>
                                <li class="form-item-normal">
                                    <label for="" class="form-label"><em class="warn">*</em> 手机：</label>
                                    <span class="form-act">
                            <div class="ac_phone">
                            <input class="x-input" type="text" id="sendtomobile" readonly="true" value="{{$user['mobile']}}" vtype="required&amp;&amp;mobile">&nbsp;&nbsp;
                         
                                    <em class="changenum">修改号码</em>
                    </div>
                    </span>
                    </li>
                    <li class="form-item-normal minusmargin">
                        <label for="" class="form-label">E-mail：</label>
                        <span class="form-act">
                            <input class="x-input" type="text" name="email" id="dom_el_2ac6292" value="{{$user['email']}}">                        </span>
                    </li>
                    
                    <li class="form-item-normal">
                        <label for="" class="form-label"><em class="warn">*</em> 出生日期：</label>
                        <span class="form-act">
                                                        <div class="ac_common" style="display: inline">
                                    <input class="Wdate whyGreendata ipt" type="text" name="birthday" value="{{$user['birthday']}}">

                            </div>
                                                         <em style="margin-left:8px;display: inline-block;*display:inline;*zoom:1;color: #d6c9bd;font-size:13px">请填写指定格式,例：1995-08-08</em>
                        </span>
                    </li>
                    <li class="form-item-normal">
                        <label for="" class="form-label">亲友生日：</label>
                        <span class="form-act">
                            <div class="ac_common">
                                <select name="family_type" style="height: 32px;padding: 0px 0px 0px 5px">
                                                                        <option value="" @if($user['family_type'] == '')selected @endif>关系</option>
                                                                        <option value="丈夫" @if($user['family_type'] == '丈夫')selected @endif>丈夫</option>
                                                                        <option value="妻子" @if($user['family_type'] == '妻子')selected @endif>妻子</option>
                                                                        <option value="父亲" @if($user['family_type'] == '父亲')selected @endif>父亲</option>
                                                                        <option value="母亲" @if($user['family_type'] == '母亲')selected @endif>母亲</option>
                                                                        <option value="子女" @if($user['family_type'] == '子女')selected @endif>子女</option>
                                                                        <option value="友人" @if($user['family_type'] == '友人')selected @endif>友人</option>
                                                                    </select>
                                                                    <input class="Wdate other_bir ipt" type="text" name="family_birthday" value="{{$user['family_birthday']}}">
                                                             </div>
                        </span>
                    </li>
                    <li class="form-item-normal">
                        <label for="" class="form-label"> 您最爱的产品：</label>
                        <span class="form-act">
                            <input class="x-input" type="text" name="interest" id="dom_el_2ac6292" value="{{$user['interest']}}">                        
                        </span>
                    </li>
                    <li class="form-item-normal">
                        <span class="form-act">
                            <button style="height:30px;margin-left: 268px" class="btn btn-caution J_commit" type="submit">
                                <span><span>保存</span></span>
                        </button>
                        </span>
                    </li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>
        <div class="personal-dialog-mask" style="display: none"></div>
        <div class="alert-container changetel-container" style="position: fixed;top:50%;left: 50%;margin-left: -141px;margin-top:-141px;z-index: 100001;display: none">
            <div class="pop-attention-main changetel-main" id="changetel-dialog">
                    <div class="figure changetel-figure">
                        <dfn class="confirm">!</dfn>
                        <div class="cncancel_btn">
                            <i class="cncancel_ico"></i>
                        </div>
                        <span class="clmain_cg">修改号码</span>
                        <ul class="changetel_content">
                            <li class="item r_margin">
                                <input type="text" class="tel" name="new_mobile" vtype="required" placeholder="请输入新手机号码" size="22" data-msg="请输入新手机号码">
                            </li>
                            <li class="item2">
                                <input type="text" class="code" name="captcha" vtype="required" id="card_password" placeholder="短信验证码" style="vertical-align:middle" size="22" data-msg="请输入短信验证码">
                                <button type="button" class="getcode" id="doSendMobile" onclick="sendMobileCode();">点击获取</button>
                            </li>
                            <li class="r_error" style="">您输入的卡号或密码错误,请重试！</li>
                        </ul>
                    </div>
                    <div class="confirmchange">确认修改</div>
                    <script>
                    $(function($){
                        $(".confirmchange").click(function(){
                            var mobile = $("[name=new_mobile]").val();
                            var captcha = $("[name=captcha]").val();
                            $.post("{{url('user/change_mobile')}}",{
                                mobile:mobile,captcha:captcha,_token:"{{csrf_token()}}"
                            },function(a){
                                if(a == 'ok'){
                                    layer.msg("修改成功");
                                    $(".cncancel_ico").click();
                                    $("[name=mobile]").val();
                                }else{
                                    layer.msg(a);
                                }
                            });
                        });
                    
                    })
                    var i = 60,go = false;
                    function sendMobileCode(){
                            if(go){
                                return false;
                            }
                            var mobile =  window.$j("[name=new_mobile]").val();
                            window.$j.get('{{url("sendsms")}}/'+mobile,function(a){
                                var b = a;
                                var bk = setInterval(function(){
                                    go = true;
                                     window.$j(".getcode").html(i--+"秒后可以重新发送");
                                    if(i < 0){
                                        clearInterval(bk);
                                         window.$j(".getcode").html("获取动态码");
                                        go = false;
                                    }
                                },1000);
                            });
                        }
                    </script>
            </div>
        </div>
        <script>
        var is_lock = '0';
        var sint = null;


        function reset_is_sub() {
            is_lock = '0';
            window.clearInterval(sint);
        }
        </script>
        <script type="text/javascript">
        (function($) {
            $('.changenum').click(function() {
                showDialog();
                return false;
            });

            var checked_gender = $("input[name='profile[gender]']:checked").val();

            $(".ac_sex").each(function() {
                if ($(this).data('value') == checked_gender) {
                    $(this).addClass("selected");
                }
            });

            $(".ac_sex").click(function() {
                if ($(this).hasClass("selected")) {
                    return;
                } else {
                    var gender_sex = $(this).data("value");
                    var other_sex = gender_sex == "1" ? "0" : "1";
                    $(this).addClass("selected").siblings().removeClass("selected");
                    $("input[value=" + gender_sex + "]").attr("checked", "checked");
                    $("input[value=" + other_sex + "]").removeAttr("checked");
                }
            });

            $(".cncancel_btn").click(function() {
                hideDialog();
            });

            function showError(msg) {
                $('.r_error').show().html(msg);
                throw msg;
            }

            function hideDialog() {
                $(".personal-dialog-mask").hide();
                $(".changetel-container").hide();

            }

            function showDialog() {
                $(".personal-dialog-mask").show();
                $(".changetel-container").show();
            }


            $('input[vtype="required"]').blur(function() {
                if ($.trim(this.value) == '' && this.name != '') {
                    $('.r_error').show().text($(this).data('msg'));
                }
            }).focusin(function() {
                $('.r_error').hide();
            });


        })(jQuery);

        jQuery.noConflict();
        (function($) {
            $(function() {
            });
            $("input.calendar").css("background-color", "#FFF");

        })(jQuery);
        </script>
    </div>
</div>
</div>
@endsection
