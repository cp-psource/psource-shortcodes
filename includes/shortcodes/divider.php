<?php

su_add_shortcode(
	array(
		'id'       => 'divider',
		'callback' => 'su_shortcode_divider',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/divider.svg',
		'name'     => __( 'Divider', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'content',
		'atts'     => array(
			'top'           => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Show TOP link', 'upfront-shortcodes' ),
				'desc'    => __( 'Show link to top of the page or not', 'upfront-shortcodes' ),
			),
			'text'          => array(
				'default' => __( 'Go to top', 'upfront-shortcodes' ),
				'name'    => __( 'Link text', 'upfront-shortcodes' ),
				'desc'    => __( 'Text for the GO TOP link', 'upfront-shortcodes' ),
			),
			'anchor'        => array(
				'default' => '#',
				'name'    => __( 'Top link anchor', 'upfront-shortcodes' ),
				'desc'    => __( 'Use this option to set a custom anchor for the Go to top link', 'upfront-shortcodes' ),
			),
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'dotted'  => __( 'Dotted', 'upfront-shortcodes' ),
					'dashed'  => __( 'Dashed', 'upfront-shortcodes' ),
					'double'  => __( 'Double', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose style for this divider', 'upfront-shortcodes' ),
			),
			'divider_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#999999',
				'name'    => __( 'Divider color', 'upfront-shortcodes' ),
				'desc'    => __( 'Pick the color for divider', 'upfront-shortcodes' ),
			),
			'link_color'    => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#999999',
				'name'    => __( 'Link color', 'upfront-shortcodes' ),
				'desc'    => __( 'Pick the color for TOP link', 'upfront-shortcodes' ),
			),
			'size'          => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 40,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Size', 'upfront-shortcodes' ),
				'desc'    => __( 'Height of the divider (in pixels)', 'upfront-shortcodes' ),
			),
			'margin'        => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 200,
				'step'    => 5,
				'default' => 15,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Content divider with optional TOP link', 'upfront-shortcodes' ),
		'icon'     => 'ellipsis-h',
	)
);

function su_shortcode_divider( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts( 'divider', $atts );

	$atts['margin']        = intval( $atts['margin'] );
	$atts['size']          = intval( $atts['size'] );
	$atts['divider_color'] = sanitize_text_field( $atts['divider_color'] );
	$atts['link_color']    = sanitize_text_field( $atts['link_color'] );
	$atts['anchor']        = sanitize_html_class( $atts['anchor'] );

	$top_link  = '';
	$div_style = array(
		"margin:{$atts['margin']}px 0",
		"border-width:{$atts['size']}px",
		"border-color:{$atts['divider_color']}",
	);
	$a_style   = array( "color:{$atts['link_color']}" );

	if ( 'yes' === $atts['top'] ) {

		$top_link = sprintf(
			'<a href="#%1$s"%2$s>%3$s</a>',
			$atts['anchor'],
			su_html_style( $a_style ),
			su_do_attribute( $atts['text'] )
		);

	}

	su_query_asset( 'css', 'su-shortcodes' );

	return sprintf(
		'<div class="su-divider su-divider-style-%1$s%2$s"%3$s>%4$s</div>',
		sanitize_key( $atts['style'] ),
		su_get_css_class( $atts ),
		su_html_style( $div_style ),
		$top_link
	);

}
