<?php get_header(); ?>

<main>
	<div id="main">
			
		<?php while(have_posts()): the_post();?>
		
					<article>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
								<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail(array(165,135));?></a>
								</div> 
							<?php }	?>
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							<br>
							<p class="red-bottom-line"></p>
					</div>
					</article>
					<div id="comments-template">
					<?php comments_template(); ?>
					</div>
					
		<?php endwhile; ?>

	</div>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>