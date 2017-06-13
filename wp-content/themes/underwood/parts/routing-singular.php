<?php if (is_page()) { ?>
    <?php get_template_part( 'parts/content', 'page'); ?>
<?php } else if (is_single()) { ?>
    <?php get_template_part( 'parts/content', 'single'); ?>
<?php } else { ?>
    <?php get_template_part( 'parts/content', 'attachment'); ?>
<?php } ?>