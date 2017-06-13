<?php
get_header();
$format = get_post_format();

?>


<!-- site content -->

<div class="site-content clearfix">
	<!-- main-column -->
<div class="main-container">
	<div class="main-column">

	<?php
		if (have_posts()) :
		while (have_posts()) : the_post();
	?>

	<article <?php post_class(); ?>>
		<div class="comment-count"><a href="<?php comments_link(); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( '0', '1', '%' ); ?></a>	</div>
	<div class="heading">
		<h2>

			<?php if ( has_post_format( 'video' )) : ?>

				<i class="fa fa-play-circle" aria-hidden="true"></i>

			<?php elseif ( has_post_format( 'audio' )) :?>
			
				<i class="fa fa-volume-up" aria-hidden="true"></i>

			<?php elseif ( has_post_format( 'link' )) :?>
			
				<i class="fa fa-link" aria-hidden="true"></i>
			
			<?php elseif ( has_post_format( 'gallery' )) :?>

				<i class="fa fa-bandcamp" aria-hidden="true"></i>

			<?php endif; ?>
			
			<?php the_title(); ?>
		</h2>
	</div>

<?php if ($format == 'audio' || $format == 'video' || $format == 'link' || $format == 'gallery' || $format == 'format-standard' || false == get_post_format()) : 
get_template_part('templ/post-info');
 endif; ?>	



	
	<?php if ( has_post_format( 'status' ) || has_post_format( 'quote' ) )  : ?>
	         <?php if( get_the_modified_date() != get_the_date() || get_the_modified_time() != get_the_time() ) : ?>
			<p class="mini-meta"><?php the_author(); ?> @ <?php the_time( get_option( 'date_format' ) ); ?> &middot; 
			<?php esc_html_e('Updated', 'frindle'); ?> <time class="updated" datetime="<?php the_modified_date( get_option('date_format') ); ?>"><?php the_modified_date( get_option('date_format') ); ?></time></p>
          <?php else : ?>
             <p class="mini-meta"><?php the_author(); ?> @ <?php the_time( get_option( 'date_format' ) ); ?></p>
          <?php endif; ?>
	<?php endif; ?>

	<?php if( get_post_format() ) { get_template_part('templ/post-format'); } ?>
<div class="single-content-area">
				<?php if ( get_theme_mod( 'featured_single' ) == 1 ) : ?>
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail(''); ?>
					<?php endif; ?>
				<?php endif; ?>
			


			<?php if ( has_post_format( 'quote' ) ):  ?> 
			<i>
			<?php endif; ?>
					<?php the_content(); ?>
			<?php if ( has_post_format( 'quote' ) ):  ?> 
			<i>
			<?php endif; ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frindle' ),
				'after'  => '</div>',
			) );
			?>
			
				<?php
		if(has_tag()) { ?> <p class="post-tags">			
			<i class="fa fa-tags " style="font-size:14px"></i> 
   <?php the_tags('<span>'.('Tags:').'</span> ','','</p>'); ?> <br>
			
<?php } else { ?>
	<br>
    
<?php }

	?></div>


		<?php if ( get_theme_mod( 'author_info' ) == 1 ) : ?>

	<div class="author_bio_section">
				<p class="author_name"><?php esc_html_e('About ', 'frindle'); ?> <?php the_author_meta('display_name'); ?></p>
				<div class="author_info">
				<p class="author_details"><?php echo get_avatar(get_the_author_meta('user_email')); ?></p>
				
				<p class="author_de"><?php the_author_meta('description'); ?></p>
				</div>
	</div>
		
				
		<?php 	endif; ?>


		
		
			
			
			<?php //Related Posts
					 if ( get_theme_mod( 'related_post' ) == 1 ) : 
					
					
										$tags = wp_get_post_tags($post->ID);
										if ($tags) {
											echo '<div class="related-post-heading"><i class="fa fa-share" style="font-size:14px"></i>';

											esc_html_e('  Related Posts: ','frindle'); ?>
											</div><br>
											<?php
											$first_tag = $tags[0]->term_id;
											$args=array(
												'tag__in' => array($first_tag),
												'post__not_in' => array($post->ID),
												'posts_per_page'=>4,
												'ignore_sticky_posts'=>1
											); 
											$my_query = new WP_Query($args);
											
													if( $my_query->have_posts() ) {
													while ($my_query->have_posts()) : $my_query->the_post(); ?>

													<div class="related-post-block">
														<div class="related-post-thumb">

														<?php if ( has_post_thumbnail() ): ?>
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('frindle-small-thumbnail'); ?> 
													<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/Images/default-featured-image-thumb.png" height="96" width="161"> </img>
					<?php endif; ?></div>
													<div class="related-post-title"><?php the_title(); ?></a> </div>
													</div>
													
													<?php
											endwhile;
										}
											wp_reset_postdata();
										}

						
					?>
					
					<?php 	endif; ?>
						<!--next previous post navigation -->
							<?php  if ( get_theme_mod( 'nav_post' ) == 1 ) : ?>
						
					<div class="nav-post group">
					<div class="nav-post-wrap">
											<div class="previous-post">
											<strong>
											<?php esc_html_e('Previous Story','frindle'); ?>
											</strong><br>
											<?php previous_post_link('%link'); ?>   
												</div>
											
											<div class="next-post">
											<strong><?php esc_html_e('Next Story','frindle'); ?></strong><br>
												<?php next_post_link('%link'); ?>
											</div>
											</div>
											</div>
							<?php 	endif; ?>
							
							
			<div class="block-clr">
			</div>
			<div class="comment-box">
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
			</div>
	</div>
	</div>
	
	</article>
		<?php endwhile;
		
		else:
			esc_html_e( 'Sorry, nothing found!', 'frindle' );

		endif; ?>
	<!-- /main-content -->
	
	<!-- /main-column -->
	
	<?php get_sidebar(); ?>
	</div>
	
	<!-- /main-conlumn -->
	
<?php get_footer();

?>