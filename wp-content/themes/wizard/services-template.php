<?php
/*
Template Name: Services template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div id="primary" class="content-area services-page" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper.gif';?>); background-position:0 55px">
		<div id="bg-grad-top" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad.gif';?>)"></div>
		<main id="main" class="site-main" role="main">
		
			<!-- inner content section -->
			<div class="grid grid-pad">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
