@extends('base')
@section('title','购物车')
@section('content')
<link href="{{asset('css/default.css')}}" rel="stylesheet" />
<link href="{{asset('css/total.css')}}" rel="stylesheet" />
<link href="{{asset('css/checkout.css')}}" rel="stylesheet" />
<link href="{{asset('css/dialog.css')}}" rel="stylesheet" />
<link href="{{asset('css/upgrade_web.css')}}" rel="stylesheet" />
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        
        <div id="main" class="content-area">
            <div class="order-container">
                <form action="/order-create.html" method="post">
                    <div id="order_main" class="order-main">
                        <input type="hidden" id="membercard_is_click" value="false">
                        <h4 class="ca-title">订单信息</h4>
                        <table class="goods-table bill-table">
                            <thead>
                                <tr class="gt-head">
                                    <th style="width:30%;">商品</th>
                                    <th style="width:15%;">属性</th>
                                    <th style="width:15%;">数量</th>
                                    <th style="width:20%;">生日牌</th>
                                    <th style="width:15%;">小计</th>
                                    <th style="width:5%;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="p_list_container">
                            @foreach($list as $v)
                                <tr>
                                    <td class="gt-item gt-item-cake">
                                        <a href="{{url('detail/'.$v['cake_id'])}}" target="_blank" class="gt-cake-item">
                                            <span class="gt-img-container fl-l">
                                                  <img src="{{url('files/getimg/'.$v['img'])}}" alt="Blue Monday 黑越橘">
                                            </span>
                                            <span class="fl-l cake-intro"><span class="cake-intro-inner">{{$v['cake_title']}}</span></span>
                                        </a>
                                    </td>
                                    <td class="gt-item bang-font">
                                        <span class="bang-num">{{$v['weight']}}磅</span>
                                        <br>
                                        <span class="special-mark">标配</span>餐具套装5套
                                    </td>
                                    <td class="gt-item">
                                        <span class="or-num" data-num="3" data-id="19" data-pid="585" data-ident="goods_19_585">
                                              <div class="or-num-num">{{$v['num']}}</div>
                                        </span>
                                    </td>
                                    <td class="gt-item valentxt">
                                        <div class="select-area birth-select brith_card_sel">
                                            <em class="select-ico"></em>
                                            <div class="select-inner input-item brith_card_display">请选择生日牌</div>
                                            <div class="select-ul-area brith_card_list hide">
                                                <ul>
                                                    <li class="brith_card_cancel brith_card_item" productid="585"><span class="sua-item">无</span></li>
                                                    <li class="brith_card_item" productid="585"><span class="sua-item">Happy Birthday</span></li>
                                                    <li class="brith_card_item" productid="585"><span class="sua-item">生日快乐</span></li>
                                                    <li class="brith_card_item" productid="585"><span class="sua-item">节日快乐</span></li>
                                                    <li style="padding:4px;">
                                                        <div class="input-container">
                                                            <input type="text" class="input-item brith_card_input" placeholder="可输入6个汉字或12个字符" style="width:150px;">
                                                        </div>
                                                        <a href="javascript:void(0);" class="btn btn-import brith_card_confirm" productid="585">确定</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="gt-item j_subtotal j_staff_total">￥{{$v['weight'] * $v['price'] * $v['num']}}</td>
                                    <td class="gt-item">
          
                                      <em data-pid="6122" data-obj_ident="goods_297_6122" data-goods_id="297" data-product_id="6122" class="little-close-ico cart_remove_button" style="display: none"></em>
                                      
                                      </td>
                                </tr>
                                @endforeach
                                <script>
                                  $(".brith_card_display").click(function(){
                                    if($(this).next().hasClass('hide')){
                                      $(this).next().removeClass('hide');
                                    }else{
                                      $(this).next().addClass('hide');
                                    }
                                  });
                                  $(".sua-item").click(function(){
                                    var content = $(this).html();
                                    $(this).parent().parent().parent().parent().find('.brith_card_display').html(content);
                                    $(this).parent().parent().parent().parent().find(".brith_card_list").addClass('hide');

                                  });
                                  $(".brith_card_confirm").click(function(){
                                    var content = $(this).prev().find('input').val();
                                    $(this).parent().parent().parent().parent().find('.brith_card_display').html(content);
                                    $(this).parent().parent().parent().parent().find(".brith_card_list").addClass('hide');
                                  });

                                </script>
                            </tbody>
                        </table>
                        <div class="bg-item hide">
                            <div class="goods-price hide">商品金额：<b class="j_total j_staff_total">￥1302.00</b>
                            </div>
                        </div>
                        <input type="hidden" id="isLimit" value="true">
                        <!--商品附件清单-->
                        <div class="onsale-area clearfix">
                            <div class="oa-container">
                                <div class="oa-item oa-item4">
                                    <span class="oa-intro-container" id="leavel_message_container">
                <img class="vl-m" src="{{asset('img/oa-ico-edit.png')}}"><span class="vl-m">留言说明</span>
                                    </span>
                                    <div class="oa-leave-mes-container" style="" id="leave_message_content_container">
                                        <span class="oa-leave-mes">
                <em class="corner"></em>
                <span class="con" id="leave_message_content" width="219px" style="padding-top:0;width:219px;"><input value="" style="background-color: #ffefbf;border: none;width:100%" placeholder="请填写留言" /></span>
                                        </span>
                                        <em class="mes-close-ico" id="leave_message_cancel"></em>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 使用优惠券 -->
                      
                        
                        <div id="order_form">
                            <!-- 收货信息 -->
                            <h4 class="ca-title">送货信息</h4>
                            <div class="account-mes-area clearfix">
                                <div class="clearfix account_address_area aaa_has_no_limit" id="address_container">
                                    <div id="address_item_5679576" class="ama-item address_item">
                                        <p class="ama-name-area"><b class="fl-l">123</b><span class="fl-r">15545996057</span></p>
                                        <p class="address-area">
                                            <span class="area">上海市黄浦区</span>
                                            <span class="address">321</span>
                                        </p>
                                        <div class="clearfix handle-area">
                                            <a href="#" class="ama-edit fl-l addr_edit" data-id="5679576" data-info="{&quot;addr_id&quot;:5679576,&quot;area&quot;:23}">修改</a>
                                            <a href="#" class="ama-delete fl-r addr_del" data-id="5679576" data-info="{&quot;addr_id&quot;:5679576,&quot;area&quot;:23}">删除</a>
                                        </div>
                                    </div>
                                    <div id="address_item_5679574" class="ama-item address_item ama-item-current js_current_address">
                                        <p class="ama-name-area"><b class="fl-l">123</b><span class="fl-r">15545996058</span></p>
                                        <p class="address-area">
                                            <span class="area">上海市卢湾区</span>
                                            <span class="address">111</span>
                                        </p>
                                        <div class="clearfix handle-area">
                                            <a href="#" class="ama-edit fl-l addr_edit" data-id="5679574">修改</a>
                                            <a href="#" class="ama-delete fl-r addr_del" data-id="5679574">删除</a>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="addr-list-toggle-wrap clearfix hide" id="addr_show_more">
                                    <span id="J_addrListToggle"><i class=""></i></span>
                                </div>
                                <div class="ama-add-address">
                                    <a href="#" class="btn" id="add_new_address">+ 添加新地址</a>
                                </div>
                                
                              <div class="vcxdialog" style="display: none;">
                                <div class="dialog" style="width: 520px; z-index: 99999; top: 300px;" id="addr_edit_dialog">
                                    <div class="dialog-head">
                                        <p class="dia-title">
                                            新建收货地址
                                        </p>
                                        <a href="#" class="close-ico close_button">X</a>
                                    </div>
                                    <div class="dialog-con">
                                        <div class="enter-area">
                                            <div class="ea-item clearfix">
                                                <p class="ea-font">
                                                    送货地址：
                                                </p>
                                                <div class="ea-input-area">
                                                    <div class="input-container">
                                                        <input class="x-input input-item addr_input" type="text" name="addr" style="width:380px;" vtype="required" placeholder="详细地址" size="45" data-caution="请填写收货地址" id="dom_el_9473b41">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ea-item clearfix">
                                                <p class="ea-font">
                                                    收货人：
                                                </p>
                                                <div class="ea-input-area">
                                                    <div class="input-container">
                                                        <input class="x-input input-item name_input" type="text" name="name" id="dom_el_9473b42" vtype="required" placeholder="收货人姓名" data-caution="请填写收货人姓名"> <span class="input-error hide">收货人姓名不能空</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ea-item clearfix">
                                                <p class="ea-font">
                                                    手机号码：
                                                </p>
                                                <div class="ea-input-area">
                                                    <div class="input-container">
                                                        <input class="x-input input-item mobile_input" data-reg="is_mobile" type="text" name="mobile" id="dom_el_9473b43" onesecond_vtype="onesecond" vtype="onesecond&amp;&amp;mobile" maxlength="20" data-caution="请填写手机号码或者固定电话" placeholder="手机号码"> <span class="input-error hide">手机号码格式错误</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dialog-foo">
                                        <input type="button" class="btn mid-btn btn-import confirm_button" data-id="" value="确定">
                                        <input type="button" class="btn mid-btn space20 cancel_button" value="取消">
                                     
                                    </div>
                                </div>
                                <div rel="mask" id="addr_mask" class="mask J_height" style="display: block; z-index: 99998; height: 1366px;"></div>
                                </div>
                              </div>

                            <div class="ea-item clearfix">
                                <p class="ea-font">送货时间：</p>
                                <div class="ea-input-area">
                                    <div class="input-container">
                                        <input class="x-input calendar input-item date-ico" maxlength="10" readonly="readonly" id="curr_ship_date" style="width:120px;" name="ship_date" type="text" size="8" value="2016-11-25" >
                                       
                                    </div>
                                    <div class="input-container">
                                        <input type="text" readonly="readonly" class="input-item clock-ico" name="ship_time_scope" placeholder="送货时间" style="width:120px;" id="ship_time_scope">
                                    </div>
                                </div>
                                <div class="ea-input-area" style="color: #383838; margin-left: 10px;line-height: 30px">配送时间受实时路况影响，会有前后15分钟的误差，请各位谅解。</div>
                            </div>
                            <div class="ea-item clearfix js_invoice">
                                <p class="ea-font">
                                    开发票：
                                </p>
                                <div class="ea-input-area">
                                    <input type="checkbox" name="payment[is_tax]" value="true" class="vl-m invoice-checkbox" id="invoice_chk">
                                    <div class="invoice-container hide" id="invoice_container">
                                        <div class="ea-item clearfix">
                                            <div class="ea-input-area">
                                                <label for="person_invoice" id="person_invoice_label">
                                                    <span class="check-item">
                            <input type="radio" id="person_invoice" checked="checked" name="tax_content">
                        </span>个人发票 </label>
                                                <label for="company_invoice" id="company_invoice_label">
                                                    <span class="check-item">
                            <input type="radio" id="company_invoice" name="tax_content">
                        </span>公司发票 </label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="payment[tax_type]" value="false" id="tax_type_hidden">
                                        <div class="ea-item clearfix ie6-for-invoice">
                                            <div class="ea-input-area">
                                                <div class="input-container">
                                                    <input type="text" class="input-item" name="payment[tax_company]" placeholder="请填写发票抬头" id="invoice_title">
                                                    <span class="input-error hide">发票抬头中不能包含“个人”</span>
                                                    <span class="input-error hide" id="invoice_error_tip">发票抬头不能为空</span>
                                                </div>
                                            </div>
                                            <div class="select-area" style="margin-left:10px;">
                                                <select id="invoice_content" class="select-item" name="payment[tax_content]">
                                                    <option value="">选择发票内容</option>
                                                    <option>蛋糕</option>
                                                    <option>食品</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="ca-title">付款信息</h4>
                            <div class="paystyle pay_container" id="pay_container">
                                <ul>
                                    <li class="payment-item selected">
                                        <span class="check-item J_cpt" cod_pay_type="0" style="width:80px;">
            支付宝支付            <input style="display:none" class="p_alipay" value="{&quot;pay_app_id&quot;:&quot;alipay&quot;,&quot;payment_name&quot;:&quot;支付宝支付&quot;}" name="payStyle">
        </span>
                                        <i>
        </i>
                                    </li>
                                    <li class="payment-item">
                                        <span class="check-item J_cpt" cod_pay_type="0" style="width:80px;">
            快钱支付            <input style="display:none" class="p_99bill" value="{&quot;pay_app_id&quot;:&quot;99bill&quot;,&quot;payment_name&quot;:&quot;快钱支付&quot;}" name="payStyle">
        </span>
                                        <i>
        </i>
                                    </li>
                                    <!--暂时用16，17，18号-->
                                    <li class="is_pos payment-item cash" style="display: none;">
                                        <a href="javascript:void(0)" class="tooltip" title="订单金额超过1000暂不支持货到付款,请见谅.">
                                            <span class="check-item J_cpt" cod_pay_type="1" style="width:80px;">
                    货到付现金                    <input style="display:none" value="{&quot;pay_app_id&quot;:&quot;-1&quot;,&quot;payment_name&quot;:&quot;货到付款&quot;}" checked="checked" name="payStyle">
                </span>
                                        </a>
                                        <i>
                </i>
                                    </li>
                                    <!--暂时用16，17，18号-->
                                    <li id="pos_input" class="is_pos payment-item cash" style="display: none;">
                                        <a href="javascript:void(0)" class="tooltip" title="订单金额超过1000暂不支持货到付款,请见谅.">
                                            <span class="check-item J_cpt" cod_pay_type="2" style="width:80px;">
                    货到POS刷卡                    <input style="display:none" value="{&quot;pay_app_id&quot;:&quot;-1&quot;,&quot;payment_name&quot;:&quot;货到付款&quot;}" name="payStyle">
                </span>
                                        </a>
                                        <i>
                </i>
                                    </li>
                                    <li class="payment-more">更多<b></b></li>
                                </ul>
                            </div>
                            <input type="hidden" name="payment[pay_app_id]" value="{&quot;pay_app_id&quot;:&quot;alipay&quot;,&quot;payment_name&quot;:&quot;支付宝支付&quot;}" id="payment_hidden">
                            <input type="hidden" name="payment[payment_name]" value="
        
            支付宝支付            
        
                
        
    " id="payment_name_hidden">
                            <input type="hidden" name="cod_pay_type" value="0" id="cod_pay_type_hidden">
                        </div>
                    </div>
                    <!--订单优惠 -->
                    <div class="order-infor">
                        <div id="order_balance" class="order-balance" style="font-size: 116.66667%;">
                            <h3 style="font-weight: bold;">
        <a href="javascript:void(0);" data-item="balance" class="action-toggle btn-expand" style="margin-right: 10px;">+</a>现金账户余额        <div class="recharge_pay">充值</div>
            </h3>
                            <div class="content" style="display:none;padding-left:30px">
                                <div class="item" style="font-size:12px;margin-bottom:8px">
                                    您当前有 <span id="advance_total" data-total="0.000">￥0.0</span> 可用余额 <span id="use_balance_amount_box">
                        </span>
                                    <div id="balance_ipt_box" style="">
                                        <label for="for_input_balance">支付金额：</label>
                                        <input type="text" name="balance_no" id="for_input_balance" style="border-color:#eee" size="10">
                                        <button type="button" class="btn btn-simple action-confirm-balance" style="vertical-align:middle"><span><span>确定</span></span>
                                        </button> <span>最大支付金额: ￥<em style="color: red;" id="most_balance_amount">1302.00</em></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="order_card" class="order-card" style="font-size: 116.66667%;">
                            <h3 style="font-weight: bold;">
        <a data-item="card" href="javascript:void(0);" class="action-toggle btn-expand" style="margin-right: 10px;">+</a>使用代金卡<span style="font-weight: normal" ;="">（此卡不能与优惠券同时使用）</span>
    </h3>
                            <div class="content" style="display:none;padding-left:30px;font-size:12px;">
                                <!-- <p>使用说明：</p>
        <p>1.代金卡可多张同时使用在一个订单上</p>
        <p>2.代金卡总额超出订单部分的余额作废处理，不会作为余额存放到账户里或者兑换现金</p> -->
                                <div class="item" style="font-size:12px;margin-bottom:8px">
                                    <label for="">卡号：</label>
                                    <input type="text" name="card_no" id="for_input_card" style="border-color:#eee" size="22">
                                    <label for="">密码：</label>
                                    <input type="text" name="card_pwd" id="for_input_card_pwd" style="border-color:#eee; vertical-align:middle" size="22" onfocus="this.type='password'">
                                    <button type="button" class="btn btn-simple action-confirm-card" style="vertical-align:middle"><span><span>确定</span></span>
                                    </button>
                                    <div style="color:#666; padding-top:6px;">
                                        提示：一个订单可以使用多张代金卡，代金卡抵扣金额超出订单金额部分作废处理，不兑换现金
                                    </div>
                                </div>
                                <div class="used clearfix" id="card_used" style="font-size:12px;margin-top:;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-item clearfix" id="order_total_display" data-real-total-amount="1,302.00" data-balance-amount="0">
                        <div class="total-money fl-r">
                            <p><em>商品总计：</em><b class="order_total"><span>¥</span><span id="order_total">1302.0</span></b></p>
                            <p id="shipping_fee_display"><em>配送费：</em><b><span>¥</span><span id="shipping_fee">0.0</span></b></p>
                            <p class="total-p"><em>您总共需要支付</em><b class="order_total" id="final_total"><span>¥</span><span id="total">1302.0</span></b></p>
                            <p class="post-explain" id="notice">订单已满￥100元,享免费配送服务</p>
                        </div>
                    </div>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <span class="message hide">未包含运费</span>
                    <div class="tl-r sub-form clearfix">
                        <a href="/cart.html" id="IDgobackcart" class="btn-link btn big-btn fl-l">返回购物车</a>
                        <span class="vl-m">请确认信息无误后下单  </span>
                        <button type="submit" id="IDsubmitorder" rel="_request" class="btn btn big-btn btn-import action-submit-order"><span><span>提交订单</span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- 现金账户余额充值 -->
    </div>
</div>
@endsection
