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
            <span class="now">我的廿一客</span>
            <input type="hidden" id="isCakeList" value="我的廿一客">
        </div>
        <div class="member-area">
            <!--个人信息部分-->
            <div class="account-area clearfix">
                <div class="edit_info">
                    <div class="avator-area">
                        <form id="uploadForm" action="/member-edit_portrait.html" enctype="multipart/form-data" target="uploadIframe" method="post">
                            <div class="avator-img">
                                <img class="hide" id="avator_img">
                                <input type="hidden" name="avator_member_id" value="12077851">
                                <input type="hidden" name="vkey" id="vkeyInput" value="">
                                <iframe src="about:blank" name="uploadIframe" id="uploadIframe" style="display:none"></iframe>
                                <a id="edit_avator_link" href="javascript:void(0)" class="set-avator-link ">
                                    <div class="avator-bg"><img class="change_head" style="display: none"></div>
                                </a>
                            </div>
                            <span id="upload_file_show_error"></span>
                            <input type="file" style="opacity:0;height:31px;filter:alpha(opacity=0);width:72px;position:relative;top:-35px;" name="headportrait" id="fileField">
                        </form>
                    </div>
                    <div class="account-mes">
                        <div class="ac-name">
                            <p><span class="acc-name-unset">
               姓名：未填写
               </span></p>
                        </div>
                        <p class="ac-num"><span>15504628304</span>
                            <a id="edit_security" href="/member-security.html">
              修改密码            </a>
                            <!--<a href="/member-setting.html">[更改]</a>-->
                        </p>
                        <a href="/member-setting.html">
                            <div class="ac-editinfo" id="ac-editinfo">
                                <i class="edit_ico"></i> 编辑个人资料
                            </div>
                        </a>
                        <a href="/member-receiver.html">
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
        </div>
    </div>
</div>
@endsection