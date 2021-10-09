<?php

require_once dirname( __FILE__ ) . '/includes/class-upfront-shortcodes-activator.php';
require_once dirname( __FILE__ ) . '/includes/class-upfront-shortcodes.php';

register_activation_hook(
	SU_PLUGIN_FILE,
	array( 'UpFront_Shortcodes_Activator', 'activate' )
);

call_user_func(
	function() {

		$plugin = new UpFront_Shortcodes(
			SU_PLUGIN_FILE,
			SU_PLUGIN_VERSION,
			'upfront-shortcodes-'
		);

		do_action( 'su/ready', $plugin );

	}
);
