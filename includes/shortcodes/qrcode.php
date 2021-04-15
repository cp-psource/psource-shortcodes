<?php

su_add_shortcode(
	array(
		'id'       => 'qrcode',
		'callback' => 'su_shortcode_qrcode',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/qrcode.svg',
		'name'     => __( 'QR code', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'data'       => array(
				'default' => '',
				'name'    => __( 'Data', 'upfront-shortcodes' ),
				'desc'    => __( 'The text to store within the QR code. You can use here any text or even URL', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'default' => '',
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'upfront-shortcodes' ),
			),
			'size'       => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1000,
				'step'    => 10,
				'default' => 200,
				'name'    => __( 'Size', 'upfront-shortcodes' ),
				'desc'    => __( 'Image width and height (in pixels)', 'upfront-shortcodes' ),
			),
			'margin'     => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 50,
				'step'    => 5,
				'default' => 0,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Thickness of a margin (in pixels)', 'upfront-shortcodes' ),
			),
			'align'      => array(
				'type'    => 'select',
				'values'  => array(
					'none'   => __( 'None', 'upfront-shortcodes' ),
					'left'   => __( 'Left', 'upfront-shortcodes' ),
					'center' => __( 'Center', 'upfront-shortcodes' ),
					'right'  => __( 'Right', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Align', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose image alignment', 'upfront-shortcodes' ),
			),
			'link'       => array(
				'default' => '',
				'name'    => __( 'Link', 'upfront-shortcodes' ),
				'desc'    => __( 'You can make this QR code clickable. Enter here the URL', 'upfront-shortcodes' ),
			),
			'target'     => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Open in same tab', 'upfront-shortcodes' ),
					'blank' => __( 'Open in new tab', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Link target', 'upfront-shortcodes' ),
				'desc'    => __( 'Select link target', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'default' => '#000000',
				'name'    => __( 'Primary color', 'upfront-shortcodes' ),
				'desc'    => __( 'Pick a primary color', 'upfront-shortcodes' ),
			),
			'background' => array(
				'type'    => 'color',
				'default' => '#ffffff',
				'name'    => __( 'Background color', 'upfront-shortcodes' ),
				'desc'    => __( 'Pick a background color', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Advanced QR code generator', 'upfront-shortcodes' ),
		'icon'     => 'qrcode',
	)
);

function su_shortcode_qrcode( $atts = null, $content = null ) {
	$atts = shortcode_atts(
		array(
			'data'       => '',
			'title'      => '',
			'size'       => 200,
			'margin'     => 0,
			'align'      => 'none',
			'link'       => '',
			'target'     => 'blank',
			'color'      => '#000000',
			'background' => '#ffffff',
			'class'      => '',
		),
		$atts,
		'qrcode'
	);
	// Check the data
	if ( ! $atts['data'] ) {
		return su_error_message( 'QR code', __( 'please specify the data', 'upfront-shortcodes' ) );
	}
	$atts['data'] = su_do_attribute( $atts['data'] );
	$atts['data'] = sanitize_text_field( $atts['data'] );
	// Prepare link
	$href = ( $atts['link'] ) ? ' href="' . $atts['link'] . '"' : '';
	// Prepare clickable class
	if ( $atts['link'] ) {
		$atts['class'] .= ' su-qrcode-clickable';
	}
	// Prepare title
	$atts['title'] = esc_attr( $atts['title'] );
	// Query assets
	su_query_asset( 'css', 'su-shortcodes' );

	$url = add_query_arg(
		array(
			'data'    => rawurlencode( $atts['data'] ),
			'size'    => sprintf( '%1$sx%1$s', intval( $atts['size'] ) ),
			'format'  => 'png',
			'margin'  => intval( $atts['margin'] ),
			'color'   => ltrim( $atts['color'], '#' ),
			'bgcolor' => ltrim( $atts['background'], '#' ),
		),
		'https://api.qrserver.com/v1/create-qr-code/'
	);

	// Return result
	return '<span class="su-qrcode su-qrcode-align-' . $atts['align'] . su_get_css_class( $atts ) . '"><a' . $href . ' target="_' . $atts['target'] . '" title="' . $atts['title'] . '"><img src="' . esc_url( $url ) . '" alt="' . $atts['title'] . '" /></a></span>';
}
