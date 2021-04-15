<?php

su_add_shortcode( array(
		'deprecated' => true,
		'id' => 'frame',
		'callback' => 'su_shortcode_frame',
		'name' => __( 'Frame', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'content',
		'atts' => array(
			'align' => array(
				'type' => 'select',
				'values' => array(
					'left' => __( 'Left', 'upfront-shortcodes' ),
					'center' => __( 'Center', 'upfront-shortcodes' ),
					'right' => __( 'Right', 'upfront-shortcodes' )
				),
				'default' => 'left',
				'name' => __( 'Align', 'upfront-shortcodes' ),
				'desc' => __( 'Frame alignment', 'upfront-shortcodes' )
			),
			'class' => array(
				'default' => '',
				'name' => __( 'Class', 'upfront-shortcodes' ),
				'desc' => __( 'Extra CSS class', 'upfront-shortcodes' )
			)
		),
		'content' => '<img src="http://lorempixel.com/g/400/200/" />',
		'desc' => __( 'Styled image frame', 'upfront-shortcodes' ),
		'icon' => 'picture-o',
	) );

function su_shortcode_frame( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'style' => 'default',
			'align' => 'left',
			'class' => ''
		), $atts, 'frame' );

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<span class="su-frame su-frame-align-' . $atts['align'] . ' su-frame-style-' . $atts['style'] . su_get_css_class( $atts ) . '"><span class="su-frame-inner">' . do_shortcode( $content ) . '</span></span>';

}
