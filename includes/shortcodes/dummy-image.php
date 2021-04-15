<?php

su_add_shortcode( array(
		'id' => 'dummy_image',
		'callback' => 'su_shortcode_dummy_image',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/dummy_image.svg',
		'name' => __( 'Dummy image', 'upfront-shortcodes' ),
		'type' => 'single',
		'group' => 'content',
		'atts' => array(
			'width' => array(
				'type' => 'slider',
				'min' => 10,
				'max' => 1600,
				'step' => 10,
				'default' => 500,
				'name' => __( 'Width', 'upfront-shortcodes' ),
				'desc' => __( 'Image width', 'upfront-shortcodes' )
			),
			'height' => array(
				'type' => 'slider',
				'min' => 10,
				'max' => 1600,
				'step' => 10,
				'default' => 300,
				'name' => __( 'Height', 'upfront-shortcodes' ),
				'desc' => __( 'Image height', 'upfront-shortcodes' )
			),
			'theme' => array(
				'type' => 'select',
				'values' => array(
					'any'       => __( 'Any', 'upfront-shortcodes' ),
					'abstract'  => __( 'Abstract', 'upfront-shortcodes' ),
					'animals'   => __( 'Animals', 'upfront-shortcodes' ),
					'business'  => __( 'Business', 'upfront-shortcodes' ),
					'cats'      => __( 'Cats', 'upfront-shortcodes' ),
					'city'      => __( 'City', 'upfront-shortcodes' ),
					'food'      => __( 'Food', 'upfront-shortcodes' ),
					'nightlife' => __( 'Night life', 'upfront-shortcodes' ),
					'fashion'   => __( 'Fashion', 'upfront-shortcodes' ),
					'people'    => __( 'People', 'upfront-shortcodes' ),
					'nature'    => __( 'Nature', 'upfront-shortcodes' ),
					'sports'    => __( 'Sports', 'upfront-shortcodes' ),
					'technics'  => __( 'Technics', 'upfront-shortcodes' ),
					'transport' => __( 'Transport', 'upfront-shortcodes' )
				),
				'default' => 'any',
				'name' => __( 'Theme', 'upfront-shortcodes' ),
				'desc' => __( 'Select the theme for this image', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc' => __( 'Image placeholder with random image', 'upfront-shortcodes' ),
		'icon' => 'picture-o',
	) );

function su_shortcode_dummy_image( $atts = null, $content = null ) {
	$atts = shortcode_atts( array(
			'width'  => 500,
			'height' => 300,
			'theme'  => 'any',
			'class'  => ''
		), $atts, 'dummy_image' );
	$url = 'http://lorempixel.com/' . $atts['width'] . '/' . $atts['height'] . '/';
	if ( $atts['theme'] !== 'any' ) $url .= $atts['theme'] . '/' . rand( 0, 10 ) . '/';
	return '<img src="' . $url . '" alt="' . __( 'Dummy image', 'upfront-shortcodes' ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" class="su-dummy-image' . su_get_css_class( $atts ) . '" />';
}
