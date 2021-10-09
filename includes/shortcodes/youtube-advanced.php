<?php

su_add_shortcode(
	array(
		'id'       => 'youtube_advanced',
		'callback' => 'su_shortcode_youtube_advanced',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/youtube_advanced.svg',
		'name'     => __( 'YouTube Advanced', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'url'            => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'URL der YouTube-Seite mit Video. zB: http://youtube.com/watch?v=XXXXXX', 'upfront-shortcodes' ),
			),
			'playlist'       => array(
				'default' => '',
				'name'    => __( 'Playlist', 'upfront-shortcodes' ),
				'desc'    => __( 'Wert ist eine durch Kommas getrennte Liste der abzuspielenden Video-IDs. Wenn Du einen Wert angibst, wird als erstes Video die im URL-Pfad angegebene VIDEO_ID abgespielt, und die im Parameter für die Wiedergabeliste angegebenen Videos werden anschließend abgespielt', 'upfront-shortcodes' ),
			),
			'width'          => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerbreite', 'upfront-shortcodes' ),
			),
			'height'         => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 400,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerhöhe', 'upfront-shortcodes' ),
			),
			'responsive'     => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignoriere die Parameter für Breite und Höhe und sorge dafür, dass der Player responsiv reagiert', 'upfront-shortcodes' ),
			),
			'controls'       => array(
				'type'    => 'select',
				'values'  => array(
					'no'  => __( '0 - Steuerelemente ausblenden', 'upfront-shortcodes' ),
					'yes' => __( '1 - Steuerelemente anzeigen', 'upfront-shortcodes' ),
					'alt' => __( '2 - Steuerelemente anzeigen, wenn die Wiedergabe gestartet wird', 'upfront-shortcodes' ),
				),
				'default' => 'yes',
				'name'    => __( 'Kontrollen', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter gibt an, ob die Steuerelemente des Videoplayers angezeigt werden', 'upfront-shortcodes' ),
			),
			'autohide'       => array(
				'type'    => 'select',
				'values'  => array(
					'no'  => __( '0 - Steuerelemente nicht ausblenden', 'upfront-shortcodes' ),
					'yes' => __( '1 - Blende alle Steuerelemente der Maus aus', 'upfront-shortcodes' ),
					'alt' => __( '2 - Fortschrittsbalken an der Maus ausblenden', 'upfront-shortcodes' ),
				),
				'default' => 'alt',
				'name'    => __( 'Autohide', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter gibt an, ob die Videosteuerung automatisch ausgeblendet wird, nachdem ein Video abgespielt wurde', 'upfront-shortcodes' ),
			),
			'autoplay'       => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter gibt an, ob das Video beim Laden des Players automatisch abgespielt wird. Bitte beachte, dass in modernen Browsern die Autoplay-Option nur mit aktivierter Stummschaltoption funktioniert', 'upfront-shortcodes' ),
			),
			'mute'           => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Stumm', 'upfront-shortcodes' ),
				'desc'    => __( 'Schalte den Player stumm', 'upfront-shortcodes' ),
			),
			'loop'           => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Schleife', 'upfront-shortcodes' ),
				'desc'    => __( 'Wenn Du JA einstellst, spielt der Player das erste Video immer wieder ab', 'upfront-shortcodes' ),
			),
			'rel'            => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Zeige verwandte Videos desselben Kanals an', 'upfront-shortcodes' ),
				'desc'    => __( 'Wenn dieser Parameter auf YES gesetzt ist, stammen verwandte Videos vom selben Kanal wie das gerade abgespielte Video', 'upfront-shortcodes' ),
			),
			'fs'             => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Vollbild-Schaltfläche anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Wenn Du diesen Parameter auf NO setzt, wird die Vollbildschaltfläche nicht angezeigt', 'upfront-shortcodes' ),
			),
			'modestbranding' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => 'modestbranding',
				'desc'    => __( 'Mit diesem Parameter kannst du einen YouTube-Player verwenden, der kein YouTube-Logo anzeigt. Setze den Parameterwert auf YES, um zu verhindern, dass das YouTube-Logo in der Steuerleiste angezeigt wird. Beachte, dass in der oberen rechten Ecke eines angehaltenen Videos weiterhin eine kleine YouTube-Textbeschriftung angezeigt wird, wenn sich der Mauszeiger des Benutzers über dem Player befindet', 'upfront-shortcodes' ),
			),
			'theme'          => array(
				'type'    => 'select',
				'values'  => array(
					'dark'  => __( 'Dunkles Theme', 'upfront-shortcodes' ),
					'light' => __( 'Helles Theme', 'upfront-shortcodes' ),
				),
				'default' => 'dark',
				'name'    => __( 'Theme', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter gibt an, ob der eingebettete Player Player-Steuerelemente (wie eine Wiedergabetaste oder einen Lautstärkeregler) in einer dunklen oder hellen Steuerleiste anzeigt', 'upfront-shortcodes' ),
			),
			'wmode'          => array(
				'default' => '',
				'name'    => __( 'WModus', 'upfront-shortcodes' ),
				// Translators: %1$s, %2$s - example values for shortcode attribute
				'desc'    => sprintf( __( 'Hier kannst Du den wmode-Wert für die eingebettete URL angeben.<br>Beispielwerte: %1$s, %2$s', 'upfront-shortcodes' ), '<b%value>transparent</b>', '<b%value>opaque</b>' ),
			),
			'playsinline'    => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Spielt inline', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter steuert, ob Videos in einem HTML5-Player unter iOS inline oder im Vollbildmodus abgespielt werden', 'upfront-shortcodes' ),
			),
			'title'          => array(
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Eine kurze Beschreibung des eingebetteten Inhalts (von Screenreadern verwendet)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'          => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'YouTube Video Player mit erweiterten Einstellungen', 'upfront-shortcodes' ),
		'example'  => 'media',
		'icon'     => 'youtube-play',
	)
);

