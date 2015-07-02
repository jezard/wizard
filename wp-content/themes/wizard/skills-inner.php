<div id="skills-page" class="content-area">
	<div class="site-main" role="main">
	
		<!-- inner content section -->
		<div class="grid grid-pad">

				<?php

					$page_title = 'Skills';
					echo '<header class="entry-header"><h1 class="entry-title">'.$page_title.'</h1></header>';
					echo '<div class="section-break"></div>';
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


				<?php $args = array('post_type' => 'skills', 'paged' => $paged, 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'ASC' ); ?>

				<?php $wp_query = null; ?>
				<?php $wp_query = new WP_Query(); ?>
				<?php $wp_query->query($args); 	?>

				<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

					<aside class="col-1-3">
						<nav class="portfolio-thumb"><span><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'project-thumb', array('class' => 'grayscale'))?></a></span></nav>
					</aside>

				<?php endwhile; ?>
				<div class="sub-images"></div>
				<div class="clear"></div>

				<div class="col-1-1">
					<?php
						$the_last_page = $wp_query->max_num_pages;
						$loaded_page = intval($paged);
					?>
					<?php if ( $the_last_page == $loaded_page) { ?> 
						<nav id="next-skills" title="More Skills">&laquo; <a id="pp" href="<?php previous_posts(); ?>#wizard-technology-skills">More Skills</a></nav>
					<?php } elseif ($loaded_page == 1) { ?> 
						<nav id="previous-skills" title="More Skills"><a id="np" href="<?php next_posts(); ?>#wizard-technology-skills">More Skills</a> &raquo;</nav> 
					<?php } else { ?> 
						<nav id="next-skills" title="More Skills">&laquo; <a id="pp" href="<?php previous_posts(); ?>#wizard-technology-skills">More Skills</a></nav> <nav id="previous-skills" title="More Skills"><a id="np" href="<?php next_posts(); ?>#wizard-technology-skills">More Skills</a> &raquo;</nav> 
					<?php } ?>

					<?php endif; ?>

					<div class="sub-images"></div>
					<div class="clear"></div>

					
					<?php
						//if the last page of the projects portfolio and being shown on homepage...
						if ( $front_page && $the_last_page == $loaded_page) {
						    $content = apply_filters('the_content', $pager->post_content);
						    echo '<aside class="eop">'.$content.'</aside>';
						} 
					?>
				</div>


				<?php wp_reset_postdata(); ?>


		
		</div>
		
	</div><!-- #main -->
</div><!-- #primary -->