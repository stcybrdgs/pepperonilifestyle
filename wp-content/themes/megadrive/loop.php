<?php
if(have_posts()) {

	while(have_posts()) : the_post();
	get_template_part('content');
	endwhile;

	megadrive_pagination();

} else {
	if (is_search()) {
			echo __('Sorry, but nothing matched your search criteria.','megadrive');
	} elseif (is_front_page() ) {
		echo __('Looks like there are no posts.','megadrive');
	} elseif (is_author()) {
		echo __('Looks like this author has no posts yet.','megadrive');
	} elseif (is_tag() || is_category()) {
		echo __('Looks like there are no posts yet.','megadrive');
	} else {
		echo __('Looks like there are no posts.','megadrive');
	}
}
?>