<?php
/**
 * Plugin Name: PSOURCE Shortcodes
 * Plugin URI: https://cp-psource.github.io/upfront-shortcodes/
 * Version: 1.0.1
 * Author: PSOURCE
 * Author URI: https://github.com/cp-psource
 * Description: A comprehensive collection of visual components for Padma and UpFront
 * Text Domain: psource-shortcodes
 * Domain Path: /languages
 * License: GPLv3
 */

/**
 * @@@@@@@@@@@@@@@@@ PS UPDATER 1.3 @@@@@@@@@@@
 **/
require 'psource/psource-plugin-update/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;
 
$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cp-psource/psource-shortcodes',
	__FILE__,
	'psource-shortcodes'
);
 
//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');

/**
 * @@@@@@@@@@@@@@@@@ ENDE PS UPDATER 1.3 @@@@@@@@@@@
 **/

/**
 * Define plugin constants.
 */
define( 'SU_PLUGIN_FILE',    __FILE__ );
define( 'SU_PLUGIN_VERSION', '1.0.1'  );
define( 'SU_ENABLE_CACHE',   false    );

/**
 * Load dependencies.
 */
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
require_once 'inc/core/shortcodes.php';
require_once 'inc/core/tools.php';
require_once 'inc/core/data.php';
require_once 'inc/core/generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';

/**
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 */
function activate_psource_shortcodes() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-psource-shortcodes-activator.php';

	PSOURCE_Shortcodes_Activator::activate();

}

register_activation_hook( __FILE__, 'activate_psource_shortcodes' );

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
function run_psource_shortcodes() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-psource-shortcodes.php';

	$plugin = new PSOURCE_Shortcodes( __FILE__, '1.0.1' );

}

run_psource_shortcodes();

/**
 * Finishes execution of the plugin.
 *
 * @since 5.0.2
 */
function shutdown_psource_shortcodes() {
	do_action( 'su/ready' );
}

add_action( 'plugins_loaded', 'shutdown_psource_shortcodes' );
