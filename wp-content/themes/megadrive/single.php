<?php get_header(); ?>

<main>
	<div id="main">

	<?php while(have_posts()): the_post();?>

				<article>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="post-meta">
					<?php echo __('Posted by','megadrive'); ?> <?php the_author_posts_link();?> | 
					<?php the_category(', ');?> | 
					<?php the_time('F jS, Y');?> | 
					<a href="<?php comments_link();?>"><?php comments_number( __('0 Comments','megadrive'),__('1 Comment','megadrive'),__('% Comments','megadrive') ); ?></a>
					</div>
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
							<div class="post-thumbnail-single">
							<a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail();?></a>
							</div> 
						<?php }	?>
						<div class="post-full">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
						<?php the_tags('<div class="post-meta">' . __('Tags:','megadrive') . ' ', ', ', '</div><br>'); ?>

						<p class="red-bottom-line"><?php previous_post_link('%link',__('&lt; Previous post','megadrive')); ?>
						| <?php next_post_link('%link', __('Next post &gt;','megadrive')); ?></p>
						<br>
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