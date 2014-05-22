<?php
/**
 * wizard functions and definitions
 *
 * @package wizard
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wizard_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wizard_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wizard, use a find and replace
	 * to change 'wizard' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wizard', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wizard' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link') );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wizard_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );

	/* Enable featured images */
	add_theme_support('post-thumbnails');
}
endif; // wizard_setup
add_action( 'after_setup_theme', 'wizard_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wizard_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wizard' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar(array(
       'name'=>'Footer Widgets',
       'before_widget' => '<div id="%1$s" class="widget subfooter col-1-4 %2$s">',
       'after_widget' => '</div>',
   ));
   register_sidebar(array(
       'name'=>'Footer legal',
       'before_widget' => '<div id="%1$s" class="widget  col-1-2 %2$s">',
       'after_widget' => '</div>',
   ));
}
add_action( 'widgets_init', 'wizard_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wizard_scripts() {
	wp_enqueue_style( 'wizard-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wizard-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wizard-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wizard_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Projects', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Projects', 'text_domain' ),
		'view_item'           => __( 'View Project', 'text_domain' ),
		'add_new_item'        => __( 'Add New Project', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Project', 'text_domain' ),
		'update_item'         => __( 'Update Project', 'text_domain' ),
		'search_items'        => __( 'Search Projects', 'text_domain' ),
		'not_found'           => __( 'No Projects found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not Projects found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Projects', 'text_domain' ),
		'description'         => __( 'Showcase of work', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'Projects', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );


/* create project thumbnail size */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'project-thumb', 270, 270, array( 'left', 'top' ) ); // Hard crop left top
}

/*create post thumbnail size */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-thumb', 325, 325, array( 'left', 'top' ) ); // Hard crop left top
}
