<?php

su_add_shortcode(
	array(
		'id'       => 'private',
		'callback' => 'su_shortcode_private',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/private.svg',
		'name'     => __( 'Privat', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'other',
		'atts'     => array(
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Privater Notiztext', 'upfront-shortcodes' ),
		'desc'     => __( 'Private Anmerkung für Post-Autoren. Alle mit diesem Shortcode umschlossenen Inhalte sind nur für Beitragsautoren sichtbar (Benutzer mit der Funktion publish_posts).', 'upfront-shortcodes' ),
		'icon'     => 'lock',
	)
);

function su_shortcode_private( $atts = null, $content = null ) {

	$atts = shortcode_atts( array( 'class' => '' ), $atts, 'private' );

	su_query_asset( 'css', 'su-shortcodes' );

	return ( current_user_can( 'publish_posts' ) )
		? '<div class="su-private' . su_get_css_class( $atts ) . '"><div class="su-private-shell">' . do_shortcode( $content ) . '</div></div>'
		: '';

}
