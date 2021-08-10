<?php

su_add_shortcode( array(
		'id' => 'row',
		'callback' => 'su_shortcode_row',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/row.svg',
		'name' => __( 'Spalten', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'box',
		'required_child' => 'column',
		'article' => 'https://n3rds.work/docs/columns/',
		'atts' => array(
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => array(
			'id'     => 'column',
			'number' => 2,
		),
		'desc' => __( 'Zeile für flexible Spalten', 'upfront-shortcodes' ),
		'icon' => 'columns',
	) );

function su_shortcode_row( $atts = null, $content = null ) {

	$atts = shortcode_atts( array( 'class' => '' ), $atts );

	return '<div class="su-row' . su_get_css_class( $atts ) . '">' . su_do_nested_shortcodes( $content, 'row' ) . '</div>';

}