function su_shortcode_youtube_advanced( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'            => false,
			'width'          => 600,
			'height'         => 400,
			'responsive'     => 'yes',
			'autohide'       => 'alt',
			'autoplay'       => 'no',
			'mute'           => 'no',
			'controls'       => 'yes',
			'fs'             => 'yes',
			'loop'           => 'no',
			'modestbranding' => 'no',
			'playlist'       => '',
			'rel'            => 'yes',
			'showinfo'       => 'yes',
			'theme'          => 'dark',
			'wmode'          => '',
			'playsinline'    => 'no',
			'title'          => '',
			'class'          => '',
		),
		$atts,
		'youtube_advanced'
	);

	if ( ! $atts['url'] ) {
		return su_error_message( 'YouTube Advanced', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );

	$video_id = preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match )
		? $match[1]
		: false;

	if ( ! $video_id ) {
		return su_error_message( 'YouTube Advanced', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	if ( 'alt' === $atts['controls'] ) {
		$atts['controls'] = 'yes';
	}

	$url_params = array();
	$yt_options = array(
		'autohide',
		'autoplay',
		'mute',
		'controls',
		'fs',
		'loop',
		'modestbranding',
		'playlist',
		'rel',
		'showinfo',
		'theme',
		'wmode',
		'playsinline',
	);

	foreach ( $yt_options as $yt_option ) {
		$url_params[ $yt_option ] = str_replace( array( 'no', 'yes', 'alt' ), array( '0', '1', '2' ), $atts[ $yt_option ] );
	}

	if ( '1' === $url_params['loop'] && '' === $url_params['playlist'] ) {
		$url_params['playlist'] = $video_id;
	}

	if ( empty( $url_params['playlist'] ) ) {
		unset( $url_params['playlist'] );
	}

	$url_params = http_build_query( $url_params );

	$domain = strpos( $atts['url'], 'youtube-nocookie.com' ) !== false
		? 'www.youtube-nocookie.com'
		: 'www.youtube.com';

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-youtube su-u-responsive-media-' . esc_attr( $atts['responsive'] ) . su_get_css_class( $atts ) . '"><iframe width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" src="https://' . $domain . '/embed/' . $video_id . '?' . esc_attr( $url_params ) . '" frameborder="0" allowfullscreen allow="autoplay; encrypted-media; picture-in-picture" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';

}
