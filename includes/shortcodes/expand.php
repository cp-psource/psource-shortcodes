<?php

su_add_shortcode( array(
		'id' => 'expand',
		'callback' => 'su_shortcode_expand',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/expand.svg',
		'name' => __( 'Expand', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'atts' => array(
			'more_text' => array(
				'default' => __( 'Show more', 'upfront-shortcodes' ),
				'name' => __( 'More text', 'upfront-shortcodes' ),
				'desc' => __( 'Enter the text for more link', 'upfront-shortcodes' )
			),
			'less_text' => array(
				'default' => __( 'Show less', 'upfront-shortcodes' ),
				'name' => __( 'Less text', 'upfront-shortcodes' ),
				'desc' => __( 'Enter the text for less link', 'upfront-shortcodes' )
			),
			'height' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'default' => 100,
				'name' => __( 'Height', 'upfront-shortcodes' ),
				'desc' => __( 'Height for collapsed state (in pixels)', 'upfront-shortcodes' )
			),
			'hide_less' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Hide less link', 'upfront-shortcodes' ),
				'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'upfront-shortcodes' )
			),
			'text_color' => array(
				'type' => 'color',
				'values' => array( ),
				'default' => '#333333',
				'name' => __( 'Text color', 'upfront-shortcodes' ),
				'desc' => __( 'Pick the text color', 'upfront-shortcodes' )
			),
			'link_color' => array(
				'type' => 'color',
				'values' => array( ),
				'default' => '#0088FF',
				'name' => __( 'Link color', 'upfront-shortcodes' ),
				'desc' => __( 'Pick the link color', 'upfront-shortcodes' )
			),
			'link_style' => array(
				'type' => 'select',
				'values' => array(
					'default'    => __( 'Default', 'upfront-shortcodes' ),
					'underlined' => __( 'Underlined', 'upfront-shortcodes' ),
					'dotted'     => __( 'Dotted', 'upfront-shortcodes' ),
					'dashed'     => __( 'Dashed', 'upfront-shortcodes' ),
					'button'     => __( 'Button', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name' => __( 'Link style', 'upfront-shortcodes' ),
				'desc' => __( 'Select the style for more/less link', 'upfront-shortcodes' )
			),
			'link_align' => array(
				'type' => 'select',
				'values' => array(
					'left' => __( 'Left', 'upfront-shortcodes' ),
					'center' => __( 'Center', 'upfront-shortcodes' ),
					'right' => __( 'Right', 'upfront-shortcodes' ),
				),
				'default' => 'left',
				'name' => __( 'Link align', 'upfront-shortcodes' ),
				'desc' => __( 'Select link alignment', 'upfront-shortcodes' )
			),
			'more_icon' => array(
				'type' => 'icon',
				'default' => '',
				'name' => __( 'More icon', 'upfront-shortcodes' ),
				'desc' => __( 'Add an icon to the more link', 'upfront-shortcodes' )
			),
			'less_icon' => array(
				'type' => 'icon',
				'default' => '',
				'name' => __( 'Less icon', 'upfront-shortcodes' ),
				'desc' => __( 'Add an icon to the less link', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'This text block can be expanded', 'upfront-shortcodes' ),
		'desc' => __( 'Expandable text block', 'upfront-shortcodes' ),
		'icon' => 'sort-amount-asc',
	) );

function su_shortcode_expand( $atts = null, $content = null ) {

	$atts = shortcode_atts( array(
			'more_text'  => __( 'Show more', 'upfront-shortcodes' ),
			'less_text'  => __( 'Show less', 'upfront-shortcodes' ),
			'height'     => '100',
			'hide_less'  => 'no',
			'text_color' => '#333333',
			'link_color' => '#0088FF',
			'link_style' => 'default',
			'link_align' => 'left',
			'more_icon'  => '',
			'less_icon'  => '',
			'class'      => ''
		), $atts, 'expand' );

	// Prepare more icon
	$more_icon = ( $atts['more_icon'] ) ? su_html_icon( $atts['more_icon'] ) : '';
	$less_icon = ( $atts['less_icon'] ) ? su_html_icon( $atts['less_icon'] ) : '';

	if ( $more_icon || $less_icon ) {
		su_query_asset( 'css', 'su-icons' );
	}

	// Prepare less link
	$less = $atts['hide_less'] !== 'yes'
		? '<div class="su-expand-link su-expand-link-less" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $less_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['less_text'] . '</span></a></div>'
		: '';

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<div class="su-expand su-expand-collapsed su-expand-link-style-' . $atts['link_style'] . su_get_css_class( $atts ) . '" data-height="' . $atts['height'] . '"><div class="su-expand-content su-u-trim" style="color:' . $atts['text_color'] . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="su-expand-link su-expand-link-more" style="text-align:' . $atts['link_align'] . '"><a href="javascript:;" style="color:' . $atts['link_color'] . ';border-color:' . $atts['link_color'] . '">' . $more_icon . '<span style="border-color:' . $atts['link_color'] . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';

}
