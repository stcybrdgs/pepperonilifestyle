<?php

/* Jetpack Infinite scroll */
function frindle_jetpack_setup () {
	add_theme_support('infinite-scroll', array(
		'type'		=> 'scroll',
		'container'	=> 'main',
		'footer'	=> 'container',
	));
}
add_action('after_setup_theme','frindle_jetpack_setup');
