<?php

su_add_shortcode(
	array(
		'id'       => 'scheduler',
		'callback' => 'su_shortcode_scheduler',
		'image'    => su_get_plugin_url() . 'admin/images/shortcodes/scheduler.svg',
		'name'     => __( 'Planer', 'upfront-shortcodes' ),
		'type'     => 'wrap',
		'group'    => 'other',
		'atts'     => array(
			'time'       => array(
				'default' => '',
				'name'    => __( 'Zeit', 'upfront-shortcodes' ),
				'desc'    => sprintf( __( 'In diesem Feld kannst Du einen oder mehrere Zeitbereiche angeben. Jeden Tag zu dieser Zeit wird der Inhalt des Shortcodes sichtbar sein. %1$s %2$s %3$s - Inhalt von 9:00 bis 18:00 anzeigen %4$s - Inhalt von 9:00 bis 13:00 und von 14:00 bis 18:00 anzeigen %5$s - Beispiel mit Minuten (Inhalt wird jeden Tag sichtbar sein, 45 Minuten) %6$s - Beispiel mit Sekunden', 'upfront-shortcodes' ), '<br><br>', __( 'Beispiele (zum Einstellen klicken)', 'upfront-shortcodes' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' ),
			),
			'days_week'  => array(
				'default' => '',
				'name'    => __( 'Tage der Woche', 'upfront-shortcodes' ),
				'desc'    => sprintf( __( 'In diesem Feld kannst Du einen oder mehrere Wochentage angeben. An diesen Tagen wird jede Woche der Inhalt des Shortcodes sichtbar sein. %1$s 0 - Sonntag %2$s 1 - Montag %3$s 2 - Dienstag %4$s 3 - Mittwoch %5$s 4 - Donnerstag %6$s 5 - Freitag %7$s 6 - Samstag %8$s %9$s %10$s - Inhalt anzeigen von Montag bis Freitag %11$s - Inhalt nur am Sonntag anzeigen %12$s - Inhalt anzeigen am Sonntag und von Mittwoch bis Freitag', 'upfront-shortcodes' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Beispiele (zum Einstellen klicken)', 'upfront-shortcodes' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' ),
			),
			'days_month' => array(
				'default' => '',
				'name'    => __( 'Tage des Monats', 'upfront-shortcodes' ),
				'desc'    => sprintf( __( 'In diesem Feld kannst Du einen oder mehrere Tage des Monats angeben. An diesen Tagen wird jeden Monat der Inhalt des Shortcodes sichtbar sein. %1$s %2$s %3$s - Inhalt nur am ersten Tag des Monats anzeigen %4$s - Inhalt vom 1. bis 5. anzeigen %5$s - Inhalt vom 10. bis 15. und vom 20. bis 25. anzeigen', 'upfront-shortcodes' ), '<br><br>', __( 'Beispiele (zum Einstellen klicken)', 'upfront-shortcodes' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' ),
			),
			'months'     => array(
				'default' => '',
				'name'    => __( 'Monate', 'upfront-shortcodes' ),
				'desc'    => sprintf( __( 'In diesem Feld kannst Du den Monat oder die Monate angeben, in denen der Inhalt sichtbar sein soll. %1$s %2$s %3$s - Inhalte nur im Januar anzeigen %4$s - Inhalte von Februar bis Juni anzeigen %5$s - Inhalte im Januar, März und von Mai bis Juli anzeigen', 'upfront-shortcodes' ), '<br><br>', __( 'Beispiele (zum Einstellen klicken)', 'upfront-shortcodes' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' ),
			),
			'years'      => array(
				'default' => '',
				'name'    => __( 'Jahre', 'upfront-shortcodes' ),
				'desc'    => sprintf( __( 'In diesem Feld kannst Du das Jahr oder die Jahre angeben, in denen der Inhalt sichtbar sein soll. %1$s %2$s %3$s - Inhalte nur 2014 anzeigen %4$s - Inhalte von 2014 bis 2016 anzeigen %5$s - Inhalte von 2014, 2018 und von 2020 bis 2022 anzeigen', 'upfront-shortcodes' ), '<br><br>', __( 'Beispiele (zum Einstellen klicken)', 'upfront-shortcodes' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' ),
			),
			'alt'        => array(
				'default' => '',
				'name'    => __( 'Alternativer Text', 'upfront-shortcodes' ),
				'desc'    => __( 'In dieses Feld kannst Du den Text eingeben, der angezeigt wird, wenn der Inhalt gerade nicht sichtbar ist', 'upfront-shortcodes' ),
			),
		),
		'content'  => __( 'Geplanter Inhalt', 'upfront-shortcodes' ),
		'desc'     => __( 'Ermöglicht das Anzeigen des Inhalts nur im angegebenen Zeitraum', 'upfront-shortcodes' ),
		'note'     => __( 'Mit diesem Shortcode kannst Du Inhalte nur zur angegebenen Zeit anzeigen.', 'upfront-shortcodes' ) . '<br><br>' . __( 'Bitte achte besonders auf die Beschreibungen, die sich unter jedem Textfeld befinden. Es wird dir viel Zeit sparen', 'upfront-shortcodes' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'upfront-shortcodes' ),
		'icon'     => 'clock-o',
	)
);

function su_shortcode_scheduler( $atts = null, $content = null ) {

	$atts = shortcode_atts(
		array(
			'time'       => 'all',
			'days_week'  => 'all',
			'days_month' => 'all',
			'months'     => 'all',
			'years'      => 'all',
			'alt'        => '',
		),
		$atts,
		'scheduler'
	);

	$timestamp = current_time( 'timestamp', 0 );
	$now       = array(
		'time'      => $timestamp,
		'day_week'  => (int) date( 'w', $timestamp ),
		'day_month' => (int) date( 'j', $timestamp ),
		'month'     => (int) date( 'n', $timestamp ),
		'year'      => (int) date( 'Y', $timestamp ),
	);

	if ( 'all' !== $atts['years'] ) {

		$atts['years'] = preg_replace( '/[^0-9-,]/', '', $atts['years'] );

		if ( ! in_array( $now['year'], su_parse_range( $atts['years'] ), true ) ) {
			return su_do_attribute( $atts['alt'] );
		}

	}

	if ( 'all' !== $atts['months'] ) {

		$atts['months'] = preg_replace( '/[^0-9-,]/', '', $atts['months'] );

		if ( ! in_array( $now['month'], su_parse_range( $atts['months'] ), true ) ) {
			return su_do_attribute( $atts['alt'] );
		}

	}

	if ( 'all' !== $atts['days_month'] ) {

		$atts['days_month'] = preg_replace( '/[^0-9-,]/', '', $atts['days_month'] );

		if ( ! in_array( $now['day_month'], su_parse_range( $atts['days_month'] ), true ) ) {
			return su_do_attribute( $atts['alt'] );
		}

	}

	if ( 'all' !== $atts['days_week'] ) {

		$atts['days_week'] = preg_replace( '/[^0-9-,]/', '', $atts['days_week'] );

		if ( ! in_array( $now['day_week'], su_parse_range( $atts['days_week'] ), true ) ) {
			return su_do_attribute( $atts['alt'] );
		}

	}

	if ( 'all' !== $atts['time'] ) {

		$valid_time   = false;
		$atts['time'] = preg_replace( '/[^0-9-,:]/', '', $atts['time'] );

		foreach ( explode( ',', $atts['time'] ) as $range ) {

			$range = explode( '-', $range );

			if ( ! isset( $range[1] ) ) {
				$range[1] = $range[0] . ':59:59';
			}

			if ( strpos( $range[0], ':' ) === false ) {
				$range[0] .= ':00:00';
			}
			if ( strpos( $range[1], ':' ) === false ) {
				$range[1] .= ':00:00';
			}

			if (
				$now['time'] >= strtotime( $range[0], $now['time'] ) &&
				$now['time'] <= strtotime( $range[1], $now['time'] )
			) {
				$valid_time = true;
				break;
			}

		}

		if ( ! $valid_time ) {
			return su_do_attribute( $atts['alt'] );
		}

	}

	return do_shortcode( $content );

}
