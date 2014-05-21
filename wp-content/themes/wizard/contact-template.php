<?php
/*
Template Name: Contact template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div id="contact-page" class="content-area">
		
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
