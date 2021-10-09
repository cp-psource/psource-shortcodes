<?php

/**
 * The Mehr UpFront menu component.
 *
 * @since        1.0.7
 *
 * @package      UpFront_Shortcodes
 * @subpackage   UpFront_Shortcodes/admin
 */
final class UpFront_Shortcodes_Admin_Addons extends UpFront_Shortcodes_Admin {

	/**
	 * Add menu page.
	 *
	 * @since   1.0.7
	 */
	public function add_menu_pages() {

		/**
		 * Submenu: Mehr UpFront
		 * admin.php?page=upfront-shortcodes-addons
		 */
		$this->add_submenu_page(
			rtrim( $this->plugin_prefix, '-_' ),
			__( 'Mehr UpFront', 'upfront-shortcodes' ),
			sprintf(
				'<span style="color:#2afd39">&#9733; %s</span>',
				__( 'Mehr UpFront', 'upfront-shortcodes' )
			),
			$this->get_capability(),
			$this->plugin_prefix . 'addons',
			array( $this, 'the_menu_page' )
		);

	}


	/**
	 * Add help tabs and set help sidebar at Mehr UpFront page.
	 *
	 * @since  1.0.7
	 * @param WP_Screen $screen WP_Screen instance.
	 */
	public function add_help_tabs( $screen ) {

		if ( ! $this->is_component_page() ) {
			return;
		}

		$screen->add_help_tab(
			array(
				'id'      => 'upfront-shortcodes-addons',
				'title'   => __( 'Mehr UpFront', 'upfront-shortcodes' ),
				'content' => $this->get_template( 'admin/partials/help/addons' ),
			)
		);

		$screen->set_help_sidebar( $this->get_template( 'admin/partials/help/sidebar' ) );

	}


	/**
	 * Enqueue JavaScript(s) and Stylesheet(s) for the component.
	 *
	 * @since   1.0.7
	 */
	public function enqueue_scripts() {

		if ( ! $this->is_component_page() ) {
			return;
		}

		wp_enqueue_style(
			'upfront-shortcodes-admin',
			plugins_url( 'css/admin.css', __FILE__ ),
			false,
			filemtime( plugin_dir_path( __FILE__ ) . 'css/admin.css' )
		);

	}

	/**
	 * Retrieve the collection of plugin add-ons.
	 *
	 * @since    1.0.7
	 * @access   private
	 * @return  array The plugin add-ons collection.
	 */
	public function get_addons() {

		$addons = (array) su_get_config( 'addons', array() );

		foreach ( $addons as $index => $addon ) {

			$addon_id                  = sanitize_key( $addons[ $index ]['id'] );
			$addons[ $index ]['image'] = plugins_url( "images/addons/{$addon_id}.png", __FILE__ );

		}

		return $addons;

	}

	public function get_addon_permalink( $addon ) {

		$utm = array( 'admin-menu', 'add-ons', 'wp-dashboard' );

		// phpcs:disable
		if ( isset( $_GET['from-generator'] ) ) {
			$utm[0] = 'generator';
		}
		// phpcs:enable

		return su_get_utm_link( $addon['permalink'], $utm );

	}

}
