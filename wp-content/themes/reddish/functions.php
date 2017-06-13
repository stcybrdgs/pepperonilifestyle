<?php
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
global $reddish_post_count; /* counting posts for displaying 'top link' */
/**
 * Adds support for a custom header image.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 625;
}

function reddish_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	load_theme_textdomain( 'reddish', get_template_directory() . '/languages' );/* Load files for localization*/
	// This theme uses wp_nav_menu() in two locations.
	add_image_size( 'slider-thumb', 9999, 406, true );
	register_nav_menu( 'primary', __( 'Primary Navigation', 'reddish' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color' => '444',
		'default-image'      => '',
		// Set height and width, with a maximum value for the width.
		'height'             => 360,
		'width'              => 960,
		'max-width'          => 2000,
		// Support flexible height and width.
		'flex-height'        => true,
		'flex-width'         => true,
		'header-text'        => true,
		// Random image rotation off by default.
		'random-default'     => false,
	);
	add_theme_support( 'custom-header', $args );
	$args = array(
		'default-color'    => 'ffffff',
		'wp-head-callback' => '_custom_background_cb',
	);
	add_theme_support( 'custom-background', $args );
	add_editor_style();
	add_theme_support( 'title-tag' );
}

/**
 * Adding CSS and JavaScript files
 */
function reddish_scripts_styles() {
	if ( ! is_admin() ) {
		wp_enqueue_script( 'reddish-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ) );
		wp_enqueue_style( 'reddish-style', get_stylesheet_uri() );
		wp_enqueue_style( 'reddish-ie-style', get_template_directory_uri() . '/css/ie7-8.css' );
		wp_style_add_data( 'reddish-ie-style', 'conditional', 'lt IE 9' );
		$string_js = array(
			'submitButtontexteng' => 'Submit',
			'submitButtontext'    => __( 'Submit', 'reddish' ),
			'clearButtontexteng'  => 'Clear',
			'clearButtontext'     => __( 'Clear', 'reddish' ),
			'fileNotselected'     => __( 'File is not selected', 'reddish' ),
			'fileSelected'        => __( 'File is selected', 'reddish' ),
			'chooseFile'          => __( 'Choose file', 'reddish' ),
		);
		wp_localize_script( 'reddish-script', 'reddishStringJs', $string_js );
	}
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/* Display Home page in Pages list in Menu panel*/
function reddish_home_page_menu_args( $args ) {
	$args['show_home'] = true;

	return $args;
}

function reddish_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar( array(
			'id'            => 'primary',
			'name'          => __( 'Main sidebar', 'reddish' ),
			'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'reddish' ),
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}

/**
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @param $comment
 * @param $args
 * @param $depth
 */
function reddish_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		// Display trackbacks differently than normal comments.
		case 'pingback' :
		case 'trackback' : ?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p>
					<?php _e( 'Pingback:', 'reddish' );
					comment_author_link();
					edit_comment_link( __( 'Edit', 'reddish' ), '<span class="edit-link">', '</span>' ); ?>
				</p>
			</li>
			<?php break;
		// Proceed with normal comments.
		default :
			global $post; ?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment comment-article">
					<div class="comment-meta comment-author vcard">
						<?php echo get_avatar( $comment, 44 );
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'reddish' ) . '</span>' : ''
						);
						printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'reddish' ), get_comment_date(), get_comment_time() )
						); ?>
					</div><!-- .comment-meta -->
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'reddish' ); ?></p>
					<?php endif; /* '0' == $comment->comment_approved */ ?>
					<div class="comment-content comment">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->
					<?php edit_comment_link( _x( 'Edit', 'comment', 'reddish' ), '<div class="edit-link">', '</div>' ); ?>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => __( 'Reply', 'reddish' ),
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
						) ) ); ?>
					</div><!-- .reply -->
					<div class="clear"></div>
				</div><!-- #comment-## -->
			</li>
			<?php break;
	endswitch; // end comment_type check
}

