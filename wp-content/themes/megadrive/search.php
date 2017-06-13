<?php get_header(); ?>

<main>
	<div id="main">

		<h1 class="archives-h1"><?php echo __('Search results for:','megadrive'); ?> <?php the_search_query(); ?></h1>

		<?php		
			get_template_part('loop');
		?>
		
	</div>
</main>

<?php get_sidebar(); ?>
		
<?php get_footer(); ?>