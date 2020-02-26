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

define( 'WP_HOME', 'http://www.consultant.dev.cc' );
define( 'WP_SITEURL', 'http://www.consultant.dev.cc' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'consultaDBqckz6');

/** MySQL database username */
define( 'DB_USER', 'consultaDBqckz6');

/** MySQL database password */
define( 'DB_PASSWORD', 'wL9lcC4wWO');

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
define( 'AUTH_KEY', 'x*E;IbAXmi$u<E{EXBUnUj${z}FJc7NcrUjz>kz>8!0FU}FRgJYs!ds!1z[8N[8');
define( 'SECURE_AUTH_KEY', 'EuUjy>r^F^0FU7McrNcr!jz>4J|4JYBRgvRgs!kz[8-[8N0GRgCRhwZo~:p~:C|5');
define( 'LOGGED_IN_KEY', 'E{BQ3IUjBQfr^jv,3r^0B,3FUgBRgrUgv,0s!}C!0FR:8NdoRgs!ds~:w!0GR:COd');
define( 'NONCE_KEY', 'YMfu>7MYnMbr$Ynz}v,Q}BNcBQgrNYoz>r@}Bz[4JV8NYoGVgw|o@:C~[8O:CRd8');
define( 'AUTH_SALT', 'lap~:p+]9_;DSe9PapSet_;q*]A*;DP{APeqTeu.bq${u*EPQbr^fuv^BQ3FUjB');
define( 'SECURE_AUTH_SALT', '__9*2L6Pi+bu<x]E.6P6Pi@0J0JcwVo!o!4-:G[CRlGZtVp~1-:D[DS1HaWp_i+]D');
define( 'LOGGED_IN_SALT', '!!4N[8JZoNcs!do~:s!0GR:COdGVlwSw#l-[-:Ka9OdpLap+et_1D*;9P2DALaq*m');
define( 'NONCE_SALT', 'W_p*;x#6HW2HTiLam+Xiy<2+{6L<6MXAMbq$Xn${q^E${BQEQfuQcr^fv,3GWlw');

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
