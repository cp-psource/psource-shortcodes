<?php

su_add_shortcode(
	array(
		'id'       => 'pullquote',
		'callback' => 'su_shortcode_pullquote',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/pullquote.svg',
		'name'     => __( 'Pullquote', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'align' => array(
				'type'    => 'select',
				'values'  => array(
					'left'  => __( 'Links', 'upfront-shortcodes' ),
					'right' => __( 'Riechts', 'upfront-shortcodes' ),
				),
				'default' => 'left',
				'name'    => __( 'Ausrichtung', 'upfront-shortcodes' ),
				'desc'    => __( 'Pullquote-Ausrichtung (Float)', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Pullquote', 'upfront-shortcodes' ),
		'desc'     => __( 'Pullquote', 'upfront-shortcodes' ),
		'icon'     => 'quote-left',
	)
);

function su_shortcode_pullquote( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'align' => 'left',
			'class' => '',
		),
		$atts,
		'pullquote'
	);

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-pullquote su-pullquote-align-' . esc_attr( $atts['align'] ) . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</div>';

}
