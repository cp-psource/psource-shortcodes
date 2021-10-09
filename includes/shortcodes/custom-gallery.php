<?php

su_add_shortcode(
	array(
		'id'       => 'custom_gallery',
		'callback' => 'su_shortcode_custom_gallery',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/custom_gallery.svg',
		'name'     => __( 'Galerie', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'gallery',
		'atts'     => array(
			'source' => array(
				'type'    => 'image_source',
				'default' => 'none',
				'name'    => __( 'Quelle', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Bildquelle. Du kannst Bilder aus der Medienbibliothek verwenden oder sie aus Beiträgen (Thumbnails) abrufen, die unter einer bestimmten Blog-Kategorie veröffentlicht wurden. Du kannst auch eine beliebige benutzerdefinierte Taxonomie auswählen', 'upfront-shortcodes' ),
			),
			'limit'  => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximale Anzahl von Bildquellenbeiträgen (für aktuelle Beiträge, Kategorie und benutzerdefinierte Taxonomie)', 'upfront-shortcodes' ),
			),
			'link'   => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'Nichts', 'upfront-shortcodes' ),
					'image'      => __( 'Bild in voller Größe', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Slide-Link (im Medieneditor hinzugefügt)', 'upfront-shortcodes' ),
					'attachment' => __( 'Anhangsseite', 'upfront-shortcodes' ),
					'post'       => __( 'Permalink posten', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Links', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle aus, welche Links für Bilder in dieser Galerie verwendet werden', 'upfront-shortcodes' ),
			),
			'target' => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'self',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Links öffnen in', 'upfront-shortcodes' ),
			),
			'width'  => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 90,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Breite eines einzelnen Elements (in Pixel)', 'upfront-shortcodes' ),
			),
			'height' => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 90,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Höhe eines einzelnen Elements (in Pixel)', 'upfront-shortcodes' ),
			),
			'title'  => array(
				'type'    => 'select',
				'values'  => array(
					'never'  => __( 'Niemals', 'upfront-shortcodes' ),
					'hover'  => __( 'Bei Mouseover', 'upfront-shortcodes' ),
					'always' => __( 'Immer', 'upfront-shortcodes' ),
				),
				'default' => 'hover',
				'name'    => __( 'Titel anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Titelanzeigemodus', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Anpassbare Bildergalerie', 'upfront-shortcodes' ),
		'icon'     => 'picture-o',
	)
);

function su_shortcode_custom_gallery( $atts = null, $content = null ) {
	$return = '';
	$atts   = shortcode_atts(
		array(
			'source'  => 'none',
			'limit'   => 20,
			'gallery' => null, // Dep. 4.4.0
			'link'    => 'none',
			'width'   => 90,
			'height'  => 90,
			'title'   => 'hover',
			'target'  => 'self',
			'class'   => '',
		),
		$atts,
		'custom_gallery'
	);

	$slides = su_get_slides( $atts );
	$slides = apply_filters( 'su/shortcode/custom_gallery/slides', $slides, $atts );

	$atts['width']  = intval( $atts['width'] );
	$atts['height'] = intval( $atts['height'] );

	// Loop slides
	if ( count( $slides ) ) {
		// Prepare links target
		$atts['target'] = ( 'yes' === $atts['target'] || 'blank' === $atts['target'] ) ? ' target="_blank"' : '';
		// Add lightbox class
		if ( 'lightbox' === $atts['link'] ) {
			$atts['class'] .= ' su-lightbox-gallery';
		}
		// Open gallery
		$return = '<div class="su-custom-gallery su-custom-gallery-title-' . $atts['title'] . su_get_css_class( $atts ) . '">';
		// Create slides
		foreach ( $slides as $slide ) {
			// Crop image
			$image = su_image_resize( $slide['image'], $atts['width'], $atts['height'] );

			if ( is_wp_error( $image ) ) {
				continue;
			}

			// Prepare slide title
			$title = ( $slide['title'] ) ? '<span class="su-custom-gallery-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
			// Open slide
			$return .= '<div class="su-custom-gallery-slide">';
			// Slide content with link
			if ( $slide['link'] ) {
				$return .= '<a href="' . esc_attr( $slide['link'] ) . '"' . $atts['target'] . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
			}
			// Slide content without link
			else {
				$return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
			}
			// Close slide
			$return .= '</div>';
		}
		// Clear floats
		$return .= '<div class="su-clear"></div>';
		// Close gallery
		$return .= '</div>';
		// Add lightbox assets
		if ( 'lightbox' === $atts['link'] ) {
			su_query_asset( 'css', 'magnific-popup' );
			su_query_asset( 'js', 'jquery' );
			su_query_asset( 'js', 'magnific-popup' );
			su_query_asset( 'js', 'su-shortcodes' );
		}
		su_query_asset( 'css', 'su-shortcodes' );
	}
	// Slides not found
	else {
		$return = su_error_message( 'Custom Gallery', __( 'Bilder nicht gefunden', 'upfront-shortcodes' ) );
	}
	return $return;
}
