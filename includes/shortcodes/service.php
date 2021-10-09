<?php

su_add_shortcode(
	array(
		'id'       => 'service',
		'callback' => 'su_shortcode_service',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/service.svg',
		'name'     => __( 'Service', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'title'      => array(
				'values'  => array(),
				'default' => __( 'Service Titel', 'upfront-shortcodes' ),
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Service Name', 'upfront-shortcodes' ),
			),
			'icon'       => array(
				'type'    => 'icon',
				'default' => 'icon: star',
				'name'    => __( 'Symbol', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst ein benutzerdefiniertes Symbol für dieses Feld hochladen', 'upfront-shortcodes' ),
			),
			'icon_color' => array(
				'type'    => 'color',
				'default' => '#333333',
				'name'    => __( 'Symbolfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Farbe wird auf das ausgewählte Symbol angewendet. Funktioniert nicht mit hochgeladenen Icons', 'upfront-shortcodes' ),
			),
			'size'       => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 128,
				'step'    => 2,
				'default' => 32,
				'name'    => __( 'Symbolgröße', 'upfront-shortcodes' ),
				'desc'    => __( 'Größe des hochgeladenen Symbols in Pixel', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Leistungsbeschreibung', 'upfront-shortcodes' ),
		'desc'     => __( 'Servicebox mit Titel', 'upfront-shortcodes' ),
		'icon'     => 'check-square-o',
	)
);

function su_shortcode_service( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'title'      => __( 'Service Titel', 'upfront-shortcodes' ),
			'icon'       => 'icon: star',
			'icon_color' => '#333',
			'size'       => 32,
			'class'      => '',
		),
		$atts,
		'service'
	);

	// RTL
	$rtl = is_rtl()
		? 'right'
		: 'left';

	if ( strpos( $atts['icon'], 'icon:' ) !== false ) {

		$atts['icon'] = sprintf(
			'<i class="sui sui-%s" style="font-size:%spx;color:%s"></i>',
			esc_attr( trim( str_replace( 'icon:', '', $atts['icon'] ) ) ),
			intval( $atts['size'] ),
			esc_attr( $atts['icon_color'] )
		);

		su_query_asset( 'css', 'su-icons' );

	} else {
		$atts['icon'] = sprintf(
			'<img src="%1$s" width="%2$s" height="%2$s" alt="%3$s" style="width:%2$spx;height:%2$spx" />',
			esc_attr( $atts['icon'] ),
			intval( $atts['size'] ),
			esc_attr( $atts['title'] )
		);
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-service' . su_get_css_class( $atts ) . '"><div class="su-service-title" style="padding-' . $rtl . ':' . round( intval( $atts['size'] ) + 14 ) . 'px;min-height:' . esc_attr( $atts['size'] ) . 'px;line-height:' . esc_attr( $atts['size'] ) . 'px">' . $atts['icon'] . ' ' . su_do_attribute( $atts['title'] ) . '</div><div class="su-service-content su-u-clearfix su-u-trim" style="padding-' . $rtl . ':' . round( intval( $atts['size'] ) + 14 ) . 'px">' . do_shortcode( $content ) . '</div></div>';

}
