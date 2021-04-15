<?php

su_add_shortcode( array(
		'id' => 'pullquote',
		'callback' => 'su_shortcode_pullquote',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/pullquote.svg',
		'name' => __( 'Pullquote', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'atts' => array(
			'align' => array(
				'type' => 'select',
				'values' => array(
					'left' => __( 'Left', 'upfront-shortcodes' ),
					'right' => __( 'Right', 'upfront-shortcodes' )
				),
				'default' => 'left',
				'name' => __( 'Align', 'upfront-shortcodes' ), 'desc' => __( 'Pullquote alignment (float)', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Pullquote', 'upfront-shortcodes' ),
		'desc' => __( 'Pullquote', 'upfront-shortcodes' ),
		'icon' => 'quote-left',
	) );

function su_shortcode_pullquote( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'align' => 'left',
			'class' => ''
		), $atts, 'pullquote' );

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-pullquote su-pullquote-align-' . $atts['align'] . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</div>';

}
