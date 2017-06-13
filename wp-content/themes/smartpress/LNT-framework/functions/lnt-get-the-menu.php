<?php

function smartpress_get_the_menu($slug,$walker) {
	
	$walker = NEW $walker();
		$args = array(
		'theme_location' => $slug,
		'depth'		 => 4,
		'container'	 => '',
		'container_id'	 => '',
		'fallback_cb' =>  'smartpress_menu_cb',
		'menu_class'	 => 'menu',
		'items_wrap' => '%3$s',
		'walker'	 => $walker
		);
		wp_nav_menu($args);
		
}

function smartpress_menu_cb (){
	
	$args = array(
		'depth' => 0,
		'container'	 => false,
		'echo' =>  true,
		'menu_class'	 => '',
		'show_home' => true,
		'items_wrap' => '%3$s',
		);
		wp_page_menu($args);
		
}