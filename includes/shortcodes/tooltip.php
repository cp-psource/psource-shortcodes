<?php

su_add_shortcode(
	array(
		'id'       => 'tooltip',
		'callback' => 'su_shortcode_tooltip',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/tooltip.svg',
		'name'     => __( 'Tooltip', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'other',
		'atts'     => array(
			'style'    => array(
				'type'    => 'select',
				'values'  => array(
					'light'     => __( 'Basis: Hell', 'upfront-shortcodes' ),
					'dark'      => __( 'Basis: Dunkel', 'upfront-shortcodes' ),
					'yellow'    => __( 'Basis: Gelb', 'upfront-shortcodes' ),
					'green'     => __( 'Basis: Grün', 'upfront-shortcodes' ),
					'red'       => __( 'Basis: Rot', 'upfront-shortcodes' ),
					'blue'      => __( 'Basis: Blau', 'upfront-shortcodes' ),
					'youtube'   => __( 'Youtube', 'upfront-shortcodes' ),
					'tipsy'     => __( 'Tipsy', 'upfront-shortcodes' ),
					'bootstrap' => __( 'Bootstrap', 'upfront-shortcodes' ),
					'jtools'    => __( 'jTools', 'upfront-shortcodes' ),
					'tipped'    => __( 'Tipped', 'upfront-shortcodes' ),
					'cluetip'   => __( 'Cluetip', 'upfront-shortcodes' ),
				),
				'default' => 'yellow',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip-Fensterstil', 'upfront-shortcodes' ),
			),
			'position' => array(
				'type'    => 'select',
				'values'  => array(
					'north' => __( 'Oben', 'upfront-shortcodes' ),
					'south' => __( 'Unten', 'upfront-shortcodes' ),
					'west'  => __( 'Links', 'upfront-shortcodes' ),
					'east'  => __( 'Rechts', 'upfront-shortcodes' ),
				),
				'default' => 'top',
				'name'    => __( 'Position', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip Position', 'upfront-shortcodes' ),
			),
			'shadow'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Schatten', 'upfront-shortcodes' ),
				'desc'    => __( 'Schatten zur QuickInfo hinzufügen. Diese Option funktioniert nur mit Basisstilen, z.B. blue, green etc..', 'upfront-shortcodes' ),
			),
			'rounded'  => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Abgerundete Ecken', 'upfront-shortcodes' ),
				'desc'    => __( 'Verwende abgerundet für Tooltips. Diese Option funktioniert nur mit Basisstilen, z.B. blue, green etc..', 'upfront-shortcodes' ),
			),
			'size'     => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'1'       => 1,
					'2'       => 2,
					'3'       => 3,
					'4'       => 4,
					'5'       => 5,
					'6'       => 6,
				),
				'default' => 'default',
				'name'    => __( 'Schriftgröße', 'upfront-shortcodes' ),
				'desc'    => __( 'Schriftgröße für Tooltips', 'upfront-shortcodes' ),
			),
			'title'    => array(
				'default' => '',
				'name'    => __( 'Tooltip-Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib den Titel für das Tooltip-Fenster ein. Lasse dieses Feld leer, um den Titel auszublenden', 'upfront-shortcodes' ),
			),
			'content'  => array(
				'default' => __( 'QuickInfo-Text', 'upfront-shortcodes' ),
				'name'    => __( 'Tooltip-Inhalt', 'upfront-shortcodes' ),
				'desc'    => __( 'Gib hier den Tooltip-Inhalt ein', 'upfront-shortcodes' ),
			),
			'behavior' => array(
				'type'    => 'select',
				'values'  => array(
					'hover'  => __( 'Ein- und ausblenden bei Mauszeiger', 'upfront-shortcodes' ),
					'click'  => __( 'Per Mausklick ein- und ausblenden', 'upfront-shortcodes' ),
					'always' => __( 'Immer sichtbar', 'upfront-shortcodes' ),
				),
				'default' => 'hover',
				'name'    => __( 'Verhalten', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip-Verhalten auswählen', 'upfront-shortcodes' ),
			),
			'close'    => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Schließen-Schaltfläche', 'upfront-shortcodes' ),
				'desc'    => __( 'Schließen-Schaltfläche anzeigen', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Bewege den Mauszeiger über mich, um die QuickInfo zu öffnen', 'upfront-shortcodes' ),
		'desc'     => __( 'Tooltip-Fenster mit benutzerdefiniertem Inhalt', 'upfront-shortcodes' ),
		'icon'     => 'comment-o',
	)
);

function su_shortcode_tooltip( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'style'    => 'yellow',
			'position' => 'north',
			'shadow'   => 'no',
			'rounded'  => 'no',
			'size'     => 'default',
			'title'    => '',
			'content'  => __( 'QuickInfo-Text', 'upfront-shortcodes' ),
			'behavior' => 'hover',
			'close'    => 'no',
			'class'    => '',
		),
		$atts,
		'tooltip'
	);

	// Prepare style
	$atts['style'] = in_array( $atts['style'], array( 'light', 'dark', 'green', 'red', 'blue', 'youtube', 'tipsy', 'bootstrap', 'jtools', 'tipped', 'cluetip' ) )
		? $atts['style']
		: 'plain';

	// Position
	$atts['position'] = str_replace( array( 'top', 'right', 'bottom', 'left' ), array( 'north', 'east', 'south', 'west' ), $atts['position'] );
	$position         = array(
		'my' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'bottom center', 'center left', 'top center', 'center right' ), $atts['position'] ),
		'at' => str_replace( array( 'north', 'east', 'south', 'west' ), array( 'top center', 'center right', 'bottom center', 'center left' ), $atts['position'] ),
	);

	// Prepare classes
	$classes   = array( 'su-qtip qtip-' . $atts['style'] );
	$classes[] = 'su-qtip-size-' . $atts['size'];

	if ( $atts['shadow'] === 'yes' ) {
		$classes[] = 'qtip-shadow';
	}

	if ( $atts['rounded'] === 'yes' ) {
		$classes[] = 'qtip-rounded';
	}

	// Query assets
	su_query_asset( 'css', 'qtip' );
	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'qtip' );
	su_query_asset( 'js', 'su-shortcodes' );

	return '<span class="su-tooltip' . su_get_css_class( $atts ) . '" data-close="' . $atts['close'] . '" data-behavior="' . $atts['behavior'] . '" data-my="' . $position['my'] . '" data-at="' . $position['at'] . '" data-classes="' . implode( ' ', $classes ) . '" data-title="' . $atts['title'] . '" title="' . esc_attr( $atts['content'] ) . '">' . do_shortcode( $content ) . '</span>';

}
