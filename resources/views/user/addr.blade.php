@extends('base')
@section('title','收货地址')
@section('content')
<link href="{{asset('css/member-center.css')}}" rel="stylesheet" />
<style>
    .on {
    display: inline-block;
    background-color: #E39F2C;
    padding-left: 5px;
    padding-right: 5px;
    color: white;
    margin-right: 5px;
</style>
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
                <a href="/" alt="" title="">首页</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span>
                <a href="http://www.21cake.com/member.html" alt="" title="">我的廿一客</a>
            </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">收货地址</span>
            <input type="hidden" id="isCakeList" value="收货地址">
        </div>
        <div class="member-area">
            <!-- 会员中心主内容区 -->
            <div class="page-article">
                <!-- 我的订单 -->
                <div id="member_address" class="member-address">
                    <div id="member_address_title" class="member-title">
                        <h2 class="address-prompt"><b>已有<i class="warn">{{count($list)}}</i>
                    收货地址</b> <span class="small">(最多添加10个收货地址)</span></h2>
                        <div class="address-actions">
                            <button type="button" class="btn btn-simple action-add-address">
                                <span><span>添加收货地址<i class="icon">6</i></span></span>
                            </button>
                        </div>
                    </div>
                    <!-- 修改收货地址 -->
                    <div id="member_address_submit" class="member-address-submit">
                        <form action="{{url('user/add_address')}}" method="post" class="form-handling" id="member_address_form">
                        {{csrf_field()}}

                            <input type="hidden" value="" name="id">
                            <input type="hidden" value="put" name="_method">
                            <ul>
                                <li class="form-item">
                                    <label for="" class="form-label"><em class="text-warn">*</em>详细地址：</label>
                                    <span class="form-act">
                <span class="hide"></span>
                                    <input type="text" name="address" value="" id="" placeholder="详细地址" size="50" class="x-input action-fill-area" vtype="required">
                                    </span>
                                </li>
                                <li class="form-item">
                                    <label for="" class="form-label"><em class="text-warn">*</em>收货人姓名：</label>
                                    <span class="form-act">
                <input type="text" name="name" id="" value="" placeholder="收货人姓名" class="x-input" vtype="required">
            </span>
                                </li>
                                <li class="form-item">
                                    <label for="" class="form-label"><em class="text-warn">*</em>手机：</label>
                                    <span class="form-act">
                <input type="text" name="mobile" value="" id="" placeholder="手机号码" class="x-input" vtype="requiredone">
                                    </span>
                                </li>
                                <li class="form-item">
                                    <label for="" class="form-label"></label>
                                    <span class="form-act">
                                        <input type="checkbox" name="default" value="1" id="for_set_default">
                                        <label for="for_set_default">设为默认</label>
                                    </span>
                                </li>
                                <li class="form-item last">
                                    <label for="" class="form-label"></label>
                                    <span class="form-act">
                <button type="submit" class="btn btn-caution" rel="_request"><span><span>确定</span></span>
                                    </button>
                                    <button type="button" class="btn btn-simple action-reset"><span><span>取消</span></span>
                                    </button>
                                    </span>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <!-- 收货地址列表 -->
                    <div id="member_address_list" class="member-address-list">
                        <table class="member-grid">
                            <thead>
                                <tr>
                                    <th>地址</th>
                                    <th>收货人</th>
                                    <th>联系电话</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody class="first">
                            @foreach($list as $v)
                                <tr class=" first">
                                    <td class="shipping-address" style="text-align: center;">{{$v['address']}}</td>
                                    <td class="shipping-name">{{$v['name']}}</td>
                                    <td class="shipping-contact">{{$v['mobile']}}</td>
                                    <td class="actions">
                                        <span class="edit-text">正在编辑...</span>
                                        <span class="edit-act">
                                            @if($v['default'] == 0)
                                            <a href="javascript:void(0);" class="action-set-default" data-id="{{$v['id']}}">设为默认</a>
                                            @else
                                            <span class="label-default on" style="display: inline-block;">默认地址</span>
                                            @endif
                                            <a href="javascript:void(0);" class="action-edit" data-id="{{$v['id']}}">编辑</a>
                                            <a href="javascript:void(0);" class="action-delete" data-id="{{$v['id']}}">删除</a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            <script>
                            var dialog = $("#member_address_submit");
                                $(".action-set-default").click(function(){
                                    var id = $(this).attr('data-id');
                                    $.get("{{url('user/addr_setd')}}/"+id,function(){
                                        layer.msg('修改成功');
                                        location.reload();
                                    });
                                });
                                $(".action-edit").click(function(){
                                    var id = $(this).attr('data-id');
                                    $.getJSON("{{url('user/addr_get')}}/"+id,function(data){
                                        tanchu(data);
                                    });
                                });
                                $(".action-delete").click(function(){
                                    var id = $(this).attr('data-id');
                                    $.getJSON("{{url('user/addr_del')}}/"+id,function(data){
                                        layer.msg('删除成功');
                                        location.reload();
                                    });
                                });
                                
                                $(".action-add-address").click(function(){
                                    tanchu();
                                });
                                $(".action-reset").click(function(){
                                    dialog.hide();
                                });
                                function tanchu(data){
                                    if(data){
                                        dialog.find("[name=address]").val(data.address);
                                        dialog.find("[name=name]").val(data.name);
                                        dialog.find("[name=mobile]").val(data.mobile);
                                        dialog.find("[name=id]").val(data.id);
                                        if(data.default == 1){
                                            dialog.find("[name=default]")[0].checked = true;
                                        }else{
                                            dialog.find("[name=default]")[0].checked = false;
                                        }
                                    }else{
                                        dialog.find("[name=address]").val('');
                                        dialog.find("[name=id]").val(0);
                                        dialog.find("[name=name]").val('');
                                        dialog.find("[name=mobile]").val('');
                                        dialog.find("[name=default]")[0].checked = false;
                                    }
                                    dialog.show();
                                }
                            </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop