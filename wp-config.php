<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u873455282_GBQiT' );

/** Database username */
define( 'DB_USER', 'u873455282_14dvH' );

/** Database password */
define( 'DB_PASSWORD', 'Pcb0qFCMEY' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '%mEdA:abCq*whi^j>5+a5dlU4z|bg0V;q)>{.Y@t&z 7e_*@e(nt|xV@;.OYZU`A' );
define( 'SECURE_AUTH_KEY',   ' I*u @6oy3YRp`(H~Eq%cic_ <Q5kJ!;Zt.ym!cofNZuV<GdE/>Z9TsS+A_SUsP.' );
define( 'LOGGED_IN_KEY',     ' IlE##g/RL;@|$rc3U[9zk?9nXRFiDK*Gn {_2-3([f8FHRJr9L1.a|Uvpi0Q-lm' );
define( 'NONCE_KEY',         'J|p&Wp/~i[$FM{JUaPBqE{;FGs)Q^/>3{ELA:XZDig:VfCmE~S#JU Bq9Gf,KS08' );
define( 'AUTH_SALT',         '47i*bLuy%-x/AXpz|C[pUu-<m?+:03Bp^RYz{O.#`Kr?<|DHpThjC-ppRj{PGPsH' );
define( 'SECURE_AUTH_SALT',  'j,K3UkOTkzB6CiDM?2]GABdlp,TuVS*xg!m~.?93-}i![e<,((1GoMMxouE6*7bV' );
define( 'LOGGED_IN_SALT',    'J@.)P>e{fWe3~2jgUe|TX3W+EA,zC$=FyYXKQ*kIJpIIQ$|po+7!.c*J,Yl;}(E^' );
define( 'NONCE_SALT',        ')y6QIgD0TH@lv9-`:e=A5tp3$(SD{k~nf wZ&55a]3# h%aj%SEz8apdDY8<R`Bn' );
define( 'WP_CACHE_KEY_SALT', 'egF#UMeDaJ)E|h6IocKf4,UP4^OY].Sv.K;|a:?HF1s8V_kC>9BSHNOY?E8[;Nwt' );


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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
