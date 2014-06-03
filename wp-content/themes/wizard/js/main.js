/*bounce for the service items*/
jQuery('.services-col').bind('mouseenter', function(){
	jQuery(this).find('.icon-inner').clearQueue().effect("bounce", {times:1, distance:10}, 1000);
});

/*and for the portfolio thumb bounce too*/
jQuery('.portfolio-thumb').on('mouseenter mouseleave',function( e ) {
  var el = $(this);
  if(!el.data("b"))el.effect("bounce", {times:1, distance:5}, 500);
  el.data("b",e.type=="mouseenter"?true:false);
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

/*tab to show the extra content - search, category filters, and month filter */
jQuery('#home-page, #content').bind('click', function(){

	$offset = parseInt(jQuery('#post-nav').css("right"));

	if( $offset < -100)
	{
		//
	} 
	else
	jQuery('#post-nav').animate({"right":"-241px"}, function(){
		jQuery('.nav-tab').html('M<br>O<br>R<br>E');
	});
});

/*function to reset the mobile/desktop menu and scroll to anchor functions - scroll to anchor is not implemented on devices which use the compact menu*/
function setScroll(bWidth){
	/*unbind first*/
	jQuery('a[href*=#]').unbind();
	if(bWidth > 860)
	{
		/*then rebind scroll to anchor for larger devices*/
		jQuery('a[href*=#]').on('click', function(event){
			//excludeproject nav
			var bid = event.target.id; 
			if(!(bid == 'pp' || bid == 'np')) 
			{
				event.preventDefault();
		    	jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
			}   
		});
	}
}