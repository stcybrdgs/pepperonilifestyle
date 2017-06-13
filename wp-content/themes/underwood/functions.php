<?php

/* **************************************************************************************************** */
// Setup Theme
/* **************************************************************************************************** */

add_action('after_setup_theme', 'underwood_setup');

if (!function_exists('underwood_setup')) {

    function underwood_setup() {

       // Localization

        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('underwood', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1500, 9999, true); // big stuff like banners
        add_image_size('underwood-833-9999', 833, 9999, false); // with sidebar
        add_image_size('underwood-833-500', 833, 500, true); // with sidebar gallery
        add_image_size('underwood-1140-400', 1140, 400, true); // full width
        add_image_size('underwood-555-555', 555, 555, true); // fancy big
        add_image_size('underwood-401-401', 401, 401, true); // grid

        // Load feed links

        add_theme_support('automatic-feed-links');

        // Support Custom Background

        $underwood_custom_background_defaults = array(
            'default-color' => 'f2f2f2'
        );
        add_theme_support( 'custom-background', $underwood_custom_background_defaults );
        
        // Support title tag
        
        add_theme_support( "title-tag" );

        // Register Menus

        register_nav_menu('primary', __('Primary Menu', 'underwood'));
        
        // Set Content Width
        
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1170;
        }
        
        // support core logo
        
        add_theme_support( 'custom-logo' );
        
        // load variants for fonts
        if ( class_exists( 'Kirki_Fonts_Google' ) ) {
            Kirki_Fonts_Google::$force_load_all_variants = true;
        }
        
        // Woo Support
        
        add_theme_support( 'woocommerce' );
        
    }

}


/* **************************************************************************************************** */
// Load Admin Panel
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . 'inc/options.php' );
require_once( trailingslashit( get_template_directory() ) . 'inc/pro/class-customize.php' );

// Helper

function underwood_get_option($optionID, $default_data = false) {
    if (get_theme_mod( $optionID )) {
        return get_theme_mod( $optionID );   
    } else {
        return $default_data;
    }
}


/* **************************************************************************************************** */
// Do TGM
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . 'inc/tgm/tgm-init.php' );


/* **************************************************************************************************** */
// Load Meta Boxes
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . 'inc/meta_boxes.php' );


/* **************************************************************************************************** */
// Custom NavWalker
/* **************************************************************************************************** */
 
require_once( trailingslashit( get_template_directory() ) . 'inc/wp_bootstrap_navwalker.php');


/* **************************************************************************************************** */
// Sidebars
/* **************************************************************************************************** */

require_once( trailingslashit( get_template_directory() ) . 'inc/sidebars.php');


/* **************************************************************************************************** */
// Sidebar Helper
/* **************************************************************************************************** */

function underwood_sidebar_is($postID) {
    global $post;
    if (is_singular()) {
        $sidebar=get_post_meta($post->ID, 'underwood_sidebar_select', true);
        if (empty($sidebar) ) {
            return "right"; // set default here
        } else if ($sidebar == 'full') {
            return "full";
        } else if ($sidebar == 'right') {
            return "right";
        } else {
            return "left";
        }
    }
}


/* **************************************************************************************************** */
// Layout Post Format Body Class Helper
/* **************************************************************************************************** */

add_filter( 'body_class', 'underwood_post_format_layout_body_classes' );

function underwood_post_format_layout_body_classes( $classes ) {
    global $post;
    if (is_front_page()) {
        return array_merge( $classes, array( 'frontpage-layout' ) );
    } else {    
        return array_merge( $classes, array( 'not-post-type','none-banner-row' ) );
    }
}


/* **************************************************************************************************** */
// .palette additional classes
/* **************************************************************************************************** */

function underwood_palette_classes() {
    global $post;
    if (is_singular()) {
        if ( has_post_thumbnail() && (get_post_meta( $post->ID, 'underwood_toggle_featured_banner', true ) == "show") ) { 
            echo "has-post-thumbnail";
        } else {
            echo ""; 
        }
    } else { 
        echo ""; 
    }
}





/* **************************************************************************************************** */
// More Tag
/* **************************************************************************************************** */

add_filter('the_content_more_link', 'underwood_wrap_more_tag');

