jQuery('.services-col').bind('mouseenter', function(){
	jQuery(this).find('.service-icon a img').clearQueue().effect("bounce", {times:1, distance:10}, 1000);
});
jQuery('.nav-tab').bind('click', function(){

	$offset = parseInt(jQuery('#post-nav').css("right"));

	if( $offset < -100) 
	jQuery('#post-nav').animate({"right":"-5px"}, function(){
		jQuery('.nav-tab').html('L<br>E<br>S<br>S');
	});
	else
	jQuery('#post-nav').animate({"right":"-241px"}, function(){
		jQuery('.nav-tab').html('M<br>O<br>R<br>E');
	});
});
