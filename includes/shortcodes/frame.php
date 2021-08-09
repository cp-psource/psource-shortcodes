<?php

su_add_shortcode( array(
		'deprecated' => true,
		'id' => 'frame',
		'callback' => 'su_shortcode_frame',
		'name' => __( 'Rahmen', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'content',
		'atts' => array(
			'align' => array(
				'type' => 'select',
				'values' => array(
					'left' => __( 'Links', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'right' => __( 'Rechts', 'upfront-shortcodes' )
				),
				'default' => 'left',
				'name' => __( 'Ausrichten', 'upfront-shortcodes' ),
				'desc' => __( 'Rahmenausrichtung', 'upfront-shortcodes' )
			),
			'class' => array(
				'default' => '',
				'name' => __( 'Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' )
			)
		),
		'content' => '<img src="http://lorempixel.com/g/400/200/" />',
		'desc' => __( 'Gestylter Bilderrahmen', 'upfront-shortcodes' ),
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
