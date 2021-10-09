<?php

su_add_shortcode(
	array(
		'id'       => 'qrcode',
		'callback' => 'su_shortcode_qrcode',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/qrcode.svg',
		'name'     => __( 'QR Code', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'data'       => array(
				'default' => '',
				'name'    => __( 'Daten', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					// translators: %1$s and %2$s will be replaced with %CURRENT_URL% and %PERMALINK% tokens respectively
					__( 'Der Text, der im QR-Code gespeichert werden soll. Du kannst hier jeden beliebigen Text oder sogar URL verwenden.<br>Verwende %1$s, um die URL der aktuellen Seite anzuzeigen, oder %2$s, um den Permalink des aktuellen Beitrags anzuzeigen.', 'upfront-shortcodes' ),
					'<b%value>%CURRENT_URL%</b>',
					'<b%value>%PERMALINK%</b>'
				),
			),
			'title'      => array(
				'default' => '',
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib hier eine kurze Beschreibung ein. Dieser Text wird im Alt-Attribut des QR-Codes verwendet', 'upfront-shortcodes' ),
			),
			'size'       => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1000,
				'step'    => 10,
				'default' => 200,
				'name'    => __( 'Größe', 'upfront-shortcodes' ),
				'desc'    => __( 'Bildbreite und -höhe (in Pixel)', 'upfront-shortcodes' ),
			),
			'margin'     => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 50,
				'step'    => 5,
				'default' => 0,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Stärke eines Rands (in Pixel)', 'upfront-shortcodes' ),
			),
			'align'      => array(
				'type'    => 'select',
				'values'  => array(
					'none'   => __( 'Keine', 'upfront-shortcodes' ),
					'left'   => __( 'Links', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'right'  => __( 'Rechts', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Ausrichtung', 'upfront-shortcodes' ),
				'desc'    => __( 'Bildausrichtung wählen', 'upfront-shortcodes' ),
			),
			'link'       => array(
				'default' => '',
				'name'    => __( 'Link', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst diesen QR-Code anklickbar machen. Gib hier die URL ein', 'upfront-shortcodes' ),
			),
			'target'     => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Linkziel auswählen', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'default' => '#000000',
				'name'    => __( 'Primärfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle eine Primärfarbe', 'upfront-shortcodes' ),
			),
			'background' => array(
				'type'    => 'color',
				'default' => '#ffffff',
				'name'    => __( 'Hintergrundfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle eine Hintergrundfarbe', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Erweiterter QR-Code-Generator', 'upfront-shortcodes' ),
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

	if ( ! $atts['data'] ) {
		return su_error_message( 'QR code', __( 'bitte gib die Daten an', 'upfront-shortcodes' ) );
	}

	$atts['data'] = str_replace(
		array( '%CURRENT_URL%', '%PERMALINK%' ),
		array( su_get_current_url(), get_permalink() ),
		$atts['data']
	);

	$atts['data'] = su_do_attribute( $atts['data'] );
	$atts['data'] = sanitize_text_field( $atts['data'] );

	if ( $atts['link'] ) {

		$atts['link'] = sprintf(
			' href="%s"',
			esc_attr( su_do_attribute( $atts['link'] ) )
		);

		$atts['class'] .= ' su-qrcode-clickable';

	}

	$atts['title'] = esc_attr( $atts['title'] );

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

	return sprintf(
		'<span class="su-qrcode su-qrcode-align-%1$s%2$s"><a%3$s target="_%4$s" title="%5$s"><img src="%6$s" alt="%5$s" /></a></span>',
		/* %1$s */ esc_attr( $atts['align'] ),
		/* %2$s */ su_get_css_class( $atts ),
		/* %3$s */ $atts['link'],
		/* %4$s */ esc_attr( $atts['target'] ),
		/* %5$s */ esc_attr( $atts['title'] ),
		/* %6$s */ esc_url( $url )
	);

}
