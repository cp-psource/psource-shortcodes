<?php

su_add_shortcode(
	array(
		'id'       => 'spacer',
		'callback' => 'su_shortcode_spacer',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/spacer.svg',
		'name'     => __( 'Abstandshalter', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content other',
		'atts'     => array(
			'size'  => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 800,
				'step'    => 10,
				'default' => 20,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Höhe des Abstandshalters in Pixel', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Leerer Raum mit einstellbarer Höhe', 'upfront-shortcodes' ),
		'icon'     => 'arrows-v',
	)
);

function su_shortcode_spacer( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'size'  => '20',
			'class' => '',
		),
		$atts,
		'spacer'
	);

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-spacer' . su_get_css_class( $atts ) . '" style="height:' . esc_attr( $atts['size'] ) . 'px"></div>';

}
