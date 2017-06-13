<?php if (((underwood_get_option('underwood_blog_routing_layout')!='')&&(underwood_get_option('underwood_blog_routing_layout')!='off'))&&$wp_query->get('routing')) { ?>
    <?php $routing=sanitize_key($wp_query->get( 'routing' )); ?>
    <?php get_template_part( 'parts/blog', $routing); ?>
<?php } else { ?>
    <?php if (is_search()) { ?>
        <?php get_template_part( 'parts/blog', 'standard'); ?>
    <?php } else { ?>
        <?php if (underwood_get_option('underwood_blog_layout', 'standard')=='standard') { ?>
            <?php get_template_part( 'parts/blog', 'standard'); ?>
        <?php } else if (underwood_get_option('underwood_blog_layout', 'standard')=='grid') { ?>
            <?php get_template_part( 'parts/blog', 'grid'); ?>
        <?php } else if (underwood_get_option('underwood_blog_layout', 'standard')=='gridfull') { ?>
            <?php get_template_part( 'parts/blog', 'gridfull'); ?>
        <?php } ?>
    <?php } ?>
<?php } ?>