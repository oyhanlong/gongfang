/*! Copyright (c) 2013 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.1.3
 *
 * Requires: 1.2.2+
 */
(function(factory){if(typeof define==='function'&&define.amd){define(['jquery'],factory);}else if(typeof exports==='object'){module.exports=factory;}else{factory(jQuery);}}(function($){var toFix=['wheel','mousewheel','DOMMouseScroll','MozMousePixelScroll'];var toBind='onwheel'in document||document.documentMode>=9?['wheel']:['mousewheel','DomMouseScroll','MozMousePixelScroll'];var lowestDelta,lowestDeltaXY;if($.event.fixHooks){for(var i=toFix.length;i;){$.event.fixHooks[toFix[--i]]=$.event.mouseHooks;}}$.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var i=toBind.length;i;){this.addEventListener(toBind[--i],handler,false);}}else{this.onmousewheel=handler;}},teardown:function(){if(this.removeEventListener){for(var i=toBind.length;i;){this.removeEventListener(toBind[--i],handler,false);}}else{this.onmousewheel=null;}}};$.fn.extend({mousewheel:function(fn){return fn?this.bind("mousewheel",fn):this.trigger("mousewheel");},unmousewheel:function(fn){return this.unbind("mousewheel",fn);}});function handler(event){var orgEvent=event||window.event,args=[].slice.call(arguments,1),delta=0,deltaX=0,deltaY=0,absDelta=0,absDeltaXY=0,fn;event=$.event.fix(orgEvent);event.type="mousewheel";if(orgEvent.wheelDelta){delta=orgEvent.wheelDelta;}if(orgEvent.detail){delta=orgEvent.detail* -1;}if(orgEvent.deltaY){deltaY=orgEvent.deltaY* -1;delta=deltaY;}if(orgEvent.deltaX){deltaX=orgEvent.deltaX;delta=deltaX* -1;}if(orgEvent.wheelDeltaY!==undefined){deltaY=orgEvent.wheelDeltaY;}if(orgEvent.wheelDeltaX!==undefined){deltaX=orgEvent.wheelDeltaX* -1;}absDelta=Math.abs(delta);if(!lowestDelta||absDelta<lowestDelta){lowestDelta=absDelta;}absDeltaXY=Math.max(Math.abs(deltaY),Math.abs(deltaX));if(!lowestDeltaXY||absDeltaXY<lowestDeltaXY){lowestDeltaXY=absDeltaXY;}fn=delta>0?'floor':'ceil';delta=Math[fn](delta/lowestDelta);deltaX=Math[fn](deltaX/lowestDeltaXY);deltaY=Math[fn](deltaY/lowestDeltaXY);args.unshift(event,delta,deltaX,deltaY);return($.event.dispatch||$.event.handle).apply(this,args);}}));
/*! easyscroll v.1.0 | Copyright (c) 2013 atomxml.org
 *  Demo, Download: http://atomxml.org/demo_easyscroll
 *  Licensed under the MIT License (http://atomxml.org/demo_easyscroll/MIT-LICENSE.txt).
 */
