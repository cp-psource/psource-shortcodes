<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/config/crop_ratios',
	array(
		'21:9'  => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'21:9'
		),
		'16:9'  => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'16:9'
		),
		'16:10' => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'16:10'
		),
		'5:4'   => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'5:4'
		),
		'4:3'   => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'4:3'
		),
		'3:2'   => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'3:2'
		),
		'2:1'   => sprintf(
			'[%s] %s',
			__( 'Landscape', 'upfront-shortcodes' ),
			'2:1'
		),
		'1:1'   => sprintf(
			'[%s] %s',
			__( 'Square', 'upfront-shortcodes' ),
			'1:1'
		),
		'1:2'   => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'1:2'
		),
		'2:3'   => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'2:3'
		),
		'3:4'   => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'3:4'
		),
		'4:5'   => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'4:5'
		),
		'10:16' => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'10:16'
		),
		'9:16'  => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'9:16'
		),
		'9:21'  => sprintf(
			'[%s] %s',
			__( 'Portrait', 'upfront-shortcodes' ),
			'9:21'
		),
	)
);
