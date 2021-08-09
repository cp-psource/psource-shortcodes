<?php

su_add_shortcode( array(
		'id' => 'guests',
		'callback' => 'su_shortcode_guests',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/guests.svg',
		'name' => __( 'Gäste', 'upfront-shortcodes' ),
		'type' => 'wrap',
		'group' => 'other',
		'atts' => array(
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content' => __( 'Dieser Inhalt ist nur für nicht eingeloggte Besucher verfügbar', 'upfront-shortcodes' ),
		'desc' => __( 'Inhalte nur für Gäste', 'upfront-shortcodes' ),
		'icon' => 'user',
	) );

function su_shortcode_guests( $atts = null, $content = null ) {
	$atts = shortcode_atts( array( 'class' => '' ), $atts, 'guests' );
	$return = '';
	if ( !is_user_logged_in() && !is_null( $content ) ) {
		su_query_asset( 'css', 'su-shortcodes' );
		$return = '<div class="su-guests' . su_get_css_class( $atts ) . '">' . do_shortcode( $content ) . '</div>';
	}
	return $return;
}
