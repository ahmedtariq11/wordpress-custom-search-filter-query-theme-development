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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpresstwenty20' );

/** MySQL database username */
define( 'DB_USER', 'wordpresstwenty20' );

/** MySQL database password */
define( 'DB_PASSWORD', '344qaz741F' );

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
define( 'AUTH_KEY',         '<%jnghMnc(5Y^dg5-`ZM:m_4,B3/2{,VW9hZT~$vbmlNhrrWNE]&&)3Lngg(Kc$)' );
define( 'SECURE_AUTH_KEY',  'o*F`s}w[CLu.)hF$MO-?T%.9~%2G_Bof4!Ru?FK1pD5Nb5A+id6dOm0hq@i>x$D#' );
define( 'LOGGED_IN_KEY',    'u}?|*6SvK=2M+yRg~-ID<%|RItl[i?9b_>ANy]Xf,~`}15gB{; pxC?q_nu5x]K<' );
define( 'NONCE_KEY',        '&;lazcgK5pF),QylS$X|R9 bKrVH>D9_vx6A&SM+#;xg[:MUl+O~d$+}ll`wUcgJ' );
define( 'AUTH_SALT',        'xiM8WR7sF~f$qjOgv<=vK8P7p98jrMZA|&S{6%vuegZEhn}>(k 1s{8tH*>nEUx:' );
define( 'SECURE_AUTH_SALT', 'l]#u};BF}M{?q0/r!%[rs]rw/b1GyHMMd18v>?j?/Zr R;$7;gofgi+:[APNLrGs' );
define( 'LOGGED_IN_SALT',   '-kt;GM%dU(C8;1^ edeoG>~^W3N|9n*)L$O^Dq(OQQ)gp!Q}@(FSqHbD@s6?G9]6' );
define( 'NONCE_SALT',       '7/u~7V+9lL&-4}~,dqzm@t%Ud!#%4i!ONHSrm*pL[I>vH#,<<3v>G|KI>y,_R4I{' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
