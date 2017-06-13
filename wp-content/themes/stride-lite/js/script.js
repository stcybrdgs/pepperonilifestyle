var $ = jQuery.noConflict();
$(document).ready(function(){
	$('#scrollHome').on('click', function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
});