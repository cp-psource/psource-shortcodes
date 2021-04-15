<?php

su_add_shortcode(
	array(
		'id'       => 'table',
		'callback' => 'su_shortcode_table',
		'type'     => 'wrap',
		'name'     => __( 'Table', 'upfront-shortcodes' ),
		'desc'     => __( 'Styled table', 'upfront-shortcodes' ),
		'group'    => 'content',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/table.svg',
		'icon'     => 'table',
		'atts'     => array(
			'responsive' => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Responsive', 'upfront-shortcodes' ),
				'desc'    => __( 'Add horizontal scrollbar if table width larger than page width', 'upfront-shortcodes' ),
			),
			'alternate'  => array(
				'type'    => 'bool',
				'default' => 'yes',
				'name'    => __( 'Alternate row color', 'upfront-shortcodes' ),
				'desc'    => __( 'Enable to use alternative background color for even rows', 'upfront-shortcodes' ),
			),
			'fixed'      => array(
				'type'    => 'bool',
				'default' => 'no',
				'name'    => __( 'Fixed layout', 'upfront-shortcodes' ),
				'desc'    => __( 'Fixed width table cells', 'upfront-shortcodes' ),
			),
			'class'      => array(
				'type'    => 'extra_css_class',
				'name'    => __( 'Extra CSS class', 'upfront-shortcodes' ),
				'desc'    => __( 'Additional CSS class name(s) separated by space(s)', 'upfront-shortcodes' ),
				'default' => '',
			),
		),
		'content'  => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'upfront-shortcodes' ),
	)
);

function su_shortcode_table( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'url'        => '', // deprecated since 5.3.0
			'responsive' => 'no',
			'alternate'  => 'yes',
			'fixed'      => 'no',
			'class'      => '',
		),
		$atts,
		'table'
	);

	foreach ( array( 'responsive', 'alternate', 'fixed' ) as $feature ) {

		if ( 'yes' === $atts[ $feature ] ) {
			$atts['class'] .= ' su-table-' . $feature;
		}

	}

	su_query_asset( 'css', 'su-shortcodes' );

	$table = $atts['url']
		? su_parse_csv( $atts['url'] )
		: do_shortcode( $content );

	return '<div class="su-table' . su_get_css_class( $atts ) . '">' . $table . '</div>';

}
