<?php

su_add_shortcode(
	array(
		'id'       => 'animate',
		'callback' => 'su_shortcode_animate',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/animate.svg',
		'name'     => __( 'Animation', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'other',
		'atts'     => array(
			'type'     => array(
				'type'    => 'select',
				'values'  => array_combine( su_get_config( 'animations' ), su_get_config( 'animations' ) ),
				'default' => 'bounceIn',
				'name'    => __( 'Animation', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Animationstyp', 'upfront-shortcodes' ),
			),
			'duration' => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 20,
				'step'    => 0.5,
				'default' => 1,
				'name'    => __( 'Dauer', 'upfront-shortcodes' ),
				'desc'    => __( 'Animationsdauer (Sekunden)', 'upfront-shortcodes' ),
			),
			'delay'    => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 20,
				'step'    => 0.5,
				'default' => 0,
				'name'    => __( 'Verzögerung', 'upfront-shortcodes' ),
				'desc'    => __( 'Animationsverzögerung (Sekunden)', 'upfront-shortcodes' ),
			),
			'inline'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Inline', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Parameter bestimmt, welches HTML-Tag für den Animations-Wrapper verwendet wird. Wenn Du diese Option auf JA setzt, wird das animierte Element in SPAN anstelle von DIV eingeschlossen. Nützlich für Inline-Animationen wie Schaltflächen', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Animierter Inhalt', 'upfront-shortcodes' ),
		'desc'     => __( 'Wrapper für Animation. Jedes verschachtelte Element wird animiert', 'upfront-shortcodes' ),
		'example'  => 'animations',
		'icon'     => 'bolt',
	)
);

function su_shortcode_animate( $atts = null, $content = null ) {
	$atts   = shortcode_atts(
		array(
			'type'     => 'bounceIn',
			'duration' => 1,
			'delay'    => 0,
			'inline'   => 'no',
			'class'    => '',
		),
		$atts,
		'animate'
	);
	$tag    = ( $atts['inline'] === 'yes' ) ? 'span' : 'div';
	$time   = '-webkit-animation-duration:' . $atts['duration'] . 's;-webkit-animation-delay:' . $atts['delay'] . 's;animation-duration:' . $atts['duration'] . 's;animation-delay:' . $atts['delay'] . 's;';
	$return = '<' . $tag . ' class="su-animate' . su_get_css_class( $atts ) . '" style="opacity:0;' . esc_attr( $time ) . '" data-animation="' . esc_attr( $atts['type'] ) . '" data-duration="' . esc_attr( $atts['duration'] ) . '" data-delay="' . esc_attr( $atts['delay'] ) . '">' . do_shortcode( $content ) . '</' . $tag . '>';
	su_query_asset( 'css', 'animate' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'jquery-inview' );
	su_query_asset( 'js', 'su-shortcodes' );
	return $return;
}
