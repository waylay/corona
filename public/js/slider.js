!function(s){var t={};function e(i){if(t[i])return t[i].exports;var a=t[i]={i:i,l:!1,exports:{}};return s[i].call(a.exports,a,a.exports,e),a.l=!0,a.exports}e.m=s,e.c=t,e.d=function(s,t,i){e.o(s,t)||Object.defineProperty(s,t,{configurable:!1,enumerable:!0,get:i})},e.n=function(s){var t=s&&s.__esModule?function(){return s.default}:function(){return s};return e.d(t,"a",t),t},e.o=function(s,t){return Object.prototype.hasOwnProperty.call(s,t)},e.p="",e(e.s=3)}({3:function(s,t,e){s.exports=e("dz4v")},dz4v:function(s,t){!function(s){"use strict";var t;t={slippryWrapper:'<div class="sy-box" />',slideWrapper:'<div class="sy-slides-wrap" />',slideCrop:'<div class="sy-slides-crop" />',boxClass:"sy-list",elements:"li",activeClass:"sy-active",fillerClass:"sy-filler",loadingClass:"sy-loading",adaptiveHeight:!0,start:1,loop:!0,captionsSrc:"img",captions:"overlay",captionsEl:".sy-caption",initSingle:!0,responsive:!0,preload:"visible",pager:!0,pagerClass:"sy-pager",controls:!0,controlClass:"sy-controls",prevClass:"sy-prev",prevText:"Previous",nextClass:"sy-next",nextText:"Next",hideOnEnd:!0,transition:"fade",kenZoom:120,slideMargin:0,transClass:"transition",speed:800,easing:"swing",continuous:!0,useCSS:!0,auto:!0,autoDirection:"next",autoHover:!0,autoHoverDelay:100,autoDelay:500,pause:4e3,onSliderLoad:function(){return this},onSlideBefore:function(){return this},onSlideAfter:function(){return this}},s.fn.slippry=function(e){var i,a,n,r,o,l,v,c,p,d,g,u,f,h,y,C,m,x,S,w,W,k,b,T,M,A,E;return 0===(a=this).length?this:a.length>1?(a.each(function(){s(this).slippry(e)}),this):((i={}).vars={},g=function(){var s,t,e;for(s in t=document.createElement("div"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",MSTransition:"msTransitionEnd",OTransition:"oTransitionEnd",transition:"transitionEnd transitionend"})if(void 0!==t.style[s])return e[s]},M=document.createElement("div"),E=(A=["Khtml","Ms","O","Moz","Webkit"]).length,w=function(s){if(s in M.style)return!0;for(s=s.replace(/^[a-z]/,function(s){return s.toUpperCase()});E--;)if(A[E]+s in M.style)return!0;return!1},b=function(t,e){var i,a,n,r;return i=e.split("."),a=s(t),n="",r="",s.each(i,function(s,t){t.indexOf("#")>=0?n+=t.replace(/^#/,""):r+=t+" "}),n.length&&a.attr("id",n),r.length&&a.attr("class",s.trim(r)),a},T=function(){var s,t,e,a;e={},a={},s=100-i.settings.kenZoom,a.width=i.settings.kenZoom+"%",i.vars.active.index()%2==0?(a.left=s+"%",a.top=s+"%",e.left="0%",e.top="0%"):(a.left="0%",a.top="0%",e.left=s+"%",e.top=s+"%"),t=i.settings.pause+2*i.settings.speed,i.vars.active.css(a),i.vars.active.animate(e,{duration:t,easing:i.settings.easing,queue:!1})},p=function(){i.vars.fresh?(i.vars.slippryWrapper.removeClass(i.settings.loadingClass),i.vars.fresh=!1,i.settings.auto&&a.startAuto(),i.settings.useCSS||"kenburns"!==i.settings.transition||T(),i.settings.onSliderLoad.call(void 0,i.vars.active.index())):s("."+i.settings.fillerClass,i.vars.slideWrapper).addClass("ready")},h=function(t,e){var a;a=1/(t/e)*100+"%",s("."+i.settings.fillerClass,i.vars.slideWrapper).css({paddingTop:a}),p()},r=function(t){var e,i;void 0!==s("img",t).attr("src")?s("<img />").on("load",function(){e=t.width(),i=t.height(),h(e,i)}).attr("src",s("img",t).attr("src")):(e=t.width(),i=t.height(),h(e,i))},n=function(){var t,e,n;(0===s("."+i.settings.fillerClass,i.vars.slideWrapper).length&&i.vars.slideWrapper.append(s('<div class="'+i.settings.fillerClass+'" />')),!0===i.settings.adaptiveHeight)?r(s("."+i.settings.activeClass,a)):(e=0,n=0,s(i.vars.slides).each(function(){s(this).height()>e&&(t=s(this),e=t.height()),(n+=1)===i.vars.count&&(void 0===t&&(t=s(s(i.vars.slides)[0])),r(t))}))},f=function(){i.settings.pager&&(s("."+i.settings.pagerClass+" li",i.vars.slippryWrapper).removeClass(i.settings.activeClass),s(s("."+i.settings.pagerClass+" li",i.vars.slippryWrapper)[i.vars.active.index()]).addClass(i.settings.activeClass))},x=function(){!i.settings.loop&&i.settings.hideOnEnd&&(s("."+i.settings.prevClass,i.vars.slippryWrapper)[i.vars.first?"hide":"show"](),s("."+i.settings.nextClass,i.vars.slippryWrapper)[i.vars.last?"hide":"show"]())},l=function(){var t,e;!1!==i.settings.captions&&(t="img"!==i.settings.captionsSrc?i.vars.active.attr("title"):void 0!==s("img",i.vars.active).attr("title")?s("img",i.vars.active).attr("title"):s("img",i.vars.active).attr("alt"),e="custom"!==i.settings.captions?s(i.settings.captionsEl,i.vars.slippryWrapper):s(i.settings.captionsEl),void 0!==t&&""!==t?e.html(t).show():e.hide())},a.startAuto=function(){void 0===i.vars.timer&&void 0===i.vars.delay&&(i.vars.delay=window.setTimeout(function(){i.vars.autodelay=!1,i.vars.timer=window.setInterval(function(){i.vars.trigger="auto",m(i.settings.autoDirection)},i.settings.pause)},i.vars.autodelay?i.settings.autoHoverDelay:i.settings.autoDelay),i.settings.autoHover&&i.vars.slideWrapper.unbind("mouseenter").unbind("mouseleave").bind("mouseenter",function(){void 0!==i.vars.timer?(i.vars.hoverStop=!0,a.stopAuto()):i.vars.hoverStop=!1}).bind("mouseleave",function(){i.vars.hoverStop&&(i.vars.autodelay=!0,a.startAuto())}))},a.stopAuto=function(){window.clearInterval(i.vars.timer),i.vars.timer=void 0,window.clearTimeout(i.vars.delay),i.vars.delay=void 0},a.refresh=function(){i.vars.slides.removeClass(i.settings.activeClass),i.vars.active.addClass(i.settings.activeClass),i.settings.responsive?n():p(),x(),f(),l()},C=function(){a.refresh()},d=function(){i.vars.moving=!1,i.vars.active.removeClass(i.settings.transClass),i.vars.fresh||i.vars.old.removeClass("sy-ken"),i.vars.old.removeClass(i.settings.transClass),i.settings.onSlideAfter.call(void 0,i.vars.active,i.vars.old.index(),i.vars.active.index()),i.settings.auto&&(i.vars.hoverStop&&void 0!==i.vars.hoverStop||a.startAuto())},y=function(){var t,e,n,r,o,l,v;i.settings.onSlideBefore.call(void 0,i.vars.active,i.vars.old.index(),i.vars.active.index()),!1!==i.settings.transition?(i.vars.moving=!0,"fade"===i.settings.transition||"kenburns"===i.settings.transition?(i.vars.fresh?(i.settings.useCSS?i.vars.slides.css({transitionDuration:i.settings.speed+"ms",opacity:0}):i.vars.slides.css({opacity:0}),i.vars.active.css("opacity",1),"kenburns"===i.settings.transition&&i.settings.useCSS&&(o=i.settings.pause+2*i.settings.speed,i.vars.slides.css({animationDuration:o+"ms"}),i.vars.active.addClass("sy-ken")),d()):i.settings.useCSS?(i.vars.old.addClass(i.settings.transClass).css("opacity",0),i.vars.active.addClass(i.settings.transClass).css("opacity",1),"kenburns"===i.settings.transition&&i.vars.active.addClass("sy-ken"),s(window).off("focus").on("focus",function(){i.vars.moving&&i.vars.old.trigger(i.vars.transition)}),i.vars.old.one(i.vars.transition,function(){return d(),this})):("kenburns"===i.settings.transition&&T(),i.vars.old.addClass(i.settings.transClass).animate({opacity:0},i.settings.speed,i.settings.easing,function(){d()}),i.vars.active.addClass(i.settings.transClass).css("opacity",0).animate({opacity:1},i.settings.speed,i.settings.easing)),C()):"horizontal"!==i.settings.transition&&"vertical"!==i.settings.transition||(l="horizontal"===i.settings.transition?"left":"top",t="-"+i.vars.active.index()*(100+i.settings.slideMargin)+"%",i.vars.fresh?(a.css(l,t),d()):(v={},i.settings.continuous&&(!i.vars.jump||"controls"!==i.vars.trigger&&"auto"!==i.vars.trigger||(e=!0,r=t,i.vars.first?(n=0,i.vars.active.css(l,i.vars.count*(100+i.settings.slideMargin)+"%"),t="-"+i.vars.count*(100+i.settings.slideMargin)+"%"):(n=(i.vars.count-1)*(100+i.settings.slideMargin)+"%",i.vars.active.css(l,-(100+i.settings.slideMargin)+"%"),t=100+i.settings.slideMargin+"%"))),i.vars.active.addClass(i.settings.transClass),i.settings.useCSS?(v[l]=t,v.transitionDuration=i.settings.speed+"ms",a.addClass(i.settings.transition),a.css(v),s(window).off("focus").on("focus",function(){i.vars.moving&&a.trigger(i.vars.transition)}),a.one(i.vars.transition,function(){return a.removeClass(i.settings.transition),e&&(i.vars.active.css(l,n),v[l]=r,v.transitionDuration="0ms",a.css(v)),d(),this})):(v[l]=t,a.stop().animate(v,i.settings.speed,i.settings.easing,function(){return e&&(i.vars.active.css(l,n),a.css(l,r)),d(),this}))),C())):(C(),d())},S=function(s){i.vars.first=i.vars.last=!1,"prev"===s||0===s?i.vars.first=!0:"next"!==s&&s!==i.vars.count-1||(i.vars.last=!0)},m=function(t){var e,n;i.vars.moving||("auto"!==i.vars.trigger&&a.stopAuto(),e=i.vars.active.index(),"prev"===t?(n=t,e>0?t=e-1:i.settings.loop&&(t=i.vars.count-1)):"next"===t?(n=t,e<i.vars.count-1?t=e+1:i.settings.loop&&(t=0)):n=(t-=1)<e?"prev":"next",i.vars.jump=!1,"prev"===t||"next"===t||t===e&&!i.vars.fresh||(S(t),i.vars.old=i.vars.active,i.vars.active=s(i.vars.slides[t]),(0===e&&"prev"===n||e===i.vars.count-1&&"next"===n)&&(i.vars.jump=!0),y()))},a.goToSlide=function(s){i.vars.trigger="external",m(s)},a.goToNextSlide=function(){i.vars.trigger="external",m("next")},a.goToPrevSlide=function(){i.vars.trigger="external",m("prev")},v=function(){if(i.settings.pager&&i.vars.count>1){var t,e,a;for(t=i.vars.slides.length,a=s('<ul class="'+i.settings.pagerClass+'" />'),e=1;e<t+1;e+=1)a.append(s("<li />").append(s('<a href="#'+e+'">'+e+"</a>")));i.vars.slippryWrapper.append(a),s("."+i.settings.pagerClass+" a",i.vars.slippryWrapper).click(function(){return i.vars.trigger="pager",m(parseInt(this.hash.split("#")[1],10)),!1}),f()}},c=function(){i.settings.controls&&i.vars.count>1&&(i.vars.slideWrapper.append(s('<ul class="'+i.settings.controlClass+'" />').append('<li class="'+i.settings.prevClass+'"><a href="#prev">'+i.settings.prevText+"</a></li>").append('<li class="'+i.settings.nextClass+'"><a href="#next">'+i.settings.nextText+"</a></li>")),s("."+i.settings.controlClass+" a",i.vars.slippryWrapper).click(function(){return i.vars.trigger="controls",m(this.hash.split("#")[1]),!1}),x())},u=function(){!1!==i.settings.captions&&("overlay"===i.settings.captions?i.vars.slideWrapper.append(s('<div class="sy-caption-wrap" />').html(b("<div />",i.settings.captionsEl))):"below"===i.settings.captions&&i.vars.slippryWrapper.append(s('<div class="sy-caption-wrap" />').html(b("<div />",i.settings.captionsEl))))},k=function(){m(i.vars.active.index()+1)},W=function(t){var e,a,n,r;r="all"===i.settings.preload?t:i.vars.active,n=s("img, iframe",r),0!==(e=n.length)?(a=0,n.each(function(){s(this).one("load error",function(){++a===e&&k()}).each(function(){this.complete&&s(this).trigger("load")})})):k()},a.getCurrentSlide=function(){return i.vars.active},a.getSlideCount=function(){return i.vars.count},a.destroySlider=function(){!1===i.vars.fresh&&(a.stopAuto(),i.vars.moving=!1,i.vars.slides.each(function(){void 0!==s(this).data("sy-cssBckup")?s(this).attr("style",s(this).data("sy-cssBckup")):s(this).removeAttr("style"),void 0!==s(this).data("sy-classBckup")?s(this).attr("class",s(this).data("sy-classBckup")):s(this).removeAttr("class")}),void 0!==a.data("sy-cssBckup")?a.attr("style",a.data("sy-cssBckup")):a.removeAttr("style"),void 0!==a.data("sy-classBckup")?a.attr("class",a.data("sy-classBckup")):a.removeAttr("class"),i.vars.slippryWrapper.before(a),i.vars.slippryWrapper.remove(),i.vars.fresh=void 0)},a.reloadSlider=function(){a.destroySlider(),o()},(o=function(){var n;if(i.settings=s.extend({},t,e),i.vars.slides=s(i.settings.elements,a),i.vars.count=i.vars.slides.length,i.settings.useCSS&&(w("transition")||(i.settings.useCSS=!1),i.vars.transition=g()),a.data("sy-cssBckup",a.attr("style")),a.data("sy-classBackup",a.attr("class")),a.addClass(i.settings.boxClass).wrap(i.settings.slippryWrapper).wrap(i.settings.slideWrapper).wrap(i.settings.slideCrop),i.vars.slideWrapper=a.parent().parent(),i.vars.slippryWrapper=i.vars.slideWrapper.parent().addClass(i.settings.loadingClass),i.vars.fresh=!0,i.vars.slides.each(function(){s(this).addClass("sy-slide "+i.settings.transition),i.settings.useCSS&&s(this).addClass("useCSS"),"horizontal"===i.settings.transition?s(this).css("left",s(this).index()*(100+i.settings.slideMargin)+"%"):"vertical"===i.settings.transition&&s(this).css("top",s(this).index()*(100+i.settings.slideMargin)+"%")}),!(i.vars.count>1||i.settings.initSingle))return this;-1===s("."+i.settings.activeClass,a).index()?(n="random"===i.settings.start?Math.round(Math.random()*(i.vars.count-1)):i.settings.start>0&&i.settings.start<=i.vars.count?i.settings.start-1:0,i.vars.active=s(i.vars.slides[n]).addClass(i.settings.activeClass)):i.vars.active=s("."+i.settings.activeClass,a),c(),v(),u(),W(i.vars.slides)})(),this)}}(jQuery)}});