<?php

su_add_shortcode(
	array(
		'id'       => 'image_carousel',
		'callback' => 'su_shortcode_image_carousel',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/image_carousel.svg',
		'name'     => __( 'Bildkarussell', 'upfront-shortcodes' ),
		'desc'     => __( 'Anpassbare Bildergalerie (Slider und Karussell)', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'gallery',
		'icon'     => 'picture-o',
		'atts'     => array(
			'source'         => array(
				'type'          => 'image_source',
				'default'       => 'none',
				'media_sources' => array(
					'media'         => __( 'Medienbibliothek', 'upfront-shortcodes' ),
					'media: recent' => __( 'Aktuelle Medien', 'upfront-shortcodes' ),
					'posts: recent' => __( 'Kürzliche Posts', 'upfront-shortcodes' ),
					'taxonomy'      => __( 'Taxonomie', 'upfront-shortcodes' ),
				),
				'name'          => __( 'Bildquelle', 'upfront-shortcodes' ),
				'desc'          => __( 'Diese Option legt fest, welche Bilder in der Galerie angezeigt werden. Bilder können manuell aus der Mediathek ausgewählt oder automatisch aus Post-Featured-Bildern abgerufen oder sogar nach einer Taxonomie gefiltert werden.', 'upfront-shortcodes' ),
			),
			'limit'          => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximale Anzahl von Beiträgen, in denen vorgestellte Bilder durchsucht werden können (für aktuelle Medien, aktuelle Beiträge und Taxonomie)', 'upfront-shortcodes' ),
			),
			'slides_style'   => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Standard', 'upfront-shortcodes' ),
					'minimal' => __( 'Minimal', 'upfront-shortcodes' ),
					'photo'   => __( 'Foto', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Folienstil', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert das Aussehen der Karussellfolien.', 'upfront-shortcodes' ),
			),
			'controls_style' => array(
				'type'    => 'select',
				'values'  => array(
					'dark'  => __( 'Dunkel', 'upfront-shortcodes' ),
					'light' => __( 'Hell', 'upfront-shortcodes' ),
				),
				'default' => 'dark',
				'name'    => __( 'Steuerungsstil', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert das Erscheinungsbild der Karusellsteuerung.', 'upfront-shortcodes' ),
			),
			'crop'           => array(
				'type'    => 'select',
				'values'  => array( 'none' => __( 'Bilder nicht zuschneiden', 'upfront-shortcodes' ) ) + su_get_config( 'crop-ratios' ),
				'default' => '4:3',
				'name'    => __( 'Bilder zuschneiden', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option ermöglicht das Aktivieren/Deaktivieren des Bildzuschneidens und des Seitenverhältnisses.', 'upfront-shortcodes' ),
			),
			'columns'        => array(
				'type'    => 'slider',
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'default' => 1,
				'name'    => __( 'Spalten', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert die Anzahl der im Karussell verwendeten Spalten.', 'upfront-shortcodes' ),
			),
			'adaptive'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Adaptiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Setze diese Option auf Ja, um den Spaltenparameter zu ignorieren und eine einzelne Spalte auf Mobilgeräten anzuzeigen.', 'upfront-shortcodes' ),
			),
			'spacing'        => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Abstand', 'upfront-shortcodes' ),
				'desc'    => __( 'Fügt Abstand zwischen Karussellspalten hinzu.', 'upfront-shortcodes' ),
			),
			'align'          => array(
				'type'    => 'select',
				'values'  => array(
					'none'   => __( 'Keinen', 'upfront-shortcodes' ),
					'left'   => __( 'Links', 'upfront-shortcodes' ),
					'right'  => __( 'Rechts', 'upfront-shortcodes' ),
					'center' => __( 'Zentriert', 'upfront-shortcodes' ),
					'full'   => __( 'Voll', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Ausrichtung', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert, wie die Galerie innerhalb einer Seite ausgerichtet wird. Für die Optionen Links, Rechts und Mitte muss die maximale Breite eingestellt sein. Volle Option erfordert Seitenvorlage ohne Seitenleiste.', 'upfront-shortcodes' ),
			),
			'max_width'      => array(
				'default' => 'none',
				'name'    => __( 'Max Breite', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s<br>%2$s: %4$s.<br>%3$s: %5$s.',
					__( 'Legt die maximale Breite des Karussell-Containers fest. CSS-Einheiten sind erlaubt.', 'upfront-shortcodes' ),
					__( 'Beispielwerte', 'upfront-shortcodes' ),
					__( 'Standardwert', 'upfront-shortcodes' ),
					'<b%value>500</b>, <b%value>500px</b>, <b%value>50%</b>, <b%value>40rem</b>',
					'<b%value>none</b>'
				),
			),
			'captions'       => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Bildunterschriften', 'upfront-shortcodes' ),
				'desc'    => __( 'Setze diese Option auf Ja, um Bildunterschriften anzuzeigen.', 'upfront-shortcodes' ),
			),
			'arrows'         => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Pfeile (links/rechts)', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option aktiviert die Links-/Rechts-Pfeilnavigation.', 'upfront-shortcodes' ),
			),
			'dots'           => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Punkte (Paginierung)', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option aktiviert die Punkt-/Seitennavigation.', 'upfront-shortcodes' ),
			),
			'link'           => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'Keine', 'upfront-shortcodes' ),
					'image'      => __( 'Vollbild', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Benutzerdefinierter Link (im Medieneditor hinzugefügt)', 'upfront-shortcodes' ),
					'attachment' => __( 'Anhangsseite', 'upfront-shortcodes' ),
					'post'       => __( 'Post-Permalink', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Link zu', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option fügt Links zu Karussellfolien hinzu.', 'upfront-shortcodes' ),
			),
			'target'         => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert, wie Folienlinks geöffnet werden.', 'upfront-shortcodes' ),
			),
			'autoplay'       => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 15,
				'step'    => 1,
				'default' => 5,
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Legt das Zeitintervall zwischen automatischen Folienübergängen in Sekunden fest. Auf 0 setzen, um die automatische Wiedergabe zu deaktivieren.', 'upfront-shortcodes' ),
			),
			'speed'          => array(
				'type'    => 'select',
				'values'  => array(
					'immediate' => __( 'Sofort', 'upfront-shortcodes' ),
					'fast'      => __( 'Schnell', 'upfront-shortcodes' ),
					'medium'    => __( 'Mittel', 'upfront-shortcodes' ),
					'slow'      => __( 'Langsam', 'upfront-shortcodes' ),
				),
				'default' => 'medium',
				'name'    => __( 'Übergangsgeschwindigkeit', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert die Übergangsgeschwindigkeit der Folien.', 'upfront-shortcodes' ),
			),
			'image_size'     => array(
				'type'    => 'select',
				'values'  => su_get_image_sizes(),
				'default' => 'large',
				'name'    => __( 'Bildgröße (Qualität)', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option steuert die Größe von Karussell-Folienbildern. Diese Option wirkt sich nur auf die Bildqualität aus, nicht auf die tatsächliche Diagröße.', 'upfront-shortcodes' ),
			),
			'outline'        => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Umriss im Fokus', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option aktiviert den Umriss, wenn das Karussell den Fokus erhält. Die Gliederung verbessert die Tastaturnavigation.', 'upfront-shortcodes' ),
			),
			'random'         => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Zufällige Reihenfolge', 'upfront-shortcodes' ),
				'desc'    => __( 'Diese Option aktiviert die zufällige Reihenfolge ausgewählter Bilder', 'upfront-shortcodes' ),
			),
			'class'          => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
	)
);

