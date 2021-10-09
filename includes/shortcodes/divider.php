<?php

su_add_shortcode(
	array(
		'id'       => 'divider',
		'callback' => 'su_shortcode_divider',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/divider.svg',
		'name'     => __( 'Teiler', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'top'           => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'TOP-Link anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Link zum Seitenanfang anzeigen oder nicht', 'upfront-shortcodes' ),
			),
			'text'          => array(
				'default' => __( 'Zum Anfang scrollen', 'upfront-shortcodes' ),
				'name'    => __( 'Linktext', 'upfront-shortcodes' ),
				'desc'    => __( 'Text für den GO TOP-Link', 'upfront-shortcodes' ),
			),
			'anchor'        => array(
				'default' => '#',
				'name'    => __( 'Top-Link-Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende diese Option, um einen benutzerdefinierten Anker für den Link Gehe zum Anfang festzulegen', 'upfront-shortcodes' ),
			),
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'dotted'  => __( 'Gepunktet', 'upfront-shortcodes' ),
					'dashed'  => __( 'Gestrichelt', 'upfront-shortcodes' ),
					'double'  => __( 'Doppelt', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Stil für diesen Teiler', 'upfront-shortcodes' ),
			),
			'divider_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#999999',
				'name'    => __( 'Teilerfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Farbe für den Teiler', 'upfront-shortcodes' ),
			),
			'link_color'    => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#999999',
				'name'    => __( 'Linkfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Farbe für den TOP-Link', 'upfront-shortcodes' ),
			),
			'size'          => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 40,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Größe', 'upfront-shortcodes' ),
				'desc'    => __( 'Höhe des Teilers (in Pixel)', 'upfront-shortcodes' ),
			),
			'margin'        => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 200,
				'step'    => 5,
				'default' => 15,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Passe den oberen und unteren Rand dieses Teilers an (in Pixel)', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Inhaltsteiler mit optionalem TOP-Link', 'upfront-shortcodes' ),
		'icon'     => 'ellipsis-h',
	)
);

function su_shortcode_divider( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts( 'divider', $atts );

	$atts['margin']        = intval( $atts['margin'] );
	$atts['size']          = intval( $atts['size'] );
	$atts['divider_color'] = sanitize_text_field( $atts['divider_color'] );
	$atts['link_color']    = sanitize_text_field( $atts['link_color'] );
	$atts['anchor']        = sanitize_html_class( $atts['anchor'] );

	$top_link  = '';
	$div_style = array(
		"margin:{$atts['margin']}px 0",
		"border-width:{$atts['size']}px",
		"border-color:{$atts['divider_color']}",
	);
	$a_style   = array( "color:{$atts['link_color']}" );

	if ( 'yes' === $atts['top'] ) {

		$top_link = sprintf(
			'<a href="#%1$s"%2$s>%3$s</a>',
			esc_attr( $atts['anchor'] ),
			su_html_style( $a_style ),
			su_do_attribute( $atts['text'] )
		);

	}

	su_query_asset( 'css', 'su-shortcodes' );

	return sprintf(
		'<div class="su-divider su-divider-style-%1$s%2$s"%3$s>%4$s</div>',
		sanitize_key( $atts['style'] ),
		su_get_css_class( $atts ),
		su_html_style( $div_style ),
		$top_link
	);

}
