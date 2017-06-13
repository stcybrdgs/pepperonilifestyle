<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comment_count = get_comments_number();
                if ( 1 === $comment_count ) {
                    printf(
                        /* translators: 1: title. */
                        esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'megadrive' ),
                        '<span>' . get_the_title() . '</span>'
                    );
                } else {
                    printf( // WPCS: XSS OK.
                        /* translators: 1: comment count number, 2: title. */
                        esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'megadrive' ) ),
                        number_format_i18n( $comment_count ),
                        '<span>' . get_the_title() . '</span>'
                    );
                }
			?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->
		
		<div class="comments-pagination">
			<?php paginate_comments_links() ?>
		</div>
		

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'megadrive' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(
	'comment_notes_after' => '',
	'comment_field' => '<p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'
	)); ?>

</div><!-- .comments-area -->
