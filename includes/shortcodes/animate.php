<?php

su_add_shortcode( array(
		'id' => 'animate',
		'callback' => 'su_shortcode_animate',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/animate.svg',
		'name' => __( 'Animation', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'other',
		'atts' => array(
			'type' => array(
				'type' => 'select',
				'values' => array_combine( su_get_config( 'animations' ), su_get_config( 'animations' ) ),
				'default' => 'bounceIn',
				'name' => __( 'Animation', 'upfront-shortcodes' ),
				'desc' => __( 'Select animation type', 'upfront-shortcodes' )
			),
			'duration' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 20,
				'step' => 0.5,
				'default' => 1,
				'name' => __( 'Duration', 'upfront-shortcodes' ),
				'desc' => __( 'Animation duration (seconds)', 'upfront-shortcodes' )
			),
			'delay' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 20,
				'step' => 0.5,
				'default' => 0,
				'name' => __( 'Delay', 'upfront-shortcodes' ),
				'desc' => __( 'Animation delay (seconds)', 'upfront-shortcodes' )
			),
			'inline' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Inline', 'upfront-shortcodes' ),
				'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Animated content', 'upfront-shortcodes' ),
		'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'upfront-shortcodes' ),
		'example' => 'animations',
		'icon' => 'bolt',
	) );

function su_shortcode_animate( $atts = null, $content = null ) {
	$atts = shortcode_atts( array(
			'type'      => 'bounceIn',
			'duration'  => 1,
			'delay'     => 0,
			'inline'    => 'no',
			'class'     => ''
		), $atts, 'animate' );
	$tag = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
	$time = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
	$return = '<' . $tag . ' class="su-animate' . su_get_css_class( $atts ) . '" style="visibility:hidden;' . $time . '" data-animation="' . $atts['type'] . '" data-duration="' . $atts['duration'] . '" data-delay="' . $atts['delay'] . '">' . do_shortcode( $content ) . '</' . $tag . '>';
	su_query_asset( 'css', 'animate' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'jquery-inview' );
	su_query_asset( 'js', 'su-shortcodes' );
	return $return;
}
