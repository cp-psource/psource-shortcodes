<?php

su_add_shortcode(
	array(
		'id'       => 'display_posts',
		'callback' => 'su_shortcode_display_posts',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/display-posts.svg',
		'icon'     => 'th-list',
		'name'     => __( 'Posts', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'article'  => 'https://nerds.work/docs/display-posts/',
		'atts'     => array(
			'template'          => array(
				'default' => 'default',
				'name'    => __( 'Template', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'<p>%s.</p><p>%s:</p><ul><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li><li>%s - %s</li></ul><p><a href="%s" target="_blank">%s</a></p>',
					__( 'Template name', 'upfront-shortcodes' ),
					__( 'Available templates', 'upfront-shortcodes' ),
					'<b%value>default</b>',
					__( 'default template with thumbnail, title, and excerpt', 'upfront-shortcodes' ),
					'<b%value>default-meta</b>',
					__( 'default template with various meta data', 'upfront-shortcodes' ),
					'<b%value>list</b>',
					__( 'unordered list with post titles', 'upfront-shortcodes' ),
					'<b%value>teasers</b>',
					__( 'small teasers containing post thumbnails and titles', 'upfront-shortcodes' ),
					'<b%value>single</b>',
					__( 'single post template', 'upfront-shortcodes' ),
					'https://nerds.work/docs/display-posts/',
					__( 'How to create/edit a template', 'upfront-shortcodes' )
				),
			),
			'post_ids'          => array(
				'default' => '',
				'name'    => __( 'Post IDs', 'upfront-shortcodes' ),
				'desc'    => __( 'Comma separated list of post IDs to include', 'upfront-shortcodes' ),
			),
			'posts_per_page'    => array(
				'type'    => 'number',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => '10',
				'name'    => __( 'Posts per page', 'upfront-shortcodes' ),
				'desc'    => __( 'Number of posts that will be shown. Use -1 to display all posts.', 'upfront-shortcodes' ),
			),
			'post_type'         => array(
				'type'     => 'post_type',
				'multiple' => true,
				'values'   => array(),
				'default'  => 'post',
				'name'     => __( 'Post types', 'upfront-shortcodes' ),
				'desc'     => __( 'Filter posts by post type', 'upfront-shortcodes' ),
			),
			'taxonomy_1'        => array(
				'type'    => 'taxonomy',
				'values'  => array(),
				'default' => 'category',
				'name'    => __( 'Taxonomy', 'upfront-shortcodes' ),
				'desc'    => __( 'Show posts associated with certain taxonomy', 'upfront-shortcodes' ),
			),
			'tax_terms_1'       => array(
				'type'     => 'term',
				'multiple' => true,
				'values'   => array(),
				'default'  => '',
				'name'     => __( 'Terms', 'upfront-shortcodes' ),
				'desc'     => __( 'Show posts associated with specified taxonomy terms.', 'upfront-shortcodes' ),
			),
			'tax_operator_1'    => array(
				'type'    => 'select',
				'values'  => array(
					'IN'     => __(
						'IN - posts that have any of the selected terms',
						'upfront-shortcodes'
					),
					'NOT IN' => __(
						'NOT IN - posts that do not have any of the selected terms',
						'upfront-shortcodes'
					),
					'AND'    => __(
						'AND - posts that have all of the selected terms',
						'upfront-shortcodes'
					),
				),
				'default' => 'IN',
				'name'    => __( 'Taxonomy term operator', 'upfront-shortcodes' ),
				'desc'    => __( 'Taxonomy terms operator', 'upfront-shortcodes' ),
			),
			'author'            => array(
				'default' => '',
				'name'    => __( 'Authors', 'upfront-shortcodes' ),
				'desc'    => __( 'Comma separated list of author IDs', 'upfront-shortcodes' ),
			),
			'meta_key'          => array(
				'default' => '',
				'name'    => __( 'Meta key', 'upfront-shortcodes' ),
				'desc'    => __( 'Show posts associated with a certain custom field', 'upfront-shortcodes' ),
			),
			'offset'            => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 10000,
				'step'    => 1,
				'default' => 0,
				'name'    => __( 'Offset', 'upfront-shortcodes' ),
				'desc'    => __( 'Number of posts to displace or pass over. The offset parameter is ignored when posts_per_page=-1 (show all posts) is used.', 'upfront-shortcodes' ),
			),
			'orderby'           => array(
				'type'    => 'select',
				'values'  => array(
					'none'           => __( 'None', 'upfront-shortcodes' ),
					'id'             => __( 'Post ID', 'upfront-shortcodes' ),
					'author'         => __( 'Post author', 'upfront-shortcodes' ),
					'title'          => __( 'Post title', 'upfront-shortcodes' ),
					'name'           => __( 'Post slug', 'upfront-shortcodes' ),
					'date'           => __( 'Date', 'upfront-shortcodes' ),
					'modified'       => __( 'Last modified date', 'upfront-shortcodes' ),
					'parent'         => __( 'Post parent', 'upfront-shortcodes' ),
					'rand'           => __( 'Random', 'upfront-shortcodes' ),
					'comment_count'  => __( 'Comments number', 'upfront-shortcodes' ),
					'menu_order'     => __( 'Menu order', 'upfront-shortcodes' ),
					'meta_value'     => __( 'Meta key values', 'upfront-shortcodes' ),
					'meta_value_num' => __( 'Meta key values (Numeric)', 'upfront-shortcodes' ),
				),
				'default' => 'date',
				'name'    => __( 'Order by', 'upfront-shortcodes' ),
				'desc'    => __( 'Sort retrieved posts by parameter', 'upfront-shortcodes' ),
			),
			'order'             => array(
				'type'    => 'select',
				'values'  => array(
					'desc' => __( 'Descending', 'upfront-shortcodes' ),
					'asc'  => __( 'Ascending', 'upfront-shortcodes' ),
				),
				'default' => 'desc',
				'name'    => __( 'Order', 'upfront-shortcodes' ),
				'desc'    => __( 'Designates the ascending or descending order of the orderby parameter', 'upfront-shortcodes' ),
			),
			'post_parent'       => array(
				'default' => '',
				'name'    => __( 'Post parent', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					// translators: %s will be replaced with clickable text "current"
					__( 'Filter posts by post parent (use parent post ID). Use "%s" keyword to display childs of the current post.', 'upfront-shortcodes' ),
					'<b%value>current</b>'
				),
			),
			'post_status'       => array(
				'type'    => 'select',
				'values'  => array(
					'publish'    => __( 'Published', 'upfront-shortcodes' ),
					'pending'    => __( 'Pending', 'upfront-shortcodes' ),
					'draft'      => __( 'Draft', 'upfront-shortcodes' ),
					'auto-draft' => __( 'Auto-draft', 'upfront-shortcodes' ),
					'future'     => __( 'Future post', 'upfront-shortcodes' ),
					'private'    => __( 'Private post', 'upfront-shortcodes' ),
					'inherit'    => __( 'Inherit', 'upfront-shortcodes' ),
					'trash'      => __( 'Trashed', 'upfront-shortcodes' ),
					'any'        => __( 'Any', 'upfront-shortcodes' ),
				),
				'default' => 'publish',
				'name'    => __( 'Post status', 'upfront-shortcodes' ),
				'desc'    => __( 'Filter posts by status', 'upfront-shortcodes' ),
			),
			'ignore_sticky'     => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Ignore sticky', 'upfront-shortcodes' ),
				'desc'    => __( 'Set this option to yes to ignore sticky posts', 'upfront-shortcodes' ),
			),
			'exclude'           => array(
				'default' => '',
				'name'    => __( 'Exclude Posts', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					// translators: %s will be replaced with clickable text "current"
					__( 'Comma separated list of post IDs to exclude. Use "%s" keyword to exclude the current post.', 'upfront-shortcodes' ),
					'<b%value>current</b>'
				),
			),
			'quality'           => array(
				'type'    => 'select',
				'values'  => su_get_image_sizes(),
				'default' => 'thubmnail',
				'name'    => __( 'Thumbnails quality (if applicable)', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls the size of thumbnail images. This option only affects image quality, not the actual thumbnail size.', 'upfront-shortcodes' ),
			),
			'pagination'        => array(
				'type'    => 'select',
				'values'  => array(
					'no'        => __( 'Disabled', 'upfront-shortcodes' ),
					'prev-next' => __( 'Previous/Next', 'upfront-shortcodes' ),
				),
				'default' => 'no',
				'name'    => __( 'Pagination', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls pagination', 'upfront-shortcodes' ),
			),
			'pagination_prev'   => array(
				'default' => __( 'Previous page', 'upfront-shortcodes' ),
				'name'    => __( 'Previous page link label', 'upfront-shortcodes' ),
				'desc'    => __( 'Use this option to set a custom label for the previous page link.', 'upfront-shortcodes' ),
			),
			'pagination_next'   => array(
				'default' => __( 'Next page', 'upfront-shortcodes' ),
				'name'    => __( 'Next page link label', 'upfront-shortcodes' ),
				'desc'    => __( 'Use this option to set a custom label for the next page link.', 'upfront-shortcodes' ),
			),
			'pagination_anchor' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Achors in Pagination', 'upfront-shortcodes' ),
				'desc'    => __( 'Use this option to enable anchors in pagination links. As a result, after navigating to a new page, browser will scroll in the posts element.', 'upfront-shortcodes' ),
			),
			'id'                => array(
				'name'    => __( 'HTML Anchor (ID)', 'upfront-shortcodes' ),
				'desc'    => __( 'Anchors lets you link directly to an element on a page', 'upfront-shortcodes' ),
				'default' => '',
			),
			'class'             => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Custom posts query with customizable template', 'upfront-shortcodes' ),
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
			__( 'invalid template name', 'upfront-shortcodes' )
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
