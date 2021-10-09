<?php

su_add_shortcode(
	array(
		'id'       => 'siblings',
		'callback' => 'su_shortcode_siblings',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/siblings.svg',
		'name'     => __( 'Geschwister', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'other',
		'atts'     => array(
			'depth' => array(
				'type'    => 'select',
				'values'  => array( 1, 2, 3 ),
				'default' => 1,
				'name'    => __( 'Tiefe', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximale Tiefenstufe', 'upfront-shortcodes' ),
			),
			'class' => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Liste der aktuellen Seitengeschwister', 'upfront-shortcodes' ),
		'icon'     => 'bars',
	)
);

function su_shortcode_siblings( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'depth' => 1,
			'class' => '',
		),
		$atts,
		'siblings'
	);

	global $post;

	if ( ! ( $post instanceof WP_Post ) ) {
		return;
	}

	$return = wp_list_pages(
		array(
			'title_li' => '',
			'echo'     => 0,
			'child_of' => $post->post_parent,
			'depth'    => intval( $atts['depth'] ),
			'exclude'  => $post->ID,
		)
	);

	return $return
		? '<ul class="su-siblings' . su_get_css_class( $atts ) . '">' . $return . '</ul>'
		: '';
}
