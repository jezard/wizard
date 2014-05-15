<?php
/*
Template Name: Projects template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div class="content-area projects-page" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/canvas-bg.gif';?>); background-position:0 55px">
		<main class="site-main" role="main">
		
			<!-- inner content section -->
			<div class="grid grid-pad">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
