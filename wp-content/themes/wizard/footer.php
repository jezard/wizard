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
		
			<div class="subfooter col-9-12"><?php bloginfo( 'description' ); ?></div>
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


<script>
	var _gaq=[['_setAccount','UA-XXXXXXX-1'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src='//www.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
