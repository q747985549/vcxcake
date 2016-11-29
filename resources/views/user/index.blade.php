@extends('base')
@section('title','用户中心')
@section('content')
<link href="{{asset('css/member-center.css')}}" rel="stylesheet" />
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="/" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">我的</span>
        </div>
        <div class="member-area">
            <!--个人信息部分-->
            <div class="account-area clearfix">
                <div class="edit_info">
                    <div class="avator-area">
                        <form id="uploadForm" action="{{url('/files/upload_head')}}" enctype="multipart/form-data" target="uploadIframe" method="post">
                            <div class="avator-img">
                            @if($user['head'])
                                <img id="avator_img" src="{{url('files/getimg/'.$user['head'])}}">
                            @endif
                                {{csrf_field()}}
                                <iframe src="about:blank" name="uploadIframe" id="uploadIframe" style="display:none"></iframe>
                                <a id="edit_avator_link" href="javascript:void(0)" class="set-avator-link ">
                                    <div class="avator-bg"><img class="change_head" style="display: none"></div>
                                </a>
                            </div>
                            <span id="upload_file_show_error"></span>
                            <input type="file" style="opacity:0;height:31px;filter:alpha(opacity=0);width:72px;position:relative;top:-35px;" name="file" id="fileField">
                        </form>
                        <script>
                        $(function(){

                            $(".avator-bg").click(function(){
                                $("#fileField").click();
                            });
                            $("#fileField").change(function(){
                                $("#uploadForm").submit();
                            });
                        })
                        function msg($msg){
                            layer.msg($msg);
                        }

                        </script>
                    </div>
                    <div class="account-mes">
                        <div class="ac-name">
                            <p><span class="acc-name-unset">
               姓名：{{$user['realname'] or "未填写"}}
               </span></p>
                        </div>
                         <p class="ac-num"><span>{{$user['mobile']}}</span>
                             <a id="edit_security" href="{{url('user/password')}}">修改密码</a>
                         </p>
                         <a href="{{url('user/info')}}">
                             <div class="ac-editinfo" id="ac-editinfo">
                                 <i class="edit_ico"></i> 编辑个人资料
                             </div>
                         </a>
                         <a href="{{url('user/address')}}">
                            <div class="ac-editaddress">
                                <i class="edit_address"></i>地址管理
                            </div>
                        </a>
                    </div>
                </div>
                <div class="cash-coupou">
                    <ul>
                        <li class="ac_item">
                            <p>
                                <a href="/member-balance.html">
                                    <i class="ac_balance"></i> 果实币余额: ¥0 </a>
                                <br>
                                <em class="recharge new_r">卡券充值</em>
                                <a href="/member-deposit.html" class="new_r">在线购买果实币</a>
                            </p>
                            <em class="corner"></em>
                        </li>
                        <li class="ac_item">
                            <p>
                                <a href="/member-coupon.html">
                                    <i class="ac_coupon"></i> 优惠券: 0张可用
                                </a>
                            </p>
                            <em class="corner"></em>
                        </li>
                        <li class="ac_item">
                            <p>
                                <a href="/member-cardlist.html">
                                    <i class="ac_card"></i> 代金卡: 0 张已用
                                </a>
                            </p>
                            <em class="corner"></em>
                        </li>
                    </ul>
                </div>

               

            </div>
             <div class="margin-70 member-center">
                   <p class="ca-title">会员中心</p>
                   <p class="current-identity">您当前的身份是：<span class="normal-user">{{$user['level']}}</span></p>
                   <div class="vip-area tl-l level-info">
                     <div class="tl-c">
                       <img class="level-info-img" src="{{url('files/getimg/'.$s['user_level'])}}">
                     </div>
                     <p class="fruit-rule-title">果实规则：</p>
                     <p class="fruit-rule">1、订单实际支付金额每满100元，则将自动获得1颗果实，以此类推。累积果实可升级，并享受各级会员权益。订单中使用优惠券、订单促销等优惠抵扣的金额不参与消费金额的累积。</p>
                     <p class="fruit-rule">2、每90天内未产生购买，果实减一颗，若果实减少为下一等级数量时，等级相应降低，上一级别的固定权益失效。</p>
                     <p class="fruit-rule">3、所获得的权益自获得日起，一年内有效。</p>
                   </div>
                </div>
        </div>
    </div>
</div>
@endsection
