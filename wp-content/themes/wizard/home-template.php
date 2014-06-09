<?php
/*
Template Name: Home template
*/

get_header(); ?>
	<!-- full width bg -->
	
	
	<div id="home-page" class="content-area" >
		<div id="bg-grad-top" class="content-area"></div>
		<main class="site-main" role="main">

		
			<!-- inner content section -->
			<div data-scroll id="wizard-technology-services" class="anchor"></div>
			<section id="services">
				<div class="grid grid-pad">
				<?php 
					$page_title = 'Services';
					echo '<header class="entry-header col-1-1"><h1 class="entry-title services-title">'.$page_title.'</h1></header>';
					echo '<div class="section-break"></div>';
					$page = get_page_by_title( $page_title );
					$content = apply_filters('the_content', $page->post_content); 
					echo $content; 
				?>
				</div>
			</section>

			
			<div data-scroll id="wizard-technology-work" class="anchor"></div>
			<section id="work">
				<?php include 'portfolio-inner.php'; ?>	
			</section>


			<div data-scroll id="about-wizard-technology" class="anchor"></div>
			<section id="about">
				<div class="grid grid-pad">
					<div class="col-1-1">
					<?php
						$page_title = 'About';
						echo '<header class="entry-header  col-1-1"><h1 class="entry-title lightest-text">'.$page_title.'</h1></header>';
						echo '<div class="section-break"></div>';
						$page = get_page_by_title( $page_title );
						$content = apply_filters('the_content', $page->post_content); 
						echo $content; 
						echo '<div class="section-break"></div>';
					?>
					</div>
				</div>
			</section>


			<div data-scroll id="contact-wizard-technology" class="anchor"></div>
			<section id="contact">
				<div class="grid grid-pad">
					<?php
						$page_title = 'Contact';
						echo '<header class="entry-header"><h1 class="entry-title  col-1-1">'.$page_title.'</h1></header>';
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
	<nav id="post-nav">
		<div class="nav-tab">M<br>O<br>R<br>E</div>
		<div class="nav-tab-content"><?php get_sidebar(); ?></div>
	</nav>
	
<?php get_footer(); ?>
