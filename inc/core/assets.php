<?php

/**
 * Class for managing plugin assets
 */
class Su_Assets {

	/**
	 * Set of queried assets
	 *
	 * @var array
	 */
	static $assets = array( 'css' => array(), 'js' => array() );

	/**
	 * Constructor
	 */
	function __construct() {
		// Register
		add_action( 'wp_head',                     array( __CLASS__, 'register' ) );
		add_action( 'admin_head',                  array( __CLASS__, 'register' ) );
		add_action( 'su/generator/preview/before', array( __CLASS__, 'register' ) );
		add_action( 'su/examples/preview/before',  array( __CLASS__, 'register' ) );
		// Enqueue
		add_action( 'wp_footer',                   array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_footer',                array( __CLASS__, 'enqueue' ) );
		// Print
		add_action( 'su/generator/preview/after',  array( __CLASS__, 'prnt' ) );
		add_action( 'su/examples/preview/after',   array( __CLASS__, 'prnt' ) );
		// Custom CSS
		add_action( 'wp_footer',                   array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'su/generator/preview/after',  array( __CLASS__, 'custom_css' ), 99 );
		add_action( 'su/examples/preview/after',   array( __CLASS__, 'custom_css' ), 99 );
		// RTL support
		add_action( 'su/assets/custom_css/after',        array( __CLASS__, 'rtl_shortcodes' ) );
		// Custom TinyMCE CSS and JS
		// add_filter( 'mce_css',                     array( __CLASS__, 'mce_css' ) );
		// add_filter( 'mce_external_plugins',        array( __CLASS__, 'mce_js' ) );
	}

	/**
	 * Register assets
	 */
	public static function register() {
		// Chart.js
		wp_register_script( 'chartjs', plugins_url( 'assets/js/chart.js', SU_PLUGIN_FILE ), false, '0.2', true );
		// SimpleSlider
		wp_register_script( 'simpleslider', plugins_url( 'assets/js/simpleslider.js', SU_PLUGIN_FILE ), array( 'jquery' ), '1.0.0', true );
		wp_register_style( 'simpleslider', plugins_url( 'assets/css/simpleslider.css', SU_PLUGIN_FILE ), false, '1.0.0', 'all' );
		// Owl Carousel
		wp_register_script( 'owl-carousel', plugins_url( 'assets/js/owl-carousel.js', SU_PLUGIN_FILE ), array( 'jquery' ), '2.2.1', true );
		wp_register_style( 'owl-carousel', plugins_url( 'assets/css/owl-carousel.css', SU_PLUGIN_FILE ), false, '2.2.1', 'all' );
		// Font Awesome
		wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', 'all' );
		// Animate.css
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', SU_PLUGIN_FILE ), false, '3.1.1', 'all' );
		// InView
		wp_register_script( 'jquery-inview', plugins_url( 'assets/js/jquery.inview.js', SU_PLUGIN_FILE ), array( 'jquery' ), '1.1.2', true );
		// qTip
		wp_register_style( 'qtip', plugins_url( 'assets/css/qtip.css', SU_PLUGIN_FILE ), false, '2.1.1', 'all' );
		wp_register_script( 'qtip', plugins_url( 'assets/js/qtip.js', SU_PLUGIN_FILE ), array( 'jquery' ), '2.1.1', true );
		// jsRender
		wp_register_script( 'jsrender', plugins_url( 'assets/js/jsrender.js', SU_PLUGIN_FILE ), array( 'jquery' ), '1.0.0-beta', true );
		// Magnific Popup
		wp_register_style( 'magnific-popup', plugins_url( 'assets/css/magnific-popup.css', SU_PLUGIN_FILE ), false, '0.9.9', 'all' );
		wp_register_script( 'magnific-popup', plugins_url( 'assets/js/magnific-popup.js', SU_PLUGIN_FILE ), array( 'jquery' ), '0.9.9', true );
		wp_localize_script( 'magnific-popup', 'su_magnific_popup', array(
				'close'   => __( 'Close (Esc)', 'psource-shortcodes' ),
				'loading' => __( 'Loading...', 'psource-shortcodes' ),
				'prev'    => __( 'Previous (Left arrow key)', 'psource-shortcodes' ),
				'next'    => __( 'Next (Right arrow key)', 'psource-shortcodes' ),
				'counter' => sprintf( __( '%s of %s', 'psource-shortcodes' ), '%curr%', '%total%' ),
				'error'   => sprintf( __( 'Failed to load this link. %sOpen link%s.', 'psource-shortcodes' ), '<a href="%url%" target="_blank"><u>', '</u></a>' )
			) );
		// Ace
		wp_register_script( 'ace', plugins_url( 'assets/js/ace/ace.js', SU_PLUGIN_FILE ), false, '1.1.3', true );
		// Swiper
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper.js', SU_PLUGIN_FILE ), array( 'jquery' ), '2.6.1', true );
		// jPlayer
		wp_register_script( 'jplayer', plugins_url( 'assets/js/jplayer.js', SU_PLUGIN_FILE ), array( 'jquery' ), '2.4.0', true );
		// Options page
		wp_register_style( 'su-options-page', plugins_url( 'assets/css/options-page.css', SU_PLUGIN_FILE ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_script( 'su-options-page', plugins_url( 'assets/js/options-page.js', SU_PLUGIN_FILE ), array( 'magnific-popup', 'jquery-ui-sortable', 'ace', 'jsrender' ), SU_PLUGIN_VERSION, true );
		wp_localize_script( 'su-options-page', 'su_options_page', array(
				'upload_title'  => __( 'Choose files', 'psource-shortcodes' ),
				'upload_insert' => __( 'Add selected files', 'psource-shortcodes' ),
				'not_clickable' => __( 'This button is not clickable', 'psource-shortcodes' )
			) );
		// Cheatsheet
		wp_register_style( 'su-cheatsheet', plugins_url( 'assets/css/cheatsheet.css', SU_PLUGIN_FILE ), false, SU_PLUGIN_VERSION, 'all' );
		// Generator
		wp_register_style( 'su-generator', plugins_url( 'assets/css/generator.css', SU_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup' ), SU_PLUGIN_VERSION, 'all' );
		wp_register_script( 'su-generator', plugins_url( 'assets/js/generator.js', SU_PLUGIN_FILE ), array( 'farbtastic', 'magnific-popup', 'qtip' ), SU_PLUGIN_VERSION, true );
		wp_localize_script( 'su-generator', 'su_generator', array(
				'upload_title'         => __( 'Choose file', 'psource-shortcodes' ),
				'upload_insert'        => __( 'Insert', 'psource-shortcodes' ),
				'isp_media_title'      => __( 'Select images', 'psource-shortcodes' ),
				'isp_media_insert'     => __( 'Add selected images', 'psource-shortcodes' ),
				'presets_prompt_msg'   => __( 'Please enter a name for new preset', 'psource-shortcodes' ),
				'presets_prompt_value' => __( 'New preset', 'psource-shortcodes' ),
				'last_used'            => __( 'Last used settings', 'psource-shortcodes' ),
				'hotkey'               => get_option( 'su_option_hotkey' )
			) );
		// Shortcodes stylesheets
		wp_register_style( 'su-content-shortcodes', self::skin_url( 'content-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-box-shortcodes', self::skin_url( 'box-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-media-shortcodes', self::skin_url( 'media-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-other-shortcodes', self::skin_url( 'other-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-galleries-shortcodes', self::skin_url( 'galleries-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-players-shortcodes', self::skin_url( 'players-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		// RTL stylesheets
		wp_register_style( 'su-rtl-shortcodes', self::skin_url( 'rtl-shortcodes.css' ), false, SU_PLUGIN_VERSION, 'all' );
		wp_register_style( 'su-rtl-admin', self::skin_url( 'rtl-admin.css' ), false, SU_PLUGIN_VERSION, 'all' );
		// Shortcodes scripts
		wp_register_script( 'su-galleries-shortcodes', plugins_url( 'assets/js/galleries-shortcodes.js', SU_PLUGIN_FILE ), array( 'jquery', 'swiper' ), SU_PLUGIN_VERSION, true );
		wp_register_script( 'su-players-shortcodes', plugins_url( 'assets/js/players-shortcodes.js', SU_PLUGIN_FILE ), array( 'jquery', 'jplayer' ), SU_PLUGIN_VERSION, true );
		wp_register_script( 'su-other-shortcodes', plugins_url( 'assets/js/other-shortcodes.js', SU_PLUGIN_FILE ), array( 'jquery' ), SU_PLUGIN_VERSION, true );
		wp_localize_script( 'su-other-shortcodes', 'su_other_shortcodes', array( 'no_preview' => __( 'This shortcode doesn\'t work in live preview. Please insert it into editor and preview on the site.', 'psource-shortcodes' ) ) );
		// Hook to deregister assets or add custom
		do_action( 'su/assets/register' );
	}

	/**
	 * Enqueue assets
	 */
	public static function enqueue() {
		// Get assets query and plugin object
		$assets = self::assets();
		// Enqueue stylesheets
		foreach ( $assets['css'] as $style ) wp_enqueue_style( $style );
		// Enqueue scripts
		foreach ( $assets['js'] as $script ) wp_enqueue_script( $script );
		// Hook to dequeue assets or add custom
		do_action( 'su/assets/enqueue', $assets );
	}

	/**
	 * Print assets without enqueuing
	 */
	public static function prnt() {
		// Prepare assets set
		$assets = self::assets();
		// Enqueue stylesheets
		wp_print_styles( $assets['css'] );
		// Enqueue scripts
		wp_print_scripts( $assets['js'] );
		// Hook
		do_action( 'su/assets/print', $assets );
	}

	/**
	 * Print custom CSS
	 */
	public static function custom_css() {

		// Get custom CSS and apply filters to it
		$custom_css = (string) apply_filters( 'su/assets/custom_css', get_option( 'su_option_custom-css' ) );

		$template = '%1$s<!-- %2$s - %3$s -->%1$s<style type="text/css">%1$s%5$s%1$s</style>%1$s<!-- %2$s - %4$s -->%1$s';
		$template = apply_filters( 'su/assets/custom_css/template', $template );

		if ( ! empty( $custom_css ) ) {

			$custom_css = str_replace(
				array( '%theme_url%', '%home_url%', '%plugin_url%' ),
				array(
					trailingslashit( get_stylesheet_directory_uri() ),
					trailingslashit( get_option( 'home' ) ),
					trailingslashit( plugins_url( '', SU_PLUGIN_FILE ) ),
				),
				$custom_css
			);

			printf(
				$template,
				PHP_EOL,
				'PSOURCE Shortcodes custom CSS',
				'start',
				'end',
				strip_tags( $custom_css )
			);

		}

		// Hook
		do_action( 'su/assets/custom_css/after' );

	}

	/**
	 * Styles for visualised shortcodes
	 */
	public static function mce_css( $mce_css ) {
		if ( ! empty( $mce_css ) ) $mce_css .= ',';
		$mce_css .= plugins_url( 'assets/css/tinymce.css', SU_PLUGIN_FILE );
		return $mce_css;
	}

	/**
	 * TinyMCE plugin for visualised shortcodes
	 */
	public static function mce_js( $plugins ) {
		$plugins['shortcodesultimate'] = plugins_url( 'assets/js/tinymce.js', SU_PLUGIN_FILE );
		return $plugins;
	}

	/**
	 * RTL support for shortcodes
	 */
	public static function rtl_shortcodes( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		wp_print_styles( array( 'su-rtl-shortcodes' ) );
	}

	/**
	 * RTL support for admin
	 */
	public static function rtl_admin( $assets ) {
		// Check RTL
		if ( !is_rtl() ) return;
		// Add RTL stylesheets
		self::add( 'css', 'su-rtl-admin' );
	}

	/**
	 * Add asset to the query
	 */
	public static function add( $type, $handle ) {
		// Array with handles
		if ( is_array( $handle ) ) { foreach ( $handle as $h ) self::$assets[$type][$h] = $h; }
		// Single handle
		else self::$assets[$type][$handle] = $handle;
	}

	/**
	 * Get queried assets
	 */
	public static function assets() {
		// Get assets query
		$assets = self::$assets;
		// Apply filters to assets set
		$assets['css'] = array_unique( ( array ) apply_filters( 'su/assets/css', ( array ) array_unique( $assets['css'] ) ) );
		$assets['js'] = array_unique( ( array ) apply_filters( 'su/assets/js', ( array ) array_unique( $assets['js'] ) ) );
		// Return set
		return $assets;
	}

	/**
	 * Helper to get full URL of a skin file
	 */
	public static function skin_url( $file = '' ) {
		$shult = psource_shortcodes();
		$skin = get_option( 'su_option_skin' );
		$uploads = wp_upload_dir(); $uploads = $uploads['baseurl'];
		// Prepare url to skin directory
		$url = ( !$skin || $skin === 'default' ) ? plugins_url( 'assets/css/', SU_PLUGIN_FILE ) : $uploads . '/psource-shortcodes-skins/' . $skin;
		return trailingslashit( apply_filters( 'su/assets/skin', $url ) ) . $file;
	}
}

new Su_Assets;

/**
 * Helper function to add asset to the query
 *
 * @param string  $type   Asset type (css|js)
 * @param mixed   $handle Asset handle or array with handles
 */
function su_query_asset( $type, $handle ) {
	Su_Assets::add( $type, $handle );
}

/**
 * Helper function to get current skin url
 *
 * @param string  $file Asset file name. Example value: box-shortcodes.css
 */
function su_skin_url( $file ) {
	return Su_Assets::skin_url( $file );
}
