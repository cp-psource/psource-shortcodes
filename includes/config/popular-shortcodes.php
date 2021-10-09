<?php defined( 'ABSPATH' ) || exit;

return apply_filters(
	'su/config/popular_shortcodes',
	array(
		array(
			'id'          => 'posts',
			'title'       => __( 'Beiträge', 'upfront-shortcodes' ),
			'description' => __( 'Erstelle Deine eigene Beiträge-Abfrage und zeige sie an, wo Du möchtest', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/posts.svg',
		),
		array(
			'id'          => 'accordion',
			'title'       => __( 'Akkordion &amp; Spoiler', 'upfront-shortcodes' ),
			'description' => __( 'Erstelle einen einzelnen Schalter oder ein Akkordeon mit mehreren Elementen', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/accordion.svg',
		),
		array(
			'id'          => 'button',
			'title'       => __( 'Button', 'upfront-shortcodes' ),
			'description' => __( 'Schöner Knopf mit mehreren Stilen und vielen Optionen', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/button.svg',
		),
		array(
			'id'          => 'lightbox',
			'title'       => __( 'Lightbox', 'upfront-shortcodes' ),
			'description' => __( 'Eine Lightbox, die Bilder und benutzerdefiniertes HTML anzeigen kann', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/lightbox.svg',
		),
		array(
			'id'          => 'columns',
			'title'       => __( 'Spalten', 'upfront-shortcodes' ),
			'description' => __( 'Zwei Shortcodes zum Erstellen flexibler mehrspaltiger Layouts', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/row.svg',
		),
		array(
			'id'          => 'image_carousel',
			'title'       => __( 'Bildkarussell', 'upfront-shortcodes' ),
			'description' => __( 'Ein leistungsstarker Shortcode zum Erstellen von Schiebereglern und Karussells', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/image_carousel.svg',
		),
		array(
			'id'          => 'box',
			'title'       => __( 'Box', 'upfront-shortcodes' ),
			'description' => __( 'Einfacher, aber stilvoller bunter Block mit Bildunterschrift und Inhalt', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/box.svg',
		),
		array(
			'id'          => 'tabs',
			'title'       => __( 'Registerkarte', 'upfront-shortcodes' ),
			'description' => __( 'Zwei Shortcodes zum Aufteilen Deiner Inhalte in Registerkarte', 'upfront-shortcodes' ),
			'icon'        => 'admin/images/shortcodes/tabs.svg',
		),
	)
);
