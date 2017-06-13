<?php

function frindle_cssinvolve() {
	
	wp_enqueue_style('frindle-style', get_stylesheet_uri());
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/inc/css/font-awesome.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/inc/css/flexslider.css' );

}
add_action('wp_enqueue_scripts', 'frindle_cssinvolve');



function frindle_scriptinvolve() {
 wp_enqueue_script('frindle-header', get_template_directory_uri(). '/js/header.js',array('jquery'), '1.0.0', true);
 wp_enqueue_script('flexslider-min', get_template_directory_uri(). '/js/jquery.flexslider-min.js',array('jquery'), null, true);
 //wp_enqueue_script('flexslider', get_template_directory_uri(). '/js/jquery.flexslider.js',array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'frindle_scriptinvolve');



// Get top Ancenstor
function frindle_get_top_ancestor_id() {
	global $post;
	if($post->post_parent) {
			
		$ancestors = array_reverse(get_post_ancestors($post->ID));
	
		return $ancestors[0];
		
	}

	return $post->ID;	

}


// does page have children?

function frindle_has_children(){
	global $post;
	
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
	
}



// Theme Setup
function frindle_TwoThemeFunction() {
	
		// Navigation Menus
		register_nav_menus(array(
			'primary' => esc_html__( 'Primary Menu', 'frindle'),
			'footer' =>  esc_html__( 'Footer Menu', 'frindle'),
		));



		//background imaage support
		
		add_theme_support( 'custom-background', apply_filters( 'frindle_custom_background_args', array(
	    		'default-color' => 'F2F2F2',
	    		'default-image' => '',
	  	) ) );

		
		//Register Image size
		
		// Add Feature image support
		add_theme_support('post-thumbnails');
		add_image_size('frindle-small-thumbnail', 300, 195, true);
		add_image_size('frindle-featured-block', 818, 400, true);
		add_image_size('frindle-sidebar', 135, 75, true);
		add_image_size('frindle-popular-post', 100, 100, true);	
	
	
		
		// The post format support
		add_theme_support('post-formats', array('aside', 'status', 'gallery','link','quote','video','audio'));
	  	

	  	// Add default posts and comments RSS feed links to head.
  		add_theme_support( 'automatic-feed-links' );
		
		//add support for title tag
 		add_theme_support( 'title-tag' );

 		//added editor style sheet
		add_editor_style('inc/css/editor-style.css');

		//custome logo
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );



		// The content width

		

		if ( ! isset( $content_width ) )
	    $GLOBALS['content_width'] = 1400;
	
}
add_action('after_setup_theme', 'frindle_TwoThemeFunction');


if ( ! function_exists( 'frindle_the_custom_logo' ) ) :

function frindle_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function frindle_custom_header_and_background() {
	add_theme_support( 'custom-header', apply_filters( 'custom_header_args', array(
		'wp-head-callback'       => 'frindle_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'frindle_custom_header_and_background' );

if ( ! function_exists( 'frindle_header_style' ) ) :

function frindle_header_style() {
	
	if ( display_header_text() ) {
		return;
	}

	
	?>
	<style type="text/css" id="extra-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php
}
endif;






// Customize excerpt size
function frindle_custom_excerpt_length($length) {

	if ( is_admin() ) {
		
		return $length;
	}

	return 45;
}
add_filter('excerpt_length','frindle_custom_excerpt_length');




// Excerpt Replace Read more
function frindle_new_excerpt_more($more) {
			
			global $post;
			return '<a href="'. esc_url(get_permalink($post->ID)) . '">' . esc_html__('Read More &raquo;','frindle') . '</a>';
   
}

add_filter('excerpt_more', 'frindle_new_excerpt_more');
   



   
 
// Register widget Locations


function frindle_WidgetIni() {
	
	//right sidebar register
	
	register_sidebar( array(
		
		'name' 				=> esc_html__('Right Sidebar', 'frindle'),
		'id' 				=> 'sidebar1',
		'description'   	=> __('This is the main sidebar of the website. Which will appear on the right side of the page.','frindle'),
		'before_widget' 	=> '<div class="widget-item">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
		
	));
	
	//Footer Widget 1
	
	register_sidebar( array(
		
		'name'				=> esc_html__('Footer Widget 1', 'frindle'),
		'id' 				=> 'footer1',
		'description'   	=> __('First column of the footer widget area.','frindle'),
		'before_widget' 	=> '<div class="widget-item">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	
	));
	
	//Footer Widget 2
	
	register_sidebar( array(
	
		'name'				=> esc_html__('Footer Widget 2', 'frindle'),
		'id' 				=> 'footer2',
		'description'   	=> __('Second column of the footer widget area.','frindle'),
		'before_widget' 	=> '<div class="widget-item">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	
	));
	
		//Footer Widget 3
	
	register_sidebar( array(
	
		'name' 				=> esc_html__('Footer Widget 3', 'frindle'),
		'id' 				=> 'footer3',
		'description'   	=> __('Third column of the footer widget area.','frindle'),
		'before_widget' 	=> '<div class="widget-item">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h2 class="widget-title">',
		'after_title' 		=> '</h2>',
	
	));
	
	//Header Ads Widget
	
	register_sidebar(array(
	
		'name' 				=> esc_html__('Header Ads', 'frindle'),
		'id' 				=> 'header-ads',
		'description' 		=> esc_html__( 'Header Ads area', 'frindle'),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h3>',
		'after_title' 		=> '</h3>'
		
	)); 
	
	
	//The widgets
	
	//Registration of Popular Post Widget
	register_widget( 'frindle_pop_posts' );
	
	// Social Links Widget Register
	register_widget('frindle_Social_Links');


	
	
}   

add_action('widgets_init', 'frindle_WidgetIni');



$args = array(
	'width'         => 1200,
	'height'        => 250,
	'description'	=> __('Even after hiding image if you keep see image in header then please go to Appearance > Customize > Customize Theme Color and change the appropriate header color.' ,'frindle'),
);
add_theme_support( 'custom-header', $args );



 



// load the widgets & customizer


require get_template_directory() . '/inc/widget/jetpack.php';
require get_template_directory() . '/inc/widget/frindle-posts.php';
require get_template_directory() . '/inc/widget/popular-post.php';
require get_template_directory() . '/inc/widget/social-links.php';
require get_template_directory() . '/inc/customizer.php';




//Active Link color set up

function frindle_nav_class($classes, $item){

			 if( in_array('current-menu-item', $classes) ){
					 $classes[] = 'active ';
			 }
			 return $classes;			 
}
add_filter('nav_menu_css_class' , 'frindle_nav_class' , 10 , 2);




if ( ! function_exists( 'frindle_post_images' ) ) {

  function frindle_post_images( $args=array() ) {
    global $post;

    $defaults = array('post_parent' => $post->ID,
	'post_type' => 'attachment',
	'orderby' => 'menu_order', // you can also sort images by date or be name
	'order' => 'ASC',
	'numberposts' => 5, // number of images (slides)
	'post_mime_type' => 'image'
    );

    $args = wp_parse_args( $args, $defaults );

    return get_posts( $args );
  }

}