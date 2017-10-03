/*! modernizr 3.3.1 (Custom Build) | MIT *
 * http://modernizr.com/download/?-csstransforms-csstransforms3d-csstransitions-touchevents-domprefixes-prefixes-setclasses-testallprops-testprop-teststyles !*/
!function(e,n,t){function r(e,n){return typeof e===n}function s(){var e,n,t,s,o,i,a;for(var f in C)if(C.hasOwnProperty(f)){if(e=[],n=C[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=r(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)i=e[o],a=i.split("."),1===a.length?Modernizr[a[0]]=s:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=s),y.push((s?"":"no-")+a.join("-"))}}function o(e){var n=S.className,t=Modernizr._config.classPrefix||"";if(_&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),_?S.className.baseVal=n:S.className=n)}function i(e,n){return!!~(""+e).indexOf(n)}function a(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):_?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function f(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function u(){var e=n.body;return e||(e=a(_?"svg":"body"),e.fake=!0),e}function l(e,t,r,s){var o,i,f,l,d="modernizr",p=a("div"),c=u();if(parseInt(r,10))for(;r--;)f=a("div"),f.id=s?s[r]:d+(r+1),p.appendChild(f);return o=a("style"),o.type="text/css",o.id="s"+d,(c.fake?c:p).appendChild(o),c.appendChild(p),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(n.createTextNode(e)),p.id=d,c.fake&&(c.style.background="",c.style.overflow="hidden",l=S.style.overflow,S.style.overflow="hidden",S.appendChild(c)),i=t(p,e),c.fake?(c.parentNode.removeChild(c),S.style.overflow=l,S.offsetHeight):p.parentNode.removeChild(p),!!i}function d(e,n){return function(){return e.apply(n,arguments)}}function p(e,n,t){var s;for(var o in e)if(e[o]in n)return t===!1?e[o]:(s=n[e[o]],r(s,"function")?d(s,t||n):s);return!1}function c(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(n,r){var s=n.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(c(n[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+c(n[s])+":"+r+")");return o=o.join(" or "),l("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return t}function h(e,n,s,o){function u(){d&&(delete N.style,delete N.modElem)}if(o=r(o,"undefined")?!1:o,!r(s,"undefined")){var l=m(e,s);if(!r(l,"undefined"))return l}for(var d,p,c,h,v,g=["modernizr","tspan"];!N.style;)d=!0,N.modElem=a(g.shift()),N.style=N.modElem.style;for(c=e.length,p=0;c>p;p++)if(h=e[p],v=N.style[h],i(h,"-")&&(h=f(h)),N.style[h]!==t){if(o||r(s,"undefined"))return u(),"pfx"==n?h:!0;try{N.style[h]=s}catch(y){}if(N.style[h]!=v)return u(),"pfx"==n?h:!0}return u(),!1}function v(e,n,t,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+E.join(i+" ")+i).split(" ");return r(n,"string")||r(n,"undefined")?h(a,n,s,o):(a=(e+" "+T.join(i+" ")+i).split(" "),p(a,n,t))}function g(e,n,r){return v(e,t,t,n,r)}var y=[],C=[],w={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){C.push({name:e,fn:n,options:t})},addAsyncTest:function(e){C.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr;var x=w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];w._prefixes=x;var S=n.documentElement,_="svg"===S.nodeName.toLowerCase(),b="Moz O ms Webkit",T=w._config.usePrefixes?b.toLowerCase().split(" "):[];w._domPrefixes=T;var z="CSS"in e&&"supports"in e.CSS,P="supportsCSS"in e;Modernizr.addTest("supports",z||P);var E=w._config.usePrefixes?b.split(" "):[];w._cssomPrefixes=E;var j=w.testStyles=l;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var r=["@media (",x.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");j(r,function(e){t=9===e.offsetTop})}return t});var k={elem:a("modernizr")};Modernizr._q.push(function(){delete k.elem});var N={style:k.elem.style};Modernizr._q.unshift(function(){delete N.style});w.testProp=function(e,n,r){return h([e],t,n,r)};w.testAllProps=v,w.testAllProps=g,Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&g("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){var e=!!g("perspective","1px",!0),n=Modernizr._config.usePrefixes;if(e&&(!n||"webkitPerspective"in S.style)){var t,r="#modernizr{width:0;height:0}";Modernizr.supports?t="@supports (perspective: 1px)":(t="@media (transform-3d)",n&&(t+=",(-webkit-transform-3d)")),t+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",j(r+t,function(n){e=7===n.offsetWidth&&18===n.offsetHeight})}return e}),Modernizr.addTest("csstransitions",g("transition","all",!0)),s(),o(y),delete w.addTest,delete w.addAsyncTest;for(var A=0;A<Modernizr._q.length;A++)Modernizr._q[A]();e.Modernizr=Modernizr}(window,document);

// Get viewport dimension including scrollbar, therefore same as using css media queries
function getViewport(){var e;var t;if(typeof window.innerWidth!="undefined"){e=window.innerWidth,t=window.innerHeight}else if(typeof document.documentElement!="undefined"&&typeof document.documentElement.clientWidth!="undefined"&&document.documentElement.clientWidth!=0){e=document.documentElement.clientWidth,t=document.documentElement.clientHeight}else{e=document.getElementsByTagName("body")[0].clientWidth,t=document.getElementsByTagName("body")[0].clientHeight}return[e,t]}

/* Get transition duration */
/* https://gist.github.com/snorpey/5323028 */
function getTransitionDuration(e,t){var n=$(e);var r="moz webkit ms o khtml".split(" ");var i=0;for(var s=0;s<r.length;s++){var o=n.css("-"+r[s]+"-transition-duration");if(o){o=o.indexOf("ms")>-1?parseFloat(o):parseFloat(o)*1e3;if(t){var u=n.css("-"+r[s]+"-transition-delay");o+=u.indexOf("ms")>-1?parseFloat(u):parseFloat(u)*1e3}i=o;break}}return i};

$(function(){
	/*podle jazyka treba podle class na body */
    //if ( document.location.href.indexOf('/cs') > -1 ) {
		//$('a[class*=lightbox]').lightBox({
		//	imageBaseDir: 'img/lightbox/cs',
		//	langPicture: 'Obrázek',
		//	langOf: 'z'
		//});
    //}else{
    //    $('a[class*=lightbox]').lightBox();
    //}
});



$(document).ready(function(){
	// html
	var $html = $('html');

	var $w = $(window);
	var cssWidth = 0;
	var viewportWidth = 0;
	var oldWidth = 0;

	(function(){
		cssWidth = getViewport()[0];
		viewportWidth = $w.width();

		var timer = null,
			levels = [
				{
					from: 0,
					to: 479,
					callback: function(){
						mobileHeader();
					}
				},
				{
					from: 480,
					to: 589,
					callback: function(){
						mobileHeader();
					}
				},
				{
					from: 590,
					to: 767,
					callback: function(){
						mobileHeader();
					}
				},
				{
					// >= 1020
					callback: function(){

					}
				}
			];

		$(window).bind('resize firstcall', function(e) {
			timer = clearTimeout(timer);
			timer = setTimeout(function() {
				cssWidth = getViewport()[0];
				viewportWidth = $w.width();

				if (oldWidth != cssWidth) {

					$('#main-menu').collapsable("destroy");

					for(var i = 0, l = levels.length; i < l; i++ ) {
						if ( i === l-1 || levels[i].from <= cssWidth && cssWidth <= levels[i].to ) {
							levels[i].callback();
							break;
						}
					}
					oldWidth = cssWidth;
				}
			}, 200);
		}).triggerHandler('firstcall');
	})(); // end width check

	function mobileHeader() {
		$('#main-menu').collapsable();
	}

	$('a.js-scroll').on('click', function (e) {
		var $anchor = $(this);

		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top - 100
		}, 1000);
		e.preventDefault();
	});

	// enable transition after all has been done
	$html.removeClass('disable-transition');

	var slideSelector = 'a';
	var options = {shareEl: false};
	$('.att-images ul').photoSwipe(slideSelector, options);
});

