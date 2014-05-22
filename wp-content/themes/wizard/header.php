<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wizard
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,400italic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
<script type="text/javascript" src="http://wizard.technology/wp-content/themes/wizard/js/modernizr.custom.11638.js"> </script>
</head>

<?php
	if(is_front_page())
	{
		$home_header_class = ' fixed-header';
		$offset_top = ' offset-top';
		/*$offset_bottom = ' offset-bottom';*/
	}
	else
	{
		$home_header_class = '';
		$offset_top = '';
	}
?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header<?php echo $home_header_class; ?>" role="banner">
		<div class="site-branding grid grid-pad">
			<nav class="site-title col-1-4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="wt-logo" src="<?php echo do_shortcode('[blogurl]'); ?>website-images/wt-logo.png" title="<?php bloginfo( 'name' ); ?>"  alt="<?php bloginfo( 'name' ); ?>" /></a></nav>
			<div class="site-description col-9-12">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Primary Menu', 'wizard' ); ?></button>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wizard' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		
		
		
	</header><!-- #masthead -->


	<div id="content" class="site-content<?php echo $offset_top; ?>">