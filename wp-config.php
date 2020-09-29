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

// disable contact-form-7 p tag
define( 'WPCF7_AUTOP', FALSE );

// change domain
define( 'WP_HOME', 'http://holyinternational.vn' );
define( 'WP_SITEURL', 'http://holyinternational.vn' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'holyinte_wp' );

/** MySQL database username */
define( 'DB_USER', 'holyinte_wp' );

/** MySQL database password */
define( 'DB_PASSWORD', '$^q~L02Pr.8n' );

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
define( 'AUTH_KEY',         'F)NBI3W(>UiXo-Y-#LloB~5NwBU|4)(9Ts8BP7` d?ttE@a*ksfg92n8zSDl*`mm' );
define( 'SECURE_AUTH_KEY',  '`tTi4bV2Y!D8OAuyxoT>~FdTZA%UaK_hJJNEB,@-o1(@)J^|]sFksjGfMQc2/:>j' );
define( 'LOGGED_IN_KEY',    '%kAr_cxY(%D&zlBgMt64D<CyHA9Ti~FSkVb:{+&Qv2 f}om72^|%?oNNDhwF3/?o' );
define( 'NONCE_KEY',        '6maDCN,}Osyxvk`.WvzVL$<6KqVuiAi;K@8ZB*(1gdQ!`?HNH%]g [`w(Mp:6G D' );
define( 'AUTH_SALT',        '#v@0Prjc?s-*}0-Rqoq}uzWU5*$q5Vd=lGVF<1m{c#=[6qrg{h$Vrd)!7c^R }[@' );
define( 'SECURE_AUTH_SALT', '7<aeCk|vW&.t/`SFZ.QY5OL]+?$eHv(-zg9XwoIO[a]OUiV{0P=nM EF:E&%}]MT' );
define( 'LOGGED_IN_SALT',   'Me;O%>b^U!p:LL#*x)v B7Y%_#pjNM%EV>bu%^E4rNao&DD!v+@:YQ<k/}<,~WY}' );
define( 'NONCE_SALT',       '!esc,3#iU?B3D0WYl[v1PV4aNwzSL6L79[JlZQXVb) aqOO`$jVQwA$>~{Ov1k[j' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
