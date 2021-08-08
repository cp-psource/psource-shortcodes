<?php

su_add_shortcode(
	array(
		'id'       => 'members',
		'callback' => 'su_shortcode_members',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/members.svg',
		'name'     => __( 'Mitglieder', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'other',
		'atts'     => array(
			'message'    => array(
				'default' => __( 'Dieser Inhalt ist nur für registrierte Benutzer bestimmt. Bitte %logge Dich ein%.', 'upfront-shortcodes' ),
				'name'    => __( 'Nachricht', 'upfront-shortcodes' ),
				'desc'    => __( 'Nachricht für nicht angemeldete Benutzer', 'upfront-shortcodes' ),
			),
			'color'      => array(
				'type'    => 'color',
				'default' => '#ffcc00',
				'name'    => __( 'Boxfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Farbe wird nur auf das Feld für nicht angemeldete Benutzer angewendet', 'upfront-shortcodes' ),
			),
			'login_text' => array(
				'default' => __( 'Login', 'upfront-shortcodes' ),
				'name'    => __( 'Linktext zur Anmeldung', 'upfront-shortcodes' ),
				'desc'    => __( 'Text für den Login-Link', 'upfront-shortcodes' ),
			),
			'login_url'  => array(
				'default' => '',
				'name'    => __( 'Login-Link-URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Login-Link-URL', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Inhalt für angemeldete Mitglieder', 'upfront-shortcodes' ),
		'desc'     => __( 'Inhalte nur für eingeloggte Mitglieder', 'upfront-shortcodes' ),
		'icon'     => 'lock',
	)
);

function su_shortcode_members( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts(
		'members',
		$atts,
		array(
			'style' => null,
			'login' => null,
		)
	);

	if ( empty( $atts['login_url'] ) ) {
		$atts['login_url'] = wp_login_url();
	}

	// 3.x
	if ( null !== $atts['style'] ) {
		$atts['color'] = str_replace( array( '0', '1', '2' ), array( '#fff', '#FFFF29', '#1F9AFF' ), $atts['style'] );
	}

	if ( is_feed() ) {
		return;
	}

	if ( is_user_logged_in() ) {
		return do_shortcode( $content );
	}

	// 3.x
	if ( null !== $atts['login'] && '0' === $atts['login'] ) {
		return;
	}

	$login = '<a href="' . esc_attr( $atts['login_url'] ) . '">' . $atts['login_text'] . '</a>';

	su_query_asset( 'css', 'su-shortcodes' );

	return '<div class="su-members' . su_get_css_class( $atts ) . '" style="background-color:' . su_adjust_brightness( $atts['color'], 50 ) . ';border-color:' . su_adjust_brightness( $atts['color'], -20 ) . ';color:' . su_adjust_brightness( $atts['color'], -60 ) . '">' . str_replace( '%login%', $login, su_do_attribute( $atts['message'] ) ) . '</div>';

}
