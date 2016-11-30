@extends('m.base')
@section('title','个人中心')
@section('content')
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="{{url('m/user')}}" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                个人信息
            </div>
        </div>
    </header>
    <form id="personal_info" name="personal_info" method="post" action="">
    {{csrf_field()}}
        <ul class="personal_list">
            <li class="item">
                <label for="name">姓名</label><input class="item_detail" id="name" type="text" not-null="" name="realname" unselectable="" placeholder="请输入姓名" value="{{$user['realname']}}" autofocus="">
            </li>
            <li class="item" id="item-sex">
                <label></label>
                <input type="checkbox" class="check_sex" name="gender" value="1" @if($user['gender'] == 1) checked @endif> 先生
                <input type="checkbox" class="check_sex" name="gender" value="0" @if($user['gender'] == 0) checked @endif> 女士
            </li>

            <li class="item">
                <label for="user_birth">生日</label>
                <input type="date" class="item_detail" style="height: 30px" id="user_birth" name="birthday" data-date-format="Y-M-D" value="{{$user['birthday']}}">
                <i class="arrow_right"></i>
            </li>
            <li style="color: #8e6a55;background: #f9f9f9;padding-left: 10px;height: 40px;line-height: 40px">
                *出生日期保存后不能修改
            </li>
            @foreach($errors->all() as $e)
            {{$e}}
            @endforeach
        </ul>
        <div class="bg">
            <a class="save" id="save" onclick="personal_info.submit();">保存</a>
        </div>
    </form>
</div>
<script>
$(function(){
    $('#item-sex .check_sex[type="checkbox"]').on("change",function () {
        $('#item-sex .check_sex[type="checkbox"]').not(this).prop('checked', false);
    });

    var default_sex= "女" == "男" ? "male" : "female";
    $(".check_sex[name=" + default_sex + "]").attr("checked","checked");
})
</script>
@stop
