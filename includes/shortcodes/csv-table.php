<?php

su_add_shortcode(
	array(
		'id'       => 'csv_table',
		'callback' => 'su_shortcode_csv_table',
		'type'     => 'single',
		'name'     => __( 'CSV Table', 'upfront-shortcodes' ),
		'desc'     => __( 'Styled table from CSV file', 'upfront-shortcodes' ),
		'group'    => 'content',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/table.svg',
		'icon'     => 'table',
		'atts'     => array(
			'url'        => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'CSV file URL', 'upfront-shortcodes' ),
				'desc'    => __( 'The URL of a CSV file that will be displayed', 'upfront-shortcodes' ),
			),
			'delimiter'  => array(
				'type'    => 'text',
				'default' => ',',
				'name'    => __( 'Delimiter', 'upfront-shortcodes' ),
				'desc'    => __( 'Set the field delimiter (one character only)', 'upfront-shortcodes' ),
			),
			'header'     => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Display header', 'upfront-shortcodes' ),
				'desc'    => __( 'Display first row as table header', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Responsive', 'upfront-shortcodes' ),
				'desc'    => __( 'Add horizontal scrollbar if table width larger than page width', 'upfront-shortcodes' ),
			),
			'alternate'  => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Alternate row color', 'upfront-shortcodes' ),
				'desc'    => __( 'Enable to use alternative background color for even rows', 'upfront-shortcodes' ),
			),
			'fixed'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Fixed layout', 'upfront-shortcodes' ),
				'desc'    => __( 'Fixed width table cells', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
	)
);

function su_shortcode_csv_table( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => '',
			'delimiter'  => ',',
			'header'     => 'no',
			'responsive' => 'no',
			'alternate'  => 'yes',
			'fixed'      => 'no',
			'class'      => '',
		),
		$atts,
		'table'
	);

	if ( filter_var( $atts['url'], FILTER_VALIDATE_URL ) === false ) {
		return su_error_message( 'CSV Table', __( 'invalid URL', 'upfront-shortcodes' ) );
	}

	$response = wp_remote_get( $atts['url'] );

	if ( 200 !== wp_remote_retrieve_response_code( $response ) ) {
		return su_error_message( 'CSV Table', __( 'invalid URL', 'upfront-shortcodes' ) );
	}

	if ( ! is_string( $atts['delimiter'] ) || 1 !== strlen( $atts['delimiter'] ) ) {
		return su_error_message( 'CSV Table', __( 'invalid delimiter', 'upfront-shortcodes' ) );
	}

	$csv  = wp_remote_retrieve_body( $response );
	$html = su_csv_to_html(
		$csv,
		$atts['delimiter'],
		'yes' === $atts['header']
	);

	foreach ( array( 'responsive', 'alternate', 'fixed' ) as $feature ) {

		if ( 'yes' === $atts[ $feature ] ) {
			$atts['class'] .= ' su-table-' . $feature;
		}

	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-table su-csv-table' . su_get_css_class( $atts ) . '">' . $html . '</div>';

}
