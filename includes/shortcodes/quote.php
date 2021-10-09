<?php

su_add_shortcode(
	array(
		'id'       => 'quote',
		'callback' => 'su_shortcode_quote',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/quote.svg',
		'name'     => __( 'Zitat', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'style' => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Stil für dieses Zitat', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'cite'  => array(
				'default' => '',
				'name'    => __( 'Zitieren', 'upfront-shortcodes' ),
				'desc'    => __( 'Namen des Zitat Autors', 'upfront-shortcodes' ),
			),
			'url'   => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Zitat-URL', 'upfront-shortcodes' ),
				'desc'    => __( 'URL des Zitatautors. Leer lassen, um den Link zu deaktivieren', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Zitat', 'upfront-shortcodes' ),
		'desc'     => __( 'Blockquote-Alternative', 'upfront-shortcodes' ),
		'icon'     => 'quote-right',
	)
);

function su_shortcode_quote( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'style' => 'default',
			'cite'  => false,
			'url'   => false,
			'class' => '',
		),
		$atts,
		'quote'
	);

	$cite_link = $atts['url'] && $atts['cite']
		? '<a href="' . esc_attr( $atts['url'] ) . '" target="_blank">' . $atts['cite'] . '</a>'
		: $atts['cite'];

	$cite = $atts['cite']
		? '<span class="su-quote-cite">' . $cite_link . '</span>'
		: '';

	$cite_class = $atts['cite']
		? ' su-quote-has-cite'
		: '';

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-quote su-quote-style-' . esc_attr( $atts['style'] ) . $cite_class . su_get_css_class( $atts ) . '"><div class="su-quote-inner su-u-clearfix su-u-trim">' . su_do_nested_shortcodes( $content, 'quote' ) . su_do_attribute( $cite ) . '</div></div>';

}
