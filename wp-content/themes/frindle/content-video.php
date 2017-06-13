<div class="post-block">
<div class ="clr-border">
<article class="post <?php if ( get_theme_mod( 'custom_post' ) == 1 ) : ?> post-video <?php endif; ?>">
	

	
<h2><i class="fa fa-play-circle" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>


<p class="post-info"><div class="post-date"><i class="fa fa-calendar" style="font-size:14px"></i> <?php the_time( get_option( 'date_format' ) ); ?> </div>


	 <div class="post-author"> <span class="diff">| </span><i class="fa fa-user" style="font-size:14px"></i><?php esc_html_e('by','frindle'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></div>

	<div class="post-comment"> <span class="diff">|</span> <i class="fa fa-comments-o" style="font-size:14px"></i> <?php comments_popup_link( esc_html__( 'Leave a comment', 'frindle' ), esc_html__( '1 Comment', 'frindle' ), esc_html__( '% Comments', 'frindle' ) ); ?></div>
					 
	<?php if ( get_edit_post_link() ) : ?>
	<div class="post-edit"> <span class="diff">|</span> <i class="fa fa-pencil-square-o" style="font-size:14px"></i>
					 <?php edit_post_link( esc_html__( 'Edit', 'frindle' ) );?>
	</div>
	<?php endif; ?>		
	</p>
			<!-- post-thumnail -->
	
	<div class="the-post-thumbnail">
			<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
					} else { ?>
					
			<?php } ?></a>
	</div>
	<!-- /post-thumnail -->
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