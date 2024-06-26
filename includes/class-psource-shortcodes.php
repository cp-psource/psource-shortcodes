<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization and hooks.
 *
 * @since        1.0.0
 * @package      PSOURCE_Shortcodes
 * @subpackage   PSOURCE_Shortcodes/includes
 */
class PSOURCE_Shortcodes {

	/**
	 * The path to the main plugin file.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string      $plugin_file   The path to the main plugin file.
	 */
	private $plugin_file;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string      $plugin_version   The current version of the plugin.
	 */
	private $plugin_version;

	/**
	 * The path to the plugin folder.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string      $plugin_path   The path to the plugin folder.
	 */
	private $plugin_path;

	/**
	 * The plugin text domain.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string      $textdomain   The plugin text domain.
	 */
	private $textdomain;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since   1.0.0
	 * @param string  $plugin_file    The path to the main plugin file.
	 * @param string  $plugin_version The current version of the plugin.
	 */
	public function __construct( $plugin_file, $plugin_version ) {

		$this->plugin_file    = $plugin_file;
		$this->plugin_version = $plugin_version;
		$this->plugin_path    = plugin_dir_path( $plugin_file );
		$this->textdomain     = 'psource-shortcodes';

		$this->load_dependencies();
		$this->define_admin_hooks();

	}

	/**
	 * Load the required dependencies for the plugin.
	 *
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for plugin upgrades.
		 */
		//require_once $this->plugin_path . 'includes/class-psource-shortcodes-upgrade.php';

		/**
		 * Classes responsible for defining admin menus.
		 */
		require_once $this->plugin_path . 'admin/class-psource-shortcodes-admin.php';
		require_once $this->plugin_path . 'admin/class-psource-shortcodes-admin-top-level.php';
		require_once $this->plugin_path . 'admin/class-psource-shortcodes-admin-shortcodes.php';
		require_once $this->plugin_path . 'admin/class-psource-shortcodes-admin-settings.php';

	}

	/**
	 * Register all of the hooks related to the admin area functionality of the
	 * plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		/**
		 * Run upgrades.
		 */
		//$upgrade = new PSOURCE_Shortcodes_Upgrade( $this->plugin_file, $this->plugin_version );

		//add_action( 'admin_init', array( $upgrade, 'maybe_upgrade' ) );


		/**
		 * Top-level menu: Shortcodes
		 * admin.php?page=psource-shortcodes
		 */
		$top_level = new PSOURCE_Shortcodes_Admin_Top_Level( $this->plugin_file, $this->plugin_version );

		add_action( 'admin_menu', array( $top_level, 'admin_menu' ), 5 );


		/**
		 * Submenu: Available shortcodes
		 * admin.php?page=psource-shortcodes
		 */
		$shortcodes = new PSOURCE_Shortcodes_Admin_Shortcodes( $this->plugin_file, $this->plugin_version );

		add_action( 'admin_menu',            array( $shortcodes, 'admin_menu' ), 5   );
		add_action( 'current_screen',        array( $shortcodes, 'add_help_tab' )    );
		add_action( 'admin_enqueue_scripts', array( $shortcodes, 'enqueue_scripts' ) );


		/**
		 * Submenu: Settings
		 * admin.php?page=psource-shortcodes-settings
		 */
		$settings = new PSOURCE_Shortcodes_Admin_Settings( $this->plugin_file, $this->plugin_version );

		add_action( 'admin_menu',     array( $settings, 'admin_menu' ), 20    );
		add_action( 'admin_init',     array( $settings, 'register_settings' ) );
		add_action( 'current_screen', array( $settings, 'add_help_tab' )      );


	}

}
