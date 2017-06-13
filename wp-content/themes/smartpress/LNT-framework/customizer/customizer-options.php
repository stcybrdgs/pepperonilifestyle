<?php
/**
 * Customizer Library
 *
 * @package        Customizer_Library
 * @author         Devin Price, The Theme Foundry
 * @license        GPL-2.0+
 * @version        1.3.0
 */

/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_smartpress_options() {

	// Theme defaults
	$primary_color = '#5bc08c';
	$secondary_color = '#666';
	
	//$icons = smartpress_fontawesome_icons_list();

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors & Typography', 'smartpress' ),
		'priority' => '40'
	);
	
	$font_choices = customizer_library_get_font_choices();

	$options['smartpress_main_font'] = array(
		'id' => 'smartpress_main_font',
		'label'   => __( 'Primary Font', 'smartpress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Sans-serif'
	);

	$options['smartpress_headers_font'] = array(
		'id' => 'smartpress_headers_font',
		'label'   => __( 'Header Font', 'smartpress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Sans-serif'
	);
	
	
	$options['smartpress_body_text_color'] = array(
		'id' => 'smartpress_body_text_color',
		'label'   => __( 'Body Text Color', 'smartpress' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#666666',
	);
	
	$options['smartpress_a_color'] = array(
		'id' => 'smartpress_a_color',
		'label'   => __( 'Links Color', 'smartpress' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#337ab7',
	);
	
	$options['smartpress_a_hover_color'] = array(
		'id' => 'smartpress_a_hover_color',
		'label'   => __( 'Links Hover and Focus Color', 'smartpress' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#23527c',
	);
	
	$section = 'general';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'General Settings', 'smartpress' ),
		'priority' => '25'
	);
	
	$options['smartpress_show_description'] = array(
		'id' => 'smartpress_show_description',
		'label'   => __( 'Show site description in the navbar', 'smartpress' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);
	
	$blg = array(
	'excerpt' => 'Excerpt',
	'full-content' => 'Full Content',
	);
	
	$options['smartpress_front_content_excerpt_content'] = array(
		'id' => 'smartpress_front_content_excerpt_content',
		'label'   => __( 'Home Blog Entries', 'smartpress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $blg,
	);
	
	$mn = array(
	'no' => 'No',
	'yes' => 'Yes',
	);
	
	$options['smartpress_lightbox_on_blog_posts'] = array(
		'id' => 'smartpress_lightbox_on_blog_posts',
		'label'   => __( 'Show Lightbox on Blog Posts', 'smartpress' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $mn,
	);
	
	// Social Links 
	$section = 'socialsections';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Social Links', 'smartpress' ),
		'priority' => '30'
	);
	
	$options['smartpress_social_youtube'] = array(
		'id' => 'smartpress_social_youtube',
		'label'   => __( 'Youtube URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_facebook'] = array(
		'id' => 'smartpress_social_facebook',
		'label'   => __( 'Facebook URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['smartpress_social_twitter'] = array(
		'id' => 'smartpress_social_twitter',
		'label'   => __( 'Twitter URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_gplus'] = array(
		'id' => 'smartpress_social_gplus',
		'label'   => __( 'Google Plus URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	$options['smartpress_social_pinterest'] = array(
		'id' => 'smartpress_social_pinterest',
		'label'   => __( 'Pinterest URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_Smartpress'] = array(
		'id' => 'smartpress_social_Smartpress',
		'label'   => __( 'Instagram URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_dribble'] = array(
		'id' => 'smartpress_social_dribble',
		'label'   => __( 'Dribble URL', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_flikr'] = array(
		'id' => 'smartpress_social_flikr',
		'label'   => __( 'Flikr', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_paypal'] = array(
		'id' => 'smartpress_social_paypal',
		'label'   => __( 'Paypal', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_delicious'] = array(
		'id' => 'smartpress_social_delicious',
		'label'   => __( 'Delicious', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_digg'] = array(
		'id' => 'smartpress_social_digg',
		'label'   => __( 'Digg', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_linkedin'] = array(
		'id' => 'smartpress_social_linkedin',
		'label'   => __( 'Linkedin', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_github'] = array(
		'id' => 'smartpress_social_github',
		'label'   => __( 'Github', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_reddit'] = array(
		'id' => 'smartpress_social_reddit',
		'label'   => __( 'Reddit', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_lastfm'] = array(
		'id' => 'smartpress_social_lastfm',
		'label'   => __( 'Last Fm', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_tumblr'] = array(
		'id' => 'smartpress_social_tumblr',
		'label'   => __( 'Tumblr', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_stumbleupon'] = array(
		'id' => 'smartpress_social_stumbleupon',
		'label'   => __( 'Stumbleupon', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_skype'] = array(
		'id' => 'smartpress_social_skype',
		'label'   => __( 'Skype', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	
		$options['smartpress_social_vimeo'] = array(
		'id' => 'smartpress_social_vimeo',
		'label'   => __( 'Vimeo', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_behance'] = array(
		'id' => 'smartpress_social_behance',
		'label'   => __( 'Behance', 'smartpress' ),
		'section' => $section,
		'type'    => 'url',
	);
	
	$options['smartpress_social_email'] = array(
		'id' => 'smartpress_social_email',
		'label'   => __( 'Email', 'smartpress' ),
		'section' => $section,
		'type'    => 'text',
	);

	
	
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_smartpress_options' );
