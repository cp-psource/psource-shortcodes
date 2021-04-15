<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/data/groups',
	array(
		'all'     => __( 'Alle', 'upfront-shortcodes' ),
		'content' => __( 'Inhalt', 'upfront-shortcodes' ),
		'box'     => __( 'Box', 'upfront-shortcodes' ),
		'media'   => __( 'Medien', 'upfront-shortcodes' ),
		'gallery' => __( 'Galerie', 'upfront-shortcodes' ),
		'data'    => __( 'Daten', 'upfront-shortcodes' ),
		'other'   => __( 'Andere', 'upfront-shortcodes' ),
	)
);
