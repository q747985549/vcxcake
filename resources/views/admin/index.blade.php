
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
           
            <li class="left sjgl_topli"><a href="{{ url('/loginout') }}"><em class="toptc"><img src="{{asset('/static/images/toptc_03.png')}}" /></em>退出</a></li>
        </ul>
    </div>
</div>

<div class="sjglBox">
    <div class="left sjgl_leftmenu">
        <ul>
            <!-- <li class="leftMenu_li"><a class="leftMenu_a on" target="main_frm" href="{{url('/shangjia/index')}}"><em>&nbsp;</em>首页</a></li> -->
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a2 on"  target="main_frm" href="{{url('/admin/setting')}}"><em>&nbsp;</em>网站设置</a>
            </li>
            
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a3" target="main_frm" href="{{url('/shangjia/goods/list')}}"><em>&nbsp;</em>商品管理</a>
            	<div class="leftNav2">
                    <ul>
                        <li><a target="main_frm" href="{{url('/shangjia/goods/add')}}"><em>&nbsp;</em>发布</a></li>
                        <li><a target="main_frm" href="{{url('/shangjia/cates/list')}}"><em>&nbsp;</em>分类</a></li>
                        <li><a target="main_frm" href="{{url('/shangjia/recycled/list')}}"><em>&nbsp;</em>回收站</a></li>
                    </ul>
                </div>
            </li>
             <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a2"  target="main_frm" href="{{url('/shangjia/wifi')}}"><em>&nbsp;</em>wifi管理</a>
            </li>
            <li class="leftMenu_li"><a class="leftMenu_a leftMenu_a2"  target="main_frm" href="{{url('/shangjia/setting')}}"><em>&nbsp;</em>本店管理</a>
            </li>
        </ul>
    </div>
    <div id="sjgl_right" style="padding-left:200px; height:100%;">
        <div class="sjgl_main" style="height:1000px;">
            <iframe src="{{url('/shangjia/goods/list')}}" marginheight="0" marginwidth="0" frameborder="0" width="100%" height=100% id="main_frm" name="main_frm"></iframe>
        </div>
    </div>
</div>
@endsection