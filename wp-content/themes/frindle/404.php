<?php
get_header();?>


<!-- site content -->

<div class="site-content clearfix">
	<!-- main-column -->
	<div class="main-container">
	<div class="main-column">

	

	<article class="post">
	<h1 class="oops"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'frindle'); ?></h1>
	
	
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Check the URL!', 'frindle'); ?></p>
	<p> <?php esc_html_e( 'Checkout some of our Recent Work from below!', 'frindle'); ?></p>
	
	<?php the_widget( 'WP_Widget_Recent_Posts', 'title='.esc_html__( 'Recent Posts', 'frindle' ) ); ?> 
	
	<?php
				
				$archive_content = '<h3>' . sprintf( esc_html__( 'OR Try looking in the monthly archives. %1$s', 'frindle' ), convert_smilies( ':)' ) ) . '</h3>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1&title='.esc_html__( 'Archives', 'frindle' ), "before_title=</h2>$archive_content" );
	?>
	
	<h3><?php esc_html_e( 'OR search again!', 'frindle'); ?> </h3>
	
	
					
	<?php get_search_form(); ?>
	
	
	</article>
	<!-- /main-content -->
	
	<!-- /main-column -->
	

	</div>
	</div>
	<!-- /main-conlumn -->
		<?php get_sidebar(); ?>
</div>	
<?php get_footer();

?>