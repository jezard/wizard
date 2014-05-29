<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package wizard
 */

get_header(); ?>

	<section id="blog-search" class="content-area">
		<div id="bg-grad-top-blog" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad-blog.gif';?>)"></div>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<div class="grid grid-pad">
				<div class="col-1-1">
					<header class="page-header search-header">
						<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'wizard' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
				</div>
			</div>
			<?php /* Start the Loop */ ?>
			
				<?php while ( have_posts() ) : the_post(); ?>

				<?php
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
				?>
				<aside class="post-excerpt<?php echo $trans_bg_class; ?>">
					<div class="grid grid-pad">
						<div class="col-2-3">
							<?php get_template_part( 'content', 'search' ); ?>
						</div>
						<div class="blog-thumb-container bounce">
							<nav class="portfolio-thumb"><span><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID, 'post-thumb', array('class' => 'grayscale blog-thumb'))?></a></span></nav>
						</div>	
					</div>
				</aside>
				

				<?php endwhile; ?>

			<div class="grid grid-pad">
				<div class="col-1-1">
					<?php wizard_paging_nav(); ?>
				</div>
			<div>

		<?php else : ?>
		<div class="grid grid-pad">
			<div class="col-1-1">
				<?php get_template_part( 'content', 'none' ); ?>
			</div>
		</dir>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<nav id="post-nav">
		<div class="nav-tab">M<br>O<br>R<br>E</div>
		<div class="nav-tab-content"><?php get_sidebar(); ?></div>
	</nav>
<?php get_footer(); ?>
