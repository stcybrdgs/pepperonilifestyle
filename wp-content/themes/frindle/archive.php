<?php

get_header(); ?>

	<!-- site-content -->
	<div class="site-content clearfix">
		
		<!-- main-column -->
		<div class="main-container">
		<div class="main-column"  id="main">
			
			<?php
			
			if (have_posts()) :

				?>
<div class="heading">
	<h1><?php 
		if ( is_category() ){
				the_archive_title(); ?> </h1><?php if ((the_archive_description() != '') && !is_paged()) : ?><div class="notebox"><?php echo the_archive_description( $category_id ); ?> 
		</div><?php endif; ?>

				<?php
		} elseif ( is_tag() ){
			?><h1> 
			<?php 
			the_archive_title();
		} elseif ( is_author() ){
			the_post();
			the_archive_title();
			rewind_posts(); ?>  </h1> 


				<div class="archive-author author_bio_section">
				
				<div class="author_info">
				<p class="author_details"><?php echo get_avatar(get_the_author_meta('user_email')); ?></p>
				
				<p class="author_de"><?php the_author_meta('description'); ?></p>
				</div>
	</div>


			
			<h1><?php
		} elseif ( is_day() ){
			the_archive_title();
		} elseif ( is_month() ){
			the_archive_title();
		} elseif ( is_year() ){
			the_archive_title();
			echo'';
		} else {
			esc_html_e('Archive:', 'frindle');
		}
	?></h1></div>
	</div>
	<div class="main-column" id="main">
		<div class="archive-wrap">
				<?php
				while (have_posts()) : the_post();

				get_template_part('content', get_post_format());

				endwhile;

				else :
					esc_html_e( 'Sorry, nothing found!', 'frindle' );

				endif;
			
			?>
						<div class="navigation" id="navigation"><strong>
                                <div class="previous"><?php esc_html(previous_posts_link(__( '&laquo; Previous Page','frindle' ))); ?></div>
                                <div class="next"><?php esc_html(next_posts_link( __('Next Page &raquo;', 'frindle' ))); ?></div></strong>
                        </div>	
		</div>
		</div>
	</div><!-- /main-column -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- /site-content -->

<?php get_footer();

?>