// Displaying featured image title
function reddish_featured_img_title() {
	global $post;
	$thumbnail_id    = get_post_thumbnail_id( $post->ID );
	$thumbnail_image = get_posts( array(
		'p'           => $thumbnail_id,
		'post_type'   => 'attachment',
		'post_status' => 'any',
	) );
	if ( $thumbnail_image && isset( $thumbnail_image[0] ) ) {
		return $thumbnail_image[0]->post_title;
	}
}

// Display breadcrumbs
function reddish_breadcrumbs() {
	echo '<div id="breadcrumbs">';
	if ( ( ! is_front_page() ) && ( ! is_404() ) ) { /* if it is Front Page 'Home' is not displayed */
		echo '<a href="' . esc_url( get_home_url( null, '/' ) ) . '">'; /* link to Front Page */
		echo __( 'Home', 'reddish' );
		echo '</a>&thinsp;&#8211;&thinsp;';
	}/* endif is_front_page() */
	if ( is_single() ) {
		echo '';
		the_category( ', ' ); /* display list of categories */
		/* show title differently depending on whether list of categories is displayed  */
		if ( has_category() ) { /* check if the post belongs to any categories */
			echo '&thinsp;&#8211;&thinsp;' . get_the_title() . '';
		} else {
			echo '' . get_the_title() . '';
		}
		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) { /* if it is a page of a paginated post */

			if ( ! is_front_page() ) { /* if it is not home page add hyphen before 'page'*/
				$symbol_before_page = '&thinsp;&#8211;&thinsp;';
			} else {
				$symbol_before_page = '';
			}
			echo '' . $symbol_before_page . __( 'Page', 'reddish' ) . ' ' . $_GET['page'] . '';
		}
	} elseif ( is_category() ) {
		echo '';
		printf( __( 'Category Archives:&thinsp;%s', 'reddish' ), single_cat_title( '', false ) );
		echo '';
	} elseif ( is_attachment() ) {
		echo '' . get_the_title() . '';
	} elseif ( is_page() ) {
		global $post;
		if ( $post->ancestors ) {
			/* reverse order of a parent pages array for the current page */
			$ancestors = array_reverse( $post->ancestors );
			/* display links to parent pages of the current page */
			for ( $i = 0; $i < count( $ancestors ); $i ++ ) {
				if ( 0 == $i ) {
					echo '<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>';
				} else {
					echo '&thinsp;&#8211;&thinsp;<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>';
				}
			}
			echo '&thinsp;&#8211;&thinsp;' . get_the_title() . '';
		} else {
			echo '' . get_the_title() . '';
		}
	} elseif ( is_tag() ) { /* if it is a tags archive page */
		echo '';
		printf( __( 'Tag Archives:&thinsp;%s', 'reddish' ), single_tag_title( '', false ) );
		echo '';
	} elseif ( is_day() ) {
		echo '' . __( 'Archive for &thinsp;', 'reddish' );
		the_time( 'F jS, Y' );
		echo '';
	} elseif ( is_month() ) {
		echo '' . __( 'Archive for &thinsp;', 'reddish' );
		the_time( 'F, Y' );
		echo '';
	} elseif ( is_year() ) {
		echo '' . __( 'Archive for &thinsp;', 'reddish' );
		the_time( 'Y' );
		echo '';
	} elseif ( is_author() ) {
		echo '' . __( 'Author&#8217;s Archive', 'reddish' ) . '';
	} elseif ( is_search() ) {
		echo '' . __( 'Search Results', 'reddish' ) . '';
	} elseif ( is_404() ) {
		echo '' . __( 'Page not found', 'reddish' ) . '';
	}
	if ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { /* if it is a page of the post list */
		if ( ! is_front_page() ) { /* if it is not home page add hyphen before 'page'*/
			$symbol_before_page = '&thinsp;&#8211;&thinsp;';
		} else {
			$symbol_before_page = '';
		}
		echo '' . $symbol_before_page . __( 'Page', 'reddish' ) . ' ' . $_GET['paged'] . '';
	}
	echo '</div>';
}

/* Customize the excerpt length*/
function reddish_custom_excerpt_length( $length ) {
	return 20;
}

/* Customizing 'More link' in posts */
function reddish_custom_excerpt_more( $more ) {
	return ' ';
}

