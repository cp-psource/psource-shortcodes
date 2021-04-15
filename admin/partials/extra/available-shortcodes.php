<?php defined( 'ABSPATH' ) || exit; ?>

<div class="su-admin-shortcodes-extra">
	<p class="su-admin-shortcodes-extra-message"><?php esc_html_e( 'Dieser Shortcode ist mit dem Add-On Extra Shortcodes verfügbar', 'upfront-shortcodes' ); ?></p>
	<img src="<?php echo esc_attr( $this->get_image_url( 'icon-banner.png' ) ); ?>" class="su-admin-shortcodes-extra-icon">
	<h2 class="su-admin-shortcodes-extra-title"><?php esc_html_e( 'Extra Shortcodes', 'upfront-shortcodes' ); ?></h2>
	<p class="su-admin-shortcodes-extra-description"><?php esc_html_e( 'Dieses Add-On erweitert UpFront Shortcodes um 15 neue Shortcodes. Parallax-Abschnitte, Schieberegler für reaktionsschnelle Inhalte, Preistabellen und mehr', 'upfront-shortcodes' ); ?></p>
	<p class="su-admin-shortcodes-extra-action">
		<a href="<?php echo esc_attr( su_get_utm_link( 'https://nerds.work/add-ons/extra-shortcodes/', array( 'available-shortcodes', 'extra-shortcode', 'wp-dashboard' ) ) ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Details & Preise', 'upfront-shortcodes' ); ?> &rarr;</a>
	</p>
	<div class="su-admin-shortcodes-extra-screenshot">
		<img src="<?php echo esc_attr( $this->get_image_url( 'screenshots/' . $data['id'] . '.png' ) ); ?>">
	</div>
</div>
