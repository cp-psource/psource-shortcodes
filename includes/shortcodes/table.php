<?php

su_add_shortcode(
	array(
		'id'       => 'table',
		'callback' => 'su_shortcode_table',
		'type'     => 'wrap',
		'name'     => __( 'Tabelle', 'upfront-shortcodes' ),
		'desc'     => __( 'Stilisierte Tabelle', 'upfront-shortcodes' ),
		'group'    => 'content',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/table.svg',
		'icon'     => 'table',
		'atts'     => array(
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Horizontale Bildlaufleiste hinzufügen, wenn die Tabellenbreite größer als die Seitenbreite ist', 'upfront-shortcodes' ),
			),
			'alternate'  => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Alternative Zeilenfarbe', 'upfront-shortcodes' ),
				'desc'    => __( 'Aktivieren, um alternative Hintergrundfarbe für gerade Zeilen zu verwenden', 'upfront-shortcodes' ),
			),
			'fixed'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Festes Layout', 'upfront-shortcodes' ),
				'desc'    => __( 'Tabellenzellen mit fester Breite', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'upfront-shortcodes' ),
	)
);

function su_shortcode_table( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => '', // deprecated since 5.3.0
			'responsive' => 'no',
			'alternate'  => 'yes',
			'fixed'      => 'no',
			'class'      => '',
		),
		$atts,
		'table'
	);

	if ( $atts['url'] && ! su_is_unsafe_features_enabled() ) {

		return su_error_message(
			'Table',
			sprintf(
				'%s.<br><a href="https://n3rds.work/docs/upfront-shortcodes-unsichere-funktionen/" target="_blank">%s</a>',
				// translators: do not translate the <b>url</b> part, the <b>Unsafe features</b> must be translated
				__( 'Das Attribut <b>url</b> kann nicht verwendet werden, wenn die Option <b>Unsichere Funktionen</b> deaktiviert ist', 'upfront-shortcodes' ),
				__( 'Mehr erfahren', 'upfront-shortcodes' )
			)
		);

	}

	foreach ( array( 'responsive', 'alternate', 'fixed' ) as $feature ) {

		if ( 'yes' === $atts[ $feature ] ) {
			$atts['class'] .= ' su-table-' . $feature;
		}

	}

	su_query_asset( 'css', 'su-shortcodes' );

	$table = $atts['url']
		? su_parse_csv( $atts['url'] )
		: do_shortcode( $content );

	return '<div class="su-table' . su_get_css_class( $atts ) . '">' . $table . '</div>';

}
