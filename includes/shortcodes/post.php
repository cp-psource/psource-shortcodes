<?php

su_add_shortcode(
	array(
		'id'       => 'post',
		'type'     => 'single',
		'group'    => 'data',
		'callback' => 'su_shortcode_post',
		'icon'     => 'info-circle',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/post.svg',
		'name'     => __( 'Post-Daten', 'upfront-shortcodes' ),
		'desc'     => __( 'Der Utility-Shortcode zum Anzeigen verschiedener Beitragsdaten, wie Beitragstitel, Status oder Auszug', 'upfront-shortcodes' ),
		'atts'     => array(
			'field'     => array(
				'type'    => 'select',
				'values'  => array(
					'ID'                => __( 'Post ID', 'upfront-shortcodes' ),
					'post_author'       => __( 'Post Autor', 'upfront-shortcodes' ),
					'post_date'         => __( 'Post Datum', 'upfront-shortcodes' ),
					'post_date_gmt'     => __( 'Post Datum', 'upfront-shortcodes' ) . ' GMT',
					'post_content'      => __( 'Post Inhalt (Roh)', 'upfront-shortcodes' ),
					'the_content'       => __( 'Post Inhalt (Gefiltert)', 'upfront-shortcodes' ),
					'post_title'        => __( 'Post Titel', 'upfront-shortcodes' ),
					'post_excerpt'      => __( 'Post Auszug', 'upfront-shortcodes' ),
					'post_status'       => __( 'Post Status', 'upfront-shortcodes' ),
					'comment_status'    => __( 'Kommentarstatus', 'upfront-shortcodes' ),
					'ping_status'       => __( 'Ping Status', 'upfront-shortcodes' ),
					'post_name'         => __( 'Post Name', 'upfront-shortcodes' ),
					'post_modified'     => __( 'Post geändert', 'upfront-shortcodes' ),
					'post_modified_gmt' => __( 'Post geändert', 'upfront-shortcodes' ) . ' GMT',
					'post_parent'       => __( 'Post Eltern', 'upfront-shortcodes' ),
					'guid'              => __( 'GUID', 'upfront-shortcodes' ),
					'menu_order'        => __( 'Menüreihenfolge', 'upfront-shortcodes' ),
					'post_type'         => __( 'Post Typ', 'upfront-shortcodes' ),
					'post_mime_type'    => __( 'Post mime type', 'upfront-shortcodes' ),
					'comment_count'     => __( 'Kommentar Zähler', 'upfront-shortcodes' ),
				),
				'default' => 'post_title',
				'name'    => __( 'Feld', 'upfront-shortcodes' ),
				'desc'    => __( 'Name des Post-Datenfelds', 'upfront-shortcodes' ),
			),
			'default'   => array(
				'default' => '',
				'name'    => __( 'Standard', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Text wird angezeigt, wenn keine Daten gefunden werden', 'upfront-shortcodes' ),
			),
			'before'    => array(
				'default' => '',
				'name'    => __( 'Davor', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Inhalt wird vor dem Wert angezeigt', 'upfront-shortcodes' ),
			),
			'after'     => array(
				'default' => '',
				'name'    => __( 'Danach', 'upfront-shortcodes' ),
				'desc'    => __( 'Dieser Inhalt wird nach dem Wert angezeigt', 'upfront-shortcodes' ),
			),
			'post_id'   => array(
				'default' => '',
				'name'    => __( 'Post ID', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst eine benutzerdefinierte Beitrags-ID angeben. Post-Slug ist ebenfalls erlaubt. Lasse dieses Feld leer, um die ID des aktuellen Beitrags zu verwenden. Die aktuelle Beitrags-ID funktioniert möglicherweise nicht im Live-Vorschaumodus', 'upfront-shortcodes' ),
			),
			'post_type' => array(
				'type'    => 'post_type',
				'default' => 'post',
				'name'    => __( 'Post type', 'upfront-shortcodes' ),
				'desc'    => __( 'Beitragstyp des Beitrags, dessen Daten Du anzeigen möchtest', 'upfront-shortcodes' ),
			),
			'filter'    => array(
				'default' => '',
				'name'    => __( 'Filter', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen benutzerdefinierten Filter auf den abgerufenen Wert anwenden. Gib hier den Funktionsnamen ein. Deine Funktion muss ein Argument akzeptieren und einen geänderten Wert zurückgeben. Der Name Deiner Funktion muss das Wort <b>filter</b> enthalten. Beispielfunktion: ', 'upfront-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>",
			),
		),
	)
);

function su_shortcode_post( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts(
		'post',
		$atts,
		array( 'filter_content' => 'no' )
	);

	if ( ! $atts['post_id'] ) {
		$atts['post_id'] = get_the_ID();
	}

	if ( ! $atts['post_id'] ) {

		return su_error_message(
			'Post',
			__( 'ungültige Beitrags-ID', 'upfront-shortcodes' )
		);

	}

	if ( 'the_content' === $atts['field'] ) {

		$atts['field']          = 'post_content';
		$atts['filter_content'] = 'yes';

	}

	$data = '';
	$post = su_is_positive_number( $atts['post_id'] )
		? get_post( $atts['post_id'] )
		: get_page_by_path( $atts['post_id'], OBJECT, $atts['post_type'] );

	if ( isset( $post->{$atts['field']} ) ) {
		$data = $post->{$atts['field']};
	}

	if ( 'yes' === $atts['filter_content'] ) {
		$data = su_filter_the_content( $data );
	}

	if (
		$atts['filter'] &&
		su_is_filter_safe( $atts['filter'] ) &&
		function_exists( $atts['filter'] )
	) {
		$data = call_user_func( $atts['filter'], $data );
	}

	if ( empty( $data ) ) {
		$data = $atts['default'];
	}

	return $data ? $atts['before'] . $data . $atts['after'] : '';

}
