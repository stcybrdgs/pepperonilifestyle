<div id="secondary" class="widget-area">
	<?php if ( is_active_sidebar( 'primary' ) ) :
		dynamic_sidebar( 'primary' );
	else :
		$args = array(
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		);
		the_widget( 'WP_Widget_Recent_Posts', '', $args );
		the_widget( 'WP_Widget_Recent_Comments', '', $args );
		the_widget( 'WP_Widget_Archives', '', $args );
		the_widget( 'WP_Widget_Categories', '', $args );
	endif; /* is_active_sidebar */ ?>
</div><!-- #secondary -->
