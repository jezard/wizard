<div id="projects-page" class="content-area" style="background: url(<?php echo get_bloginfo('url') .'/website-images/canvas-bg.gif';?>); background-position:0 55px">
	<main class="site-main" role="main">
	
		<!-- inner content section -->
		<div class="grid grid-pad">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

				<?php wp_reset_postdata(); ?>

				<?php 

				if ( get_query_var('paged') ) {
				    $paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
				    $paged = get_query_var('page');
				} else {
				    $paged = 1;
				}

				?>


				<?php $args = array('post_type' => 'projects', 'paged' => $paged, 'posts_per_page' => 3); ?>

				<?php $wp_query = null; ?>
				<?php $wp_query = new WP_Query(); ?>
				<?php $wp_query->query($args); 	?>

				<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

					<aside class="col-1-3">
						<nav class="portfolio-thumb"><span><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'project-thumb', array('class' => 'grayscale'))?></a></span></nav>
					</aside>

				<?php endwhile; ?>
				<div id="sub-images"></div>
				<div class="clear"></div>


				<nav id="newer-projects" title="Newer Projects"><?php previous_posts_link('&laquo; Newer Projects' ); ?></nav>
				<nav id="older-projects" title="Older Projects"><?php next_posts_link('Older Projects &raquo;'); ?> </nav>


				<?php endif; ?>


				<?php wp_reset_postdata(); ?>
		
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->