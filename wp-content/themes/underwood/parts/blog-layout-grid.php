<div class="blog-item blog-grid">
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('underwood-401-401'); ?>
        </a>
    <?php } ?>
    <?php get_template_part( 'parts/blog', 'layout-meta'); ?>
</div>