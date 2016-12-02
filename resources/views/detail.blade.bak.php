@extends('base')
@section('title',$info['title'])
@section('content')
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="{{url('/')}}" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span>
                <a href="{{url('/list/'.$info['pid'])}}" alt="" title="">@if($info['pid'] == 1)蛋糕@else新品@endif</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">{{$info['title']}}</span>
        </div>
        <div id="main" class="clearfix">
            <div class="page-maincontent">
                <div id="product_container" class="product-container clearfix">
                    <form action="/cart-add-goods.html" method="post" target="_dialog_minicart">
                        <input type="hidden" name="goods_id" value="{{$info['id']}}">
                        <input type="hidden" name="weight" value="{{$info['weight_arr'][0]}}">
                        <div class="product-side" style="width:502px;">
                            <!-- 商品相册 -->
                            <div id="product_album" class="product-album">
                                <div class="product-album-preview clearfix">
                                    <div class="product-album-pic" style="width:500px;height:500px;line-height:498px;*font-size:450px;">
                                        <a href="javascript:void(0)" id="op_product_zoom"><img src="{{url('files/getimg/'.$info['imgs'][0])}}"  class="small-pic" style="max-width:500px;max-height:500px;"></a>
                                    </div>
                                    <img class="loading" app="b2c" src="http://www.21cake.com/app/b2c/statics/images/loading.gif" alt="正在加载大图..." style="display:none;">
                                    <div class="product-album-zoom"><a href="/product-albums-297.html" title="点击查看大图" target="_blank" class="icon">J</a></div>
                                    <div class="loading" style="visibility: hidden;"><img alt="loading..." src="http://www.21cake.com/app/b2c/statics/images/loading.gif"> 正在加载大图...</div>
                                </div>
                                <div class="product-album-thumb product-album-thumb-bottom">
                                    <div class="flip prev forward over"><a href="javascript:void(0);" class="icon">4</a></div>
                                    <div class="thumbnail-list" style="width:468px;">
                                        <ul class="clearfix" style="width: 790px;">
                                        @foreach($info['imgs'] as $img)
                                            <li class="active">
                                                <div class="arrow arrow-top"><i class="below"></i></div>
                                                <div class="thumbnail">
                                                    <a href="javascript:void(0);" ><img src="{{url('files/getimg/'.$img)}}" width="150" height="150"></a>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="flip next backward over"><a href="javascript:void(0);" class="icon">5</a></div>
                                </div>
                            </div>
                            <script>
                            $('.thumbnail-list li').hover(function() {
                                $('.thumbnail-list li').removeClass('active');
                                $(this).addClass('active');
                                $(".product-album-pic img").attr('src', $(this).find('img').attr('src'));
                            }, function() {

                            });
                            </script>
                            <!-- 分享推荐 -->
                        </div>
                        <div class="product-main clearfix" style="margin-left:829px;">
                            <!-- 商品基本信息 -->
                            <div class="product-titles">
                                <h2>{{$info['title']}}</h2>
                            </div>
                            <div id="product_information" class="product-information">
                                <!--商品价格 and 商品评分-->
                                <div class="product-concerns">
                                    <ul>
                                        <li class="item">
                                            <span class="label">价格：</span>
                                            <span class="detail">
            <span class="smallrmb20 colorf75e53">¥</span><b class="price"><ins class="action-price">498.0</ins></b>
                                            <span class="each-pound">￥<em class="action-each_pound">{{$info['price']}}</em><span class="small-each-pound">/磅</span></span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- 赠品和促销 -->
                                <!-- 扩展属性 -->
                               
                                <!-- 购买区 -->
                                <div class="product-buy">
                                    <!-- 商品规格 -->
                                    <div id="product_spec" class="product-spec">
                                        <input type="hidden" value="all" name="join10_tag">
                                        <ul class="spec-area">
                                            <li class="spec-item">
                                                <span class="item-label"><i>磅数</i>：</span>
                                                <span class="item-content">
                                                <ul class="clearfix">
                                                @foreach($info['weight_arr'] as $w)
                                                    <li class="spec-attr @if($loop->first)selected @endif">
                                                        <a href="javascript:void(0);" data-weight="{{$w}}" class="weight_button">
                                                            <span>{{$w}}磅</span>
                                                            <i></i>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                <script>
                                                    $(function(){
                                                        $("weight_button").parent().addClass('selected');

                                                        $(".weight_button").click(function(){
                                                            $(".spec-attr").removeClass('selected');
                                                            $(this).parent().addClass('selected');
                                                            $('[name=weight]').val($(this).attr('data-weight'));
                                                        });
                                                    })

                                                </script>
                                        </ul>
                                        </span>
                                        </li>
                                        </ul>
                                    </div>
                                    <!-- 商品规格说明区 -->
                                    <ul class="spec-area">
                                        <li class="spec-item">
                                            <ul class="clearfix">
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="size">
                                                            </div>
                                                            <div class="align-txt">{{$info['size']}}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="persons">
                                                            </div>
                                                            <div class="align-txt">{{$info['person']}}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="plates">
                                                            </div>
                                                            <div class="align-txt-1">{{$info['present']}}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="timers">
                                                            </div>
                                                            <div class="align-txt-2">需提前{{$info['wait_time']}}小时预订</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="product-action" style="overflow: hidden;">
                                        <ul style="overflow: hidden;">
                                            <!--商品库存-->
                                            <li class="product-buy-quantity ssss">
                                                <label class="item-label" for="for_quantity_input">数量：</label>
                                                <span class="item-content"><span class="p-quantity">
                                                <a href="javascript:void(0);" class="btn-decrease">-</a>

                                                <input type="text" name="num" class="action-quantity-input" value="1" min="1" max="99">
                                                <a href="javascript:void(0);" class="btn-increase">+</a></span>

                                            </li>
                                            <script type="text/javascript">
                                                $(".btn-increase").click(function(){
                                                $('[name=num]').val(parseInt($('[name=num]').val()) + 1);
                                            });
                                            $(".btn-decrease").click(function(){
                                                if($('[name=num]').val() - 1 > 0)
                                                $('[name=num]').val( parseInt($('[name=num]').val()) - 1 );
                                            });
                                            </script>
                                            <!--购买按钮-->
                                            <li class="product-buy-action">
                                                <button type="button" onclick="buy();" class="btn btn-import btn-huge action-buynow" rel="_request" id="IDproductbuynow"><span><span>立即购买</span></span>
                                                </button>
                                                <button type="button" onclick="add_cart();" class="btn btn-major btn-huge action-addtocart" rel="_request" id="IDproductaddtocart"><span><span>加入购物车</span></span>
                                                </button>
                                            </li>

                                            <script>
                                            function buy(){
                                                add_cart(function(){
                                                    location.href = "{{url('user/cart')}}";
                                                });
                                            }
                                            function add_cart($f){
                                                $.post("{{url('addcart')}}",{
                                                    id:$('[name=goods_id]').val(),
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
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="goods-culture">
                                <p>
                                {{$info['description']}}
                                </p>
                            </div>
                        </div>
                    </form>
                  
                </div>
                <!-- 配件套餐 -->
                <div id="product_section">
                    <h2 class="tags-hd active"><a href="#detail">商品详情</a><span class="develop-1"></span></h2>
                    <!-- 商品详情 Start -->
                    <div id="product_detail" class="product-section product-detail">
                        <div class="product-attributes">
                            <ul class="clearfix">
                                <li>@if(!empty($info['brand']))
                                品牌： {{$info['brand']}}
                                    @endif

                                    <!--<a href="/brand-1.html">21Cake</a>-->
                                    @if(!empty($info['renqun']))
                                    <p>适合人群：{{$info['renqun']}}</p>
                                    @endif
                                    @if(!empty($info['baoxian']))
                                    <p>保鲜条件：{{$info['baoxian']}}</p>
                                    @endif
                                    

                                </li>
                                <li>
                                    所属分类：{{$cate_name}}
                                    @if(!empty($info['jieri']))
                                    <p>适合节日：{{$info['jieri']}}</p>
                                    @endif

                                </li>
                                <li>
                                    <p>蛋糕分类：{{$info['dangaocate']}}</p>
                                    @if(!empty($info['tiandu']))
                                    <p>甜度：@for($i=0;$i<$info['tiandu'];$i++)★@endfor
                                    @for($i=0;$i< 5-$info['tiandu'];$i++)☆@endfor
                                     </p>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="detail-content">
                            {!!$info['content']!!}
                        </div>
                    </div>
                    <!-- 商品详情 End -->
                    <div id="product_related" class="product-related" data-widget-type="Switchable" data-sync-type="product_related">
                    </div>
                </div>
            </div>
        </div>
        <!--查看时间弹窗-->
     
        <div class="pro-visited">
            <div class="common-mod sales-charts">
                <div class="hd">
                    <h2 class="title">本月销售榜</h2></div>
                <div class="bd">
                    <ul class="goods-list clearfix">
                    @foreach($hot as $h)
                        <li class="goods-item clearfix">
                            <span class="num-1"></span>
                            <div class="goods-pic">
                                <a href="{{url('detail/'.$h['id'])}}"><img src="{{url('files/getimg/'.$h['img'])}}"></a>
                            </div>
                            <div class="goods-info">
                                <h3 class="goods-name"><a href="{{url('detail/'.$h['id'])}}">{{$h['title']}}</a></h3>
                                <div class="goods-price"><i>￥{{$h['price']}}</i></div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
