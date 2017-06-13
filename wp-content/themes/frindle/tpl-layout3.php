<?php

/*
Template Name: Full Width Without Title
*/

get_header();
if (have_posts()) :
	while (have_posts()) : the_post();?>
	<div class="site-content clearfix">
	<div class="main-column page-gallery">
	<article class="post page">
			
		<p><?php the_content(); ?></p>
				<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>
	
	</article>
	</div>
		
		</div>
	<?php endwhile;
	
	else:
		esc_html_e( 'Sorry, nothing found!', 'frindle' );
endif;
get_footer();

?>