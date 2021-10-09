<?php

su_add_shortcode(
	array(
		'id'             => 'tabs',
		'callback'       => 'su_shortcode_tabs',
		'name'           => __( 'Registerkarten', 'upfront-shortcodes' ),
		'type'           => 'wrap',
		'group'          => 'box',
		'required_child' => 'tab',
		'desc'           => __( 'Registerkarten-Container', 'upfront-shortcodes' ),
		'icon'           => 'list-alt',
		'image'          => su_get_plugin_url() . 'admin/images/shortcodes/tabs.svg',
		'atts'           => array(
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Stil für diese Registerkarten', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'active'        => array(
				'type'    => 'number',
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 1,
				'name'    => __( 'Aktive Registerkarte', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle aus, welche Registerkarte standardmäßig geöffnet ist', 'upfront-shortcodes' ),
			),
			'vertical'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Vertikal', 'upfront-shortcodes' ),
				'desc'    => __( 'Registerkarten vertikal ausrichten', 'upfront-shortcodes' ),
			),
			'mobile'        => array(
				'type'    => 'select',
				'values'  => array(
					'stack'   => __( 'Stapeln – Registerkarten-Griffe werden vertikal gestapelt', 'upfront-shortcodes' ),
					'desktop' => __( 'Desktop – Registerkarten werden wie auf dem Desktop angezeigt', 'upfront-shortcodes' ),
					'scroll'  => __( 'Scrollen – Tab-Leiste ist horizontal scrollbar', 'upfront-shortcodes' ),
				),
				'default' => 'stack',
				'name'    => __( 'Darstellung auf Mobilgeräten', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert, wie der Shortcode auf Mobilgeräten aussehen und funktionieren soll.', 'upfront-shortcodes' ),
			),
			'anchor_in_url' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Anker in URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option gibt an, ob ein Anker zur Seiten-URL hinzugefügt wird, nachdem auf eine Registerkarte geklickt wurde', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
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
		'name'            => __( 'Registerkarte', 'upfront-shortcodes' ),
		'type'            => 'wrap',
		'group'           => 'box',
		'required_parent' => 'tabs',
		'content'         => __( 'Registerkarte-Inhalt', 'upfront-shortcodes' ),
		'desc'            => __( 'Einzelne Registerkarte', 'upfront-shortcodes' ),
		'note'            => __( 'Wusstest Du, dass Du einzelne Tabs mit dem Shortcode [tabs] umschließen musst?', 'upfront-shortcodes' ),
		'icon'            => 'list-alt',
		'image'           => su_get_plugin_url() . 'admin/images/shortcodes/tab.svg',
		'atts'            => array(
			'title'    => array(
				'default' => __( 'Registerkartenname', 'upfront-shortcodes' ),
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Registerkarte-Titel', 'upfront-shortcodes' ),
			),
			'disabled' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Deaktiviert', 'upfront-shortcodes' ),
				'desc'    => __( 'Ist diese Registerkarte deaktiviert?', 'upfront-shortcodes' ),
			),
			'anchor'   => array(
				'default' => '',
				'name'    => __( 'Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen eindeutigen Anker für diese Registerkarte verwenden, um mit Hash in der Seiten-URL darauf zuzugreifen. Beispiel: Verwende <b%value>Hallo</b> und navigiere dann zu einer URL wie http://example.com/page-url#Hallo. Diese Registerkarte wird aktiviert und hineingescrollt', 'upfront-shortcodes' ),
			),
			'url'      => array(
				'default' => '',
				'name'    => __( 'URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Verinke Registerkarte zu einer beliebigen Webseite. Verwende die vollständige URL, um den Titel der Registerkarte in einen Link umzuwandeln', 'upfront-shortcodes' ),
			),
			'target'   => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle aus, wie der benutzerdefinierte Tab-Link geöffnet werden soll', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
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

	$output = '<div class="su-tabs su-tabs-style-' . esc_attr( $atts['style'] ) . ' su-tabs-mobile-' . esc_attr( $atts['mobile'] ) . su_get_css_class( $atts ) . '" data-active="' . esc_attr( $atts['active'] ) . '" data-scroll-offset="' . intval( $atts['scroll_offset'] ) . '" data-anchor-in-url="' . sanitize_key( $atts['anchor_in_url'] ) . '"><div class="su-tabs-nav">' . implode( '', $tabs ) . '</div><div class="su-tabs-panes">' . implode( "\n", $panes ) . '</div></div>';

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
			'title'    => __( 'Registerkarte-Titel', 'upfront-shortcodes' ),
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
		'anchor'   => $atts['anchor'] ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', esc_attr( $atts['anchor'] ) ) . '"' : '',
		'url'      => ' data-url="' . esc_attr( $atts['url'] ) . '"',
		'target'   => ' data-target="' . esc_attr( $atts['target'] ) . '"',
		'class'    => $atts['class'],
	);

	$upfront_shortcodes_global_tabs_count++;

}
