<?php

/*
Template Name: Page with Infobox

*/


get_header();
if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	
	<div class="site-content clearfix">
	
	
	<div class="special-layout main-column">
	
	<?php
		if( frindle_has_children() OR $post->post_parent > 0 ) { ?>
			<nav class="sub-menu children-links clearfix">
					<span class="parent-link"><a href="<?php echo esc_url(get_the_permalink(frindle_get_top_ancestor_id())); ?>"><?php echo get_the_title(frindle_get_top_ancestor_id()); ?></a></span>
					
						<ul>
							<?php 
							
							$args = array(
								'child_of' => frindle_get_top_ancestor_id(),
								'title_li' => ''
							);
							
							?>
							<?php wp_list_pages($args); ?>
						</ul>
			</nav>
		<?php } ?>
		<div class="page-inner-content">
	<h2> <?php the_title(); ?></h2>

	<!-- info-box -->
					<div class="info-box inline">
						<?php the_meta(); ?>
						
					</div>
						<!-- /info-box-->

					
	
	<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>					
	</div>
	
</div>
	
	
	
	</div>
	<?php endwhile;
	
	else:
		esc_html_e( 'Sorry, nothing found!', 'frindle' );
endif;
get_footer();

?>