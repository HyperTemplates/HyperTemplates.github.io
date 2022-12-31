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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hypertemplates_db' );

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
define( 'AUTH_KEY',         '2GQH!s~2CKRV6ZmXc$7qbq,ZdB05G}V9[]|3$aWtfp3xb_*J)#]4y!~t?S&Y{XDL' );
define( 'SECURE_AUTH_KEY',  ']J}&B);SH?2uV7uG918jWIxk;E;6wwJ%U8_Z[G:6~z_t>+?L]*dK7A(e jz3bNzz' );
define( 'LOGGED_IN_KEY',    'KR4=nYC>i,nPl2W65s}An-X*v<>_p-8yg$X+{WVwDmOYPNta!NP8YeB+,WQTHE(2' );
define( 'NONCE_KEY',        '`<%^rjW^MwlaM@kH)UU%f$oaFDestJ^[:}p:/AH|sJ[ggCx[P~Kxf->Tj+_ y)%E' );
define( 'AUTH_SALT',        '`1Js#9gj ;@</_h-U4~P=CiKOOuLB|J}Q!~i39R@JWF7;uOW9:Zj:`vsQ}VO:.Q~' );
define( 'SECURE_AUTH_SALT', '$Y$_K3KUFKHe$C=,Ia jX<;mzEFQ{X?74NLi_YcN=@uyBO?I9y:zBCi($4vdaIhP' );
define( 'LOGGED_IN_SALT',   'A(]*5,de~{6:@$^_4rc?~AbW %k9kZwu})q8x$hhDlaXQ0UUadEZBK5Y39/]tp@C' );
define( 'NONCE_SALT',       'G6zj }l6{{41zZ?CPO+(K0_`C}`)KP>f5=N^&dQ$D)?ZP|sdD:r#l=[Mrx.I<zfx' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
