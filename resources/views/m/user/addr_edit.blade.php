@extends('m.base')
@section('title','编辑收货地址')
@section('content')
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="{{url('m/user/addr_edit')}}" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                编辑收货地址 </div>
        </div>
    </header>
    <div class="address-form">
        <form action="" class="form p_form" method="post" data-type="ajax">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$info['id'] or 0}}">
            <div class="c-g" style="clear:both;">
                <label class="c-l">收货人姓名</label>
                <div class="c">
                    <input type="text" class="text" name="name" value="{{$info['name'] or ''}}" required="required" data-caution="收货人姓名不能为空" style="color:#c6a37c">
                </div>
            </div>
            <div class="c-g">
                <label class="c-l">手机</label>
                <div class="c">
                    <input type="text" class="text" name="mobile" value="{{$info['mobile'] or ''}}" required="required" data-caution="手机不能为空" style="color:#c6a37c">
                </div>
            </div>
            <div class="c-g" style="clear:both;">
                <label class="c-l">详细地址</label>
                <div class="c">
                    <textarea type="text" class="text" name="address" value="{{$info['address'] or ''}}" required="required" data-caution="收获地址不能为空" style="padding-top:11px;color:#c6a37c;width:95%">{{$info['address'] or ''}}</textarea>
                </div>
            </div>
            <div class="c-g-c">
                <input type="hidden" name="default" value="1" id="def_addr_check" checked="checked">
                <label for="def_addr_check" class="jizhu J_J @if(isset($info['default']) and $info['default']) ck @endif">设为默认收货地址</label>
            </div>
            <div class="btn-bar">
                <button type="submit" class="btn sure J_button" rel="_request">保存地址</button>
            </div>
            <script>
                $(function(){
                    $(".J_J").click(function(){
                        if(!$(this).hasClass('ck')){
                            $(this).addClass('ck');
                            $("input[name=default]").val(1);
                        }else if($(this).hasClass('ck')){
                            $(this).removeClass('ck');
                            $("input[name=default]").val(0);
                        }
                    });
                })
            </script>
        </form>
    </div>
</div>
@stop