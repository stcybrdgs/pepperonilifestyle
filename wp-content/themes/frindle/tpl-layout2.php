<?php

/*
Template Name: 2 column layout
*/


get_header();
if (have_posts()) :
	while (have_posts()) : the_post();?>
	
	
	<div class="site-content clearfix">
	<div class="sidepage">
	<article class="post page">
			
					
					
		<div class="title-column">			
					
		<h2><?php the_title(); ?></h2>
		</div>
		<div class="text-column">
		<p><?php the_content(); ?></p>
				<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</article>
	</div>
		
		</div>
	<?php endwhile;
	
	else:
		esc_html_e( 'Sorry, nothing found!', 'frindle' );
endif;
get_footer();

?>