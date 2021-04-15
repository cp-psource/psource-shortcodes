<?php

su_add_shortcode(
	array(
		'id'       => 'image_carousel',
		'callback' => 'su_shortcode_image_carousel',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/image_carousel.svg',
		'name'     => __( 'Image carousel', 'upfront-shortcodes' ),
		'desc'     => __( 'Customizable image gallery (slider and carousel)', 'upfront-shortcodes' ),
		'type'     => 'single',
		'group'    => 'gallery',
		'icon'     => 'picture-o',
		'atts'     => array(
			'source'         => array(
				'type'          => 'image_source',
				'default'       => 'none',
				'media_sources' => array(
					'media'         => __( 'Media library', 'upfront-shortcodes' ),
					'media: recent' => __( 'Recent media', 'upfront-shortcodes' ),
					'posts: recent' => __( 'Recent posts', 'upfront-shortcodes' ),
					'taxonomy'      => __( 'Taxonomy', 'upfront-shortcodes' ),
				),
				'name'          => __( 'Images source', 'upfront-shortcodes' ),
				'desc'          => __( 'This option defines which images will be shown in the gallery. Images can be selected manually from media library or fetched automatically from post featured images, or even filtered by a taxonomy.', 'upfront-shortcodes' ),
			),
			'limit'          => array(
				'type'    => 'slider',
				'min'     => -1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
				'name'    => __( 'Limit', 'upfront-shortcodes' ),
				'desc'    => __( 'Maximum number of posts to search featured images in (for recent media, recent posts, and taxonomy)', 'upfront-shortcodes' ),
			),
			'slides_style'   => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'minimal' => __( 'Minimal', 'upfront-shortcodes' ),
					'photo'   => __( 'Photo', 'upfront-shortcodes' ),
				),
				'default' => 'default',
				'name'    => __( 'Slides style', 'upfront-shortcodes' ),
				'desc'    => __( 'This option control carousel slides appearance.', 'upfront-shortcodes' ),
			),
			'controls_style' => array(
				'type'    => 'select',
				'values'  => array(
					'dark'  => __( 'Dark', 'upfront-shortcodes' ),
					'light' => __( 'Light', 'upfront-shortcodes' ),
				),
				'default' => 'dark',
				'name'    => __( 'Controls style', 'upfront-shortcodes' ),
				'desc'    => __( 'This option control carousel controls appearance.', 'upfront-shortcodes' ),
			),
			'crop'           => array(
				'type'    => 'select',
				'values'  => array( 'none' => __( 'Do not crop images', 'upfront-shortcodes' ) ) + su_get_config( 'crop-ratios' ),
				'default' => '4:3',
				'name'    => __( 'Crop images', 'upfront-shortcodes' ),
				'desc'    => __( 'This option allows to enable/disable image cropping and crop aspect ratio.', 'upfront-shortcodes' ),
			),
			'columns'        => array(
				'type'    => 'slider',
				'min'     => 1,
				'max'     => 8,
				'step'    => 1,
				'default' => 1,
				'name'    => __( 'Columns', 'upfront-shortcodes' ),
				'desc'    => __( 'This option control the number of columns used in the carousel.', 'upfront-shortcodes' ),
			),
			'adaptive'       => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Adaptive', 'upfront-shortcodes' ),
				'desc'    => __( 'Set this option to Yes to ignore the columns parameter and display a single column on mobile devices.', 'upfront-shortcodes' ),
			),
			'spacing'        => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Spacing', 'upfront-shortcodes' ),
				'desc'    => __( 'Adds spacing between carousel columns.', 'upfront-shortcodes' ),
			),
			'align'          => array(
				'type'    => 'select',
				'values'  => array(
					'none'   => __( 'None', 'upfront-shortcodes' ),
					'left'   => __( 'Left', 'upfront-shortcodes' ),
					'right'  => __( 'Right', 'upfront-shortcodes' ),
					'center' => __( 'Center', 'upfront-shortcodes' ),
					'full'   => __( 'Full', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Alignment', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls how the gallery will be aligned within a page. Left, Right, and Center options require Max Width to be set. Full option requires page template with no sidebar.', 'upfront-shortcodes' ),
			),
			'max_width'      => array(
				'default' => 'none',
				'name'    => __( 'Max width', 'upfront-shortcodes' ),
				'desc'    => sprintf(
					'%1$s<br>%2$s: %4$s.<br>%3$s: %5$s.',
					__( 'Sets maximum width of the carousel container. CSS uints are allowed.', 'upfront-shortcodes' ),
					__( 'Example values', 'upfront-shortcodes' ),
					__( 'Default value', 'upfront-shortcodes' ),
					'<b%value>500</b>, <b%value>500px</b>, <b%value>50%</b>, <b%value>40rem</b>',
					'<b%value>none</b>'
				),
			),
			'captions'       => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Captions', 'upfront-shortcodes' ),
				'desc'    => __( 'Set this option to Yes to display image captions.', 'upfront-shortcodes' ),
			),
			'arrows'         => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Arrows (left / right)', 'upfront-shortcodes' ),
				'desc'    => __( 'This option enables left/right arrow navigation.', 'upfront-shortcodes' ),
			),
			'dots'           => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Dots (pagination)', 'upfront-shortcodes' ),
				'desc'    => __( 'This option enables dots/pages navigation.', 'upfront-shortcodes' ),
			),
			'link'           => array(
				'type'    => 'select',
				'values'  => array(
					'none'       => __( 'None', 'upfront-shortcodes' ),
					'image'      => __( 'Full-size image', 'upfront-shortcodes' ),
					'lightbox'   => __( 'Lightbox', 'upfront-shortcodes' ),
					'custom'     => __( 'Custom link (added in media editor)', 'upfront-shortcodes' ),
					'attachment' => __( 'Attachment page', 'upfront-shortcodes' ),
					'post'       => __( 'Post permalink', 'upfront-shortcodes' ),
				),
				'default' => 'none',
				'name'    => __( 'Link to', 'upfront-shortcodes' ),
				'desc'    => __( 'This option adds links to carousel slides.', 'upfront-shortcodes' ),
			),
			'target'         => array(
				'type'    => 'select',
				'values'  => array(
					'self'  => __( 'Open in same tab', 'upfront-shortcodes' ),
					'blank' => __( 'Open in new tab', 'upfront-shortcodes' ),
				),
				'default' => 'blank',
				'name'    => __( 'Links target', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls how slide links will be opened.', 'upfront-shortcodes' ),
			),
			'autoplay'       => array(
				'type'    => 'slider',
				'min'     => 0,
				'max'     => 15,
				'step'    => 1,
				'default' => 5,
				'name'    => __( 'Autoplay', 'upfront-shortcodes' ),
				'desc'    => __( 'Sets the time interval between automatic slide transitions, in seconds. Set to 0 to disable autoplay.', 'upfront-shortcodes' ),
			),
			'speed'          => array(
				'type'    => 'select',
				'values'  => array(
					'immediate' => __( 'Immediate', 'upfront-shortcodes' ),
					'fast'      => __( 'Fast', 'upfront-shortcodes' ),
					'medium'    => __( 'Medium', 'upfront-shortcodes' ),
					'slow'      => __( 'Slow', 'upfront-shortcodes' ),
				),
				'default' => 'medium',
				'name'    => __( 'Transition speed', 'upfront-shortcodes' ),
				'desc'    => __( 'This option control slides transition speed.', 'upfront-shortcodes' ),
			),
			'image_size'     => array(
				'type'    => 'select',
				'values'  => su_get_image_sizes(),
				'default' => 'large',
				'name'    => __( 'Images size (quality)', 'upfront-shortcodes' ),
				'desc'    => __( 'This option controls the size of carousel slide images. This option only affects image quality, not the actual slide size.', 'upfront-shortcodes' ),
			),
			'outline'        => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Outline on focus', 'upfront-shortcodes' ),
				'desc'    => __( 'This option enables outline when carousel gets focus. The outline improves keyboard navigation.', 'upfront-shortcodes' ),
			),
			'random'         => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Random order', 'upfront-shortcodes' ),
				'desc'    => __( 'This option enables random order for selected images', 'upfront-shortcodes' ),
			),
			'class'          => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
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
			__( 'images not found', 'upfront-shortcodes' )
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
