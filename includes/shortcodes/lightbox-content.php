<?php

su_add_shortcode(
	array(
		'id'               => 'lightbox_content',
		'callback'         => 'su_shortcode_lightbox_content',
		'image'            => su_get_plugin_url() . 'admin/images/shortcodes/lightbox_content.svg',
		'name'             => __( 'Lightbox Inhalt', 'upfront-shortcodes' ),
		'type'             => 'wrap',
		'group'            => 'gallery',
		'required_sibling' => 'lightbox',
		'article'          => 'https://n3rds.work/docs/upfront-shortcodes-lightbox/',
		'atts'             => array(
			'id'         => array(
				'default' => '',
				'name'    => __( 'ID', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s %2$s: %3$s',
					__( 'Die ID des Elements. Verwende den Wert aus dem Feld Inhaltsquelle des Lightbox-Shortcodes.', 'upfront-shortcodes' ),
					__( 'Beispiel', 'upfront-shortcodes' ),
					'<b%value>my-custom-popup</b>'
				),
			),
			'width'      => array(
				'default' => 'auto',
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s<br>%2$s: %3$s',
					__( 'Die Breite des Elements. CSS-Einheiten sind erlaubt.', 'upfront-shortcodes' ),
					__( 'Beispiele', 'upfront-shortcodes' ),
					'<b%value>auto</b>, <b%value>300px</b>, <b%value>40em</b>, <b%value>90%</b>, <b%value>90vw</b>'
				),
			),
			'min_width'  => array(
				'default' => 'none',
				'name'    => __( 'Mindest. Breite', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s<br>%2$s: %3$s',
					__( 'Die minimale Breite des Elements. CSS-Einheiten sind erlaubt.', 'upfront-shortcodes' ),
					__( 'Beispiele', 'upfront-shortcodes' ),
					'<b%value>none</b>, <b%value>300px</b>, <b%value>40em</b>, <b%value>90%</b>, <b%value>90vw</b>'
				),
			),
			'max_width'  => array(
				'default' => '600px',
				'name'    => __( 'Max. Breite', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s<br>%2$s: %3$s',
					__( 'Die maximale Breite des Elements. CSS-Einheiten sind erlaubt.', 'upfront-shortcodes' ),
					__( 'Beispiele', 'upfront-shortcodes' ),
					'<b%value>none</b>, <b%value>300px</b>, <b%value>40em</b>, <b%value>90%</b>, <b%value>90vw</b>'
				),
			),
			'margin'     => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 600,
				'step'    => 5,
				'default' => 40,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Der äußere Abstand des Elements (in Pixel)', 'upfront-shortcodes' ),
			),
			'padding'    => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 600,
				'step'    => 5,
				'default' => 40,
				'name'    => __( 'Padding', 'upfront-shortcodes' ),
				'desc'    => __( 'Der innere Abstand des Elements (in Pixel)', 'upfront-shortcodes' ),
			),
			'text_align' => array(
				'type'    => 'select',
				'values'  => array(
					'left'   => __( 'Links', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'right'  => __( 'Rechts', 'upfront-shortcodes' ),
				),
				'default' => 'center',
				'name'    => __( 'Textausrichtung', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Textausrichtung aus', 'upfront-shortcodes' ),
			),
			'background' => array(
				'type'    => 'color',
				'default' => '#FFFFFF',
				'name'    => __( 'Hintergrundfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle eine Hintergrundfarbe', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'default' => '#333333',
				'name'    => __( 'Textfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle eine Textfarbe aus', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'default' => '#333333',
				'name'    => __( 'Textfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle eine Textfarbe aus', 'upfront-shortcodes' ),
			),
			'shadow'     => array(
				'type'    => 'shadow',
				'default' => '0px 0px 15px #333333',
				'name'    => __( 'Schatten', 'upfront-shortcodes' ),
				'desc'    => __( 'Passe den Schatten für das Inhaltsfeld an', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'          => __( 'Inline-Inhalte', 'upfront-shortcodes' ),
		'desc'             => __( 'Inline-Inhalt für Lightbox', 'upfront-shortcodes' ),
		'icon'             => 'external-link',
	)
);

function su_shortcode_lightbox_content( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts( 'lightbox_content', $atts );

	if ( ! $atts['id'] ) {

		return su_error_message(
			'Lightbox-Inhalt',
			__( 'Ungültige ID. Verwende den Wert aus dem Feld Inhaltsquelle des Lightbox-Shortcodes.', 'upfront-shortcodes' )
		);

	}

	if ( is_numeric( $atts['margin'] ) ) {
		$atts['margin'] = "{$atts['margin']}px";
	}

	if ( is_numeric( $atts['padding'] ) ) {
		$atts['padding'] = "{$atts['padding']}px";
	}

	$style = array(
		'display:none',
		'width:' . sanitize_text_field( $atts['width'] ),
		'min-width:' . sanitize_text_field( $atts['min_width'] ),
		'max-width:' . sanitize_text_field( $atts['max_width'] ),
		'margin-top:' . sanitize_text_field( $atts['margin'] ),
		'margin-bottom:' . sanitize_text_field( $atts['margin'] ),
		'padding:' . sanitize_text_field( $atts['padding'] ),
		'background:' . sanitize_text_field( $atts['background'] ),
		'color:' . sanitize_text_field( $atts['color'] ),
		'box-shadow:' . sanitize_text_field( $atts['shadow'] ),
		'text-align:' . sanitize_key( $atts['text_align'] ),
	);

	$output = sprintf(
		'<div class="su-lightbox-content su-u-trim %1$s" id="%2$s"%3$s>%4$s</div>',
		su_get_css_class( $atts ),
		sanitize_html_class( $atts['id'] ),
		su_html_style( $style ),
		do_shortcode( $content )
	);

	if ( did_action( 'su/generator/preview/before' ) ) {

		$output = sprintf(
			'<div class="su-lightbox-content-preview">%s</div>',
			$output
		);

	}

	su_query_asset( 'css', 'su-shortcodes' );

	return $output;

}
