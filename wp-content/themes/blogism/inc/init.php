<?php
/**
 * Load files.
 *
 * @package Blogism
 */

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';

/**
 * Load helpers.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/helper/common.php';
require_once trailingslashit( get_template_directory() ) . 'inc/helper/options.php';

/**
 * Load theme core functions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/core.php';

/**
 * Load hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/basic.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/blocks.php';

/**
 * Load metabox.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/metabox.php';

/**
 * Include Widgets.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Customizer additions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer.php';
