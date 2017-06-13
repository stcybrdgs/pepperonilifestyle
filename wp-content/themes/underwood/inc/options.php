<?php
  

// #################################################
// Reg js spicifiv to the customizer
// #################################################

function underwood_customizer_styles() { ?>
	<style type="text/css">
        .button-underwood{background: #e92c6a!important; border-color:#e92c6a!important; -webkit-box-shadow: 0 1px 0 #e92c6a!important; box-shadow: 0 1px 0 #e92c6a!important; color: #fff!important; text-decoration: none!important; text-shadow: 0 -1px 1px #e92c6a,1px 0 1px #e92c6a,0 1px 1px #e92c6a,-1px 0 1px #e92c6a!important;width: 80%!important; margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .button-underwood-secondary{width: 80%!important;margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
	</style>
<?php }

add_action( 'customize_controls_print_styles', 'underwood_customizer_styles', 20 );


    
if( class_exists('Kirki') ) { 
	
	// #################################################
	// Kirki -- Config, Settings, Options
	// #################################################
	
	   
	Kirki::add_config( 'underwood', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	
	// Guide
	
	Kirki::add_section( 'setup', array(
	    'title'          => __( 'Theme Userguide', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	) );
	
	Kirki::add_field( 'underwood', array(
		'settings' => 'userguide-info',
		'label'    => __( 'Userguide', 'underwood'),
		'section'  => 'setup',
		'type'     => 'custom',
		'priority' => 1,
		'description'   => __( 'This theme was designed to be very easy to set up but just in case we\'ve created a Google Doc userguide to assist: ', 'underwood') . '<a href="https://docs.google.com/document/d/1kxn8Zf6gAZD_xjbqtaS63EPtw-mayJwXFHEf5PIBmTo/" target="_blank" class="button button-underwood-secondary">View User Guide</a>',
	) );
	
	

	
	// Blog
	
	Kirki::add_section( 'blog_settings', array(
	    'title'          => __( 'Blog/Archive Settings', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) ); 
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'radio',
		'settings'    => 'underwood_blog_layout',
		'label'       => __( 'Homepage/Blog/Archive Layout', 'underwood'),
		'section'     => 'blog_settings',
		'default'     => 'standard',
		'priority'    => 1,
		'choices'     => array(
			'standard'  => esc_attr__( 'Standard', 'underwood'),
			'grid'  => esc_attr__( 'Grid', 'underwood'),
			'gridfull'  => esc_attr__( 'Grid No Sidebar', 'underwood'),
		),
	) );
	

	
	
	// POST
	
	Kirki::add_section( 'post_settings', array(
	    'title'          => __( 'Posts', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) );     

	Kirki::add_field( 'underwood', array(
		'type'        => 'checkbox',
		'settings'    => 'post_hide_tags',
		'label'       => __( 'Hide The Tag Links', 'underwood'),
		'section'     => 'post_settings',
		'default'     => '0',
		'priority'       => 5,
	) );

	Kirki::add_field( 'underwood', array(
		'type'        => 'checkbox',
		'settings'    => 'post_hide_related',
		'label'       => __( 'Hide The Related Posts Section', 'underwood'),
		'section'     => 'post_settings',
		'default'     => '0',
		'priority'       => 5,
	) );

	Kirki::add_field( 'underwood', array(
		'type'        => 'radio',
		'settings'    => 'sandbox_style',
		'label'       => __( 'Apply Theme Style to Simple Author Box Plugin', 'underwood'),
		'section'     => 'post_settings',
		'default'     => '2',
		'priority'    => 1,
		'choices'     => array(
			'1'   => esc_attr__( 'Apply', 'underwood'),
			'2'  => esc_attr__( 'Do Not Apply', 'underwood'),
		),
	) );
	
	
	
	// Typography
	
	Kirki::add_section( 'typography', array(
	    'title'          => esc_html__( 'Typography', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) );
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'typography',
		'settings'    => 'primary_font',
		'label'       => esc_html__( 'Primary Font', 'underwood' ),
		'section'     => 'typography',
		'default'     => array(
			'font-family'    => 'Source Sans Pro',
			'variant'        => '200',
		),
		'priority'    => 5,
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	) );
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'typography',
		'settings'    => 'title_font',
		'label'       => esc_html__( 'Title Font', 'underwood' ),
		'section'     => 'typography',
		'default'     => array(
			'font-family'    => 'Source Sans Pro',
		),
		'priority'    => 5,
		'output'      => array(
			array(
				'element' => 'blockquote,.banner-wrap h2,.banner-wrap h2 a,.blog-title a,.singular-related h4,.comments-title,#reply-title,.content-column-title,.sidebar .sidebar_widget > span.widget_title,.sidebar .sidebar_widget .featured_posts h4,.instagram-title,#footer-row h4,.singular-entry h1,.singular-entry h2, .singular-entry h3, .singular-entry h4, .singular-entry h5, .singular-entry h6',
			),
		),
	) );
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'typography',
		'settings'    => 'menu_font',
		'label'       => esc_html__( 'Menu Font', 'underwood' ),
		'section'     => 'typography',
		'default'     => array(
			'font-family'    => 'Source Sans Pro',
		),
		'priority'    => 5,
		'output'      => array(
			array(
				'element' => '.navbar ul.nav li a,input[type="button"],input[type="submit"],.more_tag span,button,.about_widget_link,.blog-next-prev a,.sidebar .sidebar_widget > span.widget_title,.comment-author,.comment-author a,.comment-date,#copyright-row p,#copyright-row a',
			),
		),
	) );
	
		
	
	
	
	
	
	// Color: Typography
	
	Kirki::add_section( 'color_typography', array(
	    'title'          => esc_html__( 'Color: Typography', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) );
	  
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'primary_color',
		'label'       => esc_html__( 'Primary Font Color', 'underwood' ),
		'section'     => 'color_typography',
		'default'     => '#3a3a3a',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
				'element' => 'body,a,a:visited,a:hover,.blog-meta .auth a,.singular-entry .blog-title a,.singular-entry .blog-title a:hover, .blog-title a, .blog-title a:hover,.blog-cat,.blog-cat a,.sidebar .sidebar_widget > span.widget_title,.singular-entry span.social-icons a, .comment-body .comment-author .url, .comment-body .comment-reply-link, .singular-entry .tags-wrap a, .more_tag span a, .tag-sep,button#searchsubmit,button#searchsubmit:hover',
				'property' => 'color',
			),
			array(
				'element' => '.more_tag span:hover',
				'property' => 'background',
			),
		),
	) );
	
