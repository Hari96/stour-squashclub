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
define('DB_NAME', 'rgbmarke_squashforum');

/** MySQL database username */
define('DB_USER', 'rgbmarke_sforum');

/** MySQL database password */
define('DB_PASSWORD', 'skw0zhK£L&b');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ':s^~P+(0YqrN.`2#aTm:S+1y,)te!k-<bui?]&cIGPvb3XFPLQY%x[8X#7 9(1tk');
define('SECURE_AUTH_KEY',  'DL|[%UX#T.&[$xPi5Yj65$Edn00Ie`hu_0!~)#8COb1DF0~7wY,b(8WSxY,=K1xA');
define('LOGGED_IN_KEY',    '>wg3*:1jFF<f2,ef2Y-9M.8a`+ bS[G3.>qh>oHb&7r?ZOYF_I~ic*RAJq)L~vV1');
define('NONCE_KEY',        'H&dwTVMBce`F3Omq}U5g+@b]3y|fSF]E@/Ki<z#!h9 G;of~]OkJJ>Q2+YcL0-5t');
define('AUTH_SALT',        '.J$(i@T/,|s]{$~G+(ky?}WL~C$fT|U)7V-_k&$FqO~^(TOYz5&c2^+`_Zce]prf');
define('SECURE_AUTH_SALT', '!$$L+A@eD2SkFIHb?vK.<%<2;FA`,]Hm-gOF3wO&epGO}M95+;3M3tbU_y3%4OL`');
define('LOGGED_IN_SALT',   'LCKPP-A!Hw};h@qp1cA-Rp+V::PO;$bC|+*N j[|Fv.++%|C+Yt; n+2Oto||&:d');
define('NONCE_SALT',       'eGoi2-#eG4BH5y XdN+7?O%=m?N)AmfXek~)/a)OvuMs?*71+v{#t#aca|l}0c!]');



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
