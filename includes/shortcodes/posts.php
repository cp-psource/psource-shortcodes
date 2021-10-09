<?php

su_add_shortcode(
	array(
		'id'       => 'posts',
		'callback' => 'su_shortcode_posts',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/posts.svg',
		'name'     => __( 'Beiträge', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'article'  => 'https://n3rds.work/docs/upfront-shortcodes-beitraege/',
		'atts'     => array(
			'template'            => array(
				'default' => 'templates/default-loop.php',
				'name'    => __( 'Vorlage', 'upfront-shortcodes' ),
				'desc'    => __(
					'Relativer Pfad zur Vorlagendatei. Standardvorlagen im Plugin-Verzeichnis (Vorlagenordner). Du kannst sie in Dein Themenverzeichnis kopieren und nach Deinen Wünschen ändern. Du kannst die folgenden Standardvorlagen verwenden, die bereits im Plugin-Verzeichnis verfügbar sind:<br/><b%value>templates/default-loop.php</b> - Beiträge Schleife<br/><b%value>templates/teaser-loop.php</b> - Beitragsschleife mit Miniaturansicht und Titel<br/><b%value>templates/single-post.php</b> - Vorlage für einen einzelnen Beitrag<br/><b%value>templates/list-loop.php</b> - ungeordnete Liste mit Beitragstiteln',
					'upfront-shortcodes'
				),
			),
			'id'                  => array(
				'default' => '',
				'name'    => __( 'Beitrag ID\'s', 'upfront-shortcodes' ),
				'desc'    => __(
					'Gib durch Kommas getrennte IDs der Beiträge ein, die Du anzeigen möchtest',
					'upfront-shortcodes'
				),
			),
			'posts_per_page'      => array(
				'type'    => 'number',
				'min'     => -1,
				'max'     => 10000,
				'step'    => 1,
				'default' => get_option( 'posts_per_page' ),
				'name'    => __( 'Beiträge pro Seite', 'upfront-shortcodes' ),
				'desc'    => __(
					'Gib die Anzahl der Beiträge an, die Du anzeigen möchtest. Gib -1 ein, um alle Beiträge zu erhalten',
					'upfront-shortcodes'
				),
			),
			'post_type'           => array(
				'type'     => 'post_type',
				'multiple' => true,
				'values'   => array(),
				'default'  => 'post',
				'name'     => __( 'Beitragstypen', 'upfront-shortcodes' ),
				'desc'     => __(
					'Wähle Beitragstypen aus. Halte die Strg-Taste gedrückt, um mehrere Beitragstypen auszuwählen',
					'upfront-shortcodes'
				),
			),
			'taxonomy'            => array(
				'type'    => 'taxonomy',
				'values'  => array(),
				'default' => 'category',
				'name'    => __( 'Taxonomie', 'upfront-shortcodes' ),
				'desc'    => __(
					'Wähle Taxonomie aus, um Beiträge von anzuzeigen',
					'upfront-shortcodes'
				),
			),
			'tax_term'            => array(
				'type'     => 'term',
				'multiple' => true,
				'values'   => array(),
				'default'  => '',
				'name'     => __( 'Begriffe', 'upfront-shortcodes' ),
				'desc'     => __( 'Wähle Begriffe aus, aus denen Beiträge angezeigt werden sollen', 'upfront-shortcodes' ),
			),
			'tax_operator'        => array(
				'type'    => 'select',
				'values'  => array(
					'IN'     => __(
						'IN - Beiträge mit Begriffen einer ausgewählten Kategorie',
						'upfront-shortcodes'
					),
					'NOT IN' => __(
						'NOT IN - Beiträge, die keinen der ausgewählten Begriffe haben',
						'upfront-shortcodes'
					),
					'AND'    => __(
						'AND - Beiträge, die alle ausgewählten Begriffe haben',
						'upfront-shortcodes'
					),
				),
				'default' => 'IN',
				'name'    => __( 'Taxonomiebegriffsoperator', 'upfront-shortcodes' ),
				'desc'    => __( 'Operator zum testen', 'upfront-shortcodes' ),
			),
			// 'author' => array(
			//  'type' => 'select',
			//  'multiple' => true,
			//  'values' => Su_Tools::get_users(),
			//  'default' => 'default',
			//  'name' => __( 'Authors', 'upfront-shortcodes' ),
			//  'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'upfront-shortcodes' )
			// ),
			'author'              => array(
				'default' => '',
				'name'    => __( 'Autoren', 'upfront-shortcodes' ),
				'desc'    => __(
					'Gib hier eine durch Kommas getrennte Liste der Autoren-IDs ein. Beispiel: 1,7,18',
					'upfront-shortcodes'
				),
			),
			'meta_key'            => array(
				'default' => '',
				'name'    => __( 'Metaschlüssel', 'upfront-shortcodes' ),
				'desc'    => __(
					'Gib den Namen des Metaschlüssels ein, um Beiträge mit diesem Schlüssel anzuzeigen',
					'upfront-shortcodes'
				),
			),
			'offset'              => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 10000,
				'step'    => 1,
				'default' => 0,
				'name'    => __( 'Offset', 'upfront-shortcodes' ),
				'desc'    => __(
					'Gib den Versatz an, um die Beitragsschleife nicht vom ersten Beitrag an zu starten',
					'upfront-shortcodes'
				),
			),
			'order'               => array(
				'type'    => 'select',
				'values'  => array(
					'desc' => __( 'Absteigend', 'upfront-shortcodes' ),
					'asc'  => __( 'Aufsteigend', 'upfront-shortcodes' ),
				),
				'default' => 'DESC',
				'name'    => __( 'Sortierung', 'upfront-shortcodes' ),
				'desc'    => __( 'Beiträge bestellen', 'upfront-shortcodes' ),
			),
			'orderby'             => array(
				'type'    => 'select',
				'values'  => array(
					'none'           => __( 'Nicht', 'upfront-shortcodes' ),
					'id'             => __( 'Beitrag ID', 'upfront-shortcodes' ),
					'author'         => __( 'Beitragsautor', 'upfront-shortcodes' ),
					'title'          => __( 'Beitrag-Titel', 'upfront-shortcodes' ),
					'name'           => __( 'Beitragsslug', 'upfront-shortcodes' ),
					'date'           => __( 'Datum', 'upfront-shortcodes' ),
					'modified'       => __( 'Zuletzt bearbeitet', 'upfront-shortcodes' ),
					'parent'         => __( 'Beitragseltern', 'upfront-shortcodes' ),
					'rand'           => __( 'Zufällig', 'upfront-shortcodes' ),
					'comment_count'  => __( 'Kommentaranzahl', 'upfront-shortcodes' ),
					'menu_order'     => __( 'Menüreihenfolge', 'upfront-shortcodes' ),
					'meta_value'     => __( 'Meta-Schlüsselwerte', 'upfront-shortcodes' ),
					'meta_value_num' => __( 'Meta-Schlüsselwerte (numerisch)', 'upfront-shortcodes' ),
				),
				'default' => 'date',
				'name'    => __( 'Sortieren nach', 'upfront-shortcodes' ),
				'desc'    => __( 'Beiträge bestellen nach', 'upfront-shortcodes' ),
			),
			'post_parent'         => array(
				'default' => '',
				'name'    => __( 'Beitragseltern', 'upfront-shortcodes' ),
				'desc'    => __(
					'Kinder des eingegebenen Beitrags anzeigen (Beitrags-ID eingeben)',
					'upfront-shortcodes'
				),
			),
			'post_status'         => array(
				'type'    => 'select',
				'values'  => array(
					'publish'    => __( 'Veröffentlicht', 'upfront-shortcodes' ),
					'pending'    => __( 'Ausstehend', 'upfront-shortcodes' ),
					'draft'      => __( 'Entwurf', 'upfront-shortcodes' ),
					'auto-draft' => __( 'Auto-Entwurf', 'upfront-shortcodes' ),
					'future'     => __( 'Zukünftiger Beitrag', 'upfront-shortcodes' ),
					'private'    => __( 'Privater Beitrag', 'upfront-shortcodes' ),
					'inherit'    => __( 'Vererbt', 'upfront-shortcodes' ),
					'trash'      => __( 'Im Papierkorb', 'upfront-shortcodes' ),
					'any'        => __( 'Alle', 'upfront-shortcodes' ),
				),
				'default' => 'publish',
				'name'    => __( 'Beitragsstatus', 'upfront-shortcodes' ),
				'desc'    => __(
					'Nur Beiträge mit ausgewähltem Status anzeigen',
					'upfront-shortcodes'
				),
			),
			'ignore_sticky_posts' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Angeheftet ignorieren', 'upfront-shortcodes' ),
				'desc'    => __(
					'Setze diesen Wert auf "Ja", um zu verhindern, dass angeheftete Beiträge an den Anfang der zurückgegebenen Liste der Posts verschoben werden. Sie sind weiterhin enthalten, werden jedoch in regulärer Reihenfolge angezeigt.',
					'upfront-shortcodes'
				),
			),
		),
		'desc'     => __(
			'Abfrage von benutzerdefinierten Beiträgen mit anpassbarer Vorlage',
			'upfront-shortcodes'
		),
		'icon'     => 'th-list',
	)
);

