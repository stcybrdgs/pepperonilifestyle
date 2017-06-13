<?php 

// Custom loop for featured items in the slider on the front page. 
// Slider will show posts that are marked as "sticky" and have featured image.

?>

		<?php
			$post_sticky_array = get_option( 'sticky_posts' );
			if ($post_sticky_array) {
			} else {
				return;
			}
			$args=array(
			  'post__in'  => $post_sticky_array,
			  'meta_key' => '_thumbnail_id'
			);
			$my_query = new WP_Query($args);
			if($my_query->have_posts()) {	
		?>
		<div class="flexslider">
			<ul class="slides">
			<?php
				while ($my_query->have_posts()) : $my_query->the_post(); 
					if ( has_post_thumbnail() ) { 
			?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" rel="bookmark">
								<?php the_post_thumbnail(); ?>
							</a>
								<div class="flex-caption">
									<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" rel="bookmark">
										<p class="slider-title"><?php the_title(); ?></p>
									</a>
									<?php the_excerpt(); ?>
								</div>
						</li>
			<?php
					}
				endwhile;
			?>
			</ul>
		</div>
		<?php 
			} // end of if($my_query->have_posts())
			wp_reset_postdata();  // Restore global post data stomped by the_post().
		?>
<br>