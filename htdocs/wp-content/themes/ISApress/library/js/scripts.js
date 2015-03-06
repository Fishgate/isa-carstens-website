/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		};
		return this;
	};
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {
	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	/* getting viewport width */
	var responsive_viewport = $(window).width();
	
	/* if is below 481px */
	if (responsive_viewport < 481) {
            
	} /* end smallest screen */
	
	/* if is larger than 481px */
	if (responsive_viewport > 481) {
	
	} /* end larger than 481px */
	
	/* if is above or equal to 768px */
	if (responsive_viewport >= 752) {
            //dynamic resize and center caption div for slider
            var wrapwidth = $('.wrap').width();
            var wrapwidthnegate = $('.wrap').width()/2*-1;
        
            $('.slide-info-parent').css({width: wrapwidth, marginLeft: wrapwidthnegate});
            
            $(window).resize(function(){
                wrapwidth = $('.wrap').width();
                wrapwidthnegate = $('.wrap').width()/2*-1;

                $('.slide-info-parent').css({width: wrapwidth, marginLeft: wrapwidthnegate});
            });
            
            /* load gravatars */
            $('.comment img[data-gravatar]').each(function(){
                    $(this).attr('src',$(this).attr('data-gravatar'));
            });
            
            /* ======================================
            * Home page gallery stuff 
            * ======================================
            */
           
           if( $('.homepage-slider').length > 0) {
           
                    //set the initial "current-slide" variable on the document body
                    $.data(document.body, 'current-slide', 1);

                    //adjust banner speeds
                    var auto_banner_time = 5000;
                    var pause_banner_time = 10000;

                    //incriments the global "current-slide" variable by +1
                    function global_slide_plus(){
                        next_slide = parseInt($(document.body).data('current-slide')) + 1;

                        if(next_slide === 5){
                            $.data(document.body, 'current-slide', 1);
                        }else{
                            $.data(document.body, 'current-slide', next_slide);
                        }
                    }

                    //incriments the global "current-slide" variable by -1
                    function global_slide_minus(){
                        next_slide = $(document.body).data('current-slide') - 1;

                        if(next_slide === 0){
                            $.data(document.body, 'current-slide', 4);
                        }else{
                            $.data(document.body, 'current-slide', next_slide);
                        }
                    }

                    //highlights the correct feature block based on the global "current-slide" variable
                    function hightlight_feature(current_slide_num){
                        var current_slide_num = current_slide_num.toString();

                        $('.feature-info-holder').removeClass('focus');
                        $('.feature-info-' + current_slide_num).addClass('focus');
                    }

                    //hides all of the image slides except the one that should stay visible based on the global "current-slide" variable
                    function slide_images(current_slide_num){
                        var current_slide_num = current_slide_num.toString();

                        //hide all slides except the one that should stay visible
                        $('.slide-img').finish().not('.slide-' + current_slide_num).animate({
                            opacity: '0'
                        }, 400);

                        //show the relevant slide if its opacity is currently 0 (which is should be unless something went horribly wrong)
                        if($('.slide-' + current_slide_num).css('opacity') === '0'){
                            $('.slide-' + current_slide_num).finish().animate({
                                opacity: '1'
                            }, 400);
                        }
                    }

                    //hides all of the image slide-info except the one that should stay visible based on the global "current-slide" variable
                    function slide_infos(current_slide_num){
                        var current_slide_num = current_slide_num.toString();

                        $('.slide-info-parent').not('.info-' + current_slide_num).addClass('hidden');

                        $('.info-' + current_slide_num).removeClass('hidden');

                    }

                    //consoladate all the above functions to slide all banner elements up 1 incriment in a single function call
                    function banner_slide_up(){
                        global_slide_plus();

                        current_slide_num = $(document.body).data('current-slide');

                        hightlight_feature(current_slide_num);
                        slide_images(current_slide_num);
                        slide_infos(current_slide_num);
                    }

                    //consoladate all the above functions to slide all banner elements down 1 incriment in a single function call
                    function banner_slide_down(){
                        global_slide_minus();

                        current_slide_num = $(document.body).data('current-slide');

                        hightlight_feature(current_slide_num);
                        slide_images(current_slide_num);
                        slide_infos(current_slide_num);
                    }

                    //the set interval which automaticaly ticks through the sliders/feature blocks
                    auto_banner = setInterval(banner_slide_up, auto_banner_time);

                    //declare this variables namespace so our clearTimeout function is happy to clear NOTHING!
                    var pause_banner;

                    //event handlers for user interaction
                    $('#next').click(function(){
                        //stop all current timers
                        clearInterval(auto_banner);
                        clearTimeout(pause_banner);

                        //incriment the banner by 1
                        banner_slide_up();

                        //create a delay before auto looping the banner
                        pause_banner = setTimeout(function(){
                            auto_banner = setInterval(banner_slide_up, auto_banner_time);
                        }, pause_banner_time);
                    });

                    $('#prev').click(function(){
                        //stop all current timers
                        clearInterval(auto_banner);
                        clearTimeout(pause_banner);

                        //incriment the banner by 1
                        banner_slide_down();

                        //create a delay before auto looping the banner
                        pause_banner = setTimeout(function(){
                            auto_banner = setInterval(banner_slide_up, auto_banner_time);
                        }, pause_banner_time);
                    });


                    $('.feature img').each(function(){
                        $(this).click(function(){
                            //stop all current timers
                            clearInterval(auto_banner);
                            clearTimeout(pause_banner);

                            //update the global variable for the current slide
                            $.data(document.body, 'current-slide', $(this).data('slide-num'));

                            //shift the slider to the appropriate slide based on the global 'current-slide' variable which was just set by clicking a feature block
                            current_slide_num = $(document.body).data('current-slide');

                            hightlight_feature(current_slide_num);
                            slide_images(current_slide_num);
                            slide_infos(current_slide_num);

                            //create a delay before auto looping the banner
                            pause_banner = setTimeout(function(){
                                auto_banner = setInterval(banner_slide_up, auto_banner_time);
                            }, pause_banner_time);
                        });
                    });

                 } else {
                     $('.feature-info-holder').each(function(){
                         $(this).removeClass('focus');
                     });
                 }

                 //remove the highlighting of the feature blocks if the window is scaled to a size where the banner no longer displays;
                 $(window).resize(function(){
                     current_viewport = $(window).width();

                     if (current_viewport < 752) {
                         $('.feature-info-holder').addClass('blur');
                     }else{
                         $('.feature-info-holder').removeClass('blur');
                     }
                 });
        
        }
	
	/* off the bat large screen actions */
	if (responsive_viewport > 1030) {
            
	}
   
        /* form elements clear default on focus behaviour */
        $('input[type="text"], textarea').bind({
            focus: function(){
                $(this).removeAttr('style');
                
                if($(this).val().trim() === $(this).data('default')){
                    $(this).val('');
                }
            },
            blur: function(){
                if($(this).val().trim() === ''){
                    $(this).val($(this).data('default'));
                }
            }
        });
        
        /* Contact Us form validation ------------------------------------------------------------------- */
        if($('#contact-form').length > 0){
            function validate_contact_form(){
                var validName       = validate('#nameAndSurname');
                var validSchool     = validate('#school');
                var subject         = validate('#subject');
                var grade           = validate('#grade');
                var cell            = validate('#cellNumber');
                var email           = validate_email('#email');
                var message         = validate('#message');
                
                if(
                    !validName ||
                    !validSchool ||
                    !subject ||
                    !grade ||
                    !cell ||
                    !email ||
                    !message
                ){
                    alert('Please fill in all the required form field correctly.');
                    return false;
                }
            }
            
            function execute_contact_form(result){
                res = result.trim();
                
                console.log(res);
                
                if(res == 'success') {
                    window.location.assign("http://www.isacarstens.co.za/thank-you/");
                }else{
                    alert(res);
                }
                
                
            }
            
            $('#contact-form').ajaxForm({
                url:            site_data.template_dir + '/library/scripts/contactus.execute.php',
                type:           'POST',
                beforeSubmit:   validate_contact_form,
                success:        execute_contact_form,
                resetForm:      true
            });
        } //endif
        
        /* Apply now form validation ------------------------------------------------------------------- */
        if($('#applynow_form').length > 0){            
            function validate_applynow_form(){
                var validName       = validate('#nameAndSurname');
                var validSchool     = validate('#school');
                var grade           = validate('#grade');
                var cell            = validate('#cellNumber');
                var email           = validate_email('#email');
                var message         = validate('#message');
                
                if(
                    !validName ||
                    !validSchool ||
                    !grade ||
                    !cell ||
                    !email ||
                    !message
                ){
                    alert('Please fill in all the required form field correctly.');
                    return false;
                }
            }
            
            function execute_applynow_form(result){
                res = result.trim();
                
                if(res == 'success'){
                    alert('Thank you for your interest in studying at the Isa Carstens® Academy. We have received your enquiry and will be in contact with you soon.');
                }else{
                    alert('Error submitting form: ' . res);
                }
                
            }
            
            $('#applynow_form').ajaxForm({
                url:            site_data.template_dir + '/library/scripts/applynow.execute.php',
                type:           'POST',
                beforeSubmit:   validate_applynow_form,
                success:        execute_applynow_form,
                resetForm:      true
            });
        } //endif
        
        //fancybox
        $(".fancybox").fancybox({
            padding: 0,
            helpers: {
                title : {
                    type : 'over'
                }    
            }
        });
        
        $('.gallery-thumb-holder img, .gallery-thumb-holder .gallery-view-opt, #home-gallery .panel img').click(function(){
            gallery_num = $(this).data('gallery');
            $('.fancygroup' + gallery_num + ':eq(0)').trigger('click');
        });
               
        //INIT RESMENU
        $('.top-nav').ReSmenu({
            menuClass:    'responsive-menu',   // Responsive menu class
            selectId:     'resmenu',          // select ID
            textBefore:   '<span class="fa fa-bars" style="color: #fff;"></span> &nbsp;',               // Text to add before the mobile menu
            selectOption: false,               // First select option
            activeClass:  'current-menu-item', // Active menu li class
            maxWidth:     768                  // Size to which the menu is responsive
        });
        
}); /* end of as page load scripts */




/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
