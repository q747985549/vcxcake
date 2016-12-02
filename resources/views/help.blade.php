@extends('basenew')
@section('title','帮助中心')
@section('content')
@section('style')
    <link href="{{asset('css/basic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/stylecake.css')}}" rel="stylesheet" />
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
    <link href="{{asset('css/index.css')}}" rel="stylesheet" />
@stop
<div id="container" class="page-container clearfix">
    <div class="inner-wrap">
        <div class="bread-crumbs">
            <span>
            <a href="#" alt="" title="">配送方式</a>
        </span>
            <span>&nbsp;&gt;&nbsp;</span>
            <span class="now">配送范围说明</span>
            <input type="hidden" id="isCakeList" value="配送范围说明">
        </div>
        <div class="art-main">
            <div class="left">
                <dl class="content-list">
                    <dt class="content-title">
                        关于我们 </dt>
                    @foreach($list as $v)
                    @if($v['pid'] == 1)
                    <dd class="node-index content-item">
                        <a href="{{url('help/'.$v['id'])}}" title="{{$v['title']}}">{{$v['title']}}</a>
                    </dd>
                    @endif
                    @endforeach
                </dl>
                <dl class="content-list">
                    <dt class="content-title">
                        配送方式 </dt>
                    @foreach($list as $v)
                    @if($v['pid'] == 2)
                    <dd class="node-index content-item">
                        <a href="{{url('help/'.$v['id'])}}" title="{{$v['title']}}">{{$v['title']}}</a>
                    </dd>
                    @endif
                    @endforeach
                </dl>
                <dl class="content-list">
                    <dt class="content-title">
                        购物指南 </dt>
                   @foreach($list as $v)
                    @if($v['pid'] == 3)
                    <dd class="node-index content-item">
                        <a href="{{url('help/'.$v['id'])}}" title="{{$v['title']}}">{{$v['title']}}</a>
                    </dd>
                    @endif
                    @endforeach
                </dl>
            </div>
            <div class="right">
                <!-- <div class="page-article"> -->
                <div class="mod article-main">
                    <div class="mod-title">
                        <h2>{{$info['title']}}</h2>
                    </div>
                    <div class="mod-content">
                        <p class="article-time">发布日期：{{$info['created_at']}}</p>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        {!!$info['content']!!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection