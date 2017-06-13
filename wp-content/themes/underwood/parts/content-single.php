<?php if ( have_posts() ) { ?>
	<?php while ( have_posts() ) { ?> 
		<?php the_post(); ?>
		<div class="singular-entry">
			<?php if (has_post_thumbnail() && get_post_meta( $post->ID, 'underwood_toggle_featured', true ) == "show") { ?>
				<div class="singular-img">
					<?php if (underwood_sidebar_is(get_the_ID()) == 'full') { ?>
						<?php the_post_thumbnail('underwood-1140-400'); ?>
					<?php } else { ?>
						<?php the_post_thumbnail('underwood-833-9999'); ?>
					<?php } ?>
				</div>
			<?php } else { ?>   
		        <?php // nothing yet ?> 
			<?php } ?>  
			<?php if ((!has_post_thumbnail() || (has_post_thumbnail() && (get_post_meta( $post->ID, 'underwood_toggle_featured_banner', true ) != "show")))) { ?>
				<div class="singular-header">
					<?php get_template_part( 'parts/blog', 'layout-meta'); ?>
				</div>
			<?php } ?> 
			<?php the_content(); ?>
			<span class="clearboth"></span>
			<div class="wp-link-pages">
				<?php wp_link_pages(); ?>
			</div>
			<?php get_template_part( 'parts/tags'); ?>
		</div>
		<?php if ( function_exists( 'wpsabox_author_box' ) ) { ?>
			<?php echo wpsabox_author_box(); ?>
		<?php } ?>
		<?php if (underwood_get_option('post_hide_related')!='1') { ?>
			<?php get_template_part( 'parts/related'); ?>
		<?php } ?>
		<?php comments_template( '', false );  ?>
	<?php } ?>
<?php } ?>