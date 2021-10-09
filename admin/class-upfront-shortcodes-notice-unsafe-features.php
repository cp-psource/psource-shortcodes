<?php

final class UpFront_Shortcodes_Notice_Unsafe_Features extends UpFront_Shortcodes_Notice {

	public function display_notice() {

		if ( ! get_option( 'su_option_unsafe_features_auto_off' ) ) {
			return;
		}

		if ( $this->is_dismissed() ) {
			return;
		}

		if ( ! $this->current_user_can_view() ) {
			return;
		}

		// phpcs:disable
		$is_plugin_page =
			isset( $_GET['page'] ) &&
			in_array(
				$_GET['page'],
				array( 'upfront-shortcodes', 'upfront-shortcodes-settings' ),
				true
			);
		// phpcs:enable

		if ( 'dashboard' !== $this->get_current_screen_id() && ! $is_plugin_page ) {
			return;
		}

		$this->include_template();

	}

}
