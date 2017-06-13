<div class="post-block">
<div class ="clr-border">
<article class="post post-status">

	<p class="mini-meta"><?php the_author(); ?> @ <?php the_time( get_option( 'date_format' ) ); ?></p>
	<?php the_content(); ?>
	<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
	?>
</article>
</div>
</div>