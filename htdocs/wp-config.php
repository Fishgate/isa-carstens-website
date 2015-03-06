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
// Use these settings on the local server
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
  include( dirname( __FILE__ ) . '/wp-config-local.php' );
  
// Otherwise use the below settings (on live server)
} else {
    define('DB_NAME', 'isacarstens');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
    // Overwrites the database to save keep edeting the DB
    define('WP_HOME', 'http://192.168.1.11/ISA/website/htdocs');
    define('WP_SITEURL', 'http://192.168.1.11/ISA/website/htdocs');
  
    /**
    * For developers: WordPress debugging mode.
    *
    * Change this to true to enable the display of notices during development.
    * It is strongly recommended that plugin and theme developers use WP_DEBUG
    * in their development environments.
    */
   define('WP_DEBUG', false);
}

/** ISA specific constants **/
define('CONTACT_FORM_LOGS_TBL', 'form_logs_contactus');
define('APPLYNOW_FORM_LOGS_TBL', 'form_logs_applynow');

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
define('AUTH_KEY',         '8*6<<0VI!DZ@gz[?MPd)_a5E>2O%<=I$|L74s_.JBR?lxZuJr6q!f%2N{pH|xr0.');
define('SECURE_AUTH_KEY',  'uy|^y$CT`UJ|WaMQOdS/({q_`Y-Gph;2|-,-g.rkL5&4|,,MBD2GVfDVr8uYRC;`');
define('LOGGED_IN_KEY',    '~^`d&DPu@wF5r:zgguE5yokyC+#-Faq=%|([i9fk%-/oXR5/a-RhM2]R<S#~-&5f');
define('NONCE_KEY',        '[Gj|B*6M,Yb6IqaJWt1QA[F2euT3v{: F6SH@TO`_3f+7?Tq{Z#KYgAtn6Ie6Ck!');
define('AUTH_SALT',        '-&n>Z=WZ:<}cRo^<_zZi^4bE=xV52O5]Zn1O0Gw5Jek5U|-4U}H>-!L!5+`ki7o@');
define('SECURE_AUTH_SALT', ')@4dQ?-?v 9Zo]+]KS$%;_$QN4J|E5(C7ad%ZgS#>^{sXQ,mA?+7@2gpSv^k`NbN');
define('LOGGED_IN_SALT',   'pwFb-}b|7np7X|<*9S&`/mYE{JV+Fa[Y$D11[QsA>Qs4$b#2[:|681^S=+QECPVu');
define('NONCE_SALT',       'GU(FHqx?=[JjY-?!-F4DRHXPMuK&.C^LZlbB/A$exaei`11o3&=(u@2Zkj6a4ut(');

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
