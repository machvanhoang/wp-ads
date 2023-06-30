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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-ads');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '9#V5wXp`l6:sO;KW`)=Aq*q` 5Aq@_p?pcTC?n3F>kphriJPL5jTF!cve(Q_b9oF');
define('SECURE_AUTH_KEY',  '}TT8s_UInsJ8yrqs2q7MC2cQ*y|q+7%EP+$R8spi%MB1sX5SW<4=s0e-sz<h^#hj');
define('LOGGED_IN_KEY',    's~*RuJNN2l8Tp1$5R6(<pMoDvof FYTE+@%l7Bi|mpr_th9O.~g;#@GJpi&[F3<!');
define('NONCE_KEY',        '!|A31}%sA2<Bsx(#z;;P+Hog0@4 !>ABsgM]MjY2;{E$w (/,LUr@)Xi>hcz4+l/');
define('AUTH_SALT',        'cP_fqg^i{88SR0:2u?wOqw(bu4>,sMF&?O[Qt9!LGRXb4iYv|~L$eiC#zv]`TL-!');
define('SECURE_AUTH_SALT', '6pG_G=)*nP,q[b8j1&Iy,D2__;O3][Lg}.?Di&`K.PheKcwv^}MY73-MvdG2FgbV');
define('LOGGED_IN_SALT',   'H$tX~|!%u6f]T4,Bfni1t#d+IqaCcP(xJg{+{B`>O&o[,`A[JK?_wjy7@$)m..XN');
define('NONCE_SALT',       'y%5x%07 q30,*6z[(>[TPqS><%Xta9!>t-^{aOtR^S%ng@@YD[$+A>^,O<}TWA4$');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ads_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */
########################### Add More #######################################
define('WP_POST_REVISIONS', 3);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_AUTO_UPDATE_CORE', false);
########################### End ############################################
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
