<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Smartpress
 */
 
 $image = smartpress_get_the_Image(array('format'=>'array','size'=>'full'));
	
	$gallery_on_blog_items = get_theme_mod('smartpress_lightbox_on_blog_posts', 'no');
	
	$post_thumb_url = get_the_post_thumbnail_url();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('single-post-entry')); ?>>
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-img">
	<?php if($gallery_on_blog_items == 'yes') : ?>
	<a class="magnific-item" href="<?php echo esc_url($post_thumb_url);?>">	
	<?php endif; ?>
		<?php the_post_thumbnail( 'smartpress-custom' );  ?>
		<?php if($gallery_on_blog_items == 'yes') : ?>
	</a>
	<?php endif; ?>	
    </div>
	<?php endif ;?>
	<header class="entry-header">
		<?php 
		the_title( '<h1 class="entry-title">', '</h1>' );
	
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php smartpress_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'smartpress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'smartpress' ),
				'after'  => '</div>',
			) );
				
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php smartpress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php get_template_part( VIEWSURI.'post-nav' ); ?>
</article><!-- #post-## -->
