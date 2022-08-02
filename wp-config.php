<?php
function ___wejns_wp_whitespace_fix($input) {
    $allowed = false;
    $found = false;
    foreach (headers_list() as $header) {
        if (preg_match("/^content-type:\\s+(text\\/|application\\/((xhtml|atom|rss)\\+xml|xml))/i", $header)) {
            $allowed = true;
        }
        if (preg_match("/^content-type:\\s+/i", $header)) {
            $found = true;
        }
    }
    if ($allowed || !$found) {
        return preg_replace("/\\A\\s*/m", "", $input);
    } else {
        return $input;
    }
}
ob_start("___wejns_wp_whitespace_fix");
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_vs_581' );
/** MySQL database username */
define( 'DB_USER', 'admin-kc-tomasz' );
/** MySQL database password */
define( 'DB_PASSWORD', 'dlT8JAPlfPW^#5MpbI' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Yl#mJG>ZCWLIGQ>?Ovmh6qO2 &xc]y7-(jUD]hW<D9+U2UF=Gz+Yn8zt6_H,F$rW' );
define( 'SECURE_AUTH_KEY',  'LN!hhiF>bazAJ*([4QH8xEDk6ZsZ)p`m2DF^@SiHoHIq}~ Y`.oa6Z$eOULz+L!X' );
define( 'LOGGED_IN_KEY',    'NA:>?dF,%;- {-O1RE5gGA`TxkX$oyuZE+`B~h)pla/C4?X9dYM)BB.!k[e=$6D>' );
define( 'NONCE_KEY',        'P{SZ*v<LHhmg`kwIn``s9J(~fg$($I74:6TSYo:m; mA;yaXvzs4?8fr<B~BTZjn' );
define( 'AUTH_SALT',        '8*LU@%kt]Dt51tF1hzv%%20?aQ$Rf~3|ezN$Ya h6Hof%=$9]Pc2tPjl*GW<zZL4' );
define( 'SECURE_AUTH_SALT', 'z{8l7R_gvM(64*2|NiPfityGu&r{n^n5LZFMLg0^4;CULvgns(/<Um pAC&5tf>y' );
define( 'LOGGED_IN_SALT',   '(Y.]#NCz$rK^aU^OU..r`,W@%{-yOQ2]KIn7YOLMe2;Gdz8N;/qI8Z)AUo7NzgO9' );
define( 'NONCE_SALT',       'hMMi@1[Do!6lM)DjjhzB%Fr4!~2z~i-9f=~oKQs_<|GcAeNXtCdme}YJK(#-9roL' );
/**#@-*/
/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );
// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );	
// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', true );
// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );





