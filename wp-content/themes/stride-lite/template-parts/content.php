<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stride
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if( get_the_post_thumbnail() != '' ){
			printf( '<div class="entry-media">%s</div>', get_the_post_thumbnail('','', array('class' => 'img-responsive') ) );
		}
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php stride_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'stride-lite' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stride-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="more-link">
		<?php echo '<a href="'.esc_url( get_permalink() ).'">'.__( 'Read More', 'stride-lite' ).'</a>'; ?>
	</div>
	<?php edit_post_link(
			'<span class="edit-link"><i class="fa fa-pencil"></i></span>'
			);
	?>
</article><!-- #post-## -->
