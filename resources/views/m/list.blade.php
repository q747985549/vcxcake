@extends('m.base')
@section('title','蛋糕列表')
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
.pagination>li.active>a,
.pagination>li.active>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #8e6a55;
    text-decoration: none;
    background-color: #ababab;
    border: 1px solid #ddd;
}
.popup-container {
    display: none;
}
</style>
<div class="full-screen">
    <header>
        <div class="a-bar">
            <a href="javascript:history.back()" class="a-back">
                <img alt="返回" src="{{asset('img/btn_back.gif')}}">
            </a>
            <div class="a-name">
                默认分类 
            </div>
        </div>
    </header>
    <div class="pt-gallery">
        <div class="tab J-tab">
            <ul class="pt-list">
            @foreach($list as $v)
                <li class="pt-h-item c-fix">
                    <a href="{{murl('detail/'.$v['id'])}}" class="pt-h-link">
                        <div href="{{murl('detail/'.$v['id'])}}" class="pt-h-img"><img src="{{url('files/getimg/'.$v['img'])}}"></div>
                        <div class="pt-h-info">
                            <div class="pt-h-name">
                                {{$v['title']}} 
                            </div>
                            <div class="pt-h-price price">
                                ￥{{$v['price']}}
                            </div>
                            <p class="pt-h-size">
                                / <em>1磅</em>
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
            </ul>
            {{$list->links()}}
        </div>
    </div>
</div>
@endsection
