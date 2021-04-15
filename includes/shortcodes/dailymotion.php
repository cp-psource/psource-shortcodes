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
				'desc'    => __( 'Url of Dailymotion page with video', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Width', 'upfront-shortcodes' ),
				'desc'    => __( 'Player width', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 400,
				'name'    => __( 'Height', 'upfront-shortcodes' ),
				'desc'    => __( 'Player height', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsive', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignore width and height parameters and make player responsive', 'upfront-shortcodes' ),
			),
			'autoplay'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'upfront-shortcodes' ),
			),
			'background' => array(
				'type'    => 'color',
				'default' => '#FFC300',
				'name'    => __( 'Background color', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML color of the background of controls elements', 'upfront-shortcodes' ),
			),
			'foreground' => array(
				'type'    => 'color',
				'default' => '#F7FFFD',
				'name'    => __( 'Foreground color', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML color of the foreground of controls elements', 'upfront-shortcodes' ),
			),
			'highlight'  => array(
				'type'    => 'color',
				'default' => '#171D1B',
				'name'    => __( 'Highlight color', 'upfront-shortcodes' ),
				'desc'    => __( 'HTML color of the controls elements\' highlights', 'upfront-shortcodes' ),
			),
			'logo'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Show logo', 'upfront-shortcodes' ),
				'desc'    => __( 'Allows to hide or show the Dailymotion logo', 'upfront-shortcodes' ),
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
				'name'    => __( 'Quality', 'upfront-shortcodes' ),
				'desc'    => __( 'Determines the quality that must be played by default if available', 'upfront-shortcodes' ),
			),
			'related'    => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Show related videos', 'upfront-shortcodes' ),
				'desc'    => __( 'Show related videos at the end of the video', 'upfront-shortcodes' ),
			),
			'info'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Show video info', 'upfront-shortcodes' ),
				'desc'    => __( 'Show videos info (title/author) on the start screen', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'A brief description of the embedded content (used by screenreaders)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Dailymotion video', 'upfront-shortcodes' ),
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
		return su_error_message( 'Dailymotion', __( 'please specify correct url', 'upfront-shortcodes' ) );
	}

	$atts['url'] = su_do_attribute( $atts['url'] );
	$id          = strtok( basename( $atts['url'] ), '_' );

	if ( ! $id ) {
		return su_error_message( 'Screenr', __( 'please specify correct url', 'upfront-shortcodes' ) );
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

	return '<div class="su-dailymotion su-u-responsive-media-' . $atts['responsive'] . su_get_css_class( $atts ) . '"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="//www.dailymotion.com/embed/video/' . $id . '?' . implode( '&', $params ) . '" frameborder="0" allowfullscreen="true" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';

}
