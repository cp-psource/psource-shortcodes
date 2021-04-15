<?php

su_add_shortcode( array(
		'id' => 'spacer',
		'callback' => 'su_shortcode_spacer',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/spacer.svg',
		'name' => __( 'Spacer', 'upfront-shortcodes' ),
		'type' => 'single',
		'group' => 'content other',
		'atts' => array(
			'size' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 800,
				'step' => 10,
				'default' => 20,
				'name' => __( 'Height', 'upfront-shortcodes' ),
				'desc' => __( 'Height of the spacer in pixels', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc' => __( 'Empty space with adjustable height', 'upfront-shortcodes' ),
		'icon' => 'arrows-v',
	) );

function su_shortcode_spacer( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'size'  => '20',
			'class' => ''
		), $atts, 'spacer' );

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-spacer' . su_get_css_class( $atts ) . '" style="height:' . (string) $atts['size'] . 'px"></div>';

}
