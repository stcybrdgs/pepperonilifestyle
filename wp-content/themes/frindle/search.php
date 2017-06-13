<?php

get_header(); ?>

<!-- site 	 -->
<div class="site-content clearfix">
	<!-- main-column -->
	<div class="main-container" >
	
	
    
		<div class="main-column" id="main">
			<div class="search-title">
					<h2><?php esc_html_e( 'Search result for: ', 'frindle' ); ?><?php the_search_query(); ?></h2>
			</div>
		</div>
		<div class="main-column" id="main">
			<?php
			if (have_posts()) :
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
	<!-- /main-column -->
</div> <!-- /main-container -->
	<?php get_sidebar(); ?>
	</div>
	
	<!-- /clearfix-->


	
<?php

get_footer();

?>