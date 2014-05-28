<?php
/*
Template Name: Blog template
*/


get_header(); ?>

	<div id="blog-index" class="content-area">
		<div id="bg-grad-top-blog" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad-blog.gif';?>)"></div>
		<main id="main" class="site-main" role="main">
			<!-- inner content section -->
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="grid grid-pad">
					<header class="blog-intro">
						<article>
							<div class="col-1-6"><img class="me" src="<?php echo do_shortcode('[blogurl]').'website-images/me.jpg';?>" /></div>
							<div class="col-10-12">
								<?php get_template_part( 'content', 'page' ); ?>
							</div>
						</article>
					</header>
				</div>

				<?php 

					if ( get_query_var('paged') ) {
					    $paged = get_query_var('paged');
					} else if ( get_query_var('page') ) {
					    $paged = get_query_var('page');
					} else {
					    $paged = 1;
					}

				?>



				<?php $args = array(
					'paged' 		   => $paged,
					'posts_per_page'   => 5,
					'offset'           => 0,
					'category'         => '',
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'include'          => '',
					'exclude'          => '',
					'meta_key'         => '',
					'meta_value'       => '',
					'post_type'        => 'post',
					'post_mime_type'   => '',
					'post_parent'      => '',
					'post_status'      => 'publish',
					'suppress_filters' => true ); 

					$counter = 0;
					$trans_bg_class = "";

					$postslist = get_posts( $args );
					foreach ( $postslist as $post ) :
						//set transparent background class for evens
					  	$counter++;
						if($counter %2 == 1)
						{
							$trans_bg_class = " trans-bg";
						}
						else
						{
							$trans_bg_class = "";
						}
					  	setup_postdata( $post ); ?> 
						<div class="clear"></div>
						<div class="<?php echo $trans_bg_class; ?>">
							<div class="grid grid-pad">
								<section class="post-excerpt">
									<div class="col-2-3">
										<nav><h1><a href=" <?php echo get_the_permalink( ); ?> "><?php the_title(); ?></a></h1></nav>
										<date><?php the_date(); ?></date> 
										<?php the_excerpt(); ?>
										<nav><a href=" <?php echo get_the_permalink( ); ?> ">Read More</a></nav>
									</div>
									<div class="col-1-3">
										<div class="blog-thumb-container bounce">
											<nav class="portfolio-thumb"><span><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => 'grayscale blog-thumb'))?></a></span></nav>
										</div>	
									</div>
								</section>
							</div>
						</div>


					<?php
						endforeach; 
					?>
				
					<?php
						$the_last_page = $wp_query->max_num_pages;
						$loaded_page = intval($paged);
					?>
					<div class="grid grid-pad">
						<?php if ( $the_last_page == $loaded_page) { ?>
							<nav id="newer-posts" title="Newer posts"><a href="<?php previous_posts(); ?>"><img class="nav-arrow" src="<?php echo get_bloginfo('url') . '/website-images/previous.png'; ?>" />  Newer Posts</a></nav>
						<?php } elseif ($loaded_page == 1) { ?> 
							<nav id="older-posts" title="Older posts"><a href="<?php next_posts(); ?>">Older Posts <img class="nav-arrow" src="<?php echo get_bloginfo('url') . '/website-images/next.png'; ?>" /></a></nav> 
						<?php } else { ?> 
							<nav id="newer-posts" title="Newer posts"><a href="<?php previous_posts(); ?>"><img class="nav-arrow" src="<?php echo get_bloginfo('url') . '/website-images/previous.png'; ?>" /> Newer Posts</a></nav> <nav id="older-posts" title="Older posts"><a href="<?php next_posts(); ?>">Older Posts <img class="nav-arrow" src="<?php echo get_bloginfo('url') . '/website-images/next.png'; ?>" /></a> </nav> 
						<?php } ?>
					</div>


					<?php wp_reset_postdata(); ?>

					<div id="sub-images"></div>
					<div class="clear"></div>


				
			</div>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<nav id="post-nav">
			<div class="nav-tab">M<br>O<br>R<br>E</div>
			<div class="nav-tab-content"><?php get_sidebar(); ?></div>
		</nav>


<?php get_footer(); ?>
