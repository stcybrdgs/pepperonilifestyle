<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Bezel
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bezel_header_style()
 * @uses bezel_admin_header_style()
 * @uses bezel_admin_header_image()
 */
function bezel_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bezel_custom_header_args', array(
		'default-text-color' => '3d3d3d',
		'width'              => 1920,
		'height'             => 195,
		'flex-height'        => true,
		'wp-head-callback'   => 'bezel_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'bezel_custom_header_setup' );

if ( ! function_exists( 'bezel_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see bezel_custom_header_setup().
 */
function bezel_header_style() {
?>

	<?php if ( get_header_image() ) : ?>
	<style type="text/css">
		.site-header {
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-position: top center;
			-webkit-background-size: cover;
			   -moz-background-size: cover;
			     -o-background-size: cover;
			        background-size: cover;
		}
	</style>
	<?php endif; ?>

	<?php
	// Header Text Color
	$header_text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $header_text_color === get_theme_support( 'custom-header', 'default-text-color' ) ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-title a:visited {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		.site-title a:hover,
		.site-title a:focus,
		.site-title a:active {
			opacity: 0.7;
		}
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
			opacity: 0.7;
		}
	<?php endif; ?>
	</style>

<?php
}
endif; // bezel_header_style
