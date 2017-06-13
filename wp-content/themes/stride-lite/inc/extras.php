<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package stride
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function stride_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'stride_body_classes' );

/**
 * Changes excerpt length on fly
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/**
 * Remove featured posts from main loop
 */
function stride_exclude_featured_posts( $query ){
    $id = get_term_by('name', 'featured', 'post_tag');
    if($id){
      if (!is_admin() && $query->is_home() && $query->is_main_query()) {
        $query->set('tag__not_in', array($id->term_id) );
      }
  }
}
add_action('pre_get_posts', 'stride_exclude_featured_posts');