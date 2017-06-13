<?php	

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$prevPost = get_previous_post(true);
	$nextPost = get_next_post(true);
?>
	<div id="prev-next-post-nav">
		<?php $prevPost = get_previous_post(true);
        if($prevPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
    ?>
        <div class="post-previous">
            <figure><?php the_post_thumbnail('thumbnail'); ?></figure>
			<div class="itemWrapper">
			<a class="previous" href="<?php the_permalink(); ?>"><?php echo __('&larr;  Previous Story','smartpress');?></a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <small><?php echo $time_string ; ?></small>
			</div>
        </div>
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
         
        $nextPost = get_next_post(true);
        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
    ?>
        <div class="post-next">
		 <figure><?php the_post_thumbnail('thumbnail'); ?></figure>
          
           <div class="itemWrapper">
		     <a class="next" href="<?php the_permalink(); ?>"><?php echo __('Next Story &rarr;','smartpress');?></a>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
             <small><?php echo $time_string ; ?></small>
			</div>
        </div>
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
    ?>
</div>
