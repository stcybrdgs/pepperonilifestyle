<?php
/**
 * stride functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stride
 */

if ( ! function_exists( 'stride_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stride_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on stride, use a find and replace
	 * to change 'stride-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'stride-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('feat-image', '1920', '500');
	add_image_size('theme-logo', '160', '90');

	/**
	 * Add support for logo
	 */
	add_theme_support('custom-logo', array(
		'size'	=>	'theme-logo'
		));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'stride-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'stride_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // stride_setup
add_action( 'after_setup_theme', 'stride_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stride_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stride_content_width', 640 );
}
add_action( 'after_setup_theme', 'stride_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stride_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stride-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'stride_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stride_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() .'/bootstrap/css/bootstrap.css' );

	wp_enqueue_style( 'stride-google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' );

	wp_enqueue_style( 'stride-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() .'/bootstrap/js/bootstrap.js', array( 'jquery' ) );

	wp_enqueue_script('stride-js', get_template_directory_uri() . '/js/script.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'stride_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
/**
 * Include navwalker
 */
require get_template_directory() . '/inc/navwalker.php';
/**
 * Replace default comments with bootstrap comments
 */
require get_template_directory() . '/inc/custom-comments.php';
/**
 * Replace default comments with bootstrap comments
 */
require get_template_directory() . '/inc/tgmpa/plugin-activation.php';
