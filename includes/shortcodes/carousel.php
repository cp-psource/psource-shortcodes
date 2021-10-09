<?php

su_add_shortcode(
	array(
		'deprecated' => true,
		'id'         => 'carousel',
		'callback'   => 'su_shortcode_carousel',
		'image'      => su_get_plugin_url() . 'admin/images/shortcodes/carousel.svg',
		// translators: Dep. – Deprecated
		'name'       => __( 'Karussell (Dep.)', 'upfront-shortcodes' ),
		'type'       => 'single',
		'group'      => 'gallery',
		'note'       => sprintf(
			'<p>%s</p><p><button class="button button-primary" onclick="document.querySelector(\'[data-shortcode=image_carousel]\').click(); return false;">%s &rarr;</button></p>',
			__( 'Es gibt einen viel besseren Shortcode für Deine Bilder. Hast Du das Bildkarussell bereits ausprobiert? Es können sowohl Slider als auch Karusselle erstellt werden.', 'upfront-shortcodes' ),
			__( 'Wechsel zu Bildkarussell', 'upfront-shortcodes' )
		),
		'atts'       => array(
			'source'     => array(
				'type'    => 'image_source',
				'default' => 'none',
				'name'    => __( 'Quelle', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Bildquelle. Du kannst Bilder aus der Medienbibliothek verwenden oder sie aus Posts (Miniaturansichten) abrufen, die unter der angegebenen Blog-Kategorie veröffentlicht wurden. Du kannst auch eine beliebige benutzerdefinierte Taxonomie auswählen', 'upfront-shortcodes' )
			),
			'limit'      => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc' => __( 'Maximale Anzahl von Bildquellenbeiträgen (für aktuelle Beiträge, Kategorie und benutzerdefinierte Taxonomie)', 'upfront-shortcodes' )
			),
			'link'       => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'Keins', 'upfront-shortcodes' ),
					'image'      => __( 'Bild in voller Größe', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Dia-Link (im Medieneditor hinzugefügt)', 'upfront-shortcodes' ),
					'attachment' => __( 'Anhang Seite', 'upfront-shortcodes' ),
					'post'       => __( 'Beitrag Permalink', 'upfront-shortcodes' )
				),
				'default' => 'none',
				'name' => __( 'Links', 'upfront-shortcodes' ),
				'desc' => __( 'Wähle aus, welche Links für Bilder in dieser Galerie verwendet werden sollen', 'upfront-shortcodes' )
			),
			'target'     => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'In selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'self',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Öffne Links in', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 100,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name' => __( 'Breite', 'upfront-shortcodes' ),
				'desc' => __( 'Karussellbreite (in Pixel)', 'upfront-shortcodes' )
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 20,
				'max'     => 1600,
				'step'    => 20,
				'default' => 100,
				'name' => __( 'Höhe', 'upfront-shortcodes' ),
				'desc' => __( 'Karussellhöhe (in Pixel)', 'upfront-shortcodes' )
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name' => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc' => __( 'Ignoriere die Parameter für Breite und Höhe und sorge dafür, dass das Karussell reagiert', 'upfront-shortcodes' )
			),
			'items'      => array(
				'type'    => 'number',
				'min'     => 1,
				'max'     => 20,
				'step'    => 1,
				'default' => 3,
				'name' => __( 'Elemente zu zeigen', 'upfront-shortcodes' ),
				'desc' => __( 'Wie viele Karussellelemente sind sichtbar?', 'upfront-shortcodes' )
			),
			'scroll'     => array(
				'type'    => 'number',
				'min'     => 1,
				'max'     => 20,
				'step'    => 1,
				'default' => 1,
				'name' => __( 'Bildlaufnummer', 'upfront-shortcodes' ),
				'desc' => __( 'Wie viele Elemente werden in einem Übergang gescrollt?', 'upfront-shortcodes' )
			),
			'title'      => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name' => __( 'Titel anzeigen', 'upfront-shortcodes' ), 
				'desc' => __( 'Titel für jedes Element anzeigen', 'upfront-shortcodes' )
			),
			'centered'   => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name' => __( 'Zentriert', 'upfront-shortcodes' ), 
				'desc' => __( 'Ist das Karussell auf der Seite zentriert', 'upfront-shortcodes' )
			),
			'arrows'     => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name' => __( 'Pfeile', 'upfront-shortcodes' ), 
				'desc' => __( 'Linke und rechte Pfeile anzeigen', 'upfront-shortcodes' )
			),
			'pages'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name' => __( 'Paginierung', 'upfront-shortcodes' ),
				'desc' => __( 'Paginierung anzeigen', 'upfront-shortcodes' )
			),
			'mousewheel' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Mausradsteuerung', 'upfront-shortcodes' ),
				'desc'    => __( 'Karussell mit dem Mausrad drehen lassen', 'upfront-shortcodes' ),
			),
			'autoplay'   => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 100000,
				'step'    => 100,
				'default' => 5000,
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle das Intervall zwischen den automatischen Animationen. Auf 0 setzen, um die automatische Wiedergabe zu deaktivieren', 'upfront-shortcodes' ),
			),
			'speed'      => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 20000,
				'step'    => 100,
				'default' => 600,
				'name' => __( 'Geschwindigkeit', 'upfront-shortcodes' ), 
				'desc' => __( 'Gib die Animationsgeschwindigkeit an', 'upfront-shortcodes' )
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name' => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc' => __( 'Zusätzliche CSS-Klassennamen, die durch Leerzeichen getrennt sind', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'       => __( 'Anpassbares Bildkarussell', 'upfront-shortcodes' ),
		'icon'       => 'picture-o',
	)
);

