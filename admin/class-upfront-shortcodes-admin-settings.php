<?php

/**
 * The Settings menu component.
 *
 * @since        1.0.0
 *
 * @package      UpFront_Shortcodes
 * @subpackage   UpFront_Shortcodes/admin
 */
final class UpFront_Shortcodes_Admin_Settings extends UpFront_Shortcodes_Admin {

	/**
	 * The plugin settings data.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array     $plugin_settings   The plugin settings data.
	 */
	private $plugin_settings;

	/**
	 * Default values for a single setting.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array     $setting_defaults   Default values for a single setting.
	 */
	private $setting_defaults;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since  1.0.0
	 * @param string  $plugin_file    The path of the main plugin file
	 * @param string  $plugin_version The current version of the plugin
	 */
	public function __construct( $plugin_file, $plugin_version, $plugin_prefix ) {

		parent::__construct( $plugin_file, $plugin_version, $plugin_prefix );

		$this->plugin_settings  = array();
		$this->setting_defaults = array(
			'id'          => '',
			'title'       => '',
			'type'        => 'text',
			'description' => '',
			'page'        => $this->plugin_prefix . 'settings',
			'section'     => $this->plugin_prefix . 'general',
			'group'       => rtrim( $this->plugin_prefix, '-_' ),
			'callback'    => array( $this, 'the_settings_field' ),
			'sanitize'    => 'sanitize_text_field',
		);

	}

	/**
	 * Add menu page.
	 *
	 * @since   1.0.0
	 */
	public function add_menu_pages() {

		/**
		 * Submenu: Settings
		 * admin.php?page=upfront-shortcodes-settings
		 */
		$this->add_submenu_page(
			rtrim( $this->plugin_prefix, '-_' ),
			__( 'Einstellungen', 'upfront-shortcodes' ),
			__( 'Einstellungen', 'upfront-shortcodes' ),
			$this->get_capability(),
			$this->plugin_prefix . 'settings',
			array( $this, 'the_menu_page' )
		);

	}

