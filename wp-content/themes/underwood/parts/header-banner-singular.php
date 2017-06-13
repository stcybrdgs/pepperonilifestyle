<?php if (has_post_thumbnail() && (get_post_meta( $post->ID, 'underwood_toggle_featured_banner', true ) != "hide")) { ?>
    <?php if ( has_post_thumbnail() && (get_post_meta( $post->ID, 'underwood_toggle_featured_banner', true ) == "show") ) { ?> 
        <?php $thumb_id = get_post_thumbnail_id(); ?>
        <?php $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full'); ?>
        <?php $thumb_url = $thumb_url_array[0]; ?>
        <?php if (!empty($thumb_url)) { ?>
            <?php $underwood_parallax="data-parallax='scroll' data-image-src='" . esc_url($thumb_url) . "' style='background: rgba(0, 0, 0, 0.35);'"; ?>
            <?php $parallax_active="parallax_active"; ?>
        <?php } ?>
    <?php } ?>
    <section class="ssbanner subpage-banner <?php if(isset($parallax_active)){echo $parallax_active;} ?> <?php if ( has_post_thumbnail()  && (get_post_meta( $post->ID, 'underwood_toggle_featured_banner', true ) == "show") ) { echo "has-post-thumbnail"; } ?>"  <?php if(isset($underwood_parallax)){echo $underwood_parallax;} ?>>
        <div class="container">
            <div class="banner-wrap">
            	<?php the_title( '<h2>', '</h2>' ); ?>  
            </div>
        </div>
    </section>
<?php } ?>