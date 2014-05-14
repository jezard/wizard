jQuery('.icon').bind('mouseenter', function(){
	jQuery(this).clearQueue().effect("bounce", {times:1, distance:10}, 1000);
});