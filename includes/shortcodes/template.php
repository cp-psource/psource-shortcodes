<?php

su_add_shortcode(
	array(
		'id'       => 'template',
		'callback' => 'su_shortcode_template',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/template.svg',
		'name'     => __( 'Vorlage', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'atts'     => array(
			'name' => array(
				'default' => '',
				'name'    => __( 'Vorlagenname', 'upfront-shortcodes' ),
				// translators: %1$s, %2$s, %3$s – example values for the shortcode attribute
				'desc'    => sprintf( __( 'Verwende den Dateinamen der Vorlage (mit optionaler Erweiterung .php). Wenn Du Vorlagen aus dem Unterordner des Themas verwenden musst, verwende den relativen Pfad. Beispielwerte: %1$s, %2$s, %3$s', 'upfront-shortcodes' ), '<b%value>page</b>', '<b%value>page.php</b>', '<b%value>includes/page.php</b>' ),
			),
		),
		'desc'     => __( 'Theme Vorlage', 'upfront-shortcodes' ),
		'icon'     => 'puzzle-piece',
	)
);

function su_shortcode_template( $atts = null, $content = null ) {

	$atts = shortcode_atts( array( 'name' => '' ), $atts, 'template' );

	if ( ! $atts['name'] ) {
		return su_error_message( 'Template', __( 'Bitte gib den Vorlagennamen an', 'upfront-shortcodes' ) );
	}

	if ( ! su_is_valid_template_name( $atts['name'] ) ) {
		return su_error_message( 'Template', __( 'ungültiger Vorlagenname', 'upfront-shortcodes' ) );
	}

	ob_start();
	get_template_part( su_set_file_extension( $atts['name'], false ) );
	$output = ob_get_clean();

	return $output;

}
