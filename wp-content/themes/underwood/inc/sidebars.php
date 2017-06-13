<?php

/* **************************************************************************************************** */
// Register Sidebars
/* **************************************************************************************************** */

add_action('widgets_init', 'underwood_register_sidebars');

function underwood_register_sidebars() {

    register_sidebar(array(
        'name' => __('Default Sidebar', 'underwood'),
        'id' => 'default_sidebar',
        'description' => __('Widgets in this area will be displayed by default on any singular page or post where a sidebar is selected.', 'underwood'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<span class="widget_title">',
        'after_title' => '</span>'
    ));

    register_sidebar(array(
        'name' => __('Instagram Row', 'underwood'),
        'id' => 'instagram',
        'description' => __('Widgets in this area will be displayed in the instagram row in the footer.', 'underwood'),
        'before_widget' => '<div id="%1$s" class="instagram %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="instagram-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'underwood'),
        'id' => 'footer_left',
        'before_widget' => '<div id="%1$s" class="widget %2$s widget footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Center', 'underwood'),
        'id' => 'footer_center',
        'before_widget' => '<div id="%1$s" class="widget %2$s widget footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'underwood'),
        'id' => 'footer_right',
        'before_widget' => '<div id="%1$s" class="widget %2$s widget footer_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>'
    ));
	
    
    // create 50 alternate sidebar widget areas for use on post and pages
    $i = 1;
    while ($i <= 50) {
        register_sidebar(array(
            'name' => __('Alternate Sidebar #', 'underwood') . $i,
            'id' => 'sidebar_' . $i,
            'description' => __('Widgets in this area will be displayed in the sidebar for any posts or pages that are tagged with sidebar', 'underwood') . $i . '.',
            'before_widget' => '<div class="%1$s" class="widget %2$s widget sidebar_widget">',
            'after_widget' => '</div>',
            'before_title' => '<span class="widget_title">',
            'after_title' => '</span>'
        ));
        $i++;
    }
}