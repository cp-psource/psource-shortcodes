<?php defined( 'ABSPATH' ) || exit; ?>

<div class="su-admin-settings wrap">

	<h1 class="su-admin-settings-page-title">
		<img src="<?php echo esc_attr( su_get_plugin_url() . 'admin/images/plugin-icon.svg' ); ?>" alt="" width="36" height="36">
		<?php esc_html_e( 'UpFront Shortcodes Einstellungen', 'upfront-shortcodes' ); ?>
	</h1>

	<?php settings_errors(); ?>

	<form action="options.php" method="post" class="su-admin-settings-form">

			<?php if ( $this->is_advanced_settings() ) : ?>

				<div class="notice notice-warning">
					<p>
						<strong><?php esc_html_e( 'Warnung!', 'upfront-shortcodes' ); ?></strong><br>
						<?php esc_html_e( 'Du bearbeitest erweiterte Einstellungen. Ändere hier NICHTS, es sei denn, Du weisst, was Du tust.', 'upfront-shortcodes' ); ?>
					</p>
					<p>
						<a href="<?php echo esc_attr( $this->get_component_url() ); ?>">&larr; <?php esc_html_e( 'Gehe zurück zu den Haupteinstellungen', 'upfront-shortcodes' ); ?></a>
					</p>
				</div>

				<?php settings_fields( $this->plugin_prefix . 'advanced-settings' ); ?>
				<?php do_settings_sections( $this->plugin_prefix . 'advanced-settings' ); ?>

			<?php else : ?>

				<?php settings_fields( rtrim( $this->plugin_prefix, '-_' ) ); ?>
				<?php do_settings_sections( $this->plugin_prefix . 'settings' ); ?>

			<?php endif; ?>

			<?php submit_button(); ?>

	</form>

	<ul class="su-admin-settings-bottom-menu">
		<?php if ( ! $this->is_advanced_settings() ) : ?>
			<li><a href="<?php echo esc_attr( add_query_arg( 'advanced', '', $this->get_component_url() ) ); ?>"><?php esc_html_e( 'Erweiterte Einstellungen', 'upfront-shortcodes' ); ?></a></li>
		<?php else : ?>
			<li><a href="<?php echo esc_attr( $this->get_component_url() ); ?>"><?php esc_html_e( 'Haupteinstellungen', 'upfront-shortcodes' ); ?></a></li>
		<?php endif; ?>
		<li><a href="<?php echo esc_attr( add_query_arg( 'page', 'upfront-shortcodes', admin_url( 'admin.php' ) ) ); ?>"><?php esc_html_e( 'PSOURCE', 'upfront-shortcodes' ); ?></a></li>
	</ul>

</div>
