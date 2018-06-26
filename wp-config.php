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
define('DB_NAME', 'sofazdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '|`BC:1@Q ;h/soZ8[MMxBO69yG.taTtVA:yR)gLi5oywf?`G]=Oe?*lz48kqVGvm');
define('SECURE_AUTH_KEY',  '((1[uV>0Y%Se;~gH]6BJ?]Bv*y|({u^R}/3/HtD0-.V(fHrbpX)AKl`}7jFp?x25');
define('LOGGED_IN_KEY',    'pOTKq0|n&;(l|)b_>3Cx:1Xdl:%zQ3hT4i5,,@gyBqUdxz=M2W*8&r)Zf&E8kGU#');
define('NONCE_KEY',        't3]0_%z?AmtELSrDo%jDrInNln~WYKUh6xuT%NAuaK?Bq?e{{eO:TBVn#Oh[6;sD');
define('AUTH_SALT',        'w>)vCZ_Cq.@~_wG`_:0L_m!>qD0#A6*40w`{4+uEMWH5}WO([#:cGx8wWPPkyrWh');
define('SECURE_AUTH_SALT', '|luV=@#@s4v,({p>So>1GA;OvcAWo-v^gJudra;p81J/6eYP!&,BI[_iSONV%RUM');
define('LOGGED_IN_SALT',   '.QYD@3,w..L`>I|,Oa/bp7IU`ylNI{pZWo.+KR`s?zA%Z}Rx}:3BM*|Uo{Wc5KQ^');
define('NONCE_SALT',       '5}8;Gv3.^i{rZ4TLr</q2:.t/KsCD=;9;PR!GKWEb{m|]P^;$[:n[@s<5nA7yLjp');

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
