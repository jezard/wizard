<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wizard
 */
?>
<?php
	wp_reset_query();
	if(is_front_page())
	{
		$offset_bottom = ' offset-bottom';
	}
	else
	{
		$offset_bottom = '';
	}
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer<?php echo $offset_bottom; ?>" role="contentinfo">
		<div class="site-info grid grid-pad">
		
			<div class="subfooter tagline col-9-12"><?php bloginfo( 'description' ); ?></div>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?>
			<?php endif; ?>
		
			<div style="clear:both;"></div>
			<div class="col-1-1"><hr></div>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer legal') ) : ?>
			<?php endif; ?>
			
		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="http://wizard.technology/wp-content/themes/wizard/js/jQuery.js"></script>
<script type="text/javascript" src="http://wizard.technology/wp-content/themes/wizard/js/main.js"></script>

<?php
	if(is_front_page())
	{
		echo "<script>
		var windowWidth = $(window).width();
		setScroll(windowWidth);

		jQuery(window).resize(function() {
			windowWidth = $(window).width();
			setScroll(windowWidth);
		});

		</script>";
	}

?>


<?php
if ( !is_user_logged_in() ) {
	echo "<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-51761524-1', 'wizard.technology');
	  ga('require', 'displayfeatures');
	  ga('send', 'pageview');

	</script>";
}

?>

</body>
</html>
