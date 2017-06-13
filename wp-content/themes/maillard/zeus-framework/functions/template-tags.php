<?php
/**
 * Zeus Core - A WordPress theme development framework.
 *
 * @package zeus-framework
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param  array $classes Classes for the body element.
 * @return array
 */
function zeus_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'has-logo';
	}

	return $classes;
}
add_filter( 'body_class', 'zeus_body_classes' );

/**
 * Flush out the transients used in zeus_categorized_blog.
 */
function zeus_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'zeus_categories' );
}
add_action( 'edit_category', 'zeus_category_transient_flusher' );
add_action( 'save_post',     'zeus_category_transient_flusher' );
