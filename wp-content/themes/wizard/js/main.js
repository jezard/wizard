jQuery('.services-col').bind('mouseenter', function(){
	jQuery(this).children('.service-icon').clearQueue().effect("bounce", {times:1, distance:10}, 1000);
});