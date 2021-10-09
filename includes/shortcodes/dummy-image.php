<?php

su_add_shortcode(
	array(
		'id'       => 'dummy_image',
		'callback' => 'su_shortcode_dummy_image',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/dummy_image.svg',
		'name'     => __( 'Dummy-Bild', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'width'  => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 500,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Bildbreite', 'upfront-shortcodes' ),
			),
			'height' => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 300,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Bildhöhe', 'upfront-shortcodes' ),
			),
			'theme'  => array(
				'type'    => 'select',
				'values'  => array(
					'any'       => __( 'Irgendein', 'upfront-shortcodes' ),
					'abstract'  => __( 'Abstrakt', 'upfront-shortcodes' ),
					'animals'   => __( 'Tiere', 'upfront-shortcodes' ),
					'business'  => __( 'Unternehmen', 'upfront-shortcodes' ),
					'cats'      => __( 'Katzen', 'upfront-shortcodes' ),
					'city'      => __( 'Stadt', 'upfront-shortcodes' ),
					'food'      => __( 'Essen', 'upfront-shortcodes' ),
					'nightlife' => __( 'Nachtleben', 'upfront-shortcodes' ),
					'fashion'   => __( 'Mode', 'upfront-shortcodes' ),
					'people'    => __( 'Menschen', 'upfront-shortcodes' ),
					'nature'    => __( 'Natur', 'upfront-shortcodes' ),
					'sports'    => __( 'Sport', 'upfront-shortcodes' ),
					'technics'  => __( 'Technik', 'upfront-shortcodes' ),
					'transport' => __( 'Transport', 'upfront-shortcodes' )
				),
				'default' => 'any',
				'name'    => __( 'Theme', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle das Theme für dieses Bild aus', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Bildplatzhalter mit zufälligem Bild', 'upfront-shortcodes' ),
		'icon'     => 'picture-o',
	)
);

function su_shortcode_dummy_image( $atts = null, $content = null ) {
	$atts = shortcode_atts(
		array(
			'width'  => 500,
			'height' => 300,
			'theme'  => 'any',
			'class'  => '',
		),
		$atts,
		'dummy_image'
	);
	$url  = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
	if ( $atts['theme'] !== 'any' ) {
		$url .= $atts['theme'] . '/' . rand( 0, 10 ) . '/';
	}
	return '<img src="' . esc_attr( $url ) . '" alt="' . __( 'Dummy-Bild', 'upfront-shortcodes' ) . '" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" class="su-dummy-image' . su_get_css_class( $atts ) . '" />';
}
