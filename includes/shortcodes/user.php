<?php

su_add_shortcode(
	array(
		'id'       => 'user',
		'callback' => 'su_shortcode_user',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/user.svg',
		'name'     => __( 'Benutzerdaten', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'data',
		'atts'     => array(
			'field'   => array(
				'type'    => 'select',
				'values'  => array(
					'first_name'          => __( 'Vorname', 'upfront-shortcodes' ),
					'last_name'           => __( 'Nachname', 'upfront-shortcodes' ),
					'nickname'            => __( 'Nickname', 'upfront-shortcodes' ),
					'description'         => __( 'Beschreibung', 'upfront-shortcodes' ),
					'locale'              => __( 'Gebietsschema', 'upfront-shortcodes' ),
					'display_name'        => __( 'Anzeigename', 'upfront-shortcodes' ),
					'ID'                  => __( 'ID', 'upfront-shortcodes' ),
					'user_login'          => __( 'Login', 'upfront-shortcodes' ),
					'user_nicename'       => __( 'Schöner Name', 'upfront-shortcodes' ),
					'user_email'          => __( 'Email', 'upfront-shortcodes' ),
					'user_url'            => __( 'URL', 'upfront-shortcodes' ),
					'user_registered'     => __( 'Registriert', 'upfront-shortcodes' ),
					'user_activation_key' => __( 'Aktivierungsschlüssel', 'upfront-shortcodes' ),
					'user_status'         => __( 'Status', 'upfront-shortcodes' ),
				),
				'default' => 'display_name',
				'name'    => __( 'Feld', 'upfront-shortcodes' ),
				'desc'    => __( 'Name des Benutzerdatenfelds. Benutzerdefinierte Metafeldnamen sind ebenfalls zulässig.', 'upfront-shortcodes' ),
			),
			'default' => array(
				'default' => '',
				'name'    => __( 'Standard', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Text wird angezeigt, wenn keine Daten gefunden werden', 'upfront-shortcodes' ),
			),
			'before'  => array(
				'default' => '',
				'name'    => __( 'Bevor', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Inhalt wird vor dem Wert angezeigt', 'upfront-shortcodes' ),
			),
			'after'   => array(
				'default' => '',
				'name'    => __( 'Dannach', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Inhalt wird nach dem Wert angezeigt', 'upfront-shortcodes' ),
			),
			'user_id' => array(
				'default' => '',
				'name'    => __( 'Benutzer ID', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst eine benutzerdefinierte Benutzer-ID angeben. Lasse dieses Feld leer, um eine ID des aktuellen Benutzers zu verwenden', 'upfront-shortcodes' ),
			),
			'filter'  => array(
				'default' => '',
				'name'    => __( 'Filter', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen benutzerdefinierten Filter auf den abgerufenen Wert anwenden. Gib hier den Funktionsnamen ein. Deine Funktion muss ein Argument akzeptieren und einen geänderten Wert zurückgeben. Der Name Deiner Funktion muss das Wort <b>filter</b> enthalten. Beispielfunktion: ', 'upfront-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Wert ist: ' . \$value;\n}</code></pre>",
			),
		),
		'desc'     => __( 'Dieser Shortcode kann Benutzerdaten wie Login oder E-Mail anzeigen, einschließlich Metafelder', 'upfront-shortcodes' ),
		'icon'     => 'info-circle',
	)
);

function su_shortcode_user( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts( 'user', $atts );
	$data = '';

	if ( 'user_pass' === $atts['field'] ) {

		return su_error_message(
			'User',
			__( 'Passwortfeld ist nicht erlaubt', 'upfront-shortcodes' )
		);

	}

	$atts['user_id'] = su_do_attribute( $atts['user_id'] );

	if ( ! $atts['user_id'] ) {
		$atts['user_id'] = get_current_user_id();
	}

	if ( su_is_positive_number( $atts['user_id'] ) ) {

		$user = get_user_by( 'id', $atts['user_id'] );

		if ( ! $user ) {

			return su_error_message(
				'User',
				__( 'Benutzer nicht gefunden', 'upfront-shortcodes' )
			);

		}

		$data = $user->get( $atts['field'] );

	}

	if ( ! is_string( $data ) || empty( $data ) ) {
		$data = su_do_attribute( $atts['default'] );
	}

	$data = su_safely_apply_user_filter( $atts['filter'], $data );

	return $data ? $atts['before'] . $data . $atts['after'] : '';

}