function su_shortcode_posts( $atts = null, $content = null ) {
	$original_atts = $atts;

	// Parse attributes
	$atts = shortcode_atts(
		array(
			'template'            => 'templates/default-loop.php',
			'id'                  => false,
			'posts_per_page'      => get_option( 'posts_per_page' ),
			'post_type'           => 'post',
			'taxonomy'            => 'category',
			'tax_term'            => false,
			'tax_operator'        => 'IN',
			'author'              => '',
			'tag'                 => '',
			'meta_key'            => '',
			'offset'              => 0,
			'order'               => 'DESC',
			'orderby'             => 'date',
			'post_parent'         => false,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 'no',
		),
		$atts,
		'posts'
	);

	$author              = sanitize_text_field( $atts['author'] );
	$id                  = $atts['id']; // Sanitized later as an array of integers
	$ignore_sticky_posts = (bool) ( 'yes' === $atts['ignore_sticky_posts'] )
		? true
		: false;
	$meta_key            = sanitize_text_field( $atts['meta_key'] );
	$offset              = intval( $atts['offset'] );
	$order               = sanitize_key( $atts['order'] );
	$orderby             = sanitize_key( $atts['orderby'] );
	$post_parent         = $atts['post_parent'];
	$post_status         = $atts['post_status'];
	$post_type           = sanitize_text_field( $atts['post_type'] );
	$posts_per_page      = intval( $atts['posts_per_page'] );
	$tag                 = sanitize_text_field( $atts['tag'] );
	$tax_operator        = $atts['tax_operator'];
	$tax_term            = sanitize_text_field( $atts['tax_term'] );
	$taxonomy            = sanitize_key( $atts['taxonomy'] );
	// Set up initial query for post
	$args = array(
		'category_name'  => '',
		'order'          => $order,
		'orderby'        => $orderby,
		'post_type'      => explode( ',', $post_type ),
		'posts_per_page' => $posts_per_page,
		'tag'            => $tag,
	);
	// Ignore Sticky Posts
	if ( $ignore_sticky_posts ) {
		$args['ignore_sticky_posts'] = true;
	}
	// Meta key (for ordering)
	if ( ! empty( $meta_key ) ) {
		$args['meta_key'] = $meta_key;
	}
	// If Post IDs
	if ( $id ) {
		$posts_in         = array_map( 'intval', explode( ',', $id ) );
		$args['post__in'] = $posts_in;
	}
	// Post Author
	if ( ! empty( $author ) ) {
		$args['author'] = $author;
	}
	// Offset
	if ( ! empty( $offset ) ) {
		$args['offset'] = $offset;
	}
	// Post Status
	$post_status = explode( ', ', $post_status );
	$validated   = array();
	$available   = array(
		'publish',
		'pending',
		'draft',
		'auto-draft',
		'future',
		'private',
		'inherit',
		'trash',
		'any',
	);
	foreach ( $post_status as $unvalidated ) {
		if ( in_array( $unvalidated, $available ) ) {
			$validated[] = $unvalidated;
		}
	}
	if ( ! empty( $validated ) ) {
		$args['post_status'] = $validated;
	}
	// If taxonomy attributes, create a taxonomy query
	if ( ! empty( $taxonomy ) && ! empty( $tax_term ) ) {
		// Term string to array
		$tax_term = explode( ',', $tax_term );
		// Validate operator
		$tax_operator = str_replace(
			array( 0, 1, 2 ),
			array( 'IN', 'NOT IN', 'AND' ),
			$tax_operator
		);
		if ( ! in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ) {
			$tax_operator = 'IN';
		}
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => is_numeric( $tax_term[0] ) ? 'id' : 'slug',
					'terms'    => $tax_term,
					'operator' => $tax_operator,
				),
			),
		);
		// Check for multiple taxonomy queries
		$count            = 2;
		$more_tax_queries = false;
		while (
			isset( $original_atts[ 'taxonomy_' . $count ] ) &&
			! empty( $original_atts[ 'taxonomy_' . $count ] ) &&
			isset( $original_atts[ 'tax_' . $count . '_term' ] ) &&
			! empty( $original_atts[ 'tax_' . $count . '_term' ] )
		) {
			// Sanitize values
			$more_tax_queries        = true;
			$taxonomy                = sanitize_key( $original_atts[ 'taxonomy_' . $count ] );
			$terms                   = explode(
				', ',
				sanitize_text_field( $original_atts[ 'tax_' . $count . '_term' ] )
			);
			$tax_operator            = isset( $original_atts[ 'tax_' . $count . '_operator' ] )
				? $original_atts[ 'tax_' . $count . '_operator' ]
				: 'IN';
			$tax_operator            = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) )
				? $tax_operator
				: 'IN';
			$tax_args['tax_query'][] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $terms,
				'operator' => $tax_operator,
			);
			$count++;
		}
		if ( $more_tax_queries ) {
			$tax_relation = 'AND';

			if (
				isset( $original_atts['tax_relation'] ) &&
				in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) )
			) {
				$tax_relation = $original_atts['tax_relation'];
			}

			$tax_args['tax_query']['relation'] = $tax_relation;
		}

		$args = array_merge( $args, $tax_args );
	}

	// If post parent attribute, set up parent
	if ( $post_parent ) {
		if ( 'current' == $post_parent ) {
			global $post;
			$post_parent = $post->ID;
		}
		$args['post_parent'] = intval( $post_parent );
	}

	$atts['template'] = su_shortcode_posts_locate_template( $atts['template'] );

	if ( ! $atts['template'] ) {

		return su_error_message(
			'Posts',
			__( 'ungültiger Vorlagenname', 'upfront-shortcodes' )
		);

	}

	// Save original posts
	global $posts;
	$original_posts = $posts;
	// Filter args
	$args = apply_filters( 'su/shortcode/posts/wp_query_args', $args, $atts );
	// Query posts
	$posts = new WP_Query( $args );
	// Load the template
	$output = su_shortcode_posts_include_template( $atts, $posts );
	// Return original posts
	$posts = $original_posts;
	// Reset the query
	wp_reset_postdata();
	su_query_asset( 'css', 'su-shortcodes' );
	return $output;
}

function su_shortcode_posts_include_template( $atts, $posts ) {

	ob_start();

	include $atts['template'];

	return ob_get_clean();

}

function su_shortcode_posts_locate_template( $template ) {

	$template = su_set_file_extension( $template, 'php' );
	$template = ltrim( $template, '\\/' );

	$locations = apply_filters(
		'su/shortcode/posts/allowed_template_locations',
		array(
			get_stylesheet_directory(),
			get_template_directory(),
			path_join(
				su_get_plugin_path(),
				'includes/partials/shortcodes/posts'
			),
		)
	);

	foreach ( $locations as $base ) {

		$base = untrailingslashit( $base );
		$base = realpath( $base );

		$path = path_join( $base, $template );
		$path = realpath( $path );

		if ( file_exists( $path ) && strpos( $path, $base ) === 0 ) {
			return $path;
		}

	}

	return false;

}
