<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since        1.0.0
 * @package      PSOURCE_Shortcodes
 * @subpackage   PSOURCE_Shortcodes/includes
 */
class PSOURCE_Shortcodes_Activator {

	/**
	 * Plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::check_php_version();
		self::check_wp_version();
		self::setup_defaults();

	}

	/**
	 * Check PHP version.
	 *
	 * @access  private
	 * @since   1.0.0
	 */
	private static function check_php_version() {

		$required = '5.2';
		$current  = phpversion();

		if ( version_compare( $current, $required, '>=' ) ) {
			return;
		}

		$message = __( 'PSOURCE Shortcodes is not activated, because it requires PHP version %s (or higher). Current version of PHP is %s.', 'psource-shortcodes' );

		die( sprintf( $message, $required, $current ) );

	}

	/**
	 * Check WordPress version.
	 *
	 * @access  private
	 * @since   1.0.0
	 */
	private static function check_wp_version() {

		$required = '3.5';
		$current  = get_bloginfo( 'version' );

		if ( version_compare( $current, $required, '>=' ) ) {
			return;
		}

		$message = __( 'PSOURCE Shortcodes is not activated, because it requires WordPress version %s (or higher). Current version of WordPress is %s.', 'psource-shortcodes' );

		die( sprintf( $message, $required, $current ) );

	}

	/**
	 * Setup plugin's default settings.
	 *
	 * @access  private
	 * @since   1.0.0
	 */
	private static function setup_defaults() {

		$defaults = array(
			'su_option_custom-formatting' => 'on',
			'su_option_skip'              => 'on',
			'su_option_prefix'            => 'su_',
			'su_option_custom-css'        => '',
		);

		foreach ( $defaults as $option => $value ) {

			if ( get_option( $option, 0 ) !== 0 ) {
				continue;
			}

			update_option( $option, $value, false );

		}

	}

}
