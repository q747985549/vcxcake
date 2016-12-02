@extends('basenew')
@section('title','列表')
@section('content')
	<style>
	body{
		background: white;
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


        $(".list_01 ").mouseover(function() {
            //$(this).attr("className","list_02");
            $(this).removeClass("list_01");
            $(this).addClass("list_02");
        });

        $(".list_01 ").mouseout(function() {
            $(this).removeClass("list_02");
            $(this).addClass("list_01");
        });

        $(".product_a ").mouseover(function() {
            //$(this).attr("className","list_02");
            $(this).removeClass("product_a");
            $(this).addClass("product_b");
        });

        $(".product_a ").mouseout(function() {
            $(this).removeClass("product_b");
            $(this).addClass("product_a");
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
    <table width="1150" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
        <tr>
            <td height="30">
                <div class="list_03">{{$pid}}分类：</div>
                <a href="">
                    <div class="@if(is_null($cate_id)) list_02 @else list_01 @endif ">不限</div>
                </a>
                @foreach($cate as $v)
                <a href="{{url('list/'.$realpid.'/'.$v->id)}}">
                    <div class="@if($cate_id == $v->id) list_02 @else list_01  @endif">{{$v->name}}</div>
                </a>
                @endforeach
            </td>
        </tr>
    </table>
    <table width="1170" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td style="padding-left:10px;">
            @foreach($list as $v)
                <div class="product_a">
                    <div style="height:10px; overflow:hidden;"></div>
                    <div style="width:255px;margin:0px auto;overflow:hidden;">
                        <a href="{{url('detail/'.$v['id'])}}"><img src="{{url('files/getimg/'.$v['img'])}}" width="255" height="255" border="0"></a>
                    </div>
                    <div style="height:6px; overflow:hidden;"></div>
                    <a href="{{url('detail/'.$v['id'])}}">
                        <div class="product_02">
                            {{$v['title']}}
                        </div>
                    </a>
                    <div style="height:15px; overflow:hidden;"></div>
                    <div class="product_03">
                        {{$v['price']}}元
                    </div>
                    <div style="height:15px; overflow:hidden;"></div>
                    <div class="product_04">
                        <div class="product_05"></div>
                        <a href="{{url('detail/'.$v['id'])}}">
                            <div class="product_06">查看详情</div>
                        </a>
                        <div class="product_07"></div>
                        <a href="javascript:void(0);" onclick="add_cart({{$v['id']}});">
                            <div class="product_06">加入购物车</div>
                        </a>
                    </div>
                </div>
            @endforeach
            <script>
	            function add_cart($id){
	            	$.post("{{url('m/addcart')}}",{
		                id:$id,
		                _token:"{{csrf_token()}}"
		            },function(a){
		                if(a == 1){
		                    layer.msg('添加成功！');
		                    $(".layui-layer").css('z-index',9999999999999);
		                    bigCartDialog.destroy();
		                }else{
		                    layer.msg(a);
		                    $(".layui-layer").css('z-index',9999999999999);
		                }
		            });
	            }
            </script>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="30" background=""></td>
        </tr>
    </table>
@stop