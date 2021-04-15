<?php

su_add_shortcode( array(
		'deprecated' => true,
		'id' => 'carousel',
		'callback' => 'su_shortcode_carousel',
		'image' => su_get_plugin_url() . 'admin/images/shortcodes/carousel.svg',
		// translators: Dep. – Deprecated
		'name' => __( 'Carousel (Dep.)', 'upfront-shortcodes' ),
		'type' => 'single',
		'group' => 'gallery',
		'note'  => sprintf(
			'<p>%s</p><p><button class="button button-primary" onclick="document.querySelector(\'[data-shortcode=image_carousel]\').click(); return false;">%s &rarr;</button></p>',
			__( 'There is a much better shortcode for your images. Have you already tried the Image Carousel? It can create both sliders and carousels.', 'upfront-shortcodes' ),
			__( 'Switch to Image Carousel', 'upfront-shortcodes' )
		),
		'atts' => array(
			'source' => array(
				'type'    => 'image_source',
				'default' => 'none',
				'name'    => __( 'Source', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'upfront-shortcodes' )
			),
			'limit' => array(
				'type' => 'slider',
				'min' => -1,
				'max' => 100,
				'step' => 1,
				'default' => 20,
				'name' => __( 'Limit', 'upfront-shortcodes' ),
				'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'upfront-shortcodes' )
			),
			'link' => array(
				'type' => 'select',
				'values' => array(
					'none'       => __( 'None', 'upfront-shortcodes' ),
					'image'      => __( 'Full-size image', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Slide link (added in media editor)', 'upfront-shortcodes' ),
					'attachment' => __( 'Attachment page', 'upfront-shortcodes' ),
					'post'       => __( 'Post permalink', 'upfront-shortcodes' )
				),
				'default' => 'none',
				'name' => __( 'Links', 'upfront-shortcodes' ),
				'desc' => __( 'Select which links will be used for images in this gallery', 'upfront-shortcodes' )
			),
			'target' => array(
				'type' => 'select',
				'values' => array(
					'self' => __( 'Open in same tab', 'upfront-shortcodes' ),
					'blank' => __( 'Open in new tab', 'upfront-shortcodes' )
				),
				'default' => 'self',
				'name' => __( 'Links target', 'upfront-shortcodes' ),
				'desc' => __( 'Open links in', 'upfront-shortcodes' )
			),
			'width' => array(
				'type' => 'slider',
				'min' => 100,
				'max' => 1600,
				'step' => 20,
				'default' => 600,
				'name' => __( 'Width', 'upfront-shortcodes' ),
				'desc' => __( 'Carousel width (in pixels)', 'upfront-shortcodes' )
			),
			'height' => array(
				'type' => 'slider',
				'min' => 20,
				'max' => 1600,
				'step' => 20,
				'default' => 100,
				'name' => __( 'Height', 'upfront-shortcodes' ),
				'desc' => __( 'Carousel height (in pixels)', 'upfront-shortcodes' )
			),
			'responsive' => array(
				'type' => 'bool',
				'default' => 'yes',
				'name' => __( 'Responsive', 'upfront-shortcodes' ),
				'desc' => __( 'Ignore width and height parameters and make carousel responsive', 'upfront-shortcodes' )
			),
			'items' => array(
				'type' => 'number',
				'min' => 1,
				'max' => 20,
				'step' => 1,
				'default' => 3,
				'name' => __( 'Items to show', 'upfront-shortcodes' ),
				'desc' => __( 'How much carousel items is visible', 'upfront-shortcodes' )
			),
			'scroll' => array(
				'type' => 'number',
				'min' => 1,
				'max' => 20,
				'step' => 1, 'default' => 1,
				'name' => __( 'Scroll number', 'upfront-shortcodes' ),
				'desc' => __( 'How much items are scrolled in one transition', 'upfront-shortcodes' )
			),
			'title' => array(
				'type' => 'bool',
				'default' => 'yes',
				'name' => __( 'Show titles', 'upfront-shortcodes' ), 'desc' => __( 'Display titles for each item', 'upfront-shortcodes' )
			),
			'centered' => array(
				'type' => 'bool',
				'default' => 'yes',
				'name' => __( 'Center', 'upfront-shortcodes' ), 'desc' => __( 'Is carousel centered on the page', 'upfront-shortcodes' )
			),
			'arrows' => array(
				'type' => 'bool',
				'default' => 'yes',
				'name' => __( 'Arrows', 'upfront-shortcodes' ), 'desc' => __( 'Show left and right arrows', 'upfront-shortcodes' )
			),
			'pages' => array(
				'type' => 'bool',
				'default' => 'no',
				'name' => __( 'Pagination', 'upfront-shortcodes' ),
				'desc' => __( 'Show pagination', 'upfront-shortcodes' )
			),
			'mousewheel' => array(
				'type' => 'bool',
				'default' => 'yes', 'name' => __( 'Mouse wheel control', 'upfront-shortcodes' ),
				'desc' => __( 'Allow to rotate carousel with mouse wheel', 'upfront-shortcodes' )
			),
			'autoplay' => array(
				'type' => 'number',
				'min' => 0,
				'max' => 100000,
				'step' => 100,
				'default' => 5000,
				'name' => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc' => __( 'Choose interval between auto animations. Set to 0 to disable autoplay', 'upfront-shortcodes' )
			),
			'speed' => array(
				'type' => 'number',
				'min' => 0,
				'max' => 20000,
				'step' => 100,
				'default' => 600,
				'name' => __( 'Speed', 'upfront-shortcodes' ), 'desc' => __( 'Specify animation speed', 'upfront-shortcodes' )
			),
			'class' => array(
				'type' => 'extra_css_class',
				'name' => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc' => __( 'Customizable image carousel', 'upfront-shortcodes' ),
		'icon' => 'picture-o',
	) );

function su_shortcode_carousel( $atts = null, $content = null ) {
	$return = '';
	$atts = shortcode_atts( array(
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
			'class'      => ''
		), $atts, 'carousel' );

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
		if ( $atts['link'] === 'lightbox' ) $atts['class'] .= ' su-lightbox-gallery';
		// Open slider
		$return .= '<div id="' . $id . '" class="su-carousel' . $centered . ' su-carousel-pages-' . $atts['pages'] . ' su-carousel-responsive-' . $atts['responsive'] . su_get_css_class( $atts ) . '" style="' . $size . '" data-autoplay="' . $atts['autoplay'] . '" data-speed="' . $atts['speed'] . '" data-mousewheel="' . $mousewheel . '" data-items="' . $atts['items'] . '" data-scroll="' . $atts['scroll'] . '"><div class="su-carousel-slides">';
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
			if ( $slide['link'] ) $return .= '<a href="' . $slide['link'] . '"' . $target . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
			// Slide content without link
			else $return .= '<a><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" />' . $title . '</a>';
			// Close slide
			$return .= '</div>';
		}
		// Close slides
		$return .= '</div>';
		// Open nav section
		$return .= '<div class="su-carousel-nav">';
		// Append direction nav
		if ( $atts['arrows'] === 'yes'
		) $return .= '<div class="su-carousel-direction"><span class="su-carousel-prev"></span><span class="su-carousel-next"></span></div>';
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
	else $return = su_error_message( 'Carousel', __( 'images not found', 'upfront-shortcodes' ) );
	return $return;
}
