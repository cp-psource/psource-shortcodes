<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/config/supported_blocks',
	array(
		'core/paragraph' => __( 'Absatz', 'upfront-shortcodes' ),
		'core/shortcode' => __( 'Shortcode', 'upfront-shortcodes' ),
		'core/freeform'  => __( 'Classic', 'upfront-shortcodes' ),
	)
);
