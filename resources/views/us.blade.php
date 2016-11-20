@extends('base')
@section('title','品牌故事')
@section('content')
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