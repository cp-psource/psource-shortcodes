<?php

class UpFront_Shortcodes_Admin_Extra_Shortcodes {

	public function __construct() {}

	public function register_shortcodes() {

		if ( $this->is_extra_active() ) {
			return;
		}

		foreach ( $this->get_shortcodes() as $shortcode ) {

			su_add_shortcode(
				wp_parse_args(
					$shortcode,
					array(
						'group'              => 'extra',
						'image'              => $this->get_image_url( 'icon-available-shortcodes.png' ),
						'icon'               => $this->get_image_url( 'icon-generator.png' ),
						'desc'               => '',
						'callback'           => '__return_empty_string',
						'atts'               => array(),
						'generator_callback' => array( $this, 'generator_callback' ),
						'as_callback'        => array( $this, 'as_callback' ),
					)
				)
			);

		}

	}

	public function register_group( $groups ) {

		if ( ! $this->is_extra_active() ) {
			$groups['extra'] = _x( 'Extra Shortcodes', 'Custom shortcodes group name', 'upfront-shortcodes' );
		}

		return $groups;

	}

	public function generator_callback( $shortcode ) {
		// phpcs:disable
		echo $this->get_template( 'generator', $shortcode );
		// phpcs:enable
	}

	public function as_callback( $shortcode ) {
		// phpcs:disable
		echo $this->get_template( 'available-shortcodes', $shortcode );
		// phpcs:enable
	}

	public function get_image_url( $path ) {
		return plugin_dir_url( __FILE__ ) . 'images/extra/' . $path;
	}

	private function is_extra_active() {
		return did_action( 'su/extra/ready' );
	}

	private function get_shortcodes() {

		return array(
			array(
				'id'   => 'splash',
				'name' => __( 'Begrüßungsbildschirm', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'exit_popup',
				'name' => __( 'Verlassen PopUp', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'panel',
				'name' => __( 'Panel', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'photo_panel',
				'name' => __( 'Fotopanel', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'icon_panel',
				'name' => __( 'Symbolpanel', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'icon_text',
				'name' => __( 'Text mit Symbol', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'progress_pie',
				'name' => __( 'Fortschrittskuchen', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'progress_bar',
				'name' => __( 'Fortschrittsbalken', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'member',
				'name' => __( 'Mitglied', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'section',
				'name' => __( 'Abschnitt', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'pricing_table',
				'name' => __( 'Preistabelle', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'testimonial',
				'name' => __( 'Testimonial', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'icon',
				'name' => __( 'Symbol', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'content_slider',
				'name' => __( 'Inhaltsschieberegler', 'upfront-shortcodes' ),
			),
			array(
				'id'   => 'shadow',
				'name' => __( 'Schatten', 'upfront-shortcodes' ),
			),
		);

	}

	protected function get_template( $name = '', $data = array() ) {

		if ( preg_match( '/^(?!-)[a-z0-9-_]+(?<!-)(\/(?!-)[a-z0-9-_]+(?<!-))*$/', $name ) !== 1 ) {
			return '';
		}

		$file = plugin_dir_path( __FILE__ ) . 'partials/extra/' . $name . '.php';

		if ( ! file_exists( $file ) ) {
			return '';
		}

		ob_start();
		include $file;
		return ob_get_clean();

	}

}
