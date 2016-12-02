@extends('basenew')
@section('title','首页')
@section('content')
	<style>
		body{
	        background-color: #F9F9F8;
			
		}
	</style>
 <script>
    $(document).ready(function(e) {


     


        var product_irow = 0;
        $(".index_cpfl_img_div ").mouseover(function() {

       
            if ($(this).attr("row") != $(".product_0").attr("row") && product_irow == 0) {
                product_irow = 1;

                $(".index_cpfl_img_div ").children('.index_fwly_img_div2 ').css("opacity", "1");

                $(this).children('.index_fwly_img_div2 ').animate({
                    opacity: '0'
                }, 300);


                $(".product_0").attr("row2", $(this).attr("row"))
                $(".product_" + $(this).attr("row") + " ").css("z-index", "2");
                $(".product_" + $(this).attr("row") + " ").animate({
                    opacity: '1'
                }, 300, function() {

                    $(".product_" + $(".product_0").attr("row") + " ").css("z-index", "0");
                    $(".product_" + $(".product_0").attr("row") + " ").css("opacity", "0.3");
                    $(".product_" + $(".product_0").attr("row2") + " ").css("z-index", "1");
                    $(".product_0").attr("row", $(".product_0").attr("row2"))

                    //alert($(this).attr("row"));

                    product_irow = 0;

                });
            }




        });
        /*	$(".index_cpfl_img_div ").mouseout(function(){
        		$(this).children('.index_fwly_img_div2 ').animate({opacity:'1'},300);
        	});*/



        $(".index_product_img_div ").mouseover(function() {
            $(this).children('.index_product_img_div3 ').animate({
                opacity: '1'
            }, 300);

        });
        $(".index_product_img_div ").mouseout(function() {
            $(this).children('.index_product_img_div3 ').animate({
                opacity: '0'
            }, 300);
        });
    });
    </script>
    <script>
    $(document).ready(function(e) {
        $(window).scroll(function() {
            //alert($(window).scrollTop())
            if ($(window).scrollTop() > 10) {
                $("#top_logo").stop();
                $("#top_logo").animate({
                    height: '60'
                });
            } else {
                $("#top_logo").stop();
                $("#top_logo").animate({
                    height: '99'
                });
            }
        });
    });
    </script>
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new/css/custom.css')}}" />
    <script type="text/javascript" src="{{asset('new/js/modernizr.custom.79639.js')}}"></script>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:10px">
        <tr>
            <td class="container demo-2">
                <div id="slider" class="sl-slider-wrapper" style="height:550px; width:100%">
                    <div class="sl-slider">
                    @foreach($b1 as $b)
                        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                            <div class="sl-slide-inner">
                                <a href="{{$b['href']}}">
                                	<!-- <img src=""> -->
                                    <div class="bg-img" style="background-image: url({{url('files/getimg/'.$b['img'])}});">

                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <!-- /sl-slider -->
                    <nav id="nav-dots" class="nav-dots">
                    @foreach($b1 as $b)
                        <span @if($loop->first) class="nav-dot-current" @endif></span>
                    @endforeach
                    </nav>
                </div>
                <script type="text/javascript" src="{{asset('new/js/jquery-1.8.3.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('new/js/jquery.ba-cond.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('new/js/jquery.slitslider.js')}}"></script>
                <script type="text/javascript">
                $(function() {

                    var Page = (function() {

                        var $nav = $('#nav-dots > span'),
                            slitslider = $('#slider').slitslider({
                                onBeforeChange: function(slide, pos) {

                                    $nav.removeClass('nav-dot-current');
                                    $nav.eq(pos).addClass('nav-dot-current');

                                }
                            }),

                            init = function() {

                                initEvents();

                            },
                            initEvents = function() {

                                $nav.each(function(i) {

                                    $(this).on('click', function(event) {

                                        var $dot = $(this);

                                        if (!slitslider.isActive()) {

                                            $nav.removeClass('nav-dot-current');
                                            $dot.addClass('nav-dot-current');

                                        }

                                        slitslider.jump(i + 1);
                                        return false;

                                    });

                                });

                            };

                        return {
                            init: init
                        };

                    })();

                    Page.init();

                    /**
                     * Notes: 
                     * 
                     * example how to add items:
                     */

                    /*
		
                    var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
		
                    // call the plugin's add method
                    ss.add($items);

                    */

                });
                </script>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="30" background=""></td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:30px;">
        <tr>
            <td height="50" align="center"><img src="{{asset('new/images/index_01.gif')}}" width="115" height="28"></td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="42">
                            <a href="gsqyflgwfw.asp" target="_blank">
                                <div style="height:42px; width:42px; overflow:hidden;position:relative;" class="index_cpfl_img_div" row="1"><img src="{{asset('new/images/index_02.gif')}}" width="42" height="84" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/images/index_02.gif')}}" width="42" height="84" border="0" style="position:absolute;left:0px; top:-42px;z-index:1;"></div>
                            </a>
                        </td>
                        <td width="20" align="center"></td>
                        <td width="42">
                            <a href="gsqyflgwfw.asp" target="_blank">
                                <div style="height:42px; width:42px; overflow:hidden;position:relative;" class="index_cpfl_img_div" row="2"><img src="{{asset('new/images/index_03.gif')}}" width="42" height="84" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/images/index_03.gif')}}" width="42" height="84" border="0" style="position:absolute;left:0px; top:-42px;z-index:1;"></div>
                            </a>
                        </td>
                        <td width="20" align="center"></td>
                        <td width="42">
                            <a href="gsqyflgwfw.asp" target="_blank">
                                <div style="height:42px; width:42px; overflow:hidden;position:relative;" class="index_cpfl_img_div" row="3"><img src="{{asset('new/images/index_04.gif')}}" width="42" height="84" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/images/index_04.gif')}}" width="42" height="84" border="0" style="position:absolute;left:0px; top:-42px;z-index:1;"></div>
                            </a>
                        </td>
                        <td width="20" align="center"></td>
                        <td width="42">
                            <a href="gsqyflgwfw.asp" target="_blank">
                                <div style="height:42px; width:42px; overflow:hidden;position:relative;" class="index_cpfl_img_div" row="4"><img src="{{asset('new/images/index_05.gif')}}" width="42" height="84" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/images/index_05.gif')}}" width="42" height="84" border="0" style="position:absolute;left:0px; top:-42px;z-index:1;"></div>
                            </a>
                        </td>
                        <td width="20" align="center"></td>
                        <td width="42">
                            <a href="gsqyflgwfw.asp" target="_blank">
                                <div style="height:42px; width:42px; overflow:hidden;position:relative;" class="index_cpfl_img_div" row="5"><img src="{{asset('new/images/index_06.gif')}}" width="42" height="84" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_fwly_img_div2"><img src="{{asset('new/images/index_06.gif')}}" width="42" height="84" border="0" style="position:absolute;left:0px; top:-42px;z-index:1;"></div>
                            </a>
                        </td>
                        <td width="20" align="center"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="1030" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:50px;">
        <tr>
              

            <td>
                <div style="overflow:hidden;position:relative; height:290px;" row="1" row2="1" class="product_0">
                  @foreach($b2 as $harr)
                    <div class="product_{{$loop->index + 1}}" style="position:absolute;left:0px; top:0px;z-index:1;opacity:1;">

                    @foreach($harr as $h)
 						<a href="gsqyflgwfw.asp" target="_blank">
                            <div style="height:290px; width:305px; overflow:hidden;position:relative; float:left; @if(!$loop->last)margin-right:57px; @endif" class="index_product_img_div"><img src="{{url('files/getimg/'.$h['img'])}}" width="305" height="290" border="0" style="position:absolute; left:0px; top:0px;z-index:2;" class="index_product_img_div2">
                                <div style="position:absolute;left:35px; top:237px; width:232px; height:35px; line-height:35px; border:solid 1px #999999;z-index:3;opacity:0; text-align:center;" class="index_product_img_div3">123</div>
                            </div>
                        </a>
                    @endforeach
                    </div>

                @endforeach
                       
                       
                </div>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:20px; margin-top:40PX">
        <tr>
            <td height="50" align="center"><img src="{{asset('new/images/index_001.gif')}}" width="1032" height="29"></td>
        </tr>
    </table>
    <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:50px;">
        <tr>
            <td>
                <table width="1095" height="170" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
                    <tr>
                        <Td><img src="{{asset('new/Images/top_04_left.png')}}" width="35" height="135" style="cursor:pointer;" onClick="$('#top_bar_2').flexslider('prev');" onMouseOut="this.src='{{asset('new/Images/top_04_left.png')}}';" onMouseOver="this.src='{{asset('new/Images/top_04_left_red.png')}}';"></Td>
                        <td>
                            <div class="flexslider carousel top_lsw_02" id="top_bar_2" style="overflow:hidden; width:1028px; height:495px;">
                                <ul class="slides">
                                @foreach($b3 as $v)
                                    <li style="margin:0; padding:0; margin-right:1px;">
                                        <a href="{{$v['href']}}" target="_blank"><img src="{{url('files/getimg/'.$v['img'])}}" width="1028" height="495" border="0" /></a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </td>
                        <td><img src="{{asset('new/Images/top_04_right.png')}}" width="35" height="135" style="cursor:pointer;" onClick="$('#top_bar_2').flexslider('next');" onMouseOut="this.src='{{asset('new/Images/top_04_right.png')}}';" onMouseOver="this.src='{{asset('new/Images/top_04_right_red.png')}}';"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script defer src="{{asset('new/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript">
    $(function() {
        //SyntaxHighlighter.all();
    });
    $(window).load(function() {

        $('#top_bar_2').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 1028,
            itemMargin: 1,
            minItems: 1,
            maxItems: 1,
            move: 1,
            slideshowSpeed: 10000,
            directionNav: false,
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });



    });
    </script>
@stop