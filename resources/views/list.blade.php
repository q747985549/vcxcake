@extends('base')
@section('title',$pid) 
@section('content')
<style>
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}

.pagination>li {
    display: inline;
}

.pagination>li:first-child>a,
.pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.pagination>li>a,
.pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #8e6a55;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}

.popup-container {
    display: none;
}
</style>
<script>
$(function() {
    // $(".popup-container:first").show();
})
</script>
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="http://www.21cake.com" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">蛋糕名录</span>
            <input type="hidden" id="isCakeList" value="蛋糕名录">
        </div>
        <div id="main" class="clearfix">
            <!-- 商品列表开始 -->
            <div class="page-maincontent">
                <!-- 筛选区 -->
                <div id="filter_container" class="filter-container">
                    <!-- 筛选条件 -->
                    <div id="gallery_filter" class="gallery-filter">
                        <div id="filter_selected" class="filter-selected clearfix">
                            <dl class="filter-selected-list clearfix">
                                <dt class="filter-selected-title">您已选择：</dt>
                                <dd class="filter-selected-values">
                                </dd>
                            </dl>
                        </div>
                        <div id="filter_lists" class="filter-lists-container">
                            <!-- 扩展属性 -->
                            <dl class="filter-entries clearfix" data-label="p_5">
                                <dt class="filter-entries-label">蛋糕分类：</dt>
                                <dd class="filter-entries-values">
                                    <!--列表页多语言-->
                                    <span class="filter-item @if(is_null($cate_id)) active @endif"><a href="{{url('list/1')}}" class="handle action-select-unlimit">不限</a></span> @foreach($cate as $v)
                                    <span class="filter-item @if($cate_id == $v->id) active @endif" data-fid="p_5-39"><a href="{{url('list/'.$realpid.'/'.$v->id)}}" class="handle action-select-filter" id="IDgalleryname39">{{$v->name}}</a></span> @endforeach
                                </dd>
                            </dl>
                        </div>
                        <!-- 促销标签 -->
                    </div>
                </div>
                <!-- 排序状态条 -->
                <div id="gallery_show" class="gallery-show">
                    <div class="gallery-list">
                        <input type="hidden" class="action-pagedata" value="{total:36, pagecurrent:1, pagetotal:1}">
                        <ul>
                            @foreach($list as $v)
                            <li class="goods-item clearfix">
                                <div class="goods-pic">
                                    <a target="_blank" href="{{url('/detail/'.$v['id'])}}"><img class="action-goods-img" title="{{$v['title']}}" alt="{{$v['title']}}" src="{{url('/files/getimg/'.$v['img'])}}"></a>
                                </div>
                                <div class="goods-action">
                                    <div class="goods-buy">
                                        <div>
                                            <a class="btn btn-major action-view" href="{{url('/detail/'.$v['id'])}}" id="IDgalleryview6122" target="_blank"><span><span>查看详情</span></span></a>
                                        </div>
                                        <!-- 加入购物车 -->
                                        <a class="btn btn-major action-addtocart" id="IDgalleryaddtocart6122" href="javascript:void(0);" data-goodsId="{{$v['id']}}" target="_dialog_minicart"><span><span>加入购物车</span></span></a>
                                    </div>
                                </div>
                                <div class="goods-price">
                                    <ul>
                                        <li class="listgoodprice-21cake">
                                            <label for=""></label>
                                            <span class="smallrmb color4919">¥</span><b class="price">{{$v['price']}}</b>
                                            <b>/1磅</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="goods-info">
                                    <h3 class="goods-name">
                                                             <a href="{{url('/detail/'.$v['id'])}}" target="_blank">{{$v['title']}}</a>
                                         </h3>
                                    <div class="goods-desc">{!!$v['description']!!}
                                    </div>
                                    <div class="goods-comment">
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="paging">
                        {{$list->links()}}
                    </div>
                </div>
            </div>
        </div>
        <script>
        (function ($) {
    $(document).ready(function () {
        $(".action-addtocart").click(function(){
            var goodsId = jQuery(this).attr('data-goodsId');
            bigCartDialog.init(goodsId);
            var position = $(this).closest('.goods-action').position();
            $('#big_cart_dialog').css({
                "top": position.top + 'px',
                "left": (position.left - 362) + 'px'
            });
        });
        $(".popup-btn-close").click(function(){
            bigCartDialog.destroy();
        });
        $(".btn-increase").click(function(){
            $('.action-quantity-input').val( parseInt($('.action-quantity-input').val()) + 1);
            $('[name=num]').val(parseInt($('.action-quantity-input').val()) + 1);
        });
        $(".btn-decrease").click(function(){
            if($('.action-quantity-input').val() - 1 > 0)
            $('.action-quantity-input').val( parseInt($('.action-quantity-input').val()) - 1 );
            $('[name=num]').val(parseInt($('.action-quantity-input').val()) + 1);
        });

        $(".big_dialog_addcart").click(function(){
            $.post("{{url('addcart')}}",{
                id:$('[name=goods_id]').val(),
                weight:$("[name=weight]").val(),
                num:$("[name=num]").val(),
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
        });

        var bigCartDialog = {
            goodsId: 0,
            product: null,
            products: null,
            productId: 0,
            price:0,
            init: function(goodsId) {
                this.goodsId = goodsId;
                $.getJSON('{{url("ajax_get_info")}}/'+goodsId, function(responce) {
                    bigCartDialog.price = responce.price;
                    bigCartDialog.products = responce.weight_arr;
                    bigCartDialog.initPanel(responce);
                });
            },
            destroy: function() {
                $('#big_cart_dialog').hide();
            },
            initPanel: function(responce) {
                var specList = [];
                $("._size").html(responce.size);
                $(".suite_amount").html(responce.person);
                $(".cutlery_content").html(responce.persend);
                $(".booking_hour_limited").html(responce.wait_time);
                $(".each-pound").html("￥" + responce.price + "磅");
                var goodsId = this.goodsId;
                $(this.products).each(function(index, item) {
                    specList.push('<li class="spec-attr"><a href="#" ><span>' + item + '</span> <i></i></a></li>');
                });
                $('#spec-list').html(specList.join('')).find('a').each(function(index) {
                    $(this).click(function(e) {
                        $(this).parent().addClass('selected').siblings().removeClass('selected');
                        if ($(this).hasClass('others-button')) {
                            $(".other-pound-explain").show();
                            // 价格隐藏
                            $(".product-concerns").hide();
                            // 商品说明隐藏
                            $(".spec-area").find(".spec-attr_explain").hide();
                            // 按钮隐藏
                            $(".product-action").hide();
                        } else {
                            $(".other-pound-explain").hide();
                            // 价格隐藏
                            $(".product-concerns").show();
                            // 商品说明隐藏
                            $(".spec-area").find(".spec-attr_explain").show();
                            // 按钮隐藏
                            $(".product-action").show();
                        }
                        bigCartDialog.updatePanel( $(this).find('span').html() );
                        return false;
                    });
                });

                $('#spec-list a').eq(0).trigger('click');
                $('#big_cart_dialog').show();
            },
            updatePanel: function(weight) {
                $('#goods_id').val(this.goodsId);
                $('#weight').val(weight);
                $('.action-price').text(weight * this.price);
            },
            calculatePrice: function(amount) {
                var price = this.product['price'] * amount;
                $('.action-price').text(price.toFixed(2));
            }
        };

        window.bigCartDialog = bigCartDialog;
        });
        })(jQuery);
        </script>
        <div id="big_cart_dialog" class="popup-container big-cart-dialog" style="display:none;">
            <form method="post" action="/cart-add-goods.html">

                <input type="hidden" name="goods_id" id="goods_id" value="">
                <input type="hidden" name="weight" id="weight" value="">
                <input type="hidden" name="num" value="1">

                <div class="popup-body">
                    <div class="popup-header clearfix">
                        <h2 class="title">21cake生日奶油蛋糕</h2>
                        <span>
                        <button type="button" title="关闭" class="popup-btn-close">
                            <i>×</i>
                        </button>
                      </span>
                    </div>
                    <div class="popup-content clearfix">
                        <div id="product_information" class="product-information">
                            <!--商品价格 and 商品评分-->
                            <div class="product-concerns">
                                <ul>
                                    <li class="item">
                                        <span class="label">价格：</span>
                                        <span class="detail">
                                                          <span class="smallrmb20 colorf75e53">¥</span>
                                        <b class="price">
                                                              <ins class="action-price"></ins>
                                                          </b>
                                        <span class="each-pound"></span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <!-- 购买区 -->
                            <div class="product-buy">
                                <!-- 商品规格 -->
                                <div id="product_spec" class="product-spec">
                                    <ul class="spec-area">
                                        <li class="spec-item">
                                            <span class="item-label">
                                <i>磅数</i>：</span>
                                            <ul class="clearfix" id="spec-list">
                                                <li class="spec-attr selected"><a href="#" data-product-id="6122"><span>0.5磅</span> <i></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p class="other-pound-explain" style="display: none;"><em>更多磅数的蛋糕，请与客服人员联系。</em>
                                        <br>订购电话：400 650 2121</p>
                                    <!-- 商品规格说明区 -->
                                    <ul class="spec-area">
                                        <li class="spec-item">
                                            <ul class="clearfix">
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="size">
                                                            </div>
                                                            <div class="align-txt"><span class="_size">0.5磅</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="persons">
                                                            </div>
                                                            <div class="align-txt"><span class="suite_amount">1-2人</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="plates">
                                                            </div>
                                                            <div class="align-txt-1"><span class="cutlery_content">赠1把钢勺</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="spec-attr_explain">
                                                    <div class="out-align">
                                                        <div class="align-center">
                                                            <div class="timers">
                                                            </div>
                                                            <div class="align-txt-2">需提前<span class="booking_hour_limited">48</span>小时预订</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-action" style="overflow: hidden;">
                                    <ul style="overflow: hidden;">
                                        <!--商品库存-->
                                        <li class="product-buy-quantity">
                                            <label class="item-label">数量：</label>
                                            <span class="item-content">
                                    <span class="p-quantity">
                                        <a href="javascript:void(0);" class="btn-decrease">-</a>
                                        <input type="text" name="goods[num]" class="action-quantity-input" value="1" min="1" id="amount" max="99">
                                        <a href="javascript:void(0);" class="btn-increase">+</a>
                                    </span>
                                            </span>
                                        </li>
                                        <!--购买按钮-->
                                        <li class="product-buy-action">
                                            <button type="button" onclick="" class="btn btn-major btn-huge" rel="_request" id="IDproductaddtocart">
                                                <span class="big_dialog_addcart">加入购物车</span>
                                            </button>
                                            <button type="submit" class="btn btn-import btn-huge action-buynow" rel="_request" id="IDproductbuynow">
                                                <span>
                                        <span>立即购买</span>
                                                </span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <span class="icoimg"></span>
                    </div>
                </div>
            </form>
        </div>
        @endsection
