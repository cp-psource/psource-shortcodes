<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/data/addons',
	array(
		array(
			'id'          => 'bundle',
			'slug'        => 'add-ons-bundle',
			'title'       => __( 'UpFront Framework', 'upfront-shortcodes' ),
			'description' => __( 'Mit UpFront kannst Du ganz einfach die schönsten WordPress-Webseiten erstellen, die aus einer völlig leeren Leinwand erstellt wurden.', 'upfront-shortcodes' ),
			'permalink'   => 'https://n3rds.work/piestingtal_source/upfront/',
			'is_bundle'   => true,
		),
		array(
			'id'          => 'extra',
			'slug'        => 'additional-shortcodes',
			'title'       => __( 'UpFront Child Theme', 'upfront-shortcodes' ),
			'description' => __( 'Child Theme für das UpFront Framework', 'upfront-shortcodes' ),
			'permalink'   => 'https://github.com/piestingtal-source/upfront-child/releases/tag/1.0.5',
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