!function(a,b,c){a.fn.scroll_absolute=function(d){function e(d,e){function f(b){var e,h,j,l,m,n,q= !1,r= !1;if(P=b,Q===c)m=d.scrollTop(),n=d.scrollLeft(),d.css({overflow:"hidden",padding:0}),R=d.innerWidth()+tb,S=d.innerHeight(),d.width(R),Q=a('<div class="scroll_absolute"></div>').css("padding",sb).append(d.children()),T=a('<div class="scroll_container"></div>').css({width:R+"px",height:S+"px"}).append(Q).appendTo(d);else{if(d.css("width",""),q=P.stickToBottom&&C(),r=P.stickToRight&&D(),l=d.innerWidth()+tb!=R||d.outerHeight()!=S,l&&(R=d.innerWidth()+tb,S=d.innerHeight(),T.css({width:R+"px",height:S+"px"})),!l&&ub==U&&Q.outerHeight()==V)return d.width(R),void 0;ub=U,Q.css("width",""),d.width(R),T.find(">.scroll_vertical_bar,>.scroll_horizontal_bar").remove().end()}Q.css("overflow","auto"),U=b.contentWidth?b.contentWidth:Q[0].scrollWidth,V=Q[0].scrollHeight,Q.css("overflow",""),W=U/R,X=V/S,Y=X>1,Z=W>1,Z||Y?(d.addClass("easy_scrollable"),e=P.maintainPosition&&(ab||db),e&&(h=A(),j=B()),g(),i(),k(),e&&(y(r?U-R:h,!1),x(q?V-S:j,!1)),H(),E(),N(),P.enableKeyboardNavigation&&J(),P.clickOnTrack&&o(),L(),P.hijackInternalLinks&&M()):(d.removeClass("easy_scrollable"),Q.css({top:0,left:0,width:T.width()-tb}),F(),I(),K(),p()),P.autoReinitialise&& !rb?rb=setInterval(function(){f(P)},P.autoReinitialiseDelay): !P.autoReinitialise&&rb&&clearInterval(rb),m&&d.scrollTop(0)&&x(m,!1),n&&d.scrollLeft(0)&&y(n,!1),d.trigger("easy-initialised",[Z||Y])}function g(){Y&&(T.append(a('<div class="scroll_vertical_bar" style="-webkit-user-select:none"></div>').append(a('<div class="scroll_cap scroll_cap_top"></div>'),a('<div class="scroll_track"></div>').append(a('<div class="scroll_drag"></div>').append(a('<div class="scroll_drag_top"></div>'),a('<div class="scroll_drag_bottom"></div>'))),a('<div class="scroll_cap scroll_cap_bottom"></div>'))),eb=T.find(">.scroll_vertical_bar"),fb=eb.find(">.scroll_track"),$=fb.find(">.scroll_drag"),P.arrows&&(jb=a('<a class="scroll_arrow scroll_arrow_up"></div>').bind("mousedown.easy",m(0,-1)).bind("click.easy",G),kb=a('<a class="scroll_arrow scroll_arrow_down"></div>').bind("mousedown.easy",m(0,1)).bind("click.easy",G),P.arrowScrollOnHover&&(jb.bind("mouseover.easy",m(0,-1,jb)),kb.bind("mouseover.easy",m(0,1,kb))),l(fb,P.verticalArrowPositions,jb,kb)),hb=S,T.find(">.scroll_vertical_bar>.scroll_cap:visible,>.scroll_vertical_bar>.scroll_arrow").each(function(){hb-=a(this).outerHeight()}),$.hover(function(){$.addClass("easy_hover")},function(){$.removeClass("easy_hover")}).bind("mousedown.easy",function(b){a("html").bind("dragstart.easy selectstart.easy",G),$.addClass("easy_active");var c=b.pageY-$.position().top;return a("html").bind("mousemove.easy",function(a){r(a.pageY-c,!1)}).bind("mouseup.easy mouseleave.easy",q),!1}),h())}function h(){fb.height(hb+"px"),ab=0,gb=P.verticalGutter+fb.outerWidth(),Q.width(R-gb-tb);try{0===eb.position().left&&Q.css("margin-left",gb+"px")}catch(a){}}function i(){Z&&(T.append(a('<div class="scroll_horizontal_bar" style="-webkit-user-select:none"></div>').append(a('<div class="scroll_cap scroll_cap_left"></div>'),a('<div class="scroll_track"></div>').append(a('<div class="scroll_drag"></div>').append(a('<div class="scroll_drag_left"></div>'),a('<div class="scroll_drag_right"></div>'))),a('<div class="scroll_cap scroll_cap_right"></div>'))),lb=T.find(">.scroll_horizontal_bar"),mb=lb.find(">.scroll_track"),bb=mb.find(">.scroll_drag"),P.arrows&&(pb=a('<a class="scroll_arrow scroll_arrow_left"></div>').bind("mousedown.easy",m(-1,0)).bind("click.easy",G),qb=a('<a class="scroll_arrow scroll_arrow_right"></div>').bind("mousedown.easy",m(1,0)).bind("click.easy",G),P.arrowScrollOnHover&&(pb.bind("mouseover.easy",m(-1,0,pb)),qb.bind("mouseover.easy",m(1,0,qb))),l(mb,P.horizontalArrowPositions,pb,qb)),bb.hover(function(){bb.addClass("easy_hover")},function(){bb.removeClass("easy_hover")}).bind("mousedown.easy",function(b){a("html").bind("dragstart.easy selectstart.easy",G),bb.addClass("easy_active");var c=b.pageX-bb.position().left;return a("html").bind("mousemove.easy",function(a){t(a.pageX-c,!1)}).bind("mouseup.easy mouseleave.easy",q),!1}),nb=T.innerWidth(),j())}function j(){T.find(">.scroll_horizontal_bar>.scroll_cap:visible,>.scroll_horizontal_bar>.scroll_arrow").each(function(){nb-=a(this).outerWidth()}),mb.width(nb+"px"),db=0}function k(){if(Z&&Y){var b=mb.outerHeight(),c=fb.outerWidth();hb-=b,a(lb).find(">.scroll_cap:visible,>.scroll_arrow").each(function(){nb+=a(this).outerWidth()}),nb-=c,S-=c,R-=b,mb.parent().append(a('<div class="scroll_corner"></div>').css("width",b+"px")),h(),j()}Z&&Q.width(T.outerWidth()-tb+"px"),V=Q.outerHeight(),X=V/S,Z&&(ob=Math.ceil(1/W*nb),ob>P.horizontalDragMaxWidth?ob=P.horizontalDragMaxWidth:ob<P.horizontalDragMinWidth&&(ob=P.horizontalDragMinWidth),bb.width(ob+"px"),cb=nb-ob,u(db)),Y&&(ib=Math.ceil(1/X*hb),
ib>P.verticalDragMaxHeight?ib=P.verticalDragMaxHeight:ib<P.verticalDragMinHeight&&(ib=P.verticalDragMinHeight),$.height(ib+"px"),_=hb-ib,s(ab))};function l(a,b,c,d){var e,f="before",g="after";"os"==b&&(b=/Mac/.test(navigator.platform)?"after":"split"),b==f?g=b:b==g&&(f=b,e=c,c=d,d=e),a[f](c)[g](d)}function m(a,b,c){return function(){return n(a,b,this,c),this.blur(),!1}}function n(b,c,d,e){d=a(d).addClass("easy_active");var f,g,h= !0,i=function(){0!==b&&vb.scrollByX(b*P.arrowButtonSpeed),0!==c&&vb.scrollByY(c*P.arrowButtonSpeed),g=setTimeout(i,h?P.initialDelay:P.arrowRepeatFreq),h= !1};i(),f=e?"mouseout.easy":"mouseup.easy",e=e||a("html"),e.bind(f,function(){d.removeClass("easy_active"),g&&clearTimeout(g),g=null,e.unbind(f)})}function o(){p(),Y&&fb.bind("mousedown.easy",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageY-f.top-ab,h= !0,i=function(){var a=e.offset(),c=b.pageY-a.top-ib/2,f=S*P.scrollPagePercent,k=_*f/(V-S);if(0>g)ab-k>c?vb.scrollByY(-f):r(c);else{if(!(g>0))return j(),void 0;c>ab+k?vb.scrollByY(f):r(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h= !1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.easy",j)};return i(),a(document).bind("mouseup.easy",j),!1}}),Z&&mb.bind("mousedown.easy",function(b){if(b.originalTarget===c||b.originalTarget==b.currentTarget){var d,e=a(this),f=e.offset(),g=b.pageX-f.left-db,h= !0,i=function(){var a=e.offset(),c=b.pageX-a.left-ob/2,f=R*P.scrollPagePercent,k=cb*f/(U-R);if(0>g)db-k>c?vb.scrollByX(-f):t(c);else{if(!(g>0))return j(),void 0;c>db+k?vb.scrollByX(f):t(c)}d=setTimeout(i,h?P.initialDelay:P.trackClickRepeatFreq),h= !1},j=function(){d&&clearTimeout(d),d=null,a(document).unbind("mouseup.easy",j)};return i(),a(document).bind("mouseup.easy",j),!1}})}function p(){mb&&mb.unbind("mousedown.easy"),fb&&fb.unbind("mousedown.easy")}function q(){a("html").unbind("dragstart.easy selectstart.easy mousemove.easy mouseup.easy mouseleave.easy"),$&&$.removeClass("easy_active"),bb&&bb.removeClass("easy_active")}function r(a,b){Y&&(0>a?a=0:a>_&&(a=_),b===c&&(b=P.animateScroll),b?vb.animate($,"top",a,s):($.css("top",a),s(a)))}function s(a){a===c&&(a=$.position().top),T.scrollTop(0),ab=a;var b=0===ab,e=ab==_,f=a/_,g= -f*(V-S);(wb!=b||yb!=e)&&(wb=b,yb=e,d.trigger("easy-arrow-change",[wb,yb,xb,zb])),v(b,e),Q.css("top",g),d.trigger("easy-scroll-y",[-g,b,e]).trigger("scroll")}function t(a,b){Z&&(0>a?a=0:a>cb&&(a=cb),b===c&&(b=P.animateScroll),b?vb.animate(bb,"left",a,u):(bb.css("left",a),u(a)))}function u(a){a===c&&(a=bb.position().left),T.scrollTop(0),db=a;var b=0===db,e=db==cb,f=a/cb,g= -f*(U-R);(xb!=b||zb!=e)&&(xb=b,zb=e,d.trigger("easy-arrow-change",[wb,yb,xb,zb])),w(b,e),Q.css("left",g),d.trigger("easy-scroll-x",[-g,b,e]).trigger("scroll")}function v(a,b){P.arrows&&(jb[a?"addClass":"removeClass"]("scroll_disabled"),kb[b?"addClass":"removeClass"]("scroll_disabled"))}function w(a,b){P.arrows&&(pb[a?"addClass":"removeClass"]("scroll_disabled"),qb[b?"addClass":"removeClass"]("scroll_disabled"))}function x(a,b){var c=a/(V-S);r(c*_,b)}function y(a,b){var c=a/(U-R);t(c*cb,b)}function z(b,c,d){var e,f,g,h,i,j,k,l,m,n=0,o=0;try{e=a(b)}catch(p){return}for(f=e.outerHeight(),g=e.outerWidth(),T.scrollTop(0),T.scrollLeft(0);!e.is(".scroll_absolute");)if(n+=e.position().top,o+=e.position().left,e=e.offsetParent(),/^body|html$/i.test(e[0].nodeName))return;h=B(),j=h+S,h>n||c?l=n-P.verticalGutter:n+f>j&&(l=n-S+f+P.verticalGutter),isNaN(l)||x(l,d),i=A(),k=i+R,i>o||c?m=o-P.horizontalGutter:o+g>k&&(m=o-R+g+P.horizontalGutter),isNaN(m)||y(m,d)}function A(){return-Q.position().left}function B(){return-Q.position().top}function C(){var a=V-S;return a>20&&a-B()<10}function D(){var a=U-R;return a>20&&a-A()<10}function E(){T.unbind(Bb).bind(Bb,function(a,b,c,d){var e=db,f=ab;return vb.scrollBy(c*P.mouseWheelSpeed,-d*P.mouseWheelSpeed,!1),e==db&&f==ab})}function F(){T.unbind(Bb)}function G(){return!1}function H(){Q.find(":input,a").unbind("focus.easy").bind("focus.easy",function(a){z(a.target,!1)})}function I(){Q.find(":input,a").unbind("focus.easy")}function J(){function b(){var a=db,b=ab;switch(c){case 40:vb.scrollByY(P.keyboardSpeed,!1);break;case 38:vb.scrollByY(-P.keyboardSpeed,!1);break;case 34:case 32:vb.scrollByY(S*P.scrollPagePercent,!1);break;case 33:vb.scrollByY(-S*P.scrollPagePercent,!1);break;case 39:vb.scrollByX(P.keyboardSpeed,!1);break;case 37:vb.scrollByX(-P.keyboardSpeed,!1)}return e=a!=db||b!=ab}var c,e,f=[];Z&&f.push(lb[0]),Y&&f.push(eb[0]),Q.focus(function(){d.focus()}),d.attr("tabindex",0).unbind("keydown.easy keypress.easy").bind("keydown.easy",function(d){if(d.target===this||f.length&&a(d.target).closest(f).length){var g=db,h=ab;switch(d.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:c=d.keyCode,b();break;case 35:x(V-S),c=null;break;case 36:x(0),c=null}return e=d.keyCode==c&&g!=db||h!=ab,!e}}).bind("keypress.easy",function(a){return a.keyCode==c&&b(),!e}),P.hideFocus?(d.css("outline","none"),"hideFocus"in T[0]&&d.attr("hideFocus",!0)):(d.css("outline","none"),"hideFocus"in T[0]&&d.attr("hideFocus",!1))}function K(){d.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.easy keypress.easy")}function L(){if(location.hash&&location.hash.length>1){var b,c,d=escape(location.hash.substr(1));try{b=a("#"+d+', a[name="'+d+'"]')}catch(e){return}b.length&&Q.find(d)&&(0===T.scrollTop()?c=setInterval(function(){T.scrollTop()>0&&(z(b,!0),a(document).scrollTop(T.position().top),clearInterval(c))},50):(z(b,!0),a(document).scrollTop(T.position().top)))}}function M(){a(document.body).data("easy_hijack")||(a(document.body).data("easy_hijack",!0),a(document.body).delegate("a[href*=#]","click",function(c){var d,e,f,g,h,i,j=this.href.substr(0,this.href.indexOf("#")),k=location.href;if(-1!==location.href.indexOf("#")&&(k=location.href.substr(0,location.href.indexOf("#"))),j===k){d=escape(this.href.substr(this.href.indexOf("#")+1));try{e=a("#"+d+', a[name="'+d+'"]')}catch(l){return}e.length&&(f=e.closest(".easy_scrollable"),g=f.data("easy"),g.scrollToElement(e,!0),f[0].scrollIntoView&&(h=a(b).scrollTop(),i=e.offset().top,(h>i||i>h+a(b).height())&&f[0].scrollIntoView()),c.preventDefault())}}))}function N(){var a,b,c,d,e,f= !1;T.unbind("touchstart.easy touchmove.easy touchend.easy click.easy-touchclick").bind("touchstart.easy",function(g){var h=g.originalEvent.touches[0];a=A(),b=B(),c=h.pageX,d=h.pageY,e= !1,f= !0}).bind("touchmove.easy",function(g){if(f){var h=g.originalEvent.touches[0],i=db,j=ab;return vb.scrollTo(a+c-h.pageX,b+d-h.pageY),e=e||Math.abs(c-h.pageX)>5||Math.abs(d-h.pageY)>5,i==db&&j==ab}}).bind("touchend.easy",function(){f= !1}).bind("click.easy-touchclick",function(){return e?(e= !1,!1):void 0})}function O(){var a=B(),b=A();d.removeClass("easy_scrollable").unbind(".easy"),d.replaceWith(Ab.append(Q.children())),Ab.scrollTop(a),Ab.scrollLeft(b),rb&&clearInterval(rb)}var P,Q,R,S,T,U,V,W,X,Y,Z,$,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb,tb,ub,vb=this,wb= !0,xb= !0,yb= !1,zb= !1,Ab=d.clone(!1,!1).empty(),Bb=a.fn.mwheelIntent?"mwheelIntent.easy":"mousewheel.easy";sb=d.css("padding-top")+" "+d.css("padding-right")+" "+d.css("padding-bottom")+" "+d.css("padding-left"),tb=(parseInt(d.css("padding-left"),10)||0)+(parseInt(d.css("padding-right"),10)||0),a.extend(vb,{reinitialise:function(b){b=a.extend({},P,b),f(b)},scrollToElement:function(a,b,c){z(a,b,c)},scrollTo:function(a,b,c){y(a,c),x(b,c)},scrollToX:function(a,b){y(a,b)},scrollToY:function(a,b){x(a,b)},scrollToPercentX:function(a,b){y(a*(U-R),b)},scrollToPercentY:function(a,b){x(a*(V-S),b)},scrollBy:function(a,b,c){vb.scrollByX(a,c),vb.scrollByY(b,c)},scrollByX:function(a,b){var c=A()+Math[0>a?"floor":"ceil"](a),d=c/(U-R);t(d*cb,b)},scrollByY:function(a,b){var c=B()+Math[0>a?"floor":"ceil"](a),d=c/(V-S);r(d*_,b)},positionDragX:function(a,b){t(a,b)},positionDragY:function(a,b){r(a,b)},animate:function(a,b,c,d){var e={};e[b]=c,a.animate(e,{duration:P.animateDuration,easing:P.animateEase,queue: !1,step:d})},getContentPositionX:function(){return A()},getContentPositionY:function(){return B()},getContentWidth:function(){return U},getContentHeight:function(){return V},getPercentScrolledX:function(){return A()/(U-R)},getPercentScrolledY:function(){return B()/(V-S)},getIsScrollableH:function(){return Z},getIsScrollableV:function(){return Y},getContentPane:function(){return Q},scrollToBottom:function(a){r(_,a)},hijackInternalLinks:a.noop,destroy:function(){O()}}),f(e)}return d=a.extend({},a.fn.scroll_absolute.defaults,d),a.each(["arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){d[this]=d[this]||d.speed}),this.each(function(){var b=a(this),c=b.data("easy");c?c.reinitialise(d):(a("script",b).filter('[type="text/javascript"],:not([type])').remove(),c=new e(b,d),b.data("easy",c))})},a.fn.scroll_absolute.defaults={arrows: !1,maintainPosition: !0,stickToBottom: !1,stickToRight: !1,clickOnTrack: !0,autoReinitialise: !1,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:c,animateScroll: !1,animateDuration:300,animateEase:"linear",hijackInternalLinks: !1,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:10,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover: !1,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation: !0,hideFocus: !1,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:.8}}(jQuery,this);	
