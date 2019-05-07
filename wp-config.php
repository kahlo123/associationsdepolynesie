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
define( 'DB_NAME', 'associationsdepolynesie' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '1B-|(]D]he6t8GN)2j7[w@$[!j;WHJkL=e19|ohvbed-2k}:b!S,afht-(nuB~iu' );
define( 'SECURE_AUTH_KEY',  '}39uAUPnxF@d, ym|f2*A$<jZ[;r&=_(&?hNV8~?.Exhxt8])F-ThB+P]$Ua,Tec' );
define( 'LOGGED_IN_KEY',    ' R7 &ku}n?B~]gdmdz3FAw{zn.D0{nFOq~E|G.ILy[3ou$+hq5L)iQ4S1DYZ_KC,' );
define( 'NONCE_KEY',        '^zSaVVq&jw[^7VMYG?LZ^Lrah.~$2C,`+T@f;{4=l*=g3;ne@fHa+keAAJaT#rY;' );
define( 'AUTH_SALT',        'Tu7`z~WoS1]L)L@Ddb3;9;uj7)xWAn?<VL0R/8wi8(l~(}L@H}f+RE!=xCh{{9W4' );
define( 'SECURE_AUTH_SALT', 'GIvH6CD>Rg|A94Ue%:q==o 2lVDpME43>FWn1sn<j3#_gKa,cx+%Q#Ts~m5>@[z$' );
define( 'LOGGED_IN_SALT',   'mC)/+QX$&/KZ;q^p1k&i<g3LqW=16s:%j3L ^]<x#F;u^@XzXxcHlOB kuxx`KaZ' );
define( 'NONCE_SALT',       'wB3uct~J0xkT2u>bpRxVZ@M?1F)3 ?{YfMoYl%jjv3,CRC,ux}Sgs&$yw=D7S8}A' );

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

define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/associationsdepolynesie/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
