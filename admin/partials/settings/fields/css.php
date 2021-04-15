<?php defined( 'ABSPATH' ) || exit; ?>

<textarea name="<?php echo esc_attr( $data['id'] ); ?>" id="<?php echo esc_attr( $data['id'] ); ?>" cols="50" rows="15" class="large-text"><?php echo esc_textarea( get_option( $data['id'] ) ); ?></textarea>

<script type="text/javascript">
jQuery(function() {
	if (typeof wp === 'undefined' || typeof wp.codeEditor === 'undefined') {
		return;
	}

	var editorSettings = wp.codeEditor.defaultSettings
		? _.clone(wp.codeEditor.defaultSettings)
		: {};

	editorSettings.codemirror = _.extend({}, editorSettings.codemirror, {
		viewportMargin: Infinity
	});

	wp.codeEditor.initialize(
		"<?php echo esc_attr( $data['id'] ); ?>",
		editorSettings
	);
});
</script>

<p class="description"><?php echo esc_html( $data['description'] ); ?></p>

<details class="su-admin-settings-details">
	<summary class="title"><?php esc_html_e( 'Verfügbare Variablen', 'upfront-shortcodes' ); ?></summary>
	<article>
		<table class="widefat striped" style="width:auto">
			<thead>
				<tr>
					<td><?php esc_html_e( 'Variable', 'upfront-shortcodes' ); ?></td>
					<td><?php esc_html_e( 'Wird ersetzt durch', 'upfront-shortcodes' ); ?>&hellip;</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code contenteditable>%home_url%</code></td>
					<td><?php printf( '%s (%s)', esc_html__( 'die URL der Homepage der Webseite', 'upfront-shortcodes' ), esc_html__( 'mit nachlaufendem Schrägstrich', 'upfront-shortcodes' ) ); ?></td>
				</tr>
				<tr>
					<td><code contenteditable>%theme_url%</code></td>
					<td><?php printf( '%s (%s)', esc_html__( 'die URL des Verzeichnisses des aktuellen Themes', 'upfront-shortcodes' ), esc_html__( 'mit nachlaufendem Schrägstrich', 'upfront-shortcodes' ) ); ?></td>
				</tr>
				<tr>
					<td><code contenteditable>%plugin_url%</code></td>
					<td><?php printf( '%s (%s)', esc_html__( 'die URL des Verzeichnisses des Plugins', 'upfront-shortcodes' ), esc_html__( 'mit nachlaufendem Schrägstrich', 'upfront-shortcodes' ) ); ?></td>
				</tr>
			</tbody>
		</table>
	</article>
</details>

<details class="su-admin-settings-details">
	<summary><?php esc_html_e( 'Mehr Informationen', 'upfront-shortcodes' ); ?></summary>
	<article>
		<ul class="ul-disc">
			<?php // Translators: %s - link to the shortcodes.css file ?>
			<li><?php printf( esc_html__( 'Öffne die %s-Datei, um die Standardstile anzuzeigen', 'upfront-shortcodes' ), '<a href="https://plugins.trac.wordpress.org/browser/upfront-shortcodes/trunk/includes/css/shortcodes.full.css" target="_blank">shortcodes.full.css</a>' ); ?></li>
			<li><?php esc_html_e( 'Hilfeartikel', 'upfront-shortcodes' ); ?>: <a href="https://nerds.work/docs/how-to-use-custom-css-editor/" target="_blank"><?php esc_html_e( 'Verwendung des benutzerdefinierten CSS-Editors', 'upfront-shortcodes' ); ?></a></li>
		</ul>
	</article>
</details>
