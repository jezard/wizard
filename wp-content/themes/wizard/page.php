<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wizard
 */

get_header(); ?>

	<div id="primary" class="content-area all-pages">
		<main id="main" class="site-main" role="main">
			<div class="grid grid-pad">
				<div class="col-1-1">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'page' ); ?>


					<?php endwhile; // end of the loop. ?>
					<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
						<a class="addthis_button_facebook"></a>
						<a class="addthis_button_twitter"></a>
						<a class="addthis_button_google_plusone_share"></a>
						<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5384be0d1cdde2f0"></script>
					<!-- AddThis Button END -->
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<nav id="post-nav">
		<div class="nav-tab">M<br>O<br>R<br>E</div>
		<div class="nav-tab-content">
			<?php get_sidebar(); ?>
			<form id="more-pages" action="<?php bloginfo('url'); ?>" method="get">
		   		<?php wp_dropdown_pages('exclude='.wizardMenuExclude()); ?>
		   		<input type="submit" name="submit" value="View page" />
		   </form>
		</div>
	</nav>
	
<?php get_footer(); ?>
