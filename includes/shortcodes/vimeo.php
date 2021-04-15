<?php

su_add_shortcode(
	array(
		'id'       => 'vimeo',
		'callback' => 'su_shortcode_vimeo',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/vimeo.svg',
		'name'     => __( 'Vimeo', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'url'        => array(
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'URL der Vimeo-Seite mit Video', 'upfront-shortcodes' ),
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
				'desc'    => __( 'Ignoriere die Parameter für Breite und Höhe und sorge dafür, dass der Player responsiv reagiert', 'upfront-shortcodes' ),
			),
			'autoplay'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter gibt an, ob das Video beim Laden des Players automatisch abgespielt wird. Bitte beachte, dass in modernen Browsern die Autoplay-Option nur mit aktivierter Stummschaltoption funktioniert', 'upfront-shortcodes' ),
			),
			'mute'       => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Stumm', 'upfront-shortcodes' ),
				'desc'    => __( 'Schalte den Player stumm', 'upfront-shortcodes' ),
			),
			'dnt'        => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Nicht verfolgen', 'upfront-shortcodes' ),
				'desc'    => __( 'Wenn Du diesen Parameter auf YES setzt, kann der Player keine Wiedergabesitzungsdaten verfolgen. Hat den gleichen Effekt wie das Aktivieren eines Do Not Track-Headers in Deinem Browser', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Eine kurze Beschreibung des eingebetteten Inhalts (von Screenreadern verwendet)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'texttrack'  => array(
				'name'    => __( 'Untertitel', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende den Sprachcode als Wert, um Untertitel zu aktivieren. Beispielwerte: en, de', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Vimeo Video', 'upfront-shortcodes' ),
		'example'  => 'media',
		'icon'     => 'youtube-play',
	)
);

function su_shortcode_vimeo( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => '',
			'width'      => 600,
			'height'     => 400,
			'autoplay'   => 'no',
			'dnt'        => 'no',
			'mute'       => 'no',
			'responsive' => 'yes',
			'title'      => '',
			'texttrack'  => '',
			'class'      => '',
		),
		$atts,
		'vimeo'
	);

	if ( ! $atts['url'] ) {
		return su_error_message( 'Vimeo', __( 'bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );

	$video_id = preg_match( '~(?:<iframe [^>]*src=")?(?:https?:\/\/(?:[\w]+\.)*vimeo\.com(?:[\/\w]*\/videos?)?\/([0-9]+)[^\s]*)"?(?:[^>]*></iframe>)?(?:<p>.*</p>)?~ix', $atts['url'], $match )
		? $match[1]
		: false;

	if ( ! $video_id ) {
		return su_error_message( 'Vimeo', __( 'bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$url_params = array(
		'title'     => 0,
		'byline'    => 0,
		'portrait'  => 0,
		'color'     => 'ffffff',
		'autoplay'  => 'yes' === $atts['autoplay'] ? 1 : 0,
		'dnt'       => 'yes' === $atts['dnt'] ? 1 : 0,
		'muted'     => 'yes' === $atts['mute'] ? 1 : 0,
		'texttrack' => $atts['texttrack'],
	);

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-vimeo su-u-responsive-media-' . $atts['responsive'] . su_get_css_class( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//player.vimeo.com/video/' . $video_id . '?' . esc_attr( http_build_query( $url_params ) ) . '" frameborder="0" allow="autoplay; fullscreen" allowfullscreen title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';

}
