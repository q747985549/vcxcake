@extends('base')
@section('title','首页')
@section('content')
    <div id="slider" class="inpic-tab">
        <div class="main-slide" style="">
            <div class="prev" style="display: none;">prev</div>
            <div class="next" style="display: none;">next</div>
            <ul class="slide-list switchable-content">
               @foreach($banner as $b)
                <li class="slide-item active" style="display: block; opacity: 0.981014;">
                    <a target="_blank" href="{{url('detail/1')}}" id="IDmain">
                        <img src="{{url('files/getimg/'.$b['img'])}}">
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="slide-triggers switchable-triggerBox">
            @foreach($banner as $b)
                <span class="trigger-item">{{$loop->index + 1}}</span>
            @endforeach
            </div>
        </div>
        <!-- 大banner -->
        @if(count($banner) != 1)
        <script type="text/javascript">
            var parent = $('.main-slide');
            var first_delay = jQuery("#first_pic_delay").val() || 3000;
            var t = setTimeout("visualShow()", first_delay);
            var tnum = 0;
            
            $j(document).ready(function() {
                parent.find("img").each(function() {
                    $j(this).attr('src', $j(this).data('img'));

                });
                var trigger_item = parent.find(".trigger-item");
                trigger_item.each(function(index) {
                    trigger_item.eq(index).mouseenter(function() {
                        t = clearTimeout(t);
                        tnum = index;
                        setDesign();
                    });
                });
                trigger_item.mouseleave(function() {
                    t = setTimeout("visualShow()", 3000);
                });
                parent.find(".prev").click(function() {
                    if (tnum > 0) {
                        tnum--;
                    } else {
                        tnum = parent.find(".trigger-item").length - 1;
                    }
                    setDesign();
                });
                parent.find(".next").click(function() {
                    if (tnum < parent.find(".trigger-item").length - 1) {
                        tnum++;
                    } else {
                        tnum = 0;
                    }
                    setDesign();
                });
                $j(".inpic-tab").mouseenter(function() {
                    parent.find(".prev,.next").show();
                });
                $j(".inpic-tab").mouseleave(function() {
                    parent.find(".prev,.next").hide();
                });
                parent.find(".prev,.next").hover(function() {
                    t = clearTimeout(t);
                }, function() {
                    t = setTimeout("visualShow()", 3000);
                });

                parent.show();
            });

            function visualShow() {
                if (tnum < parent.find(".trigger-item").length - 1) {
                    tnum++;
                } else {
                    tnum = 0;
                }
                setDesign();
                main_delay = jQuery("#main_slide_delay").val() || 5000;
                t = setTimeout("visualShow()", main_delay);
            }

            function setDesign(target) {
                parent.find(".slide-item").stop(false, true).fadeOut(1000);
                parent.find(".slide-item").eq(tnum).stop(true, true).fadeIn(1000);
                parent.find(".trigger-item").removeClass("active");
                parent.find(".trigger-item").eq(tnum).addClass("active");
            }
        </script>
        @endif
        <!-- 小banner -->
        <script>
            $(function() {
                $(".title-banner").hover(function(){
                    $(this).find('.title').slideDown(300);
                },function(){
                    $(this).find('.title').slideUp(300);
                });
            });
        </script>
    </div>
    <div class="indexgoods clearfix" style="z-index:1;">
        <div class="align-center-index" style="display:inline-block;overflow:hidden">
            @foreach($hot as $h)
            <div class="title-banner">
                <div class="banner">
                    <a target="_blank" href="{{url('detail/'.$h['id'])}}">
                        <span class="title">{{$h['title']}}</span>
                        <img alt="百利甜情人" src="{{url('files/getimg/'.$h['img'])}}">
                    </a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
@endsection