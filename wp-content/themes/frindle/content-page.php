	<article class="post page">
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
		
					
		<h2><?php the_title(); ?></h2>
		
		<p><?php the_content(); ?></p>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>
	</div>
	</article>
	
	