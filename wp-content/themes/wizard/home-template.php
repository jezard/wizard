<?php
/*
Template Name: Home template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div id="home-page" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper.gif';?>); background-position:0 55px">
		<div id="bg-grad-top" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad.gif';?>)"></div>
		<main class="site-main" role="main">
		
			<!-- inner content section -->
			<div class="grid grid-pad">

				<div id="services">

					<?php 
						$page_title = 'Services';
						echo '<header class="entry-header"><h1 class="entry-title">'.$page_title.'</h1></header>';
						echo '<div class="services-break"></div>';
						$page = get_page_by_title( $page_title );
						$content = apply_filters('the_content', $page->post_content); 
						echo $content; 
					?>
				</div>

			</div>

			<section id="work"></section>

			<section id="about"></section>
			
			<section id="contact"></section>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
<script type="text/javascript">

jQuery('#work').load('<?php get_bloginfo('url'); ?>/work/ #projects-page')
</script>