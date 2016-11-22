
window.addEvent("domready", function() {
    (function($){
        
        var aCart = {"object":{"gift":[],"goods":[{"obj_ident":"goods_19_585","obj_type":"goods","obj_items":{"products":[{"bn":"201419-10","price":{"price":"268.000","cost":"0.000","member_lv_price":"268.00","buy_price":"268.00"},"product_id":"585","goods_id":"19","goods_type":"normal","name":"Blue Monday \u9ed1\u8d8a\u6a58","en_name":"Blue Monday","consume_score":0,"gain_score":"268.00","type_setting":{"use_brand":"1","use_props":"1"},"type_id":"3","goods_type_name":"","cat_id":"2","min_buy":null,"spec_info":"\u78c5\u6570\uff1a1.0\u78c5","spec_desc":{"spec_value":{"2":"1.0\u78c5"},"spec_value_id":{"2":"19"},"spec_private_value_id":{"2":"1394519165.233719"}},"weight":"454.000","quantity":1,"params":false,"floatstore":0,"store":9997,"package_scale":"1.00","cutlery_number":"5","suite_amount":"\u9002\u54083-4\u4eba\u5206\u4eab","cutlery_content":"\u542b5\u5957\u9910\u5177","birthday_card":"true","is_customlang":"false","package_unit":"","package_use":null,"default_image":{"thumbnail":"87622ebdc20f853dcd2d1c539ecbe455"},"sale_type":"0","str_time":"1396972800","end_time":1397059199,"json_price":{"price":"268.0","cost":"0.0","member_lv_price":"268.0","buy_price":"268.0"},"thumbnail":"87622ebdc20f853dcd2d1c539ecbe455","new_name":"Blue Monday \u9ed1\u8d8a\u6a58 (\u78c5\u6570\uff1a1.0\u78c5)","subtotal":"804.00"}]},"quantity":3,"params":{"goods_id":"19","product_id":"585","adjunct":[],"extends_params":null},"subtotal_consume_score":"0.00","subtotal_gain_score":"804.00","subtotal":804,"subtotal_price":804,"subtotal_weight":"1362.00","discount_amount":0,"store":{"real":9997,"less":3,"store":9997,"name":"Blue Monday \u9ed1\u8d8a\u6a58 (\u78c5\u6570\uff1a1.0\u78c5)"},"subtotal_prefilter_after":"804.00","discount_amount_prefilter":"0.00","item_quantity_count":0,"min_buy":{"goods_id":"19","min_buy":null,"name":"Blue Monday \u9ed1\u8d8a\u6a58"}},{"obj_ident":"goods_297_6122","obj_type":"goods","obj_items":{"products":[{"bn":"201643-10","price":{"price":"498.000","cost":"498.000","member_lv_price":"498.00","buy_price":"498.00"},"product_id":"6122","goods_id":"297","goods_type":"normal","name":"21cake\u751f\u65e5\u5976\u6cb9\u86cb\u7cd5","en_name":"Birthday Cake","consume_score":0,"gain_score":"498.00","type_setting":{"use_brand":"1","use_props":"1"},"type_id":"3","goods_type_name":"","cat_id":"2","min_buy":null,"spec_info":"\u78c5\u6570\uff1a0.5\u78c5","spec_desc":{"spec_value":{"2":"0.5\u78c5"},"spec_value_id":{"2":"152"},"spec_private_value_id":{"2":"1474854533.9531"}},"weight":"227.000","quantity":1,"params":false,"floatstore":0,"store":999999,"package_scale":"1.00","cutlery_number":"1","suite_amount":"1-2\u4eba","cutlery_content":"\u8d601\u628a\u94a2\u52fa","birthday_card":"false","is_customlang":"false","package_unit":"","package_use":null,"default_image":{"thumbnail":"a0d763665c64985044180d5dae1e0e60"},"sale_type":"0","str_time":"1474819200","end_time":1474905599,"json_price":{"price":"498.0","cost":"498.0","member_lv_price":"498.0","buy_price":"498.0"},"thumbnail":"a0d763665c64985044180d5dae1e0e60","new_name":"21cake\u751f\u65e5\u5976\u6cb9\u86cb\u7cd5 (\u78c5\u6570\uff1a0.5\u78c5)","subtotal":"498.00"}]},"quantity":1,"params":{"goods_id":297,"product_id":"6122","adjunct":[],"extends_params":null},"subtotal_consume_score":"0.00","subtotal_gain_score":"498.00","subtotal":498,"subtotal_price":498,"subtotal_weight":"227.00","discount_amount":0,"store":{"real":999999,"less":1,"store":999999,"name":"21cake\u751f\u65e5\u5976\u6cb9\u86cb\u7cd5 (\u78c5\u6570\uff1a0.5\u78c5)"},"subtotal_prefilter_after":"498.00","discount_amount_prefilter":"0.00","item_quantity_count":0,"min_buy":{"goods_id":"297","min_buy":null,"name":"21cake\u751f\u65e5\u5976\u6cb9\u86cb\u7cd5"}}],"coupon":[],"balance":[],"card":[]},"subtotal_consume_score":0,"subtotal_gain_score":1302,"subtotal":1302,"subtotal_price":1302,"subtotal_discount":0,"items_quantity":4,"items_count":2,"subtotal_weight":1589,"discount_amount_prefilter":0,"discount_amount_order":0,"discount_amount":0,"balance_amount":0,"card_amount":0,"subtotal_prefilter_after":1302,"goods_min_buy":{"19":{"info":{"goods_id":"19","min_buy":null,"name":"Blue Monday \u9ed1\u8d8a\u6a58"},"real_quantity":3},"297":{"info":{"goods_id":"297","min_buy":null,"name":"21cake\u751f\u65e5\u5976\u6cb9\u86cb\u7cd5"},"real_quantity":1}},"items_quantity_widgets":4,"items_count_widgets":2,"_cookie":{"CART_COUNT":2,"CART_NUMBER":4,"CART_TOTAL_PRICE":1302}};
        var goodsData = aCart.object.goods;
        var goodsIndex = 0;
        var giftIndex = 0;
        window.renderGoodsData = [];
        window.brithCardIndex = 9000;
        window.giftData = [];
        window.adjunctData = [];

        // 更新送货时间信息
        window.limitingDate = '2016-11-22,2016-11-23,2016-11-24,2016-12-22,2016-12-23,2016-12-24,2016-12-25,2016-12-26,2016-12-27,2016-12-28,2016-12-29,2016-12-30,2016-12-31,2017-01-01,2017-01-02,2017-01-03,2017-01-04,2017-01-05,2017-01-06,2017-01-07,2017-01-08,2017-01-09,2017-01-10,2017-01-11,2017-01-12,2017-01-13,2017-01-14,2017-01-15,2017-01-16,2017-01-17,2017-01-18,2017-01-19,2017-01-20,2017-01-21,2017-01-22,2017-01-23,2017-01-24,2017-01-25,2017-01-26,2017-01-27,2017-01-28,2017-01-29,2017-01-30,2017-01-31,2017-02-01,2017-02-02,2017-02-03,2017-02-04,2017-02-05,2017-02-06,2017-02-07,2017-02-08,2017-02-09,2017-02-10,2017-02-11,2017-02-12,2017-02-13,2017-02-14,2017-02-15,2017-02-16,2017-02-17,2017-02-18,2017-02-19,2017-02-20,2017-02-21,2017-02-22,2017-02-23,2017-02-24,2017-02-25,2017-02-26,2017-02-27,2017-02-28,2017-03-01,2017-03-02,2017-03-03,2017-03-04,2017-03-05,2017-03-06,2017-03-07,2017-03-08,2017-03-09,2017-03-10,2017-03-11,2017-03-12,2017-03-13,2017-03-14,2017-03-15,2017-03-16,2017-03-17,2017-03-18,2017-03-19,2017-03-20,2017-03-21,2017-03-22,2017-03-23,2017-03-24,2017-03-25,2017-03-26,2017-03-27,2017-03-28,2017-03-29,2017-03-30,2017-03-31,2017-04-01,2017-04-02,2017-04-03,2017-04-04,2017-04-05,2017-04-06,2017-04-07,2017-04-08,2017-04-09,2017-04-10,2017-04-11,2017-04-12,2017-04-13,2017-04-14,2017-04-15,2017-04-16,2017-04-17,2017-04-18,2017-04-19,2017-04-20,2017-04-21,2017-04-22,2017-04-23,2017-04-24,2017-04-25,2017-04-26,2017-04-27,2017-04-28,2017-04-29,2017-04-30,2017-05-01,2017-05-02,2017-05-03,2017-05-04,2017-05-05,2017-05-06,2017-05-07,2017-05-08,2017-05-09,2017-05-10,2017-05-11,2017-05-12,2017-05-13,2017-05-14,2017-05-15,2017-05-16,2017-05-17,2017-05-18,2017-05-19,2017-05-20';
        $("#curr_ship_date").attr("limiting_date", window.limitingDate);
        
        if(!window.brithCardData){
            window.brithCardData = {};
        }

        if(aCart.object.adjunct){
            window.adjunctData = aCart.object.adjunct.order;
        }
        
        if(aCart.object.gift){
            window.giftData = aCart.object.gift.order;
            
        }
        
        if(_$.isArray(goodsData)){
            goodsData.each(function(item){
                var goods = item['obj_items']['products'];
                goods.obj_ident = item.obj_ident;
                var gid = goods.obj_ident.split('_')[1];
                if($('#access_chk_'+gid).length){
                    $('#access_chk_'+gid)[0].checked = true;
                    // 21cake会员track添加
                    _czc.push(["_trackEvent", "Order","IsMember"]);
                }
                goods.quantity = item.quantity;
                window.renderGoodsData.push(goods);
            });
        }else{
            for(var i in goodsData){
                var item = goodsData[i];
                var goods = item['obj_items']['products'];
                goods.obj_ident = item.obj_ident;
                var gid = goods.obj_ident.split('_')[1];
				
                if($('#access_chk_'+gid).length){
                    $('#access_chk_'+gid)[0].checked = true;
                    // 21cake会员添加
                    _czc.push(["_trackEvent", "Order","IsMember"]);
                }
                goods.quantity = item.quantity;
                window.renderGoodsData.push(goods);
            }
        }
        
                    renderGoodsData[goodsIndex++][0].default_image.thumbnail='http://www.21cake.com/public/images/b7/6d/81/fbcaf87a992891826f4c55ce85533edb.jpg?1479468750#h';
                        renderGoodsData[goodsIndex++][0].default_image.thumbnail='http://www.21cake.com/public/images/3f/33/2d/c4a85c12fb6a9e7a9ea62b87a1856226.jpg?1478240958#h';
                    var getMaxWord = function(weight){
             if(weight==1){
                return 12;
            }else if(weight==1.5 || weight==2){
                return 16;
            }else if(weight==3){
                return 20;
            }else if(weight==5){
                return 30;
            }else{
                return 40;
            }
        }
        var _html =  (_.template(_$("#product_item").html(),renderGoodsData))();
        
        var REG = {
            is_chinese:/[\u4E00-\u9FA5]/g,
            is_mobile:/^1[3|4|5|6|8|9]\d{9}$/,
            is_time:/\d\d\:\d\d\-\d\d\:\d\d/,
            is_date:/^\d{4}-\d{1,2}-\d{1,2}$/
        }
        var JQ = {
            mobile_input:$('#j_quick_mobile'),
            register_tip:$('#has_register_tip'),
            product_list:$('#p_list_container'),
            form:$('#order_form'),
            doneButton:$('#done'),
            sms_vaild_btn:$('#sms_vaild_btn'),
            sms_vaild_btn_retry:$('#sms_vaild_btn_retry'),
            sms_vaild_input:$('#sms_vaild_input'),
            not_me_label:$('#not_me_label'),
            not_me_chk:$('#not_me_chk'),
            fork_chk:$('#fork_chk'),
            candle_chk:$('#candle_chk'),
            consignee_container:$('#consignee_container'),
            consignee_input:$('#consignee_input'),
            doc:$(document)
        }
        JQ.product_list.html(_html);
        // 定制语功能
        if($(".is_custom").length>0){
            $(".valen_title").on("click",function(){
              if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).next(".showorhide").removeClass('hide');
              }else{
                $(this).addClass('active');
                $(this).next(".showorhide").addClass('hide');
              }
            })
            try{
              var customtxt1 =  JSON.parse(decodeURIComponent(Cookie.read('custom')));
              $(".is_custom").each(function(index, el) {
              var id = $(this).attr("productid");
              var customtxt = decodeURIComponent(customtxt1[id]);
              if(customtxt == "undefined" || customtxt == null){
                customtxt = "";
              }
              $(this).find(".J_custom_input").val(customtxt);
              });
              if($(".J_modify_txt").length>0){
                $(".J_modify_txt").each(function() {
                  var input_content = $(this).closest('.is_custom').find('.J_custom_input').val();
                  var modify_content = $(this).text();
                  if(input_content && input_content==modify_content){
                    $(this).addClass('active');
                  }
                });
              }
            }catch(e){};
          valentine.setcustomtxt();
          valentine.setmodifycustom();
        }
        // 定制语功能end
        supportPlaceholder = 'placeholder' in document.createElement('input');
        if(!supportPlaceholder){
          $("textarea").each(function() {
            check_placeholder($(this));
          });
        }
        var _updateCartCallback = function(d){
                        md5_cart_info = d.md5_cart_info;
                        $('#md5_cart_info').val(md5_cart_info);
                        
                        $('.j_total').html(d.sub_total.promotion_subtotal);
                        
                        if(window.RegisterBuy){
                            recalShippingFeeHTML();
                        }else{
                            recalShippingFee();
                        }
        }
        var checkEmpty = function(){
            $.get('/cart-check_empty.html',{},function(d){
                if(d == 1){
                    location.href = '/gallery-index---0---1.html';
                }else{
                    setTimeout(function(){
                        checkEmpty();
                    },5000);
                }
            });
        }
        //先去掉
        //checkEmpty();
        var updateCart = function(add,dom){
            var _this = $(dom).parent();
            var _tr = _this.parents('tr');
            var goods_ident = _this.data('ident');
            var goods_id = _this.data('id');
            var product_id = _this.data('pid');
            
            var num = parseInt(_this.attr('data-num'));
            num += add;

            if (num < 1 || num > 99) {
                alert('商品数量错误，单件商品的数量只能在1至99之间。');
                return;
            }
            _this.attr('data-num',num);
            var postData = {
                    obj_type:'goods',
                    goods_ident:goods_ident,
                    goods_id:goods_id,
                    min:1,
                    max:999999,
                    stock:999999,
                    response_json:true
            };
            postData['modify_quantity['+goods_ident+'][quantity]'] = num;
            $.post('/cart-update.html',postData,function(d){
                    if(!d){
                    }else if(d.success){
                        //更新全局md5
                        _tr.find('.j_subtotal').html(d.edit_ajax_data.buy_price);
                        _this.attr('data-num',num);
                        _this.find('.or-num-num').val(num);
                        _updateCartCallback(d);
                        updateCartInfo();
                        jQuery("#order_coupon .content").load(window.location.href + ' #order_coupon .content>*');
                    }
            },'json');
            
        }
        var updateCart_v2 = function(goods_ident,goods_id,product_id){
            var postData = {
                    obj_type:'goods',
                    goods_ident:goods_ident,
                    goods_id:goods_id,
                    min:1,
                    max:999999,
                    stock:999999,
                    response_json:true
            }
            postData['modify_quantity['+goods_ident+'][quantity]'] = 1;
            $.post('/cart-update.html',postData,function(d){
                    if(d.success){  
                        _updateCartCallback(d);
                    }
            },'json');
            
        }
        var add_goods_deffer = $.Deferred();
        var _remove_goods = function(goods_ident,goods_id,pid,callback){
                var _data = {
                        obj_type:'goods',
                        goods_ident:goods_ident,
                        goods_id:goods_id,
                        min:1,
                        max:999999,
                        stock:999999,
                        response_json:true
                    };
                    //modify_quantity[goods_17_543][quantity]:2
                    _data['modify_quantity['+goods_ident+'][quantity]'] =1;
                    $.post('/cart-remove.html',_data , function(d) {
                        if(d.is_empty){
                            location.href='/cart.html';
                        }else{
                            $('#item_display_'+pid+'_'+goods_id).remove();
                            _updateCartCallback(d);
                            callback&&callback();
                        }
                    }, 'json');
        }
        var _add_goods = function(url,gid,pid,price,pname,spec_info,img_url){
                $.get(url,{
                    response_json:true,
                    update_md5:1
                },function(d){
                    
                    price = parseFloat(price);
                    spec_info = spec_info.split('：')[1];
                    var img;
                    if(gid == 33){
                        img = '/themes/21cake/images/img/lazhu.jpg';
                    }else if(gid == 59){
                        img = '/themes/21cake/images/img/canju.jpg';
                    }
                    if(img_url){
                        img = img_url;
                    }
//                    var html = '<tr id="item_display_{pid}_{gid}"><td class="gt-item gt-item-cake"><a href="/product-{pid}.html" target="_blank" class="gt-cake-item"><span class="gt-img-container fl-l"><img src="{img}" alt="{pname}"></span><span class="fl-l cake-intro"><span class="cake-intro-inner">{pname}</span></span></a></td><td class="gt-item bang-font"><span class="bang-num">{spec_info}</span></td><td class="gt-item"><span class="or-num" data-num="1" data-id="{gid}" data-pid="{pid}" data-ident="goods_{gid}_{pid}"><em class="or-minus j_minus">-</em><div class="or-num-num"><%=goods.quantity%></div><em class="or-plus j_plus">+</em></span></td><td class="gt-item"><div class="input-container">&nbsp;</div></td><td class="gt-item j_subtotal j_staff_total">￥{price}</td><td class="gt-item"><em data-pid="{pid}" data-obj_ident="goods_{gid}_{pid}" data-goods_id="{gid}" class="little-close-ico cart_remove_button"></em></td></tr>'
                    var html = '<tr id="item_display_{pid}_{gid}"><td class="gt-item gt-item-cake"><a href="/product-{pid}.html" target="_blank" class="gt-cake-item"><span class="gt-img-container fl-l"><img src="{img}" alt="{pname}"></span><span class="fl-l cake-intro"><span class="cake-intro-inner">{pname}</span></span></a></td><td class="gt-item bang-font"><span class="bang-num">{spec_info}</span></td><td class="gt-item"><span class="or-num" data-num="1" data-id="{gid}" data-pid="{pid}" data-ident="goods_{gid}_{pid}"><div class="or-num-num">1</div></span></td><td class="gt-item"><div class="input-container">&nbsp;</div></td><td class="gt-item j_subtotal j_staff_total">￥{price}</td><td class="gt-item"><em data-pid="{pid}" data-obj_ident="goods_{gid}_{pid}" data-goods_id="{gid}" class="little-close-ico cart_remove_button"></em></td></tr>'
                    html = html.replace(/\{gid\}/gi,gid);
                    html = html.replace(/\{pid\}/gi,pid);
                    html = html.replace(/\{price\}/gi,price);
                    html = html.replace(/\{pname\}/gi,pname);
                    html = html.replace(/\{spec_info\}/gi,spec_info);
                    html = html.replace(/\{img\}/gi,img);
                    $('#p_list_container').append(html);
                    if(d.md5_cart_info){
                        $('#md5_cart_info').val(d.md5_cart_info);
                    }
                    if(window.RegisterBuy){
                        recalShippingFeeHTML();
                    }else{
                        recalShippingFee();
                        updateCart_v2('goods_'+gid+'_'+pid,gid,pid);
                    }
                },'json');
        }
        
        //如果是新用户，就默认勾选会员卡
        var is_click = $('#membercard_is_click').val();
        if(is_click == 'false'){
            $(document).ready(function(){
                return false;
                if(!$('.membercard').attr('checked')){
                    $('.membercard').click();
                    $('#membercard_is_click').val('true');
                    // 21cake会员添加
                    _czc.push(["_trackEvent", "Order","IsMember"]);
                }
                else{
                    // 21cake会员添加
                    _czc.push(["_trackEvent", "Order","IsNotMember"]);
                }
            });
        }
		$('#use_coupon_button').click(function(){
            // 添加使用优惠券track
            _czc.push(["_trackEvent", "Order","UseCoupon"]);
		   if(window.hasLogin){
		     
		   }else{
		     Dialog.confirm('请登录后使用优惠券!',function(e){
				if(e){
					location.href = '/passport-login.html';
				}
			 },{
				 confirmText:'登录'
			 });
		   }
		});
    $('#use_vip_coupon_button').click(function(){
        // 使用尊享卡track
       _czc.push(["_trackEvent", "Order","UseVipCoupon"]);
       if(window.hasLogin){
         
       }else{
         Dialog.confirm('请登录后使用尊享卡!',function(e){
        if(e){
          location.href = '/passport-login.html';
        }
       },{
         confirmText:'登录'
       });
       }
    });

        $('.access_chk').unbind('click');
        $('.access_chk').click(function(){
            var _this = $(this);
            var goods_id = _this.attr('goods_id');
            var bn  = _this.attr('bn');
            var price = _this.attr('price');
            var pname = _this.attr('pname');
            var spec_info = _this.attr('spec_info');
            var img_url = _this.attr('img_url');
			var real_checkbox = _this.attr('real_checkbox');
            setTimeout(function(){
                var url ='/cart-add-goods-goods_id-bn-1.html';
                url = url.replace('goods_id',goods_id);
                url = url.replace('bn',bn);
                //undefined是非真实的checkbox的情况
				if(real_checkbox){
					if(_this[0].checked){
						_add_goods(url,goods_id,bn,price,pname,spec_info,img_url);
					}else{
						_remove_goods('goods_'+goods_id+'_'+bn,goods_id,bn,function(){
							if(window.RegisterBuy){
								recalShippingFeeHTML();
							}else{
								recalShippingFee();
							}
							
						});
					}
				}else{
					if(_this[0].checked){
					   _this[0].checked = false;
					}else{
						if(_this[0].checked == false||_this[0].checked == undefined){
							_this[0].checked = true;
						}
					}
					
					if(_this[0].checked){
						_add_goods(url,goods_id,bn,price,pname,spec_info,img_url);
					}else{
						_remove_goods('goods_'+goods_id+'_'+bn,goods_id,bn,function(){
							if(window.RegisterBuy){
								recalShippingFeeHTML();
							}else{
								recalShippingFee();
							}
							
						});
					}
				}
                
            },0);
        })
        
        //$('#memo_textarea').placeholder();
        $('#memo_textarea').unbind();
        $('#memo_textarea').keyup(function(){
            var word = $(this).val().length;
            if(word>100){
                $(this).next().show();
            }else{
                $(this).next().hide();
            }
        });
		

           // 刷新保留留言板内容
           var  leavel_message = Cookie.read("leavel_message");
           if(leavel_message){
              $('#leave_message_content').text(leavel_message);
              $('#leave_message_content_container').show();
              $('#memo_textarea').val(leavel_message);
           };
		//取消留言板中的内容
		$('#leave_message_cancel').unbind('click');
		$('#leave_message_cancel').click(function(){
			Cookie.write('leavel_message',null, {domain: '21cake.com','path':'/','duration':-1});
			$('#memo_textarea').val('');
			$('#leave_message_content_container').hide();
		});
		var content;
		$('#leavel_message_container').unbind('click');
        $('#leavel_message_container').click(function(){
			var tpl = '<div class="leave-mes-dia">\
						<h4>留言说明</h4>\
						<textarea class="leave_message_content_popup" id="leave_message_content_popup" placeholder="请填写您对订单或商品的特殊要求，200字以内"></textarea>\
						<p id="excess_length_warning" style="display:none;color:#ff6600; text-align:left; font-size:12px; line-height:1.5;padding-top:10px;">字数超过200字，超出部分会被自动截断</p>\
					  </div>'
			Dialog.confirm_leavel_message(tpl,function(e){
				if(e){
				    if(!content){
						content = $('.leave_message_content_popup').val();
					}
					
					if(content){
						//anti dom xss
						content = content.substring(0,200);
						$('#leave_message_content').text(content);
						$('#leave_message_content_container').show();
						$('#memo_textarea').val(content);
                        Cookie.write('leavel_message',content, {domain: '21cake.com','path':'/','duration':1});
					}else{
						$('#leave_message_content').text('');
						$('#leave_message_content_container').hide();
						$('#memo_textarea').val('');
                        Cookie.write('leavel_message',null, {domain: '21cake.com','path':'/','duration':-1});
					}
				}
			});
			setTimeout(function(){
			  var last = $('#memo_textarea').val();
			  if(last){
				$('.leave_message_content_popup').val(last);
			  }
			},20);
			$('.leave_message_content_popup').keyup(function(){
				content = $(this).val();
				var counts = content.length;
				var warning = $('#excess_length_warning');
				if(counts > 200){
					warning.show();
				}else{
					warning.hide();
				}
			});
			return;
            //var _warp = $('#leave_message_frame');
            //if($(this).find('input')[0].checked){
			//if(_warp.hasClass('hide')){
            //    _warp.removeClass('hide');
			//}else{
			//   _warp.addClass('hide');
			//}
            //}else{
            //    _warp.addClass('hide');
            //}
        });
        
        //生日卡
        var brith_card_timer;
        var JQCardList = $('.brith_card_list');
        //$('.brith_card_input').placeholder();
        
        JQ.doc.click(function(){
            brith_card_timer = setTimeout(function(){
                JQCardList.addClass('hide');
            },20);
        });
        JQ.product_list.undelegate();
        JQ.product_list.delegate('label','click',function(e){
            e.stopPropagation();
        });
        JQ.product_list.delegate('.brith_card_sel','click',function(e){
            clearTimeout(brith_card_timer);
            e.stopPropagation();
            var _this = $(this);
    
            var weight = _this.data('spec');
            weight = weight.replace('磅数：','');
            weight = parseFloat(weight);
            var words = getMaxWord(weight);
            _this.find('.brith_card_input').attr('placeholder','可输入'+words/2+'个汉字或'+words+'个字符');
            _this.find('.brith_card_input').attr('max',words/2);

            if(!_this.find('.brith_card_input').attr('binded')){
              _this.find('.brith_card_input').attr('binded','1')
              _this.find('.brith_card_input').placeholder();
            }
            var cardList = $('.brith_card_list');
            var _selList = _this.find('.brith_card_list');
            if(_selList.hasClass('hide')){
                _selList.removeClass('hide');
            }else{
                _selList.addClass('hide');
            }
            for(var i=0;i<cardList.length;i++){
                if(cardList[i] != _selList[0]){
                    $(cardList[i]).addClass('hide');
                }
            }
        
        });
        
        JQ.product_list.delegate('.brith_card_item','click',function(e){
            e.stopPropagation();
            var _this = $(this);
            var _val = _this.text();
            var _parent = _this.parents('.brith_card_sel');
            var gid = _parent.data('gid');
            var pid = _parent.data('pid');
            var bkey = pid+'_'+gid;
            // 获取生日牌列表中的内容写入cookie
            //start
            var productId = _this.attr('productid');
            var login_name = $('#j_header_uname').html();
            var birthday_card_cookie = $.parseJSON(Cookie.read('birthday_card_cookie'));
            if(_val == '无'){
              $(this).closest(".item_display").attr("birth_card","");
              if(birthday_card_cookie && eval(" birthday_card_cookie["+productId+"]")){
                eval("delete birthday_card_cookie["+productId+"]");
              }
            }else{
              $(this).closest(".item_display").attr("birth_card",_val);
              if(!birthday_card_cookie){
                birthday_card_cookie = {};
              }
              eval("birthday_card_cookie["+productId+"] = {'content':'"+_val+"','login_name':'"+login_name+"'}");
            }
            Cookie.write('birthday_card_cookie', JsonToStr(birthday_card_cookie), {domain: '21cake.com','path':'/','duration':365});
            //end
            var _displayDom = _parent.find('.brith_card_display');
            _displayDom.html(_val);
            window.brithCardData[bkey] = _val;
            _parent.find('.brith_card_hidden').val(_val);
            _parent.find('.brith_card_list').addClass('hide');
        });
        
        JQ.product_list.delegate('.brith_card_by_self','click',function(e){
            e.stopPropagation();
            clearTimeout(brith_card_timer);
            var _this = $(this);
            _this.hide();
            _this.next().show();
        });
        
        JQ.product_list.delegate('.brith_card_cancel','click',function(e){
            e.stopPropagation();
            var _this = $(this);
            var _val = _this.text();
            var _parent = _this.parents('.brith_card_sel');
            var gid = _parent.data('gid');
            var pid = _parent.data('pid');
            var bkey = pid+'_'+gid;

            var _displayDom = _parent.find('.brith_card_display');
            _displayDom.html('请选择生日牌');
            _parent.find('.brith_card_hidden').val('');
            window.brithCardData[bkey] = '';
            _parent.find('.brith_card_list').addClass('hide');
        });
        
        
        
        JQ.product_list.delegate('.brith_card_confirm','click',function(e){ //生日牌自定义确定
            e.stopPropagation();
            clearTimeout(brith_card_timer);
            var _parent = $(this).parents('.brith_card_sel');
            var gid = _parent.data('gid');
            var pid = _parent.data('pid');
            var bkey = pid+'_'+gid;
        
            var _displayDom = _parent.find('.brith_card_display');
            var _this = _parent.find('.brith_card_input');
            var _error = _this.next();
            var text = $.trim(_this.val());
            var count = text.length;
            var error_flag = false;
            var max = parseInt(_this.attr('max'))*2;
            _error.addClass('hide');
            if(count>max){
                error_flag = true;
                _error.removeClass('hide');
            }else{
                var textArr = text.split('');
                var chn_count = 0,en_count = 0;
                for(var i=0;i<textArr.length;i++){
                    var _item = textArr[i];
                    if(/[\d|\w]/gi.test(_item)){
                        en_count++;
                    }else{
                        chn_count++;
                    }
                }

                if((chn_count*2+en_count)>max){
                    error_flag = true;
                    _error.removeClass('hide');
                }else{
                    // 获取自定义生日牌 内容写入 cookie
                    //start
                    var productId = $(this).attr('productid');
                    var login_name = $('#j_header_uname').html();
                    var birthday_card_cookie = Cookie.read('birthday_card_cookie');
                    var reg = '\\\\|\\\||\/|;|\\\.|\\\'|\\\,|\\\"|<';
                    if(birthday_card_cookie){
                      var birthday_card_ob =  $.parseJSON(birthday_card_cookie);
					            text = text.replace(new RegExp(reg, "g"), "");
                      eval("birthday_card_ob["+productId+"] = {'content':'"+text+"','login_name':'"+login_name+"'}");
                      Cookie.write('birthday_card_cookie',JSON.stringify(birthday_card_ob),{domain: '21cake.com','path':'/','duration':365});
                    }else{
                      birthday_card_cookie = {};
					            text = text.replace(new RegExp(reg, "g"), "");
                      eval("birthday_card_cookie = {"+productId+":{'content':'"+text+"','login_name':'"+login_name+"'}}");
                      Cookie.write('birthday_card_cookie',JSON.stringify(birthday_card_cookie),{domain: '21cake.com','path':'/','duration':365});
                    }
                    $(this).closest(".item_display").attr("birth_card",text); //存生日牌到元素
                    //end
                    /** 敏感词提示 */
                    jQuery.getJSON('/cart-limited_words_filter.html', {words: text}, function (response) {
                        if (response.hasOwnProperty('status') && response.status.toUpperCase() == 'ERROR') {
                            response.data.msg && Dialog.alert(response.data.msg, function () {
                                $('.brith_card_cancel').trigger('click');
                            });
                        }
                    });
                }
            }
            if(!error_flag&&count>0){
                _this.val('');
                _displayDom.html(text);
                _parent.find('.brith_card_hidden').val(text);
                window.brithCardData[bkey] = text;
                _parent.find('.brith_card_list').addClass('hide');
            }
            return false;
        }).delegate('.brith_card_input','focus',function(e){
            var _error = $(this).next();
            _error.addClass('hide');
        });
        
        JQ.product_list.delegate('.brith_card_input','click',function(e){
            e.stopPropagation();
        }).delegate('.or-num-num','blur',function(){
            var before_num = $(this).parent().data('num');
            if (this.value > 99 || this.value < 1) {
                alert('商品数量错误，单件商品的数量只能在1至99之间，请重新输入。');
                return false;
            }
            updateCart(this.value - before_num, this);
        }).delegate('.j_minus','click',function(){
            updateCart(-1,this);
        }).delegate('.j_plus','click',function(){
            updateCart(1,this);
        }).delegate('.J_gift_sele','click',function(){ //赠品多选切换
            $(this).closest(".gift-new").siblings().removeClass("gift-sele");
            $(this).closest(".gift-new").addClass("gift-sele");
            
            var goods_id = $(this).attr('goods_id');
            var product_id  = $(this).attr('product_id');
            setTimeout(function(){
                var postGift = {
                    obj_type:'gift',
                    g_id:goods_id,
                    p_id:product_id,
                    response_json:true
                };
              
                $.post('/cart-updategift_by_member-gift.html',postGift,function(d){
                  if (d.status=='fail') {Message.error(d.msg)};
                },'json');
            },0);

        }).delegate('.cart_remove_button','click',function(){

            var msg = '确定将此商品从购物车中移除？';
            var _this = $(this);
            var goods_ident = _this.data('obj_ident');
            var goods_id = _this.data('goods_id');
            var productId = _this.data('product_id');
            // 删除X track添加
            _czc.push(["_trackEvent", "OrderDeleteBtn","productid",productId]);
            var pid = _this.data('pid');
            //检查是否使用了升磅券
            var is_use_sb = false;
            var coupon = '';
            jQuery.ajax({
                type: "POST",
                url: '/cart-is_use_sb.html' + '?' + new Date().getTime(),
                data: {'goods_ident' : goods_ident},
                dataType: 'json',
                async : false,
                success: function(res){
                    if(res.has){
                        is_use_sb = true;
                        coupon = res.coupon
                    }
                }
            });
            //检查是否（原来有蛋糕而此次把蛋糕删除），如果是则把添加配件隐藏
            var cake_num = 0;
            var hide = false;
            var del_cake = false;
            var items = jQuery(".item_display");
            var del_pro = _this.data('product_id');
            jQuery.each(items, function(k,v){
                if(jQuery(this).attr('type_id') == '3') {
                    cake_num += 1;
                    if(del_pro == jQuery(this).attr('productid')) {
                        del_cake = true;
                    }
                }
            });
            if(del_cake && cake_num == 1) {
                msg = '移除该蛋糕后将移除所有蛋糕相关的配件，确定将此商品从购物车中移除？';
                hide = true;
            }
            if(is_use_sb){
                Dialog.confirm('该商品已使用的优惠券，是否删除！', function(e){
                    if(e){
                      cancel_coupon(coupon);
                    }
                });
            }else{
                Dialog.confirm(msg, function(e) {
                    if (e) {
                        var _data = {
                            obj_type:'goods',
                            goods_ident:goods_ident,
                            goods_id:goods_id,
                            min:1,
                            max:999999,
                            stock:999999,
                            response_json:true
                        };
                        if(hide) {
                            hide_access();
                        }
                        //modify_quantity[goods_17_543][quantity]:2
                        _data['modify_quantity['+goods_ident+'][quantity]'] =1;
                        $.post('/cart-remove.html',_data , function(d) {
                            // 删除商品时清除对应 产品的cookie
                            //start
                            var birthday_card_cookie = $.parseJSON(Cookie.read('birthday_card_cookie'));
                            if(birthday_card_cookie){
                              if(eval('birthday_card_cookie['+productId+']')){
                                eval('delete birthday_card_cookie['+productId+']');
                                Cookie.write('birthday_card_cookie',JsonToStr(birthday_card_cookie),{domain: '21cake.com','path':'/','duration':365});
                              }
                            }
                            //end
                            // 刷新日期列表
                            $.ajax({
                              type:'POST',
                              url: '/cart-getAjaxtimelist.html'+ '?' + new Date().getTime(),
                              dataType:'json',
                              success: function(d){
                                $('#def_ship_date').val(d.date);
                                $('#ship_time_list').val(d.def_time_list);
                                if(d.limiting_date){
                                  $('#curr_ship_date').attr('limiting_date',d.limiting_date);
                                }else{
                                  $('#curr_ship_date').attr('limiting_date','');
                                }
                                init_time_scope();
                              }
                            })
                            // 刷新时间列表
                            $.ajax({
                              type:'POST',
                              url: '/cart-getNewDelTime.html'+ '?' + new Date().getTime(),
                              data:{'date' : $('#curr_ship_date').val()},
                              dataType:'json',
                              success: function(d){
                                $('#def_ship_date').val(d.date);
                                $('#ship_time_list').val(d.jsondata.substring(5));
                                init_time_scope();
                              }
                            })
                            // 删除相应的定制语
                            if(_this.closest('tr.item_display').next("tr.is_custom")){
                              var custom_cookie = $.parseJSON(decodeURIComponent(Cookie.read("custom")));
                              if(custom_cookie){
                                if(custom_cookie[productId]){
                                  custom_cookie[productId] = "";
                                  Cookie.write('custom',encodeURIComponent(JsonToStr(custom_cookie)), {domain: '21cake.com','path':'/','duration':1});
                                }
                              }
                               _this.closest('tr.item_display').next("tr.is_custom").remove();
                            }
                            // end
                            if(d.is_empty){
                                location.href='/cart.html';
                            }else{
                                $('#item_display_'+pid+'_'+goods_id).remove();
                                _updateCartCallback(d);
                                var gid = goods_ident.split('_')[1];
                                if($('#access_chk_'+gid).length){
                                    $('#access_chk_'+gid)[0].checked = false;
                                    // 不是会员track
                                    _czc.push(["_trackEvent", "Order","IsNotMember"]);
                                }
                                updateCartInfo();
                                jQuery("#order_coupon .content").load(window.location.href + ' #order_coupon .content>*');
                                jQuery("#order_vip_coupon .content").load(window.location.href + ' #order_vip_coupon .content>*');
                            }
                        }, 'json');
                    }
                });
            }
        });
      //将cookie 中的生日牌信息 写入相应位置
      //start
      var item_tr = $('.item_display');
      var login_name = $('#j_header_uname').html();
      item_tr.each(function(){
          var productId = $(this).attr('productid');
          var birthday_card_cookie = $.parseJSON(Cookie.read('birthday_card_cookie'));
          if(birthday_card_cookie){
              if(eval('birthday_card_cookie['+productId+']')){
                  var content = eval('birthday_card_cookie['+productId+'].content');
                  var cookie_login_name = eval('birthday_card_cookie['+productId+'].login_name');
                  if(login_name){
                      if((cookie_login_name == login_name) || !cookie_login_name){
                        $(this).find('.brith_card_display').html(content);
                        $(this).find('.brith_card_hidden').val(content);
                        $(this).attr('birth_card',content);
                      }
                      for(i in birthday_card_cookie){
                        if(!birthday_card_cookie[i].login_name){
                          birthday_card_cookie[i].login_name = login_name;
                          Cookie.write('birthday_card_cookie',JsonToStr(birthday_card_cookie),{domain: '21cake.com','path':'/','duration':365});
                        }
                      }
                  }else{
                    if(!cookie_login_name){
                      $(this).find('.brith_card_display').html(content);
                      $(this).find('.brith_card_hidden').val(content);
                      $(this).attr('birth_card',content);
                    }
                  }
              }
          }
        //添加定制语
        var custom_word = null;
        var session_word = sessionStorage.getItem("custom_word");
        if(session_word && session_word != "null"){
            custom_word = JSON.parse(decodeURIComponent(session_word));
        }
        if(custom_word && (productId in custom_word)){
            var custom_word_textarea = $("<input type=\"hidden\" name=\"custom_lang["+productId+"]\" />");
            $(this).append(custom_word_textarea.val(decodeURIComponent(custom_word[productId])));
        }
      })
      //end
    })(window.jQuery);
});

  function init_time_scope() {
        var def = $('def_ship_date');
        var default_date = $j("#curr_ship_date").attr("default_date");
        var hasTime  = $j("#hasTime").val();
        if(def.value != default_date && default_date != "" && hasTime != "true"){
             def.value = default_date;
        }
        var curr = $('curr_ship_date');
        var def_date = strtotime(def.value + "|00:00:00");
        var curr_date = strtotime(repair_time(curr.value) + "|00:00:00");
        var time_list = JSON.decode($('ship_time_list').value);
    
        if (curr_date < def_date && hasTime != "true" ) {
            curr.value = def.value;
            time_list = time_list.all_time_list;
            //return Message.error('该时间无法配送，请选址其他日期或者时间进行配送!');
        } else if (def_date == curr_date) {
            time_list = time_list.def_time_list;
        } else {
            time_list = time_list.all_time_list;
        }
        update_del_time(time_list);
    }

  function strtotime(strings) {
        var arr = strings.split("|");
        var arr1 = arr[0].split("-");
        var arr2 = arr[1].split(":");
        var year = arr1[0];
        var month = arr1[1] - 1;
        var day = arr1[2];
        var hour = arr2[0];
        var mon = arr2[1];
        var timestamp = new Date(year, month, day, hour, mon).getTime() / 1000;
        return timestamp;
    }

    function repair_time(str) {
        var time = str.split('-');
        var M = time[1].length == 1 ? '0' + time[1] : time[1];
        var D = time[2].length == 1 ? '0' + time[2] : time[2];
        return time[0] + '-' + M + '-' + D;
    }

    function update_del_time(time_list) {
        var tpl = '';
        time_list.each(function (v) {
            tpl += '<li class="scope_item" rel="' + v + '">' + v + '</li>'
        });
        if (tpl.indexOf($('ship_time_scope').value) == -1) {
            $('ship_time_scope').value = '';
        }

        $('ship_time_scope_list') && $('ship_time_scope_list').destroy();

        new Element('ul', {
            'id': 'ship_time_scope_list',
            'class': 'ship_time_scope_list',
            'styles': {position: 'absolute', display: 'none'},
            'html': tpl
        }).inject(document.body);
    }

    function hide_access() {
        var access = jQuery('.access_chk');
        access.prop("style").display="none";
        jQuery.each(access, function(k,v){
            var gid = jQuery(this).attr('goods_id');
            var item_id = 'access_chk_'+gid;
            var item = jQuery("#"+item_id);
            if(item.get(0) != undefined) {
                item.prop("style").display="none";
            }
        });
        jQuery.each(access, function(k,v){
            var gid = jQuery(this).attr('goods_id');
            var bn = jQuery(this).attr('bn');
            var item_id = 'item_display_'+bn+'_'+gid;
            var item = jQuery("#"+item_id);
            if(item.get(0) != undefined) {
                item.prop("style").display="none";
            }
        });
    }
  
