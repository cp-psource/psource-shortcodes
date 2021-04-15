<?php

su_add_shortcode(
	array(
		'id'       => 'gmap',
		'callback' => 'su_shortcode_gmap',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/gmap.svg',
		'name'     => __( 'Google map', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'media',
		'atts'     => array(
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Width', 'upfront-shortcodes' ),
				'desc'    => __( 'Map width', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 400,
				'name'    => __( 'Height', 'upfront-shortcodes' ),
				'desc'    => __( 'Map height', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsive', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignore width and height parameters and make map responsive', 'upfront-shortcodes' ),
			),
			'address'    => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Marker', 'upfront-shortcodes' ),
				'desc'    => __( 'Address for the marker. You can type it in any language', 'upfront-shortcodes' ),
			),
			'zoom'       => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 21,
				'step'    => 1,
				'default' => 0,
				'name'    => __( 'Zoom', 'upfront-shortcodes' ),
				'desc'    => __( 'Zoom sets the initial zoom level of the map. Accepted values range from 1 (the whole world) to 21 (individual buildings). Use 0 (zero) to set zoom level depending on displayed object (automatic)', 'upfront-shortcodes' ),
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
		'desc'     => __( 'Maps by Google', 'upfront-shortcodes' ),
		'icon'     => 'globe',
	)
);

function su_shortcode_gmap( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'width'      => 600,
			'height'     => 400,
			'responsive' => 'yes',
			'address'    => 'Moscow',
			'zoom'       => 0,
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'gmap'
	);

	$atts['zoom'] = is_numeric( $atts['zoom'] ) && $atts['zoom'] > 0
		? '&amp;z=' . $atts['zoom']
		: '';

	su_query_asset( 'css', 'su-shortcodes' );

	return sprintf(
		'<div class="su-gmap su-u-responsive-media-%s%s"><iframe width="%s" height="%s" src="//maps.google.com/maps?q=%s&amp;output=embed%s" title="%s"></iframe></div>',
		esc_attr( $atts['responsive'] ),
		su_get_css_class( $atts ),
		intval( $atts['width'] ),
		intval( $atts['height'] ),
		rawurlencode( su_do_attribute( $atts['address'] ) ),
		$atts['zoom'],
		esc_attr( $atts['title'] )
	);

}
