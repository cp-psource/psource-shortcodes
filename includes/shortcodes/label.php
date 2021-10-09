<?php

su_add_shortcode(
	array(
		'id'       => 'label',
		'callback' => 'su_shortcode_label',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/label.svg',
		'name'     => __( 'Label', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'content',
		'atts'     => array(
			'type'  => array(
				'type'    => 'select',
				'values'  => array(
					'default'   => __( 'Standard', 'upfront-shortcodes' ),
					'success'   => __( 'Erfolg', 'upfront-shortcodes' ),
					'warning'   => __( 'Warnung', 'upfront-shortcodes' ),
					'important' => __( 'Wichtig', 'upfront-shortcodes' ),
					'black'     => __( 'Schwarz', 'upfront-shortcodes' ),
					'info'      => __( 'Info', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Typ', 'upfront-shortcodes' ),
				'desc'    => __( 'Stil des Labels', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Label', 'upfront-shortcodes' ),
		'desc'     => __( 'Gestyltes Label', 'upfront-shortcodes' ),
		'icon'     => 'tag',
	)
);

function su_shortcode_label( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'type'  => 'default',
			'style' => null, // 3.x
			'class' => '',
		),
		$atts,
		'label'
	);

	if ( $atts['style'] !== null ) {
		$atts['type'] = $atts['style'];
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<span class="su-label su-label-type-' . esc_attr( $atts['type'] ) . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</span>';

}
