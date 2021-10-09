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
				'default' => __( 'Box Titel', 'upfront-shortcodes' ),
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Text für den Feldtitel', 'upfront-shortcodes' ),
			),
			'style'       => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'soft'    => __( 'Sanft', 'upfront-shortcodes' ),
					'glass'   => __( 'Glas', 'upfront-shortcodes' ),
					'bubbles' => __( 'Blasen', 'upfront-shortcodes' ),
					'noise'   => __( 'Laut', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Voreinstellung Boxstil', 'upfront-shortcodes' ),
			),
			'box_color'   => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#333333',
				'name'    => __( 'Farbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Farbe für den Feldtitel und die Ränder', 'upfront-shortcodes' ),
			),
			'title_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#FFFFFF',
				'name'    => __( 'Titeltextfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Farbe für den Feldtiteltext', 'upfront-shortcodes' ),
			),
			'radius'      => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Radius', 'upfront-shortcodes' ),
				'desc'    => __( 'Radius der Boxecken', 'upfront-shortcodes' ),
			),
			'class'       => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'usätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
			'id'          => array(
				'name'    => __( 'HTML-Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib ein oder zwei Wörter ohne Leerzeichen ein, um eine eindeutige Webadresse nur für dieses Element zu erstellen. Dann kannst Du direkt auf diesen Abschnitt Deiner Seite verlinken.', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Box-Inhalt', 'upfront-shortcodes' ),
		'desc'     => __( 'Farbige Box mit Beschriftung', 'upfront-shortcodes' ),
		'icon'     => 'list-alt',
	)
);

function su_shortcode_box( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'title'       => __( 'Dies ist der Box-Titel', 'upfront-shortcodes' ),
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
		esc_attr( su_adjust_brightness( $atts['box_color'], -20 ) ),
		$atts['radius'],
		esc_attr( $atts['box_color'] ),
		esc_attr( $atts['title_color'] ),
		esc_attr( $atts['inner_radius'] ),
		su_do_attribute( $atts['title'] ),
		su_do_nested_shortcodes( $content, 'box' ),
		sanitize_html_class( $atts['id'] )
	);

}
