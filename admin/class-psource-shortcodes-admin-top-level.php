<?php

/**
 * The Shortcodes menu component.
 *
 * @since        1.0.0
 *
 * @package      PSOURCE_Shortcodes
 * @subpackage   PSOURCE_Shortcodes/admin
 */
final class PSOURCE_Shortcodes_Admin_Top_Level extends PSOURCE_Shortcodes_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since  1.0.0
	 * @param string  $plugin_file    The path of the main plugin file
	 * @param string  $plugin_version The current version of the plugin
	 */
	public function __construct( $plugin_file, $plugin_version ) {
		parent::__construct( $plugin_file, $plugin_version );
	}


	/**
	 * Add menu page
	 *
	 * @since   1.0.0
	 */
	public function admin_menu() {

		// SVG icon (base64-encoded)
		$icon = apply_filters( 'su/admin/icon', 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGwtcnVsZT0iZXZlbm9kZCIgc3Ryb2tlLW1pdGVybGltaXQ9IjEuNDEiIHZpZXdCb3g9IjAgMCAyMCAyMCIgY2xpcC1ydWxlPSJldmVub2RkIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBmaWxsPSIjZjBmNWZhIiBmaWxsLXJ1bGU9Im5vbnplcm8iIGQ9Ik04LjQ4IDIuNzV2Mi41SDUuMjV2OS41aDMuMjN2Mi41SDIuNzVWMi43NWg1Ljczem05LjI3IDE0LjVoLTUuNzN2LTIuNWgzLjIzdi05LjVoLTMuMjN2LTIuNWg1LjczdjE0LjV6Ii8+PC9zdmc+' );

		/**
		 * Top-level menu: Shortcodes
		 * admin.php?page=psource-shortcodes
		 */
		$this->add_menu_page(
			__( 'PSOURCE Shortcodes', 'psource-shortcodes' ),
			__( 'Shortcodes', 'psource-shortcodes' ),
			$this->get_capability(),
			'psource-shortcodes',
			'__return_false',
			$icon,
			'80.11'
		);

	}

}
