<?php
/**
 * The template for displaying Archive pages.
 *
 */
get_header(); ?>
	<div id="content">
		<?php if ( have_posts() ) : ?>
			<h1 class="larger_title">
				<?php the_archive_title(); ?>
			</h1><!-- .larger_title -->
			<div class="category_description"><?php the_archive_description(); ?></div>
			<?php /* Start the Loop */
			$reddish_post_count = 0;
			while ( have_posts() ) : the_post();
				$reddish_post_count ++;
				get_template_part( 'content', get_post_format() );
			endwhile;
			reddish_paginate_function();
		else : /* .have posts */
			get_template_part( 'no-results', 'archive' );
		endif; /* .have posts */ ?>
	</div><!-- #content -->
<?php get_sidebar();
get_footer();
