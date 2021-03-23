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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LSrQBW1RgLBTUJ5FHWEYDd7Nl8rHfB8cwDthKwtcOih/I631GOLL5dLqhTgu38SBCLBdInMOye/MAvYPthNQUg==');
define('SECURE_AUTH_KEY',  'DQTZzl35BMrlHhTsGG9F0RvJU0v4gl3EYRdzhQjxtaV9FCa16jA80uVvzxLIGp4iCYm2DZedRq/tiwWCC2yzdw==');
define('LOGGED_IN_KEY',    '6N2decZtripa4huIf4qr/sqD1IkZtD1fllHfsz1f9EtfZbt/VrRUC7QL9mVl8fKub4wrOQKrhZ+JmDG4RyZ89g==');
define('NONCE_KEY',        '1beTua4tH5KKCgqNZ2pkohrhH7FftVl5mIIf+GrTy9pTrew7EXNmNYldVM4p5UIV7N0MXr9q8nXQFkENlG98mw==');
define('AUTH_SALT',        '/8XDpqug5gbjrTX2NwSR5FTTP2IBkBS3fhwCHSg7FfXypWofcDTbgNVpHCy4MY0LG08NKi4hjlFXSC52VhqB+w==');
define('SECURE_AUTH_SALT', 'IHCvlcDDMynp6ZTOhM8vVK7O/kmw4cO7ezHpk2mrPxvwQgw2bzBFhmkuB8eNgdvgiNUzVggcQwo7MdvvcKQ+GA==');
define('LOGGED_IN_SALT',   'CdOjYgESidj/ATcNLR5UWH8q/uVPziBN6tipvybXqVn6QFNBX1KjvmzH5/ys9iWX+bC9T8clMJ1v27L1m1rfqA==');
define('NONCE_SALT',       'ZQrmILyBnKKdFJ6Cx9qPaimwwf09pAAGsTiu0ARynohtWVubtMTuP4Ow7SQpP8j9OsUHtOVL5nDC4tnlbBbO9w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
