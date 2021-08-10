<?php

su_add_shortcode( array(
		'id' => 'subpages',
		'callback' => 'su_shortcode_subpages',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/subpages.svg',
		'name' => __( 'Unterseiten', 'upfront-shortcodes' ),
		'type' => 'single',
		'group' => 'other',
		'atts' => array(
			'depth' => array(
				'type' => 'select',
				'values' => array( 1, 2, 3, 4, 5 ), 'default' => 1,
				'name' => __( 'Tiefe', 'upfront-shortcodes' ),
				'desc' => __( 'Maximale Tiefe der untergeordneten Seiten', 'upfront-shortcodes' )
			),
			'p' => array(
				'values' => array( ),
				'default' => '',
				'name' => __( 'Eltern ID', 'upfront-shortcodes' ),
				'desc' => __( 'ID der übergeordneten Seite. Leer lassen, um die aktuelle Seite zu verwenden', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc' => __( 'Liste der Unterseiten', 'upfront-shortcodes' ),
		'icon' => 'bars',
	) );

function su_shortcode_subpages( $atts = null, $content = null ) {
	$atts = shortcode_atts( array(
			'depth' => 1,
			'p'     => false,
			'class' => ''
		), $atts, 'subpages' );
	global $post;
	$child_of = ( $atts['p'] ) ? $atts['p'] : get_the_ID();
	$return = wp_list_pages( array(
			'title_li' => '',
			'echo' => 0,
			'child_of' => $child_of,
			'depth' => $atts['depth']
		) );
	return ( $return ) ? '<ul class="su-subpages' . su_get_css_class( $atts ) . '">' . $return . '</ul>' : false;
}
