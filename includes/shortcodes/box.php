<?php

su_add_shortcode(
	array(
		'id'       => 'box',
		'callback' => 'su_shortcode_box',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/box.svg',
		'name'     => __( 'Box', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'title'       => array(
				'values'  => array(),
				'default' => __( 'Box title', 'upfront-shortcodes' ),
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'Text for the box title', 'upfront-shortcodes' ),
			),
			'style'       => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'soft'    => __( 'Soft', 'upfront-shortcodes' ),
					'glass'   => __( 'Glass', 'upfront-shortcodes' ),
					'bubbles' => __( 'Bubbles', 'upfront-shortcodes' ),
					'noise'   => __( 'Noise', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Box style preset', 'upfront-shortcodes' ),
			),
			'box_color'   => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#333333',
				'name'    => __( 'Color', 'upfront-shortcodes' ),
				'desc'    => __( 'Color for the box title and borders', 'upfront-shortcodes' ),
			),
			'title_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#FFFFFF',
				'name'    => __( 'Title text color', 'upfront-shortcodes' ),
				'desc'    => __( 'Color for the box title text', 'upfront-shortcodes' ),
			),
			'radius'      => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Radius', 'upfront-shortcodes' ),
				'desc'    => __( 'Box corners radius', 'upfront-shortcodes' ),
			),
			'class'       => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
			'id'          => array(
				'name'    => __( 'HTML Anchor', 'upfront-shortcodes' ),
				'desc'    => __( 'Enter a word or two, without spaces, to make a unique web address just for this element. Then, you\'ll be able to link directly to this section of your page.', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Box content', 'upfront-shortcodes' ),
		'desc'     => __( 'Colored box with caption', 'upfront-shortcodes' ),
		'icon'     => 'list-alt',
	)
);

function su_shortcode_box( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'title'       => __( 'This is box title', 'upfront-shortcodes' ),
			'style'       => 'default',
			'box_color'   => '#333333',
			'title_color' => '#FFFFFF',
			'color'       => null, // 3.x
			'radius'      => '3',
			'class'       => '',
			'id'          => '',
		),
		$atts,
		'box'
	);

	if ( null !== $atts['color'] ) {
		$atts['box_color'] = $atts['color'];
	}

	$atts['radius'] = is_numeric( $atts['radius'] )
		? intval( $atts['radius'] )
		: 0;

	$atts['inner_radius'] = $atts['radius'] > 2
		? $atts['radius'] - 2
		: 0;

	su_query_asset( 'css', 'su-shortcodes' );

	// Return result
	return sprintf(
		'<div class="su-box su-box-style-%1$s%2$s" id="%10$s" style="border-color:%3$s;border-radius:%4$spx"><div class="su-box-title" style="background-color:%5$s;color:%6$s;border-top-left-radius:%7$spx;border-top-right-radius:%7$spx">%8$s</div><div class="su-box-content su-u-clearfix su-u-trim" style="border-bottom-left-radius:%7$spx;border-bottom-right-radius:%7$spx">%9$s</div></div>',
		esc_attr( $atts['style'] ),
		su_get_css_class( $atts ),
		su_adjust_brightness( $atts['box_color'], -20 ),
		$atts['radius'],
		$atts['box_color'],
		$atts['title_color'],
		$atts['inner_radius'],
		su_do_attribute( $atts['title'] ),
		su_do_nested_shortcodes( $content, 'box' ),
		sanitize_html_class( $atts['id'] )
	);

}
