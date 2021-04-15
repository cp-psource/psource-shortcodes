<?php

su_add_shortcode(
	array(
		'id'       => 'post',
		'type'     => 'single',
		'group'    => 'data',
		'callback' => 'su_shortcode_post',
		'icon'     => 'info-circle',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/post.svg',
		'name'     => __( 'Post data', 'upfront-shortcodes' ),
		'desc'     => __( 'The utility shortcode to display various post data, like post title, status or excerpt', 'upfront-shortcodes' ),
		'atts'     => array(
			'field'     => array(
				'type'    => 'select',
				'values'  => array(
					'ID'                => __( 'Post ID', 'upfront-shortcodes' ),
					'post_author'       => __( 'Post author', 'upfront-shortcodes' ),
					'post_date'         => __( 'Post date', 'upfront-shortcodes' ),
					'post_date_gmt'     => __( 'Post date', 'upfront-shortcodes' ) . ' GMT',
					'post_content'      => __( 'Post content (Raw)', 'upfront-shortcodes' ),
					'the_content'       => __( 'Post content (Filtered)', 'upfront-shortcodes' ),
					'post_title'        => __( 'Post title', 'upfront-shortcodes' ),
					'post_excerpt'      => __( 'Post excerpt', 'upfront-shortcodes' ),
					'post_status'       => __( 'Post status', 'upfront-shortcodes' ),
					'comment_status'    => __( 'Comment status', 'upfront-shortcodes' ),
					'ping_status'       => __( 'Ping status', 'upfront-shortcodes' ),
					'post_name'         => __( 'Post name', 'upfront-shortcodes' ),
					'post_modified'     => __( 'Post modified', 'upfront-shortcodes' ),
					'post_modified_gmt' => __( 'Post modified', 'upfront-shortcodes' ) . ' GMT',
					'post_parent'       => __( 'Post parent', 'upfront-shortcodes' ),
					'guid'              => __( 'GUID', 'upfront-shortcodes' ),
					'menu_order'        => __( 'Menu order', 'upfront-shortcodes' ),
					'post_type'         => __( 'Post type', 'upfront-shortcodes' ),
					'post_mime_type'    => __( 'Post mime type', 'upfront-shortcodes' ),
					'comment_count'     => __( 'Comment count', 'upfront-shortcodes' ),
				),
				'default' => 'post_title',
				'name'    => __( 'Field', 'upfront-shortcodes' ),
				'desc'    => __( 'Post data field name', 'upfront-shortcodes' ),
			),
			'default'   => array(
				'default' => '',
				'name'    => __( 'Default', 'upfront-shortcodes' ),
				'desc'    => __( 'This text will be shown if data is not found', 'upfront-shortcodes' ),
			),
			'before'    => array(
				'default' => '',
				'name'    => __( 'Before', 'upfront-shortcodes' ),
				'desc'    => __( 'This content will be shown before the value', 'upfront-shortcodes' ),
			),
			'after'     => array(
				'default' => '',
				'name'    => __( 'After', 'upfront-shortcodes' ),
				'desc'    => __( 'This content will be shown after the value', 'upfront-shortcodes' ),
			),
			'post_id'   => array(
				'default' => '',
				'name'    => __( 'Post ID', 'upfront-shortcodes' ),
				'desc'    => __( 'You can specify custom post ID. Post slug is also allowed. Leave this field empty to use ID of the current post. Current post ID may not work in Live Preview mode', 'upfront-shortcodes' ),
			),
			'post_type' => array(
				'type'    => 'post_type',
				'default' => 'post',
				'name'    => __( 'Post type', 'upfront-shortcodes' ),
				'desc'    => __( 'Post type of the post you want to display the data from', 'upfront-shortcodes' ),
			),
			'filter'    => array(
				'default' => '',
				'name'    => __( 'Filter', 'upfront-shortcodes' ),
				'desc'    => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Name of your function must include word <b>filter</b>. Example function: ', 'upfront-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>",
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
			__( 'invalid post ID', 'upfront-shortcodes' )
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
