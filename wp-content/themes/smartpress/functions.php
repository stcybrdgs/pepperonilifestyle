<?php
/**
 * Smartpress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Smartpress
 */

if ( ! function_exists( 'smartpress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smartpress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Smartpress, use a find and replace
	 * to change 'smartpress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'smartpress', get_template_directory() . '/languages' );

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
	 * Enable support for custom logos.
	 *
	 * @link https://make.wordpress.org/core/2016/03/10/custom-logo/
	 */
	 
	add_theme_support( 'custom-logo', array(
   'height'      => 60,
   'width'       => 200,
   'flex-width' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'smartpress' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'smartpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'video',
		'audio',
		'gallery',
		'quote'
	) );
	
	/*
	 * Add new image sizes
	 */
	 
	add_image_size( 'smartpress-custom', 1024, 640, true );
	
}
endif;
add_action( 'after_setup_theme', 'smartpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function smartpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'smartpress_content_width', 640 );
}
add_action( 'after_setup_theme', 'smartpress_content_width', 0 );


/**
 * Load theme init file.
 */
 
require get_template_directory() . '/LNT-framework/init.php';
