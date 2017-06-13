<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="mainmenu-row">
            <div class="container">
                <?php get_template_part( 'parts/header', 'menu'); ?>
            </div>
        </div>
        <div id="brand-row">
            <?php if ( has_custom_logo() ) { ?>
                <?php the_custom_logo(); ?>
	        <?php } else { ?>
	            <h1 class="text-center text-logo"><a href="<?php echo esc_url(home_url()); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
	        <?php } ?>
        </div>
        <?php get_template_part( 'parts/header','banner'); ?>
        <div class="palette <?php underwood_palette_classes(); ?>">
            <div class="container <?php echo underwood_sidebar_is(get_the_ID()); ?>">