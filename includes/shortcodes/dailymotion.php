<?php

su_add_shortcode(
	array(
		'id'       => 'dailymotion',
		'callback' => 'su_shortcode_dailymotion',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/dailymotion.svg',
		'name'     => __( 'Dailymotion', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'url'        => array(
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'URL der Dailymotion-Seite mit Video', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerbreite', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 400,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerhöhe', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignoriere Breiten- und Höhenparameter und mache den Player responsiv', 'upfront-shortcodes' ),
			),
			'autoplay'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Starte die Wiedergabe des Videos automatisch nach dem Laden des Players. Funktioniert möglicherweise nicht auf einigen mobilen Betriebssystemversionen', 'upfront-shortcodes' ),
			),
			'background' => array(
				'type'    => 'color',
				'default' => '#FFC300',
				'name'    => __( 'Hintergrundfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML-Farbe des Hintergrunds von Kontrollelementen', 'upfront-shortcodes' ),
			),
			'foreground' => array(
				'type'    => 'color',
				'default' => '#F7FFFD',
				'name'    => __( 'Vordergrundfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML-Farbe des Vordergrunds der Steuerelemente', 'upfront-shortcodes' ),
			),
			'highlight'  => array(
				'type'    => 'color',
				'default' => '#171D1B',
				'name'    => __( 'Hervorhebungsfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML-Farbe der Hervorhebungen der Steuerelemente', 'upfront-shortcodes' ),
			),
			'logo'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Logo anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Ermöglicht das Ausblenden oder Anzeigen des Dailymotion-Logos', 'upfront-shortcodes' ),
			),
			'quality'    => array(
				'type'    => 'select',
				'values'  => array(
					'240'  => '240',
					'380'  => '380',
					'480'  => '480',
					'720'  => '720',
					'1080' => '1080',
				),
				'default' => '380',
				'name'    => __( 'Qualität', 'upfront-shortcodes' ),
				'desc'    => __( 'Bestimmt die Qualität, die standardmäßig abgespielt werden muss, falls verfügbar', 'upfront-shortcodes' ),
			),
			'related'    => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Ähnliche Videos anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Ähnliche Videos am Ende des Videos anzeigen', 'upfront-shortcodes' ),
			),
			'info'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Videoinfos anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Videoinfos (Titel/Autor) auf dem Startbildschirm anzeigen', 'upfront-shortcodes' ),
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
		'desc'     => __( 'Dailymotion-Video', 'upfront-shortcodes' ),
		'icon'     => 'youtube-play',
	)
);

function su_shortcode_dailymotion( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => false,
			'width'      => 600,
			'height'     => 400,
			'responsive' => 'yes',
			'autoplay'   => 'no',
			'background' => '#FFC300',
			'foreground' => '#F7FFFD',
			'highlight'  => '#171D1B',
			'logo'       => 'yes',
			'quality'    => '380',
			'related'    => 'yes',
			'info'       => 'yes',
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'dailymotion'
	);

	if ( ! $atts['url'] ) {
		return su_error_message( 'Dailymotion', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );
	$id          = strtok( basename( $atts['url'] ), '_' );

	if ( ! $id ) {
		return su_error_message( 'Screenr', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$params     = array();
	$dm_options = array( 'autoplay', 'background', 'foreground', 'highlight', 'logo', 'quality', 'info' );

	foreach ( $dm_options as $dm_option ) {
		$params[] = $dm_option . '=' . str_replace( array( 'yes', 'no', '#' ), array( '1', '0', '' ), $atts[ $dm_option ] );
	}

	if ( 'no' === $atts['related'] ) {
		$params[] = 'queue-enable=false';
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-dailymotion su-u-responsive-media-' . esc_attr( $atts['responsive'] ) . su_get_css_class( $atts ) . '"><iframe width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" src="//www.dailymotion.com/embed/video/' . $id . '?' . esc_attr( implode( '&', $params ) ) . '" frameborder="0" allowfullscreen="true" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';

}
