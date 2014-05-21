<?php
/*
Template Name: Home template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div id="home-page" class="content-area" >
		<div id="bg-grad-top" class="content-area" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper-grad.gif';?>)"></div>
		<main class="site-main" role="main">

		
			<!-- inner content section -->
			<div id="wizard-technology-services" class="anchor"></div>
			<section id="services" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/graph-paper.gif';?>); background-position:0 55px">
				<div class="grid grid-pad">
				<?php 
					$page_title = 'Services';
					echo '<header class="entry-header"><h1 class="entry-title">'.$page_title.'</h1></header>';
					echo '<div class="section-break"></div>';
					$page = get_page_by_title( $page_title );
					$content = apply_filters('the_content', $page->post_content); 
					echo $content; 
				?>
				</div>
			</section>

			
			<div id="wizard-technology-work" class="anchor"></div>
			<section id="work">
				<?php include 'portfolio-inner.php'; ?>	
			</section>


			<div id="about-wizard-technology" class="anchor"></div>
			<section id="about" style="background: url(<?php echo do_shortcode('[blogurl]').'website-images/stardust.png';?>);">
				<div class="grid grid-pad">
					<div class="col-1-1">
					<?php
						$page_title = 'About';
						echo '<header class="entry-header"><h1 class="entry-title lightest-text">'.$page_title.'</h1></header>';
						echo '<div class="section-break"></div>';
						$page = get_page_by_title( $page_title );
						$content = apply_filters('the_content', $page->post_content); 
						echo $content; 
						echo '<div class="section-break"></div>';
					?>
					</div>
				</div>
			</section>


			<div id="contact-wizard-technology" class="anchor"></div>
			<section id="contact">
				<div class="grid grid-pad">
					<?php
						$page_title = 'Contact';
						echo '<header class="entry-header"><h1 class="entry-title">'.$page_title.'</h1></header>';
						echo '<div class="section-break"></div>';
						$page = get_page_by_title( $page_title );
						$content = apply_filters('the_content', $page->post_content); 
						echo $content; 
						echo '<div class="section-break"></div>';
					?>
					</div>
				</div>
			</section>

			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
<script type="text/javascript">


</script>