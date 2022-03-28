<?php

su_add_shortcode( array(
		'id' => 'faq',
		'callback' => 'su_shortcode_faq',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/accordion.svg',
		'name' => __( 'FAQ', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'required_child' => 'spoilerfaq',
		'atts' => array(
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, getrennt durch Leerzeichen', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => array(
			'id'     => 'spoilerfaq',
			'number' => 3,
		),
		'desc' => __( 'FAQ mit Spoilern', 'upfront-shortcodes' ),
		'note' => __( 'Wusstest Du, dass Du mehrere FAQ mit dem Shortcode [accordion] umschließen kannst, um einen Akkordeoneffekt zu erzeugen?', 'upfront-shortcodes' ),
		'example' => 'spoilers',
		'icon' => 'list',
	) );

function su_shortcode_faq( $atts = null, $content = null ) {

	$atts = shortcode_atts( array( 'class' => '' ), $atts, 'faq' );

	return '<div class="su-faq' . su_get_css_class( $atts ) . '" itemscope itemtype="http://schema.org/FAQPage">' . do_shortcode( $content ) . '</div>';

}