function su_shortcode_image_carousel( $atts = null, $content = null ) {

	$atts = su_parse_shortcode_atts(
		'image_carousel',
		$atts,
		array( 'prefer_caption' => 'no' )
	);

	$atts['columns']        = intval( $atts['columns'] );
	$atts['autoplay']       = floatval( str_replace( ',', '.', $atts['autoplay'] ) );
	$atts['crop']           = sanitize_key( str_replace( ':', '-', $atts['crop'] ) );
	$atts['slides_style']   = sanitize_key( $atts['slides_style'] );
	$atts['controls_style'] = sanitize_key( $atts['controls_style'] );
	$atts['image_size']     = sanitize_key( $atts['image_size'] );
	$atts['align']          = sanitize_key( $atts['align'] );
	$atts['speed']          = sanitize_key( $atts['speed'] );
	$atts['limit']          = intval( $atts['limit'] );

	$items            = array();
	$styles           = array();
	$slides           = su_get_gallery_slides( $atts );
	$link_target_attr = 'blank' === $atts['target']
		? ' target="_blank" rel="noopener noreferrer"'
		: '';
	$transitions      = array(
		'immediate' => array( 1, 1 ),
		'fast'      => array( 0.15, 1 ),
		'medium'    => array( 0.025, 0.28 ),
		'slow'      => array( 0.007, 0.25 ),
	);

	if ( ! $slides ) {

		return su_error_message(
			'Image Carousel',
			__( 'Bilder nicht gefunden', 'upfront-shortcodes' )
		);

	}

	foreach ( $slides as $slide ) {

		$content = wp_get_attachment_image(
			$slide['attachment_id'],
			$atts['image_size'],
			false,
			array( 'class' => '' )
		);

		if ( 'yes' === $atts['captions'] ) {

			$content = sprintf(
				'%s<span>%s</span>',
				$content,
				$slide['caption']
			);

		}

		if ( 'none' !== $atts['link'] ) {

			$content = sprintf(
				'<a href="%s"%s data-caption="%s">%s</a>',
				esc_attr( esc_url_raw( $slide['link'] ) ),
				$link_target_attr,
				esc_attr( $slide['caption'] ),
				$content
			);

		}

		$items[] = sprintf(
			'<div class="su-image-carousel-item">' .
			'<div class="su-image-carousel-item-content">%s</div>' .
			'</div>',
			$content
		);

	}

	if ( $atts['columns'] > 1 ) {
		$atts['class'] .= ' su-image-carousel-columns-' . $atts['columns'];
	}

	if ( 'yes' === $atts['spacing'] ) {
		$atts['class'] .= ' su-image-carousel-has-spacing';
	}

	if ( 'none' !== $atts['crop'] ) {
		$atts['class'] .= ' su-image-carousel-crop su-image-carousel-crop-' . $atts['crop'];
	}

	if ( 'lightbox' === $atts['link'] ) {
		$atts['class'] .= ' su-image-carousel-has-lightbox';
	}

	if ( 'yes' === $atts['outline'] ) {
		$atts['class'] .= ' su-image-carousel-has-outline';
	}

	if ( 'yes' === $atts['adaptive'] ) {
		$atts['class'] .= ' su-image-carousel-adaptive';
	}

	if ( is_numeric( $atts['max_width'] ) ) {
		$atts['max_width'] = $atts['max_width'] . 'px';
	}

	if ( 'none' !== $atts['max_width'] ) {
		$styles[] = 'max-width:' . $atts['max_width'];
	}

	$atts['class'] .= ' su-image-carousel-slides-style-' . $atts['slides_style'];

	$atts['class'] .= ' su-image-carousel-controls-style-' . $atts['controls_style'];

	$atts['class'] .= ' su-image-carousel-align-' . $atts['align'];

	$flickity = array(
		'groupCells'      => true,
		'cellSelector'    => '.su-image-carousel-item',
		'adaptiveHeight'  => 'none' === $atts['crop'],
		'cellAlign'       => 'left',
		'prevNextButtons' => 'yes' === $atts['arrows'],
		'pageDots'        => 'yes' === $atts['dots'],
		'autoPlay'        => $atts['autoplay'] > 0 ? $atts['autoplay'] * 1000 : false,
		'imagesLoaded'    => true,
		// Disable 'contain' if slides have variable height
		// @see: https://github.com/metafizzy/flickity/issues/554
		'contain'         => 'none' !== $atts['crop'],
	);

	if ( isset( $transitions[ $atts['speed'] ] ) ) {
		$flickity['selectedAttraction'] = $transitions[ $atts['speed'] ][0];
		$flickity['friction']           = $transitions[ $atts['speed'] ][1];
	}

	$uniqid = uniqid( 'su_image_carousel_' );

	$flickity = apply_filters(
		'su/shortcode/image_carousel/flickity',
		$flickity,
		$atts
	);

	if ( 'lightbox' === $atts['link'] ) {
		su_query_asset( 'js', 'magnific-popup' );
		su_query_asset( 'css', 'magnific-popup' );
	}

	su_query_asset( 'js', 'flickity' );
	su_query_asset( 'js', 'su-shortcodes' );
	su_query_asset( 'css', 'flickity' );
	su_query_asset( 'css', 'su-shortcodes' );

	$script = sprintf(
		'<script id="%1$s_script">if(window.SUImageCarousel){setTimeout(function() {window.SUImageCarousel.initGallery(document.getElementById("%1$s"))}, 0);}var %1$s_script=document.getElementById("%1$s_script");if(%1$s_script){%s_script.parentNode.removeChild(%1$s_script);}</script>',
		esc_js( $uniqid )
	);

	return sprintf(
		'<div class="su-image-carousel %1$s" style="%2$s" data-flickity-options=\'%3$s\' id="%4$s">%5$s</div>%6$s',
		esc_attr( su_get_css_class( $atts ) ),
		esc_attr( implode( ';', $styles ) ),
		wp_json_encode( $flickity ),
		esc_attr( $uniqid ),
		implode( $items ),
		$script
	);

}
