<div class="post-block">
<div class ="clr-border">
<article class="post-block <?php if ( get_theme_mod( 'custom_post' ) == 1 ) : ?> post-gallery <?php endif; ?>">

		<h2><i class="fa fa-bandcamp" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
		
		<p class="mini-meta"><?php esc_html_e('by ','frindle'); ?><?php the_author(); ?> @ <?php the_time( get_option( 'date_format' ) ); ?></p>
	
	<?php if($post->post_excerpt) { ?>

		<p>
		<?php the_excerpt(); ?>
		</p>

	<?php } else {

		the_content();

	} ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>


</article>
</div>
</div>