jQuery(document).ready(function($) {
    
    var windowheight = jQuery(window).height();
    var subpagebannerheight = jQuery('.subpage-banner').height();
    var subbannerpadding = ((windowheight-subpagebannerheight)/12);
    if (subbannerpadding < 30) {
        subbannerpadding = 30;
    }
    
    jQuery('.subpage-banner').css({ "padding-top": subbannerpadding });
    jQuery('.subpage-banner').css({ "padding-bottom": subbannerpadding });

    jQuery("html").niceScroll({
		cursorcolor: "#1a1a1a",
		cursorborder: "#1a1a1a",
		cursoropacitymin: 0.2,
		cursorwidth: 10,
		zindex: 10,
		scrollspeed: 60,
		mousescrollstep: 40
	});
	
	jQuery( "#reply-title" ).after( "<span class='title-line'></span>" );
	
});





