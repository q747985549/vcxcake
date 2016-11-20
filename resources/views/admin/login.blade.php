<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="{{ asset('/css/newstyle.css')}}" rel="stylesheet" type="text/css">
<script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';
</script>
<script src="{{ asset('/static/js/jquery.min.js') }}"></script>
<script src="{{ asset('/static/js/layer/layer.js') }}"></script>
<script>
function psw(el) {
        if (el.value == '密码') {
            el.value = '';
            el.type = 'password';
        }
    }
function txt(el) {
	if (!el.value) {
		el.type = 'text';
		el.value = '密码';
	}
}
function change(){
    $("#bao_img_code").attr('src','{{ url('/captcha') }}?' + Math.random());
}
</script>
</head>
<body>
<div class="login_nr" style="width:auto;margin-left: 41%;">
    <div class="left login_nr_r">
        <div class="radius3 login_intnr">
            <div class="login_t">商家登录</div>
            <div class="login_intBox">
                <form method="post" action="">
                {{ csrf_field() }}
                <div class="login_intyz">
                    <input type="text" value="{{  $mobile or null  }}" placeholder="手机号" class="radius3 tuanfabu_int loginintw" name="mobile" />
                </div>
                <div class="login_intyz">
                    <input type="password" value="" placeholder="密码" name="password" class="radius3 tuanfabu_int loginintw" />
                </div>
                <div class="login_intyz"><input type="text" name="captcha" placeholder="验证码" value=""  class="radius3 tuanfabu_int loginintw loginintw2" /><span class="login_yzm">
                <a href="javascript:void(0);" onclick="change();"><img id="bao_img_code" src="{{ url('/captcha') }}" width="75" height="36" /></a>
                </span></div>
                <div class="login_intyz">
                    <input class="radius3 mask_an mask_qd login_dl" type="submit" value="商家登录" />
                    <span style="color:red;font-size:10px;">{{ $error or "" }}</span>
                </div>
                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>