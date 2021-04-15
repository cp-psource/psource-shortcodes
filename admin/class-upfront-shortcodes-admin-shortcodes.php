<?php

/**
 * The Available shortcodes menu component.
 *
 * @since        1.0.0
 *
 * @package      UpFront_Shortcodes
 * @subpackage   UpFront_Shortcodes/admin
 */
final class UpFront_Shortcodes_Admin_Shortcodes extends UpFront_Shortcodes_Admin {

	/**
	 * Add menu page.
	 *
	 * @since   1.0.0
	 */
	public function add_menu_pages() {

		/**
		 * Submenu: Available shortcodes
		 * admin.php?page=upfront-shortcodes
		 */
		$this->add_submenu_page(
			rtrim( $this->plugin_prefix, '-_' ),
			__( 'Verfügbare Shortcodes', 'upfront-shortcodes' ),
			__( 'Verfügbare Shortcodes', 'upfront-shortcodes' ),
			$this->get_capability(),
			rtrim( $this->plugin_prefix, '-_' ),
			array( $this, 'the_menu_page' )
		);

	}

	/**
	 * Display menu page.
	 *
	 * @since    5.0.8
	 * @return   string   Menu page markup.
	 */
	public function the_menu_page() {

		$shortcode = $this->get_current_shortcode();

		if ( ! $shortcode ) {
			return $this->the_template( 'admin/partials/pages/shortcodes-list' );
		}

		if ( isset( $shortcode['id'] ) ) {
			return $this->the_template( 'admin/partials/pages/shortcodes-single' );
		}

	}

	public function single_shortcode_page_content() {

		$shortcode = $this->get_current_shortcode();

		if (
			isset( $shortcode['as_callback'] ) &&
			is_callable( $shortcode['as_callback'] )
		) {
			return call_user_func( $shortcode['as_callback'], $shortcode );
		}

		$this->the_template(
			'admin/partials/pages/shortcodes-single-content',
			$shortcode
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
				'id'      => 'upfront-shortcodes-shortcodes',
				'title'   => __( 'UpFront Shortcodes', 'upfront-shortcodes' ),
				'content' => $this->get_template( 'admin/partials/help/shortcodes' ),
			)
		);

		$screen->set_help_sidebar( $this->get_template( 'admin/partials/help/sidebar' ) );

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

