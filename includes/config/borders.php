<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/data/borders',
	array(
		'none'   => __( 'Keinen', 'upfront-shortcodes' ),
		'solid'  => __( 'Fest', 'upfront-shortcodes' ),
		'dotted' => __( 'Gepunktet', 'upfront-shortcodes' ),
		'dashed' => __( 'Gestrichelt', 'upfront-shortcodes' ),
		'double' => __( 'Doppelt', 'upfront-shortcodes' ),
		'groove' => __( 'Groove', 'upfront-shortcodes' ),
		'ridge'  => __( 'Grat', 'upfront-shortcodes' ),
	)
);
