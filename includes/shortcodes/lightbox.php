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
					'image'  => __( 'Bild', 'upfront-shortcodes' ),
					'inline' => __( 'Inline (Html Inhalt)', 'upfront-shortcodes' ),
				),
				'default' => 'iframe',
				'name'    => __( 'Inhaltstyp', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Typ des Lightbox-Fensterinhalts aus', 'upfront-shortcodes' ),
			),
			'src'    => array(
				'default' => '',
				'name'    => __( 'Inhaltsquelle', 'upfront-shortcodes' ),
				'desc'    => __( 'Füge hier den URL- oder CSS-Selektor ein. Verwende die URL für die Inhaltstypen Iframe und Bild. CSS-Selektor für Inline-Inhaltstyp verwenden.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'upfront-shortcodes' ),
			),
			'mobile' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Auf Mobilgeräten aktivieren', 'upfront-shortcodes' ),
				'desc'    => __( 'Setze diese Option auf Nein, um die Lightbox auf Mobilgeräten zu deaktivieren (≤768px)', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'          => __( 'Klicke hier, um die Lightbox zu öffnen', 'upfront-shortcodes' ),
		'desc'             => __( 'Lightbox-Fenster mit benutzerdefinierten Inhalten', 'upfront-shortcodes' ),
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
		return su_error_message( 'Lightbox', __( 'bitte korrekte Quelle angeben', 'upfront-shortcodes' ) );
	}

	su_query_asset( 'css', 'magnific-popup' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'magnific-popup' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<span class="su-lightbox' . su_get_css_class( $atts ) . '" data-mfp-src="' . su_do_attribute( $atts['src'] ) . '" data-mfp-type="' . sanitize_key( $atts['type'] ) . '" data-mobile="' . sanitize_key( $atts['mobile'] ) . '">' . do_shortcode( $content ) . '</span>';

}
