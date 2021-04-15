<?php

su_add_shortcode( array(
		'id' => 'label',
		'callback' => 'su_shortcode_label',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/label.svg',
		'name' => __( 'Label', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'content',
		'atts' => array(
			'type' => array(
				'type' => 'select',
				'values' => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'success' => __( 'Success', 'upfront-shortcodes' ),
					'warning' => __( 'Warning', 'upfront-shortcodes' ),
					'important' => __( 'Important', 'upfront-shortcodes' ),
					'black' => __( 'Black', 'upfront-shortcodes' ),
					'info' => __( 'Info', 'upfront-shortcodes' )
				),
				'default' => 'default',
				'name' => __( 'Type', 'upfront-shortcodes' ),
				'desc' => __( 'Style of the label', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Label', 'upfront-shortcodes' ),
		'desc' => __( 'Styled label', 'upfront-shortcodes' ),
		'icon' => 'tag',
	) );

function su_shortcode_label( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'type'  => 'default',
			'style' => null, // 3.x
			'class' => ''
		), $atts, 'label' );

	if ( $atts['style'] !== null ) $atts['type'] = $atts['style'];

	su_query_asset( 'css', 'su-shortcodes' );

	return '<span class="su-label su-label-type-' . $atts['type'] . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</span>';

}