		wp_enqueue_style(
			'upfront-shortcodes-admin-available-shortcodes',
			plugins_url( 'css/available-shortcodes.css', __FILE__ ),
			array( 'su-icons' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'css/available-shortcodes.css' )
		);

	}

	/**
	 * Helper function to create shortcode code with default settings.
	 *
	 * Example output: "[su_button color="#ff0000" ... ] Click me [/su_button]".
	 *
	 * @param mixed   $args Array with settings
	 * @since  1.0.0
	 * @return string      Shortcode code
	 */
	public function get_shortcode_code( $args ) {

		$defaults = array(
			'id'     => '',
			'number' => 1,
			'nested' => false,
		);

		// Accept shortcode ID as a string
		if ( is_string( $args ) ) {
			$args = array( 'id' => $args );
		}

		$args = wp_parse_args( $args, $defaults );

		// Check shortcode ID
		if ( empty( $args['id'] ) ) {
			return '';
		}

		// Get shortcode data
		$shortcode = su_get_shortcode( $args['id'] );

		// Prepare shortcode prefix
		$prefix = get_option( 'su_option_prefix' );

		// Prepare attributes container
		$attributes = '';

		// Loop through attributes
		foreach ( $shortcode['atts'] as $attr_id => $attribute ) {

			// Skip hidden attributes
			if ( isset( $attribute['hidden'] ) && $attribute['hidden'] ) {
				continue;
			}

			// Add attribute
			$attributes .= sprintf( ' %s="%s"', esc_html( $attr_id ), esc_attr( $attribute['default'] ) );

		}

		// Create opening tag with attributes
		$output = "[{$prefix}{$args['id']}{$attributes}]";

		// Indent nested shortcodes
		if ( $args['nested'] ) {
			$output = "\t" . $output;
		}

		// Insert shortcode content
		if ( isset( $shortcode['content'] ) ) {

			if ( is_string( $shortcode['content'] ) ) {
				$output .= $shortcode['content'];
			}

			// Create complex content
			elseif ( is_array( $shortcode['content'] ) && $args['id'] !== $shortcode['content']['id'] ) {

					$shortcode['content']['nested'] = true;
					$output                        .= $this->get_shortcode_code( $shortcode['content'] );

			}

		}

		// Add closing tag
		if ( isset( $shortcode['type'] ) && $shortcode['type'] === 'wrap' ) {
			$output .= "[/{$prefix}{$args['id']}]";
		}

		// Repeat shortcode
		if ( $args['number'] > 1 ) {
			$output = implode( "\n", array_fill( 0, $args['number'], $output ) );
		}

		// Add line breaks around nested shortcodes
		if ( $args['nested'] ) {
			$output = "\n{$output}\n";
		}

		return $output;

	}

	/**
	 * Retrieve shortcodes data for shortcodes-list page.
	 *
	 * @since  1.0.0
	 * @return array  Shortcodes data.
	 */
	public function get_available_shortcodes() {

		$shortcodes = su_get_all_shortcodes();
		$available  = array();

		foreach ( $shortcodes as $id => $shortcode ) {

			if (
				get_option( 'su_option_hide_deprecated' ) &&
				isset( $shortcode['deprecated'] )
			) {
				continue;
			}

			if (
				isset( $shortcode['hidden'] ) ||
				isset( $shortcode['required_parent'] ) ||
				isset( $shortcode['required_sibling'] )
			) {
				continue;
			}

			if (
				'all' !== $this->get_current_group() &&
				isset( $shortcode['group'] ) &&
				! in_array(
					$this->get_current_group(),
					explode( ' ', $shortcode['group'] ),
					true
				)
			) {
				continue;
			}

			$available[ $id ] = $shortcode;

		}

		return $available;

	}

	/**
	 * Template tag to retrieve the shortcode data (depending on $_GET).
	 *
	 * @since  1.0.0
	 * @return mixed  Array with shortcode data, or FALSE if shortcode was not found.
	 */
	public function get_current_shortcode() {

		return isset( $_GET['shortcode'] )
			? su_get_shortcode( sanitize_key( $_GET['shortcode'] ) )
			: false;

	}

	/**
	 * Template tag to retrieve the current group.
	 *
	 * @since 1.0.0
	 * @return string Selected group ID.
	 */
	protected function get_current_group() {

		$default = 'all';

		if ( ! isset( $_GET['group'] ) ) {
			return $default;
		}

		$group = sanitize_key( $_GET['group'] );

		return in_array( $group, array_keys( su_get_config( 'groups' ) ), true )
			? $group
			: $default;

	}

	/**
	 * Retrieve the groups data.
	 *
	 * @since  1.0.0
	 * @return array  Array with groups data.
	 */
	public function get_groups() {

		$groups        = su_get_config( 'groups' );
		$groups['all'] = __( 'Alle Shortcodes', 'upfront-shortcodes' );

		foreach ( $groups as $id => $title ) {

			$groups[ $id ] = array(
				'id'     => $id,
				'url'    => add_query_arg( 'group', $id, $this->get_component_url() ),
				'title'  => $title,
				'active' => false,
			);

			if ( 'all' === $id ) {
				$groups[ $id ]['url'] = $this->get_component_url();
			}

			if ( $id === $this->get_current_group() ) {
				$groups[ $id ]['active'] = true;
			}

		}

		return $groups;

	}

	/**
	 * Template tag to retrieve the shortcode options.
	 *
	 * @since  1.0.0
	 * @return mixed  Array with shortcode data, or FALSE if shortcode was not found.
	 */
	public function get_single_shortcode_options() {

		$options   = array();
		$shortcode = $this->get_current_shortcode();

		if ( ! $shortcode || ! isset( $shortcode['atts'] ) ) {
			return $options;
		}

		$options[] = $shortcode;

		if ( isset( $shortcode['required_child'] ) ) {
			$child     = su_get_shortcode( $shortcode['required_child'] );
			$options[] = $child;
		}

		if ( isset( $shortcode['possible_sibling'] ) ) {
			$child     = su_get_shortcode( $shortcode['possible_sibling'] );
			$options[] = $child;
		}

		return $options;

	}

	/**
	 * This conditional tag checks if a singular shortcode is being displayed.
	 *
	 * @since  1.0.0
	 * @return boolean True on success, false on failure.
	 */
	public function is_single_shortcode_page() {
		return isset( $_GET['shortcode'] );
	}

	/**
	 * Retrieve the string with possible values of specified attribute.
	 *
	 * @since  1.0.0
	 * @param array   $args Attribute details.
	 * @return string       Possible values.
	 */
	public function get_possible_values( $args ) {

		$args = wp_parse_args(
			$args,
			array(
				'type'   => 'text',
				'values' => array(),
				'min'    => 0,
				'max'    => 1,
				'step'   => 1,
			)
		);

		$image_sources = array(
			'media: 1,2,3'       => __( 'Mediendatei-IDs', 'upfront-shortcodes' ),
			'posts: 1,2,3'       => __( 'Beitrag-IDs', 'upfront-shortcodes' ),
			'posts: recent'      => __( 'Kürzliche Beiträge', 'upfront-shortcodes' ),
			'taxonomy: book/3,5' => __( 'Taxonomie-Begriff Slug/Term-IDs', 'upfront-shortcodes' ),
		);

		$possible = array(
			'select'          => $this->implodef( '<br>', $args['values'], '%1$s (%2$s)' ),
			'color'           => __( '#HEX Farbe', 'upfront-shortcodes' ),
			'text'            => __( 'Beliebiger Textwert', 'upfront-shortcodes' ),
			'border'          => __( 'CSS Border Shorthand-Eigenschaft', 'upfront-shortcodes' ),
			'shadow'          => __( 'CSS-Box/Textschatten-Kurzschrift-Eigenschaft', 'upfront-shortcodes' ),
			'extra_css_class' => __( 'CSS-Klassennamen durch Leerzeichen getrennt', 'upfront-shortcodes' ),
			'post_type'       => __( 'Beitrag-Typ-Slug(s) durch Komma getrennt', 'upfront-shortcodes' ),
			'taxonomy'        => __( 'Taxonomie-Slug(s) durch Komma getrennt', 'upfront-shortcodes' ),
			'term'            => __( 'Begriff Slug(s) durch Komma getrennt', 'upfront-shortcodes' ),
			'upload'          => __( 'Die URL der hochgeladenen Datei', 'upfront-shortcodes' ),
			'bool'            => sprintf( __( '%1$s oder %2$s', 'upfront-shortcodes' ), 'yes', 'no' ),
			'number'          => sprintf( __( 'Nummer von %1$s bis %2$s', 'upfront-shortcodes' ), $args['min'], $args['max'] ),
			'slider'          => sprintf( __( 'Nummer von %1$s bis %2$s', 'upfront-shortcodes' ), $args['min'], $args['max'] ),
			'icon'            => sprintf( '%s. %s: <em>icon: star</em>, <em>http://example.com/icon.png</em>. <a href="https://forkaweso.me/Fork-Awesome/icons/" target="_blank">%s</a>.', __( 'Fork Awesome Symbolname (mit Präfix "icon:") oder Bild-URL', 'upfront-shortcodes' ), __( 'Beispiele', 'upfront-shortcodes' ), __( 'Siehe verfügbare Fork Awesome-Symbole', 'upfront-shortcodes' ) ),
			'image_source'    => $this->implodef( '<br>', $image_sources, '%1$s (%2$s)' ),
		);

		return isset( $possible[ $args['type'] ] ) ? $possible[ $args['type'] ] : '&mdash;';

	}

	/**
	 * Get default value of specified attribute.
	 *
	 * @since  1.0.0
	 * @param array   $args Attribute details.
	 * @return string       Default value.
	 */
	public function get_default_value( $args ) {

		if ( isset( $args['default'] ) && $args['default'] !== '' ) {
			return $args['default'];
		}

		return sprintf( '<p class="description">%s</p>', __( 'keine', 'upfront-shortcodes' ) );

	}

	/**
	 * Helper function to display the shortcode image.
	 *
	 * @since  1.0.0
	 * @param array   $shortcode Shortcode data.
	 * @return int               The size of shortcode image.
	 * @return bool              Display the result or not.
	 * @return string            The URL of shortcode image.
	 */
	public function shortcode_image( $shortcode, $size, $echo = true ) {

		$image = $this->plugin_url . 'admin/images/shortcodes/_default.svg';

		if ( isset( $shortcode['icon'] ) ) {
			$image = $shortcode['icon'];
		}

		if ( isset( $shortcode['image'] ) ) {
			$image = $shortcode['image'];
		}

		$font_size = $size - 20;

		$template = '
			<i class="sui sui-%1$s" style="
				display: block;
				width: %2$spx;
				height: %2$spx;
				line-height: %2$spx;
				font-size: %3$spx;
				text-align: center;
				color: #e0e5e6;
			"></i>';

		if ( strpos( $image, '/' ) !== false ) {
			$template = '<img src="%1$s" alt="" width="%2$s" height="%2$s">';
		}

		if ( $echo ) {
			printf( $template, $image, $size, $font_size );
		}

		return sprintf( $template, $image, $size, $font_size );

	}

	/**
	 * Remove unwanted markers from shortcode description.
	 *
	 * @since  1.0.0
	 * @param string  $description Original shortcode description.
	 * @return string              Clean shortcode description.
	 */
	public function get_shortcode_description( $description ) {
		return str_replace( array( '<b%value>', '</b>', '%su_skins_link%' ), '', $description );
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
				esc_html( __( 'Shortcodes', 'upfront-shortcodes' ) )
			),
		);

		return array_merge( $plugin_links, $links );

	}

	/**
	 * Helper to format output of implode function.
	 *
	 * Applies custom format to the every item of the array.
	 * Allows to output array keys as well as values.
	 *
	 * @since   1.0.0
	 *
	 * @param string  $glue    Glue for pieces.
	 * @param array   $pieces  Array with pieces.
	 * @param string  $pattern String pattern (%1$s will be replaced with item key, %2$s will be replaced with item value).
	 * @return  string         "Imploded" string.
	 */
	public function implodef( $glue, $pieces, $pattern ) {

		foreach ( $pieces as $key => $value ) {
			$pieces[ $key ] = sprintf( $pattern, $key, $value );
		}

		return implode( $glue, $pieces );

	}

}
