<div id="su-generator-breadcrumbs">
	<a href="javascript:;" class="su-generator-home" title="<?php esc_html_e( 'Click to return to the shortcodes list', 'upfront-shortcodes' ); ?>"><?php esc_html_e( 'All shortcodes', 'upfront-shortcodes' ); ?></a>
	&rarr;
	<span><?php echo esc_html( $data['name'] ); ?></span>
	<small class="alignright"><?php echo esc_html( $data['desc'] ); ?></small>
	<div class="su-generator-clear"></div>
</div>

<div class="su-generator-extra-banner">
	<div class="su-generator-extra-banner-message">
		<?php esc_html_e( 'This shortcode is available with the Extra Shortcodes add-on', 'upfront-shortcodes' ); ?>
	</div>
	<img src="<?php echo esc_attr( $this->get_image_url( 'icon-banner.png' ) ); ?>" class="su-generator-extra-banner-icon">
	<h3 class="su-generator-extra-banner-title"><?php esc_html_e( 'Extra Shortcodes', 'upfront-shortcodes' ); ?></h3>
	<p class="su-generator-extra-banner-description"><?php esc_html_e( 'This add-on extends UpFront Shortcodes with 15 new shortcodes. Parallax sections, responsive content slider, pricing tables and more', 'upfront-shortcodes' ); ?></p>
	<p class="su-generator-extra-banner-action">
		<a href="<?php echo esc_attr( su_get_utm_link( 'https://n3rds.work/shop/artikel/category/upfront-themes/extra-shortcodes/', array( 'generator', 'extra-shortcode', 'wp-dashboard' ) ) ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Details & Pricing', 'upfront-shortcodes' ); ?> &rarr;</a>
	</p>
	<div class="su-generator-extra-banner-screenshot">
		<img src="<?php echo esc_attr( $this->get_image_url( 'screenshots/' . $data['id'] . '.png' ) ); ?>">
	</div>
</div>
