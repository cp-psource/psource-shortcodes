<?php defined( 'ABSPATH' ) || exit; ?>

<div class="su-admin-about wrap">

	<div class="su-admin-about-page-header">
		<img src="<?php echo esc_attr( plugins_url( '../../images/plugin-icon.svg', __FILE__ ) ); ?>" alt="" width="72" height="72">
		<h1>
			<?php // translators: %s will be replaced with "UpFront Shortcodes" ?>
			<?php echo esc_html( sprintf( __( 'Willkommen bei %s', 'upfront-shortcodes' ), 'UpFront&nbsp;Shortcodes' ) ); ?>
		</h1>
		<p><?php esc_html_e( 'Designpower für das PSource UpFront Theme-Framework. Arbeitet auch Eigenständig und stellt mächtige Shortcodes zur Verfügung' ); ?></p>
	</div>

	<div class="su-admin-about-popular">
		<h2><?php esc_html_e( 'Shortcodes', 'upfront-shortcodes' ); ?></h2>
		<p><?php esc_html_e( 'Das Plugin enthält über 60 erstaunliche Shortcodes', 'upfront-shortcodes' ); ?></p>
		<ul class="su-admin-about-popular-grid">
			<?php foreach ( su_get_config( 'popular-shortcodes' ) as $shortcode ) : ?>
				<li class="su-admin-about-popular-item">
					<img class="su-admin-about-popular-item-icon" src="<?php echo esc_attr( su_get_plugin_url() . $shortcode['icon'] ); ?>" alt="<?php echo esc_attr( sprintf( '%s: %s', __( 'Shortcode-Symbol', 'upfront-shortcodes' ), $shortcode['title'] ) ); ?>" width="24" height="24">
					<span class="su-admin-about-popular-item-text">
						<span class="su-admin-about-popular-item-title"><?php echo esc_html( $shortcode['title'] ); ?></span>
						<span class="su-admin-about-popular-item-description"><?php echo esc_html( $shortcode['description'] ); ?></span>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="su-admin-about-popular-bottom">
			<a href="https://n3rds.work/piestingtal_source/upfront/" class="button" target="_blank"><?php esc_html_e( 'Zum UpFront Theme Framework', 'upfront-shortcodes' ); ?> <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"><path d="M14 9 L3 9 3 29 23 29 23 18 M18 4 L28 4 28 14 M28 4 L14 18" /></svg></a>
		</div>
	</div>

	<div class="su-admin-about-upgrade">
		<div class="su-admin-about-upgrade-features">
			<h2><?php esc_html_e( 'Mehr PSource für UpFront', 'upfront-shortcodes' ); ?></h2>
			<ul>
				<li><?php esc_html_e( 'PSeCommerce', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'BrainPress', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS Events', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS Maps', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS Mitgliedschaften', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS Seitenleisten', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS Affiliate', 'upfront-shortcodes' ); ?></li>
				<li><?php esc_html_e( 'PS PopUp', 'upfront-shortcodes' ); ?></li>
			</ul>
		</div>
		<div class="su-admin-about-upgrade-widget">
			<a href="<?php echo esc_attr( admin_url( 'admin.php?page=upfront-shortcodes-addons' ) ); ?>" class="su-admin-about-upgrade-widget-button su-admin-c-button"><?php esc_html_e( 'Durchsuche Mehr UpFront', 'upfront-shortcodes' ); ?></a>
		</div>
	</div>

	<div class="su-admin-about-help">
		<h2><?php esc_html_e( 'Get help', 'upfront-shortcodes' ); ?></h2>
		<div class="su-admin-about-help-menu">
			<ul>
				<li>
					<a href="https://n3rds.work/gruppen/psource-piestingtal-source-development-team/docs/?folder=35889" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"><path d="M16 7 C16 7 9 1 2 6 L2 28 C9 23 16 28 16 28 16 28 23 23 30 28 L30 6 C23 1 16 7 16 7 Z M16 7 L16 28"/></svg>
						<?php esc_html_e( 'Plugin-Dokumentation', 'upfront-shortcodes' ); ?>
					</a>
				</li>
				<li>
					<a href="https://n3rds.work/forums/forum/psource-support-foren/upfront-theme-supportforum/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"><path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z"/></svg>
						<?php esc_html_e( 'Community-Supportforum', 'upfront-shortcodes' ); ?>
					</a>
				</li>
				<li>
					<a href="https://n3rds.work/n3rdswork-support-team/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="18" height="18" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"><path d="M2 26 L30 26 30 6 2 6 Z M2 6 L16 16 30 6"/></svg>
						<?php esc_html_e( 'Mitglieder-Support', 'upfront-shortcodes' ); ?>
					</a>
				</li>
			</ul>
		</div>
	</div>

</div>
