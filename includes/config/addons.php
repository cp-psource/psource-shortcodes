<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/data/addons',
	array(
		array(
			'id'          => 'psecommerce',
			'slug'        => 'psecommerce',
			'title'       => __( 'PSeCommerce', 'upfront-shortcodes' ),
			'description' => __( 'Leichtgewichtiges und vielseitiges eCommerce', 'upfront-shortcodes' ),
			'permalink'   => 'https://n3rds.work/piestingtal_source/psecommerce-shopsystem/',
		),
		array(
			'id'          => 'custom-post',
			'slug'        => 'custom-post',
			'title'       => __( 'CustomPress', 'upfront-shortcodes' ),
			'description' => __( 'Erstelle benutzerdefinierte Post-Types, Taxonomien und Felder', 'upfront-shortcodes' ),
			'permalink'   => 'https://n3rds.work/piestingtal_source/psource-custompress-plugin/',
		),
		array(
			'id'          => 'seitenleisten',
			'slug'        => 'power-seitenleisten',
			'title'       => __( 'Power-Seitenleisten', 'upfront-shortcodes' ),
			'description' => __( 'Volle Kontrolle über Deine Seitenleisten', 'upfront-shortcodes' ),
			'permalink'   => 'https://n3rds.work/piestingtal_source/ps-power-seitenleisten/',
		),
		array(
			'id'          => 'mehr',
			'slug'        => 'mehr-plugins',
			'title'       => __( 'Piestingtal-Source', 'upfront-shortcodes' ),
			'description' => __( 'Mehr Open-Source aus dem Piestingtal', 'upfront-shortcodes' ),
			'permalink'   => 'https://n3rds.work/shop/',
		),
	)
);
