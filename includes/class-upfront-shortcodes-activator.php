<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since        1.0.7
 * @package      UpFront_Shortcodes
 * @subpackage   UpFront_Shortcodes/includes
 */
class UpFront_Shortcodes_Activator {

	private static $required_php;
	private static $required_wp;

	/**
	 * Plugin activation.
	 *
	 * @since    1.0.7
	 */
	public static function activate() {

		self::$required_php = '5.3';
		self::$required_wp  = '4.5';

		self::check_php_version();
		self::check_wp_version();
		self::setup_defaults();

	}

	/**
	 * Check PHP version.
	 *
	 * @access  private
	 * @since   1.0.7
	 */
	private static function check_php_version() {

		$current = phpversion();

		if ( version_compare( $current, self::$required_php, '>=' ) ) {
			return;
		}

		$message = sprintf(
			// Translators: %1$s - required version number, %2$s - current version number
			__( 'UpFront Shortcodes ist nicht aktiviert, da PHP-Version %1$s (oder höher) erforderlich ist. Du hast Version %2$s.', 'upfront-shortcodes' ),
			self::$required_php,
			$current
		);

		die( esc_html( $message ) );

	}

	/**
	 * Check WordPress version.
	 *
	 * @access  private
	 * @since   1.0.7
	 */
	private static function check_wp_version() {

		$current = get_bloginfo( 'version' );

		if ( version_compare( $current, self::$required_wp, '>=' ) ) {
			return;
		}

		$message = sprintf(
			// Translators: %1$s - required version number, %2$s - current version number
			__( 'UpFront Shortcodes ist nicht aktiviert, da für WordPress die Version %1$s (oder höher) erforderlich ist. Du hast Version %2$s.', 'upfront-shortcodes' ),
			self::$required_wp,
			$current
		);

		die( esc_html( $message ) );

	}

	/**
	 * Setup plugin's default settings.
	 *
	 * @access  private
	 * @since   1.0.7
	 */
	private static function setup_defaults() {

		$defaults = su_get_config( 'default-settings' );

		foreach ( $defaults as $option => $value ) {

			if ( get_option( $option, 0 ) === 0 ) {
				add_option( $option, $value );
			}

		}

	}

}
