<?php

su_add_shortcode(
	array(
		'id'       => 'youtube',
		'callback' => 'su_shortcode_youtube',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/youtube.svg',
		'name'     => __( 'YouTube', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'url'        => array(
				'default' => '',
				'name'    => __( 'Url', 'upfront-shortcodes' ),
				'desc'    => __( 'URL der YouTube-Seite mit Video. zB: http://youtube.com/watch?v=XXXXXX', 'upfront-shortcodes' ),
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
				'desc'    => __( 'Ignoriere die Parameter für Breite und Höhe und sorge dafür, dass der Player responiv reagiert', 'upfront-shortcodes' ),
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
			'title'      => array(
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Eine kurze Beschreibung des eingebetteten Inhalts (von Screenreadern verwendet)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'YouTube Video', 'upfront-shortcodes' ),
		'example'  => 'media',
		'icon'     => 'youtube-play',
	)
);

function su_shortcode_youtube( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => false,
			'width'      => 600,
			'height'     => 400,
			'autoplay'   => 'no',
			'mute'       => 'no',
			'responsive' => 'yes',
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'youtube'
	);

	if ( ! $atts['url'] ) {
		return su_error_message( 'YouTube', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );

	$video_id = preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match )
		? $match[1]
		: false;

	if ( ! $video_id ) {
		return su_error_message( 'YouTube', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$url_params = array();

	if ( 'yes' === $atts['autoplay'] ) {
		$url_params['autoplay'] = '1';
	}

	if ( 'yes' === $atts['mute'] ) {
		$url_params['mute'] = '1';
	}

	$domain = strpos( $atts['url'], 'youtube-nocookie.com' ) !== false
		? 'www.youtube-nocookie.com'
		: 'www.youtube.com';

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-youtube su-u-responsive-media-' . $atts['responsive'] . su_get_css_class( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="https://' . $domain . '/embed/' . $video_id . '?' . http_build_query( $url_params ) . '" frameborder="0" allowfullscreen allow="autoplay; encrypted-media; picture-in-picture" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';

}
