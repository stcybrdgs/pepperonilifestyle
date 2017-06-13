<?php
/**
 * Build the layout using the hooks.
 *
 * @package zeus-framework
 */

// Head hooks.
add_action( 'zeus_header', 'zeus_header', 10 );
add_action( 'zeus_site_branding', 'zeus_custom_logo', 5 );
add_action( 'zeus_site_branding', 'zeus_site_title', 10 );
add_action( 'zeus_site_branding', 'zeus_site_description', 20 );
add_action( 'zeus_header_after', 'zeus_nav', 10 );

// Sidebar Hooks.
add_action( 'zeus_nav', 'zeus_nav_inner' );

// Content hooks.
add_action( 'zeus_content_sidebar_wrapper', 'zeus_content_area', 10 );
add_action( 'zeus_content_sidebar_wrapper', 'zeus_sidebar', 20 );

add_action( 'zeus_content', 'zeus_loop', 10 );
add_action( 'zeus_content', 'zeus_content_paging_nav', 20 );

// Entry Header hooks.
add_action( 'zeus_entry_header', 'zeus_entry_title', 10 );
add_action( 'zeus_entry_header', 'zeus_entry_meta', 15 );

// Loop Hooks.
add_action( 'zeus_loop', 'zeus_featured_image', 5 );
add_action( 'zeus_loop', 'zeus_entry_header', 10 );
add_action( 'zeus_loop', 'zeus_content', 20 );
add_action( 'zeus_loop', 'zeus_entry_footer', 30 );
add_action( 'zeus_loop_after', 'zeus_comments', 10 );
add_action( 'zeus_loop_after', 'zeus_content_nav', 30 );

add_action( 'zeus_content', 'zeus_loop', 10 );
add_action( 'zeus_content', 'zeus_content_paging_nav', 20 );

// Archive Page Hooks.
add_action( 'zeus_content', 'zeus_archive_header', 5 );

// Search Page Hooks.
add_action( 'zeus_content', 'zeus_search_header', 5 );

// Sidebar Hooks.
add_action( 'zeus_sidebar', 'zeus_sidebar_inner' );

// Footer Hooks.
add_action( 'zeus_footer', 'zeus_footer', 10 );
add_action( 'zeus_footer_after', 'zeus_sub_footer', 10 );
add_action( 'zeus_sub_footer', 'zeus_footer_attribution', 15 );
add_action( 'zeus_sub_footer', 'zeus_footer_copyright', 20 );
add_action( 'zeus_body_close_before', 'zeus_wpfooter', 100 );
