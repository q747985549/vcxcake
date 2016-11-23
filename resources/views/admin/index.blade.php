
@extends('admin/base')

@section('content')

<script type="text/javascript">
	$(function(){
        $(".leftMenu_a").click(function(){ 
            $(".leftMenu_a").removeClass("on");
            $(this).addClass("on");
            $(".leftNav2").hide();
            $(this).parent().find(".leftNav2").show();  
        });
        
        $(".leftNav2 li").click(function(){
            $(".leftNav2 li a").removeClass('on');
            $(this).find('a').addClass('on');
        });
    })
		
</script>


<div class="sjgl_top">
<div class="left sjgl_toplogo"><h1 style="font-size:22px;">商家后台管理系统</h1></div>
    <div class="right sjgl_top_r">
        <ul><?php #var_dump($shop);exit;?>
           <li class="left sjgl_topli"><a href="javascript:void(0);" onclick="edit_password();"><em class="toptc"></em>修改密码</a></li>
           <script>
               function edit_password(){
                age = prompt("请输入要修改的密码:");
                if (age != null){
                    $.get("{{url('admin/change_password')}}/"+age)
                }
               }

           </script>
            <li class="left sjgl_topli"><a href="{{ url('/loginout') }}"><em class="toptc"><img src="{{asset('/static/images/toptc_03.png')}}" /></em>退出</a></li>
        </ul>
    </div>
</div>

<div class="sjglBox">
    <div class="left sjgl_leftmenu">
        <ul>
            <!-- <li class="leftMenu_li"><a class="leftMenu_a on" target="main_frm" href="{{url('/admin/index')}}"><em>&nbsp;</em>首页</a></li> -->
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a2 on"  target="main_frm" href="{{url('/admin/setting')}}"><em style="background: url({{asset('img/system.png')}}) no-repeat center 4px scroll;"></em>网站设置</a>
            </li>
            
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="{{url('/admin/goods/list')}}"><em style="background: url({{asset('img/dangao.png')}}) no-repeat center 4px scroll;">&nbsp;</em>商品管理</a>
            	<div class="leftNav2">
                    <ul>
                        <li><a target="main_frm" href="{{url('/admin/goods/add/1')}}"><em>&nbsp;</em>发布蛋糕</a></li>
                        <li><a target="main_frm" href="{{url('/admin/goods/add/2')}}"><em>&nbsp;</em>发布新品</a></li>
                        <li><a target="main_frm" href="{{url('/admin/cates/list/1')}}"><em>&nbsp;</em>分类</a></li>
                    </ul>
                </div>
            </li>

            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="javascript:alert('缺少支付接口,待开发')"><em style="background: url({{asset('img/order.png')}}) no-repeat center 4px scroll;">&nbsp;</em>订单管理</a>
                <div class="leftNav2">
                    <ul>
                        <!-- <li><a target="main_frm" href="{{url('/admin/banner/add')}}"><em>&nbsp;</em>发布</a></li> -->
                    </ul>
                </div>
            </li>

            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="{{url('/admin/article/list/1')}}"><em style="background: url({{asset('img/article.png')}}) no-repeat center 7px scroll;">&nbsp;</em>文章管理</a>
                <div class="leftNav2">
                    <ul>
                        <li><a target="main_frm" href="{{url('/admin/article/add')}}"><em>&nbsp;</em>发布文章</a></li>
                    </ul>
                </div>
            </li>
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="{{url('/admin/user/list')}}"><em style="background: url({{asset('img/users.png')}}) no-repeat center 4px scroll;">&nbsp;</em>会员管理</a>
                <div class="leftNav2">
                    <ul>
                        <!-- <li><a target="main_frm" href="{{url('/admin/user/admin_list')}}"><em>&nbsp;</em>管理员管理</a></li> -->
                    </ul>
                </div>
            </li>
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="{{url('/admin/banner')}}"><em style="background: url({{asset('img/picture.png')}}) no-repeat center 4px scroll;">&nbsp;</em>Banner</a>
                <div class="leftNav2">
                    <ul>
                        <li><a target="main_frm" href="{{url('/admin/banner/add')}}"><em>&nbsp;</em>发布</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div id="sjgl_right" style="padding-left:200px; height:100%;">
        <div class="sjgl_main" style="height:1000px;">
            <iframe src="{{url('/admin/goods/list')}}" marginheight="0" marginwidth="0" frameborder="0" width="100%" height=100% id="main_frm" name="main_frm"></iframe>
        </div>
    </div>
</div>
@endsection