/* This function displays bloginfo name in logo block*/
function reddish_display_bloginfo_name() {
	$title       = get_bloginfo( 'name' );
	$num         = mb_strlen( $title );
	$num         = intval( $num / 2 );
	$first_half  = mb_substr( $title, 0, $num );
	$second_half = mb_substr( $title, $num );
	echo '<h3 class="logo"><a href="' . esc_url( home_url( '/' ) ) . '">' . $first_half . '<span>' . $second_half . '</span></a></h3>';
	//	echo '<div id="desc">' . get_bloginfo( 'description' ) . '</div>';
}

function reddish_paginate_function() {
	global $wp_query;
	$big        = 999999999; // need an unlikely integer
	$translated = __( 'Page', 'reddish' ); // Supply translatable string
	$args       = array(
		'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'             => '',
		'total'              => $wp_query->max_num_pages,
		'current'            => max( 1, get_query_var( 'paged' ) ),
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 1,
		'prev_next'          => true,
		'prev_text'          => '&larr; ' . __( 'Previous', 'reddish' ),
		'next_text'          => __( 'Next', 'reddish' ) . ' &rarr;',
		'type'               => 'plain',
		'add_args'           => false,
		'add_fragment'       => '',
		'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
		'after_page_number'  => '',
	);
	$result     = paginate_links( $args );
	/* remove pagination first page */
	$result = str_replace( '/page/1/', '', $result );
	echo "<div class='pagination'>" . $result . "<p class='clear'></p></div>";
}

// display meta box
function reddish_meta_box_add() {
	add_meta_box(
		'reddish_post_meta_checkbox', // id attribute
		__( 'Image Slider', 'reddish' ), // title
		'reddish_meta_box_cb',
		array( 'post', 'page' ), // post types
		'side', // position
		'low' // post type, position, priority
	);
}

// callback function for meta box
function reddish_meta_box_cb() {
	global $post;
	$reddish_post_meta_checkbox                      = get_post_meta( $post->ID, 'reddish_post_meta_checkbox', true ); // return saved value of meta box
	$reddish_post_meta_checkbox['display_in_slider'] = isset( $reddish_post_meta_checkbox['display_in_slider'] ) ? $reddish_post_meta_checkbox['display_in_slider'] : ''; //if the values doesn't exists, use defaults
	if ( 'post' == $post->post_type ) {
		$string_for_slider_cxheckbox = __( 'Mark this post for Image slider', 'reddish' );
	} elseif ( 'page' == $post->post_type ) {
		$string_for_slider_cxheckbox = __( 'Mark this page for Image slider', 'reddish' );
	} else {
		$string_for_slider_cxheckbox = __( 'Mark this post (page) for Image slider', 'reddish' );
	}
	wp_nonce_field( 'reddish_post_meta_checkbox_nonce', 'meta_box_nonce' ); // validation, add nonce field ?>
	<p>
		<input type="checkbox" id="reddish_post_meta_checkbox[display_in_slider]" name="reddish_post_meta_checkbox[display_in_slider]" value="show_item" <?php checked( $reddish_post_meta_checkbox['display_in_slider'], 'show_item' ); ?> />
		<label for="reddish_post_meta_checkbox[display_in_slider]"><?php echo $string_for_slider_cxheckbox; ?> </label>
	</p>
	<p class="howto"><?php _e( 'Depending on the settings of the slider marked Post (Page) or to be displayed or will not be displayed', 'reddish' ) ?></p>
<?php }

// save meta box data
function reddish_meta_box_save( $post_id ) {
	// Bail if it is an auto save
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// if nonce is not available or we can't verify it, bail
	if ( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'reddish_post_meta_checkbox_nonce' ) ) {
		return;
	}
	$reddish_post_meta_checkbox['display_in_slider'] = isset( $_POST['reddish_post_meta_checkbox']['display_in_slider'] ) ? 'show_item' : '';
	update_post_meta( $post_id, 'reddish_post_meta_checkbox', $reddish_post_meta_checkbox );
}

