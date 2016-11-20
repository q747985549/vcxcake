/*人数加减功能*/
$(function(){
	    $(".L_top").click(function(){
	        var i = $(".ipt").val();
	        if(i<10){     	
	            i++;
	            $(".L_btm").css({'color':'#ff425c','border':'2px solid #ff425c'});
	        }else{
	            i=10;
	            $(".L_top").css({'color':'#333','border':'2px solid #b3b3b3'});
	        }
	        $(".ipt").val(i);

	    })
	    
	    $(".L_btm").click(function(){
	        var i = $(".ipt").val();
	        if(i>1){
	            i--;
	            $(".L_btm").css('color','#ff425c');
	        }else{
	            i=1;
	            $(".L_btm").css({'color':'#333','border':'2px solid #b3b3b3'});
	            $(".L_top").css({'color':'#ff425c','border':'2px solid #ff425c'});
	        }
	        $(".ipt").val(i);
	    })
	})
/*上左右开关按钮*/
$(function(){
	$('.button').click(function(){
		if($('.button .on').css("display") == "none"){
			$('.button .on').css('display','block');
			$('.button .off').css('display','none');
			$('.button').css('border','2px solid #ff425c');
			$('.check').slideDown(300);
			$("[name=baofang]").val(1);
		}else{
			$('.button .on').css('display','none');
			$('.button .off').css('display','block');
			$('.button').css('border','2px solid #b3b3b3');
			$('.check').slideUp(300);
			$("[name=baofang]").val(0);
		}
	})
})
/*下左右开关按钮*/
$(function(){
	$('.button1').click(function(){
		if($('.button1 .on').css("display") == "none"){
			$('.button1 .on').css('display','block');
			$('.button1 .off').css('display','none');
			$('.button1').css('border','2px solid #ff425c');
			$('.check1').slideDown(300);
			$("[name=for_other]").val(1);
		}else{
			$('.button1 .on').css('display','none');
			$('.button1 .off').css('display','block');
			$('.button1').css('border','2px solid #b3b3b3');
			$('.check1').slideUp(300);
			$("[name=for_other]").val(0);
		}
	})
})
/*选择性别*/
$(function(){
	$('.sex span').click(function(){
			$('.sex span').removeClass();
			$(this).addClass('active');	
			if(this.innerHTML == '女'){
				$("[name=gender]").val(0);
			}else{
				$("[name=gender]").val(1);

			}
	})
})
/*。。。。。。。。。。。。。。。。。主页结束。。。。。。。。。。。。。。。。。。。。。。。。。。。*/
/*。。。。。。。。。。。。。。。。。订座页。。。。。。。。。。。。。。。。。。。。。。。。。。。。*/
/*dete选选项卡*/
$(function(){
	$('.dete ul li').click(function(){	
		$('.dete ul li').removeClass('dete_active');
		$(this).addClass('dete_active');
		var Index=$(this).index();
			$(".time ul").removeClass("time_first");
			$(".time ul").eq(Index).addClass("time_first");
	})
})
/*time选选项卡*/
$(function(){
	$('.time ul li').click(function(){	
		$('.time ul li').removeClass('time_active');
		$(this).addClass('time_active');
	})
})
/*日历*/
$(function(){
	$('.calender_button').click(function(){
		$('.light').css('display','block');
		$('#calendar').css('display','block');
	})
	$('.light').click(function(){
		$('.light').css('display','none');
		$('#calendar').css('display','none');
	})
	$('.sc-item').click(function(){
		$('.light').css('display','none');
		$('#calendar').css('display','none');
	})
})
/*付款页弹窗*/
$(function(){
	$('.onfirm').click(function(){
		$('.mask').css('display','block');
		$('.Prompt').css('display','block');
	})
	$('.Prompt button').click(function(){
		$('.mask').css('display','none');
		$('.Prompt').css('display','none');
	})
})
/*...................................................在线订餐......................................................*/
/*头部选项卡*/
	$(function(){
		$('.header li').click(function(){
			$('.header li').removeClass();
			$(this).addClass('active');
			var Index=$(this).index();
				$(".content>div").removeClass("active");
				$(".content>div").eq(Index).addClass("active");
		})
	})
/*第一页左侧选项卡*/
	$(function(){
		$('.Order .left li').click(function(){
			$('.Order .left li').removeClass();
			$(this).addClass('active');
			$(".cate_current_title").html($(this).find('p').html());
		})
	})
	$(function(){

		$('.Order .left li').click(function(){
		
			var ndex=$(this).index();
				// alert($('.Order .right ul').eq(ndex).offset().top);
                $(".Order .right").animate({'scrollTop':Math.floor($('.Order .right ul').eq(ndex).offset().top - $('.Order .right ul').eq(0).offset().top)},1000);
                console.log(Math.floor($('.Order .right ul').eq(ndex).offset().top - $('.Order .right ul').eq(0).offset().top));
            })
	})
/*第一页右侧选高度*/
	$(function(){
		var h = $(window).height();
		var t = $(".header").height();
		var g = $(".content .title").height();
		var k = $(".Total").height();
        $('.content .left').height(h - t - k - 2);
        $('.content .right').height(h - t - g - k - 2);
    })
/*第一页人数加减功能*/
	
	$(function(){	 	
	 	$(".jia").click(function(){
	        var i = $(this).siblings('.su').val();

	        if(i<100){     	
	            i++;
	            $(this).siblings('.jian').css("display","block");
	            $(this).siblings('.su').css("display","block");
	            $(".Total").addClass("active");
	        }else{
	            i=100;
	        }
	         $(this).siblings('.su').val(i);
	         sumc();
	    })
	    $(".jian").click(function(){
	    	var i = $(this).siblings('.su').val();

	        if(i > 0){
	            i--;
	            if(i < 1){
	            	$(this).css("display","none");
	            	$(this).siblings('.su').css("display","none");
	            	$(".Total").removeClass("active");
	            }
	        }else{
	            i=1;
	        }
	         $(this).siblings('.su').val(i);
	         sumc();
	   })	
	})
	function sumc(){
		var sigle_totla = 0;
		var cart_num = 0;
		$(".su").each(function(i,v){
			var num = parseInt(v.value);
			var price = parseInt($(v).attr('data-price'));
			if(num > 0 && price > 0){
				cart_num += num;
				sigle_totla += num * price;
			}
		});
		$("#total").html("￥" + sigle_totla.toString());
		$("#cart").html(cart_num);

	}
/*第二页左侧选项卡*/
	$(function(){
		$(".con").hide();
		$(".con:eq(0)").show();
		$('.evaluate .nav li').click(function(){
			$(".con").hide();
			$(".con:eq("+$(this).index()+")").show();
			$('.evaluate .nav li').removeClass();
			$(this).addClass('active');	
		})
	})