function su_shortcode_carousel( $atts = null, $content = null ) {
	$return = '';
	$atts   = shortcode_atts(
		array(
			'source'     => 'none',
			'limit'      => 20,
			'gallery'    => null, // Dep. 4.3.2
			'link'       => 'none',
			'target'     => 'self',
			'width'      => 600,
			'height'     => 100,
			'responsive' => 'yes',
			'items'      => 3,
			'scroll'     => 1,
			'title'      => 'yes',
			'centered'   => 'yes',
			'arrows'     => 'yes',
			'pages'      => 'no',
			'mousewheel' => 'yes',
			'autoplay'   => 3000,
			'speed'      => 600,
			'class'      => '',
		),
		$atts,
		'carousel'
	);

	$slides = su_get_slides( $atts );
	$slides = apply_filters( 'su/shortcode/carousel/slides', $slides, $atts );

	// Loop slides
	if ( count( $slides ) ) {
		// Prepare unique ID
		$id = uniqid( 'su_carousel_' );
		// Links target
		$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
		// Centered class
		$centered = ( $atts['centered'] === 'yes' ) ? ' su-carousel-centered' : '';
		// Wheel control
		$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
		// Prepare width and height
		$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . intval( $atts['width'] ) . 'px;height:' . intval( $atts['height'] ) . 'px';
		// Add lightbox class
		if ( $atts['link'] === 'lightbox' ) {
			$atts['class'] .= ' su-lightbox-gallery';
		}
		// Open slider
		$return .= '<div id="' . $id . '" class="su-carousel' . $centered . ' su-carousel-pages-' . esc_attr( $atts['pages'] ) . ' su-carousel-responsive-' . esc_attr( $atts['responsive'] ) . su_get_css_class( $atts ) . '" style="' . $size . '" data-autoplay="' . esc_attr( $atts['autoplay'] ) . '" data-speed="' . esc_attr( $atts['speed'] ) . '" data-mousewheel="' . $mousewheel . '" data-items="' . esc_attr( $atts['items'] ) . '" data-scroll="' . esc_attr( $atts['scroll'] ) . '"><div class="su-carousel-slides">';
		// Create slides
		foreach ( (array) $slides as $slide ) {
			// Crop the image
			$image = su_image_resize( $slide['image'], ( round( $atts['width'] / $atts['items'] ) - 18 ), $atts['height'] );

			if ( is_wp_error( $image ) ) {
				continue;
			}

			// Prepare slide title
			$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="su-carousel-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
			// Open slide
			$return .= '<div class="su-carousel-slide">';
			// Slide content with link
			if ( $slide['link'] ) {
				$return .= '<a href="' . $slide['link'] . '"' . $target . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
			}
			// Slide content without link
			else {
				$return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
			}
			// Close slide
			$return .= '</div>';
		}
		// Close slides
		$return .= '</div>';
		// Open nav section
		$return .= '<div class="su-carousel-nav">';
		// Append direction nav
		if ( $atts['arrows'] === 'yes'
		) {
			$return .= '<div class="su-carousel-direction"><span class="su-carousel-prev"></span><span class="su-carousel-next"></span></div>';
		}
		// Append pagination nav
		$return .= '<div class="su-carousel-pagination"></div>';
		// Close nav section
		$return .= '</div>';
		// Close slider
		$return .= '</div>';
		// Add lightbox assets
		if ( $atts['link'] === 'lightbox' ) {
			su_query_asset( 'css', 'magnific-popup' );
			su_query_asset( 'js', 'magnific-popup' );
		}
		su_query_asset( 'css', 'su-shortcodes' );
		su_query_asset( 'js', 'jquery' );
		su_query_asset( 'js', 'swiper' );
		su_query_asset( 'js', 'su-shortcodes' );
	}
	// Slides not found
	else {
		$return = su_error_message( 'Carousel', __( 'Bilder nicht gefunden', 'upfront-shortcodes' ) );
	}
	return $return;
}
