@extends('m.base')
@section('title','购物车')
@section('footer','none')

@section('content')
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="javascript:history.back()" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                购物车
            </div>
        </div>
    </header>
    <div class="full-padding">
        <div class="cart-pt">
            <div class="goods_list">
                <ul class="pt-list cart_padding">
                @foreach($list as $v)
                    <li class="pt-h-item c-fix" id="good12">
                        <div class="cart_product_info">
                            <div class="pt-h-img goods_img">
                                <a href="{{url('m/detail/'.$v['id'])}}"><img src="{{url('files/getimg/'.$v['img'])}}"></a>
                            </div>
                            <div class="pt-h-info goods_name">
                                <div class="pt-h-name">
                                    {{$v['title']}} </div>
                                <div class="pt-h-other">
                                    磅数：{{$v['weight']}}磅
                                    
                                     </div>
                                <div class="pt-h-other taocan">
                                    标准配置 餐具套餐5套
                                </div>
                            </div>
                            <div class="goods_info">
                                <div class="pt-h-price">
                                    <div class="col2">
                                        <div class="col price goods_price">
                                            ￥{{$v['price']}}/磅 </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" data-id="{{$v['id']}}" class="J-remove goods_del">
                                    删除
                                </a>
                            </div>
                        </div>
          
                        <a id="product365" productid="365" productweight="磅数：1.0磅" type_="0" content="无" class="add_birth J_birht_add" href="javascript:void(0)">
                            <span>+添加生日牌</span><span class="content">无</span>
                            <img src="{{asset('img/ico_link_down.gif')}}" alt="">
                        </a>
                        <div class="alert_birth hide">
                            <ul>
                                <li type_="0" content="" class="li">无</li>
                                <li type_="2" content="Happy Birthday">Happy Birthday</li>
                                <li type_="3" content="生日快乐">生日快乐</li>
                                <li type_="4" content="节日快乐">节日快乐</li>
                            </ul>
                        </div>
                        <div class="pt-h-bar c-fix goods_pad" style="border-top:1px dashed #eee">
                            <div class="pt-num J-pt-num">
                                <a href="#" class="minus btn goods_change" data-id="{{$v['id']}}">-</a>
                                <div class="num goods_num">
                                    <input type="text" class="num-ipt goods_quantity" value="{{$v['num']}}">
                                </div>
                                <a href="#" class="plus btn goods_change" data-id="{{$v['id']}}">+</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                <script>
                $(function(){

                    $(".J-pt-num .minus").click(function(){
                        var id = $(this).attr('data-id');
                        var num = $(this).next().find('.goods_quantity');
                        if(num.val() >  1){
                            num.val(parseInt(num.val())-1);
                            $.get('{{url("m/user/change_cart_num")}}/'+id+"/"+num.val());
                        }
                    });
                    
                    $(".clear_all").click(function(){
                        $.get("{{url('m/user/del_cart_all')}}",function(){
                            $(".pt-list li").remove();
                        })  
                    });
                    $(".goods_del").click(function(){
                        var id = $(this).attr('data-id');
                        var e = this;
                        $.get("{{url('m/user/del_cart')}}/"+id,function(){
                            $(e).parent().parent().parent().remove();
                        })  
                    });
                    $(".J-pt-num .plus").click(function(){
                        var id = $(this).attr('data-id');
                        var num = $(this).prev().find('.goods_quantity');
                        num.val(parseInt(num.val())+1);
                        $.get('{{url("m/user/change_cart_num")}}/'+id+"/"+num.val());
                    });
                        $(".J_birht_add").click(function(){
                            if($(this).next().hasClass('hide')){
                                $(this).next().removeClass('hide');
                            }else{
                                $(this).next().addClass('hide');
                            }
                        });
                })
                </script>
                </ul>
                <script type="application/javascript" src="{{asset('js/fastclick.js')}}">
                if ('addEventListener' in document) {
                    document.addEventListener('DOMContentLoaded', function() {
                        FastClick.attach(document.body);
                    }, false);
                }
                </script>
                <script type="text/javascript">
                var birthday_cards = (sessionStorage.getItem("birthday_cards")) ? JSON.parse(sessionStorage.getItem("birthday_cards")) : {};
                sessionStorage.setItem("birthday_cards", JSON.stringify(birthday_cards));
                if (!$.isEmptyObject(birthday_cards)) { //如果birthday_cards为空
                    for (i in birthday_cards) {
                        $("#product" + i).find(".content").html(birthday_cards[i][0].content);
                    }
                }

                (function() { //生日牌事件重新绑定
                    var _click = /iphone|ipad/ig.test(navigator.userAgent) ? 'touchstart' : 'click';
                    $("body").find(".alert_birth").find("li").live(_click, function() { //处理其它提示
                        var product_weight = parseInt($(this).parents(".alert_birth").prev(".J_birht_add").attr("productWeight").match(/\d+.\d/)[0]);
                        var html = '<li class="input_other"><input type="text"></li>';
                        var $input_birth_div = $(".alert_birth").find(".other_txt");
                        var $input_birth = $input_birth_div.find(".other_contents");
                        $(this).addClass('active').siblings('li').removeClass('active');
                        if ($(this).hasClass('other')) {
                            if (product_weight == 1) {
                                $input_birth.attr("placeholder", "可输入6个汉字或12个英文字母");
                                $input_birth.attr("maxlength", "12");
                            } else if (product_weight == 2) {
                                $input_birth.attr("placeholder", "可输入8个汉字或16个英文字母");
                                $input_birth.attr("maxlength", "16");
                            } else if (product_weight == 3) {
                                $input_birth.attr("placeholder", "可输入10个汉字或20个英文字母");
                                $input_birth.attr("maxlength", "20");
                            } else if (product_weight == 5) {
                                $input_birth.attr("placeholder", "可输入15个汉字或30个英文字母");
                                $input_birth.attr("maxlength", "30");
                            } else if (product_weight > 5) {
                                $input_birth.attr("placeholder", "可输入20个汉字或40个英文字母");
                                $input_birth.attr("maxlength", "40");
                            }
                            $input_birth_div.removeClass('hide');
                        } else {
                            $input_birth_div.addClass('hide');
                        }
                    });

                    $("body").find(".alert_birth").find("li").on('click', function() { //把内容放上去
                        var $add_birth = $(this).closest('.pt-h-item').find('.add_birth');
                        var $alert_birth = $(this).closest('.alert_birth');
                        $alert_birth.addClass('hide');
                        $(".add_birth").find("img").attr("src", "{{asset('img/ico_link_down.gif')}}");
                    });

                    $("body").find(".alert_birth").find(".card_ok").live(_click, function(e) { //其它里点确定
                        e.stopPropagation();
                        e.preventDefault();
                        var product_weight = parseInt($(this).parents(".alert_birth").prev(".J_birht_add").attr("productWeight").match(/\d+.\d/)[0]);
                        var $this_birth = $(this).parents(".alert_birth").prev(".J_birht_add");
                        var product_id = $this_birth.attr("productId");
                        if (!isRightBirthdayLength(product_weight, $(this).prev("input").val())) {
                            alert("超过生日牌字数限制");
                            return false;
                        }
                        birthday_cards[product_id][0].content = $(this).prev("input").val();
                        var reg = '\\\\|\\\||\/|;|\\\.|\\\'|\\\,|\\\"|<';
                        birthday_cards[product_id][0].content = birthday_cards[product_id][0].content.replace(new RegExp(reg, "g"), "");
                        $this_birth.find(".content").attr("type_", birthday_cards[product_id][0].type);
                        $this_birth.find(".content").attr("content", birthday_cards[product_id][0].content);
                        $this_birth.find(".content").html(birthday_cards[product_id][0].content);
                        $(".alert_birth").addClass('hide');
                        $(".add_birth").find("img").attr("src", "/wap_themes/21cake/images/icon/ico_link_down.gif");
                        sessionStorage.setItem("birthday_cards", JSON.stringify(birthday_cards));
                        if (birthday_cards[product_id][0].content == '') {
                            return false;
                        }
                        /** 敏感词提示 */
                        $.getJSON('/cart-limited_words_filter.html', {
                            words: birthday_cards[product_id][0].content
                        }, function(response) {
                            if (response.hasOwnProperty('status') && response.status.toUpperCase() == 'ERROR') {
                                var dialog = new Dialog('#limited_words_warning', {
                                    "type": "close"
                                });
                                $('#close_limited_words_warning').one('click', function() {
                                    $('.alert_birth li[type_="0"]').trigger(_click);
                                    dialog.close();
                                });
                            }
                        });
                        return false;
                    });
                })();

                function modify_valentines(_value, productid, obj) { //新马斯卡 定制
                    $this = $(obj);
                    var custom_item1 = sessionStorage.getItem('custom_word');
                    var custom_item = {};
                    if (custom_item1) {
                        custom_item = JSON.parse(decodeURIComponent(custom_item1));
                    }
                    var value = decodeURIComponent(_value);
                    if (valentine.check_en_ch(_value)) {
                        custom_item[productid] = encodeURIComponent(_value);
                        sessionStorage.setItem("custom_word", encodeURIComponent(JSON.stringify(custom_item)));
                    }
                    try {
                        var span = $this.closest('.showorhide').find(".custom_ul span");
                    } catch (e) {
                        var span = $this.parents('.showorhide').find(".custom_ul span");
                    }
                    span.each(function() {
                        var data = $(this).text();
                        if (data == _value) {
                            $(this).closest('li').addClass('active');
                        } else {
                            $(this).closest('li').removeClass('active');
                        }
                    });
                }
                (function() { //定制
                    var _click = /iphone|ipad/ig.test(navigator.userAgent) ? 'touchstart' : 'click';
                    $(".J_custom").bind(_click, function() {
                        if ($(this).hasClass('active')) {
                            $(this).removeClass('active').find('.custom_image').attr("src", "/wap_themes/21cake/images/icon/ico_link_down.gif");
                            $(this).next(".showorhide").addClass('hide');
                        } else {
                            $(this).next(".showorhide").removeClass('hide');
                            $(this).addClass('active').find(".custom_image").attr("src", "/wap_themes/21cake/images/icon/ico_link_up.gif");
                            var productid = $(this).data("productid");
                            var customtxt2 = sessionStorage.getItem('custom_word');
                            var customtxt1 = {};
                            var custom_word = "";
                            if (customtxt2) {
                                var customtxt1 = JSON.parse(decodeURIComponent(customtxt2));
                                var customtxt = decodeURIComponent(customtxt1[productid]);
                                if (customtxt != null && customtxt != 'undefined') {
                                    var custom_word = customtxt;
                                }
                            }
                            if (/[a-zA-z]/g.test(custom_word)) {
                                $(this).closest('.pt-h-item').find('.custom_text').val(custom_word);
                            } else {
                                $(this).closest('.pt-h-item').find('.custom_text').val(custom_word).css("width", "150px");
                            }
                            $("textarea").live("keyup", function() {
                                var _val = $(this).val();
                                if (_val != null && _val != '') {
                                    if (/[A-Za-z0-9]/.test(_val[0])) {
                                        $(this).css({
                                            "width": "145px"
                                        });
                                    } else {
                                        $(this).css({
                                            "width": "180px"
                                        });
                                    }
                                }
                            });
                            $(this).closest('.pt-h-item').find("button.J_ok").bind(_click, function() {
                                var _value = $(this).closest(".custom_word").find("textarea").val();
                                modify_valentines(_value, productid, $(this));
                            });
                            $(this).closest('.pt-h-item').find("button.J_clear1").bind(_click, function() {
                                $(this).closest(".custom_word").find("textarea").val("");
                                customtxt1[productid] = "";
                                sessionStorage.setItem("custom_word", encodeURIComponent(JSON.stringify(customtxt1)));
                                var li_active = $(this).closest('.pt-h-item').find(".custom_ul li");
                                if (li_active.hasClass('active')) {
                                    li_active.removeClass('active');
                                }
                            });
                            if ($(".custom_ul li").length > 0) {
                                $(this).closest('.pt-h-item').find($(".custom_ul li")).bind(_click, function() {
                                    var productid1 = $(this).closest(".custom_ul").data("productid");
                                    var _value = $(this).find("span").text();
                                    $(this).closest('.pt-h-item').find(".custom_text").val(_value);
                                    modify_valentines(_value, productid, $(this));
                                    $(this).addClass('active').siblings('li').removeClass('active');
                                });
                                $(".custom_ul li").each(function() {
                                    var input_content = $(this).closest('.pt-h-item').find(".custom_text").val();
                                    var modify_content = $(this).find("span").text();
                                    if (input_content && input_content == modify_content) {
                                        $(this).addClass('active');
                                    }
                                });
                            }
                        }
                    })
                })();
                </script>
                <script type="text/javascript">
                </script>
            </div>
        </div>
    </div>
    <div class="total" id="J_total">
        <div class="fixed-bar cart_total">
            <div class="total-inner">
                <div class="clear_all J_clear"></div>
                <form id="checkout-settlement"></form>
                <a href="javascript:alert('等待支付接口');" class="J_settlement pay_now">
                <!-- href="{{url('m/user/go_order')}}" -->
                    去结算
                </a>
                <p class="cart_total_txt">
                    合计:<span class="items-price">￥{{$total}}</span>
                    <br>
                    <em id="notice" class="free_service">订单已满￥100元,享免费配送服务</em>
                </p>
            </div>
        </div>
    </div>
