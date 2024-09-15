<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'custom' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'gi]$A1nnhuZIZ!a)F56ZRmOwmLY$}}2@[$Wi,AvPnpvU!Q@%G~.<S=8>d>TC=oC^' );
define( 'SECURE_AUTH_KEY',  '8XC6SENsV.6|MI-:e@S$8}=EjDyeSBv1; IF&%&;T7$IpKxq7y={[}l0>|-?h*fo' );
define( 'LOGGED_IN_KEY',    '?KmIZrH=9LxzO4o|OH[c@Zt+?&Vz=L/5][K{I|;i6E]*o:|9I`N%NDE,^mR@8&/S' );
define( 'NONCE_KEY',        '&?l0O~N<bch)${%ZsCYb)!W$CAt%%B=,HCPl!QiJB{Cd<rK,HsXE5/v^(n`MwGQq' );
define( 'AUTH_SALT',        'W8`c7{:Vh-Z~!*N]aCV4A!q44T O/zp~one:rZ>ee?:1NJ>]B`96C&c$B7;++<R:' );
define( 'SECURE_AUTH_SALT', 'Qgx?OWES85hN Rs(*_+Ko76W>@%svq1>12cl^am+-%3U<f/E1t3-L+^`2r;Yy9v3' );
define( 'LOGGED_IN_SALT',   'y^o7-i}hr&h,[ q7Y}tCc$Ho$oBy9V1Y3[3@.G#W]y>&5%w.*&$Hv%k0?Z%Nak`w' );
define( 'NONCE_SALT',       'u9~QePc@ZQ_)Pqz <{+ %sw75%@>sI!#b;y%O`uU(+2HS!U)+_(Is8H5l Q(%P8r' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
