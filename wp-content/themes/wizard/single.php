<?php
/**
 * The Template for displaying all single posts.
 *
 * @package wizard
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<div id="bg-grad-top-blog" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad-blog.gif';?>)"></div>
		<main id="main" class="site-main" role="main">
			<div class="grid grid-pad wizard-single">
				<div class="col-1-1">
					<?php while ( have_posts() ) : the_post(); ?>
					<<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>

		<article class="wizard-single">
			<div class="grid grid-pad entry-content">
				<div class="entry-meta">
					<span class="posted-on">Posted on <time><?php echo get_the_date(); ?></time></a></span><span class="byline"> by <span class="author vcard"><?php the_author_posts_link(); ?></span></span>		
				</div>
				<div class="col-1-1">
						<?php 
							the_content();  
						?>

						<?php wizard_post_nav(); ?>

				</div>
			</div>
		</div>
		<div class="comments-container">
			<div class="grid grid-pad wizard-single ">
				<div class="col-1-1">
						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>
				</div>
			</div>
		</div>


		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<nav id="post-nav">
		<div class="nav-tab">M<br>O<br>R<br>E</div>
		<div class="nav-tab-content"><?php get_sidebar(); ?></div>
	</nav>
<?php get_footer(); ?>