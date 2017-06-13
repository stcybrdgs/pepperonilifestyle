<?php

if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

function megadrive_theme_setup_function ()	{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5');
	add_theme_support('title-tag');
	add_theme_support('custom-logo');
	register_nav_menus(array('main-menu' => __('Main Menu','megadrive'), 'top-menu' => __('Top Menu','megadrive')));
}
add_action('after_setup_theme','megadrive_theme_setup_function');

function megadrive_sidebar_setup_function () {
	// Registering sidebars
	register_sidebar(array(
		'name' => __('Right Sidebar', 'megadrive'),
		'id' => 'sidebar-right',
		'description' => __('Right sidebar widget area', 'megadrive'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div> <!-- widget end -->',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="widget-content" >'
	));
	register_sidebar(array(
		'name' => __('Footer Sidebar #1', 'megadrive'),
		'id' => 'sidebar-footer-1',
		'description' => __('Footer sidebar #1 widget area', 'megadrive'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div> <!-- widget end -->',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="footer-widget-content" >'
	));
	register_sidebar(array(
		'name' => __('Footer Sidebar #2', 'megadrive'),
		'id' => 'sidebar-footer-2',
		'description' => __('Footer sidebar #2 widget area', 'megadrive'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div> <!-- widget end -->',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="footer-widget-content" >'
	));
	register_sidebar(array(
		'name' => __('Footer Sidebar #3', 'megadrive'),
		'id' => 'sidebar-footer-3',
		'description' => __('Footer sidebar #3 widget area', 'megadrive'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div> <!-- widget end -->',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="footer-widget-content" >'
	));
}
add_action('widgets_init','megadrive_sidebar_setup_function');

// Pagination function
function megadrive_pagination() {
	$args = array('mid_size' => 1, 'prev_text' => __('&laquo; Previous','megadrive'), 'next_text' => __('Next &raquo;','megadrive'));
	the_posts_pagination($args);
}

// Register css and javascript files
function megadrive_register_scripts() {
	if (!is_admin()) {
	wp_enqueue_style('google-font-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700', array(), null, 'all');

	wp_enqueue_style('styles-style', get_stylesheet_uri(), array(), null, 'all');

	// Enqueue FlexSlider JavaScript
	wp_register_script('jquery-flexslider', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery') );
	wp_enqueue_script('jquery-flexslider');
	// Enqueue FlexSlider Stylesheet
	wp_register_style( 'styles-flexslider', get_template_directory_uri() . '/flexslider/flexslider.css', 'all' );
	wp_enqueue_style( 'styles-flexslider' );

	// Enqueue Slicknav Stylesheet
	wp_enqueue_script('jquery-slicknav', get_template_directory_uri() . '/slicknav/jquery.slicknav.min.js', array( 'jquery' ),'',false);
	// Enqueue Slicknav Stylesheet
	wp_enqueue_style('styles-slicknav', get_template_directory_uri() . '/slicknav/slicknav.css','', '', 'all');
	}

	// Enqueue WordPress Core Script for Comment Reply
	if (is_singular() ) {
		wp_enqueue_script('comment-reply');
	}

	// Enqueue inline JavaScript in header
	wp_add_inline_script("jquery-slicknav", 
	"jQuery(document).ready(function($) {
		$('div#menu-wrapper ul.menu').slicknav({
				label: '',
				duration: 300,
				allowParentLinks: true,
				prependTo:'#menu'
			});
		$('.flexslider').flexslider({
			animationLoop: true,
			slideshow: true,
			slideshowSpeed: 10000,
			pauseOnHover: true
		});
	});");
}
add_action('wp_enqueue_scripts', 'megadrive_register_scripts');

function megadrive_custom_excerpt_length($length) {
	return 10;
}
add_filter( 'excerpt_length', 'megadrive_custom_excerpt_length');

function megadrive_excerpt_more() {
	return '...';
}
add_filter('excerpt_more', 'megadrive_excerpt_more');

function megadrive_custom_pre_get_posts($query){
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
}
add_action('pre_get_posts','megadrive_custom_pre_get_posts');

?>