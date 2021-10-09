<?php

su_add_shortcode(
	array(
		'id'       => 'display_posts',
		'callback' => 'su_shortcode_display_posts',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/display-posts.svg',
		'icon'     => 'th-list',
		'name'     => __( 'Beiträge', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'article'  => 'https://n3rds.work/docs/upfront-shortcodes-beitraege/',
		'atts'     => array(
			'template'          => array(
				'default' => 'default',
				'name'    => __( 'Vorlage', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'<p>%s.</p><p>%s:</p><ul><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li></ul><p><a href="%s" target="_blank">%s</a></p>',
					__( 'Vorlagenname', 'upfront-shortcodes' ),
					__( 'Verfügbare Vorlagen', 'upfront-shortcodes' ),
					'<b%value>default</b>',
					__( 'Standardvorlage mit Miniaturansicht, Titel und Auszug', 'upfront-shortcodes' ),
					'<b%value>default-meta</b>',
					__( 'Standardvorlage mit diversen Metadaten', 'upfront-shortcodes' ),
					'<b%value>list</b>',
					__( 'ungeordnete Liste mit Beitragstiteln', 'upfront-shortcodes' ),
					'<b%value>teasers</b>',
					__( 'kleine Teaser mit Thumbnails und Titeln von Beiträgen', 'upfront-shortcodes' ),
					'<b%value>single</b>',
					__( 'einzelne Beitragsvorlage', 'upfront-shortcodes' ),
					'https://n3rds.work/docs/upfront-shortcodes-beitraege/',
					__( 'So erstellest/bearbeitest Du eine Vorlage', 'upfront-shortcodes' )
				),
			),
			'post_ids'          => array(
				'default' => '',
				'name'    => __( 'Beitrag IDs', 'upfront-shortcodes' ),
				'desc'    => __( 'Durch Kommas getrennte Liste der einzuschließenden Beitrags-IDs', 'upfront-shortcodes' ),
			),
			'posts_per_page'    => array(
				'type'    => 'number',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => '10',
				'name'    => __( 'Beiträge pro Seite', 'upfront-shortcodes' ),
				'desc'    => __( 'Anzahl der Beiträge, die angezeigt werden. Verwende -1, um alle Beiträge anzuzeigen.', 'upfront-shortcodes' ),
			),
			'post_type'         => array(
				'type'     => 'post_type',
				'multiple' => true,
				'values'   => array(),
				'default'  => 'post',
				'name'     => __( 'Beitragstypen', 'upfront-shortcodes' ),
				'desc'     => __( 'Beiträge nach Beitragstyp filtern', 'upfront-shortcodes' ),
			),
			'taxonomy_1'        => array(
				'type'    => 'taxonomy',
				'values'  => array(),
				'default' => 'category',
				'name'    => __( 'Taxonomie', 'upfront-shortcodes' ),
				'desc'    => __( 'Beiträge anzeigen, die mit einer bestimmten Taxonomie verknüpft sind', 'upfront-shortcodes' ),
			),
			'tax_terms_1'       => array(
				'type'     => 'term',
				'multiple' => true,
				'values'   => array(),
				'default'  => '',
				'name'     => __( 'Bedingungen', 'upfront-shortcodes' ),
				'desc'     => __( 'Beiträge anzeigen, die mit bestimmten Taxonomiebegriffen verknüpft sind.', 'upfront-shortcodes' ),
			),
			'tax_operator_1'    => array(
				'type'    => 'select',
				'values'  => array(
					'IN'     => __(
						'IN - Beiträge mit einem der ausgewählten Begriffe',
						'upfront-shortcodes'
					),
					'NOT IN' => __(
						'NOT IN - Beiträge, die keinen der ausgewählten Begriffe enthalten',
						'upfront-shortcodes'
					),
					'AND'    => __(
						'AND - Beiträge, die alle ausgewählten Begriffe enthalten',
						'upfront-shortcodes'
					),
				),
				'default' => 'IN',
				'name'    => __( 'Taxonomie-Begriffsoperator', 'upfront-shortcodes' ),
				'desc'    => __( 'Taxonomiebegriffsoperator', 'upfront-shortcodes' ),
			),
			'author'            => array(
				'default' => '',
				'name'    => __( 'Autoren', 'upfront-shortcodes' ),
				'desc'    => __( 'Kommagetrennte Liste der Autoren-IDs', 'upfront-shortcodes' ),
			),
			'meta_key'          => array(
				'default' => '',
				'name'    => __( 'Meta-Schlüssel', 'upfront-shortcodes' ),
				'desc'    => __( 'Mit einem bestimmten benutzerdefinierten Feld verknüpfte Beiträge anzeigen', 'upfront-shortcodes' ),
			),
			'offset'            => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 10000,
				'step'    => 1,
				'default' => 0,
				'name'    => __( 'Versatz', 'upfront-shortcodes' ),
				'desc'    => __( 'Anzahl der Beiträge, die verschoben oder übersprungen werden sollen. Der Offset-Parameter wird ignoriert, wenn posts_per_page=-1 (alle Beiträge anzeigen) verwendet wird.', 'upfront-shortcodes' ),
			),
			'orderby'           => array(
				'type'    => 'select',
				'values'  => array(
					'none'           => __( 'Keiner', 'upfront-shortcodes' ),
					'id'             => __( 'Beitrags-ID', 'upfront-shortcodes' ),
					'author'         => __( 'Beitragsautor', 'upfront-shortcodes' ),
					'title'          => __( 'Beitragstitel', 'upfront-shortcodes' ),
					'name'           => __( 'Beitragsslug', 'upfront-shortcodes' ),
					'date'           => __( 'Datum', 'upfront-shortcodes' ),
					'modified'       => __( 'Zuletzt geändert', 'upfront-shortcodes' ),
					'parent'         => __( 'Beitrags Elternteil', 'upfront-shortcodes' ),
					'rand'           => __( 'Zufällig', 'upfront-shortcodes' ),
					'comment_count'  => __( 'Kommentaranzahl', 'upfront-shortcodes' ),
					'menu_order'     => __( 'Menüreihenfolge', 'upfront-shortcodes' ),
					'meta_value'     => __( 'Meta-Schlüsselwerte', 'upfront-shortcodes' ),
					'meta_value_num' => __( 'Metaschlüsselwerte (numerisch)', 'upfront-shortcodes' ),
				),
				'default' => 'date',
				'name'    => __( 'Sortieren nach', 'upfront-shortcodes' ),
				'desc'    => __( 'Abgerufene Beiträge nach Parameter sortieren', 'upfront-shortcodes' ),
			),
			'order'             => array(
				'type'    => 'select',
				'values'  => array(
					'desc' => __( 'Absteigend', 'upfront-shortcodes' ),
					'asc'  => __( 'Aufsteigend', 'upfront-shortcodes' ),
				),
				'default' => 'desc',
				'name'    => __( 'Sortierung', 'upfront-shortcodes' ),
				'desc'    => __( 'Gibt die aufsteigende oder absteigende Reihenfolge des Parameters orderby an', 'upfront-shortcodes' ),
			),
			'post_parent'       => array(
				'default' => '',
				'name'    => __( 'Post Eltern', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					// translators: %s will be replaced with clickable text "current"
					__( 'Filtere Beiträge nach dem übergeordneten Beitrag (verwende die ID des übergeordneten Beitrags). Verwende das Schlüsselwort "%s", um untergeordnete Elemente des aktuellen Beitrags anzuzeigen.', 'upfront-shortcodes' ),
					'<b%value>current</b>'
				),
			),
			'post_status'       => array(
				'type'    => 'select',
				'values'  => array(
					'publish'    => __( 'Veröffentlicht', 'upfront-shortcodes' ),
					'pending'    => __( 'Ausstehend', 'upfront-shortcodes' ),
					'draft'      => __( 'Entwurf', 'upfront-shortcodes' ),
					'auto-draft' => __( 'Auto-Entwurf', 'upfront-shortcodes' ),
					'future'     => __( 'Zukünftiger Beitrag', 'upfront-shortcodes' ),
					'private'    => __( 'Privater Beitrag', 'upfront-shortcodes' ),
					'inherit'    => __( 'Erben', 'upfront-shortcodes' ),
					'trash'      => __( 'Papierkorb', 'upfront-shortcodes' ),
					'any'        => __( 'Alle', 'upfront-shortcodes' ),
				),
				'default' => 'publish',
				'name'    => __( 'Poststatus', 'upfront-shortcodes' ),
				'desc'    => __( 'Beiträge nach Status filtern', 'upfront-shortcodes' ),
			),
			'ignore_sticky'     => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Sticky ignorieren', 'upfront-shortcodes' ),
				'desc'    => __( 'Setze diese Option auf Ja, um klebrige Beiträge zu ignorieren', 'upfront-shortcodes' ),
			),
			'exclude'           => array(
				'default' => '',
				'name'    => __( 'Beiträge ausschließen', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					// translators: %s will be replaced with clickable text "current"
					__( 'Kommagetrennte Liste der auszuschließenden Beitrags-IDs. Verwende das Schlüsselwort "%s", um den aktuellen Beitrag auszuschließen.', 'upfront-shortcodes' ),
					'<b%value>current</b>'
				),
			),
			'quality'           => array(
				'type'    => 'select',
				'values'  => su_get_image_sizes(),
				'default' => 'thubmnail',
				'name'    => __( 'Qualität der Miniaturansichten (falls zutreffend)', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert die Größe von Miniaturbildern. Diese Option wirkt sich nur auf die Bildqualität aus, nicht auf die tatsächliche Miniaturansichtsgröße.', 'upfront-shortcodes' ),
			),
			'pagination'        => array(
				'type'    => 'select',
				'values'  => array(
					'no'        => __( 'Deaktiviert', 'upfront-shortcodes' ),
					'prev-next' => __( 'Vorherige/Nächste', 'upfront-shortcodes' ),
				),
				'default' => 'no',
				'name'    => __( 'Paginierung', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert die Paginierung', 'upfront-shortcodes' ),
			),
			'pagination_prev'   => array(
				'default' => __( 'Vorherige Seite', 'upfront-shortcodes' ),
				'name'    => __( 'Link-Label der vorherigen Seite', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende diese Option, um ein benutzerdefiniertes Label für den Link zur vorherigen Seite festzulegen.', 'upfront-shortcodes' ),
			),
			'pagination_next'   => array(
				'default' => __( 'Nächste Seite', 'upfront-shortcodes' ),
				'name'    => __( 'Link-Label der nächsten Seite', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende diese Option, um ein benutzerdefiniertes Label für den Link zur nächsten Seite festzulegen.', 'upfront-shortcodes' ),
			),
			'pagination_anchor' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Anker in Paginierung', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende diese Option, um Anker in Paginierungslinks zu aktivieren. Als Ergebnis scrollt der Browser nach dem Navigieren zu einer neuen Seite im Posts-Element.', 'upfront-shortcodes' ),
			),
			'id'                => array(
				'name'    => __( 'HTML Anker (ID)', 'upfront-shortcodes' ),
				'desc'    => __( 'Mit Ankern kannst Du direkt auf ein Element auf einer Seite verlinken', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'             => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Benutzerdefinierte Posts-Abfrage mit anpassbarer Vorlage', 'upfront-shortcodes' ),
	)
);

function su_shortcode_display_posts( $atts = null, $content = null ) {

	$raw      = (array) $atts;
	$defaults = su_get_shortcode_defaults( 'display_posts' );
	$atts     = su_parse_shortcode_atts(
		'display_posts',
		$atts,
		array( 'tax_relation' => 'AND' )
	);

	$atts['id'] = sanitize_html_class(
		$atts['id'],
		sprintf(
			'su-display-posts-%s',
			md5( wp_json_encode( $raw ) )
		)
	);

	// TODO: sanitize everything if possible (0) [!]

	$atts['quality'] = sanitize_key( $atts['quality'] );

	$atts['template'] = su_shortcode_display_posts_locate_template( $atts['template'] );

	if ( ! $atts['template'] ) {

		return su_error_message(
			'Posts',
			__( 'ungültiger Vorlagenname', 'upfront-shortcodes' )
		);

	}

	$query    = su_shortcode_display_posts_build_query( $raw, $atts, $defaults );
	$su_query = new WP_Query( $query );

	su_shortcode_display_posts_store( 'set', 'su_query', $su_query );
	su_shortcode_display_posts_store( 'set', 'atts', $atts );

	$output = su_shortcode_display_posts_include_template( $su_query, $atts );

	wp_reset_postdata();

	su_query_asset( 'css', 'su-shortcodes' );

	return $output;

}

function su_shortcode_display_posts_locate_template( $template ) {

	$template = su_set_file_extension( $template, 'php' );
	$template = ltrim( $template, '\\/' );

	$locations = array(
		path_join( get_stylesheet_directory(), 'su-display-posts' ),
		path_join( get_template_directory(), 'su-display-posts' ),
		path_join( su_get_plugin_path(), 'includes/partials/shortcodes/display-posts' ),
	);

	foreach ( $locations as $location ) {

		$path = path_join( $location, $template );
		$path = realpath( $path );

		if ( strpos( $path, $location ) === 0 && file_exists( $path ) ) {
			return $path;
		}

	}

	return false;

}

function su_shortcode_display_posts_include_template( $su_query, $atts ) {

	ob_start();

	include $atts['template'];

	return ob_get_clean();

}

function su_shortcode_display_posts_build_query( $raw, $atts, $defaults ) {

	$query = array();

	$query['paged'] = su_shortcode_display_posts_get_current_page( $atts['id'] );

	if ( $atts['author'] ) {
		$query['author'] = sanitize_text_field( $atts['author'] );
	}

	$query['ignore_sticky_posts'] = 'yes' === $atts['ignore_sticky'];

	if ( intval( $atts['offset'] ) ) {
		$query['offset'] = intval( $atts['offset'] );
	}

	if ( $atts['meta_key'] ) {
		$query['meta_key'] = sanitize_text_field( $atts['meta_key'] );
	}

	$query['order']          = sanitize_key( $atts['order'] );
	$query['orderby']        = sanitize_key( $atts['orderby'] );
	$query['post_status']    = sanitize_key( $atts['post_status'] );
	$query['posts_per_page'] = intval( $atts['posts_per_page'] );

	$atts['post_parent'] = str_replace(
		'current',
		get_the_ID(),
		$atts['post_parent']
	);

	if ( is_numeric( $atts['post_parent'] ) ) {
		$query['post_parent'] = intval( $atts['post_parent'] );
	}

	$atts['post_ids'] = array_map(
		'intval',
		array_filter( explode( ',', $atts['post_ids'] ), 'is_numeric' )
	);

	if ( ! empty( $atts['post_ids'] ) ) {
		$query['post__in'] = $atts['post_ids'];
	}

	$atts['post_type'] = array_map(
		'sanitize_text_field',
		explode( ',', $atts['post_type'] )
	);

	$query['post_type'] = array_filter(
		$atts['post_type'],
		function( $item ) {
			return ! empty( $item );
		}
	);

	if ( $atts['exclude'] ) {

		$atts['exclude'] = str_replace(
			'current',
			get_the_ID(),
			$atts['exclude']
		);

		$query['post__not_in'] = array_map(
			'intval',
			explode( ',', $atts['exclude'] )
		);

	}

	$query['tax_query'] = su_shortcode_display_posts_build_tax_query( $raw, $defaults );

	if ( count( $query['tax_query'] ) > 1 ) {

		$query['tax_query']['relation'] = strtoupper(
			sanitize_key( $atts['tax_relation'] )
		);

	}

	$query = apply_filters( 'su/shortcode/display_posts/query', $query, $atts, $raw );

	return $query;

}

function su_shortcode_display_posts_build_tax_query( $raw, $defaults ) {

	$tax_query = array();

	for ( $i = 1; true; $i++ ) {

		$raw[ "taxonomy_{$i}" ] = isset( $raw[ "taxonomy_{$i}" ] )
			? sanitize_text_field( $raw[ "taxonomy_{$i}" ] )
			: $defaults['taxonomy_1'];

		if ( ! isset( $raw[ "tax_terms_{$i}" ] ) ) {
			break;
		}

		$raw[ "tax_terms_{$i}" ] = array_map(
			'sanitize_text_field',
			explode( ',', $raw[ "tax_terms_{$i}" ] )
		);

		$raw[ "tax_terms_{$i}" ] = array_filter(
			$raw[ "tax_terms_{$i}" ],
			function( $item ) {
				return ! empty( $item );
			}
		);

		if ( ! isset( $raw[ "tax_operator_{$i}" ] ) ) {
			$raw[ "tax_operator_{$i}" ] = $defaults['tax_operator_1'];
		}

		$raw[ "tax_operator_{$i}" ] = sanitize_text_field( $raw[ "tax_operator_{$i}" ] );
		$raw[ "tax_operator_{$i}" ] = strtoupper( $raw[ "tax_operator_{$i}" ] );

		if (
			empty( $raw[ "taxonomy_{$i}" ] ) ||
			empty( $raw[ "tax_terms_{$i}" ] ) ||
			empty( $raw[ "tax_operator_{$i}" ] )
		) {
			break;
		}

		$tax_query[] = array(
			'taxonomy' => $raw[ "taxonomy_{$i}" ],
			'field'    => is_numeric( $raw[ "tax_terms_{$i}" ][0] ) ? 'id' : 'slug',
			'terms'    => $raw[ "tax_terms_{$i}" ],
			'operator' => $raw[ "tax_operator_{$i}" ],
		);

	}

	return $tax_query;

}

function su_shortcode_display_posts_pagination() {

	$atts = su_shortcode_display_posts_store( 'get', 'atts' );

	if ( 'prev-next' === $atts['pagination'] ) {
		return su_shortcode_display_posts_prevnext_pagination();
	}

}

function su_shortcode_display_posts_prevnext_pagination() {

	$prev = su_shortcode_display_posts_prevnext_pagination_link( 'prev' );
	$next = su_shortcode_display_posts_prevnext_pagination_link( 'next' );

	if ( ! $next && ! $prev ) {
		return;
	}

	// phpcs:disable
	printf( '<div class="su-display-posts-pagination">%s%s</div>', $prev, $next );
	// phpcs:enable

}

function su_shortcode_display_posts_prevnext_pagination_link( $direction = 'next' ) {

	$su_query  = su_shortcode_display_posts_store( 'get', 'su_query' );
	$atts      = su_shortcode_display_posts_store( 'get', 'atts' );
	$direction = sanitize_key( $direction );
	$label     = $atts[ 'pagination_' . $direction ];
	$class     = 'su-display-posts-pagination-' . $direction;
	$key       = su_shortcode_display_posts_get_pagination_key( $atts['id'] );
	$current   = su_shortcode_display_posts_get_current_page( $atts['id'] );
	$total     = $su_query->max_num_pages;
	$template  = apply_filters(
		'su/shortcode/display_posts/prevnext_pagination_link_template',
		'<a href="%1$s" class="%2$s">%3$s</a>',
		$atts,
		$direction
	);

	if ( $current > $total ) {
		return;
	}

	if ( 'next' === $direction && $current < $total ) {
		$goto = $current + 1;
	}

	if ( 'prev' === $direction && $current > 1 ) {
		$goto = $current - 1;
	}

	if ( ! isset( $goto ) ) {
		return;
	}

	$url = 1 === $goto
		? remove_query_arg( $key )
		: add_query_arg( $key, $goto );

	if ( 'yes' === $atts['pagination_anchor'] ) {
		$url .= '#' . $atts['id'];
	}

	return sprintf(
		$template,
		esc_attr( $url ),
		sanitize_html_class( $class ),
		esc_html( $label )
	);

}

function su_shortcode_display_posts_get_pagination_key( $id ) {

	return sprintf(
		apply_filters( 'su/shortcode/display_posts/pagination_key', '%s-page' ),
		$id
	);

}

function su_shortcode_display_posts_get_current_page( $id ) {

	$key = su_shortcode_display_posts_get_pagination_key( $id );

	// phpcs:disable
	return isset( $_GET[ $key ] ) && is_numeric( $_GET[ $key ] ) && $_GET[ $key ] > 0
		? intval( $_GET[ $key ] )
		: 1;
	// phpcs:enable

}

function su_shortcode_display_posts_store( $action = 'get', $key = '', $value = '' ) {

	static $store;

	if ( ! is_array( $store ) ) {
		$store = array();
	}

	if ( 'get' === $action && ! empty( $key ) && isset( $store[ $key ] ) ) {
		return $store[ $key ];
	}

	if ( 'set' === $action ) {
		$store[ $key ] = $value;
	}

}
