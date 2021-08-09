<?php

su_add_shortcode(
	array(
		'id'       => 'feed',
		'callback' => 'su_shortcode_feed',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/feed.svg',
		'name'     => __( 'RSS-Feed', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content other',
		'atts'     => array(
			'url'    => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'URL', 'upfront-shortcodes' ),
				'desc'    => __( 'RSS-Feed-URL', 'upfront-shortcodes' ),
			),
			'limit'  => array(
				'type'    => 'slider',
				'min'     => 1,
				'max'     => 20,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Anzahl der anzuzeigenden Elemente', 'upfront-shortcodes' ),
			),
			'target' => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im gleichen Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'self',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Feed-Links-Ziel', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Feedgreifer', 'upfront-shortcodes' ),
		'icon'     => 'rss',
	)
);

function su_shortcode_feed( $atts = null, $content = null ) {

	$atts   = su_parse_shortcode_atts( 'feed', $atts );
	$feed   = null;
	$items  = array();
	$output = '';

	$atts['url'] = wp_specialchars_decode( $atts['url'] );

	if ( ! filter_var( $atts['url'], FILTER_VALIDATE_URL ) ) {
		return su_error_message( 'Feed', __( 'ungültige Feed-URL', 'upfront-shortcodes' ) );
	}

	$feed = fetch_feed( $atts['url'] );

	if ( is_wp_error( $feed ) ) {
		return su_error_message( 'Feed', $feed->get_error_message() );
	}

	$items = $feed->get_items( 0, (int) $atts['limit'] );

	if ( ! count( $items ) ) {
		return su_error_message( 'Feed', __( 'keine Artikel im Feed', 'upfront-shortcodes' ) );
	}

	foreach ( $items as $item ) {

		$output .= sprintf(
			'<li><a href="%s" target="_%s" title="%s">%s</a></li>',
			esc_attr( $item->get_permalink() ),
			sanitize_key( $atts['target'] ),
			esc_attr( $item->get_description() ),
			wp_kses_post( $item->get_title() )
		);

	}

	return sprintf(
		'<ul class="su-feed%s">%s</ul>',
		esc_attr( su_get_css_class( $atts ) ),
		$output
	);

}
