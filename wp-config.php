<?php
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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'o=Z1ayw.9(3v%;R^6h#-wv[ 0#Fd*n9*$IHMdZbdg4eY]s!-P[]2/EZ.9UFj|KBq' );
define( 'SECURE_AUTH_KEY',   'x*M|L h46p9oW|^X75g* V2C[@[iMOI+&>UibT-L;ai3;mX53-$s^x{WF[4s%Hv!' );
define( 'LOGGED_IN_KEY',     'vjXBfxV(!1T#pa+8Zg>H;[&%ZLHs=C~U%i%hn/Ie_Vy<BG<t7?TFKX^v0k$yx!oh' );
define( 'NONCE_KEY',         'y}?O,n>PsZ9o#7LN;O1~ J4|/$@?kv:flLs9GcpSo[EFI+Tfao_MLI:j1s$(:+J:' );
define( 'AUTH_SALT',         '(|q:k%$Hv]73NVWz)J?ZKqz0,$_,&>b%GQI8YZJ~,0;ziOV-?9N.+H3Ax3a5JBe;' );
define( 'SECURE_AUTH_SALT',  ']M+tv[WS@p3[G|2s>YaoifL~<}zBK??in47BvK*a_>A?^N)!Q@F`[KP/Z&z[#yOL' );
define( 'LOGGED_IN_SALT',    '+Hz :3)orX^Eob!`n6EtS.w%Miy|0@k<q8`4.l9g:zSeK0)xZJ;rYl,Q@~{+3&*t' );
define( 'NONCE_SALT',        'tIro?.ZmgX}pV?<8L $BL/a=5x%+1C1?4b#1W# bz}VV|G9z4!AM-i1cku[okMzp' );
define( 'WP_CACHE_KEY_SALT', 'J,e.D,gRJeJpVlIP(xO N.4bk3FY||b=^:!19]`~c5[CtRt0z`>v,q?:bBZm:~4T' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
