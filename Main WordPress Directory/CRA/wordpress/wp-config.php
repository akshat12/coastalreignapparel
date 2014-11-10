<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '?iNJ%wAc2d@zG285RS|]583%&hP,|}@=N4C xK^POdDjP{^d!$-bT*;`y^7}AR2k');
define('SECURE_AUTH_KEY',  ';I8M4s5|fMLfQ*)M&lEx8`EB{% ~5z?h;<b*3h|3@?e:(pIY$TLyR0qhW6|=RMc{');
define('LOGGED_IN_KEY',    '+)~b;]S3u0xZX_i+o&o3HoxyI4[|n 6FSd{GfW|0fepF1W(Q[$OFR0lqX(.Ty,/[');
define('NONCE_KEY',        'LZ+sdtAwwYlSYfp]/0k]Tc-3ep`jk]$t-ay>)-.&b+IqZS@aIVFK/sz?a55~-4$z');
define('AUTH_SALT',        'p|7L4/_o-;f4d@+a!{E5o({?<K;+cT+hrCsfsqFuM~ |+KGt2tL{9h`hq^x* }B-');
define('SECURE_AUTH_SALT', 'To]B-}U;|!wZVFAWT^tBl* *2L;L, Q#Gktlr1K489&^g72hh[3NX0D62`?z|<! ');
define('LOGGED_IN_SALT',   'J!|;mw@[~^Vc|x:h7bj[(;$J^R`*NhnBv:>Zk3~IGN,wk4vy+)at1DSeQvIp[y}c');
define('NONCE_SALT',       '5+#^hURJmy,cdO#)?KPLX %vtpZ^!X8,#:RB9|wA>vg|e(XW*F--UK&8]YV(iqX;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
