<?php

su_add_shortcode(
	array(
		'id'       => 'gmap',
		'callback' => 'su_shortcode_gmap',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/gmap.svg',
		'name'     => __( 'Google Map', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Kartenbreite', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 400,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Kartenhöhe', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignoriere Die Breiten- und Höhenparameter und mache die Karte responsiv', 'upfront-shortcodes' ),
			),
			'address'    => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Marker', 'upfront-shortcodes' ),
				'desc'    => __( 'Adresse für die Markierung. Du kannst es in jeder Sprache eingeben', 'upfront-shortcodes' ),
			),
			'zoom'       => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 21,
				'step'    => 1,
				'default' => 0,
				'name'    => __( 'Zoom', 'upfront-shortcodes' ),
				'desc'    => __( 'Zoom legt die anfängliche Zoomstufe der Karte fest. Zulässige Werte reichen von 1 (die ganze Welt) bis 21 (einzelne Gebäude). Verwende 0 (Null), um die Zoomstufe abhängig vom angezeigten Objekt einzustellen (automatisch)', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Eine kurze Beschreibung des eingebetteten Inhalts (von Screenreadern verwendet)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Karten von Google', 'upfront-shortcodes' ),
		'icon'     => 'globe',
	)
);

function su_shortcode_gmap( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'width'      => 600,
			'height'     => 400,
			'responsive' => 'yes',
			'address'    => 'Moscow',
			'zoom'       => 0,
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'gmap'
	);

	$atts['zoom'] = is_numeric( $atts['zoom'] ) && $atts['zoom'] > 0
		? '&amp;z=' . $atts['zoom']
		: '';

	su_query_asset( 'css', 'su-shortcodes' );

	return sprintf(
		'<div class="su-gmap su-u-responsive-media-%s%s"><iframe width="%s" height="%s" src="//maps.google.com/maps?q=%s&amp;output=embed%s" title="%s"></iframe></div>',
		esc_attr( $atts['responsive'] ),
		su_get_css_class( $atts ),
		intval( $atts['width'] ),
		intval( $atts['height'] ),
		rawurlencode( su_do_attribute( $atts['address'] ) ),
		$atts['zoom'],
		esc_attr( $atts['title'] )
	);

}
