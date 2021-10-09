<?php

su_add_shortcode(
	array(
		'id'       => 'video',
		'callback' => 'su_shortcode_video',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/video.svg',
		'name'     => __( 'Video', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'url'      => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'Datei', 'upfront-shortcodes' ),
				'desc'    => __( 'Url zur mp4/flv Videodatei', 'upfront-shortcodes' ),
			),
			'poster'   => array(
				'type'    => 'upload',
				'default' => '',
				'name'    => __( 'Poster', 'upfront-shortcodes' ),
				'desc'    => __( 'URL zum Posterbild, das vor der Wiedergabe angezeigt wird', 'upfront-shortcodes' ),
			),
			'title'    => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Playertitel', 'upfront-shortcodes' ),
			),
			'width'    => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerbreite', 'upfront-shortcodes' ),
			),
			'height'   => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 300,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Playerhöhe', 'upfront-shortcodes' ),
			),
			'controls' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Kontrollen', 'upfront-shortcodes' ),
				'desc'    => __( 'Player-Steuerelemente anzeigen (Wiedergabe/Pause usw.) oder nicht', 'upfront-shortcodes' ),
			),
			'autoplay' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Datei automatisch abspielen, wenn Seite geladen wird', 'upfront-shortcodes' ),
			),
			'loop'     => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Schleife', 'upfront-shortcodes' ),
				'desc'    => __( 'Wiederholen, wenn die Wiedergabe beendet ist', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Benutzerdefinierter Videoplayer', 'upfront-shortcodes' ),
		'example'  => 'media',
		'icon'     => 'play-circle',
	)
);

function su_shortcode_video( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'      => false,
			'poster'   => false,
			'title'    => '',
			'width'    => 600,
			'height'   => 300,
			'controls' => 'yes',
			'autoplay' => 'no',
			'loop'     => 'no',
			'class'    => '',
		),
		$atts,
		'video'
	);

	if ( ! $atts['url'] ) {
		return su_error_message( 'Video', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );

	$id = uniqid( 'su_video_player_' );

	if ( ! $atts['url'] ) {
		return su_error_message( 'Video', __( 'Bitte gib die richtige URL an', 'upfront-shortcodes' ) );
	}

	$title = $atts['title']
		? '<div class="jp-title">' . $atts['title'] . '</div>'
		: '';

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'jplayer' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<div style="width:' . esc_attr( $atts['width'] ) . 'px"><div id="' . $id . '" class="su-video jp-video su-video-controls-' . esc_attr( $atts['controls'] ) . su_get_css_class( $atts ) . '" data-id="' . $id . '" data-video="' . esc_attr( $atts['url'] ) . '" data-swf="' . plugins_url( 'vendor/jplayer/jplayer.swf', SU_PLUGIN_FILE ) . '" data-autoplay="' . esc_attr( $atts['autoplay'] ) . '" data-loop="' . esc_attr( $atts['loop'] ) . '" data-poster="' . esc_attr( $atts['poster'] ) . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . esc_attr( $atts['width'] ) . 'px;height:' . esc_attr( $atts['height'] ) . 'px"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';

}
