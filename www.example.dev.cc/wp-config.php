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
define( 'DB_NAME', 'exampleDBioig');

/** MySQL database username */
define( 'DB_USER', 'exampleDBioig');

/** MySQL database password */
define( 'DB_PASSWORD', 'B0NHBE8jd');

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '9]WS9*p5:[ZKGKGwsSO~xtwt[G81hZRKZVNG!ogoldV1~w|~-sOG:JC40skRgcJ|@');
define( 'SECURE_AUTH_KEY', 't;]#tPLDH95;eWPphO[#~w-spKC:5_-aS9OGD5xdWsoh1:|~!@wR8185:|VSKZG8~');
define( 'LOGGED_IN_KEY', 'CdVRKNGCskh@kc84}0>!@YR8F84}cVNgYR!zso,rjFB3}>,fMFNJB4kcYngN>,@v');
define( 'NONCE_KEY', '2mTPeLtm_phD51]91~aSOGOH;tlehaSK#_+t~woKG814:|hdVOWC5wtldsZS:#_-F');
define( 'AUTH_SALT', '$QJB7F80>YRJYQNF!zr$unfB3{>7<bIBJB3}nfcUYQI,$vn<*yqME{A2{.fbTMUM');
define( 'SECURE_AUTH_SALT', 'QM3umfXfYQM>^yr^yqjE7<E6;<iPIXPHA+umemfXP{.$u.+umME6HD6;WPeWPH_');
define( 'LOGGED_IN_SALT', 'jIbIA^yf+uqiE].6;#XPHDLE{mfbTXPH<*x_+tpLD]91;#WOHTLDtmeapiP]#*x_-');
define( 'NONCE_SALT', 'YfXQ^yqyrjb7>^>^yUMFIBXPIA$umfumfX2{.+.$umE7<6<*bTMEaTLDH.+um');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
