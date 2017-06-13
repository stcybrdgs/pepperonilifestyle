<div class="post-block">
<div class ="clr-border">

<article class="post <?php if ( get_theme_mod( 'custom_post' ) == 1 ) : ?> post-aside <?php endif; ?>">
	
	<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>
	
</article></div>
</div>