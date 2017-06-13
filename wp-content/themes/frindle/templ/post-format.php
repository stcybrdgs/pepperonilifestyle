<?php $meta = get_post_custom($post->ID); ?>


<?php if ( has_post_format( 'gallery' ) ): ?>

<div class="post-format">
		<?php $images = frindle_post_images(); if ( !empty($images) ): ?>
		<script type="text/javascript">
			// Check if first slider image is loaded, and load flexslider on document ready
			jQuery( function($){
			 var firstImage = $('#flexslider-<?php echo the_ID(); ?>').find('img').filter(':first'),
				checkforloaded = setInterval(function() {
					var image = firstImage.get(0);
					if (image.complete || image.readyState == 'complete' || image.readyState == 4) {
						clearInterval(checkforloaded);
						$('#flexslider-<?php echo the_ID(); ?>').flexslider({
							animation: '<?php echo wp_is_mobile() ? "slide" : "fade"; ?>',
              rtl: <?php echo json_encode( is_rtl() ) ?>,
							slideshow: true,
							directionNav: true,
							controlNav: true,
							pauseOnHover: true,
							slideshowSpeed: 7000,
							animationSpeed: 600,
							smoothHeight: true,
							
						});
					}
				}, 20);
			});
		</script>
		<div class="flex-container">
			<div class="flexslider" id="flexslider-<?php the_ID(); ?>">
				<ul class="slides">
					<?php foreach ( $images as $image ): ?>
						<li>
							<?php $imageid = wp_get_attachment_image_src($image->ID,'frindle-featured-block'); ?>
							<img src="<?php echo esc_attr( $imageid[0] ); ?>" alt="<?php echo esc_attr( $image->post_title ); ?>">
								<?php if ( $image->post_excerpt ): ?>
								<p class="wp-caption-text"><?php echo $image->post_excerpt; ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
	</div>

<?php endif; ?>


<?php if ( has_post_format( 'video' ) ):  ?>
	 <div class="post-format">
	 <?php $key_video = esc_attr(get_post_meta( get_the_ID(), 'video', true ));
			// Check if the custom field has a value.
			if ( ! empty( $key_video ) ) {
				global $wp_embed;
							$video = $wp_embed->run_shortcode('[embed]'.$key_video.'[/embed]');
							echo $video;
					
			} ?>
  </div>
<?php endif; ?>

<?php if ( has_post_format( 'audio' ) ):  ?>
	 <div class="post-format">
	 <?php $key_audio = esc_attr(get_post_meta( get_the_ID(), 'audio', true ));
			// Check if the custom field has a value.
			if ( ! empty( $key_audio ) ) {
				global $wp_embed;
							$audio = $wp_embed->run_shortcode('[embed]'.$key_audio.'[/embed]');
							echo $audio;
					
			} ?>
  </div>
<?php endif; ?>


<?php if ( has_post_format( 'link' ) ):  ?>
	
	 <?php $key_link = esc_attr(get_post_meta( get_the_ID(), 'link', true ));
			// Check if the custom field has a value.
			if ( ! empty( $key_link ) ) {?>
			
				<a href="<?php echo $key_link; ?>">
				 <div class="post-format post-inner-link">
				<?php the_title(); ?>   <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</div>
				</a>								
			 
			<?php } ?>
 
<?php endif; ?>


	











