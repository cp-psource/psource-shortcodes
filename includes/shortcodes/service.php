<?php

su_add_shortcode(
	array(
		'id'       => 'service',
		'callback' => 'su_shortcode_service',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/service.svg',
		'name'     => __( 'Service', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'title'      => array(
				'values'  => array(),
				'default' => __( 'Service title', 'upfront-shortcodes' ),
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'Service name', 'upfront-shortcodes' ),
			),
			'icon'       => array(
				'type'    => 'icon',
				'default' => 'icon: star',
				'name'    => __( 'Icon', 'upfront-shortcodes' ),
				'desc'    => __( 'You can upload custom icon for this box', 'upfront-shortcodes' ),
			),
			'icon_color' => array(
				'type'    => 'color',
				'default' => '#333333',
				'name'    => __( 'Icon color', 'upfront-shortcodes' ),
				'desc'    => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'upfront-shortcodes' ),
			),
			'size'       => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 128,
				'step'    => 2,
				'default' => 32,
				'name'    => __( 'Icon size', 'upfront-shortcodes' ),
				'desc'    => __( 'Size of the uploaded icon in pixels', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Service description', 'upfront-shortcodes' ),
		'desc'     => __( 'Service box with title', 'upfront-shortcodes' ),
		'icon'     => 'check-square-o',
	)
);

function su_shortcode_service( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'title'      => __( 'Service title', 'upfront-shortcodes' ),
			'icon'       => 'icon: star',
			'icon_color' => '#333',
			'size'       => 32,
			'class'      => '',
		),
		$atts,
		'service'
	);

	// RTL
	$rtl = is_rtl()
		? 'right'
		: 'left';

	if ( strpos( $atts['icon'], 'icon:' ) !== false ) {

		$atts['icon'] = sprintf(
			'<i class="sui sui-%s" style="font-size:%spx;color:%s"></i>',
			esc_attr( trim( str_replace( 'icon:', '', $atts['icon'] ) ) ),
			intval( $atts['size'] ),
			esc_attr( $atts['icon_color'] )
		);

		su_query_asset( 'css', 'su-icons' );

	} else {
		$atts['icon'] = sprintf(
			'<img src="%1$s" width="%2$s" height="%2$s" alt="%3$s" style="width:%2$spx;height:%2$spx" />',
			esc_attr( $atts['icon'] ),
			intval( $atts['size'] ),
			esc_attr( $atts['title'] )
		);
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-service' . su_get_css_class( $atts ) . '"><div class="su-service-title" style="padding-' . $rtl . ':' . round( intval( $atts['size'] ) + 14 ) . 'px;min-height:' . $atts['size'] . 'px;line-height:' . $atts['size'] . 'px">' . $atts['icon'] . ' ' . su_do_attribute( $atts['title'] ) . '</div><div class="su-service-content su-u-clearfix su-u-trim" style="padding-' . $rtl . ':' . round( intval( $atts['size'] ) + 14 ) . 'px">' . do_shortcode( $content ) . '</div></div>';

}
