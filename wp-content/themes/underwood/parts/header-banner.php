<?php
/* **************************************************************************************************** */
// Frontpage
/* **************************************************************************************************** */
?>
<?php if (is_front_page() && !is_paged())  { ?>
        <?php $the_query = new WP_Query( array('posts_per_page'=>1,'post__not_in' => get_option( 'sticky_posts' ),'meta_query' => array( array('key' => '_thumbnail_id')) ) ); ?>
        <?php if ( $the_query->have_posts() ) { ?>
            <div class="frontpage-banner">
                <div class="container">
                    <?php while ( $the_query->have_posts() ) { ?>
                        <?php $the_query->the_post(); ?>
                        <?php $thumb_id = get_post_thumbnail_id(); ?>
                        <?php $thumb_url_array = wp_get_attachment_image_src($thumb_id,'underwood-1140-400'); ?>
                        <?php $thumb_url = $thumb_url_array[0]; ?>
                        <?php if (!empty($thumb_url)) { ?>
                            <div>  
                                <img src="<?php echo esc_url($thumb_url); ?>" class="img-responsive">
                                <div class="banner-meta"><div><?php get_template_part( 'parts/blog', 'layout-meta'); ?></div></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <?php wp_reset_postdata(); ?>
<?php
/* **************************************************************************************************** */
// Singular
/* **************************************************************************************************** */
?>
<?php } else if (is_singular()) { ?>
    <?php if (class_exists( 'WooCommerce' )) { ?>
        <?php if (is_product()) { ?>
            <?php // no banner ?>
        <?php } else {  ?>
            <?php get_template_part( 'parts/header', 'banner-singular'); ?>
        <?php } ?>
    <?php } else { ?>
        <?php get_template_part( 'parts/header', 'banner-singular'); ?>
    <?php } ?>
<?php } ?>