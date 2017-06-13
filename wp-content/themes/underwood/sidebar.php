<?php global $wp_query; ?>
<?php $i = 1; ?>
<?php if (is_singular()) { ?>
    <?php $underwood_postid = $wp_query->post->ID; ?>
    <?php if (trim(get_post_meta($underwood_postid, 'underwood_sidebar_number', true)) != "") { ?>
        <?php while ($i <= 50) { ?>
            <?php if (trim(get_post_meta($underwood_postid, 'underwood_sidebar_number', true)) == $i) { ?>
                <?php if (is_active_sidebar( "sidebar_" . $i )) { ?>
                    <?php dynamic_sidebar( "sidebar_" . $i ); ?>
                <?php } ?>
            <?php } ?>
            <?php $i++; ?>
        <?php } ?>
    <?php } else { ?>
        <?php if (is_active_sidebar( "default_sidebar" )) { ?>
            <?php dynamic_sidebar( "default_sidebar" ); ?>
        <?php } ?>
    <?php } ?>
<?php } else { ?>
    <?php if (is_active_sidebar( "default_sidebar" )) { ?>
        <?php dynamic_sidebar( "default_sidebar" ); ?>
    <?php } ?>
<?php } ?>