<?php
/**
 * Functions used to build .site-header
 *
 * @package zeus-framework
 */

if ( ! function_exists( 'zeus_head' ) ) {
	/**
	 * Out put the website head.
	 */
	function zeus_head() {

		?>

		<!DOCTYPE html>
		<html <?php echo get_language_attributes(); ?>>
		<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php

		zeus_link_pingback();

		/**
		 * Fires before wp_head
		 */
		 do_action( 'zeus_head' );

		 wp_head();

		 ?>

		</head>

		<?php

	}
}

if ( ! function_exists( 'zeus_link_pingback' ) ) {
	/**
	 * Adds the pingback link to the header.
	 */
	function zeus_link_pingback() {
		if ( 'open' === get_option( 'default_ping_status' ) )
			printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

if ( ! function_exists( 'zeus_header' ) ) {
	/**
	 * Output the site title.
	 */
	function zeus_header() {

		echo apply_filters( 'zues_site_branding_open', '<div ' . zeus_get_attr( 'branding' ) . '>');

				do_action( 'zeus_site_branding' );


		echo apply_filters( 'zues_site_branding_close', '</div><!-- .site-branding -->');

	}
}

if ( ! function_exists( 'zeus_site_description' ) ) {
	/**
	 * Output the site description.
	 */
	function zeus_site_description() {
		echo '<p '. zeus_get_attr( 'site-description' ) . '>' . get_bloginfo( 'description' ) . '</p>';
	}
}

if ( ! function_exists( 'zeus_header_image' ) ) {
	/**
	 * Output the header image.
	 */
	function zeus_header_image() {

		echo '<a href="'. esc_url( home_url( '/' ) ) .'" rel="home">';
			echo '<img src="'.esc_url( get_header_image() ).'" width="'.esc_attr( get_custom_header()->width ) .'" height="'.  esc_attr( get_custom_header()->height ) .'" alt="">';
		echo '</a>';
	}
}


if ( ! function_exists( 'zeus_custom_logo' ) ) {
	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 */
	function zeus_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			echo '<div class="zeus-custom-logo">';
			the_custom_logo();
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'zeus_site_title' ) ) {
	/**
	 * Check whether a h1 or h2 site title should be shown for SEO purposes.
	 */
	function zeus_site_title() {

		$home_url = esc_url( home_url( '/' ) );
		$blog_name = get_bloginfo( 'name' );

		$link = sprintf( '<a href="%1$s">%2$s</a>', $home_url, $blog_name );

		if ( is_home() ) {
			echo '<h1 '. zeus_get_attr( 'site-title' ) . '>'. $link . '</h1>';
		} else {
			echo '<h2 '. zeus_get_attr( 'site-title' ) . '>'. $link . '</h2>';
		}

	}
}
