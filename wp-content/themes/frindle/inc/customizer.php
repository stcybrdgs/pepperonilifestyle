<?php

// Customize Appearance Options
function frindle_customize_register( $wp_customize ) {


	$defaultlink_color = '0078d7';
					$wp_customize->add_setting( 't-color', array(
        'default'    => $defaultlink_color,
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 't-color', array(
        'label'      => __( 'Site name color (Default color is primary theme color)','frindle' ),
        'section'    => 'title_tagline',
    ) ) );


    $wp_customize->add_setting( 'frindle_logo_width', array(
			'default'           => '110',
			'transport'			=> 'refresh',
			'sanitize_callback' => 'frindle_sanitize_number',
	) );

	$wp_customize->add_control( 'frindle_logo_width', array(
			'label'   => __( 'Logo Width', 'frindle' ),
			'section' => 'title_tagline',
			'type'    => 'number',

	 ) );




	//Customize Theme Color Sections

	 $wp_customize->add_panel('main_color_option', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Customize theme colors', 'frindle'),
        'description' => __('Panel to update sparkling theme options', 'frindle'), 
        'priority' => 60
    ));

	 		//panel 1 for general colors
			$wp_customize->add_section('standard_colors', array(
				'title' 	=> __('General theme colors', 'frindle'),
				'priority' 	=> 10,
				'panel' => 'main_color_option'
			));

	
					//All link colors
					$defaultlink_color = '0078d7';
					$wp_customize->add_setting('link_color', array(
						'default' 	=> $defaultlink_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_control', array(
						'label' 	=> __('Link Color (Primary theme color)', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'link_color',
					) ) );
					


					//Header Background Color
					$defaultheader_bg__color = '#99baff';
					$wp_customize->add_setting('header_bg__color', array(
						'default' 	=> $defaultheader_bg__color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg__color', array(
						'label' 	=> __('Header Background Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'header_bg__color',
					) ) );

					
					
					//Footer Widget Background Color
					$defaultfooter_widget_bg_color = '#b8d6a4';
					$wp_customize->add_setting('footer_widget_bg_color', array(
						'default' 	=> $defaultfooter_widget_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_bg_color', array(
						'label' 	=> __('Footer Widget Background Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'footer_widget_bg_color',
					) ) );
					
					
					
					//The Button Color
					$defaultbutton_color = '#006ec3';
					$wp_customize->add_setting('button_color', array(
						'default' 	=> $defaultbutton_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_color_control', array(
						'label' 	=> __('Button Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'button_color',
					) ) );



					//The Button Hover Color
					$defaulthover_button_color = '#004C87';
					$wp_customize->add_setting('hover_button_color', array(
						'default' 	=> $defaulthover_button_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_hover_color_control', array(
						'label' 	=> __('Button Hover Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'hover_button_color',
					)));

					
				
	
					
					
					//Footer Copyright Content Cackground Color
					$defaultfooter_copy_bg_color = '#000000';
					$wp_customize->add_setting('footer_copy_bg_color', array(
						'default' 	=> $defaultfooter_copy_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copy_bg_color', array(
						'label' 	=> __('Footer Copy Contet Backgroud Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'footer_copy_bg_color',
					) ) );
					
					
					
					//Footer Widget Text Color
					$defaultfooter_text_color = '#ffffff';
					$wp_customize->add_setting('footer_text_color', array(
						'default' 	=> $defaultfooter_text_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
						'label' 	=> __('Footer Widget Text Color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'footer_text_color',
					) ) );

					
					//Comment background color
					$defaultcomment_bg_color = '#f1f1f1';
					$wp_customize->add_setting('comment_bg_color', array(
						'default' 	=> $defaultcomment_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));
					
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_bg_color', array(
						'label' 	=> __('Comment Block Background color', 'frindle'),
						'section' 	=> 'standard_colors',
						'settings' 	=> 'comment_bg_color',
					) ) );
	
	
	
			//panel 2 for post background colors block
			$wp_customize->add_section('post_color', array(
				'title' 	=> __('Post block color', 'frindle'),
				'priority' 	=> 20,
				'panel' => 'main_color_option'
			));
					//audio
					$defaultaudio_bg_color = '#c7efc4';
					$wp_customize->add_setting('audio_color', array(
						'default' 	=> $defaultaudio_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'audio_color', array(
							'label' 	=> __('Audio Post background color', 'frindle'),
							'section' 	=> 'post_color',
							'settings' 	=> 'audio_color',
						) ) );


					//link
					$defaultlink_bg_color = '#E0EBFF';
					$wp_customize->add_setting('post_link_color', array(
						'default' 	=> $defaultlink_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_link_color', array(
							'label' 	=> __('Link Post background color', 'frindle'),
							'section' 	=> 'post_color',
							'settings' 	=> 'post_link_color',
					) ) );


					//gallery
					$defaultgallery_bg_color = '#ffebcd';
					$wp_customize->add_setting('gallery_bg_color', array(
						'default' 	=> $defaultgallery_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gallery_bg_color', array(
							'label' 	=> __('Gallery Post background color', 'frindle'),
							'section' 	=> 'post_color',
							'settings' 	=> 'gallery_bg_color',
					) ) );

					//aside
					$defaultaside_bg_color = '#b8d6a4';
					$wp_customize->add_setting('aside_bg_color', array(
						'default' 	=> $defaultaside_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aside_bg_color', array(
							'label' 	=> __('Aside Post background color', 'frindle'),
							'section' 	=> 'post_color',
							'settings' 	=> 'aside_bg_color',
					) ) );


					//status
					$defaultstatus_bg_color = '#88b9b5';
					$wp_customize->add_setting('status_bg_color', array(
						'default' 	=> $defaultstatus_bg_color,
						'transport' => 'refresh',
						'sanitize_callback' => 'sanitize_hex_color',
					));

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'status_bg_color', array(
							'label' 	=> __('Status Post background color', 'frindle'),
							'section' 	=> 'post_color',
							'settings' 	=> 'status_bg_color',
					) ) );


					

	//Register New Section "Other Features= Frindle Features"
	$wp_customize->add_section('other_features', array(
		'title' 	=> __('Frindle Theme Features', 'frindle'),
		'priority' 	=> 40,
	));
	
					$wp_customize->add_control( 'frindle_fetch_category', array(
			            'label'   => __('Featued Post blog on blog page','frindle'),
			            'section' => 'other_features',
			            'priority' => 1,
			        ) );	
						

					// Featured section
			        $wp_customize->add_setting( 'frindle_config_featured', array(
			            'default'        => '0',
			            'transport'			=> 'refresh',
						'sanitize_callback' => 'frindle_sanitize_checkbox',
			        ) );

			        $wp_customize->add_control( 'frindle_config_featured', array(
			            'label'   => __( 'Display featured Post section on homepage?', 'frindle' ),
			            'section' => 'other_features',
			            'type'    => 'checkbox',
			            'priority' => 3
			        ) );

			      

					//category check 
					$wp_customize->add_setting( 'frindle_fetch', array(
			            'default'        => '0',
			            'transport'			=> 'refresh',
			            'sanitize_callback' => 'frindle_sanitize_checkbox',
			            
			        ) );

					
			        $wp_customize->add_control( 'frindle_fetch', array(
			            'label'   => __('Choose from category','frindle'),
			            'section' => 'other_features',
			            'type'    => 'checkbox',
			            'priority' => 4
			        ) );



		       		// Featured article categories
			        $wp_customize->add_setting( 'frindle_fetch_category', array(
			            'default'        => '0',
			            'transport'			=> 'refresh',
			            'sanitize_callback' => 'frindle_sanitize_checkbox',
			            
			        ) );

					$categories = get_categories();
					$output = array();
			 
					foreach ( $categories as $category ) { $output[] =  $category->name; }

			        $wp_customize->add_control( 'frindle_fetch_category', array(
			            'label'   => __('Choose featured post category','frindle'),
			            'section' => 'other_features',
			            'type'    => 'select',
			            'choices' => $output,
			            'priority' => 5
			        ) );


			        //choose from recent
			        $wp_customize->add_setting( 'recent_post_featured', array(
			            'default'        => '1',
			            'transport'			=> 'refresh',
			            'sanitize_callback' => 'frindle_sanitize_checkbox',
			            
			        ) );

					
			        $wp_customize->add_control( 'recent_post_featured', array(
			            'label'   => __( 'Or display recent post?', 'frindle' ),
			            'section' => 'other_features',
			            'type'    => 'checkbox',
			            'priority' => 6,
			            'description' => __( 'Post from featured category or recet post only display posts if it have featured image.', 'frindle' ),
			        ) );




			        //Seach boxin Header Nav menu controller
					$wp_customize->add_setting( 'homepage_sidebar', array(
							'default'           => 0,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
						
						$wp_customize->add_control( 'homepage_sidebar', array(
							'label'     => __( 'Hide sidebar on blogpage?', 'frindle' ),
							'section'   => 'other_features',
							'type'      => 'checkbox',
							'settings' 	=> 'homepage_sidebar',
					) );



					//custome post type
					$wp_customize->add_setting( 'custom_post', array(
							'default'           => 0,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
						
						$wp_customize->add_control( 'custom_post', array(
							'label'     => __( 'Enable custome post block color', 'frindle' ),
							'section'   => 'other_features',
							'type'      => 'checkbox',
							'settings' 	=> 'custom_post',
					) );


						//Seach boxin Header Nav menu controller
					$wp_customize->add_setting( 'header_menu_search', array(
							'default'           => 0,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
						
						$wp_customize->add_control( 'header_menu_search', array(
							'label'     => esc_html__( 'Enable Search box in header menu?', 'frindle' ),
							'section'   => 'other_features',
							'type'      => 'checkbox',
							'settings' 	=> 'header_menu_search',
					) );


// New Forked Section
		$wp_customize->add_section('frindle_general_features', array(
				'title' 	=> __('General Features', 'frindle'),
				'priority' 	=> 50,
		));


		//Scroll To Top Controller
					$wp_customize->add_setting( 'scroll_top', array(
							'default'           => 1,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'scroll_top', array(
							'label'     => esc_html__( 'Show Scroll to Top button?', 'frindle' ),
							'section'   => 'frindle_general_features',
							'type'      => 'checkbox',
							'settings' 	=> 'scroll_top',
					) );
		

		//Footer Credit data Controller
					$wp_customize->add_setting( 'footer_copy', array(
							'default'           => 0,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'footer_copy', array(
							'label'     => esc_html__( 'Hide footer credit?', 'frindle' ),
							'section'   => 'frindle_general_features',
							'type'      => 'checkbox',
							'settings' 	=> 'footer_copy',
					) );		

		//Quick Notification Enable
					
					$wp_customize->add_setting( 'quick_notify', array(
							'default'           => 0,
							'transport'			=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'quick_notify', array(
							'label'     => __( 'Display Quick Notification? 
								Right below header menu', 'frindle' ),
							'section'   => 'frindle_general_features',
							'type'      => 'checkbox',
							'settings' 	=> 'quick_notify',
							'priority'      => 22
					) );
					
		// Text box for quick notification

				    $wp_customize->add_setting('main_notification', array(
				            'sanitize_callback' => 'frindle_sanitize_html',
				            'transport'         => 'refresh'
				    ) );
				    $wp_customize->add_control('main_notification', array(
				            'description'   => __( 'Add quick notification here. HTML tags allowed.', 'frindle'),
				            'section'       => 'frindle_general_features',
				            'priority'      => 26,
				            'type'          => 'textarea'
				    ) );





		// Register Single Post Features Section
		$wp_customize->add_section('single_post_features', array(
				'title' 	=> __('Single Post Features', 'frindle'),
				'priority'	=> 60,
		));


					//Enable featured post on post page
					$wp_customize->add_setting( 'featured_single', array(
							'default'           => 1,
							'transport'			=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'featured_single', array(
							'label'     => esc_html__( 'Enable featured post on post page?', 'frindle' ),
							'section'   => 'single_post_features',
							'type'      => 'checkbox',
							'settings' 	=> 'featured_single',
					) );


	
					//Enable Related Post Featrures
					$wp_customize->add_setting( 'related_post', array(
							'default'           => 1,
							'transport'			=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'related_post', array(
							'label'     => esc_html__( 'Show Related Posts?', 'frindle' ),
							'section'   => 'single_post_features',
							'type'      => 'checkbox',
							'settings' 	=> 'related_post',
					) );
					
	
				//Enable Author Infobox on Single Post
					$wp_customize->add_setting( 'author_info', array(
							'default'      	    => 1,
							'transport' 		=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
	
					$wp_customize->add_control( 'author_info', array(
							'label'     => esc_html__( 'Display Author Infobox?', 'frindle' ),
							'section'   => 'single_post_features',
                            'type'      => 'checkbox',
							'settings'  => 'author_info',
					) );
					
					
					
					//Enable post Navigation menu
					$wp_customize->add_setting( 'nav_post', array(
							'default'           => 1,
							'transport'			=> 'refresh',
							'sanitize_callback' => 'frindle_sanitize_checkbox',
					) );
					
					$wp_customize->add_control( 'nav_post', array(
							'label'     => esc_html__( 'Display Post Navigation Menu?', 'frindle' ),
							'section'   => 'single_post_features',
							'type'      => 'checkbox',
							'settings' 	=> 'nav_post',
					) );
	
}

add_action('customize_register', 'frindle_customize_register');






//Upadted output of new color in Customize CSS
function frindle_customize_css() {	?>
	<style type="text/css">


	.site-title h2 a{
		color: <?php echo esc_attr( get_theme_mod('t-color') ); ?>;
	}

		a:link,
		a:visited,
		.quote-author,
		blockquote :before, 
		h2.widget-title{
			color: <?php echo esc_attr( get_theme_mod('link_color')); ?>;
		}
		
	
		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited,
		.scroll-to-top:hover,
		#wp-calendar caption, .widget_calendar caption {
			background-color: <?php echo esc_attr( get_theme_mod('link_color') ); ?>;
			
		}
		.site-nav, .menu-trigger, .site-nav ul ul a {
			background-color : <?php echo esc_attr( get_theme_mod('link_color')); ?>;
		}
		.site-header {
			background-color : <?php echo esc_attr(get_theme_mod('header_bg__color')); ?>;
		}
		
		.footer-widgets {
				background-color: <?php echo esc_attr(get_theme_mod('footer_widget_bg_color')); ?>;
		}
		div.header-search #searchsubmit, #submit,#searchsubmit, .comment-reply-link, .pushbutton-wide, .more-link {
			background-color: <?php echo esc_attr( get_theme_mod('button_color')); ?>;
		}
		div.header-search #searchsubmit:hover, #submit:hover, #searchsubmit:hover, .comment-reply-link:hover, .pushbutton-wide:hover, .more-link:hover{
			background-color: <?php echo esc_attr( get_theme_mod('hover_button_color')); ?>;
		}
		
		.site-footer nav {
			background-color : <?php echo esc_attr(get_theme_mod('footer_nav_menu_color')); ?>;
		}
		
		.copycon {
			background-color : <?php echo esc_attr( get_theme_mod('footer_copy_bg_color')); ?>;
		}
		
		.footer-widgets, .footer-widget a {
			color:  <?php echo esc_attr( get_theme_mod('footer_text_color')); ?>;
		}
		
		.comment .comment-body {
			background-color: <?php echo esc_attr( get_theme_mod('comment_bg_color')); ?>;
		}

		.post-audio {
			background-color: <?php echo esc_attr( get_theme_mod('audio_color')); ?>;
		}

		article.post-link {
			background-color: <?php echo esc_attr( get_theme_mod('post_link_color')); ?>;
		}

		article.post-gallery {
			background-color: <?php echo esc_attr( get_theme_mod('gallery_bg_color') ); ?>!important;
		}

		article.post-status {
			background-color: <?php echo esc_attr( get_theme_mod('status_bg_color')); ?>;
		}

		article.post-aside {
			background-color: <?php echo esc_attr( get_theme_mod('aside_bg_color') ); ?>;
		} 

		
	</style>

	
	<?php

	$logo_Width = get_theme_mod( 'frindle_logo_width' );
	$styles = '<style type="text/css">'."\n";

	$styles .= '.logo img { max-width: '.esc_attr($logo_Width).'px!important; width:'.$logo_Width.'px; }'."\n";
	 $styles .= '</style>'."\n";
      // end output

      echo $styles;

	  if(get_theme_mod( 'homepage_sidebar' ) == 1) :
	  			$sidebar = '<style type="text/css">'."\n";
				$sidebar .= '.main-container {width:100%!important;}'."\n";
				$sidebar .= '.main-featured-wrap article, .main-featured-wrap article .thumb, .thumb img {height:275px;}'."\n";
				$sidebar .= '@media(max-width:500px){.main-featured-wrap article, .main-featured-wrap article .thumb, .thumb img {height:200px;}}'."\n";
				$sidebar .= '</style>'."\n";
				echo $sidebar;

	endif;
	
}

add_action('wp_head', 'frindle_customize_css');




//The all Checkbox controller
function frindle_sanitize_checkbox( $input ) {
    // Boolean check
    return ( ( isset( $input ) && true == $input ) ? true : false );
}


function frindle_sanitize_number( $value) {
      if ( ! $value || is_null($value) )
        return $value;
      $value = esc_attr( $value); // clean input
      $value = (int) $value; // Force the value into integer type.
        return ( 0 < $value ) ? $value : null;
    }



function frindle_the_featured_section(){
	$output = array();
	$categories = get_categories();
	foreach ( $categories as $category ) { $output[] =  $category->name; }
	
	// WP_Query arguments
	$args = array(
		'category_name'          => $output[get_theme_mod( "frindle_fetch_category")],
		'posts_per_page'			 => 5,
		'meta_query' => array(
				array( 'key' => '_thumbnail_id'),
		)
	);

	// The Query
	$query = new WP_Query( $args );

	echo "<div class='main-featured-wrap'>";

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); ?>
			<div class="new-featured">
			<article>  
				<?php 
					$perma = esc_url(get_permalink());
					$title = get_the_title();
					$author = get_the_author();
					$authorURL = get_author_posts_url( get_the_author_meta( 'ID' ));
				?>

				<a title="<?php echo $title; ?>" href="<?php echo $perma; ?>">
					<div class="layer">
					<div class="thumb">
					<?php the_post_thumbnail('frindle-featured-block'); ?>
						
					</div>
					<div class="meta">
						<h2><?php echo $title; ?></h2>
						<p class="info"><?php esc_html__('by','frindle'); ?> <?php echo $author; ?>, <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> <?php esc_html__('ago','frindle'); ?></p>
					</div>
					</div>
				</a>
			</article>
			</div>
		<?php }
	} else {
		// no posts found
	}

	// Restore original Post Data
	wp_reset_postdata();

	echo "</div>";
}

function recent_featured() { 


		$args_recent = array(
		'posts_per_page'			 => 5,
		'meta_query' => array(
				array( 'key' => '_thumbnail_id'),
		)
	);
		?>





		<?php $the_query = new WP_Query( $args_recent ); ?>
		<div class='main-featured-wrap'>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


		<div class="new-featured">
			<article>  
				

				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
					<div class="layer">
					<div class="thumb">
					<?php the_post_thumbnail('frindle-featured-block'); ?>
						
					</div>
					<div class="meta">
						<h2><?php the_title(); ?></h2>
						<p class="info"><?php esc_html__('by','frindle'); ?> <?php the_author(); ?>, <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ); ?> <?php esc_html__('ago','frindle'); ?></p>
					</div>
					</div>
				</a>
			</article>
			</div>
		



		<?php 
			endwhile;
			wp_reset_postdata();
			echo "</div>";
} 

// HTML
if ( ! function_exists( 'frindle_sanitize_html' ) ) {
	function frindle_sanitize_html( $input ) {
		$input = force_balance_tags( $input );

		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);
		$output       = wp_kses( $input, $allowed_html );

		return $output;
	}
}