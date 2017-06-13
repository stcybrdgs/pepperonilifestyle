<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pepperonilifestyle');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'GingerRoot123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vj>g}E(z9u)[:djVI]3A[)/qFeZp8JUP*p4GB:Ulbb&|Sm9jEgC1Y:bmynO>4sC8');
define('SECURE_AUTH_KEY',  'TU4hf/xy0)OXVqIEz1V)4AL2FtPE|OsLY1KE0&BTL/TNKP^t5>+{)d6MkfHa#(<n');
define('LOGGED_IN_KEY',    'eo|if+n+kwE3{*caY=wg!hp-Mso9^JEjoy+?LJFL0{SL!7L:P=0.iHX`mnO J-rG');
define('NONCE_KEY',        ')mf;5jscg^A$V2o~jaN3Ng+(>P-o18iMnWDj>p>akY7JHIk?I?@tj.DDab340|!q');
define('AUTH_SALT',        '1Duya;DNx]rCK_)DX5<WNcU2h~Q~G^dH%tl@-7l!*(5ntd730|c8za~rJ@C&^l=&');
define('SECURE_AUTH_SALT', 'z?Xq:JsFsms:%pf>K[4t$%w1E4J&_R%bw!kaJ5[GC7x-R.TF#/_1Q &XAP92kcl:');
define('LOGGED_IN_SALT',   ',wAzm~]d%;/o5S]HC4bb(eD$k4egltfkfrMK/j-lr;>D<mRTT85J;+ 7W>n(DqRJ');
define('NONCE_SALT',       '4NfAq{B;9p!kV5#6z5I;?gb 5++w??n6`1{,9HXMVGG3fr/3dx:S3Ur$FaVbp_F@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
