<?php get_header(); ?>

<main>
	<div id="main">
	
		<!-- flexslider slider -->
				<?php
				// Check if this is the front page and that it is not page 2 or higher
				if ( is_front_page() && !is_paged() ) {
					// Add featured content slider
					get_template_part( 'flexslider' );
				}
				?>
		<!-- END OF - flexslider slider -->

		<?php		
			get_template_part('loop');
		?>

	</div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>