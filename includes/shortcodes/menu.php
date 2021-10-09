<?php

su_add_shortcode(
	array(
		'id'       => 'menu',
		'callback' => 'su_shortcode_menu',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/menu.svg',
		'name'     => __( 'Menü', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'atts'     => array(
			'name'  => array(
				'values'  => array(),
				'default' => '',
				'name'    => __( 'Menüname', 'upfront-shortcodes' ),
				'desc'    => __( 'Benutzerdefinierter Menüname. Beispiel: Hauptmenue', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Benutzerdefiniertes Menü nach Namen', 'upfront-shortcodes' ),
		'icon'     => 'bars',
	)
);

function su_shortcode_menu( $atts = null, $content = null ) {
	$atts   = shortcode_atts(
		array(
			'name'  => false,
			'class' => '',
		),
		$atts,
		'menu'
	);
	$return = wp_nav_menu(
		array(
			'echo'        => false,
			'menu'        => $atts['name'],
			'container'   => false,
			'fallback_cb' => 'su_shortcode_menu_fallback',
			'items_wrap'  => '<ul id="%1$s" class="%2$s' . su_get_css_class( $atts ) . '">%3$s</ul>',
		)
	);
	return ( $atts['name'] ) ? $return : false;
}

function su_shortcode_menu_fallback() {
	return __( 'Dieses Menü existiert nicht oder hat keine Elemente', 'upfront-shortcodes' );
}
