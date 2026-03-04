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
define( 'DB_NAME', 'idoctor' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'MinaraVPS2026' );

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
define( 'AUTH_KEY',         ']/wcg0{@L%TTIh+,(]?0fFE6>yXzk*s)-ce-{xHaSP)G}$YT(Oo3@1yjEt`Q$K/D' );
define( 'SECURE_AUTH_KEY',  '*3%!=i?9 xQ$W:c, 8-Rj;e)B4?W-Nx&I5qL=%lTh)xfHBzF0$(B3!H6#f)twrMT' );
define( 'LOGGED_IN_KEY',    'rzCLLI!MI1*%Il>d9~!S?Ez6ZYDjrDf Ovgil~4@w.}14iEUx|AKD3uw3/c(.7pr' );
define( 'NONCE_KEY',        'TdLynA14?9;~!f?l9>AKF3`I@73vl<AvTS%+f7w )x~0.p!GFr@L]L;ofJF&U[Bx' );
define( 'AUTH_SALT',        'wW~gz WTx`3a|v^VI(n~!;TrlCHOC>[,VzCP=5b4[/Gp_QX}X~c5]l>qw!r5~h6Z' );
define( 'SECURE_AUTH_SALT', 'ISJ8SCx2A|tYxi$cJ>`0}?6<ksXSdw!}0;Y^|EV5x}Jm!B?%b],.ckxD>sO][BRz' );
define( 'LOGGED_IN_SALT',   'mo`Ds#&Gizk8_Uc}fRt7|T4m(jMKVUyVUd63B5^7VYA@*fH~ vhNdnDX8XGuITsk' );
define( 'NONCE_SALT',       '25V<dp58mvSTUSh`3|WZ*{v.Le@5Gjl{=X4%gf?i0OazkV.6%^`kbgkScCB!rj7w' );

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
