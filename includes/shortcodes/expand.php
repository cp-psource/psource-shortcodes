<?php

su_add_shortcode(
	array(
		'id'       => 'expand',
		'callback' => 'su_shortcode_expand',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/expand.svg',
		'name'     => __( 'Erweitern', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'more_text'  => array(
				'default' => __( 'Zeige mehr', 'upfront-shortcodes' ),
				'name'    => __( 'Mehr Text', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib den Text für Zeige mehr Link ein', 'upfront-shortcodes' ),
			),
			'less_text'  => array(
				'default' => __( 'Zeige weniger', 'upfront-shortcodes' ),
				'name'    => __( 'Weniger Text', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib den Text für Zeige weniger Link ein', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 1000,
				'step'    => 10,
				'default' => 100,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Höhe für minimierten Zustand (in Pixel)', 'upfront-shortcodes' ),
			),
			'hide_less'  => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Weniger Link ausblenden', 'upfront-shortcodes' ),
				'desc'    => __( 'Mit dieser Option kannst Du Zeige weniger Links ausblenden, wenn der Textblock erweitert wurde', 'upfront-shortcodes' ),
			),
			'text_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#333333',
				'name'    => __( 'Textfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Textfarbe aus', 'upfront-shortcodes' ),
			),
			'link_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#0088FF',
				'name'    => __( 'Linkfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Linkfarbe', 'upfront-shortcodes' ),
			),
			'link_style' => array(
				'type'    => 'select',
				'values'  => array(
					'default'    => __( 'Standard', 'upfront-shortcodes' ),
					'underlined' => __( 'Unterstrichen', 'upfront-shortcodes' ),
					'dotted'     => __( 'Gepunktet', 'upfront-shortcodes' ),
					'dashed'     => __( 'Gestrichelt', 'upfront-shortcodes' ),
					'button'     => __( 'Schaltfläche', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Link-Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Stil für mehr/weniger Link', 'upfront-shortcodes' ),
			),
			'link_align' => array(
				'type'    => 'select',
				'values'  => array(
					'left'   => __( 'Links', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'right'  => __( 'Rechts', 'upfront-shortcodes' ),
				),
				'default' => 'left',
				'name'    => __( 'Link ausrichten', 'upfront-shortcodes' ),
				'desc'    => __( 'Linkausrichtung auswählen', 'upfront-shortcodes' ),
			),
			'more_icon'  => array(
				'type'    => 'icon',
				'default' => '',
				'name'    => __( 'Mehr Symbol', 'upfront-shortcodes' ),
				'desc'    => __( 'Füge dem Link Mehr ein Symbol hinzu', 'upfront-shortcodes' ),
			),
			'less_icon'  => array(
				'type'    => 'icon',
				'default' => '',
				'name'    => __( 'Weniger Symbol', 'upfront-shortcodes' ),
				'desc'    => __( 'Füge dem Link Weniger ein Symbol hinzu', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Dieser Textblock kann erweitert werden', 'upfront-shortcodes' ),
		'desc'     => __( 'Erweiterbarer Textblock', 'upfront-shortcodes' ),
		'icon'     => 'sort-amount-asc',
	)
);

function su_shortcode_expand( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'more_text'  => __( 'Zeige Mehr', 'upfront-shortcodes' ),
			'less_text'  => __( 'Zeige Weniger', 'upfront-shortcodes' ),
			'height'     => '100',
			'hide_less'  => 'no',
			'text_color' => '#333333',
			'link_color' => '#0088FF',
			'link_style' => 'default',
			'link_align' => 'left',
			'more_icon'  => '',
			'less_icon'  => '',
			'class'      => '',
		),
		$atts,
		'expand'
	);

	// Prepare more icon
	$more_icon = ( $atts['more_icon'] ) ? su_html_icon( $atts['more_icon'] ) : '';
	$less_icon = ( $atts['less_icon'] ) ? su_html_icon( $atts['less_icon'] ) : '';

	if ( $more_icon || $less_icon ) {
		su_query_asset( 'css', 'su-icons' );
	}

	// Prepare less link
	$less = $atts['hide_less'] !== 'yes'
		? '<div class="su-expand-link su-expand-link-less" style="text-align:' . esc_attr( $atts['link_align'] ) . '"><a href="javascript:;" style="color:' . esc_attr( $atts['link_color'] ) . ';border-color:' . esc_attr( $atts['link_color'] ) . '">' . $less_icon . '<span style="border-color:' . esc_attr( $atts['link_color'] ) . '">' . $atts['less_text'] . '</span></a></div>'
		: '';

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<div class="su-expand su-expand-collapsed su-expand-link-style-' . esc_attr( $atts['link_style'] ) . su_get_css_class( $atts ) . '" data-height="' . esc_attr( $atts['height'] ) . '"><div class="su-expand-content su-u-trim" style="color:' . esc_attr( $atts['text_color'] ) . ';max-height:' . intval( $atts['height'] ) . 'px;overflow:hidden">' . do_shortcode( $content ) . '</div><div class="su-expand-link su-expand-link-more" style="text-align:' . esc_attr( $atts['link_align'] ) . '"><a href="javascript:;" style="color:' . esc_attr( $atts['link_color'] ) . ';border-color:' . esc_attr( $atts['link_color'] ) . '">' . $more_icon . '<span style="border-color:' . esc_attr( $atts['link_color'] ) . '">' . $atts['more_text'] . '</span></a></div>' . $less . '</div>';

}
