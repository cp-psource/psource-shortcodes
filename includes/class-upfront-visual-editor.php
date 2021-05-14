<?php
/**
 * Runs VE compatibility.
  *
 * @since      1.0.0
 * @package    Upfront Shortcodes
 * @subpackage UpFront-shortcodes/includes
 * @author     WMS N@W <webmaster@n3rds.work>
 */

class UpFront_Advanced_VE {


	/**
	 * Constructor
	 */
	public function __construct() {
		return;
		/*
		add_action(
			'upfront_visual_editor_styles',
			function() {

				$path = plugin_dir_url( __FILE__ );
				$path = str_replace( 'includes/', '', $path );

				wp_register_style( 'upfront-advanced-ve-prism', $path . 'admin/css/prism.css', false, SU_PLUGIN_VERSION, 'all' );
				wp_enqueue_style( 'upfront-advanced-ve-prism' );

			}
		);

		add_action(
			'upfront_visual_editor_scripts',
			function() {

				$path = plugin_dir_url( __FILE__ );
				$path = str_replace( 'includes/', '', $path );

				wp_register_script( 'upfront-advanced-ve-prism', $path . 'admin/js/prism.js', array(), SU_PLUGIN_VERSION, true );
				wp_enqueue_script( 'upfront-advanced-ve-prism' );

				wp_register_script( 'upfront-advanced-ve-scripts', $path . 'admin/js/upfront-advanced-visual-editor.js', array( 'jquery' ), SU_PLUGIN_VERSION, true );
				wp_enqueue_script( 'upfront-advanced-ve-scripts' );

			},
			20,
			0
		);
		*/
	}


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function run_ve_hooks() {
		return;
		add_filter( 'upfront_developer_tab_hook_example', function( $default, $hook_name, $hook_params ) {

			$count_params = count( $hook_params['params'] );
			$params       = implode( ', ', $hook_params['params'] );
			$your_code    = '<br> /* Your awesome code goes here */ <br>';
			$code         = sprintf( 'add_action( \'%1$s\', function( %2$s ) {%3$s}, 10, %4$s );', $hook_name, $params, $your_code, $count_params );
			return $code;
		}, 10, 3 );
	}
}
