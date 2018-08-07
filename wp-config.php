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
define('DB_NAME', 'skylightsocial');

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
define('AUTH_KEY',         'yE^.qF8kT[J>.NcDo/mseK)|V)<:LyA7h|<5f+ Ak#WH5OEH8akl}qM#z>{_>vBl');
define('SECURE_AUTH_KEY',  '>,#~^#P2^Vk.hYt< 2nE,S.!+.|JXx_@NPRj)i4oU8A+MgA/Sp!?mEk*@=uaU@Et');
define('LOGGED_IN_KEY',    '<:KFqa|9UBoqms$l+<vg L=.y=zgJ.N4u@UQWWs+A,,%c_MT*r+C[$LA/<%_Uc&g');
define('NONCE_KEY',        '7=iY>%d*aQSSZ=Zpl=--$x:2za^#>`#ye (/ujxMB<ciGO@N<<qN.fq&971h=!]o');
define('AUTH_SALT',        '_E kU~_|PGMwX=d(aokT9]~@czs4_~?kY$G9!4ZcDt.CI{HWsrz5Z=`@[.:DoYR]');
define('SECURE_AUTH_SALT', '0q{i;oNmy5<XTs8;m>?phXkw1g,Yhy<7%BYK1V1,6GWyT0jw`iQ4b?BeixTZ=kq6');
define('LOGGED_IN_SALT',   '[2J`P8b@&O#RR*6(bzU1I|L`btC+vVqyzTE,Dx7:wR<1MRwn~VO60:t2SlSe;xQO');
define('NONCE_SALT',       'P.;Onr<)5vdr}Ykf8Qe7+I3e2V2?~.A1;J]-AjZYdenrEHoVS:Ijy[A@I/;:)K2F');

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