/* Displaying text and images on the Image Slider */
function reddish_slider_template() {
	$slider_settings = get_option( 'reddish_slider_options' );
	if ( empty( $slider_settings['show_on_front_page'] ) && is_front_page() ) {
		return;
	}
	if ( empty( $slider_settings['show_on_single_posts'] ) && is_single() ) {
		return;
	}
	if ( empty( $slider_settings['show_on_single_pages'] ) && is_page() ) {
		return;
	}
	if ( empty( $slider_settings['show_on_other_pages'] ) && ! is_front_page() && ! is_singular() ) {
		return;
	}

	if ( ! empty( $slider_settings['post_checked'] ) && '1' == $slider_settings['post_checked'] ) {
		$slider_meta_query = array(
			array(
				'key'     => 'reddish_post_meta_checkbox',
				'value'   => 'show_item',
				'compare' => 'LIKE',
			),
		);
	} elseif ( ! empty( $slider_settings['post_checked'] ) && '2' == $slider_settings['post_checked'] ) {
		$slider_meta_query = array(
			'relation' => 'OR',
			array(
				'key'     => 'reddish_post_meta_checkbox',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => 'reddish_post_meta_checkbox',
				'value'   => 'show_item',
				'compare' => 'NOT LIKE',
			),
		);
	} else {
		$slider_meta_query = null;
	}
	if ( ! empty( $slider_settings['show_with_image'] ) && 1 == $slider_settings['show_with_image'] ) {
		$slider_meta_query = array(
			'relation' => 'AND',
			array(
				'key'     => '_thumbnail_id',
				'compare' => 'EXISTS',
			),
			$slider_meta_query,
		);
	}

	// Query Arguments
	$args = array(
		'post_type'           => array( 'post', 'page' ),
		'posts_per_page'      => - 1,
		'ignore_sticky_posts' => 1,
		'meta_query'          => $slider_meta_query,
	);
	// The Query
	global $wp_query;
	/* save old value of variable wp_query */
	$original_query = $wp_query;
	/*add new variable and change value of variable wp_query*/
	$wp_query = null;
	$wp_query = new WP_Query( $args ); ?>
	<!-- Check if the Query returns any posts -->
	<?php if ( $wp_query->have_posts() ) : ?>
		<!-- Start the Slider-->
		<div id="slider_wrapper">
			<div id="image_slideshow" class="slider">
				<ul class="cycle">
					<?php // The Loop
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						$post_thumbnail_id = get_post_thumbnail_id();
						$alt_text          = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
						$image_attributes  = wp_get_attachment_image_src( $post_thumbnail_id, 'slider-thumb' );
						$margin_value      = $image_attributes[1] / 2; ?>
						<li class="slide">
							<?php /* check if the post has thumbnail and if this thumbnail is available */
							if ( has_post_thumbnail() && false !== $image_attributes ) : ?>
								<img src="<?php echo $image_attributes[0]; ?>" alt="<?php echo $alt_text; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" <?php echo 'style="width:' . $image_attributes[1] . 'px; margin-left: -' . $margin_value . 'px;"'; ?>>
								<?php /* the_post_thumbnail( 'slider-thumb' ); */ ?>
								<div class="slider-overlay"></div>
								<div class="slider-data">
									<div class="slider_main_text"><?php the_title(); ?></div>
									<div class="slider_text"><?php the_excerpt(); ?></div>
									<div class="slider_link">
										<a href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'reddish' ) ?></a>
									</div>
								</div>
							<?php else : ?>
								<div class='slider-no-image-text'><?php _e( 'Featured image has not been uploaded', 'reddish' ) ?></div>
							<?php endif; ?>
						</li><!-- .slide -->
					<?php endwhile; ?>
				</ul><!-- .cycle -->
				<div id="cycle_pager"></div>
			</div><!-- .slider -->
		</div><!-- #slider_wrapper -->
	<?php endif;
	/* restore the old value of variable wp_query*/
	$wp_query = null;
	$wp_query = $original_query;
	// Reset Post Data
	wp_reset_postdata();
}

