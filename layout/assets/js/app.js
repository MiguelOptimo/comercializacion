
(function( $ ){
    $.fn.ribbon = function(id) {
        if (!id) {
            if (this.attr('id')) {
                id = this.attr('id');
            }
        }
        
        var that = function() { 
            return thatRet;
        };
        
        
        var thatRet = that;
        
        that.selectedTabIndex = -1;
        
        var tabNames = [];
        
        that.goToBackstage = function() {
            ribObj.addClass('backstage');
        }
            
        that.returnFromBackstage = function() {
            ribObj.removeClass('backstage');
        } 
        that.lastIndex = 0;
        var ribObj = null;
        
        that.init = function(id) {
            if (!id) {
                id = 'ribbon';
            }
        
            ribObj = $('#'+id);
            $('div').attr('data-height', ribObj.height());
            $('div').attr('data-open', "true");
            
            ribObj.find('.ribbon-container').hide();

            ribObj.find('.ribbon-window-title').after('<div id="ribbon-tab-header-strip"></div>');
            var header = ribObj.find('#ribbon-tab-header-strip');



            ribObj.find('.ribbon-tab').each(function(index) {
                var id = $(this).attr('id');
                if (id == undefined || id == null)
                {
                    $(this).attr('id', 'tab-'+index);
                console.log(id);
                }
                tabNames[index] = id;
            
                var title = $(this).find('.ribbon-title');
                var isBackstage = $(this).hasClass('file');
                header.append('<div id="ribbon-tab-header-'+index+'" data-tab="'+id+'" class="ribbon-tab-header"></div>');
                var thisTabHeader = header.find('#ribbon-tab-header-'+index);
                thisTabHeader.append(title);
                if (isBackstage) {
                    thisTabHeader.addClass('file');
                    
                    thisTabHeader.click(function() {
                        that.switchToTabByIndex(index);
                        //that.goToBackstage();
                    });
                } else {
                    if (that.selectedTabIndex==-1) {
                        that.selectedTabIndex = index;
                        thisTabHeader.addClass('sel');
                    }
                    
                    thisTabHeader.click(function() {
                        that.returnFromBackstage();
                        that.switchToTabByIndex(index);
                    });
                }
                
                
                
                $(this).hide();
            });
            
            ribObj.find('.ribbon-button').each(function(index) {
                var title = $(this).find('.button-title');
                title.detach();
                $(this).append(title);
                
                var el = $(this);
                
                this.enable = function() {
                    el.removeClass('disabled');
                }
                this.disable = function() {
                    el.addClass('disabled');
                }
                this.isEnabled = function() {
                    return !el.hasClass('disabled');
                }
                                
                if ($(this).find('.ribbon-hot').length==0) {
                    $(this).find('.ribbon-normal').addClass('ribbon-hot');
                }           
                if ($(this).find('.ribbon-disabled').length==0) {
                    $(this).find('.ribbon-normal').addClass('ribbon-disabled');
                    $(this).find('.ribbon-normal').addClass('ribbon-implicit-disabled');
                }
                
                $(this).tooltip({
                    bodyHandler: function () {
                        if (!$(this).isEnabled()) { 
                            $('#tooltip').css('visibility', 'hidden');
                            return '';
                        }
                        
                        var tor = '';
                        if (jQuery(this).children('.button-help').size() > 0)
                            tor = (jQuery(this).children('.button-help').html());
                        else
                            tor = '';
                        if (tor == '') {
                            $('#tooltip').css('visibility', 'hidden');
                            return '';
                        }
                        $('#tooltip').css('visibility', 'visible');
                        return tor;
                    },
                    left: 0,
                    extraClass: 'ribbon-tooltip'
                });
            });
            
            ribObj.find('.ribbon-section').each(function(index) {
                $(this).after('<div class="ribbon-section-sep"></div>');
            });
            ribObj.find('div').attr('unselectable', 'on');
            ribObj.find('span').attr('unselectable', 'on');
            ribObj.attr('unselectable', 'on');
            that.switchToTabByIndex(that.selectedTabIndex);
            ribObj.on('selectstart', function (event) {
                event.preventDefault();
            });
            ribObj.find('.ribbon-container').fadeIn();
        }
        
        that.switchToTabByIndex = function(index) {
            var headerStrip = $('.ribbon #ribbon-tab-header-strip');
            headerStrip.find('.ribbon-tab-header').removeClass('sel');
                //this_headerStrip.removeClass('expanded');
            var this_headerStrip = headerStrip.find('#ribbon-tab-header-'+index);
            this_headerStrip.addClass('sel');
            $('.ribbon .ribbon-tab').hide();

            if(this_headerStrip.hasClass("file")){
                if(this_headerStrip.hasClass("expanded")){
                    $('.ribbon #'+tabNames[index]).hide();
                    this_headerStrip.removeClass('sel');
                    this_headerStrip.removeClass('expanded');
                    that.returnFromBackstage();
                    that.switchToTabByIndex(that.lastIndex);
                }
                else{
                    $('.ribbon #'+tabNames[index]).show();
                    this_headerStrip.addClass('expanded');                    
                    that.goToBackstage();
                }
            }
            else{
                that.lastIndex = index;
                headerStrip.find('.ribbon-tab-header').removeClass('expanded');
                $('.ribbon #'+tabNames[index]).show();
            }
        }
        
        $.fn.enable = function() {
            if (this.hasClass('ribbon-button')) {
                if (this[0] && this[0].enable) {
                    this[0].enable();
                }   
            }
            else {
                this.find('.ribbon-button').each(function() {
                    $(this).enable();
                });
            }               
        }
        
        
            
                
        $.fn.disable = function() {
            if (this.hasClass('ribbon-button')) {
                if (this[0] && this[0].disable) {
                    this[0].disable();
                }   
            }
            else {
                this.find('.ribbon-button').each(function() {
                    $(this).disable();
                });
            }               
        }
    
        $.fn.isEnabled = function() {
            if (this[0] && this[0].isEnabled) {
                return this[0].isEnabled();
            } else {
                return true;
            }
        }
    
        that.init(id);

        $('body').on('dblclick','.ribbon-tab-header', function (event) {
            console.log('dblclick not implemented');
        });

        $('body').on('click','#menu-mobile', function (event) {
            $(".ribbon-container").slideToggle("fast",function(){
                /*
                console.log($("#ribbon").data("height"));
                if($('div').attr('data-open') == 'true' ){

                }
                else{

                }
                */
                $('div').attr('data-open', $('div').attr('data-open') == 'true' ? 'flase' : 'true');
            });
            ///id = 'tab-'+index;
        });

    
        $.fn.ribbon = that;
    };
})( jQuery );

jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();
/*
 * jQuery Tooltip plugin 1.3
 *
 * http://bassistance.de/jquery-plugins/jquery-plugin-tooltip/
 * http://docs.jquery.com/Plugins/Tooltip
 *
 * Copyright (c) 2006 - 2008 Jörn Zaefferer
 *
 * $Id: jquery.tooltip.js 5741 2008-06-21 15:22:16Z joern.zaefferer $
 * 
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
;
(function($) {
    var helper = {},
        current, title, tID, IE = $.browser.msie && /MSIE\s(5\.5|6\.)/.test(navigator.userAgent),
        track = false;
    $.tooltip = {
        blocked: false,
        defaults: {
            delay: 200,
            fade: false,
            showURL: true,
            extraClass: "",
            top: 15,
            left: 15,
            id: "tooltip"
        },
        block: function() {
            $.tooltip.blocked = !$.tooltip.blocked;
        }
    };
    $.fn.extend({
        tooltip: function(settings) {
            settings = $.extend({}, $.tooltip.defaults, settings);
            createHelper(settings);
            return this.each(function() {
                $.data(this, "tooltip", settings);
                this.tOpacity = helper.parent.css("opacity");
                this.tooltipText = this.title;
                $(this).removeAttr("title");
                this.alt = "";
            }).mouseover(save).mouseout(hide).click(hide);
        },
        fixPNG: IE ? function() {
            return this.each(function() {
                var image = $(this).css('backgroundImage');
                if (image.match(/^url\(["']?(.*\.png)["']?\)$/i)) {
                    image = RegExp.$1;
                    $(this).css({
                        'backgroundImage': 'none',
                        'filter': "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=crop, src='" + image + "')"
                    }).each(function() {
                        var position = $(this).css('position');
                        if (position != 'absolute' && position != 'relative') $(this).css('position', 'relative');
                    });
                }
            });
        } : function() {
            return this;
        },
        unfixPNG: IE ? function() {
            return this.each(function() {
                $(this).css({
                    'filter': '',
                    backgroundImage: ''
                });
            });
        } : function() {
            return this;
        },
        hideWhenEmpty: function() {
            return this.each(

                function() {
                    $(this)[$(this).html() != '' ?
                        "show" : "hide"]();
                });
        },
        url: function() {
            return this.attr('href') || this.attr('src');
        }
    });

    function createHelper(settings) {
        if (helper.parent) return;
        helper.parent = $('<div id="' + settings.id + '"><h3></h3><div class="body"></div><div class="url"></div></div>').appendTo(document.body).hide();
        if ($.fn.bgiframe) helper.parent.bgiframe();
        helper.title = $('h3', helper.parent);
        helper.body = $('div.body', helper.parent);
        helper.url = $('div.url', helper.parent);
    }

    function settings(element) {
        return $.data(element, "tooltip");
    }

    function handle(event) {
        if (settings(this).delay) tID = setTimeout(show, settings(this).delay);
        else
            show();
        track = !!settings(this).track;
        $(document.body).on('mousemove', update);
        update(event);
    }

    function save() {
        if ($.tooltip.blocked || this == current || (!this.tooltipText && !settings(this).bodyHandler)) return;
        current = this;
        title = this.tooltipText;
        if (settings(this).bodyHandler) {
            helper.title.hide();
            var bodyContent = settings(this).bodyHandler.call(this);
            if (bodyContent.nodeType || bodyContent.jquery) {
                helper.body.empty().append(bodyContent)
            } else {
                helper.body.html(bodyContent);
            };
            if (helper.body != '') {
                helper.body.show();
            };
            helper.body.hideWhenEmpty()
        } else if (settings(this).showBody) {
            var parts = title.split(settings(this).showBody);
            helper.title.html(parts.shift()).show();
            helper.body.empty();
            for (var i = 0, part;
                (part = parts[i]); i++) {
                if (i > 0) helper.body.append("<br/>");
                helper.body.append(part);
            }
            helper.body.hideWhenEmpty();
        } else {
            helper.title.html(title).show();
            helper.body.hide();
        }
        if (settings(this).showURL && $(this).url()) helper.url.html($(this).url().replace('http://', '')).show();
        else
            helper.url.hide();
        helper.parent.addClass(settings(this).extraClass);
        if (settings(this).fixPNG) helper.parent.fixPNG();
        handle.apply(this, arguments);
    }

    function show() {
        tID = null;
        if ((!IE || !$.fn.bgiframe) && settings(current).fade) {
            if (helper.parent.is(":animated")) helper.parent.stop().show().fadeTo(settings(current).fade, current.tOpacity);
            else
                helper.parent.is(':visible') ? helper.parent.fadeTo(settings(current).fade, current.tOpacity) : helper.parent.fadeIn(settings(current).fade);
        } else {
            helper.parent.show();
        }
        update();
    }

    function update(event) {
        if ($.tooltip.blocked) return;
        if (event && event.target.tagName == "OPTION") {
            return;
        }
        if (!track && helper.parent.is(":visible")) {
            //$(document.body).unbind('mousemove', update)
        }
        if (current == null) {
            //$(document.body).unbind('mousemove', update);
            return;
        }
        helper.parent.removeClass("viewport-right").removeClass("viewport-bottom");
        var left = helper.parent[0].offsetLeft;
        var top = helper.parent[0].offsetTop;
        if (event) {
            left = event.pageX + settings(current).left;
            top = event.pageY + settings(current).top;
            var right = 'auto';
            if (settings(current).positionLeft) {
                right = $(window).width() - left;
                left = 'auto';
            }
            helper.parent.css({
                left: left,
                right: right,
                top: top
            });
        }
        var v = viewport(),
            h = helper.parent[0];
        if (v.x + v.cx < h.offsetLeft + h.offsetWidth) {
            left -= h.offsetWidth + 20 + settings(current).left;
            helper.parent.css({
                left: left + 'px'
            }).addClass("viewport-right");
        }
        if (v.y + v.cy < h.offsetTop + h.offsetHeight) {
            top -= h.offsetHeight + 20 + settings(current).top;
            helper.parent.css({
                top: top + 'px'
            }).addClass("viewport-bottom");
        }
    }

    function viewport() {
        return {
            x: $(window).scrollLeft(),
            y: $(window).scrollTop(),
            cx: $(window).width(),
            cy: $(window).height()
        };
    }

    function hide(event) {
        if ($.tooltip.blocked) return;
        if (tID) clearTimeout(tID);
        current = null;
        var tsettings = settings(this);

        function complete() {
            helper.parent.removeClass(tsettings.extraClass).hide().css("opacity", "");
        }
        if ((!IE || !$.fn.bgiframe) && tsettings.fade) {
            if (helper.parent.is(':animated')) helper.parent.stop().fadeTo(tsettings.fade, 0, complete);
            else
                helper.parent.stop().fadeOut(tsettings.fade, complete);
        } else
            complete();
        if (settings(this).fixPNG) helper.parent.unfixPNG();
    }
})(jQuery);