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

require 'psource/psource-plugin-update/psource-plugin-updater.php';
$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://n3rds.work//wp-update-server/?action=get_metadata&slug=upfront-shortcodes', 
	__FILE__, 
	'upfront-shortcodes' 
);

define( 'SU_PLUGIN_FILE', __FILE__ );
define( 'SU_PLUGIN_VERSION', '1.0.7' );

require_once dirname( __FILE__ ) . '/plugin.php';
