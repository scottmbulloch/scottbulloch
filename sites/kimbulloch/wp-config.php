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
define('DB_NAME', 'scottb15_kimbulloch');

/** MySQL database username */
define('DB_USER', 'scottb15_kim');

/** MySQL database password */
define('DB_PASSWORD', 'yx9bxnQzk.1d');

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
define('AUTH_KEY',         'D.3V+5A|!x2@hhl+l@[x1zeFB9e-9]E1UtGQ=[*LwfLTA}H0G(U9dW2[ODluXYVs');
define('SECURE_AUTH_KEY',  'tp==rFG2W[[5<u^C!yb-Q^:Y`^=I8#7FIjQs^-v{@8)W=MwfMTV=ayk1Tbbxa,+:');
define('LOGGED_IN_KEY',    '&#l8 -a$y}!/PX.-gJ]y@^|xi~o!^/+R#k19+4ydR+?AQOQxA-dmaArYrA.N/o`6');
define('NONCE_KEY',        '/|>V,3/rFHZMf{ptX^-~P4$?i|^_`={+fWk55+0e)4}8X}v=9X+Ho4d&#6_4|Nnz');
define('AUTH_SALT',        '&>_7nu*V.fh[`R6X+bs7SnH=.EnG0-hkE?5lSnl*O0bdf.#plB#e=WvukPXN)-p7');
define('SECURE_AUTH_SALT', '||aw:MF{&Ym--PDVxg0y=UW:A4%Gwr0^DEfI}gCxeW_,,+iLWw6S19%8{LF[f=I)');
define('LOGGED_IN_SALT',   '*rix2|bsE+Ca]@O4?y}Tak28LbYP2D`4eSDwl.HO.@8 c lXIm3HDt4vrg<z~p{X');
define('NONCE_SALT',       '!vp&LIEL3@##eI!-|28T ]1jL*vbczaPaykXP6|PX+Q&O##C18rlNU+!i]CrW8*M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
