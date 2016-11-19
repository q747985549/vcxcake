@extends('base')
@section('title','首页')
@section('content')
    <div id="slider" class="inpic-tab">
        <div class="main-slide" style="">
            <div class="prev" style="display: none;">prev</div>
            <div class="next" style="display: none;">next</div>
            <ul class="slide-list switchable-content">
                <li class="slide-item" style="display: block; opacity: 0.0189862;">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDmain">
                        <img data-img="http://www.21cake.com/public/images/53/af/15/db84bb3a228eae9fd0fde1fb127ee98f.jpg?1478600995#w" title="" src="http://www.21cake.com/public/images/53/af/15/db84bb3a228eae9fd0fde1fb127ee98f.jpg?1478600995#w">
                    </a>
                </li>
                <li class="slide-item" style="display: block; opacity: 0.981014;">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDmain">
                        <img data-img="http://www.21cake.com/public/images/80/48/75/38a48fcb5755cc5febee43c46b46eba4.jpg?1478669299#w" title="" src="http://www.21cake.com/public/images/80/48/75/38a48fcb5755cc5febee43c46b46eba4.jpg?1478669299#w">
                    </a>
                </li>
                <li class="slide-item" style="display: none;">
                    <a target="_blank" href="http://www.21cake.com/product-6384.html" id="IDmain">
                        <img data-img="http://www.21cake.com/public/images/36/d1/46/bdd9de6941e90a1ffd24bc601183dec7.png?1477665404#w" title="" src="http://www.21cake.com/public/images/36/d1/46/bdd9de6941e90a1ffd24bc601183dec7.png?1477665404#w">
                    </a>
                </li>
                <li class="slide-item" style="display: none;">
                    <a target="_blank" href="http://www.21cake.com/product-6122.html" id="IDmain21cake奶油生日蛋糕">
                        <img data-img="http://www.21cake.com/public/images/5a/b5/72/9f6b908475d96b32430c2a1a26e73033.jpg?1476865579#w" title="21cake奶油生日蛋糕" src="http://www.21cake.com/public/images/5a/b5/72/9f6b908475d96b32430c2a1a26e73033.jpg?1476865579#w">
                    </a>
                </li>
            </ul>
            <div class="slide-triggers switchable-triggerBox">
                <span class="trigger-item">1</span>
                <span class="trigger-item active">2</span>
                <span class="trigger-item">3</span>
                <span class="trigger-item">4</span>
            </div>
        </div>
        <!-- 大banner -->
        <script type="text/javascript">
            var parent = $('.main-slide');
            var first_delay = jQuery("#first_pic_delay").val() || 3000;
            var t = setTimeout("visualShow()", first_delay);
            var tnum = 0;
            parent.find(".slide-item").hide();
            parent.find(".slide-item").eq(0).show();
            parent.find(".trigger-item").eq(0).addClass("active");

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
            <div class="title-banner">
                <div class="banner" data-salearea="1" style="">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt="百利甜情人" src="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h">
                    </a>
                </div>
                <div class="banner" data-salearea="2" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner百利甜情人">
                        <span class="title"> Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt="百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="3" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt="百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="4" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner 百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt=" 百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="5" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner 百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt=" 百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="6" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt="百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="7" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt="百利甜情人">
                    </a>
                </div>
                <div class="banner" data-salearea="8" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-366.html" id="IDbanner 百利甜情人">
                        <span class="title">Bailey's Love Triangle<br> 百利甜情人</span>
                        <img data-img="http://www.21cake.com/public/images/89/35/d0/0e209282b912378f0e722cabe9eeb4cc.jpg?1477913426#h" alt=" 百利甜情人">
                    </a>
                </div>
            </div>
            <div class="title-banner">
                <div class="banner" data-salearea="1" style="">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖" src="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h">
                    </a>
                </div>
                <div class="banner" data-salearea="2" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="3" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="4" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="5" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="6" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="7" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
                <div class="banner" data-salearea="8" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-6098.html" id="IDbanner汉砖">
                        <span class="title">Bricks of Ancient China  <br>汉砖</span>
                        <img data-img="http://www.21cake.com/public/images/9f/cf/d2/24377b81fb72839fc3320533c8b64be4.jpg?1475123579#h" alt="汉砖">
                    </a>
                </div>
            </div>
            <div class="title-banner">
                <div class="banner" data-salearea="1" style="">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner 黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt=" 黑越橘" src="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h">
                    </a>
                </div>
                <div class="banner" data-salearea="2" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt="黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="3" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner 黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt=" 黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="4" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt="黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="5" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt="黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="6" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt="黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="7" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-585.html" id="IDbanner黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt="黑越橘">
                    </a>
                </div>
                <div class="banner" data-salearea="8" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-640.html" id="IDbanner 黑越橘">
                        <span class="title">Blue Monday<br>  黑越橘</span>
                        <img data-img="http://www.21cake.com/public/images/da/16/89/2b937b921c8c68c6bb7b6f64c6837d41.jpg?1479103941#h" alt=" 黑越橘">
                    </a>
                </div>
            </div>
            <div class="title-banner">
                <div class="banner" data-salearea="1" style="">
                    <a target="_blank" href="http://www.21cake.com/product-2161.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/45/a1/de/3ca6e6c3dae14e06314ef687e5a1864f.jpg?1458553085#h" alt="朗姆芝士" src="http://www.21cake.com/public/images/45/a1/de/3ca6e6c3dae14e06314ef687e5a1864f.jpg?1458553085#h">
                    </a>
                </div>
                <div class="banner" data-salearea="2" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2162.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/9a/d9/4d/fcae67b566f86764d3cdc0f252230316.jpg?1458553130#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="3" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2163.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/9d/70/c2/ec571ded0dcc608c039f8d9d838f46e5.jpg?1458553158#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="4" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2164.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/02/fe/b8/082dc95078966b49914cad98316b16d9.jpg?1458553182#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="5" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2165.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/1f/36/1b/b8c0a90644bcad38394ef5564c768841.jpg?1458553207#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="6" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2166.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/a2/0c/a1/285246943d5a78cb967c10d5337ce412.jpg?1458553226#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="7" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2601.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/b3/e2/3a/7892d0db1826e6e03b10ada739ec06b4.jpg?1458553249#h" alt="朗姆芝士">
                    </a>
                </div>
                <div class="banner" data-salearea="8" style="display:none">
                    <a target="_blank" href="http://www.21cake.com/product-2613.html" id="IDbanner朗姆芝士">
                        <span class="title">Rum Cheese Cake  <br>朗姆芝士</span>
                        <img data-img="http://www.21cake.com/public/images/72/e8/b1/af365e3cb8d14b3ac3f94161140a378e.jpg?1458553270#h" alt="朗姆芝士">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection