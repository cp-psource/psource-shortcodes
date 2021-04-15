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
					'light'     => __( 'Basic: Light', 'upfront-shortcodes' ),
					'dark'      => __( 'Basic: Dark', 'upfront-shortcodes' ),
					'yellow'    => __( 'Basic: Yellow', 'upfront-shortcodes' ),
					'green'     => __( 'Basic: Green', 'upfront-shortcodes' ),
					'red'       => __( 'Basic: Red', 'upfront-shortcodes' ),
					'blue'      => __( 'Basic: Blue', 'upfront-shortcodes' ),
					'youtube'   => __( 'Youtube', 'upfront-shortcodes' ),
					'tipsy'     => __( 'Tipsy', 'upfront-shortcodes' ),
					'bootstrap' => __( 'Bootstrap', 'upfront-shortcodes' ),
					'jtools'    => __( 'jTools', 'upfront-shortcodes' ),
					'tipped'    => __( 'Tipped', 'upfront-shortcodes' ),
					'cluetip'   => __( 'Cluetip', 'upfront-shortcodes' ),
				),
				'default' => 'yellow',
				'name'    => __( 'Style', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip window style', 'upfront-shortcodes' ),
			),
			'position' => array(
				'type'    => 'select',
				'values'  => array(
					'north' => __( 'Top', 'upfront-shortcodes' ),
					'south' => __( 'Bottom', 'upfront-shortcodes' ),
					'west'  => __( 'Left', 'upfront-shortcodes' ),
					'east'  => __( 'Right', 'upfront-shortcodes' ),
				),
				'default' => 'top',
				'name'    => __( 'Position', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip position', 'upfront-shortcodes' ),
			),
			'shadow'   => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Shadow', 'upfront-shortcodes' ),
				'desc'    => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'upfront-shortcodes' ),
			),
			'rounded'  => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Rounded corners', 'upfront-shortcodes' ),
				'desc'    => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'upfront-shortcodes' ),
			),
			'size'     => array(
				'type'    => 'select',
				'values'  => array(
					'default' => __( 'Default', 'upfront-shortcodes' ),
					'1'       => 1,
					'2'       => 2,
					'3'       => 3,
					'4'       => 4,
					'5'       => 5,
					'6'       => 6,
				),
				'default' => 'default',
				'name'    => __( 'Font size', 'upfront-shortcodes' ),
				'desc'    => __( 'Tooltip font size', 'upfront-shortcodes' ),
			),
			'title'    => array(
				'default' => '',
				'name'    => __( 'Tooltip title', 'upfront-shortcodes' ),
				'desc'    => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'upfront-shortcodes' ),
			),
			'content'  => array(
				'default' => __( 'Tooltip text', 'upfront-shortcodes' ),
				'name'    => __( 'Tooltip content', 'upfront-shortcodes' ),
				'desc'    => __( 'Enter tooltip content here', 'upfront-shortcodes' ),
			),
			'behavior' => array(
				'type'    => 'select',
				'values'  => array(
					'hover'  => __( 'Show and hide on mouse hover', 'upfront-shortcodes' ),
					'click'  => __( 'Show and hide by mouse click', 'upfront-shortcodes' ),
					'always' => __( 'Always visible', 'upfront-shortcodes' ),
				),
				'default' => 'hover',
				'name'    => __( 'Behavior', 'upfront-shortcodes' ),
				'desc'    => __( 'Select tooltip behavior', 'upfront-shortcodes' ),
			),
			'close'    => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Close button', 'upfront-shortcodes' ),
				'desc'    => __( 'Show close button', 'upfront-shortcodes' ),
			),
			'class'    => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( 'Hover me to open tooltip', 'upfront-shortcodes' ),
		'desc'     => __( 'Tooltip window with custom content', 'upfront-shortcodes' ),
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
			'content'  => __( 'Tooltip text', 'upfront-shortcodes' ),
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
