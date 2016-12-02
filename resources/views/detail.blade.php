@extends('basenew')
@section('title','列表')
@section('content')
<script src='js/jquery.elevatezoom.js'>
</script>
<style>
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    background-image: url();
    background-position: center top;
    background-color: #FFF;
    background-repeat: repeat-x;
}
</style>
<script>
$(document).ready(function(e) {


    $(".index_fwly_img_div ").mouseover(function() {
        $(this).children('.index_fwly_img_div2 ').animate({
            opacity: '0'
        }, 300);
    });
    $(".index_fwly_img_div ").mouseout(function() {
        $(this).children('.index_fwly_img_div2 ').animate({
            opacity: '1'
        }, 300);
    });

    $(".product_s_0 ").mouseover(function() {
        $(this).removeClass("product_s_0");
        $(this).addClass("product_s_1");
        $("#product_img ").attr("src", $(this).children('img').attr("src"));
        $('#product_img').elevateZoom();
    });

    $(".product_s_0 ").mouseout(function() {
        $(this).removeClass("product_s_1");
        $(this).addClass("product_s_0");
    });


    $(".product_c_0 ").mouseover(function() {
        $(this).removeClass("product_c_0");
        $(this).addClass("product_c_1");
    });

    $(".product_c_0 ").mouseout(function() {
        $(this).removeClass("product_c_1");
        $(this).addClass("product_c_0");
    });

    $(".product_c_0 ").click(function() {
        $(".product_c_2").removeClass("product_c_2");
        $(".product_c_2").addClass("product_c_0");
        //$(".product_c_2").attr("class","product_c_0")
        $(this).removeClass("product_c_0");
        $(this).addClass("product_c_2");

        var price = {{$info['price']}};
        var weight = parseFloat($(this).attr("weight"));
        $("[name=weight]").val(weight);
        $("#price_num").html("￥" +  weight* price);
    });
    $(".product_c_0:first").click();

    $(".product_num_0 ").click(function() {

        var num = Math.round($("#num").attr("value")) - 1;
        if (num < 1) {
            num = 1;
        }
        $("#num").attr("value", num);


    });


    $(".product_num_1 ").click(function() {

        var num = Math.round($("#num").attr("value")) + 1;
        if (num < 1) {
            num = 1;
        }
        $("#num").attr("value", num);

    });


    $(".product_g_0 ").mouseover(function() {
        $(this).removeClass("product_g_0");
        $(this).addClass("product_g_1");
    });

    $(".product_g_0 ").mouseout(function() {
        $(this).removeClass("product_g_1");
        $(this).addClass("product_g_0");
    });


    $(".pssjimg ").mouseover(function() {
        $("#pssj02").css("top", $(this).offset().top);
        $("#pssj02").css("left", $(this).offset().left + 100);
        $("#pssj02").fadeIn();
    });

    $(".pssjimg ").mouseout(function() {
        $("#pssj02").fadeOut();
    });
});
</script>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:20px; margin-top:20px;">
    <tr>
        <td height="1" bgcolor="#000000"></td>
    </tr>
    <tr>
        <td height="30" style="padding-left:10px;">首页 &gt;&gt; 列表 </td>
    </tr>
    <tr>
        <td height="1" bgcolor="#000000"></td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="116" valign="top">
        @foreach($info['imgs'] as $v)
            <div class="product_s_0"><img src="{{url('files/getimg/'.$v)}}" width="110" height="110"></div>
        @endforeach
        </td>
        <td width="10"></td>
        <td width="595" valign="top"><img src="{{url('files/getimg/'.$info['imgs'][0])}}" name="product_img" width="595" height="470" id="product_img">
            <script>
            $('#product_img').elevateZoom();
            </script>
        </td>
        <td width="30"></td>
        <td width="310" valign="top">
            <div style=" line-height:30px; font-size:16px; color:#5D5C5A;"><strong>{{$info['title']}}</strong>
                <br>蓝莓巧克力慕斯</div>
            <div style="height:30px; line-height:30px; font-size:16px;" id="price_num">￥{{$info['price']}}</div>
            <div style="width:240px; margin-top:10px;">
            @foreach($info['weight_arr'] as $v)
                <div class="product_c_0 " weight="{{$v}}">
                    {{$v}}磅
                    <div class="product_c_v"></div>
                </div>
            @endforeach
            </div>
            <div style=" float:left;width:100%; line-height:30px; font-size:14px; color:#C02B2D;"><strong>更多磅数的蛋糕请联系客服</strong>
                <br>{{$s['telephone']}}</div>
            <div style="width:240px; margin-top:10px;float:left;">
                <div class="product_num_0"></div>
                <div style=" float:left;cursor:pointer; background-image:url({{asset('new/images/p_08.png')}}); width:52px; height:20px; margin-left:8px; margin-right:8px; padding:1px;">
                    <input name="num" id="num" value="1" type="text" style="border:0px; width:52px; height:18px; line-height:18px; text-align:center; font-size:16px; color:#8C8C8C;">
                </div>
                <div class="product_num_1"></div>
            </div>
            <div style="width:310px; margin-top:10px; float:left;">
                <div class="product_g_0" onclick="buy();">
                    立即购买
                </div>
                <div class="product_g_0" onclick="add_cart();">
                    加入购物车
                </div>
                <input type="hidden" name="weight" value="" />
                <input type="hidden" name="num" value="" />
                <script>
                    function buy(){
                        add_cart(function(){
                            location.href = "{{url('user/cart')}}";
                        });
                    }
                    function add_cart($f){
                        $.post("{{url('addcart')}}",{
                            id:{{$info['id']}},
                            weight:$("[name=weight]").val(),
                            num:$("[name=num]").val(),
                            _token:"{{csrf_token()}}"
                        },function(a){
                            if(a == 1){
                                layer.msg('添加成功！');
                                $(".layui-layer").css('z-index',9999999999999);
                                if($f){
                                    $f();
                                }
                            }else{
                                layer.msg(a);
                                $(".layui-layer").css('z-index',9999999999999);
                            }
                        });
                    }
                    </script>
            </div>
            <div style="width:310px; margin-top:10px; float:left;">
                <img src="{{asset('new/images/pssj.png')}}" class="pssjimg">
            </div>
            <div style="width:310px;position:absolute; left:0px; top:0px; z-index:999; display:none;" id="pssj02">
                <img src="{{asset('new/images/pssj02.png')}}">
            </div>
        </td>
        <td width="89" valign="top"></td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="1" bgcolor="#000000"></td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px; margin-bottom:10px;">
    <tr>
        <td><img src="{{asset('new/images/product_04.gif')}}" width="182" height="45"></td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="33%" style="line-height:200%; font-size:12px; color:#5C5B59;">
            品牌 | {{$info['brand']}}
            <br> 适合人群 | {{$info['renqun']}}
        </td>
        <td width="33%" style="line-height:200%; font-size:12px; color:#5C5B59;">
            保鲜条件 | {{$info['baoxian']}}
            <br> 所属分类 | {{$cate_name}}
        </td>
        <td width="33%" style="line-height:200%; font-size:12px; color:#5C5B59;">
            适合节日 | {{$info['jieri']}}
            <br> 蛋糕分类 | {{$info['dangaocate']}}
        </td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px;">
    <tr>
        <td height="4" background="{{asset('new/images/xx.gif')}}"></td>
    </tr>
</table>
<table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px;">
    <tr>
        <td>
        {!!$info['content']!!}
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="30" background=""></td>
    </tr>
</table>
@stop