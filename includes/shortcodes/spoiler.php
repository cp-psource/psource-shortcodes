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
				'default' => __( 'Spoiler Titel', 'upfront-shortcodes' ),
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Text im Spoilertitel', 'upfront-shortcodes' ),
			),
			'open'          => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Offen', 'upfront-shortcodes' ),
				'desc'    => __( 'Ist Spoilerinhalt standardmäßig sichtbar', 'upfront-shortcodes' ),
			),
			'style'         => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'fancy'   => __( 'Schick', 'upfront-shortcodes' ),
					'simple'  => __( 'Einfach', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle den Stil für diesen Spoiler', 'upfront-shortcodes' ) . '%su_skins_link%',
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
				'name'    => __( 'Symbol', 'upfront-shortcodes' ),
				'desc'    => __( 'Symbole für Spoiler', 'upfront-shortcodes' ),
			),
			'anchor'        => array(
				'default' => '',
				'name'    => __( 'Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen einzigartigen Anker für diesen Spoiler verwenden, um mit Hash in der Seiten-URL darauf zuzugreifen. Zum Beispiel: Gib hier <b%value>Hallo</b> ein und verwende dann eine URL wie http://example.com/page-url#Hello. Dieser Spoiler wird geöffnet und gescrollt', 'upfront-shortcodes' ),
			),
			'anchor_in_url' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Anker in URL', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option legt fest, ob ein Anker zur Seiten-URL hinzugefügt wird, nachdem auf den Spoiler geklickt wurde', 'upfront-shortcodes' ),
			),
			'class'         => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Versteckter Inhalt', 'upfront-shortcodes' ),
		'desc'     => __( 'Spoiler mit verstecktem Inhalt', 'upfront-shortcodes' ),
		'note'     => __( 'Wusstest Du, dass Du mehrere Spoiler mit dem Shortcode [Akkordeon] umschließen kannst, um einen Akkordeoneffekt zu erzielen?', 'upfront-shortcodes' ),
		'example'  => 'spoilers',
		'icon'     => 'list-ul',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/spoiler.svg',
	)
);

function su_shortcode_spoiler( $atts = null, $content = null ) {
	$atts           = shortcode_atts(
		array(
			'title'         => __( 'Spoiler Titel', 'upfront-shortcodes' ),
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
