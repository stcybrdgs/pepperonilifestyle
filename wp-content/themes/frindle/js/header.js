jQuery(document).ready(function($) {
		
	jQuery(".menu-trigger").click(function() {
		
		jQuery(".site-nav").slideToggle(400, function() {
		jQuery(this).toggleClass("nav-expanded").css('display', '');
		
		});
			
	});
	
});



jQuery(document).ready(function($) {

	 $('iframe').wrap('<div class="embed-container" />');

});



jQuery(document).ready(function($) {
		
	jQuery(".trigger").click(function() {
		
		jQuery(".site-nav").slideToggle(400, function() {
		jQuery(this).toggleClass("nav-expanded").css('display', '');
		
		});
			
	});
	
});






// jQuery powered scroll to top

jQuery(document).ready(function(){

	//Check to see if the window is top if not then display button
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scroll-to-top').fadeIn();
		} else {
			jQuery('.scroll-to-top').fadeOut();
		}
	});

	//Click event to scroll to top
	jQuery('.scroll-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
		return false;
	});

});


function checking(){
    var textBox =  $.trim( $('input[type=text-notification]').val() )
    if (textBox == "") {
         $(".quick-notification").hide(); 
    }
    else {
    	$(".quick-notification").show(); 
    }
}

