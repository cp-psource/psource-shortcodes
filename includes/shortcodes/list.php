<?php

su_add_shortcode(
	array(
		'id'       => 'list',
		'callback' => 'su_shortcode_list',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/list.svg',
		'name'     => __( 'Liste', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'content',
		'atts'     => array(
			'icon'       => array(
				'type'    => 'icon',
				'default' => '',
				'name'    => __( 'Symbol', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst ein benutzerdefiniertes Symbol für diese Liste hochladen oder ein integriertes Symbol auswählen', 'upfront-shortcodes' ),
			),
			'icon_color' => array(
				'type'    => 'color',
				'default' => '#333333',
				'name'    => __( 'Symbolfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Farbe wird auf das ausgewählte Symbol angewendet. Funktioniert nicht mit hochgeladenen Icons', 'upfront-shortcodes' ),
			),
			'indent'     => array(
				'type'    => 'slider',
				'default' => 0,
				'step'    => 1,
				'min'     => -100,
				'max'     => 100,
				'name'    => __( 'Einzug', 'upfront-shortcodes' ),
				'desc'    => __( 'Definiert die Größe des Listeneinzugs (in Pixel). Auch negative Zahlen sind erlaubt', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'upfront-shortcodes' ),
		'desc'     => __( 'Gestylte ungeordnete Liste', 'upfront-shortcodes' ),
		'icon'     => 'list-ol',
	)
);

function su_shortcode_list( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'icon'       => 'icon: star',
			'icon_color' => '#333',
			'indent'     => 0,
			'style'      => null,
			'class'      => '',
		),
		$atts,
		'list'
	);

	// Backward compatibility // 4.2.3+
	if ( null !== $atts['style'] ) {
		switch ( $atts['style'] ) {
			case 'star':
				$atts['icon']       = 'icon: star';
				$atts['icon_color'] = '#ffd647';
				break;
			case 'arrow':
				$atts['icon']       = 'icon: arrow-right';
				$atts['icon_color'] = '#00d1ce';
				break;
			case 'check':
				$atts['icon']       = 'icon: check';
				$atts['icon_color'] = '#17bf20';
				break;
			case 'cross':
				$atts['icon']       = 'icon: remove';
				$atts['icon_color'] = '#ff142b';
				break;
			case 'thumbs':
				$atts['icon']       = 'icon: thumbs-o-up';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'link':
				$atts['icon']       = 'icon: external-link';
				$atts['icon_color'] = '#5c5c5c';
				break;
			case 'gear':
				$atts['icon']       = 'icon: cog';
				$atts['icon_color'] = '#ccc';
				break;
			case 'time':
				$atts['icon']       = 'icon: time';
				$atts['icon_color'] = '#a8a8a8';
				break;
			case 'note':
				$atts['icon']       = 'icon: edit';
				$atts['icon_color'] = '#f7d02c';
				break;
			case 'plus':
				$atts['icon']       = 'icon: plus-sign';
				$atts['icon_color'] = '#61dc3c';
				break;
			case 'guard':
				$atts['icon']       = 'icon: shield';
				$atts['icon_color'] = '#1bbe08';
				break;
			case 'event':
				$atts['icon']       = 'icon: bullhorn';
				$atts['icon_color'] = '#ff4c42';
				break;
			case 'idea':
				$atts['icon']       = 'icon: sun';
				$atts['icon_color'] = '#ffd880';
				break;
			case 'settings':
				$atts['icon']       = 'icon: cogs';
				$atts['icon_color'] = '#8a8a8a';
				break;
			case 'twitter':
				$atts['icon']       = 'icon: twitter-sign';
				$atts['icon_color'] = '#00ced6';
				break;
		}
	}

	if ( strpos( $atts['icon'], 'icon:' ) !== false ) {
		$atts['icon'] = '<i class="sui sui-' . trim( str_replace( 'icon:', '', $atts['icon'] ) ) . '" style="color:' . esc_attr( $atts['icon_color'] ) . '"></i>';
		su_query_asset( 'css', 'su-icons' );
	} else {
		$atts['icon'] = '<img src="' . esc_attr( $atts['icon'] ) . '" alt="" />';
	}

	su_query_asset( 'css', 'su-shortcodes' );

	$indent_pos = is_rtl() ? 'right' : 'left';

	return '<div class="su-list' . su_get_css_class( $atts ) . '" style="margin-' . $indent_pos . ':' . intval( $atts['indent'] ) . 'px">' . str_replace( '<li>', '<li>' . $atts['icon'] . ' ', su_do_nested_shortcodes( $content, 'list' ) ) . '</div>';

}
