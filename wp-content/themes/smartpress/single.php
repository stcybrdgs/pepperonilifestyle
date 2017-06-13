<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Smartpress
 */

get_header(); ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( VIEWSURI.'single-entry', get_post_format() );
			
			?>
			<div class="clearfix"></div>
			<section class="postComments">
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			</section>
			<?php
		endwhile; // End of the loop.
		?>

<?php
get_footer();