function underwood_wrap_more_tag($link){
    global $post;
    return "<div class='more_tag'><span><a href='".esc_url(get_permalink())."#more-".$post->ID."'>".__('Continue Reading', 'underwood')."</a></span></div>";
}



/* **************************************************************************************************** */
// Override gallery style
/* **************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );


/* **************************************************************************************************** */
// Modify Comments Output
/* **************************************************************************************************** */

function underwood_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-wrap">
			<div class="comment-img">
				<?php echo get_avatar($comment,$args['avatar_size'],null,null,array('class' => array('img-responsive') )); ?>
			</div>
			<div class="comment-body">
				<h4 class="comment-author"><?php echo get_comment_author_link(); ?></h4>
				<span class="comment-date"><?php printf(__('%1$s at %2$s', 'underwood'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') { ?><em><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> <?php _e('Comment awaiting approval', 'underwood'); ?></em><br /><?php } ?>
				<?php comment_text(); ?>
				<span class="comment-reply"> <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'underwood'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?></span>
			</div>
		</div>
<?php }


/* **************************************************************************************************** */
// Modify Search Form
/* **************************************************************************************************** */

add_filter('get_search_form', 'underwood_modify_search_form');

function underwood_modify_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . esc_url(home_url()) . '/" >';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="' . esc_html__('Search', 'underwood') . '" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '<button id="searchsubmit"><i class="fa fa-search" aria-hidden="true"></i></button></form>';
    return $form;
}


/* **************************************************************************************************** */
// Load Public Scripts
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'underwood_public_scripts');

function underwood_public_scripts() {
    if (!is_admin()) {
        // theme core
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7');
        wp_enqueue_script('easing',get_template_directory_uri() . '/assets/js/jquery.easing.min.js','','1.3',true);
        wp_enqueue_script('nicescroll',get_template_directory_uri() . '/assets/js/nicescroll.min.js','','3.6.8',true);
        wp_enqueue_script('parallax',get_template_directory_uri() . '/assets/js/parallax.min.js','','1.4.2',true);
        wp_enqueue_script('underwood_public',get_template_directory_uri() . '/assets/js/public.js','','1.0.0',true);
        // comments
        if (is_singular() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
    }
}


/* **************************************************************************************************** */
// Load Public CSS
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'underwood_public_styles');

function underwood_public_styles() {
        // theme core
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7', 'all');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'underwood-style', get_bloginfo( 'stylesheet_url' ), false, get_bloginfo('version') );
        // some default fonts if kirki is not installed
        if( !class_exists('Kirki') ) { 
            wp_enqueue_style( 'underwood-google-font-defaults', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,400i,600,700,700i', array(), '1.0', 'all');
        }
}


/* **************************************************************************************************** */
// Author Box Styles
/* **************************************************************************************************** */

add_action('wp_head', 'underwood_header_styles', 99);

function underwood_header_styles() {
    echo "<style>";
        if (underwood_get_option('sandbox_style') == '1') { 
            $underwood_palette_bg_color = esc_html(underwood_get_option('palette_bg_color'));
            if (!empty($underwood_palette_bg_color)) { $underwood_palette_bg_color = esc_html($underwood_palette_bg_color); } else { $underwood_palette_bg_color = '#ffffff'; }
            ?>
            .saboxplugin-authorname a {font-size:16px;font-weight:600;text-transform:uppercase;}
            .saboxplugin-wrap .saboxplugin-socials {background-color: <?php echo $underwood_palette_bg_color; ?>;}
            .saboxplugin-wrap .saboxplugin-socials {background: #FCFCFC; padding: 0 15px; -webkit-box-shadow: 0 1px 0 0 #eee inset; -moz-box-shadow: 0 1px 0 0 #eee inset; box-shadow: 0 1px 0 0 #eee inset;}
        <?php }
    echo "</style>";
}


/* **************************************************************************************************** */
// WooCommerce Support
/* **************************************************************************************************** */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'underwood_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'underwood_wrapper_end', 10);

function underwood_wrapper_start() {
  echo '<div class="row"><div class="col-xs-12"><div class="singular-entry">';
}

function underwood_wrapper_end() {
  echo '</div></div></div>';
}