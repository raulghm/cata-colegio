window.Detectizr=function(e,n,t,o){function i(e,n){var t,o,r;if(arguments.length>2)for(t=1,o=arguments.length;o>t;t+=1)i(e,arguments[t]);else for(r in n)n.hasOwnProperty(r)&&(e[r]=n[r]);return e}function r(e){return v.browser.userAgent.indexOf(e)>-1}function a(e){return e.test(v.browser.userAgent)}function s(e){return e.exec(v.browser.userAgent)}function d(e){return e.replace(/^\s+|\s+$/g,"")}function m(e){return null===e||e===o?"":String(e).replace(/((\s|\-|\.)+[a-z0-9])/g,function(e){return e.toUpperCase().replace(/(\s|\-|\.)/g,"")})}function l(e,n){var t=n||"",o=1===e.nodeType&&(e.className?(" "+e.className+" ").replace(j," "):"");if(o){for(;o.indexOf(" "+t+" ")>=0;)o=o.replace(" "+t+" "," ");e.className=n?d(o):""}}function c(e,n,t){e&&(e=m(e),n&&(n=m(n),g(e+n,!0),t&&g(e+n+"_"+t,!0)))}function p(){e.clearTimeout(b),b=e.setTimeout(function(){h=v.device.orientation,v.device.orientation=e.innerHeight>e.innerWidth?"portrait":"landscape",g(v.device.orientation,!0),h!==v.device.orientation&&g(h,!1)},10)}function g(e,n){e&&f&&(y.addAllFeaturesAsClass?f.addTest(e,n):(n="function"==typeof n?n():n,n?f.addTest(e,!0):(delete f[e],l(S,e))))}function u(e,n){e.version=n;var t=n.split(".");t.length>0?(t=t.reverse(),e.major=t.pop(),t.length>0?(e.minor=t.pop(),t.length>0?(t=t.reverse(),e.patch=t.join(".")):e.patch="0"):e.minor="0"):e.major="0"}function w(o){var d,l,w,b,h,j,S,A,E=this;if(y=i({},y,o||{}),y.detectDevice){for(v.device={type:"",model:"",orientation:""},b=v.device,a(/googletv|smarttv|internet.tv|netcast|nettv|appletv|boxee|kylo|roku|dlnadoc|ce\-html/)?(b.type=x[0],b.model="smartTv"):a(/xbox|playstation.3|wii/)?(b.type=x[0],b.model="gameConsole"):a(/ip(a|ro)d/)?(b.type=x[1],b.model="ipad"):a(/tablet/)&&!a(/rx-34/)||a(/folio/)?(b.type=x[1],b.model=String(s(/playbook/)||"")):a(/linux/)&&a(/android/)&&!a(/fennec|mobi|htc.magic|htcX06ht|nexus.one|sc-02b|fone.945/)?(b.type=x[1],b.model="android"):a(/kindle/)||a(/mac.os/)&&a(/silk/)?(b.type=x[1],b.model="kindle"):a(/gt-p10|sc-01c|shw-m180s|sgh-t849|sch-i800|shw-m180l|sph-p100|sgh-i987|zt180|htc(.flyer|\_flyer)|sprint.atp51|viewpad7|pandigital(sprnova|nova)|ideos.s7|dell.streak.7|advent.vega|a101it|a70bht|mid7015|next2|nook/)||a(/mb511/)&&a(/rutem/)?(b.type=x[1],b.model="android"):a(/bb10/)?(b.type=x[1],b.model="blackberry"):(b.model=s(/iphone|ipod|android|blackberry|opera mini|opera mobi|skyfire|maemo|windows phone|palm|iemobile|symbian|symbianos|fennec|j2me/),null!==b.model?(b.type=x[2],b.model=String(b.model)):(b.model="",a(/bolt|fennec|iris|maemo|minimo|mobi|mowser|netfront|novarra|prism|rx-34|skyfire|tear|xv6875|xv6975|google.wireless.transcoder/)?b.type=x[2]:a(/opera/)&&a(/windows.nt.5/)&&a(/htc|xda|mini|vario|samsung\-gt\-i8000|samsung\-sgh\-i9/)?b.type=x[2]:a(/windows.(nt|xp|me|9)/)&&!a(/phone/)||a(/win(9|.9|nt)/)||a(/\(windows 8\)/)?b.type=x[3]:a(/macintosh|powerpc/)&&!a(/silk/)?(b.type=x[3],b.model="mac"):a(/linux/)&&a(/x11/)?b.type=x[3]:a(/solaris|sunos|bsd/)?b.type=x[3]:a(/bot|crawler|spider|yahoo|ia_archiver|covario-ids|findlinks|dataparksearch|larbin|mediapartners-google|ng-search|snappy|teoma|jeeves|tineye/)&&!a(/mobile/)?(b.type=x[3],b.model="crawler"):b.type=x[2])),d=0,l=x.length;l>d;d+=1)g(x[d],b.type===x[d]);y.detectDeviceModel&&g(m(b.model),!0)}if(y.detectScreen&&(f&&f.mq&&(g("smallScreen",f.mq("only screen and (max-width: 480px)")),g("verySmallScreen",f.mq("only screen and (max-width: 320px)")),g("veryVerySmallScreen",f.mq("only screen and (max-width: 240px)"))),b.type===x[1]||b.type===x[2]?(e.onresize=function(e){p(e)},p()):(b.orientation="landscape",g(b.orientation,!0))),y.detectOS&&(v.os={},h=v.os,""!==b.model&&("ipad"===b.model||"iphone"===b.model||"ipod"===b.model?(h.name="ios",u(h,(a(/os\s([\d_]+)/)?RegExp.$1:"").replace(/_/g,"."))):"android"===b.model?(h.name="android",u(h,a(/android\s([\d\.]+)/)?RegExp.$1:"")):"blackberry"===b.model?(h.name="blackberry",u(h,a(/version\/([^\s]+)/)?RegExp.$1:"")):"playbook"===b.model&&(h.name="blackberry",u(h,a(/os ([^\s]+)/)?RegExp.$1.replace(";",""):""))),h.name||(r("win")||r("16bit")?(h.name="windows",r("windows nt 6.3")?u(h,"8.1"):r("windows nt 6.2")||a(/\(windows 8\)/)?u(h,"8"):r("windows nt 6.1")?u(h,"7"):r("windows nt 6.0")?u(h,"vista"):r("windows nt 5.2")||r("windows nt 5.1")||r("windows xp")?u(h,"xp"):r("windows nt 5.0")||r("windows 2000")?u(h,"2k"):r("winnt")||r("windows nt")?u(h,"nt"):r("win98")||r("windows 98")?u(h,"98"):(r("win95")||r("windows 95"))&&u(h,"95")):r("mac")||r("darwin")?(h.name="mac os",r("68k")||r("68000")?u(h,"68k"):r("ppc")||r("powerpc")?u(h,"ppc"):r("os x")&&u(h,(a(/os\sx\s([\d_]+)/)?RegExp.$1:"os x").replace(/_/g,"."))):r("webtv")?h.name="webtv":r("x11")||r("inux")?h.name="linux":r("sunos")?h.name="sun":r("irix")?h.name="irix":r("freebsd")?h.name="freebsd":r("bsd")&&(h.name="bsd")),h.name&&(g(h.name,!0),h.major&&(c(h.name,h.major),h.minor&&c(h.name,h.major,h.minor))),h.addressRegisterSize=a(/\sx64|\sx86|\swin64|\swow64|\samd64/)?"64bit":"32bit",g(h.addressRegisterSize,!0)),y.detectBrowser&&(j=v.browser,a(/opera|webtv/)||!a(/msie\s([\d\w\.]+)/)&&!r("trident")?r("firefox")?(j.engine="gecko",j.name="firefox",u(j,a(/firefox\/([\d\w\.]+)/)?RegExp.$1:"")):r("gecko/")?j.engine="gecko":r("opera")?(j.name="opera",j.engine="presto",u(j,a(/version\/([\d\.]+)/)?RegExp.$1:a(/opera(\s|\/)([\d\.]+)/)?RegExp.$2:"")):r("konqueror")?j.name="konqueror":r("chrome")?(j.engine="webkit",j.name="chrome",u(j,a(/chrome\/([\d\.]+)/)?RegExp.$1:"")):r("iron")?(j.engine="webkit",j.name="iron"):r("crios")?(j.name="chrome",j.engine="webkit",u(j,a(/crios\/([\d\.]+)/)?RegExp.$1:"")):r("applewebkit/")?(j.name="safari",j.engine="webkit",u(j,a(/version\/([\d\.]+)/)?RegExp.$1:"")):r("mozilla/")&&(j.engine="gecko"):(j.engine="trident",j.name="ie",!e.addEventListener&&t.documentMode&&7===t.documentMode?u(j,"8.compat"):a(/trident.*rv[ :](\d+)\./)?u(j,RegExp.$1):u(j,a(/trident\/4\.0/)?"8":RegExp.$1)),j.name&&(g(j.name,!0),j.major&&(c(j.name,j.major),j.minor&&c(j.name,j.major,j.minor))),g(j.engine,!0),j.language=n.userLanguage||n.language,g(j.language,!0)),y.detectPlugins){for(j.plugins=[],E.detectPlugin=function(e){var t,o,i,r=n.plugins;for(l=r.length-1;l>=0;l--){for(t=r[l],o=t.name+t.description,i=0,w=e.length;w>=0;w--)-1!==o.indexOf(e[w])&&(i+=1);if(i===e.length)return!0}return!1},E.detectObject=function(e){for(l=e.length-1;l>=0;l--)try{new ActiveXObject(e[l])}catch(n){}return!1},d=k.length-1;d>=0;d--)S=k[d],A=!1,e.ActiveXObject?A=E.detectObject(S.progIds):n.plugins&&(A=E.detectPlugin(S.substrs)),A&&(j.plugins.push(S.name),g(S.name,!0));n.javaEnabled()&&(j.plugins.push("java"),g("java",!0))}}var b,h,v={},f=e.Modernizr,x=["tv","tablet","mobile","desktop"],y={addAllFeaturesAsClass:!1,detectDevice:!0,detectDeviceModel:!0,detectScreen:!0,detectOS:!0,detectBrowser:!0,detectPlugins:!0},k=[{name:"adobereader",substrs:["Adobe","Acrobat"],progIds:["AcroPDF.PDF","PDF.PDFCtrl.5"]},{name:"flash",substrs:["Shockwave Flash"],progIds:["ShockwaveFlash.ShockwaveFlash.1"]},{name:"wmplayer",substrs:["Windows Media"],progIds:["wmplayer.ocx"]},{name:"silverlight",substrs:["Silverlight"],progIds:["AgControl.AgControl"]},{name:"quicktime",substrs:["QuickTime"],progIds:["QuickTime.QuickTime"]}],j=/[\t\r\n]/g,S=t.documentElement;return v.detect=function(e){return w(e)},v.init=function(){v!==o&&(v.browser={userAgent:(n.userAgent||n.vendor||e.opera).toLowerCase()},v.detect())},v.init(),v}(this,this.navigator,this.document);