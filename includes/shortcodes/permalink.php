<?php

su_add_shortcode( array(
		'id' => 'permalink',
		'callback' => 'su_shortcode_permalink',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/permalink.svg',
		'name' => __( 'Permalink', 'upfront-shortcodes' ),
		'type' => 'mixed',
		'group' => 'content other',
		'atts' => array(
			'id' => array(
				'default' => 1,
				'name' => __( 'ID', 'upfront-shortcodes' ),
				'desc' => __( 'Beitrags- oder Seiten-ID', 'upfront-shortcodes' )
			),
			'target' => array(
				'type' => 'select',
				'values' => array(
					'self' => __( 'Im gleichen Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' )
				),
				'default' => 'self',
				'name' => __( 'Ziel', 'upfront-shortcodes' ),
				'desc' => __( 'Linkziel', 'upfront-shortcodes' )
			),
			'title' => array(
				'default' => '',
				'name' => __( 'Titel', 'upfront-shortcodes' ),
				'desc' => __( 'Ein Wert für das Titelattribut des Links', 'upfront-shortcodes' )
			),
			'rel' => array(
				'default' => '',
				'name' => __( 'Rel', 'upfront-shortcodes' ),
				'desc' => __( 'Ein Wert für das rel-Attribut des Links', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => '',
		'desc' => __( 'Permalink zum angegebenen Beitrag/Seite', 'upfront-shortcodes' ),
		'icon' => 'link',
	) );

function su_shortcode_permalink( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'id'     => 1,
			'p'      => null, // 3.x
			'target' => 'self',
			'title'  => '',
			'rel'    => '',
			'class'  => '',
		), $atts, 'permalink' );

	if ( $atts['p'] !== null ) {
		$atts['id'] = $atts['p'];
	}

	$atts['id'] = su_do_attribute( $atts['id'] );

	if ( ! $content ) {
		$content = get_the_title( $atts['id'] );
	}

	return sprintf(
		'<a href="%s" title="%s" target="_%s" rel="%s" class="%s">%s</a>',
		get_permalink( $atts['id'] ),
		esc_attr( $atts['title'] ),
		esc_attr( $atts['target'] ),
		esc_attr( $atts['rel'] ),
		su_get_css_class( $atts ),
		do_shortcode( $content )
	);

}
