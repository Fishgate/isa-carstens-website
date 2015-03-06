/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// IE8 ployfill for GetComputed Style (for Responsive Script below)
window.getComputedStyle||(window.getComputedStyle=function(e,t){this.el=e;this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;t=="float"&&(t="styleFloat");n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()}));return e.currentStyle[t]?e.currentStyle[t]:null};return this});jQuery(document).ready(function(e){function f(t){e("#gallery"+t).click(function(){e(".fancygroup"+t+":eq(0)").trigger("click")})}function l(t){e(".feature-info-holder").removeClass("focus");e(".feature-info-holder").addClass("blur");e(t).next().removeClass("blur");e(t).next().addClass("focus")}function c(){e(".slide1, .slide2, .slide3, .slide4").animate({opacity:"0"},{duration:400,queue:!1})}function h(){e("#next, #prev").removeClass("four three two one")}function p(t,n,r,i,s,o,u){e(t).removeClass(r);e(t).addClass(i);e(n).removeClass(r);e(n).addClass(i);c();e(s).animate({opacity:"1"},{duration:400,queue:!1});e(".slide-info-parent").addClass("hidden");e(u).removeClass("hidden");e(".feature-info-holder").removeClass("focus");e(".feature-info-holder").addClass("blur");e("img[data-slide-num="+o+"]").next().addClass("focus")}var t=e(window).width();t<481;t>481;if(t>=768){var n=e(".wrap").width(),r=e(".wrap").width()/2*-1;e(".slide-info-parent").css({width:n,marginLeft:r});e(window).resize(function(){n=e(".wrap").width();r=e(".wrap").width()/2*-1;e(".slide-info-parent").css({width:n,marginLeft:r})});e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))})}t>1030;e('input[type="text"], textarea').bind({focus:function(){e(this).removeAttr("style");e(this).val().trim()===e(this).data("default")&&e(this).val("")},blur:function(){e(this).val().trim()===""&&e(this).val(e(this).data("default"))}});if(e("#contact-form").length>0){function s(){var e=validate("#nameAndSurname"),t=validate("#school"),n=validate("#subject"),r=validate("#grade"),i=validate("#cellNumber"),s=validate_email("#email"),o=validate("#message");(!e||!t||!n||!r||!i||!s||!o)&&alert("Please fill in all the required form field correctly.")}function o(){}e("#contact-form").ajaxForm({url:site_data.template_dir+"/library/scripts/contactus.execute.php",type:"POST",beforeSubmit:s,success:o,resetForm:!0})}if(e("#applynow_form").length>0){function u(){var e=validate("#nameAndSurname"),t=validate("#school"),n=validate("#grade"),r=validate("#cellNumber"),i=validate_email("#email"),s=validate("#message");if(!e||!t||!n||!r||!i||!s){alert("Please fill in all the required form field correctly.");return!1}}function a(){}e("#applynow_form").ajaxForm({url:site_data.template_dir+"/library/scripts/applynow.execute.php",type:"POST",beforeSubmit:u,success:a,resetForm:!0})}e(".fancybox").fancybox({padding:0,helpers:{title:{type:"over"}}});for(i=1;i<=site_data.gallery_count;i++)f(i);e(".top-nav").ReSmenu({menuClass:"responsive-menu",selectId:"resmenu",textBefore:'<span class="fa fa-bars" style="color: #fff;"></span> &nbsp;',selectOption:!1,activeClass:"current-menu-item",maxWidth:768});e("#next, #prev, .feature img").mouseenter(function(){e(this).css({cursor:"pointer"})});e(".feature img").each(function(){e(this).click(function(){l(this);var t="."+e(this).data("slide-num");c();e(t).animate({opacity:"1"},{duration:400,queue:!1});if(t===".slide4"){h();e("#next, #prev").addClass("four");e(".slide-info-parent").addClass("hidden");e(".info-4").removeClass("hidden")}else if(t===".slide3"){h();e("#next, #prev").addClass("three");e(".slide-info-parent").addClass("hidden");e(".info-3").removeClass("hidden")}else if(t===".slide2"){h();e("#next, #prev").addClass("two");e(".slide-info-parent").addClass("hidden");e(".info-2").removeClass("hidden")}else if(t===".slide1"){h();e("#next, #prev").addClass("one");e(".slide-info-parent").addClass("hidden");e(".info-1").removeClass("hidden")}})});e("#next").click(function(){e(this).hasClass("four")?p(this,"#prev","four","one",".slide1","slide1",".info-1"):e(this).hasClass("three")?p(this,"#prev","three","four",".slide4","slide4",".info-4"):e(this).hasClass("two")?p(this,"#prev","two","three",".slide3","slide3",".info-3"):e(this).hasClass("one")&&p(this,"#prev","one","two",".slide2","slide2",".info-2")});e("#prev").click(function(){e(this).hasClass("four")?p(this,"#next","four","three",".slide3","slide3",".info-3"):e(this).hasClass("three")?p(this,"#next","three","two",".slide2","slide2",".info-2"):e(this).hasClass("two")?p(this,"#next","two","one",".slide1","slide1",".info-1"):e(this).hasClass("one")&&p(this,"#next","one","four",".slide4","slide4",".info-4")})});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);