<?php

su_add_shortcode(
	array(
		'deprecated' => true,
		'id'         => 'document',
		'callback'   => 'su_shortcode_document',
		'image'      => su_get_plugin_url() . 'admin/images/shortcodes/document.svg',
		'name'       => __( 'Document', 'upfront-shortcodes' ),
		'type'       => 'single',
		'group'      => 'media',
		'atts'       => array(
			'url'        => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Width', 'upfront-shortcodes' ),
				'desc'    => __( 'Viewer width', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Height', 'upfront-shortcodes' ),
				'desc'    => __( 'Viewer height', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsive', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignore width and height parameters and make viewer responsive', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'A brief description of the embedded content (used by screenreaders)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'       => __( 'Document viewer by Google', 'upfront-shortcodes' ),
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

	return '<div class="su-document su-u-responsive-media-' . $atts['responsive'] . '"><iframe src="//docs.google.com/viewer?embedded=true&url=' . $atts['url'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="su-document' . su_get_css_class( $atts ) . '" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';
}