</div>



<div id="cart_tab_more_hu">
    <script type="text/javascript">
    $("#cart_tab_more_hu").show();
    </script>
    <div class="hu-cart-more">
        <span class="recomend">向您推荐</span>
        <ul class="goods-list">
        @foreach($hot as $h)
            <li class="goods-item">
                <div class="goods-pic" style="height: 148px;">
                    <a href="{{url('m/detail/'.$h['id'])}}"><img src="{{url('files/getimg/'.$h['img'])}}" data-img-zoom="true"></a>
                </div>
                <a class="goods-name" href="{{url('m/detail/'.$h['id'])}}" title="Yirgacheffe Coffee 耶加雪菲挂耳咖啡">{{$h['title']}}</a>
                <div class="goods-price">
                    ￥{{$h['price']}}/磅
                    <div class="goods-addcart">
                        <a href="javascript:void(0);" onclick="add_cart({{$h['id']}})"></a>
                    </div>
                </div>
            </li>
        @endforeach
        <script type="text/javascript">
            function add_cart($id){
                $.post("{{url('m/addcart')}}",{
                    id:$id,
                    _token:"{{csrf_token()}}"
                },function(a){
                    if(a == 1){
                        layer.msg('添加成功！');
                        $(".layui-layer").css('z-index',9999999999999);
                        location.reload();
                    }else{
                        layer.msg(a);
                        $(".layui-layer").css('z-index',9999999999999);
                    }
                });
            }
        </script>
        </ul>
        <script type="application/javascript" src="{{asset('js/fastclick.js')}}">
        if ('addEventListener' in document) {
            document.addEventListener('DOMContentLoaded', function() {
                FastClick.attach(document.body);
            }, false);
        }
        </script>
        <script type="text/javascript">
        $(function() {
            // 计算宽度
            $body_w = $("body").width();
            var goods_item_w = $(".goods-item").width() - 20;
            $(".goods-pic").css("height", goods_item_w + "px");
            $("#J_total").removeClass("hide");
            $(".goods-list").unbind().delegate(".goods-addcart a", "click", function(e) {
                var url = $(this).attr('src');
                var $parent = $(this).parents('.goods-item');
                url = url.replace(".html", "");
                url = url + '-tab';
                var x = goods_item_w - 26;
                var y = goods_item_w + 18;
                if (($parent.index()) % 2 == 1) {
                    x = x + 20;
                }
                $("#goods_tip").remove();
                var goods_tip = "<i id=\"goods_tip\" class=\"goods_tip\"></i>";
                $parent.append(goods_tip);
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: "json",
                    success: function(data) {
                        // 动画效果
                        $("#goods_tip").css({
                            "top": y + "px",
                            "left": x + "px"
                        }).show("fast");
                        $("#goods_tip").addClass("box");
                        setTimeout(function() {
                            $("#goods_tip").remove();
                        }, 1000);
                        getProductList();
                        get_cart_total();
                    }
                });
            });
        })
        </script>
    </div>
</div>

@stop
