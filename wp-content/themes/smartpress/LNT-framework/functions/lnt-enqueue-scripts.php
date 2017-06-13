<?php

/**
 * Enqueue scripts and styles.
 */
 
function smartpress_scripts() {
	
	global $theme_name;
	
	/*  Theme Stylesheets and fonts */
	
	wp_enqueue_style( 'smartpress-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'smartpress_bootstrap', get_template_directory_uri() .'/stylesheets/bootstrap.css');
	wp_enqueue_style( 'smartpress_theme', get_template_directory_uri() .'/stylesheets/theme.css');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css','', $theme_name );
	
	/* Theme Scripts */
	
	/* Register Theme Scripts - Enqueue on demand */
	
	wp_register_script( 'smartpress-magnific-lightbox', get_template_directory_uri() .'/js/jquery.magnific-popup.min.js', array('jquery'), $theme_name, true );
	
	$gallery_on_blog_items = get_theme_mod('smartpress_lightbox_on_blog_posts', 'no');

	if($gallery_on_blog_items == 'yes'){

	wp_enqueue_script('smartpress-magnific-lightbox');

	}
	wp_register_script( 'smartpress_cycle_slideshow', get_template_directory_uri() .'/js/jquery.cycle2.js', array('jquery'), $theme_name, true );
	
	/* Enqueue Theme Scripts - These scripts are required all the time */
	
	wp_enqueue_script( 'smartpress_bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), $theme_name, true );
	wp_enqueue_script( 'smartpress_bootstrap_dropdown', get_template_directory_uri() . '/js/bootstrap-hover-dropdown.js', array(), $theme_name, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		
		wp_enqueue_script( 'comment-reply' );
		
	}
	
	// Conditional polyfills
	
	wp_enqueue_script( 'smartpress-respond', get_template_directory_uri().'/js/respond.min.js' );
	
	if(function_exists('wp_script_add_data')){
		
		 wp_script_add_data( 'smartpress-respond', 'conditional', 'lt IE 9' );
		 
	}
   
	
}

add_action( 'wp_enqueue_scripts', 'smartpress_scripts' );
