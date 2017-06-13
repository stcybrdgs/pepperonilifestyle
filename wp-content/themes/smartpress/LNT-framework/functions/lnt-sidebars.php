<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smartpress_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'smartpress' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Primary sidebar widget area', 'smartpress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'smartpress' ),
		'id'            => 'secondary',
		'description'   => esc_html__( 'Secondary sidebar widget area', 'smartpress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
}

add_action( 'widgets_init', 'smartpress_widgets_init' );
