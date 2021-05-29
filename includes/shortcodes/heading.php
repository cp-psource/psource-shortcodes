<?php

su_add_shortcode(
	array(
		'id'       => 'heading',
		'callback' => 'su_shortcode_heading',
		'name'     => __( 'Überschrift', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'content',
		'atts'     => array(
			'style'  => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle einen Stil für diese Überschrift', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'size'   => array(
				'type'    => 'slider',
				'min'     => 7,
				'max'     => 48,
				'step'    => 1,
				'default' => 13,
				'name'    => __( 'Größe', 'upfront-shortcodes' ),
				'desc'    => __( 'Größe der Überschrift auswählen (Pixel)', 'upfront-shortcodes' ),
			),
			'align'  => array(
				'type'    => 'select',
				'values'  => array(
					'left'   => __( 'Links', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'right'  => __( 'Rechts', 'upfront-shortcodes' ),
				),
				'default' => 'center',
				'name'    => __( 'Ausrichten', 'upfront-shortcodes' ),
				'desc'    => __( 'Ausrichtung des Überschriftentextes', 'upfront-shortcodes' ),
			),
			'margin' => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 200,
				'step'    => 10,
				'default' => 20,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Margin unten (Pixel)', 'upfront-shortcodes' ),
			),
			'id'     => array(
				'name'    => __( 'HTML-Anker (ID)', 'upfront-shortcodes' ),
				'desc'    => __( 'Mit Ankern kannst Du direkt auf eine Überschrift auf einer Seite verlinken.', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Überschriftstext', 'upfront-shortcodes' ),
		'desc'     => __( 'Überschrift gestylt', 'upfront-shortcodes' ),
		'icon'     => 'h-square',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/heading.svg',
	)
);

function su_shortcode_heading( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'style'  => 'default',
			'size'   => 13,
			'align'  => 'center',
			'margin' => '20',
			'id'     => '',
			'class'  => '',
		),
		$atts,
		'heading'
	);

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-heading su-heading-style-' . $atts['style'] . ' su-heading-align-' . $atts['align'] . su_get_css_class( $atts ) . '" id="' . esc_attr( $atts['id'] ) . '" style="font-size:' . intval( $atts['size'] ) . 'px;margin-bottom:' . $atts['margin'] . 'px"><div class="su-heading-inner">' . do_shortcode( $content ) . '</div></div>';

}
