@extends('base')
@section('title','购物车')
@section('content')

<div id="container" class="page-container clearfix">
    <div class="inner-wrap mycartpage">
        <div class="bread-crumbs">
        </div>
        <div id="main">
            
            <div class="cart-title">
                <h1>
            <i class="icon">&lt;</i>购物车        </h1>
            </div>
            
            <div id="cart_steps" class="steps">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td class="step-item step-1 active"><span><q class="icon-1">购物车</q></span></td>
                            <td class="icon step-arrow">(</td>
                            <td class="step-item step-2">
                                <a href="/cart-checkout.html">
                                    <q class="icon-2">填写和提交订单信息</q>
                                </a>
                            </td>
                            <td class="icon step-arrow">(</td>
                            <td class="step-item step-3"><span><q class="icon-3">成功提交订单</q></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div id="cart_container" class="cart-container">
                <div class="title">
                    <h2>我的购物车</h2></div>
                <form action="/cart-_check_checkout.html" method="post">
                    
                    <table id="cart_main" class="cart-main" width="100%">
                        <colgroup>
                            <col class="col-1">
                            <col class="col-2">
                            <col class="col-3">
                            <col class="col-4">
                            <col class="col-5">
                            <col class="col-6">
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="2">商品</th>
                                <th>属性</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>小计</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        
                        
                        <tbody class="cart-item">
                            @foreach($list as $v)
                            <tr class="cart-product last" @if(!$loop->last)style="border-bottom: 1px solid #e0e0e0;" @endif>
                                <td>
                                    <div class="p-pic">
                                        <a href="{{url('/detail/'.$v['cake_id'])}}" target="_blank"><img src="{{url('files/getimg',$v['img'])}}" alt="{{$v['cake_title']}}"></a>
                                    </div>
                                </td>
                                <td class="p-info">
                                    <div class="p-title">
                                        <a target="_blank" href="{{url('/detail/'.$v['cake_id'])}}">{{$v['cake_title']}}</a>
                                    </div>
                                    
                                    <div class="p-spec">磅数：{{$v['weight']}}磅</div>
                                    
                                    
                                    <div class="p-promotion">
                                        <ul>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div>{{$v['weight']}}磅</div>
                                    <div class="zs">
                                        <span style="background:#8c6a52; color:#fff; padding:0 4px; margin-right:5px;">标配</span>餐具套装1套 </div>
                                </td>
                                <td class="p-price">￥{{$v['price']}}</td>
                                <td>
                                    <div class="p-quantity">
                                        
                                        <!-- <a href="javascript:void(0);" class="btn-decrease">-</a> -->
                                        <input type="text" readonly="true" value="{{$v['num']}}">
                                        <!-- <a href="javascript:void(0);" class="btn-increase">+</a> -->
                                    </div>
                                </td>
                                
                                
                                <td class="p-subtotal">￥<span>{{$v['price'] * $v['weight'] * $v['num']}}</span></td>
                                
                                <td class="p-action">
                                    <a href="javascript:void(0);" productid="6122" data-id="{{$v['id']}}" class="btn-delete">移除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <script>
                            $(".btn-delete").click(function(){
                                var e = this;
                                $.get("{{url('/user/del_cart')}}"+"/"+$(this).attr('data-id'),function(a){
                                    $(e).parent().parent().remove();
                                });
                            });
                        </script>
                        
                        
                      
                        <tfoot>
                            
                            <tr>
                                <td colspan="8">
                                    <div class="onsale-area clearfix">
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="hr-bg">
                                <td colspan="3">
                                    
                                </td>
                                
                                <td colspan="4" class="order-price" id="order_price">
                                    <ul>
                                        <li class="goods">
                                            <span class="label">
                <span style="color:#D1BDAB" class="cart_number">(共 <span class="op-cart-number">1</span> 件)</span>
                                            <em>商品金额：</em>
                                            </span>
                                            <span class="price"><b>￥498.0</b></span>
                                        </li>
                                        <li class="cost">
                                            <span class="label">
                <em>配送费：</em>
            </span>
                                            <span class="price"><span class="ico">¥ </span><b>{{$s['send_fee']}}</b></span>
                                        </li>
                                        <li class="total">
                                            <span class="label">
                
                
                                            <em>总计金额：</em>
                                            </span>
                                            <span class="price"><span class="ico">¥</span><b>498</b></span>
                                        </li>
                                        <script>
                                            var total = 0,num = 0;
                                            $(".p-subtotal span").each(function(){
                                                total += parseFloat($(this).html());
                                            });
                                            $(".p-quantity input").each(function(){
                                                num += parseInt($(this).val());
                                            })
                                            $(".op-cart-number").html(num);
                                            $(".goods .price").html(total);
                                            $(".total b").html(total + {{$s['send_fee']}})
                                        </script>
                                      
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                
                                <td colspan="3" class="cart-left">
                                </td>
                                <td colspan="4" class="cart-right">
                                    <a href="{{url('list/1')}}" class="btn-link" id="IDcartgobuy">继续购物</a>
                                    <button type="button" id="IDsettle" class="btn btn-import btn-huge action-settle" onclick="go_cart2();"><span><span>下单结算<q class="f-icon">►</q></span></span>
                                    </button>
                                    <script>
                                        function go_cart2(){
                                            location.href="{{url('/user/go_order')}}"
                                        }
                                    </script>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                
            </div>
            
        
        </div>
    </div>
    <div class="hu-cart-more">
        <span class="recommend">热销新品推荐</span>
        <ul class="goods-list">
        @foreach($hot as $h)
            <li class="goods-item">
                <div class="goods-pic">
                    <a href="{{url('detail/'.$h['id'])}}"><img src="{{url('files/getimg/'.$h['img'])}}"></a>
                </div>
                <div class="goods-explain">
                    <p class="goods-name">
                        <a href="{{url('detail/'.$h['id'])}}" title="{{$h['title']}}">{{$h['title']}}</a>
                    </p>
                    <div class="goods-price">
                        <p class="price-args">￥{{$h['price']}}
                        </p>
                        <div class="goods-addcart"><span><a href="{{url('detail/'.$h['id'])}}" target="_blank">查看详情</span></div>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    
@endsection
