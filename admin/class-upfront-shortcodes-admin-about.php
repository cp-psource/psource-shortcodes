<?php

final class UpFront_Shortcodes_Admin_About extends UpFront_Shortcodes_Admin {

	public function add_menu_pages() {

		/**
		 * Submenu: PSOURCE
		 * admin.php?page=upfront-shortcodes
		 */
		$this->add_submenu_page(
			rtrim( $this->plugin_prefix, '-_' ),
			__( 'PSOURCE', 'upfront-shortcodes' ),
			__( 'PSOURCE', 'upfront-shortcodes' ),
			$this->get_capability(),
			rtrim( $this->plugin_prefix, '-_' ),
			array( $this, 'the_menu_page' )
		);

	}

	public function the_menu_page() {
		$this->the_template( 'admin/partials/pages/about' );
	}

	public function enqueue_scripts() {

		if ( ! $this->is_component_page() ) {
			return;
		}

		wp_enqueue_script(
			'vimeo',
			'https://player.vimeo.com/api/player.js',
			array(),
			'2.15.0',
			true
		);

		wp_enqueue_script(
			'upfront-shortcodes-admin-about',
			plugins_url( 'js/about/index.js', __FILE__ ),
			array( 'vimeo' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'js/about/index.js' ),
			true
		);

		wp_enqueue_style(
			'upfront-shortcodes-admin',
			plugins_url( 'css/admin.css', __FILE__ ),
			false,
			filemtime( plugin_dir_path( __FILE__ ) . 'css/admin.css' )
		);

	}

	public function plugin_action_links( $links ) {

		array_unshift(
			$links,
			sprintf(
				'<a href="%s">%s</a>',
				esc_attr( $this->get_component_url() ),
				esc_html( __( 'PSOURCE', 'upfront-shortcodes' ) )
			)
		);

		return $links;

	}

}
