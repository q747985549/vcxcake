@extends('m.base')
@section('title','蛋糕列表')
@section('footer','none')
@section('content')

<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="javascript:history.back()" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                小切块-布朗尼 </div>
        </div>
    </header>
    <div class="g-doc f-dn" style="display: block;">
        <div class="g-bd f-cb">
            <form action="/cart-add-goods.html" method="post" id="buy_form" data-type="ajax">
                <input type="hidden" name="goods_id" value="{{$info['id']}}">
                <input type="hidden" name="weight" value="{{$info['weight_arr'][0]}}">
                <div class="m-baer f-oh">
                    <!-- 商品图片 -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        @foreach($info['imgs'] as $v )
                            <div class="swiper-slide">
                                <span class="u-img f-db">
                                    <img src="{{url('files/getimg/'.$v)}}" />
                                 </span>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <script type="text/javascript" src="{{asset('js/swiper.min.js')}}"></script>
                    <script type="text/javascript">
                    function select_weight($weight,e){
                        $('[name=weight]').val($weight);
                        $(".join10 li").removeClass('z-sel');
                        $(e).closest('li').addClass('z-sel');
                        var total = {{$info['price']}} * $weight;
                        $("#total").html(total);
                    }
                    ;
                    (function() {
                        $(window).on('load', function() {

                            $(".J_button").click(function(){
                                $.post("{{url('addcart')}}",{
                                    id:$('[name=goods_id]').val(),
                                    weight:$("[name=weight]").val(),
                                    num:1,
                                    _token:"{{csrf_token()}}"
                                },function(a){
                                    if(a == 1){
                                        layer.msg('添加成功！');
                                        $(".layui-layer").css('z-index',9999999999999);
                                    }else{
                                        layer.msg(a);
                                        $(".layui-layer").css('z-index',9999999999999);
                                    }
                                });
                            });
                            
                            if ($('.swiper-container .swiper-slide').length > 1) {
                                var poswiper = new Swiper('.swiper-container', {
                                    autoplay: 2500, //可选选项，自动滑动
                                    loop: true,
                                    speed: 800,
                                    autoHeight: true, //高度随内容变化
                                    spaceBetween: 0,
                                    //setWrapperSize :true,
                                    autoplayDisableOnInteraction: false,
                                    onInit: function(poswiper) {
                                        // 初始化
                                    },
                                    onSlideChangeEnd: function(poswiper) {
                                        // 滑块切换结束
                                    }
                                });
                            }
                        })
                    })();
                    </script>
                </div>
                <div class="m-prdesc">
                    <h3 class="tit f-fwn">
                        <strong class="f-db">{{$info['title']}}</strong>
                    </h3>
                   <!--  <div class="pono">
                        {!!$info['description']!!}                    
                    </div> -->
                </div>
                <div class="m-specs">
                    <ul class="f-cb join10">
                        @foreach($info['weight_arr'] as $v)
                            <li class="f-fl f-pr @if($loop->first)z-sel @endif" style="width: {{92 / count($info['weight_arr'])}}%;"><i class="f-dib f-pa"></i><a href="javascript:void(0);" onclick="select_weight({{$v}},this)">{{$v}}磅</a></li>
                        @endforeach
                    </ul>
                    <div class="ouit ouit-normal f-oh">
                        <strong class="f-db f-fwn price">￥{{$info['price']}}</strong>
                        <span class="u-img u-specpic f-db">
                            <!-- <img src="{{asset('img/u-none.png')}}" alt="" style="display: none;"> -->
                        </span>
                        <p class="f-cb p p-1">
                            <span class="f-fl"><i class="f-dib ai ai-1 f-fl"></i> <span class="prosmfo">{{$info['size']}}</span></span>
                            <span class="f-fr"><i class="f-dib ai ai-2 f-fl"></i> <span class="prosmfo">{{$info['person']}}</span></span>
                        </p>
                        <p class="f-cb p p-1">
                            <span class="f-fl"><i class="f-dib ai ai-3 f-fl"></i> <span class="prosmfo">{{$info['present']}}</span></span>
                            <span class="f-fr"><i class="f-dib ai ai-4 f-fl"></i> 需提前<span class="prosmfo">{{$info['wait_time']}}</span>小时预订</span>
                        </p>
                    </div>
                    <div class="ouit ouit-more f-oh f-dn">
                        <span class="u-img f-db">
                        <!-- <img src="/public/21cake-themes/wap_themes/images/u-none.png" alt=""> -->
                    </span>
                        <p class="f-cb f-tac p p-2">订购更多磅数的蛋糕</p>
                        <p class="f-cb f-tac p p-2">请客服人员联系</p>
                    </div>
                </div>
                <div class="m-dliace">
                    <ol class="f-oh">
                        <li>
                            <!-- 商品配送时间说明区 -->
                            <span class="f-db f-fl">
                                <i class="f-dib ai ai-1 f-fl"></i> 配送时间
                            </span>
                            <div class="txt f-fl">
                                <p>现在订购最早<strong class="f-fwn">明天&nbsp;09:30</strong>配送。</p>
                                <p>每日最晚配送时间<strong class="f-fwn">22:00</strong>。</p>
                            </div>
                        </li>
                        <li>
                            <span class="f-db f-fl">
                            <i class="f-dib ai ai-2 f-fl"></i> 保鲜条件
                        </span>
                            <div class="txt f-fl">
                                <p>收到后2-3小时内食用最佳。</p>
                                <p class="f-oh">
                                    0-4℃保藏12小时，15℃食用为佳 </p>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="m-custxt">
                        {!!$info['description']!!}                    
                </div>
                <div class="m-custxt">
                    {!!$info['content']!!} 
                </div>
                <div class="m-stalist">
                    <ol class="f-oh">
                        <li>
                            <span class="f-db">
                            <i class="f-dib ai ai-1 f-fl"></i> 参考建议
                        </span>
                            <div class="txt">
                                @if(!empty($info['tiandu']))
                                <p class="f-oh">
                                    甜度：<span class="lets">@for($i=0;$i<$info['tiandu'];$i++)★@endfor
                                    @for($i=0;$i< 5-$info['tiandu'];$i++)☆@endfor</span>
                                </p>
                                @endif

                                @if(!empty($info['tiandu']))
                                <p class="f-oh">
                                    适合人群：{{$info['renqun']}} 
                                </p>
                                @endif
                                
                                <p class="f-oh">
                                    所属分类：{{$cate_name}}
                                </p>
                            
                                @if(!empty($info['jieri']))
                                <p class="f-oh">
                                    适合节日：{{$info['jieri']}} 
                                </p>
                                @endif
                                @if(!empty($info['dangaocate']))
                                <p class="f-oh">
                                    蛋糕分类：{{$info['dangaocate']}} 
                                </p>
                                @endif

                                 @if(!empty($info['dangaocate']))
                                <p class="f-oh">
                                    蛋糕分类：{{$info['dangaocate']}} 
                                </p>
                                @endif
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="pt-btn fixed fixed_bottom" style="bottom:0;">
                    <a href="#" class="btn J_button" request_data="0" id="J_buy_btn"><span class="f-dib">加入购物车<em class="f-fr">（￥<span id="total">{{$info['weight_arr'][0] * $info['price']}}</span>）</em></span></a>
                    <div class="customertel" style="display: none">
                        <p>订购更多磅数的蛋糕,请与客服人员联系。</p><a class="kefutel" href="tel:400-650-2121"><i></i></a>
                    </div>
                    <a href="tel:400-650-2121" class="btn u-telbtn J_button f-tac" id="J_tel_btn" style="display:none;">
                        <span class="f-dib"><i class="ai ai-1 f-db f-fl"></i>联系客服</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
