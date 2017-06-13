<?php

/**
 *  Define theme functions directory and URI constants
 */

define('FRAMEWORK_FUNCTIONS', get_template_directory() . '/LNT-framework/');

define('VIEWSURI', 'views/');

define('FRAMEWORK_FUNCTIONS_URI', get_template_directory_uri() . '/LNT-framework/');

/*
* Theme customizer functions
*
*/

// Helper library for the theme customizer.
require FRAMEWORK_FUNCTIONS . 'customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require FRAMEWORK_FUNCTIONS . 'customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require FRAMEWORK_FUNCTIONS . 'customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require FRAMEWORK_FUNCTIONS . 'customizer/mods.php';


/**
 *  Theme custom functions
 */

$all_functions = glob( FRAMEWORK_FUNCTIONS.'functions/*.php' );

foreach ($all_functions as $files) {
	include $files;
}

