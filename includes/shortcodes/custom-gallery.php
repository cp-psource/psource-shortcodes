<?php

su_add_shortcode(
	array(
		'id'       => 'custom_gallery',
		'callback' => 'su_shortcode_custom_gallery',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/custom_gallery.svg',
		'name'     => __( 'Gallery', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'gallery',
		'atts'     => array(
			'source' => array(
				'type'    => 'image_source',
				'default' => 'none',
				'name'    => __( 'Source', 'upfront-shortcodes' ),
				'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'upfront-shortcodes' ),
			),
			'limit'  => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'upfront-shortcodes' ),
			),
			'link'   => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'None', 'upfront-shortcodes' ),
					'image'      => __( 'Full-size image', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Slide link (added in media editor)', 'upfront-shortcodes' ),
					'attachment' => __( 'Attachment page', 'upfront-shortcodes' ),
					'post'       => __( 'Post permalink', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Links', 'upfront-shortcodes' ),
				'desc'    => __( 'Select which links will be used for images in this gallery', 'upfront-shortcodes' ),
			),
			'target' => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Open in same tab', 'upfront-shortcodes' ),
					'blank' => __( 'Open in new tab', 'upfront-shortcodes' ),
				),
				'default' => 'self',
				'name'    => __( 'Links target', 'upfront-shortcodes' ),
				'desc'    => __( 'Open links in', 'upfront-shortcodes' ),
			),
			'width'  => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 90,
				'name'    => __( 'Width', 'upfront-shortcodes' ),
				'desc'    => __( 'Single item width (in pixels)', 'upfront-shortcodes' ),
			),
			'height' => array(
				'type'    => 'slider',
				'min'     => 10,
				'max'     => 1600,
				'step'    => 10,
				'default' => 90,
				'name'    => __( 'Height', 'upfront-shortcodes' ),
				'desc'    => __( 'Single item height (in pixels)', 'upfront-shortcodes' ),
			),
			'title'  => array(
				'type'    => 'select',
				'values'  => array(
					'never'  => __( 'Never', 'upfront-shortcodes' ),
					'hover'  => __( 'On mouse over', 'upfront-shortcodes' ),
					'always' => __( 'Always', 'upfront-shortcodes' ),
				),
				'default' => 'hover',
				'name'    => __( 'Show titles', 'upfront-shortcodes' ),
				'desc'    => __( 'Title display mode', 'upfront-shortcodes' ),
			),
			'class'  => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'desc'     => __( 'Customizable image gallery', 'upfront-shortcodes' ),
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
				$return .= '<a href="' . $slide['link'] . '"' . $atts['target'] . ' title="' . esc_attr( $slide['title'] ) . '"><img src="' . $image['url'] . '" alt="' . esc_attr( $slide['title'] ) . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" />' . $title . '</a>';
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
		$return = su_error_message( 'Custom Gallery', __( 'images not found', 'upfront-shortcodes' ) );
	}
	return $return;
}
