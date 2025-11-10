<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_DATABASE') );

/** Database username */
define( 'DB_USER', getenv('DB_USERNAME') );

/** Database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** Database hostname */
define( 'DB_HOST', 'db:3306');

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
// echo '<pre>'.print_r(DB_NAME,true).'</pre>';
// echo '<pre>'.print_r(DB_USER,true).'</pre>';
// echo '<pre>'.print_r(DB_PASSWORD,true).'</pre>';
// exit();
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
define( 'AUTH_KEY',         'IKhQl#SHNuP(^ykS#5M(G${w924Zhy1fE*.$&]xzK*:SJ3p,lJ`{P+#Ko!Ith+;^' );
define( 'SECURE_AUTH_KEY',  'dv)($?[ieaioGN!^5e+2|{OQ,d@mo4oyONmC&{J$WADBJFgpb#2DHpFuC{hiC6c ' );
define( 'LOGGED_IN_KEY',    'BE_x/C06zc)])aF`,a;EFp94s)Jb(@+#3=3`@=;{G`Zk)tNGXq_,]YG8t:<FOH5N' );
define( 'NONCE_KEY',        '2,OG[jfw+DWjI/6=-W>[>^fXm^B?Z!G%ml_@s&HL2rr)HOj6 bU8FT>BJnmM,hF<' );
define( 'AUTH_SALT',        '<<sW, *wPd369!*UPGPT8lCSWc4]iMI4c4bagw,4iT4Jf NuJ5a8i^6^e+u#c^cv' );
define( 'SECURE_AUTH_SALT', '*ayoIlx&Ex_7n!?oX8DYutg.X1Q_xDv]#%T3~U%:@=rS&ny+HwPxYnnyk=I(xo0Y' );
define( 'LOGGED_IN_SALT',   '/T__F<32M./y8D;;fyz8_`.*>j^sy2%en5;V2/[hHgaC$nELbTR8r9pY_N~=YR)]' );
define( 'NONCE_SALT',       'LY=k%_t:#20-&x:LiQ{cVEALeq-5Y@~z(,dqT{+1%Vd-r9KK=Uw|=JNXZms$V~&&' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'sdak_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

$root_dir = dirname(__DIR__);
/**
 * Document Root
 *
 * @var string
 */
$webroot_dir = $root_dir . '/public';

define('WP_HOME', 'http://localhost');
define('WP_SITEURL', 'http://localhost/wp');

define('CONTENT_DIR', '/content');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);


define('WP_ENVIRONMENT_TYPE', 'development');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
