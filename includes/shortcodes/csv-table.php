<?php

su_add_shortcode(
	array(
		'id'       => 'csv_table',
		'callback' => 'su_shortcode_csv_table',
		'type'     => 'single',
		'name'     => __( 'CSV-Tabelle', 'upfront-shortcodes' ),
		'desc'     => __( 'Gestaltete Tabelle aus CSV-Datei', 'upfront-shortcodes' ),
		'group'    => 'content',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/table.svg',
		'icon'     => 'table',
		'atts'     => array(
			'url'        => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'CSV-Datei-URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Die URL einer CSV-Datei, die angezeigt wird', 'upfront-shortcodes' ),
			),
			'delimiter'  => array(
				'type'    => 'text',
				'default' => ',',
				'name'    => __( 'Trennzeichen', 'upfront-shortcodes' ),
				'desc'    => __( 'Lege das Feldtrennzeichen fest (nur ein Zeichen)', 'upfront-shortcodes' ),
			),
			'header'     => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Kopfzeile anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Erste Zeile als Tabellenkopf anzeigen', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Horizontale Bildlaufleiste hinzufügen, wenn die Tabellenbreite größer als die Seitenbreite ist', 'upfront-shortcodes' ),
			),
			'alternate'  => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Alternative Zeilenfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Aktivieren, um alternative Hintergrundfarbe für gerade Zeilen zu verwenden', 'upfront-shortcodes' ),
			),
			'fixed'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Festes Layout', 'upfront-shortcodes' ),
				'desc'    => __( 'Tabellenzellen mit fester Breite', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
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

	if ( ! su_is_unsafe_features_enabled() ) {

		return su_error_message(
			'CSV Table',
			sprintf(
				'%s.<br><a href="https://n3rds.work/docs/upfront-shortcodes-unsichere-funktionen/" target="_blank">%s</a>',
				__( 'This shortcode cannot be used while <b>Unsafe features</b> option is turned off', 'upfront-shortcodes' ),
				__( 'Learn more', 'upfront-shortcodes' )
			)
		);

	}

	if ( filter_var( $atts['url'], FILTER_VALIDATE_URL ) === false ) {
		return su_error_message( 'CSV Table', __( 'ungültige URL', 'upfront-shortcodes' ) );
	}

	$response = wp_remote_get( $atts['url'] );

	if ( 200 !== wp_remote_retrieve_response_code( $response ) ) {
		return su_error_message( 'CSV Table', __( 'ungültige URL', 'upfront-shortcodes' ) );
	}

	if ( ! is_string( $atts['delimiter'] ) || 1 !== strlen( $atts['delimiter'] ) ) {
		return su_error_message( 'CSV Table', __( 'ungültiges Trennzeichen', 'upfront-shortcodes' ) );
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