/**
 * Sets up the theme customizer for slider settings.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function reddish_customize_register( $wp_customize ) {

	/* Add section for slider settings */
	$wp_customize->add_section( 'reddish_slider_settings', array(
		'title'       => __( 'Slider Settings', 'reddish' ),
		'description' => '<span class="customize-control-title">' . __( 'Choose where to display the slider', 'reddish' ) . '</span>',
		'priority'    => 150,
	) );

	/* Add option for display slider on the Front Page */
	$wp_customize->add_setting( 'reddish_slider_options[show_on_front_page]', array(
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'reddish_slider_options[show_on_front_page]', array(
		'settings' => 'reddish_slider_options[show_on_front_page]',
		'label'    => __( 'Display slider on the Front Page', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'type'     => 'checkbox',
	) );

	/* Add option for display slider on all single Posts */
	$wp_customize->add_setting( 'reddish_slider_options[show_on_single_posts]', array(
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'reddish_slider_options[show_on_single_posts]', array(
		'settings' => 'reddish_slider_options[show_on_single_posts]',
		'label'    => __( 'Display slider on all single Posts', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'type'     => 'checkbox',
	) );

	/* Add option for display slider on all single Pages */
	$wp_customize->add_setting( 'reddish_slider_options[show_on_single_pages]', array(
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'reddish_slider_options[show_on_single_pages]', array(
		'settings' => 'reddish_slider_options[show_on_single_pages]',
		'label'    => __( 'Display slider on all single Pages', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'type'     => 'checkbox',
	) );

	/* Add option for display slider on all other pages (Search results page, Archives, 404 Page Not Found etc.) */
	$wp_customize->add_setting( 'reddish_slider_options[show_on_other_pages]', array(
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'reddish_slider_options[show_on_other_pages]', array(
		'settings' => 'reddish_slider_options[show_on_other_pages]',
		'label'    => __( 'Display slider on all other pages (Search, Archives, 404 Page Not Found etc.)', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'type'     => 'checkbox',
	) );

	/* Add option for select what to display in the slider */
	$wp_customize->add_setting( 'reddish_slider_options[post_checked]', array(
		'default'           => '1',
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'reddish_sanitize_radio',
	) );
	$wp_customize->add_control( 'reddish_slider_options[post_checked]', array(
		'label'    => __( 'Choose what to display in the slider', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'settings' => 'reddish_slider_options[post_checked]',
		'type'     => 'radio',
		'choices'  => array(
			'1' => __( 'Display checked Posts and Pages', 'reddish' ),
			'2' => __( 'Do not display checked Posts and Pages', 'reddish' ),
			'3' => __( 'Display all Posts and Pages', 'reddish' ),
		),
	) );

	/* Add option for the display in the slider only those Posts and Pages that have featured image */
	$wp_customize->add_setting( 'reddish_slider_options[show_with_image]', array(
		'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( 'reddish_slider_options[show_with_image]', array(
		'settings' => 'reddish_slider_options[show_with_image]',
		'label'    => __( 'Display only Posts and Pages which have a featured image', 'reddish' ),
		'section'  => 'reddish_slider_settings',
		'type'     => 'checkbox',
	) );
}

/**
 * Sanitization: select
 * Control: select, radio
 *
 * Sanitization callback for 'select' and 'radio' type controls.
 * This callback sanitizes $input as a slug, and then validates
 * $input against the choices defined for the control.
 *
 * @uses  sanitize_key()      https://developer.wordpress.org/reference/functions/sanitize_key/
 * @uses  $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 *
 * @return string
 */
function reddish_sanitize_radio( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

add_action( 'after_setup_theme', 'reddish_setup' );
add_action( 'widgets_init', 'reddish_register_sidebars' );

add_action( 'wp_enqueue_scripts', 'reddish_scripts_styles' );
add_filter( 'wp_page_menu_args', 'reddish_home_page_menu_args' );
add_filter( 'excerpt_length', 'reddish_custom_excerpt_length', 999 );
add_filter( 'excerpt_more', 'reddish_custom_excerpt_more' );

add_action( 'add_meta_boxes', 'reddish_meta_box_add' );
add_action( 'edit_attachment', 'reddish_meta_box_save' ); // for saving meta data in attachment
add_action( 'save_post', 'reddish_meta_box_save' );
add_action( 'customize_register', 'reddish_customize_register' );
