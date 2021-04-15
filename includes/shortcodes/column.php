<?php

su_add_shortcode( array(
		'id' => 'column',
		'callback' => 'su_shortcode_column',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/column.svg',
		'name' => __( 'Column', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'required_parent' => 'row',
		'atts' => array(
			'size' => array(
				'type' => 'select',
				'values' => array(
					'1/1' => __( 'Full width', 'upfront-shortcodes' ),
					'1/2' => __( 'One half', 'upfront-shortcodes' ),
					'1/3' => __( 'One third', 'upfront-shortcodes' ),
					'2/3' => __( 'Two third', 'upfront-shortcodes' ),
					'1/4' => __( 'One fourth', 'upfront-shortcodes' ),
					'3/4' => __( 'Three fourth', 'upfront-shortcodes' ),
					'1/5' => __( 'One fifth', 'upfront-shortcodes' ),
					'2/5' => __( 'Two fifth', 'upfront-shortcodes' ),
					'3/5' => __( 'Three fifth', 'upfront-shortcodes' ),
					'4/5' => __( 'Four fifth', 'upfront-shortcodes' ),
					'1/6' => __( 'One sixth', 'upfront-shortcodes' ),
					'5/6' => __( 'Five sixth', 'upfront-shortcodes' )
				),
				'default' => '1/2',
				'name' => __( 'Size', 'upfront-shortcodes' ),
				'desc' => __( 'Select column width. This width will be calculated depend page width', 'upfront-shortcodes' )
			),
			'center' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Centered', 'upfront-shortcodes' ),
				'desc' => __( 'Is this column centered on the page', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Column content', 'upfront-shortcodes' ),
		'desc' => __( 'Flexible and responsive columns', 'upfront-shortcodes' ),
		'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'upfront-shortcodes' ),
		'example' => 'columns',
		'icon' => 'columns',
	) );

function su_shortcode_column( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'size'   => '1/2',
			'center' => 'no',
			'last'   => null,
			'class'  => ''
		), $atts, 'column' );

	if ( $atts['last'] !== null && $atts['last'] == '1' ) {
		$atts['class'] .= ' su-column-last';
	}

	if ( $atts['center'] === 'yes' ) {
		$atts['class'] .= ' su-column-centered';
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-column su-column-size-' . str_replace( '/', '-', $atts['size'] ) . su_get_css_class( $atts ) . '"><div class="su-column-inner su-u-clearfix su-u-trim">' . su_do_nested_shortcodes( $content, 'column' ) . '</div></div>';

}
