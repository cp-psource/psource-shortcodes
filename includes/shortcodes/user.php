<?php

su_add_shortcode(
	array(
		'id'       => 'user',
		'callback' => 'su_shortcode_user',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/user.svg',
		'name'     => __( 'User data', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'data',
		'atts'     => array(
			'field'   => array(
				'type'    => 'select',
				'values'  => array(
					'first_name'          => __( 'First name', 'upfront-shortcodes' ),
					'last_name'           => __( 'Last name', 'upfront-shortcodes' ),
					'nickname'            => __( 'Nickname', 'upfront-shortcodes' ),
					'description'         => __( 'Description', 'upfront-shortcodes' ),
					'locale'              => __( 'Locale', 'upfront-shortcodes' ),
					'display_name'        => __( 'Display name', 'upfront-shortcodes' ),
					'ID'                  => __( 'ID', 'upfront-shortcodes' ),
					'user_login'          => __( 'Login', 'upfront-shortcodes' ),
					'user_nicename'       => __( 'Nice name', 'upfront-shortcodes' ),
					'user_email'          => __( 'Email', 'upfront-shortcodes' ),
					'user_url'            => __( 'URL', 'upfront-shortcodes' ),
					'user_registered'     => __( 'Registered', 'upfront-shortcodes' ),
					'user_activation_key' => __( 'Activation key', 'upfront-shortcodes' ),
					'user_status'         => __( 'Status', 'upfront-shortcodes' ),
				),
				'default' => 'display_name',
				'name'    => __( 'Field', 'upfront-shortcodes' ),
				'desc'    => __( 'User data field name. Custom meta field names are also allowed.', 'upfront-shortcodes' ),
			),
			'default' => array(
				'default' => '',
				'name'    => __( 'Default', 'upfront-shortcodes' ),
				'desc'    => __( 'This text will be shown if data is not found', 'upfront-shortcodes' ),
			),
			'before'  => array(
				'default' => '',
				'name'    => __( 'Before', 'upfront-shortcodes' ),
				'desc'    => __( 'This content will be shown before the value', 'upfront-shortcodes' ),
			),
			'after'   => array(
				'default' => '',
				'name'    => __( 'After', 'upfront-shortcodes' ),
				'desc'    => __( 'This content will be shown after the value', 'upfront-shortcodes' ),
			),
			'user_id' => array(
				'default' => '',
				'name'    => __( 'User ID', 'upfront-shortcodes' ),
				'desc'    => __( 'You can specify custom user ID. Leave this field empty to use an ID of the current user', 'upfront-shortcodes' ),
			),
			'filter'  => array(
				'default' => '',
				'name'    => __( 'Filter', 'upfront-shortcodes' ),
				'desc'    => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Name of your function must include word <b>filter</b>. Example function: ', 'upfront-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>",
			),
		),
		'desc'     => __( 'This shortcode can display a user data, like login or email, including meta fields', 'upfront-shortcodes' ),
		'icon'     => 'info-circle',
	)
);

function su_shortcode_user( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts( 'user', $atts );

	if ( 'user_pass' === $atts['field'] ) {

		return su_error_message(
			'User',
			__( 'password field is not allowed', 'upfront-shortcodes' )
		);

	}

	$atts['user_id'] = su_do_attribute( $atts['user_id'] );

	if ( ! $atts['user_id'] ) {
		$atts['user_id'] = get_current_user_id();
	}

	if ( ! is_numeric( $atts['user_id'] ) || $atts['user_id'] < 0 ) {

		return su_error_message(
			'User',
			__( 'invalid user ID', 'upfront-shortcodes' )
		);

	}

	$user = get_user_by( 'id', $atts['user_id'] );

	if ( ! $user ) {

		return su_error_message(
			'User',
			__( 'user not found', 'upfront-shortcodes' )
		);

	}

	$data = $user->get( $atts['field'] );

	if ( ! is_string( $data ) || '' === $data ) {
		$data = su_do_attribute( $atts['default'] );
	}

	if (
		$atts['filter'] &&
		su_is_filter_safe( $atts['filter'] ) &&
		function_exists( $atts['filter'] )
	) {
		$data = call_user_func( $atts['filter'], $data );
	}

	return $data ? $atts['before'] . $data . $atts['after'] : '';

}
