<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wizard
 */
get_header(); ?>

	<section id="primary" class="content-area">
		<div id="bg-grad-top-blog" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad-blog.gif';?>)"></div>
		<main id="main" class="site-main" role="main">
			<!-- inner content section -->
			<div class="grid grid-pad">

			<?php if ( have_posts() ) : ?>

				<header class="page-header archive-header">
					<h1 class="entry-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'wizard' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'wizard' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'wizard' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wizard' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'wizard' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wizard' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'wizard');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'wizard');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'wizard' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'wizard' );

							else :
								_e( 'Archives', 'wizard' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .page-header -->

				<?php 
					$counter = 0;
					$trans_bg_class = "";
				?>
			</div>


				<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$counter++;
					if($counter %2 == 1)
					{
						$trans_bg_class = " trans-bg";
					}
					else
					{
						$trans_bg_class = "";
					}
				?>


				
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
									<nav class="project-thumb"><span><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => 'grayscale blog-thumb'))?></a></span></nav>
								</div>	
							</div>	
						</section>
					</div>
				</div>

				<?php endwhile; ?>
			<div class="grid grid-pad">

				<?php wizard_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

	<nav id="post-nav">
		<div class="nav-tab">M<br>O<br>R<br>E</div>
		<div class="nav-tab-content"><?php get_sidebar(); ?></div>
	</nav>
<?php get_footer(); ?>
