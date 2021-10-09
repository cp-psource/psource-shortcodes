<?php

su_add_shortcode(
	array(
		'deprecated' => true,
		'id'         => 'slider',
		'callback'   => 'su_shortcode_slider',
		'image'      => su_get_plugin_url() . 'admin/images/shortcodes/slider.svg',
		// translators: Dep. – Deprecated
		'name'       => __( 'Slider (Dep.)', 'upfront-shortcodes' ),
		'type'       => 'single',
		'group'      => 'gallery',
		'note'       => sprintf(
			'<p>%s</p><p><button class="button button-primary" onclick="document.querySelector(\'[data-shortcode=image_carousel]\').click(); return false;">%s &rarr;</button></p>',
			__( 'Es gibt einen viel besseren Shortcode für Deine Bilder. Hast Du das Bilderkarussell schon ausprobiert? Es kann sowohl Slider als auch Karussells erstellen.', 'upfront-shortcodes' ),
			__( 'Zum Bildkarussell wechseln', 'upfront-shortcodes' )
		),
		'atts'       => array(
			'source'     => array(
				'type'    => 'image_source',
				'default' => 'none',
				'name'    => __( 'Quelle', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle die Bildquelle. Du kannst Bilder aus der Medienbibliothek verwenden oder sie aus Beiträgen (Thumbnails) abrufen, die unter einer bestimmten Blog-Kategorie veröffentlicht wurden. Du kannst auch eine beliebige benutzerdefinierte Taxonomie auswählen', 'upfront-shortcodes' ),
			),
			'limit'      => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximale Anzahl von Bildquellenbeiträgen (für aktuelle Beiträge, Kategorie und benutzerdefinierte Taxonomie)', 'upfront-shortcodes' ),
			),
			'link'       => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'Keine', 'upfront-shortcodes' ),
					'image'      => __( 'Bild in voller Größe', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Slidelink (im Medieneditor hinzugefügt)', 'upfront-shortcodes' ),
					'attachment' => __( 'Anhangsseite', 'upfront-shortcodes' ),
					'post'       => __( 'Post Permalink', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Links', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle aus, welche Links für Bilder in dieser Galerie verwendet werden', 'upfront-shortcodes' ),
			),
			'target'     => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Im selben Tab öffnen', 'upfront-shortcodes' ),
					'blank' => __( 'In neuem Tab öffnen', 'upfront-shortcodes' ),
				),
				'default' => 'self',
				'name'    => __( 'Linkziel', 'upfront-shortcodes' ),
				'desc'    => __( 'Links öffnen in', 'upfront-shortcodes' ),
			),
			'width'      => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 600,
				'name'    => __( 'Breite', 'upfront-shortcodes' ),
				'desc'    => __( 'Sliderbreite (in Pixel)', 'upfront-shortcodes' ),
			),
			'height'     => array(
				'type'    => 'slider',
				'min'     => 200,
				'max'     => 1600,
				'step'    => 20,
				'default' => 300,
				'name'    => __( 'Höhe', 'upfront-shortcodes' ),
				'desc'    => __( 'Sliderbreite (in Pixel)', 'upfront-shortcodes' ),
			),
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Responsiv', 'upfront-shortcodes' ),
				'desc'    => __( 'Ignoriere Breiten- und Höhenparameter und mache den Slider responsiv', 'upfront-shortcodes' ),
			),
			'title'      => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Titel anzeigen', 'upfront-shortcodes' ),
				'desc'    => __( 'Folientitel anzeigen', 'upfront-shortcodes' ),
			),
			'centered'   => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Zentriert', 'upfront-shortcodes' ),
				'desc'    => __( 'Ist der Slider auf der Seite zentriert', 'upfront-shortcodes' ),
			),
			'arrows'     => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Pfeile', 'upfront-shortcodes' ),
				'desc'    => __( 'Links- und Rechtspfeil anzeigen', 'upfront-shortcodes' ),
			),
			'pages'      => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Paginierung', 'upfront-shortcodes' ),
				'desc'    => __( 'Seitennummerierung anzeigen', 'upfront-shortcodes' ),
			),
			'mousewheel' => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Mausradsteuerung', 'upfront-shortcodes' ),
				'desc'    => __( 'Erlaube Folien mit dem Mausrad zu wechseln', 'upfront-shortcodes' ),
			),
			'autoplay'   => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 100000,
				'step'    => 100,
				'default' => 5000,
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Wähle das Intervall zwischen den Folienanimationen. Auf 0 setzen, um die automatische Wiedergabe zu deaktivieren', 'upfront-shortcodes' ),
			),
			'speed'      => array(
				'type'    => 'number',
				'min'     => 0,
				'max'     => 20000,
				'step'    => 100,
				'default' => 600,
				'name'    => __( 'Geschwindigkeit', 'upfront-shortcodes' ),
				'desc'    => __( 'Animationsgeschwindigkeit angeben', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Zusätzliche CSS-Klasse', 'upfront-shortcodes' ),
				'desc'    => __( 'Zusätzliche CSS-Klassennamen, durch Leerzeichen getrennt', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'       => __( 'Anpassbarer Bildslider', 'upfront-shortcodes' ),
		'icon'       => 'picture-o',
	)
);

function su_shortcode_slider( $atts = null, $content = null ) {
	$return = '';
	$atts   = shortcode_atts(
		array(
			'source'     => 'none',
			'limit'      => 20,
			'gallery'    => null, // Dep. 4.3.2
			'link'       => 'none',
			'target'     => 'self',
			'width'      => 600,
			'height'     => 300,
			'responsive' => 'yes',
			'title'      => 'yes',
			'centered'   => 'yes',
			'arrows'     => 'yes',
			'pages'      => 'yes',
			'mousewheel' => 'yes',
			'autoplay'   => 3000,
			'speed'      => 600,
			'class'      => '',
		),
		$atts,
		'slider'
	);

	$slides = su_get_slides( $atts );
	$slides = apply_filters( 'su/shortcode/slider/slides', $slides, $atts );

	$atts['width']  = intval( $atts['width'] );
	$atts['height'] = intval( $atts['height'] );

	// Loop slides
	if ( count( $slides ) ) {
		// Prepare unique ID
		$id = uniqid( 'su_slider_' );
		// Links target
		$target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : '';
		// Centered class
		$centered = ( $atts['centered'] === 'yes' ) ? ' su-slider-centered' : '';
		// Wheel control
		$mousewheel = ( $atts['mousewheel'] === 'yes' ) ? 'true' : 'false';
		// Prepare width and height
		$size = ( $atts['responsive'] === 'yes' ) ? 'width:100%' : 'width:' . $atts['width'] . 'px;height:' . $atts['height'] . 'px';
		// Add lightbox class
		if ( $atts['link'] === 'lightbox' ) {
			$atts['class'] .= ' su-lightbox-gallery';
		}
		// Open slider
		$return .= '<div id="' . $id . '" class="su-slider' . $centered . ' su-slider-pages-' . esc_attr( $atts['pages'] ) . ' su-slider-responsive-' . esc_attr( $atts['responsive'] ) . su_get_css_class( $atts ) . '" style="' . $size . '" data-autoplay="' . esc_attr( $atts['autoplay'] ) . '" data-speed="' . esc_attr( $atts['speed'] ) . '" data-mousewheel="' . $mousewheel . '"><div class="su-slider-slides">';
		// Create slides
		foreach ( $slides as $slide ) {
			// Crop the image
			$image = su_image_resize( $slide['image'], $atts['width'], $atts['height'] );

			if ( is_wp_error( $image ) ) {
				continue;
			}

			// Prepare slide title
			$title = ( $atts['title'] === 'yes' && $slide['title'] ) ? '<span class="su-slider-slide-title">' . stripslashes( $slide['title'] ) . '</span>' : '';
			// Open slide
			$return .= '<div class="su-slider-slide">';
			// Slide content with link
			if ( $slide['link'] ) {
				$return .= '<a href="' . esc_attr( $slide['link'] ) . '" ' . $target . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
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
		$return .= '<div class="su-slider-nav">';
		// Append direction nav
		if ( $atts['arrows'] === 'yes' ) {
			$return .= '<div class="su-slider-direction"><span class="su-slider-prev"></span><span class="su-slider-next"></span></div>';
		}
		// Append pagination nav
		$return .= '<div class="su-slider-pagination"></div>';
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
		$return = su_error_message( 'Slider', __( 'Bilder nicht gefunden', 'upfront-shortcodes' ) );
	}
	return $return;
}
