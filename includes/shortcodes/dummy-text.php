<?php

su_add_shortcode(
	array(
		'id'       => 'dummy_text',
		'callback' => 'su_shortcode_dummy_text',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/dummy_text.svg',
		'name'     => __( 'Dummy Text', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'what'    => array(
				'type'    => 'select',
				'values'  => array(
					'paras' => __( 'Absätze', 'upfront-shortcodes' ),
					'words' => __( 'Wörter', 'upfront-shortcodes' ),
					'bytes' => __( 'Bytes', 'upfront-shortcodes' ),
				),
				'default' => 'paras',
				'name'    => __( 'Was', 'upfront-shortcodes' ),
				'desc'    => __( 'Was soll generiert werden?', 'upfront-shortcodes' ),
			),
			'amount'  => array(
				'type'    => 'slider',
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 1,
				'name'    => __( 'Menge', 'upfront-shortcodes' ),
				'desc'    => __( 'Wie viele Elemente (Absätze oder Wörter) generiert werden sollen. Mindestwortmenge ist 5', 'upfront-shortcodes' ),
			),
			'cache'   => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Cache', 'upfront-shortcodes' ),
				'desc'    => __( 'Generierter Text wird zwischengespeichert. Sei vorsichtig mit dieser Option. Wenn Du es deaktivierst und viele dummy_text-Shortcodes einfügst, wird die Ladezeit der Seite stark erhöht', 'upfront-shortcodes' ),
			),
			'wrapper' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Wrapper', 'upfront-shortcodes' ),
				'desc'    => __( 'Umschließe den Dummy-Text mit einem div-Container', 'upfront-shortcodes' ),
			),
			'class'   => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Textplatzhalter', 'upfront-shortcodes' ),
		'icon'     => 'text-height',
	)
);

function su_shortcode_dummy_text( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'amount'  => 1,
			'what'    => 'paras',
			'cache'   => 'yes',
			'wrapper' => 'yes',
			'class'   => '',
		),
		$atts,
		'dummy_text'
	);

	$atts['what']   = sanitize_key( $atts['what'] );
	$atts['amount'] = intval( $atts['amount'] );

	$html = su_shortcode_dummy_text_fetch(
		$atts['what'],
		$atts['amount'],
		$atts['cache']
	);

	if ( 'yes' === $atts['wrapper'] || '' !== $atts['class'] ) {

		$html = sprintf(
			'<div class="su-dummy-text%s">%s</div>',
			su_get_css_class( $atts ),
			$html
		);

	}

	return $html;

}

function su_shortcode_dummy_text_fetch( $what, $amount, $cache ) {

	$key = sprintf( 'su/cache/dummy_text/%s/%s', $what, $amount );

	if ( $cache ) {
		$transient = get_transient( $key );
	}

	if ( $transient ) {
		return $transient;
	}

	$url = esc_url_raw(
		sprintf(
			'http://www.lipsum.com/feed/xml?what=%s&amount=%s&start=0',
			$what,
			$amount
		)
	);

	$xml  = simplexml_load_file( $url );
	$html = wpautop( str_replace( "\n", "\n\n", $xml->lipsum ) );

	set_transient( $key, $html, 30 * DAY_IN_SECONDS );

	return $html;

}
