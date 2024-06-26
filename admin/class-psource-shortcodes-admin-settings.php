<?php

/**
 * The Settings menu component.
 *
 * @since        1.0.0
 *
 * @package      PSOURCE_Shortcodes
 * @subpackage   PSOURCE_Shortcodes/admin
 */
final class PSOURCE_Shortcodes_Admin_Settings extends PSOURCE_Shortcodes_Admin {

	public $setting_defaults;

	/**
	 * The plugin settings data.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array     $plugin_settings   The plugin settings data.
	 */
	private $plugin_settings;

	/**
	 * The slug of the settings page.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array     $settings_page   The slug of the settings page.
	 */
	private $settings_page;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since  1.0.0
	 * @param string  $plugin_file    The path of the main plugin file
	 * @param string  $plugin_version The current version of the plugin
	 */
	public function __construct( $plugin_file, $plugin_version ) {

		parent::__construct( $plugin_file, $plugin_version );

		$this->plugin_settings = array();
		$this->setting_defaults = array(
			'id'          => '',
			'title'       => '',
			'type'        => 'text',
			'description' => '',
			'page'        => 'psource-shortcodes-settings',
			'section'     => 'psource-shortcodes-general',
			'group'       => 'psource-shortcodes',
			'callback'    => array( $this, 'display_settings_field' ),
			'sanitize'    => 'sanitize_text_field',
		);

	}

	/**
	 * Add menu page.
	 *
	 * @since   1.0.0
	 */
	public function admin_menu() {

		/**
		 * Submenu: Settings
		 * admin.php?page=psource-shortcodes-settings
		 */
		$this->add_submenu_page(
			'psource-shortcodes',
			__( 'Settings', 'psource-shortcodes' ),
			__( 'Settings', 'psource-shortcodes' ),
			$this->get_capability(),
			'psource-shortcodes-settings',
			array( $this, 'the_menu_page' )
		);

	}

	/**
	 * Register plugin settings.
	 *
	 * @since  1.0.0
	 */
	public function register_settings() {

		/**
		 * Add default settings section.
		 */
		add_settings_section(
			'psource-shortcodes-general',
			__( 'General settings', 'psource-shortcodes' ),
			array( $this, 'display_settings_section' ),
			'psource-shortcodes-settings'
		);

		/**
		 * Register plugin settings.
		 */
		foreach ( $this->get_plugin_settings() as $setting ) {

			$setting = wp_parse_args( $setting, $this->setting_defaults );

			add_settings_field(
				$setting['id'],
				$setting['title'],
				$setting['callback'],
				$setting['page'],
				$setting['section'],
				$setting
			);

			register_setting(
				$setting['group'],
				$setting['id'],
				$setting['sanitize']
			);

		}

	}

	/**
	 * Display settings section.
	 *
	 * @param mixed   $args Settings section data.
	 * @since  1.0.0
	 */
	public function display_settings_section( $args ) {

		$section = str_replace( 'psource-shortcodes-', '', $args['id'] );

		$this->the_template( 'settings/sections/' . $section, $args );

	}

	/**
	 * Display settings field.
	 *
	 * @param mixed   $args The field data.
	 * @since  1.0.0
	 */
	public function display_settings_field( $args ) {
		$this->the_template( 'settings/fields/' . $args['type'], $args );
	}

	/**
	 * Add help tab and set help sidebar at Add-ons page.
	 *
	 * @since  1.0.0
	 * @param WP_Screen $screen WP_Screen instance.
	 */
	public function add_help_tab( $screen ) {

		if ( ! $this->is_component_page() ) {
			return;
		}

		$screen->add_help_tab( array(
				'id'      => 'psource-shortcodes-general',
				'title'   => __( 'General settings', 'psource-shortcodes' ),
				'content' => $this->get_template( 'help/settings' ),
			) );

		$screen->set_help_sidebar( $this->get_template( 'help/sidebar' ) );

	}

	/**
	 * Callback function to sanitize checkbox value.
	 *
	 * @since  1.0.0
	 * @param mixed   $value String 'on' or null.
	 * @return string        Sanitized checkbox value ('on' or empty string '').
	 */
	public function sanitize_checkbox( $value ) {

		$value = ( ! empty( $value ) && $value === 'on' ) ? 'on' : '';

		return $value;

	}

	/**
	 * Retrieve the plugin settings data.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @return  array The plugin settings data.
	 */
	protected function get_plugin_settings() {

		if ( empty( $this->plugin_settings ) ) {

			$this->plugin_settings[] = array(
				'id'          => 'su_option_custom-formatting',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'title'       => __( 'Custom formatting', 'psource-shortcodes' ),
				'description' => __( 'Enable this option if you face any problems with formatting of nested shortcodes.', 'psource-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_skip',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'title'       => __( 'Skip default settings', 'psource-shortcodes' ),
				'description' => __( 'Enable this option if you don\'t want the inserted shortcode to contain any settings that were not changed by you. As a result, inserted shortcodes will be much shorter.', 'psource-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_prefix',
				'sanitize'    => array( $this, 'sanitize_prefix' ),
				'title'       => __( 'Shortcodes prefix', 'psource-shortcodes' ),
				'description' => __( 'This prefix will be used in shortcode names. For example: set <code>MY_</code> prefix and shortcodes will look like <code>[MY_button]</code>. Please note that this setting does not change shortcodes that have been inserted earlier. Change this setting very carefully.', 'psource-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_custom-css',
				'type'        => 'css',
				'sanitize'    => 'wp_strip_all_tags',
				'title'       => __( 'Custom CSS code', 'psource-shortcodes' ),
				'description' => __( 'In this field you can write your custom CSS code for shortcodes. These styles will have higher priority compared to original styles of shortcodes. You can use variables in your CSS code. These variables will be replaced by respective values.', 'psource-shortcodes' ),
			);

		}

		return apply_filters( 'su/admin/settings', $this->plugin_settings );

	}

	/**
	 * Callback function to sanitize prefix value.
	 *
	 * @since  5.0.1
	 * @param string  $prefix Prefix value.
	 * @return string          Sanitized string.
	 * @see  https://developer.wordpress.org/reference/functions/add_shortcode/ Source of the RegExp.
	 */
	public function sanitize_prefix( $prefix ) {
		return preg_replace( '@[<>&/\[\]\x00-\x20="\']@', '', $prefix );
	}

}
