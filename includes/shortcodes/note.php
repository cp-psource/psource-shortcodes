<?php

su_add_shortcode(
	array(
		'id'       => 'note',
		'callback' => 'su_shortcode_note',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/note.svg',
		'name'     => __( 'Notiz', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'note_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#FFFF66',
				'name'    => __( 'Hintergrund', 'upfront-shortcodes' ),
				'desc'    => __( 'Notiz Hintergrundfarbe', 'upfront-shortcodes' ),
			),
			'text_color' => array(
				'type'    => 'color',
				'values'  => array(),
				'default' => '#333333',
				'name'    => __( 'Textfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Notiztextfarbe', 'upfront-shortcodes' ),
			),
			'radius'     => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 20,
				'step'    => 1,
				'default' => 3,
				'name'    => __( 'Radius', 'upfront-shortcodes' ),
				'desc'    => __( 'Notiz Eckenradius', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
			'id'         => array(
				'name'    => __( 'HTML Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib ein oder zwei Wörter ohne Leerzeichen ein, um nur für dieses Element eine eindeutige Webadresse zu erstellen. Dann kannst Du direkt zu diesem Abschnitt Deiner Seite verlinken.', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Notiztext', 'upfront-shortcodes' ),
		'desc'     => __( 'Farbige Box', 'upfront-shortcodes' ),
		'icon'     => 'list-alt',
	)
);

function su_shortcode_note( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'note_color' => '#FFFF66',
			'text_color' => '#333333',
			'background' => null, // 3.x
			'color'      => null, // 3.x
			'radius'     => '3',
			'class'      => '',
			'id'         => '',
		),
		$atts,
		'note'
	);

	if ( null !== $atts['color'] ) {
		$atts['note_color'] = $atts['color'];
	}

	if ( null !== $atts['background'] ) {
		$atts['note_color'] = $atts['background'];
	}

	// Prepare border-radius
	$radius = '0' !== $atts['radius']
		? 'border-radius:' . $atts['radius'] . 'px;-moz-border-radius:' . $atts['radius'] . 'px;-webkit-border-radius:' . $atts['radius'] . 'px;'
		: '';

	if ( $atts['id'] ) {
		$atts['id'] = sprintf( 'id="%s"', sanitize_html_class( $atts['id'] ) );
	}

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-note' . su_get_css_class( $atts ) . '" ' . $atts['id'] . ' style="border-color:' . su_adjust_brightness( $atts['note_color'], -10 ) . ';' . esc_attr( $radius ) . '"><div class="su-note-inner su-u-clearfix su-u-trim" style="background-color:' . esc_attr( $atts['note_color'] ) . ';border-color:' . su_adjust_brightness( $atts['note_color'], 80 ) . ';color:' . esc_attr( $atts['text_color'] ) . ';' . esc_attr( $radius ) . '">' . su_do_nested_shortcodes( $content, 'note' ) . '</div></div>';

}
