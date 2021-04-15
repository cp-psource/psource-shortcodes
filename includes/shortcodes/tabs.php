<?php

su_add_shortcode(
	array(
		'id'             => 'tabs',
		'callback'       => 'su_shortcode_tabs',
		'name'           => __( 'Tabs', 'upfront-shortcodes' ),
		'type'           => 'wrap',
		'group'          => 'box',
		'required_child' => 'tab',
		'desc'           => __( 'Tabs container', 'upfront-shortcodes' ),
		'icon'           => 'list-alt',
		'image'          => su_get_plugin_url() . 'admin/images/shortcodes/tabs.svg',
		'atts'           => array(
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose style for this tabs', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'active'        => array(
				'type'    => 'number',
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 1,
				'name'    => __( 'Active tab', 'upfront-shortcodes' ),
				'desc'    => __( 'Select which tab is open by default', 'upfront-shortcodes' ),
			),
			'vertical'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Vertical', 'upfront-shortcodes' ),
				'desc'    => __( 'Align tabs vertically', 'upfront-shortcodes' ),
			),
			'mobile'        => array(
				'type'    => 'select',
				'values'  => array(
					'stack'   => __( 'Stack – tab handles will stack vertically', 'upfront-shortcodes' ),
					'desktop' => __( 'Desktop – tabs will be displayed as on the desktop', 'upfront-shortcodes' ),
					'scroll'  => __( 'Scroll – tab bar will be scrollable horizontally', 'upfront-shortcodes' ),
				),
				'default' => 'stack',
				'name'    => __( 'Appearance on mobile devices', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls how shortcode will look and function on mobile devices.', 'upfront-shortcodes' ),
			),
			'anchor_in_url' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Anchor in URL', 'upfront-shortcodes' ),
				'desc'    => __( 'This option specifies whether an anchor will be added to page URL after clicking a tab', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'        => array(
			'id'     => 'tab',
			'number' => 3,
		),
	)
);

su_add_shortcode(
	array(
		'id'              => 'tab',
		'callback'        => 'su_shortcode_tab',
		'name'            => __( 'Tab', 'upfront-shortcodes' ),
		'type'            => 'wrap',
		'group'           => 'box',
		'required_parent' => 'tabs',
		'content'         => __( 'Tab content', 'upfront-shortcodes' ),
		'desc'            => __( 'Single tab', 'upfront-shortcodes' ),
		'note'            => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'upfront-shortcodes' ),
		'icon'            => 'list-alt',
		'image'           => su_get_plugin_url() . 'admin/images/shortcodes/tab.svg',
		'atts'            => array(
			'title'    => array(
				'default' => __( 'Tab name', 'upfront-shortcodes' ),
				'name'    => __( 'Title', 'upfront-shortcodes' ),
				'desc'    => __( 'Tab title', 'upfront-shortcodes' ),
			),
			'disabled' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Disabled', 'upfront-shortcodes' ),
				'desc'    => __( 'Is this tab disabled', 'upfront-shortcodes' ),
			),
			'anchor'   => array(
				'default' => '',
				'name'    => __( 'Anchor', 'upfront-shortcodes' ),
				'desc'    => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: use <b%value>Hello</b> and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'upfront-shortcodes' ),
			),
			'url'      => array(
				'default' => '',
				'name'    => __( 'URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Link tab to any webpage. Use full URL to turn the tab title into link', 'upfront-shortcodes' ),
			),
			'target'   => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Open in same tab', 'upfront-shortcodes' ),
					'blank' => __( 'Open in new tab', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Link target', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose how to open the custom tab link', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
	)
);

$upfront_shortcodes_global_tabs       = array();
$upfront_shortcodes_global_tabs_count = 0;

function su_shortcode_tabs( $atts = null, $content = null ) {

	global $upfront_shortcodes_global_tabs, $upfront_shortcodes_global_tabs_count;

	$atts = shortcode_atts(
		array(
			'active'        => 1,
			'vertical'      => 'no',
			'style'         => 'default', // 3.x
			'mobile'        => 'stack',
			'scroll_offset' => 0,
			'anchor_in_url' => 'no',
			'class'         => '',
		),
		$atts,
		'tabs'
	);

	if ( '3' === $atts['style'] ) {
		$atts['vertical'] = 'yes';
	}

	if ( 'yes' === $atts['vertical'] ) {
		$atts['class'] .= ' su-tabs-vertical';
	}

	do_shortcode( $content );

	$tabs  = array();
	$panes = array();

	if ( ! is_array( $upfront_shortcodes_global_tabs ) ) {
		return;
	}

	if ( $upfront_shortcodes_global_tabs_count < $atts['active'] ) {
		$atts['active'] = $upfront_shortcodes_global_tabs_count;
	}

	foreach ( $upfront_shortcodes_global_tabs as $tab ) {

		$tabs[] = '<span class="' . su_get_css_class( $tab ) . $tab['disabled'] . '"' . $tab['anchor'] . $tab['url'] . $tab['target'] . ' tabindex="0" role="button">' . su_do_attribute( $tab['title'] ) . '</span>';

		$panes[] = '<div class="su-tabs-pane su-u-clearfix su-u-trim' . su_get_css_class( $tab ) . '" data-title="' . esc_attr( $tab['title'] ) . '">' . $tab['content'] . '</div>';

	}

	$atts['mobile'] = sanitize_key( $atts['mobile'] );

	$output = '<div class="su-tabs su-tabs-style-' . $atts['style'] . ' su-tabs-mobile-' . $atts['mobile'] . su_get_css_class( $atts ) . '" data-active="' . (string) $atts['active'] . '" data-scroll-offset="' . intval( $atts['scroll_offset'] ) . '" data-anchor-in-url="' . sanitize_key( $atts['anchor_in_url'] ) . '"><div class="su-tabs-nav">' . implode( '', $tabs ) . '</div><div class="su-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';

	// Reset tabs
	$upfront_shortcodes_global_tabs       = array();
	$upfront_shortcodes_global_tabs_count = 0;

	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'su-shortcodes' );

	return $output;

}

function su_shortcode_tab( $atts = null, $content = null ) {

	global $upfront_shortcodes_global_tabs, $upfront_shortcodes_global_tabs_count;

	$atts = shortcode_atts(
		array(
			'title'    => __( 'Tab title', 'upfront-shortcodes' ),
			'disabled' => 'no',
			'anchor'   => '',
			'url'      => '',
			'target'   => 'blank',
			'class'    => '',
		),
		$atts,
		'tab'
	);

	$x = $upfront_shortcodes_global_tabs_count;

	$upfront_shortcodes_global_tabs[ $x ] = array(
		'title'    => $atts['title'],
		'content'  => do_shortcode( $content ),
		'disabled' => 'yes' === $atts['disabled'] ? ' su-tabs-disabled' : '',
		'anchor'   => $atts['anchor'] ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '',
		'url'      => ' data-url="' . $atts['url'] . '"',
		'target'   => ' data-target="' . $atts['target'] . '"',
		'class'    => $atts['class'],
	);

	$upfront_shortcodes_global_tabs_count++;

}
