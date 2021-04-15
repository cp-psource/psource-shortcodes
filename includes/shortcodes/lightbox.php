<?php

su_add_shortcode(
	array(
		'id'               => 'lightbox',
		'callback'         => 'su_shortcode_lightbox',
		'image'            => su_get_plugin_url() . 'admin/images/shortcodes/lightbox.svg',
		'name'             => __( 'Lightbox', 'upfront-shortcodes' ),
		'type'             => 'wrap',
		'group'            => 'gallery',
		'possible_sibling' => 'lightbox_content',
		'article'          => 'https://nerds.work/docs/lightbox/',
		'atts'             => array(
			'type'   => array(
				'type'    => 'select',
				'values'  => array(
					'iframe' => __( 'Iframe', 'upfront-shortcodes' ),
					'image'  => __( 'Image', 'upfront-shortcodes' ),
					'inline' => __( 'Inline (html content)', 'upfront-shortcodes' ),
				),
				'default' => 'iframe',
				'name'    => __( 'Content type', 'upfront-shortcodes' ),
				'desc'    => __( 'Select type of the lightbox window content', 'upfront-shortcodes' ),
			),
			'src'    => array(
				'default' => '',
				'name'    => __( 'Content source', 'upfront-shortcodes' ),
				'desc'    => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'upfront-shortcodes' ),
			),
			'mobile' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Enable on mobile devices', 'upfront-shortcodes' ),
				'desc'    => __( 'Set this option to No to disable lightbox on mobile devices (≤768px)', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'          => __( 'Click here to open lightbox', 'upfront-shortcodes' ),
		'desc'             => __( 'Lightbox window with custom content', 'upfront-shortcodes' ),
		'icon'             => 'external-link',
	)
);

function su_shortcode_lightbox( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'src'    => false,
			'type'   => 'iframe',
			'mobile' => 'yes',
			'class'  => '',
		),
		$atts,
		'lightbox'
	);

	if ( ! $atts['src'] ) {
		return su_error_message( 'Lightbox', __( 'please specify correct source', 'upfront-shortcodes' ) );
	}

	su_query_asset( 'css', 'magnific-popup' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'magnific-popup' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<span class="su-lightbox' . su_get_css_class( $atts ) . '" data-mfp-src="' . su_do_attribute( $atts['src'] ) . '" data-mfp-type="' . sanitize_key( $atts['type'] ) . '" data-mobile="' . sanitize_key( $atts['mobile'] ) . '">' . do_shortcode( $content ) . '</span>';

}
