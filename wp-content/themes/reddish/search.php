<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header(); ?>
	<div id="content">
		<?php if ( have_posts() ) :
			/* Start the Loop */ ?>
			<h1 class="larger_title">
				<?php printf( __( 'Search Results for: %s', 'reddish' ), get_search_query() ); ?>
			</h1>
			<?php /* Start the Loop */
			$reddish_post_count = 0;
			while ( have_posts() ) : the_post();
				$reddish_post_count ++;
				get_template_part( 'content', get_post_format() );
			endwhile;
			reddish_paginate_function();
		else : /* have post */
			get_template_part( 'no-results', 'search' );
		endif; /* have_posts() */ ?>
	</div><!--content-->
<?php get_sidebar();
get_footer();
