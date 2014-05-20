<div id="projects-page" class="content-area" style="background: url(<?php echo get_bloginfo('url') .'/website-images/canvas-bg.gif';?>); background-position:0 55px">
	<main class="site-main" role="main">
	
		<!-- inner content section -->
		<div class="grid grid-pad">

				<?php

					$page_title = 'Work';
					echo '<header class="entry-header"><h1 class="entry-title">'.$page_title.'</h1></header>';
					echo '<div class="services-break"></div>';
					$pager = get_page_by_title( $page_title );

				?>

				<?php
					$front_page = false;
					if ( is_front_page() ) {
					    $front_page = true;
					} 
				?>



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


				<?php
					$the_last_page = $wp_query->max_num_pages;
					$loaded_page = intval($paged);
				?>
				<?php if ( $the_last_page == $loaded_page) { ?> 
					<nav id="newer-projects" title="Newer Projects">&laquo; <a href="<?php previous_posts(); ?>#projects-page">Newer Projects</a></nav>
				<?php } elseif ($loaded_page == 1) { ?> 
					<nav id="older-projects" title="Older Projects"><a href="<?php next_posts(); ?>#projects-page">Older Projects</a> &raquo;</nav> 
				<?php } else { ?> 
					<nav id="newer-projects" title="Newer Projects">&laquo; <a href="<?php previous_posts(); ?>#projects-page">Newer Projects</a></nav> <nav id="older-projects" title="Older Projects"><a href="<?php next_posts(); ?>#projects-page">Older Projects</a> &raquo;</nav> 
				<?php } ?>

				<?php endif; ?>

				<div id="sub-images"></div>
				<div class="clear"></div>

				
				<?php
					//if the last page of the projects portfolio and being shown on homepage...
					if ( $front_page && $the_last_page == $loaded_page) {
					    $content = apply_filters('the_content', $pager->post_content);
					    echo '<hr><aside class="eop">'.$content.'</aside><hr>';
					} 
				?>


				<?php wp_reset_postdata(); ?>


		
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->