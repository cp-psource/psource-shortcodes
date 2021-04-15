<?php

su_add_shortcode( array(
		'id' => 'video',
		'callback' => 'su_shortcode_video',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/video.svg',
		'name' => __( 'Video', 'upfront-shortcodes' ),
		'type' => 'single',
		'group' => 'media',
		'atts' => array(
			'url' => array(
				'type' => 'upload',
				'default' => '',
				'name' => __( 'File', 'upfront-shortcodes' ),
				'desc' => __( 'Url to mp4/flv video-file', 'upfront-shortcodes' )
			),
			'poster' => array(
				'type' => 'upload',
				'default' => '',
				'name' => __( 'Poster', 'upfront-shortcodes' ),
				'desc' => __( 'Url to poster image, that will be shown before playback', 'upfront-shortcodes' )
			),
			'title' => array(
				'values' => array( ),
				'default' => '',
				'name' => __( 'Title', 'upfront-shortcodes' ),
				'desc' => __( 'Player title', 'upfront-shortcodes' )
			),
			'width' => array(
				'type' => 'slider',
				'min' => 200,
				'max' => 1600,
				'step' => 20,
				'default' => 600,
				'name' => __( 'Width', 'upfront-shortcodes' ),
				'desc' => __( 'Player width', 'upfront-shortcodes' )
			),
			'height' => array(
				'type' => 'slider',
				'min' => 200,
				'max' => 1600,
				'step' => 20,
				'default' => 300,
				'name' => __( 'Height', 'upfront-shortcodes' ),
				'desc' => __( 'Player height', 'upfront-shortcodes' )
			),
			'controls' => array(
				'type' => 'bool',
				'default' => 'yes',
				'name' => __( 'Controls', 'upfront-shortcodes' ),
				'desc' => __( 'Show player controls (play/pause etc.) or not', 'upfront-shortcodes' )
			),
			'autoplay' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc' => __( 'Play file automatically when page is loaded', 'upfront-shortcodes' )
			),
			'loop' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Loop', 'upfront-shortcodes' ),
				'desc' => __( 'Repeat when playback is ended', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc' => __( 'Custom video player', 'upfront-shortcodes' ),
		'example' => 'media',
		'icon' => 'play-circle',
	) );

function su_shortcode_video( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'url'      => false,
			'poster'   => false,
			'title'    => '',
			'width'    => 600,
			'height'   => 300,
			'controls' => 'yes',
			'autoplay' => 'no',
			'loop'     => 'no',
			'class'    => ''
		), $atts, 'video' );

	if ( ! $atts['url'] ) {
		return su_error_message( 'Video', __( 'please specify correct url', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );

	$id = uniqid( 'su_video_player_' );

	if ( ! $atts['url'] ) {
		return su_error_message( 'Video', __( 'please specify correct url', 'upfront-shortcodes' ) );
	}

	$title = $atts['title']
		? '<div class="jp-title">' . $atts['title'] . '</div>'
		: '';

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'jplayer' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<div style="width:' . $atts['width'] . 'px"><div id="' . $id . '" class="su-video jp-video su-video-controls-' . $atts['controls'] . su_get_css_class( $atts ) . '" data-id="' . $id . '" data-video="' . $atts['url'] . '" data-swf="' . plugins_url( 'vendor/jplayer/jplayer.swf', SU_PLUGIN_FILE ) . '" data-autoplay="' . $atts['autoplay'] . '" data-loop="' . $atts['loop'] . '" data-poster="' . $atts['poster'] . '"><div id="' . $id . '_player" class="jp-jplayer" style="width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px"></div>' . $title . '<div class="jp-start jp-play"></div><div class="jp-gui"><div class="jp-interface"><div class="jp-progress"><div class="jp-seek-bar"><div class="jp-play-bar"></div></div></div><div class="jp-current-time"></div><div class="jp-duration"></div><div class="jp-controls-holder"><span class="jp-play"></span><span class="jp-pause"></span><span class="jp-mute"></span><span class="jp-unmute"></span><span class="jp-full-screen"></span><span class="jp-restore-screen"></span><div class="jp-volume-bar"><div class="jp-volume-bar-value"></div></div></div></div></div></div></div>';

}
