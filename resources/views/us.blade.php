@extends('basenew')
@section('title','品牌故事')
@section('content')
@section('style')
    <link href="{{asset('css/basic.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/stylecake.css')}}" rel="stylesheet" />
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" />
    <link href="{{asset('css/index.css')}}" rel="stylesheet" />
@stop
<div id="container" class="page-container clearfix">
  <div class="inner-wrap">
    <div class="bread-crumbs" style="display: none;">
                  <span class="now">品牌故事</span>
            <input type="hidden" id="isCakeList" value="品牌故事">
            </div>
    <script> $j('.bread-crumbs').hide(); $j(function(){ $j('#footer').css({'marginTop':0}) }); </script> <div class="brand-cont"> 
    @foreach(explode(',',$s['imgs']) as $imgid)
<img src="{{url('files/getimg/'.$imgid)}}">

    @endforeach


 </div>  </div>
</div>
@endsection