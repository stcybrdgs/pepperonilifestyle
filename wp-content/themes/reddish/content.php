<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 */
global $reddish_post_count;
if ( is_single() || is_page() ) : ?>
	<div id="single_page" <?php post_class(); ?> >
<?php elseif ( is_search() ) : ?>
	<div <?php post_class( 'search post' ); ?> >
<?php elseif ( is_archive() ) : ?>
	<div <?php post_class( 'archive post' ); ?> >
<?php else : ?><!-- if home -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
<?php endif; /* is_single() or is_page() */
if ( is_sticky() && is_front_page() && ! is_paged() ) : ?><!-- display featured image-->
	<div class="featured-post">
		<?php _e( 'Featured post', 'reddish' ); ?>
	</div>
<?php endif; /* ( is_sticky() && is_front_page() && ! is_paged() ) */ ?>
<div class="entry_header">
	<?php if ( is_single() || is_page() ) : ?>
		<h2 class="entry_title"><?php the_title(); ?></h2>
	<?php else : ?><!-- if home page is displayed -->
		<h2 class="entry_title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'reddish' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
	<?php endif; /* is_single() or is_page() */ ?>
	<p class="date_category"><?php _e( 'Posted on', 'reddish' ); ?>
		<a href="<?php
		if ( '' !== get_the_title() || is_singular() ) {
			echo get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );
		} else { // if post does not have title
			the_permalink();
		} ?>"><?php echo get_the_date(); ?></a>
		<?php if ( has_category() ) :
			if ( count( get_the_category() ) > 1 ) {
				_ex( 'in ', 'in more than one categories', 'reddish' );
			} else {
				_ex( 'in ', 'in one category', 'reddish' );
			}
			the_category( ', ' );
			_ex( ' ', 'full stop before author name', 'reddish' );
		endif; /* is_array() */
		_ex( ' by ', 'author', 'reddish' );
		the_author_posts_link(); ?>
	</p><!-- .date_category -->
	<?php if ( has_post_thumbnail() ) :
		the_post_thumbnail(); ?>
		<div class="featured_image_title">
			<?php echo reddish_featured_img_title(); ?>
		</div>
	<?php endif; /* post_thumbnail */ ?>
</div>  <!-- entry-header-->
<?php if ( is_search() || is_archive() ) : // display excerpts only for Search result page ?>
	<div class="entry-summary">
		<?php the_excerpt();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'reddish' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-summary -->
<?php else : /* ( is_search() || is_archive() ) */ ?>
	<div class="entry_content">
		<?php the_content( __( 'Continue reading...', 'reddish' ) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'reddish' ),
			'after'  => '</div>',
		) ); ?>
	</div>  <!-- .entry_content-->
<?php endif; /* ( is_search() || is_archive() ) */ ?>
<div class="entry-meta">
	<?php if ( has_tag() ) : ?>
		<div class="entry_tags">
			<?php _e( 'Tags: ', 'reddish' ); ?><span class="color"><?php the_tags( '', ',&nbsp;&nbsp;' ); ?></span>
		</div>
	<?php endif;
	if ( $reddish_post_count > 1 ) : ?>
		<a class="top color" href="#page_top"><?php _e( '[Top]', 'reddish' ) ?></a>
	<?php endif; /* is_front_page() && $reddish_post_count>1 */
	edit_post_link( _x( 'Edit', 'post edit link', 'reddish' ), '<span class="edit-link">', '</span>' );
	if ( ! is_singular() ) : ?>
		<div class="comments-link">
			<?php comments_popup_link( __( 'Leave a reply', 'reddish' ) ); ?>
		</div><!-- .comments-link -->
	<?php endif; // comments_open() ?>
	<div class="clear"></div><!-- to make .entry-meta have height of its containing elements -->
</div><!-- .entry-meta -->
</div><!-- .post -->