Kirki::add_field( 'underwood', array(
	'type'        => 'color',
	'settings'    => 'link_color',
	'label'       => esc_html__( 'Link Color', 'underwood' ),
	'section'     => 'color_typography',
	'default'     => '#1a95ff',
	'priority'    => 5,
	'alpha'       => false,
	'output'      => array(
		array(
			'element' => '.singular-entry a,.comment-body a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'underwood', array(
	'type'        => 'color',
	'settings'    => 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'underwood' ),
	'section'     => 'color_typography',
	'default'     => '#3a3a3a',
	'priority'    => 5,
	'alpha'       => false,
	'output'      => array(
		array(
			'element' => '.singular-entry a:hover,.comment-body a:hover',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'underwood', array(
	'type'        => 'color',
	'settings'    => 'blockquote_color',
	'label'       => esc_html__( 'Blockquote Color', 'underwood' ),
	'section'     => 'color_typography',
	'default'     => '#3a3a3a',
	'priority'    => 5,
	'alpha'       => false,
	'output'      => array(
		array(
			'element' => 'blockquote',
			'property' => 'color',
		),
	),
) );
	  
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'blog_title_color',
		'label'       => esc_html__( 'Blog Title Font Color', 'underwood' ),
		'section'     => 'color_typography',
		'default'     => '#3a3a3a',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
				'element' => '.singular-entry .blog-title a,.singular-entry .blog-title a:hover, .blog-title a, .blog-title a:hover',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'menu_font_color',
		'label'       => esc_html__( 'Menu Font Color', 'underwood' ),
		'section'     => 'color_typography',
		'default'     => '#ffffff',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => 'a.dropdown-toggle:after, .navbar-default .navbar-nav>li>a, .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover,.navbar-default .navbar-nav>li>a,.navbar-default .navbar-nav>li>a:hover',
			'property' => 'color',
			),
		),
	) );
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'menu_font_hover_color',
		'label'       => esc_html__( 'Menu Font Hover Color', 'underwood' ),
		'section'     => 'color_typography',
		'default'     => '#ffffff',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => '.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover,.navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover',
			'property' => 'color',
			),
		),
	) );	
	

	// Color: Backgrounds
	
	Kirki::add_section( 'color_backgrounds', array(
	    'title'          => esc_html__( 'Color: Backgrounds', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) );

	Kirki::add_field( 'underwood', array(
		'type'        => 'custom',
		'settings'    => 'body_background',
		'label'       => esc_html__( 'Body Background Color or Image', 'underwood' ),
		'section'     => 'color_backgrounds',
		'default'     => '<div class="underwood_customizer_note">' . esc_html__( 'Please use the WordPress core background settings availible via the Color section on this customizer or via the Background Image section.', 'underwood' ) . '</div>',
		'priority'    => 5,
	) );

	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'panel_bg_color',
		'label'       => esc_html__( 'Content Panel Background Color', 'underwood' ),
		'section'     => 'color_backgrounds',
		'default'     => '#ffffff',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => '.blog-item, .singular-entry, .saboxplugin-wrap, .singular-related, .comments-area,.sidebar .sidebar_widget,.singular-entry th',
			'property' => 'background-color',
			),
		),
	) );
	

	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'menu_bg_color',
		'label'       => esc_html__( 'Menu Background Color', 'underwood' ),
		'section'     => 'color_backgrounds',
		'default'     => '#333333',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => '#mainmenu-row',
			'property' => 'background-color',
			),
		),
	) );
 
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'footer_bg_color',
		'label'       => esc_html__( 'Footer Background Color', 'underwood' ),
		'section'     => 'color_backgrounds',
		'default'     => '#333333',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => '#copyright-row, #footer-row, .instagram-pics li',
			'property' => 'background-color',
			),
		),
	) );
	
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'banner_content_bg_color',
		'label'       => esc_html__( 'Banner Background Color', 'underwood' ),
		'section'     => 'color_backgrounds',
		'default'     => 'rgba(255,255,255,.8)',
		'priority'    => 5,
		'choices'     => array(
			'alpha' => true,
		),
		'output'      => array(
			array(
			'element' => '.slick-slide .banner-meta>div',
			'property' => 'background-color',
			),
		),
	) );
	

	
	// Color: Borders
	
	Kirki::add_section( 'color_borders', array(
	    'title'          => esc_html__( 'Color: Borders', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 1,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '', 
	) );
	
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'primary_border_color',
		'label'       => esc_html__( 'Primary Border Color', 'underwood' ),
		'section'     => 'color_borders',
		'default'     => '#b1b1b1',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => 'input[type="button"],input[type="submit"],.more_tag span,button,.about_widget_link,.tags-wrap,.comment-wrap,textarea, input,.comment-img .avatar',
			'property' => 'border-color',
			),
		),
	) );
	
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'blockquote_border_color',
		'label'       => esc_html__( 'Blockquote Border Color', 'underwood' ),
		'section'     => 'color_borders',
		'default'     => '#b1b1b1',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => 'blockquote',
			'property' => 'border-color',
			),
		),
	) );
	
	Kirki::add_field( 'underwood', array(
		'type'        => 'color',
		'settings'    => 'menu_border_color',
		'label'       => esc_html__( 'Menu Border Color', 'underwood' ),
		'section'     => 'color_borders',
		'default'     => '#b1b1b1',
		'priority'    => 5,
		'alpha'       => false,
		'output'      => array(
			array(
			'element' => '#mainmenu-row,.navbar ul.nav li ul li,.dropdown-menu',
			'property' => 'border-color',
			),
		),
	) );
	

	

	
	
	      
	
	// FOOTER SETTINGS
	
	Kirki::add_section( 'footer_settings', array(
	    'title'          => __( 'Footer Settings', 'underwood'),
	    'description'    => '',
	    'panel'          => '', 
	    'priority'       => 10,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	) );
	  
	Kirki::add_field( 'underwood', array(
		'settings' => 'underwood_copyright',
		'label'    => __('Copyright Text', 'underwood'),
		'section'  => 'footer_settings',
		'type'     => 'text',
		'priority' => 10,
		'default'  => '',
	) );   

	


}





// #################################################
// Some Custom Sanitize Functions
// #################################################

function underwood_sanitize_url( $value ) {

    $value=esc_url_raw( $value );

    return $value;

}

function underwood_sanitize_email( $value ) {

    $value=sanitize_email( $value );

    return $value;

}