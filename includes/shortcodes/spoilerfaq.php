<?php

su_add_shortcode(
	array(
		'id'       => 'spoilerfaq',
		'callback' => 'su_shortcode_spoilerfaq',
		'name'     => __( 'Spoiler-FAQ', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'box',
		'atts'     => array(
			'title'  => array(
				'default' => __( 'Spoiler-FAQ Titel', 'upfront-shortcodes' ),
				'name'    => __( 'Titel', 'upfront-shortcodes' ),
				'desc'    => __( 'Text im Spoiler-FAQ-Titel', 'upfront-shortcodes' ),
			),
			'open'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Offen', 'upfront-shortcodes' ),
				'desc'    => __( 'Ist Spoilerinhalt standardmäßig sichtbar', 'upfront-shortcodes' ),
			),
			'style'  => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'fancy'   => __( 'Fancy', 'upfront-shortcodes' ),
					'simple'  => __( 'Simpel', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Stil', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle Stil für diesen Spoiler', 'upfront-shortcodes' ) . '%su_skins_link%',
			),
			'icon'   => array(
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
			'anchor' => array(
				'default' => '',
				'name'    => __( 'Anker', 'upfront-shortcodes' ),
				'desc'    => __( 'Du kannst einen eindeutigen Anker für diesen Spoiler verwenden, um mit einem Hash in der Seiten-URL darauf zuzugreifen. Beispiel: Gib hier <b%value>Hallo</b> ein und verwende dann eine URL wie http://example.com/page-url#Hallo. Dieser Spoiler wird geöffnet und hineingescrollt', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, getrennt durch Leerzeichen', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Versteckter Inhalt', 'upfront-shortcodes' ),
		'desc'     => __( 'Spoiler mit verstecktem Inhalt', 'upfront-shortcodes' ),
		'note'     => __( 'Wusstest Du, dass Du mehrere Spoiler mit dem Shortcode [accordion] umschließen kannst, um einen Akkordeoneffekt zu erzeugen?', 'upfront-shortcodes' ),
		'example'  => 'spoilers',
		'icon'     => 'list-ul',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/spoiler.svg',
	)
);

function su_shortcode_spoilerfaq( $atts = null, $content = null ) {
	$atts           = shortcode_atts(
		array(
			'title'  => __( 'Spoiler-FAQ Titel', 'upfront-shortcodes' ),
			'open'   => 'no',
			'style'  => 'default',
			'icon'   => 'plus',
			'anchor' => '',
			'class'  => '',
		),
		$atts,
		'spoilerfaq'
	);
	$atts['style']  = str_replace( array( '1', '2' ), array( 'default', 'fancy' ), $atts['style'] );
	$atts['anchor'] = ( $atts['anchor'] ) ? ' data-anchor="' . str_replace( array( ' ', '#' ), '', sanitize_text_field( $atts['anchor'] ) ) . '"' : '';
	if ( 'yes' !== $atts['open'] ) {
		$atts['class'] .= ' su-spoiler-closed';
	}
	su_query_asset( 'css', 'su-icons' );
	su_query_asset( 'css', 'su-shortcodes' );
	su_query_asset( 'js', 'jquery' );
	su_query_asset( 'js', 'su-other-shortcodes' );
	do_action( 'su/shortcode/spoilerfaq', $atts );
	return '<div itemprop="mainEntity" itemscope="" itemtype="http://schema.org/Question" class="su-spoiler su-spoiler-style-' . $atts['style'] . ' su-spoiler-icon-' . $atts['icon'] . su_get_css_class( $atts ) . '"' . $atts['anchor'] . '><h3 itemprop="name" class="su-spoiler-title" tabindex="0" role="button"><span class="su-spoiler-icon"></span>' . su_do_attribute( $atts['title'] ) . '</h3><div class="su-spoiler-content su-clearfix" itemprop="acceptedAnswer" itemscope="" itemtype="http://schema.org/Answer"><p itemprop="text">' . su_do_nested_shortcodes( $content, 'spoiler' ) . '</p></div></div>';
	}