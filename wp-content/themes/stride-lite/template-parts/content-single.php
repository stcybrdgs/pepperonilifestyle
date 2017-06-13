<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package stride
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if( has_post_thumbnail() ){
			printf( '<div class="entry-media">%s</div>', get_the_post_thumbnail('','', array('class' => 'img-responsive')) );
		}
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php stride_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stride-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php stride_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
