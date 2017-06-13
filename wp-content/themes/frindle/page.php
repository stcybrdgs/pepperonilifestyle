
<?php
get_header(); ?>

<?php
	while (have_posts()) : the_post();?>
	
	<div class="site-content clearfix">
	<div class="main-container">
		<div class="main-column">
			
			<?php get_template_part( 'content', 'page' ); ?>
	
		</div>
		</div>
	<?php endwhile;	 ?>
		

	<?php get_sidebar(); ?>
	</div>


<?php get_footer(); ?>