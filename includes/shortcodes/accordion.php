<?php

su_add_shortcode( array(
		'id' => 'accordion',
		'callback' => 'su_shortcode_accordion',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/accordion.svg',
		'name' => __( 'Akkordeon', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'required_child' => 'spoiler',
		'atts' => array(
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => array(
			'id'     => 'spoiler',
			'number' => 3,
		),
		'desc' => __( 'Akkordeon mit Spoilern', 'upfront-shortcodes' ),
		'note' => __( 'Wusstest Du, dass Du mehrere Spoiler mit [accordion] Shortcode umwickeln kannst, um einen Akkordeoneffekt zu erzielen?', 'upfront-shortcodes' ),
		'example' => 'spoilers',
		'icon' => 'list',
	) );

function su_shortcode_accordion( $atts = null, $content = null ) {

	$atts = shortcode_atts( array( 'class' => '' ), $atts, 'accordion' );

	return '<div class="su-accordion su-u-trim' . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</div>';

}
