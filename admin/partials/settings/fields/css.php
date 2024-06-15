<?php defined( 'ABSPATH' ) or exit; ?>

<textarea name="<?php echo esc_attr( $data['id'] ); ?>" id="<?php echo esc_attr( $data['id'] ); ?>" cols="50" rows="15" class="large-text"><?php echo esc_textarea( get_option( $data['id'] ) ); ?></textarea>

<p class="description"><?php echo $data['description']; ?></p>

<h4 class="title"><?php _e( 'Available variables', 'psource-shortcodes' ); ?></h4>
<ul>
	<li><code>%home_url%</code> - <?php printf( '%s (%s)', __( 'the URL of the site home page', 'psource-shortcodes' ), __( 'with trailing slash', 'psource-shortcodes' ) ); ?></li>
	<li><code>%theme_url%</code> - <?php printf( '%s (%s)', __( 'the URL of the directory of the current theme', 'psource-shortcodes' ), __( 'with trailing slash', 'psource-shortcodes' ) ); ?></li>
	<li><code>%plugin_url%</code> - <?php printf( '%s (%s)', __( 'the URL of the directory of the plugin', 'psource-shortcodes' ), __( 'with trailing slash', 'psource-shortcodes' ) ); ?></li>
</ul>

<h4 class="title"><?php _e( 'More information', 'psource-shortcodes' ); ?></h4>

<ul class="ul-disc">
	<li><?php _e( 'See help tab at the top right corner of this page for more information.', 'psource-shortcodes' ); ?></li>
	<li><?php printf( __( 'Open %s file to see default styles.', 'psource-shortcodes' ), '<a href="' . $this->get_plugin_url() . 'public/css/shortcodes.css" target="_blank">shortcodes.css</a>' ); ?></li>
</ul>
