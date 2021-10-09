<?php

su_add_shortcode(
	array(
		'deprecated' => true,
		'id'         => 'document',
		'callback'   => 'su_shortcode_document',
		'image'      => su_get_plugin_url() . 'admin/images/shortcodes/document.svg',
		'name'       => __( 'Dokument', 'upfront-shortcodes' ),
		'type'       => 'single',
		'group'      => 'media',
		'atts'       => array(
			'url'        => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'URL zum hochgeladenen Dokument. Unterstützte Formate: doc, xls, pdf usw.', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Viewer-Breite', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Viewer-Höhe', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignoriere Breiten- und Höhenparameter und mache den Betrachter responsiv', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Eine kurze Beschreibung des eingebetteten Inhalts (von Screenreadern verwendet)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'       => __( 'Dokumentenbetrachter von Google', 'upfront-shortcodes' ),
		'icon'       => 'file-text',
	)
);

function su_shortcode_document( $atts = null, $content = null ) {
	$atts = shortcode_atts(
		array(
			'url'        => '',
			'file'       => null, // 3.x
			'width'      => 600,
			'height'     => 400,
			'responsive' => 'yes',
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'document'
	);

	if ( null !== $atts['file'] ) {
		$atts['url'] = $atts['file'];
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-document su-u-responsive-media-' . esc_attr( $atts['responsive'] ) . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . esc_attr( $atts['url'] ) . '" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" class="su-document' . su_get_css_class( $atts ) . '" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';
}
