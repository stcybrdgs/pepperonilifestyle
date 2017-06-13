<?php
/**
 * Zeus Framework - A WordPress theme development framework.
 *
 * @package   zeus-framework
 * @version   1.0.7
 * @author    Danny Cooper <email@dannycooper.com
 * @copyright Copyright (c) 2008 - 2015, Danny Cooper
 * @link      https://olympusthemes.com/zeus
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Fires before the zeus framework
 */
do_action( 'zeus_before' );

/**
 * The main class that loads all zeus core framework files.
 */
class Zeus_Framework {
	/**
	 * Get everything started.
	 */
	function __construct() {

		$this->constants();
		$this->functions();
		$this->structure();
		$this->admin();

		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );

	}

	/**
	 * Define the framework constants
	 */
	function constants() {

		/* Sets the framework version number. */
		define( 'ZEUS_FRAMEWORK_VERSION', '1.0.7' );

		/* Sets the path to the parent theme directory. */
		define( 'ZEUS_THEME_DIR', get_template_directory() );

		/* Sets the path to the parent theme directory URI. */
		define( 'ZEUS_THEME_URI', get_template_directory_uri() );

		/* Sets the path to the child theme directory. */
		define( 'ZEUS_CHILD_THEME_DIR', get_stylesheet_directory() );

		/* Sets the path to the child theme directory URI. */
		define( 'ZEUS_CHILD_THEME_URI', get_stylesheet_directory_uri() );

		/* Sets the path to the child theme directory. */
		define( 'ZEUS_FRAMEWORK_DIR', ZEUS_THEME_DIR . '/zeus-framework' );

		/* Sets the path to the child theme directory URI. */
		define( 'ZEUS_FRAMEWORK_URI', ZEUS_THEME_URI . '/zeus-framework' );

	}

	/**
	 * Load the core functions/classes required by the rest of the framework.
	 */
	function functions() {

		include_once ZEUS_FRAMEWORK_DIR . '/functions/template-tags.php';
		include_once ZEUS_FRAMEWORK_DIR . '/functions/widget-areas.php';
		include_once ZEUS_FRAMEWORK_DIR . '/functions/generate-css.php';
		include_once ZEUS_FRAMEWORK_DIR . '/functions/attr.php';
		include_once ZEUS_FRAMEWORK_DIR . '/functions/helpers.php';

	}

	/**
	 * Load the functions relating to the theme structure.
	 */
	function structure() {

		include_once ZEUS_FRAMEWORK_DIR . '/structure/wrapper.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/header.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/nav.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/post.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/page.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/comments.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/sidebar.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/footer.php';

		include_once ZEUS_FRAMEWORK_DIR . '/structure/hooks.php';
		include_once ZEUS_FRAMEWORK_DIR . '/structure/filters.php';

	}

	/**
	 * Register and enqueue core stylesheets.
	 */
	function styles() {

		wp_enqueue_style( 'zeus-base', ZEUS_FRAMEWORK_URI . '/assets/css/base.css' );

		wp_enqueue_script( 'superfish', ZEUS_FRAMEWORK_URI . '/assets/js/superfish.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'tinynav', ZEUS_FRAMEWORK_URI . '/assets/js/tinynav.js', array( 'jquery' ), '', true );

		// Register Font Awesome incase we want to use it later
		wp_register_style( 'font-awesome', ZEUS_FRAMEWORK_URI . '/assets/css/font-awesome.css' );

	}

	/**
	 * Load the functions/classes to be used within wp-admin.
	 */
	function admin() {

		if ( defined('USE_ZEUS_ADMIN_NOTICES') ) {

			// Class for generating admin notices
			include_once ZEUS_FRAMEWORK_DIR . '/classes/class-admin-notices.php';

		}

		if ( defined('USE_ZEUS_CUSTOMIZER') ) {

			// Library for required/recommend plugin notification and installation.
			include_once ZEUS_FRAMEWORK_DIR . '/libraries/customizer/customizer-library.php';

		}

		if ( defined('USE_TGMPA') ) {

			// Class for required/recommend plugin notification and installation.
			include_once ZEUS_FRAMEWORK_DIR . '/libraries/TGMPA/class-tgm-plugin-activation.php';

		}

		if ( defined('USE_CMB2') ) {

			// Class for creating metaboxes.
			include_once ZEUS_FRAMEWORK_DIR . '/libraries/CMB2/init.php';

		}

	}
}

$zeus_framework = new Zeus_Framework();

/*
 * Fires after the zeus framework
 */
do_action( 'zeus_end' );
