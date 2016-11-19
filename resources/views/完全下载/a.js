
    var main = $('main');
    var container = $('product_container');
    var section = $('product_section');
    priceControl.spec = {"decimals":"1","dec_point":".","thousands_sep":"","fonttend_decimal_type":"0","fonttend_decimal_remain":"1","sign":"\uffe5"};
    
    //请求库存和价格
    var Router = {
        price: function (id) {
            return '/product-ajax_product_price-'+id+'.html';
        },
        stock: function (id,pdate) {
            return '/product-ajax_product_store-'+id+'-'+pdate+'.html';
        },
        basic: function (id) {
            return '/product-ajax_product_basic-'+id+'.html';
        }
    };

    var Query = function (url, options) {
        var self = this;
        this.send = function (url, options) {
            options = Object.merge({
                url: url,
                method: 'post',
                link: 'chain'
            }, options || {});
            return new Request(options).send();
        };
        this.update = function (url, update, options) {
            options = Object.merge({
                url: url,
                update: update,
                method: 'post',
                link: 'chain'
            }, options || {});
            new Request.HTML(options).send();
        };
        this.price = function (options) {
            options = Object.merge({
                method: 'get',
                onSuccess: function (rs) {
                    rs = JSON.decode(rs);

                    if (rs && Object.getLength(rs)) {
                        if (rs.error) {
                            return Message.error(rs.error);
                        }
                                                Object.each(rs, function (v, k) {
                            if (typeOf(v) === 'array') {
                                var s = '';
                                v.each(function (vi) {
                                    s += '<li>' + vi.name + '：' + priceControl.format(vi.price) + '</li>';
                                });
                                v = '<ul>' + s + '</ul>';
                            }
                            else {
                                v = priceControl.format(v).substr(1);
                            }
                            var el = main.getElement('.action-' + k);
                            if (el) {
                                if (!v) el.getParent().hide();
                                else el.set('html', v);
                            }
                        });
                    }
                }
            }, options || {});
            var url = Router.price(options.id);
            this.send.delay(0, this, [url, options]);
        };
        this.stock = function (options) {
            if (!container.getElement('.product-buy-quantity')) return;
            var pdate = '后天';
            options = Object.merge({
                method: 'get',
                onSuccess: function (rs) {
                    rs = JSON.decode(rs);
                    if (rs && Object.getLength(rs)) {
                        if (rs.error) {
                            return Message.error(rs.error);
                        }
                        var tpl = '<span class="p-quantity"><a href="javascript:void(0);" class="btn-decrease">-</a><input type="text" name="goods[num]" class="action-quantity-input" value="1" min="1" max="99"><a href="javascript:void(0);" class="btn-increase">+</a></span><span class="p-store">{title}</span><input type="hidden" name="stock" value="{store}"><a href="#" class="timeToolTipDetail" title="查看配送时间">查看配送时间</a>';
                        container.getElement('.product-buy-quantity .item-content').innerHTML = tpl.substitute(rs);
                        if (!rs.store) {
                            container.getElement('.action-quantity-input').disabled = true;
                            container.getElement('.product-buy-quantity').addClass('hide');
                            container.getElements('.action-buynow, .action-addtocart').addClass('hide');
                            container.getElement('.action-notify').removeClass('hide');
                                                    }
                        else {
                                                    }
                        if (!rs.title) {
                            container.getElements('.p-store').addClass('hide');
                        }
                    }
                }
            }, options || {});
            var url = Router.stock(options.id,pdate);
            this.send.delay(300, this, [url, options]);
        };
    };
    Query = new Query;

    attachAction('6122');
    bindQuantityEvent(container, setQuantity);

    //== 为数量选择框绑定事件
    function bindQuantityEvent(elements, callback) {
        elements = document.id(elements) || $$(elements);
        if (!elements && !elements.length) return;
        var value = '';
        elements.addEvents({
            //= 数量按钮
            'click:relay(.btn-decrease,.btn-increase)': function (e) {
                var input = this.getParent().getElement('.action-quantity-input');
                value = +input.value;
                input.value = this.hasClass('btn-decrease') ? value - 1 : value + 1;
                callback && callback(input, value);
            },
            //= 数量输入框
            'focus:relay(.action-quantity-input)': function (e) {
                value = +this.value;
            },
            'change:relay(.action-quantity-input)': function (e) {
                callback && callback(this, value);
            }
        });
    }
    //== 获取商品数量值
    function getQuantity(el, type) {
        return el.getElement('input[name=' + type + ']').value;
    }
    //== 设置商品数量
    function setQuantity(input, value) {
        var type = 'product';
        var p = input.getParent('li');
        inputCheck(input, {min: input.get('min'), max: input.get('max'), 'default': value, store: getQuantity(p, 'stock'), callback: window.quantityCallback});
    }
    //== 商品数量输入框正确性检测
    function inputCheck(input, options) {
        if (!input) return false;
        options = options || {};
        if (isNaN(options.min)) options.min = 1;
        if (isNaN(options.max)) options.max = 99;
        options['default'] = options['default'] || options.min;
        var value = +input.value;
        var tips = new Tips(input);
        var pre = '';
        var msg = '';
        if (options.store && options.store - value <= 0) {
            pre = '库存有限，';
        }
        if (value < options.min) {
            input.value = options.min;
            msg = '此商品的最小购买数量为' + options.min + '件';
        }
        else if (value > options.max) {
            input.value = options.max;
            msg = pre + '此商品最多只能购买' + options.max + '件';
        }
        else if (isNaN(value)) {
            input.value = options['default'];
            msg = '只允许输入数字';
        }
        if (msg) {
            tips.show(msg);
            return false;
        }
        tips.hide();
        if (options.callback) options.callback(input, options['default']);
        return true;
    }
        
    //== 商品详情图片延迟加载，并缩放到合适大小
    var sectionWidth = section.getStyle('width').toInt();
    new DataLazyLoad({containers: section, textarea: 'action-lazyload', onCallback: function () {
        section.getElements('img').each(function (img) {
            img.zoomImg(sectionWidth);
        });
    }});

    //== 异步加载商品详情tab
    var param = {
                goodsLink: {append: section, name: 'product_related', require: 'product_consult'}
    }, queue_items = [];
    Object.each(param, function (v, k) {
        queue_items.push(Object.append({
            url: '/product-'+k+'-297.html'
        }, v));
    });

    var lazyload = new LayoutRequest(queue_items);
    queue_items.each(function (q) {
        lazyload.request.call(lazyload, q);
    });

    //== 处理评论咨询回复异步请求
    function storeAjaxConfig(cont, handle, area, type) {
        // $(cont).getElements(trigger).each(function(handle){
        var update;
        var element = $(cont).getElement(handle);
        element.retrieve('_ajax_config') || element.store('_ajax_config', {
            onSuccess: function (rs) {
                rs = rs[0];
                if (rs && rs.success && rs.data) {
                    update = $(area);
                    if (!update) {
                        var active = element.getParent('.mod').getElement('.active-handle');
                        update = active.getParent(area);
                        closeReply(element);
                    }
                    rs.html = rs.data.stripScripts(function (script) {
                        rs.javascript = script;
                    });
                    update.set('html', rs.html);
                    Browser.exec(rs.javascript);

                    Message.success(rs.success);

                    if (type) location.href = '#' + cont;
                    resetForm(element.getParent('form'));
                    storeAjaxConfig(cont, handle, area, type);
                }
            }
        });
        // });
    }
    //== 重置提交表单
    function resetForm(form) {
        form.reset();
        form.blur();
        try {
            form.getElement('img.verify-code').addClass('hide');
        } catch (e) {
        }
    }

    var imgTimer = false;
    function setIntervalIMG(el) {
        clearInterval(imgTimer);
        imgTimer = setInterval(function () {
            var parent = el.getParent('ul');
            var curr = parent.getElements('.active')[0];
            var next = curr.getNext();
            if (next == null) {
                next = parent.getElement('li');
            }
            curr.removeClass('active');
            next.addClass('active');
            $('op_product_zoom').getElement('img').set('src', next.getElement('a').get('rev'));
        }, 5000);

    }
    //== 处理商品基本信息交互
    function attachAction(id) {
        //== 价格和库存异步加载
        Query.price({id: id});
        Query.stock({id: id});
                //== 商品相册图放大镜
        window.addEvent('domready', function () {
            new AlbumZoom('product_album', {
                                zoomable: false,
                                zoomsSize: {
                    x:400,
                    y:300                }
            });

            $$('.thumbnail-list .thumbnail').addEvents({
                'mouseover': function () {
                    clearInterval(imgTimer)
                },
                'mouseout': function () {
                    setIntervalIMG(this);
                }
            });
            setIntervalIMG($$('.thumbnail-list .thumbnail')[0]);
        });
            }

    var ajax;
    var state;
    container.addEvents({
        'click:relay(.action-slidedown)': function (e) {
            var panel = this.getParent('.switchable-panel');
            var top = panel.getElement('.panel-top');
            var cont = this.getParent('.product-promotion');
            if (!panel.hasClass('unfold')) {
                top && top.setStyle('height', 'auto');
                panel.addClass('unfold');
            }
            else {
                top && top.setStyle('height', 82);
                panel.removeClass('unfold');
            }

            toggleText(this.getElement('.icon'));
            toggleText(this.getElement('.text'));
        },
        'mouseenter:relay(.action-handle)': function (e) {
            var menu = this.getNext('.pop-body');
            if (menu) {
                clearTimeout(menu.timer);
                menu.show();
            }
        },
        'mouseenter:relay(.pop-body)': function (e) {
            clearTimeout(this.timer);
        },
        'mouseleave:relay(.pop-wrapper)': function (e) {
            var menu = this.getElement('.pop-body');
            menu.timer = menu.hide.delay(200, menu);
        },
        'click:relay(.pop-close)': function (e) {
            this.getParent('.pop-body').hide();
        },
        'click:relay(.action-buynow)': function (e) {
                        var form = this.getParent('form');
            form.getElement('input[name=btype]').value = 'driect_buy';
            form.store('target', form.target).target = '';
                    },
        'click:relay(.action-addtocart)': function () {
            var form = this.getParent('form');
            var target = form.retrieve('target');
            form.getElement('input[name=btype]').value = '';
            if (target) form.target = target;
        },
        'click:relay(.action-notify)': function (e) {
            var dialog = new Dialog($('product_notify').wrapped(), {
                title: '到货通知',
                width: 400,
                modal: {
                    'class': 'cover'
                },
                onLoad: function () {
                    var content = this.content;
                    content.getElement('[rel=_request]').store('_ajax_config', {onSuccess: function (rs) {
                        if (rs && rs[0]) {
                            if (rs[0]['true']) {
                                content.getElement('.product-notify').innerHTML = '<div class="success"><i class="icon">&#x25;</i>联系方式已经成功提交，到货后会立刻通知您。</div>';
                                dialog.hide.delay(3000, dialog);
                            }
                        }
                    }});
                }
            });
        },
        'click:relay(.spec-attr)': function (e) {
            // 各个磅数选中的方法
            if (this.hasClass('selected')) return;
            var a = this.getElement('a');
            var url = a.href;
            // 添加五磅以上入口
            if(url=="javascript:void(0)"){

                return;
            }
            var id = a.rel;
            if (!id) return;
            if (window.history && history.pushState) {
                e.stop();
                /*html5 history manage*/
                if (ajax) {
                    ajax.cancel();
                }
                else {
                    state = {title: document.title, html: container.innerHTML, url: location.href, id: id};
                }
                ajax = Query.send(Router.basic(id), {
                    method: 'post',
                    onSuccess: function (rs) {
                        try {
                            rs = JSON.decode(rs);
                            if (rs.error) {
                                return Message.error(rs.error);
                            }
                        } catch (e) {
                            updateBasic(rs, id, url);
                        }
                    }
                });
            }
        }
    });
    if ('onpopstate' in window) {
        window.onpopstate = function (event) {
            if (ajax == null) return;
            var data;
            if (event && event.state) {
                data = event.state;
            } else {
                data = state;
            }
            document.title = data.title;
            updateBasic(data.html, data.id);
        }
    }

    function updateBasic(rs, id, url) {
        container.innerHTML = rs;
        attachAction(id);
                url && history.pushState({url: url, title: document.title, html: rs, id: id}, document.title, url);
        //迷你购物车
        formToCart();
    }

    $(document.body).addEvents({
        'click:relay(.btn-caution)': function (e) {
            if (this.hasClass('disabled')) return;
            var data = this.getParent('.form');
            if (!validate(data, 'all')) {
                e.stop();
                return;
            }
        },
        'click:relay(.inter-handle)': function (e) {
            e.preventDefault();
            var parent = this.getParent('.mod');
            var item = this.getParent('.comment-item') || this.getParent('.consult-item');
            var action = this.getParent('.reply-action') || this.getParent('.answer-action');
            var active = action.hasClass('active-handle');
            var reply = parent.getElement('.action-post-reply');
            var toggle = parent.getElement('.active-handle');
            if (toggle) {
                closeReply(toggle);
            }
            var id = item.getElement('input[name=id]').value;
            reply.getElement('input[name=id]').value = id;
            reply.removeClass('hide').setStyles({
                width: action.getSize().x - reply.getPatch('padding', 'border').x
            }).position({
                        target: this,
                        from: 'rt',
                        to: 'rb',
                        offset: {
                            y: 8
                        },
                        intoView: true
                    });
            if (active) {
                closeReply(this);
                // reply.addClass('hide');
            }
            else {
                openReply(this);
            }
        },
        'click:relay(.action-close-reply)': function (e) {
            e && e.preventDefault();
            closeReply(this);
        },
        'focus:relay(.action-code-form)': function (e) {
            var code = this.getElement('img.verify-code');
            if (code && !code.isVisible()) {
                code.removeClass('hide');
                            }
        },
        'click:relay(.auto-change-verify-handle)': function (e) {
            e.stop();
            changeVerify(this);
        },
        'click:relay(.pageview .flip)': function (e) {
            e.stop();
            Query.update(this.href, this.getParent('.action-content-list'));
        },
        'inputchange:relay(.action-filled-textarea)': function () {
            var p = this.getParent();
            var max = getVal(p, '.word-limit');
            var cur = p.getElement('.word-count .current');
            if (this.value.length > max) {
                this.value = this.value.substr(0, max);
                Message.error('内容最多输入' + max + '字');
            }
            cur.set('text', this.value.length);
        },
        'click:relay(.action-consult-trigger)': function (e) {
            e.preventDefault();
        }
    });

    function openReply(el) {
        var parent = el.getParent('.mod');
        var action = el.getParent('.reply-action') || el.getParent('.answer-action');
        var reply = parent.getElement('.action-post-reply');
        reply.removeClass('hide');
        action.addClass('active-handle');
        action.setStyle('height', parseInt(action.getStyle('height')) + reply.getSize().y);
    }
    function closeReply(el) {
        var parent = el.getParent('.comment-list') || el.getParent('.mod');
        var reply = parent.getElement('.action-post-reply');
        var action = parent.getElement('.active-handle');
        reply.addClass('hide');
        if (action) {
            action.removeClass('active-handle');
            action.setStyle('height', '');
        }
    }

    function notice(msg, inject, where, type) {
        var el = new Element('div.notice' + (type ? '.' + type : ''), {html: msg}).inject(inject, where);
        el.destroy.delay(3000, el);
    }
    notice.success = function (msg, inject, where) {
        notice('<q class="icon">&#x25;</q>' + msg, inject, where, 'success');
    };

    function getVal(p, c, i) {
        if (!c) return $(p).get('text');
        p = $(p).getElement(c).get('text');
        if (!i) return p;
        return Number.from(p);
    }
    function toggleText(el, attr) {
        attr = attr || 'data-toggle';
        var a = el.get(attr);
        var b = el.get('text');
        el.set(attr, b).set('text', a);
    }

    
    withBrowserStore(function (browserStore) {
        browserStore.get('history', function (history) {
            history = JSON.decode(history);
            if (!history || typeOf(history) !== 'array') history = [];
            if (history.length >= 40) history.pop();
            var newHst = {
                'goodsId': '6122',
                'goodsName': '21cake生日奶油蛋糕',
                'goodsImg': 'http://www.21cake.com/public/images/3f/33/2d/c4a85c12fb6a9e7a9ea62b87a1856226.jpg?1478240958#h',
                'price': '￥498.0',
                'goodsSpec': '\/0.5磅',
                'viewTime': +new Date()
            };
            if (history.length) {
                for (var i = history.length; i--;) {
                    if (history[i]['goodsId'] == newHst['goodsId']) {
                        history.splice(i, 1);
                        break;
                    }
                }
            }
            history.unshift(newHst);
            browserStore.set('history', JSON.encode(history));
        });
    });
