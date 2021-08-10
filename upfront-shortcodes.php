<?php
/**
 * Plugin Name: UpFront Shortcodes Plugin
 * Plugin URI: https://nerds.work/
 * Version: 1.0.7
 * Author: WMS N@W
 * Author URI: https://n3rds.work
 * Description: Eine umfassende Sammlung visueller Komponenten für das UpFront-Theme
 * Text Domain: upfront-shortcodes
 * License: GPLv3
 * Requires PHP: 5.3
 * Requires at least: 4.6
 * Tested up to: 5.7
 */
require 'vendor/psource-plugin-update/plugin-update-checker.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=upfront-shortcodes', 
	__FILE__, 
	'upfront-shortcodes' 
);
/**
 * Define plugin constants.
 */
define( 'SU_PLUGIN_FILE', __FILE__ );
define( 'SU_PLUGIN_VERSION', '1.0.7' );

/**
 * Load dependencies.
 */
require_once 'inc/core/assets.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';

/**
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 */
function activate_upfront_shortcodes() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-upfront-shortcodes-activator.php';

	UpFront_Shortcodes_Activator::activate();

}

register_activation_hook( __FILE__, 'activate_upfront_shortcodes' );

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
function run_upfront_shortcodes() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-upfront-shortcodes.php';

	$plugin = new UpFront_Shortcodes( __FILE__, SU_PLUGIN_VERSION, 'upfront-shortcodes-' );

	do_action( 'su/ready' );

}

run_upfront_shortcodes();

/**
 * Retrieves instance of the main plugin class.
 *
 * @since  5.0.4
 */
function upfront_shortcodes() {
	return UpFront_Shortcodes::get_instance();
}
