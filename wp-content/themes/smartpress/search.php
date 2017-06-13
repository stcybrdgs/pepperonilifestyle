<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Smartpress
 */

get_header(); ?>

	
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'smartpress' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( VIEWSURI.'entry', get_post_format() );

			endwhile;

			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'smartpress' ),
				'next_text'          => __( 'Next page', 'smartpress' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'smartpress' ) . ' </span>',
			) );

		else :

			get_template_part( VIEWSURI.'entry', 'none');

		endif; ?>

<?php
get_footer();
