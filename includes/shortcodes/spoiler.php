<?php

su_add_shortcode(
	array(
		'id'       => 'spoiler',
		'callback' => 'su_shortcode_spoiler',
		'name'     => __( 'Spoiler', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'title'         => array(
				'default' => __( 'Spoiler title', 'upfront-shortcodes' ),
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'Text in spoiler title', 'upfront-shortcodes' ),
			),
			'open'          => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Open', 'upfront-shortcodes' ),
				'desc'    => __( 'Is spoiler content visible by default', 'upfront-shortcodes' ),
			),
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'fancy'   => __( 'Fancy', 'upfront-shortcodes' ),
					'simple'  => __( 'Simple', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose style for this spoiler', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'icon'          => array(
				'type'    => 'select',
				'values'  => array(
					'plus'           => __( 'Plus', 'upfront-shortcodes' ),
					'plus-circle'    => __( 'Plus circle', 'upfront-shortcodes' ),
					'plus-square-1'  => __( 'Plus square 1', 'upfront-shortcodes' ),
					'plus-square-2'  => __( 'Plus square 2', 'upfront-shortcodes' ),
					'arrow'          => __( 'Arrow', 'upfront-shortcodes' ),
					'arrow-circle-1' => __( 'Arrow circle 1', 'upfront-shortcodes' ),
					'arrow-circle-2' => __( 'Arrow circle 2', 'upfront-shortcodes' ),
					'chevron'        => __( 'Chevron', 'upfront-shortcodes' ),
					'chevron-circle' => __( 'Chevron circle', 'upfront-shortcodes' ),
					'caret'          => __( 'Caret', 'upfront-shortcodes' ),
					'caret-square'   => __( 'Caret square', 'upfront-shortcodes' ),
					'folder-1'       => __( 'Folder 1', 'upfront-shortcodes' ),
					'folder-2'       => __( 'Folder 2', 'upfront-shortcodes' ),
				),
				'default' => 'plus',
				'name'    => __( 'Icon', 'upfront-shortcodes' ),
				'desc'    => __( 'Icons for spoiler', 'upfront-shortcodes' ),
			),
			'anchor'        => array(
				'default' => '',
				'name'    => __( 'Anchor', 'upfront-shortcodes' ),
				'desc'    => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'upfront-shortcodes' ),
			),
			'anchor_in_url' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Anchor in URL', 'upfront-shortcodes' ),
				'desc'    => __( 'This option specifies whether an anchor will be added to page URL after clicking the spoiler', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Hidden content', 'upfront-shortcodes' ),
		'desc'     => __( 'Spoiler with hidden content', 'upfront-shortcodes' ),
		'note'     => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'upfront-shortcodes' ),
		'example'  => 'spoilers',
		'icon'     => 'list-ul',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/spoiler.svg',
	)
);

function su_shortcode_spoiler( $atts = null, $content = null ) {
	$atts           = shortcode_atts(
		array(
			'title'         => __( 'Spoiler title', 'upfront-shortcodes' ),
			'open'          => 'no',
			'style'         => 'default',
			'icon'          => 'plus',
			'anchor'        => '',
			'anchor_in_url' => 'no',
			'scroll_offset' => 0,
			'class'         => '',
		),
		$atts,
		'spoiler'
	);
	$atts['style']  = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
	$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
	if ( 'yes' !== $atts['open'] ) {
		$atts['class'] .= ' su-spoiler-closed';
	}
	su_query_asset( 'css', 'su-icons' );
	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'su-shortcodes' );
	do_action( 'su/shortcode/spoiler', $atts );
	return '<div class="su-spoiler su-spoiler-style-' . $atts['style'] . ' su-spoiler-icon-' . $atts['icon'] . su_get_css_class( $atts ) . '"' . $atts['anchor'] . ' data-scroll-offset="' . intval( $atts['scroll_offset'] ) . '" data-anchor-in-url="' . sanitize_key( $atts['anchor_in_url'] ) . '"><div class="su-spoiler-title" tabindex="0" role="button"><span class="su-spoiler-icon"></span>' . su_do_attribute( $atts['title'] ) . '</div><div class="su-spoiler-content su-u-clearfix su-u-trim">' . su_do_nested_shortcodes( $content, 'spoiler' ) . '</div></div>';
}
