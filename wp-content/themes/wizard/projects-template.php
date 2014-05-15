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


				<?php 
					//get the unique nvision box (with drop shadow) always remains at top of page...
					$args = array('post_type' => 'projects', 'paged' => $paged, 'posts_per_page' => 3);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();

						echo '<aside class="col-1-3">';
							//echo get_the_post_thumbnail($page->ID, 'thumbnail');
							echo '<nav class="portfolio-thumb"><div class="shadow-box"><span><a href="'.get_the_permalink().'" class="img-shadow" title="'.get_the_title().'">'.get_the_post_thumbnail($post->ID, 'project-thumb', array('class' => 'project-shot')).'</a></span></div></nav>';
						echo '</aside>';
					endwhile;
				?>
				<div id="sub-images"></div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
