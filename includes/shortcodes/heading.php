<?php

su_add_shortcode(
	array(
		'id'       => 'heading',
		'callback' => 'su_shortcode_heading',
		'name'     => __( 'Heading', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'content',
		'atts'     => array(
			'style'  => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose style for this heading', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'size'   => array(
				'type'    => 'slider',
				'min'     => 7,
				'max'     => 48,
				'step'    => 1,
				'default' => 13,
				'name'    => __( 'Size', 'upfront-shortcodes' ),
				'desc'    => __( 'Select heading size (pixels)', 'upfront-shortcodes' ),
			),
			'align'  => array(
				'type'    => 'select',
				'values'  => array(
					'left'   => __( 'Left', 'upfront-shortcodes' ),
					'center' => __( 'Center', 'upfront-shortcodes' ),
					'right'  => __( 'Right', 'upfront-shortcodes' ),
				),
				'default' => 'center',
				'name'    => __( 'Align', 'upfront-shortcodes' ),
				'desc'    => __( 'Heading text alignment', 'upfront-shortcodes' ),
			),
			'margin' => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 200,
				'step'    => 10,
				'default' => 20,
				'name'    => __( 'Margin', 'upfront-shortcodes' ),
				'desc'    => __( 'Bottom margin (pixels)', 'upfront-shortcodes' ),
			),
			'id'     => array(
				'name'    => __( 'HTML Anchor (ID)', 'upfront-shortcodes' ),
				'desc'    => __( 'Anchors lets you link directly to a heading on a page.', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Heading text', 'upfront-shortcodes' ),
		'desc'     => __( 'Styled heading', 'upfront-shortcodes' ),
		'icon'     => 'h-square',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/heading.svg',
	)
);

function su_shortcode_heading( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'style'  => 'default',
			'size'   => 13,
			'align'  => 'center',
			'margin' => '20',
			'id'     => '',
			'class'  => '',
		),
		$atts,
		'heading'
	);

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-heading su-heading-style-' . $atts['style'] . ' su-heading-align-' . $atts['align'] . su_get_css_class( $atts ) . '" id="' . esc_attr( $atts['id'] ) . '" style="font-size:' . intval( $atts['size'] ) . 'px;margin-bottom:' . $atts['margin'] . 'px"><div class="su-heading-inner">' . do_shortcode( $content ) . '</div></div>';

}
