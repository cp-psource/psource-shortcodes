<?php

su_add_shortcode(
	array(
		'id'       => 'meta',
		'callback' => 'su_shortcode_meta',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/meta.svg',
		'name'     => __( 'Metadaten', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'data',
		'atts'     => array(
			'key'     => array(
				'default' => '',
				'name'    => __( 'Schlüssel', 'upfront-shortcodes' ),
				'desc'    => __( 'Name des Metaschlüssels', 'upfront-shortcodes' ),
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
			'post_id' => array(
				'default' => '',
				'name'    => __( 'Beitrags-ID', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst eine benutzerdefinierte Beitrags-ID angeben. Lasse dieses Feld leer, um eine ID des aktuellen Beitrags zu verwenden. Die aktuelle Beitrags-ID funktioniert möglicherweise nicht im Live-Vorschaumodus', 'upfront-shortcodes' ),
			),
			'filter'  => array(
				'default' => '',
				'name'    => __( 'Filter', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen benutzerdefinierten Filter auf den abgerufenen Wert anwenden. Gib hier den Funktionsnamen ein. Deine Funktion muss ein Argument akzeptieren und einen geänderten Wert zurückgeben. Der Name Deiner Funktion muss das Wort <b>filter</b> enthalten. Beispielfunktion: ', 'upfront-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Wert ist: ' . \$value;\n}</code></pre>",
			),
		),
		'desc'     => __( 'Post Meta', 'upfront-shortcodes' ),
		'icon'     => 'info-circle',
	)
);

function su_shortcode_meta( $atts = null, $content = null ) {
	$atts = shortcode_atts(
		array(
			'key'     => '',
			'default' => '',
			'before'  => '',
			'after'   => '',
			'post_id' => '',
			'filter'  => '',
		),
		$atts,
		'meta'
	);
	// Define current post ID
	if ( ! $atts['post_id'] ) {
		$atts['post_id'] = get_the_ID();
	}
	// Check post ID
	if ( ! is_numeric( $atts['post_id'] ) || $atts['post_id'] < 1 ) {
		return sprintf( '<p class="su-error">Meta: %s</p>', __( 'Beitrags-ID ist falsch', 'upfront-shortcodes' ) );
	}
	// Check key name
	if ( ! $atts['key'] ) {
		return sprintf( '<p class="su-error">Meta: %s</p>', __( 'Bitte gib den Namen des Metaschlüssels an', 'upfront-shortcodes' ) );
	}
	// Get the meta
	$meta = get_post_meta( $atts['post_id'], $atts['key'], true );
	// Set default value if meta is empty
	if ( ! $meta ) {
		$meta = $atts['default'];
	}
	// Apply cutom filter
	$meta = su_safely_apply_user_filter( $atts['filter'], $meta );
	// Return result
	return ( $meta ) ? $atts['before'] . $meta . $atts['after'] : '';
}