	/**
	 * Register plugin settings.
	 *
	 * @since  1.0.0
	 */
	public function add_settings() {

		add_settings_section(
			$this->plugin_prefix . 'general',
			__( 'Allgemeine Einstellungen', 'upfront-shortcodes' ),
			array( $this, 'the_settings_section' ),
			$this->plugin_prefix . 'settings'
		);

		add_settings_section(
			$this->plugin_prefix . 'advanced',
			null,
			array( $this, 'the_settings_section' ),
			$this->plugin_prefix . 'advanced-settings'
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
	 * Enqueue JavaScript(s) and Stylesheet(s) for the component.
	 *
	 * @since   1.0.0
	 */
	public function enqueue_scripts() {

		if ( ! $this->is_component_page() ) {
			return;
		}

		if ( function_exists( 'wp_enqueue_code_editor' ) ) {
			wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
		}

		wp_enqueue_style(
			'upfront-shortcodes-admin-settings',
			plugins_url( 'css/settings.css', __FILE__ ),
			array( 'su-icons' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'css/settings.css' )
		);

	}

	/**
	 * Add help tabs and set help sidebar at Add-ons page.
	 *
	 * @since  1.0.0
	 * @param WP_Screen $screen WP_Screen instance.
	 */
	public function add_help_tabs( $screen ) {

		if ( ! $this->is_component_page() ) {
			return;
		}

		$screen->add_help_tab(
			array(
				'id'      => 'upfront-shortcodes-general',
				'title'   => __( 'Allgemeine Einstellungen', 'upfront-shortcodes' ),
				'content' => $this->get_template( 'admin/partials/help/settings' ),
			)
		);

		$screen->set_help_sidebar( $this->get_template( 'admin/partials/help/sidebar' ) );

	}

	/**
	 * Filter to add action links at plugins screen.
	 *
	 * @since 5.0.8
	 * @param array $links Default links.
	 */
	public function add_action_links( $links ) {

		$plugin_links = array(
			sprintf(
				'<a href="%s">%s</a>',
				esc_attr( $this->get_component_url() ),
				esc_html( __( 'Einstellungen', 'upfront-shortcodes' ) )
			),
		);

		return array_merge( $plugin_links, $links );

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

			/**
			 * General settings
			 */

			$this->plugin_settings[] = array(
				'id'          => 'su_option_custom-css',
				'type'        => 'css',
				'sanitize'    => 'wp_strip_all_tags',
				'title'       => __( 'Benutzerdefinierter CSS-Code', 'upfront-shortcodes' ),
				'description' => __( 'In diesem Feld kannst Du Deinen benutzerdefinierten CSS-Code für Shortcodes schreiben. Diese Stile haben im Vergleich zu Originalstilen von Shortcodes eine höhere Priorität. Du kannst Variablen in Deinem CSS-Code verwenden. Diese Variablen werden durch entsprechende Werte ersetzt.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_supported_blocks',
				'type'        => 'checkbox-group',
				'sanitize'    => array( $this, 'sanitize_checkbox_group' ),
				'title'       => __( 'Unterstützte Blöcke', 'upfront-shortcodes' ),
				'description' => __( 'Aktiviere die Schaltfläche "Shortcode einfügen" in ausgewählten Blöcken', 'upfront-shortcodes' ),
				'options'     => su_get_config( 'supported-blocks' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_enable_shortcodes_in',
				'type'        => 'checkbox-group',
				'sanitize'    => array( $this, 'sanitize_checkbox_group' ),
				'title'       => __( 'Aktiviere Shortcodes in', 'upfront-shortcodes' ),
				'description' => __( 'Mit dieser Option kannst Du Shortcodes an Stellen aktivieren, an denen sie standardmäßig deaktiviert sind', 'upfront-shortcodes' ),
				'options'     => array(
					'term_description' => __( 'Begriffsbeschreibungen (Kategorien, Tags, benutzerdefinierte Taxonomien)', 'upfront-shortcodes' ),
					'widget_text'      => __( 'Text-Widgets', 'upfront-shortcodes' ),
				),
			);

			/**
			 * Advanced settings
			 */

			$this->plugin_settings[] = array(
				'id'          => 'su_option_prefix',
				'sanitize'    => array( $this, 'sanitize_prefix' ),
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Shortcodes-Präfix', 'upfront-shortcodes' ),
				'description' => __( 'Dieses Präfix wird in Shortcode-Namen verwendet. Beispiel: Lege das Präfix <code>MY_</code> fest, und die Shortcodes sehen wie <code>[MY_button]</code> aus. Bitte beachte, dass diese Einstellung keine zuvor eingefügten Shortcodes ändert. Ändere diese Einstellung sehr sorgfältig.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_custom-formatting',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Benutzerdefinierte Formatierung', 'upfront-shortcodes' ),
				'description' => __( 'Aktiviere diese Option, wenn Probleme bei der Formatierung verschachtelter Shortcodes auftreten.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_skip',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Standardeinstellungen überspringen', 'upfront-shortcodes' ),
				'description' => __( 'Aktiviere diese Option, wenn der eingefügte Shortcode keine Einstellungen enthalten soll, die von Dir nicht geändert wurden. Infolgedessen sind eingefügte Shortcodes viel kürzer.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_generator_access',
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Erforderliche Benutzerfähigkeit', 'upfront-shortcodes' ),
				'description' => __( 'Ein Benutzer muss über diese Funktion verfügen, um die Schaltfläche "Shortcode einfügen" verwenden zu können. Ändere diesen Wert nicht, wenn Du seine Bedeutung nicht verstehst, da dies die Plugin-Sicherheit beeinträchtigen kann.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_hide_deprecated',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Veraltete Shortcodes ausblenden', 'upfront-shortcodes' ),
				'description' => __( 'Diese Option verbirgt alle veralteten Shortcodes im Fenster "Shortcode einfügen" und auf der Seite "Verfügbare Shortcodes". Versteckte Shortcodes funktionieren weiterhin.', 'upfront-shortcodes' ),
			);

			$this->plugin_settings[] = array(
				'id'          => 'su_option_do_nested_shortcodes_alt',
				'type'        => 'checkbox',
				'sanitize'    => array( $this, 'sanitize_checkbox' ),
				'page'        => $this->plugin_prefix . 'advanced-settings',
				'group'       => $this->plugin_prefix . 'advanced-settings',
				'section'     => $this->plugin_prefix . 'advanced',
				'title'       => __( 'Alternativer Modus für verschachtelte Shortcodes', 'upfront-shortcodes' ),
				'description' => __( 'Diese Option aktiviert den alternativen (veralteten) Modus für verschachtelte Shortcodes.', 'upfront-shortcodes' ),
			);

		}

		return apply_filters( 'su/admin/settings', $this->plugin_settings );

	}

}
