<div class="row">
    <div class="col-sm-9">
        <?php if (is_search()) { ?>
		    <h2 class="text-center search-title"><?php _e( 'Search results for:', 'underwood'); ?> <span class="search_query"><?php echo get_search_query(); ?></span></h2>
		    <span class="title-line search-title-line"></span>
        <?php } ?>
		<?php if ( have_posts() ) { ?>
            <?php while ( have_posts() ) { ?>
                <?php the_post(); ?>
        		<div class="blog-item blog-standard">
                    <?php get_template_part( 'parts/blog', 'layout-meta'); ?>
        		    <?php if (has_post_thumbnail()) { ?>
            			<div class="blog-img">
            				<?php the_post_thumbnail('underwood-833-500'); ?>
            			</div>
        		    <?php } ?>
            		<div class="singular-entry">
                        <?php if (is_search()) { ?>
            			    <?php the_excerpt(); ?>
                        <?php } else { ?>
            			    <?php the_content(); ?>
            			<?php } ?>
            			<span class="clearboth"></span>
            			<?php get_template_part( 'parts/tags'); ?>
            		</div>
        		</div>
			<?php } ?>
			<?php get_template_part( 'parts/blog', 'layout-next-prev'); ?>
        <?php } ?>
    </div>
    <div class="col-sm-3 sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>



