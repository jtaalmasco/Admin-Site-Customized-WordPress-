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

define('DB_NAME', 'baiyun888');



/** MySQL database username */

define('DB_USER', 'root');



/** MySQL database password */

define('DB_PASSWORD', '');



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

define('AUTH_KEY',         '68hq <b6yN)tgCgC,K,E`3^0MtWJjV?+;}j&!r?/T&bx R X;aPvK^FbYn[A}LUy');

define('SECURE_AUTH_KEY',  'xGg`%AlUf|KP*r`!3*MUH^q`uy;kdV[nmZj?a5-KOfb=rY#t/v`]!A|l`%ccBJA7');

define('LOGGED_IN_KEY',    'Ha2b*gFZW%wryBK:z7u=~o[P{;BcKH0}aDT,hVFwM06s;38l S{(dc!;#QF<@h|(');

define('NONCE_KEY',        'pjxjWcj3aO=9lR7P6sN#<0e3kJRlZ,2!)Hj`q &pLqHGvO#W[= XM|9CUYUm^WCe');

define('AUTH_SALT',        'H?hL.0)q!vLUyBI>:o`dWFAiS,APU0{09dcOp49M&=MiYfrD/D8grm/^FtujJ~iX');

define('SECURE_AUTH_SALT', ':CsT.Hn$u7:vV;=7Q/IqQ[VrqD?h|0;~YU-t9/m>-0d;:@n7T4(9CTy<AHeddkQ^');

define('LOGGED_IN_SALT',   '3ie(~R{st@ <K2{  B32 1m<j,PZd|9#AD1wT]P}yCT=Z823zL?y4c+Gy0&NXMrF');

define('NONCE_SALT',       ']-uqM+QVI6DW,-b!/XnnHty*Zo[mv+7wDw5S}) #d=9_y,zr4|<7ce:g,&@UJMuK');



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

define('WP_DEBUG', true);



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

