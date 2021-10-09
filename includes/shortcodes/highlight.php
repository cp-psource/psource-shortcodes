<?php

su_add_shortcode(
	array(
		'id'       => 'highlight',
		'callback' => 'su_shortcode_highlight',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/highlight.svg',
		'name'     => __( 'Highlight', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'content',
		'atts'     => array(
			'background' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#DDFF99',
				'name'    => __( 'Hintergrund', 'upfront-shortcodes' ),
				'desc'    => __( 'Hintergrundfarbe für hervorgehobenen Text', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#000000',
				'name'    => __( 'Textfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Hervorgehobener Text Farbe', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Hervorgehobener Text', 'upfront-shortcodes' ),
		'desc'     => __( 'Hervorgehobener Text', 'upfront-shortcodes' ),
		'icon'     => 'pencil',
	)
);

function su_shortcode_highlight( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'background' => '#ddff99',
			'bg'         => null, // 3.x
			'color'      => '#000000',
			'class'      => '',
		),
		$atts,
		'highlight'
	);

	if ( $atts['bg'] !== null ) {
		$atts['background'] = $atts['bg'];
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<span class="su-highlight' . su_get_css_class( $atts ) . '" style="background:' . esc_attr( $atts['background'] ) . ';color:' . esc_attr( $atts['color'] ) . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';

}
