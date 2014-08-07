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
define('DB_NAME', 'squerb_wordpress');

/** MySQL database username */
define('DB_USER', 'squerb');

/** MySQL database password */
define('DB_PASSWORD', 'squerb');

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
define('AUTH_KEY',         '$jN ,H9^>y>|IFI-gm =m}1,^EsUU>JN?kl,|#g(.{=$x6#E<Uh6(+cZPdqUb4!_');
define('SECURE_AUTH_KEY',  'L|Yb$~X2>2v;aLo9R}H6Nqe+:,6CL+tv*aP*X:U[)n!/i0)Eb(6-wP7(_Qg7HrR:');
define('LOGGED_IN_KEY',    '+n:mo-e<}2]Y3j~xL  T72{&<AF<VdZJ{zYJj[#JX5Cx{aJ!XUy^I,q<9%4v{OmG');
define('NONCE_KEY',        'EGs`:|{|v=Q#vtSZKJydY:#*e2WxQtTi!(ON2N8rH@;!6I_VEamK<EED7u?+|I3<');
define('AUTH_SALT',        '+I3Z}:?7.<Zq%*9e#7(-!AW^F:@6N:v}`YuC+v4):+i%s9 *;=E:<|zDU<#]`.5k');
define('SECURE_AUTH_SALT', '^g{@,i[$LZ| Oi=ZQ(k*eJ)nh@/ OKL+moXTr1<NA.m&oj.Y`h8l@80$(wz01e87');
define('LOGGED_IN_SALT',   'fXS`E74{z[0^0/x~Ef|}dfC@8V/-N;ZYl+6Gmp-zkTgHnn=]8xV6w_?+nI}~c0PV');
define('NONCE_SALT',       'D~*=7enA2,K>%CXW+_z4.-I-K=|^3%k=%Imn&{PTPL/&y@[*&Oo|fUE=uS_R`Gc=');

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
