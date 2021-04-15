<?php

su_add_shortcode( array(
		'id' => 'highlight',
		'callback' => 'su_shortcode_highlight',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/highlight.svg',
		'name' => __( 'Highlight', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'content',
		'atts' => array(
			'background' => array(
				'type' => 'color',
				'values' => array( ),
				'default' => '#DDFF99',
				'name' => __( 'Background', 'upfront-shortcodes' ),
				'desc' => __( 'Highlighted text background color', 'upfront-shortcodes' )
			),
			'color' => array(
				'type' => 'color',
				'values' => array( ),
				'default' => '#000000',
				'name' => __( 'Text color', 'upfront-shortcodes' ), 'desc' => __( 'Highlighted text color', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Highlighted text', 'upfront-shortcodes' ),
		'desc' => __( 'Highlighted text', 'upfront-shortcodes' ),
		'icon' => 'pencil',
	) );

function su_shortcode_highlight( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'background' => '#ddff99',
			'bg'         => null, // 3.x
			'color'      => '#000000',
			'class'      => ''
		), $atts, 'highlight' );

	if ( $atts['bg'] !== null ) {
		$atts['background'] = $atts['bg'];
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<span class="su-highlight' . su_get_css_class( $atts ) . '" style="background:' . $atts['background'] . ';color:' . $atts['color'] . '">&nbsp;' . do_shortcode( $content ) . '&nbsp;</span>';

}
