<?php

su_add_shortcode(
	array(
		'id'              => 'column',
		'callback'        => 'su_shortcode_column',
		'image'           => su_get_plugin_url() . 'admin/images/shortcodes/column.svg',
		'name'            => __( 'Spalte', 'upfront-shortcodes' ),
		'type'            => 'wrap',
		'group'           => 'box',
		'required_parent' => 'row',
		'atts'            => array(
			'size'   => array(
				'type'    => 'select',
				'values'  => array(
					'1/1' => __( 'Gesamtbreite', 'upfront-shortcodes' ),
					'1/2' => __( 'Eine Hälfte', 'upfront-shortcodes' ),
					'1/3' => __( 'Ein Drittel', 'upfront-shortcodes' ),
					'2/3' => __( 'Zwei Drittel', 'upfront-shortcodes' ),
					'1/4' => __( 'Ein Viertel', 'upfront-shortcodes' ),
					'3/4' => __( 'Drei Viertel', 'upfront-shortcodes' ),
					'1/5' => __( 'Ein Fünftel', 'upfront-shortcodes' ),
					'2/5' => __( 'Zwei Fünftel', 'upfront-shortcodes' ),
					'3/5' => __( 'Drei Fünftel', 'upfront-shortcodes' ),
					'4/5' => __( 'Vier Fünftel', 'upfront-shortcodes' ),
					'1/6' => __( 'Ein Sechstel', 'upfront-shortcodes' ),
					'5/6' => __( 'Fünf Sechstel', 'upfront-shortcodes' )
				),
				'default' => '1/2',
				'name'    => __( 'Größe', 'upfront-shortcodes' ),
				'desc'    => __( 'Spaltenbreite auswählen. Diese Breite wird abhängig von der Seitenbreite berechnet', 'upfront-shortcodes' ),
			),
			'center' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Zentriert', 'upfront-shortcodes' ),
				'desc'    => __( 'Zentriert diese Spalte auf der Seite ', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'         => __( 'Spalteninhalt', 'upfront-shortcodes' ),
		'desc'            => __( 'Flexible und responsive Spalten', 'upfront-shortcodes' ),
		'note'            => __( 'Wusstest Du, dass Du Spalten mit [row] Shortcode umbrechen musst?', 'upfront-shortcodes' ),
		'example'         => 'columns',
		'icon'            => 'columns',
	)
);

function su_shortcode_column( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'size'   => '1/2',
			'center' => 'no',
			'last'   => null,
			'class'  => '',
		),
		$atts,
		'column'
	);

	if ( $atts['last'] !== null && $atts['last'] == '1' ) {
		$atts['class'] .= ' su-column-last';
	}

	if ( $atts['center'] === 'yes' ) {
		$atts['class'] .= ' su-column-centered';
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-column su-column-size-' . esc_attr( str_replace( '/', '-', $atts['size'] ) ) . su_get_css_class( $atts ) . '"><div class="su-column-inner su-u-clearfix su-u-trim">' . su_do_nested_shortcodes( $content, 'column' ) . '</div></div>';

}
