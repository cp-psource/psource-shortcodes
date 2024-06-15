<?php
/**
 * Class for managing plugin data
 */
class Su_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'su/data/groups', array(
				'all'     => __( 'All', 'psource-shortcodes' ),
				'content' => __( 'Content', 'psource-shortcodes' ),
				'box'     => __( 'Box', 'psource-shortcodes' ),
				'media'   => __( 'Media', 'psource-shortcodes' ),
				'gallery' => __( 'Gallery', 'psource-shortcodes' ),
				'data'    => __( 'Data', 'psource-shortcodes' ),
				'other'   => __( 'Other', 'psource-shortcodes' )
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'su/data/borders', array(
				'none'   => __( 'None', 'psource-shortcodes' ),
				'solid'  => __( 'Solid', 'psource-shortcodes' ),
				'dotted' => __( 'Dotted', 'psource-shortcodes' ),
				'dashed' => __( 'Dashed', 'psource-shortcodes' ),
				'double' => __( 'Double', 'psource-shortcodes' ),
				'groove' => __( 'Groove', 'psource-shortcodes' ),
				'ridge'  => __( 'Ridge', 'psource-shortcodes' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'su/data/icons', array( 'address-book', 'address-book-o', 'address-card', 'address-card-o', 'bandcamp', 'bath', 'bathtub', 'drivers-license', 'drivers-license-o', 'eercast', 'envelope-open', 'envelope-open-o', 'etsy', 'free-code-camp', 'grav', 'handshake-o', 'id-badge', 'id-card', 'id-card-o', 'imdb', 'linode', 'meetup', 'microchip', 'podcast', 'quora', 'ravelry', 's15', 'shower', 'snowflake-o', 'superpowers', 'telegram', 'thermometer', 'thermometer-0', 'thermometer-1', 'thermometer-2', 'thermometer-3', 'thermometer-4', 'thermometer-empty', 'thermometer-full', 'thermometer-half', 'thermometer-quarter', 'thermometer-three-quarters', 'times-rectangle', 'times-rectangle-o', 'user-circle', 'user-circle-o', 'user-o', 'vcard', 'vcard-o', 'window-close', 'window-close-o', 'window-maximize', 'window-minimize', 'window-restore', 'wpexplorer', 'adjust', 'american-sign-language-interpreting', 'anchor', 'archive', 'area-chart', 'arrows', 'arrows-h', 'arrows-v', 'asl-interpreting', 'assistive-listening-systems', 'asterisk', 'at', 'audio-description', 'automobile', 'balance-scale', 'ban', 'bank', 'bar-chart', 'bar-chart-o', 'barcode', 'bars', 'battery', 'battery-0', 'battery-1', 'battery-2', 'battery-3', 'battery-4', 'battery-empty', 'battery-full', 'battery-half', 'battery-quarter', 'battery-three-quarters', 'bed', 'beer', 'bell', 'bell-o', 'bell-slash', 'bell-slash-o', 'bicycle', 'binoculars', 'birthday-cake', 'blind', 'bluetooth', 'bluetooth-b', 'bolt', 'bomb', 'book', 'bookmark', 'bookmark-o', 'braille', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn', 'bullseye', 'bus', 'cab', 'calculator', 'calendar', 'calendar-check-o', 'calendar-minus-o', 'calendar-o', 'calendar-plus-o', 'calendar-times-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'cart-arrow-down', 'cart-plus', 'cc', 'certificate', 'check', 'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle', 'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'clone', 'close', 'cloud', 'cloud-download', 'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o', 'commenting', 'commenting-o', 'comments', 'comments-o', 'compass', 'copyright', 'creative-commons', 'credit-card', 'credit-card-alt', 'crop', 'crosshairs', 'cube', 'cubes', 'cutlery', 'dashboard', 'database', 'deaf', 'deafness', 'desktop', 'diamond', 'dot-circle-o', 'download', 'edit', 'ellipsis-h', 'ellipsis-v', 'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation', 'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye', 'eye-slash', 'eyedropper', 'fax', 'feed', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 'file-movie-o', 'file-pdf-o', 'file-photo-o', 'file-picture-o', 'file-powerpoint-o', 'file-sound-o', 'file-video-o', 'file-word-o', 'file-zip-o', 'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flash', 'flask', 'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'futbol-o', 'gamepad', 'gavel', 'gear', 'gears', 'gift', 'glass', 'globe', 'graduation-cap', 'group', 'hand-grab-o', 'hand-lizard-o', 'hand-paper-o', 'hand-peace-o', 'hand-pointer-o', 'hand-rock-o', 'hand-scissors-o', 'hand-spock-o', 'hand-stop-o', 'hard-of-hearing', 'hashtag', 'hdd-o', 'headphones', 'heart', 'heart-o', 'heartbeat', 'history', 'home', 'hotel', 'hourglass', 'hourglass-1', 'hourglass-2', 'hourglass-3', 'hourglass-end', 'hourglass-half', 'hourglass-o', 'hourglass-start', 'i-cursor', 'image', 'inbox', 'industry', 'info', 'info-circle', 'institution', 'key', 'keyboard-o', 'language', 'laptop', 'leaf', 'legal', 'lemon-o', 'level-down', 'level-up', 'life-bouy', 'life-buoy', 'life-ring', 'life-saver', 'lightbulb-o', 'line-chart', 'location-arrow', 'lock', 'low-vision', 'magic', 'magnet', 'mail-forward', 'mail-reply', 'mail-reply-all', 'male', 'map', 'map-marker', 'map-o', 'map-pin', 'map-signs', 'meh-o', 'microphone', 'microphone-slash', 'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'mobile-phone', 'money', 'moon-o', 'mortar-board', 'motorcycle', 'mouse-pointer', 'music', 'navicon', 'newspaper-o', 'object-group', 'object-ungroup', 'paint-brush', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 'percent', 'phone', 'phone-square', 'photo', 'picture-o', 'pie-chart', 'plane', 'plug', 'plus', 'plus-circle', 'plus-square', 'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle', 'question-circle-o', 'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'registered', 'remove', 'reorder', 'reply', 'reply-all', 'retweet', 'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'send', 'send-o', 'server', 'share', 'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'ship', 'shopping-bag', 'shopping-basket', 'shopping-cart', 'sign-in', 'sign-language', 'sign-out', 'signal', 'signing', 'sitemap', 'sliders', 'smile-o', 'soccer-ball-o', 'sort', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 'sort-down', 'sort-numeric-asc', 'sort-numeric-desc', 'sort-up', 'space-shuttle', 'spinner', 'spoon', 'square', 'square-o', 'star', 'star-half', 'star-half-empty', 'star-half-full', 'star-half-o', 'star-o', 'sticky-note', 'sticky-note-o', 'street-view', 'suitcase', 'sun-o', 'support', 'tablet', 'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'television', 'terminal', 'thumb-tack', 'thumbs-down', 'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 'times-circle-o', 'tint', 'toggle-down', 'toggle-left', 'toggle-off', 'toggle-on', 'toggle-right', 'toggle-up', 'trademark', 'trash', 'trash-o', 'tree', 'trophy', 'truck', 'tty', 'tv', 'umbrella', 'universal-access', 'university', 'unlock', 'unlock-alt', 'unsorted', 'upload', 'user', 'user-plus', 'user-secret', 'user-times', 'users', 'video-camera', 'volume-control-phone', 'volume-down', 'volume-off', 'volume-up', 'warning', 'wheelchair', 'wheelchair-alt', 'wifi', 'wrench', 'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'ambulance', 'subway', 'train', 'genderless', 'intersex', 'mars', 'mars-double', 'mars-stroke', 'mars-stroke-h', 'mars-stroke-v', 'mercury', 'neuter', 'transgender', 'transgender-alt', 'venus', 'venus-double', 'venus-mars', 'file', 'file-o', 'file-text', 'file-text-o' ) );
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'su/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {

		$images_url = plugin_dir_url( SU_PLUGIN_FILE ) . 'admin/images/shortcodes/';

		$shortcodes = apply_filters( 'su/data/shortcodes', array(
				// heading
				'heading' => array(
					'name' => __( 'Heading', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Choose style for this heading', 'psource-shortcodes' ) . '%su_skins_link%'
						),
						'size' => array(
							'type' => 'slider',
							'min' => 7,
							'max' => 48,
							'step' => 1,
							'default' => 13,
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Select heading size (pixels)', 'psource-shortcodes' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'psource-shortcodes' ),
								'center' => __( 'Center', 'psource-shortcodes' ),
								'right' => __( 'Right', 'psource-shortcodes' )
							),
							'default' => 'center',
							'name' => __( 'Align', 'psource-shortcodes' ),
							'desc' => __( 'Heading text alignment', 'psource-shortcodes' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 10,
							'default' => 20,
							'name' => __( 'Margin', 'psource-shortcodes' ),
							'desc' => __( 'Bottom margin (pixels)', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Heading text', 'psource-shortcodes' ),
					'desc' => __( 'Styled heading', 'psource-shortcodes' ),
					'icon' => 'h-square',
					'image' => $images_url . 'heading.svg',
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'required_child' => 'tab',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Choose style for this tabs', 'psource-shortcodes' ) . '%su_skins_link%'
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'psource-shortcodes' ),
							'desc' => __( 'Select which tab is open by default', 'psource-shortcodes' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'psource-shortcodes' ),
							'desc' => __( 'Align tabs vertically', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => array(
						'id'     => 'tab',
						'number' => 3,
					),
					'desc' => __( 'Tabs container', 'psource-shortcodes' ),
					'example' => 'tabs',
					'icon' => 'list-alt',
					'image' => $images_url . 'tabs.svg',
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'required_parent' => 'tabs',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'psource-shortcodes' ),
							'name' => __( 'Title', 'psource-shortcodes' ),
							'desc' => __( 'Tab title', 'psource-shortcodes' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'psource-shortcodes' ),
							'desc' => __( 'Is this tab disabled', 'psource-shortcodes' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'psource-shortcodes' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: use <b%value>Hello</b> and then navigate to url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'psource-shortcodes' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'psource-shortcodes' ),
							'desc' => __( 'Link tab to any webpage. Use full URL to turn the tab title into link', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'psource-shortcodes' ),
							'desc' => __( 'Choose how to open the custom tab link', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Tab content', 'psource-shortcodes' ),
					'desc' => __( 'Single tab', 'psource-shortcodes' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'psource-shortcodes' ),
					'example' => 'tabs',
					'icon' => 'list-alt',
					'image' => $images_url . 'tab.svg',
				),
				// spoiler
				'spoiler' => array(
					'name' => __( 'Spoiler', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Spoiler title', 'psource-shortcodes' ),
							'name' => __( 'Title', 'psource-shortcodes' ), 'desc' => __( 'Text in spoiler title', 'psource-shortcodes' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'psource-shortcodes' ),
							'desc' => __( 'Is spoiler content visible by default', 'psource-shortcodes' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'fancy' => __( 'Fancy', 'psource-shortcodes' ),
								'simple' => __( 'Simple', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Choose style for this spoiler', 'psource-shortcodes' ) . '%su_skins_link%'
						),
						'icon' => array(
							'type' => 'select',
							'values' => array(
								'plus'           => __( 'Plus', 'psource-shortcodes' ),
								'plus-circle'    => __( 'Plus circle', 'psource-shortcodes' ),
								'plus-square-1'  => __( 'Plus square 1', 'psource-shortcodes' ),
								'plus-square-2'  => __( 'Plus square 2', 'psource-shortcodes' ),
								'arrow'          => __( 'Arrow', 'psource-shortcodes' ),
								'arrow-circle-1' => __( 'Arrow circle 1', 'psource-shortcodes' ),
								'arrow-circle-2' => __( 'Arrow circle 2', 'psource-shortcodes' ),
								'chevron'        => __( 'Chevron', 'psource-shortcodes' ),
								'chevron-circle' => __( 'Chevron circle', 'psource-shortcodes' ),
								'caret'          => __( 'Caret', 'psource-shortcodes' ),
								'caret-square'   => __( 'Caret square', 'psource-shortcodes' ),
								'folder-1'       => __( 'Folder 1', 'psource-shortcodes' ),
								'folder-2'       => __( 'Folder 2', 'psource-shortcodes' )
							),
							'default' => 'plus',
							'name' => __( 'Icon', 'psource-shortcodes' ),
							'desc' => __( 'Icons for spoiler', 'psource-shortcodes' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'psource-shortcodes' ),
							'desc' => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Hidden content', 'psource-shortcodes' ),
					'desc' => __( 'Spoiler with hidden content', 'psource-shortcodes' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'psource-shortcodes' ),
					'example' => 'spoilers',
					'icon' => 'list-ul',
					'image' => $images_url . 'spoiler.svg',
				),
				// accordion
				'accordion' => array(
					'name' => __( 'Accordion', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'required_child' => 'spoiler',
					'atts' => array(
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => array(
						'id'     => 'spoiler',
						'number' => 3,
					),
					'desc' => __( 'Accordion with spoilers', 'psource-shortcodes' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'psource-shortcodes' ),
					'example' => 'spoilers',
					'icon' => 'list',
					'image' => $images_url . 'accordion.svg',
				),
				// divider
				'divider' => array(
					'name' => __( 'Divider', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'top' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show TOP link', 'psource-shortcodes' ),
							'desc' => __( 'Show link to top of the page or not', 'psource-shortcodes' )
						),
						'text' => array(
							'values' => array( ),
							'default' => __( 'Go to top', 'psource-shortcodes' ),
							'name' => __( 'Link text', 'psource-shortcodes' ), 'desc' => __( 'Text for the GO TOP link', 'psource-shortcodes' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'dotted'  => __( 'Dotted', 'psource-shortcodes' ),
								'dashed'  => __( 'Dashed', 'psource-shortcodes' ),
								'double'  => __( 'Double', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Choose style for this divider', 'psource-shortcodes' )
						),
						'divider_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Divider color', 'psource-shortcodes' ),
							'desc' => __( 'Pick the color for divider', 'psource-shortcodes' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Link color', 'psource-shortcodes' ),
							'desc' => __( 'Pick the color for TOP link', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Height of the divider (in pixels)', 'psource-shortcodes' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 15,
							'name' => __( 'Margin', 'psource-shortcodes' ),
							'desc' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Content divider with optional TOP link', 'psource-shortcodes' ),
					'icon' => 'ellipsis-h',
					'image' => $images_url . 'divider.svg',
				),
				// spacer
				'spacer' => array(
					'name' => __( 'Spacer', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 800,
							'step' => 10,
							'default' => 20,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Height of the spacer in pixels', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Empty space with adjustable height', 'psource-shortcodes' ),
					'icon' => 'arrows-v',
					'image' => $images_url . 'spacer.svg',
				),
				// highlight
				'highlight' => array(
					'name' => __( 'Highlight', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#DDFF99',
							'name' => __( 'Background', 'psource-shortcodes' ),
							'desc' => __( 'Highlighted text background color', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#000000',
							'name' => __( 'Text color', 'psource-shortcodes' ), 'desc' => __( 'Highlighted text color', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Highlighted text', 'psource-shortcodes' ),
					'desc' => __( 'Highlighted text', 'psource-shortcodes' ),
					'icon' => 'pencil',
					'image' => $images_url . 'highlight.svg',
				),
				// label
				'label' => array(
					'name' => __( 'Label', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'success' => __( 'Success', 'psource-shortcodes' ),
								'warning' => __( 'Warning', 'psource-shortcodes' ),
								'important' => __( 'Important', 'psource-shortcodes' ),
								'black' => __( 'Black', 'psource-shortcodes' ),
								'info' => __( 'Info', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Type', 'psource-shortcodes' ),
							'desc' => __( 'Style of the label', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Label', 'psource-shortcodes' ),
					'desc' => __( 'Styled label', 'psource-shortcodes' ),
					'icon' => 'tag',
					'image' => $images_url . 'label.svg',
				),
				// quote
				'quote' => array(
					'name' => __( 'Quote', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Choose style for this quote', 'psource-shortcodes' ) . '%su_skins_link%'
						),
						'cite' => array(
							'default' => '',
							'name' => __( 'Cite', 'psource-shortcodes' ),
							'desc' => __( 'Quote author name', 'psource-shortcodes' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Cite url', 'psource-shortcodes' ),
							'desc' => __( 'Url of the quote author. Leave empty to disable link', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Quote', 'psource-shortcodes' ),
					'desc' => __( 'Blockquote alternative', 'psource-shortcodes' ),
					'icon' => 'quote-right',
					'image' => $images_url . 'quote.svg',
				),
				// pullquote
				'pullquote' => array(
					'name' => __( 'Pullquote', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'psource-shortcodes' ),
								'right' => __( 'Right', 'psource-shortcodes' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'psource-shortcodes' ), 'desc' => __( 'Pullquote alignment (float)', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Pullquote', 'psource-shortcodes' ),
					'desc' => __( 'Pullquote', 'psource-shortcodes' ),
					'icon' => 'quote-left',
					'image' => $images_url . 'pullquote.svg',
				),
				// dropcap
				'dropcap' => array(
					'name' => __( 'Dropcap', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'flat' => __( 'Flat', 'psource-shortcodes' ),
								'light' => __( 'Light', 'psource-shortcodes' ),
								'simple' => __( 'Simple', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ), 'desc' => __( 'Dropcap style preset', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 5,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Choose dropcap size', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'D', 'psource-shortcodes' ),
					'desc' => __( 'Dropcap', 'psource-shortcodes' ),
					'icon' => 'bold',
					'image' => $images_url . 'dropcap.svg',
				),
				// frame
				'frame' => array(
					'deprecated' => true,
					'name' => __( 'Frame', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
					 'align' => array(
					  'type' => 'select',
					  'values' => array(
					   'left' => __( 'Left', 'psource-shortcodes' ),
					   'center' => __( 'Center', 'psource-shortcodes' ),
					   'right' => __( 'Right', 'psource-shortcodes' )
					  ),
					  'default' => 'left',
					  'name' => __( 'Align', 'psource-shortcodes' ),
					  'desc' => __( 'Frame alignment', 'psource-shortcodes' )
					 ),
					 'class' => array(
					  'default' => '',
					  'name' => __( 'Class', 'psource-shortcodes' ),
					  'desc' => __( 'Extra CSS class', 'psource-shortcodes' )
					 )
					),
					'content' => '<img src="http://lorempixel.com/g/400/200/" />',
					'desc' => __( 'Styled image frame', 'psource-shortcodes' ),
					'icon' => 'picture-o'
				),
				// row
				'row' => array(
					'name' => __( 'Columns', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'required_child' => 'column',
					'article' => 'http://docs.getshortcodes.com/article/44-row-column',
					'atts' => array(
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => array(
						'id'     => 'column',
						'number' => 2,
					),
					'desc' => __( 'Row for flexible columns', 'psource-shortcodes' ),
					'icon' => 'columns',
					'image' => $images_url . 'row.svg',
				),
				// column
				'column' => array(
					'name' => __( 'Column', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'required_parent' => 'row',
					'atts' => array(
						'size' => array(
							'type' => 'select',
							'values' => array(
								'1/1' => __( 'Full width', 'psource-shortcodes' ),
								'1/2' => __( 'One half', 'psource-shortcodes' ),
								'1/3' => __( 'One third', 'psource-shortcodes' ),
								'2/3' => __( 'Two third', 'psource-shortcodes' ),
								'1/4' => __( 'One fourth', 'psource-shortcodes' ),
								'3/4' => __( 'Three fourth', 'psource-shortcodes' ),
								'1/5' => __( 'One fifth', 'psource-shortcodes' ),
								'2/5' => __( 'Two fifth', 'psource-shortcodes' ),
								'3/5' => __( 'Three fifth', 'psource-shortcodes' ),
								'4/5' => __( 'Four fifth', 'psource-shortcodes' ),
								'1/6' => __( 'One sixth', 'psource-shortcodes' ),
								'5/6' => __( 'Five sixth', 'psource-shortcodes' )
							),
							'default' => '1/2',
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Select column width. This width will be calculated depend page width', 'psource-shortcodes' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'psource-shortcodes' ),
							'desc' => __( 'Is this column centered on the page', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Column content', 'psource-shortcodes' ),
					'desc' => __( 'Flexible and responsive columns', 'psource-shortcodes' ),
					'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'psource-shortcodes' ),
					'example' => 'columns',
					'icon' => 'columns',
					'image' => $images_url . 'column.svg',
				),
				// list
				'list' => array(
					'name' => __( 'List', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'psource-shortcodes' ),
							'desc' => __( 'You can upload custom icon for this list or pick a built-in icon', 'psource-shortcodes' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'psource-shortcodes' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'psource-shortcodes' ),
					'desc' => __( 'Styled unordered list', 'psource-shortcodes' ),
					'icon' => 'list-ol',
					'image' => $images_url . 'list.svg',
				),
				// button
				'button' => array(
					'name' => __( 'Button', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => get_option( 'home' ),
							'name' => __( 'Link', 'psource-shortcodes' ),
							'desc' => __( 'Button link', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'psource-shortcodes' ),
							'desc' => __( 'Button link target', 'psource-shortcodes' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'flat' => __( 'Flat', 'psource-shortcodes' ),
								'ghost' => __( 'Ghost', 'psource-shortcodes' ),
								'soft' => __( 'Soft', 'psource-shortcodes' ),
								'glass' => __( 'Glass', 'psource-shortcodes' ),
								'bubbles' => __( 'Bubbles', 'psource-shortcodes' ),
								'noise' => __( 'Noise', 'psource-shortcodes' ),
								'stroked' => __( 'Stroked', 'psource-shortcodes' ),
								'3d' => __( '3D', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ), 'desc' => __( 'Button background style preset', 'psource-shortcodes' )
						),
						'background' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#2D89EF',
							'name' => __( 'Background', 'psource-shortcodes' ), 'desc' => __( 'Button background color', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Text color', 'psource-shortcodes' ),
							'desc' => __( 'Button text color', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Button size', 'psource-shortcodes' )
						),
						'wide' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Fluid', 'psource-shortcodes' ), 'desc' => __( 'Fluid buttons has 100% width', 'psource-shortcodes' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'psource-shortcodes' ), 'desc' => __( 'Is button centered on the page', 'psource-shortcodes' )
						),
						'radius' => array(
							'type' => 'select',
							'values' => array(
								'auto' => __( 'Auto', 'psource-shortcodes' ),
								'round' => __( 'Round', 'psource-shortcodes' ),
								'0' => __( 'Square', 'psource-shortcodes' ),
								'5' => '5px',
								'10' => '10px',
								'20' => '20px'
							),
							'default' => 'auto',
							'name' => __( 'Radius', 'psource-shortcodes' ),
							'desc' => __( 'Radius of button corners. Auto-radius calculation based on button size', 'psource-shortcodes' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'psource-shortcodes' ),
							'desc' => __( 'You can upload custom icon for this button or pick a built-in icon', 'psource-shortcodes' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Icon color', 'psource-shortcodes' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'psource-shortcodes' )
						),
						'text_shadow' => array(
							'type' => 'shadow',
							'default' => 'none',
							'name' => __( 'Text shadow', 'psource-shortcodes' ),
							'desc' => __( 'Button text shadow', 'psource-shortcodes' )
						),
						'desc' => array(
							'default' => '',
							'name' => __( 'Description', 'psource-shortcodes' ),
							'desc' => __( 'Small description under button text. This option is incompatible with icon.', 'psource-shortcodes' )
						),
						'onclick' => array(
							'default' => '',
							'name' => __( 'onClick', 'psource-shortcodes' ),
							'desc' => __( 'Advanced JavaScript code for onClick action', 'psource-shortcodes' )
						),
						'rel' => array(
							'default' => '',
							'name' => __( 'Rel attribute', 'psource-shortcodes' ),
							'desc' => __( 'Here you can add value for the rel attribute.<br>Example values: <b%value>nofollow</b>, <b%value>lightbox</b>', 'psource-shortcodes' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title attribute', 'psource-shortcodes' ),
							'desc' => __( 'Here you can add value for the title attribute', 'psource-shortcodes' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Button ID', 'psource-shortcodes' ),
							'desc' => __( 'Custom value for the ID attribute', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Button text', 'psource-shortcodes' ),
					'desc' => __( 'Styled button', 'psource-shortcodes' ),
					'example' => 'buttons',
					'icon' => 'heart',
					'image' => $images_url . 'button.svg',
				),
				// service
				'service' => array(
					'name' => __( 'Service', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Service title', 'psource-shortcodes' ),
							'name' => __( 'Title', 'psource-shortcodes' ),
							'desc' => __( 'Service name', 'psource-shortcodes' )
						),
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'psource-shortcodes' ),
							'desc' => __( 'You can upload custom icon for this box', 'psource-shortcodes' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'psource-shortcodes' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 128,
							'step' => 2,
							'default' => 32,
							'name' => __( 'Icon size', 'psource-shortcodes' ),
							'desc' => __( 'Size of the uploaded icon in pixels', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Service description', 'psource-shortcodes' ),
					'desc' => __( 'Service box with title', 'psource-shortcodes' ),
					'icon' => 'check-square-o',
					'image' => $images_url . 'service.svg',
				),
				// box
				'box' => array(
					'name' => __( 'Box', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'values' => array( ),
							'default' => __( 'Box title', 'psource-shortcodes' ),
							'name' => __( 'Title', 'psource-shortcodes' ), 'desc' => __( 'Text for the box title', 'psource-shortcodes' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'soft' => __( 'Soft', 'psource-shortcodes' ),
								'glass' => __( 'Glass', 'psource-shortcodes' ),
								'bubbles' => __( 'Bubbles', 'psource-shortcodes' ),
								'noise' => __( 'Noise', 'psource-shortcodes' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Box style preset', 'psource-shortcodes' )
						),
						'box_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Color', 'psource-shortcodes' ),
							'desc' => __( 'Color for the box title and borders', 'psource-shortcodes' )
						),
						'title_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFFFF',
							'name' => __( 'Title text color', 'psource-shortcodes' ), 'desc' => __( 'Color for the box title text', 'psource-shortcodes' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'psource-shortcodes' ),
							'desc' => __( 'Box corners radius', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Box content', 'psource-shortcodes' ),
					'desc' => __( 'Colored box with caption', 'psource-shortcodes' ),
					'icon' => 'list-alt',
					'image' => $images_url . 'box.svg',
				),
				// note
				'note' => array(
					'name' => __( 'Note', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'note_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#FFFF66',
							'name' => __( 'Background', 'psource-shortcodes' ), 'desc' => __( 'Note background color', 'psource-shortcodes' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'psource-shortcodes' ),
							'desc' => __( 'Note text color', 'psource-shortcodes' )
						),
						'radius' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Radius', 'psource-shortcodes' ), 'desc' => __( 'Note corners radius', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Note text', 'psource-shortcodes' ),
					'desc' => __( 'Colored box', 'psource-shortcodes' ),
					'icon' => 'list-alt',
					'image' => $images_url . 'note.svg',
				),
				// expand
				'expand' => array(
					'name' => __( 'Expand', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'more_text' => array(
							'default' => __( 'Show more', 'psource-shortcodes' ),
							'name' => __( 'More text', 'psource-shortcodes' ),
							'desc' => __( 'Enter the text for more link', 'psource-shortcodes' )
						),
						'less_text' => array(
							'default' => __( 'Show less', 'psource-shortcodes' ),
							'name' => __( 'Less text', 'psource-shortcodes' ),
							'desc' => __( 'Enter the text for less link', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 100,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Height for collapsed state (in pixels)', 'psource-shortcodes' )
						),
						'hide_less' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Hide less link', 'psource-shortcodes' ),
							'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'psource-shortcodes' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'psource-shortcodes' ),
							'desc' => __( 'Pick the text color', 'psource-shortcodes' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#0088FF',
							'name' => __( 'Link color', 'psource-shortcodes' ),
							'desc' => __( 'Pick the link color', 'psource-shortcodes' )
						),
						'link_style' => array(
							'type' => 'select',
							'values' => array(
								'default'    => __( 'Default', 'psource-shortcodes' ),
								'underlined' => __( 'Underlined', 'psource-shortcodes' ),
								'dotted'     => __( 'Dotted', 'psource-shortcodes' ),
								'dashed'     => __( 'Dashed', 'psource-shortcodes' ),
								'button'     => __( 'Button', 'psource-shortcodes' ),
							),
							'default' => 'default',
							'name' => __( 'Link style', 'psource-shortcodes' ),
							'desc' => __( 'Select the style for more/less link', 'psource-shortcodes' )
						),
						'link_align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'psource-shortcodes' ),
								'center' => __( 'Center', 'psource-shortcodes' ),
								'right' => __( 'Right', 'psource-shortcodes' ),
							),
							'default' => 'left',
							'name' => __( 'Link align', 'psource-shortcodes' ),
							'desc' => __( 'Select link alignment', 'psource-shortcodes' )
						),
						'more_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'More icon', 'psource-shortcodes' ),
							'desc' => __( 'Add an icon to the more link', 'psource-shortcodes' )
						),
						'less_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Less icon', 'psource-shortcodes' ),
							'desc' => __( 'Add an icon to the less link', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'This text block can be expanded', 'psource-shortcodes' ),
					'desc' => __( 'Expandable text block', 'psource-shortcodes' ),
					'icon' => 'sort-amount-asc',
					'image' => $images_url . 'expand.svg',
				),
				// lightbox
				'lightbox' => array(
					'name' => __( 'Lightbox', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'possible_sibling' => 'lightbox_content',
					'article' => 'http://docs.getshortcodes.com/article/76-how-to-use-lightbox-shortcode',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'iframe' => __( 'Iframe', 'psource-shortcodes' ),
								'image' => __( 'Image', 'psource-shortcodes' ),
								'inline' => __( 'Inline (html content)', 'psource-shortcodes' )
							),
							'default' => 'iframe',
							'name' => __( 'Content type', 'psource-shortcodes' ),
							'desc' => __( 'Select type of the lightbox window content', 'psource-shortcodes' )
						),
						'src' => array(
							'default' => '',
							'name' => __( 'Content source', 'psource-shortcodes' ),
							'desc' => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Click here to open lightbox', 'psource-shortcodes' ),
					'desc' => __( 'Lightbox window with custom content', 'psource-shortcodes' ),
					'icon' => 'external-link',
					'image' => $images_url . 'lightbox.svg',
				),
				// lightbox content
				'lightbox_content' => array(
					'name' => __( 'Lightbox content', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'required_sibling' => 'lightbox',
					'article' => 'http://docs.getshortcodes.com/article/76-how-to-use-lightbox-shortcode',
					'atts' => array(
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'Enter here the ID from Content source field. %s Example value: %s', 'psource-shortcodes' ), '<br>', '<b%value>my-custom-popup</b>' )
						),
						'width' => array(
							'default' => '50%',
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'Adjust the width for inline content (in pixels or percents). %s Example values: %s, %s, %s', 'psource-shortcodes' ), '<br>', '<b%value>300px</b>', '<b%value>600px</b>', '<b%value>90%</b>' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Margin', 'psource-shortcodes' ),
							'desc' => __( 'Adjust the margin for inline content (in pixels)', 'psource-shortcodes' )
						),
						'padding' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Padding', 'psource-shortcodes' ),
							'desc' => __( 'Adjust the padding for inline content (in pixels)', 'psource-shortcodes' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'left'   => __( 'Left', 'psource-shortcodes' ),
								'center' => __( 'Center', 'psource-shortcodes' ),
								'right'  => __( 'Right', 'psource-shortcodes' )
							),
							'default' => 'center',
							'name' => __( 'Text alignment', 'psource-shortcodes' ),
							'desc' => __( 'Select the text alignment', 'psource-shortcodes' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Background color', 'psource-shortcodes' ),
							'desc' => __( 'Pick a background color', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'psource-shortcodes' ),
							'desc' => __( 'Pick a text color', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'psource-shortcodes' ),
							'desc' => __( 'Pick a text color', 'psource-shortcodes' )
						),
						'shadow' => array(
							'type' => 'shadow',
							'default' => '0px 0px 15px #333333',
							'name' => __( 'Shadow', 'psource-shortcodes' ),
							'desc' => __( 'Adjust the shadow for content box', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Inline content', 'psource-shortcodes' ),
					'desc' => __( 'Inline content for lightbox', 'psource-shortcodes' ),
					'icon' => 'external-link',
					'image' => $images_url . 'lightbox_content.svg',
				),
				// tooltip
				'tooltip' => array(
					'name' => __( 'Tooltip', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Basic: Light', 'psource-shortcodes' ),
								'dark' => __( 'Basic: Dark', 'psource-shortcodes' ),
								'yellow' => __( 'Basic: Yellow', 'psource-shortcodes' ),
								'green' => __( 'Basic: Green', 'psource-shortcodes' ),
								'red' => __( 'Basic: Red', 'psource-shortcodes' ),
								'blue' => __( 'Basic: Blue', 'psource-shortcodes' ),
								'youtube' => __( 'Youtube', 'psource-shortcodes' ),
								'tipsy' => __( 'Tipsy', 'psource-shortcodes' ),
								'bootstrap' => __( 'Bootstrap', 'psource-shortcodes' ),
								'jtools' => __( 'jTools', 'psource-shortcodes' ),
								'tipped' => __( 'Tipped', 'psource-shortcodes' ),
								'cluetip' => __( 'Cluetip', 'psource-shortcodes' ),
							),
							'default' => 'yellow',
							'name' => __( 'Style', 'psource-shortcodes' ),
							'desc' => __( 'Tooltip window style', 'psource-shortcodes' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'north' => __( 'Top', 'psource-shortcodes' ),
								'south' => __( 'Bottom', 'psource-shortcodes' ),
								'west' => __( 'Left', 'psource-shortcodes' ),
								'east' => __( 'Right', 'psource-shortcodes' )
							),
							'default' => 'top',
							'name' => __( 'Position', 'psource-shortcodes' ),
							'desc' => __( 'Tooltip position', 'psource-shortcodes' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'psource-shortcodes' ),
							'desc' => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'psource-shortcodes' )
						),
						'rounded' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Rounded corners', 'psource-shortcodes' ),
							'desc' => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'psource-shortcodes' ),
								'1' => 1,
								'2' => 2,
								'3' => 3,
								'4' => 4,
								'5' => 5,
								'6' => 6,
							),
							'default' => 'default',
							'name' => __( 'Font size', 'psource-shortcodes' ),
							'desc' => __( 'Tooltip font size', 'psource-shortcodes' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Tooltip title', 'psource-shortcodes' ),
							'desc' => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'psource-shortcodes' )
						),
						'content' => array(
							'default' => __( 'Tooltip text', 'psource-shortcodes' ),
							'name' => __( 'Tooltip content', 'psource-shortcodes' ),
							'desc' => __( 'Enter tooltip content here', 'psource-shortcodes' )
						),
						'behavior' => array(
							'type' => 'select',
							'values' => array(
								'hover' => __( 'Show and hide on mouse hover', 'psource-shortcodes' ),
								'click' => __( 'Show and hide by mouse click', 'psource-shortcodes' ),
								'always' => __( 'Always visible', 'psource-shortcodes' )
							),
							'default' => 'hover',
							'name' => __( 'Behavior', 'psource-shortcodes' ),
							'desc' => __( 'Select tooltip behavior', 'psource-shortcodes' )
						),
						'close' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Close button', 'psource-shortcodes' ),
							'desc' => __( 'Show close button', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Hover me to open tooltip', 'psource-shortcodes' ),
					'desc' => __( 'Tooltip window with custom content', 'psource-shortcodes' ),
					'icon' => 'comment-o',
					'image' => $images_url . 'tooltip.svg',
				),
				// private
				'private' => array(
					'name' => __( 'Private', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Private note text', 'psource-shortcodes' ),
					'desc' => __( 'Private note for post authors', 'psource-shortcodes' ),
					'icon' => 'lock',
					'image' => $images_url . 'private.svg',
				),
				// youtube
				'youtube' => array(
					'name' => __( 'YouTube', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Player height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Play video automatically when page is loaded', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'YouTube video', 'psource-shortcodes' ),
					'example' => 'media',
					'icon' => 'youtube-play',
					'image' => $images_url . 'youtube.svg',
				),
				// youtube_advanced
				'youtube_advanced' => array(
					'name' => __( 'YouTube advanced', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'psource-shortcodes' )
						),
						'playlist' => array(
							'default' => '',
							'name' => __( 'Playlist', 'psource-shortcodes' ),
							'desc' => __( 'Value is a comma-separated list of video IDs to play. If you specify a value, the first video that plays will be the VIDEO_ID specified in the URL path, and the videos specified in the playlist parameter will play thereafter', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Player height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'psource-shortcodes' )
						),
						'controls' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Hide controls', 'psource-shortcodes' ),
								'yes' => __( '1 - Show controls', 'psource-shortcodes' ),
								'alt' => __( '2 - Show controls when playback is started', 'psource-shortcodes' )
							),
							'default' => 'yes',
							'name' => __( 'Controls', 'psource-shortcodes' ),
							'desc' => __( 'This parameter indicates whether the video player controls will display', 'psource-shortcodes' )
						),
						'autohide' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Do not hide controls', 'psource-shortcodes' ),
								'yes' => __( '1 - Hide all controls on mouse out', 'psource-shortcodes' ),
								'alt' => __( '2 - Hide progress bar on mouse out', 'psource-shortcodes' )
							),
							'default' => 'alt',
							'name' => __( 'Autohide', 'psource-shortcodes' ),
							'desc' => __( 'This parameter indicates whether the video controls will automatically hide after a video begins playing', 'psource-shortcodes' )
						),
						'showinfo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show title bar', 'psource-shortcodes' ),
							'desc' => __( 'If you set the parameter value to NO, then the player will not display information like the video title and uploader before the video starts playing.', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Play video automatically when page is loaded', 'psource-shortcodes' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'psource-shortcodes' ),
							'desc' => __( 'Setting of YES will cause the player to play the initial video again and again', 'psource-shortcodes' )
						),
						'rel' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Related videos', 'psource-shortcodes' ),
							'desc' => __( 'This parameter indicates whether the player should show related videos when playback of the initial video ends', 'psource-shortcodes' )
						),
						'fs' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show full-screen button', 'psource-shortcodes' ),
							'desc' => __( 'Setting this parameter to NO prevents the fullscreen button from displaying', 'psource-shortcodes' )
						),
						'modestbranding' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => 'modestbranding',
							'desc' => __( 'This parameter lets you use a YouTube player that does not show a YouTube logo. Set the parameter value to YES to prevent the YouTube logo from displaying in the control bar. Note that a small YouTube text label will still display in the upper-right corner of a paused video when the user\'s mouse pointer hovers over the player', 'psource-shortcodes' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'dark' => __( 'Dark theme', 'psource-shortcodes' ),
								'light' => __( 'Light theme', 'psource-shortcodes' )
							),
							'default' => 'dark',
							'name' => __( 'Theme', 'psource-shortcodes' ),
							'desc' => __( 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar', 'psource-shortcodes' )
						),
						'https' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Force HTTPS', 'psource-shortcodes' ),
							'desc' => __( 'Use HTTPS in player iframe', 'psource-shortcodes' )
						),
						'wmode' => array(
							'default' => '',
							'name'    => __( 'WMode', 'psource-shortcodes' ),
							'desc'    => sprintf( __( 'Here you can specify wmode value for the embed URL. %s Example values: %s, %s', 'psource-shortcodes' ), '<br>', '<b%value>transparent</b>', '<b%value>opaque</b>' )
						),
						'playsinline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Plays inline', 'psource-shortcodes' ),
							'desc' => __( 'This parameter controls whether videos play inline or fullscreen in an HTML5 player on iOS', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'YouTube video player with advanced settings', 'psource-shortcodes' ),
					'example' => 'media',
					'icon' => 'youtube-play',
					'image' => $images_url . 'youtube_advanced.svg',
				),
				// vimeo
				'vimeo' => array(
					'name' => __( 'Vimeo', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ), 'desc' => __( 'Url of Vimeo page with video', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Player height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Play video automatically when page is loaded', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Vimeo video', 'psource-shortcodes' ),
					'example' => 'media',
					'icon' => 'youtube-play',
					'image' => $images_url . 'vimeo.svg',
				),
				// screenr
				'screenr' => array(
					'deprecated' => true,
					'name' => __( 'Screenr', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
					 'url' => array(
					  'default' => '',
					  'name' => __( 'Url', 'psource-shortcodes' ),
					  'desc' => __( 'Url of Screenr page with video', 'psource-shortcodes' )
					 ),
					 'width' => array(
					  'type' => 'slider',
					  'min' => 200,
					  'max' => 1600,
					  'step' => 20,
					  'default' => 600,
					  'name' => __( 'Width', 'psource-shortcodes' ),
					  'desc' => __( 'Player width', 'psource-shortcodes' )
					 ),
					 'height' => array(
					  'type' => 'slider',
					  'min' => 200,
					  'max' => 1600,
					  'step' => 20,
					  'default' => 400,
					  'name' => __( 'Height', 'psource-shortcodes' ),
					  'desc' => __( 'Player height', 'psource-shortcodes' )
					 ),
					 'responsive' => array(
					  'type' => 'bool',
					  'default' => 'yes',
					  'name' => __( 'Responsive', 'psource-shortcodes' ),
					  'desc' => __( 'Ignore width and height parameters and make player responsive', 'psource-shortcodes' )
					 ),
					 'class' => array(
					  'default' => '',
					  'name' => __( 'Class', 'psource-shortcodes' ),
					  'desc' => __( 'Extra CSS class', 'psource-shortcodes' )
					 )
					),
					'desc' => __( 'Screenr video', 'psource-shortcodes' ),
					'icon' => 'youtube-play'
				),
				// dailymotion
				'dailymotion' => array(
					'name' => __( 'Dailymotion', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ),
							'desc' => __( 'Url of Dailymotion page with video', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Player height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'psource-shortcodes' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFC300',
							'name' => __( 'Background color', 'psource-shortcodes' ),
							'desc' => __( 'HTML color of the background of controls elements', 'psource-shortcodes' )
						),
						'foreground' => array(
							'type' => 'color',
							'default' => '#F7FFFD',
							'name' => __( 'Foreground color', 'psource-shortcodes' ),
							'desc' => __( 'HTML color of the foreground of controls elements', 'psource-shortcodes' )
						),
						'highlight' => array(
							'type' => 'color',
							'default' => '#171D1B',
							'name' => __( 'Highlight color', 'psource-shortcodes' ),
							'desc' => __( 'HTML color of the controls elements\' highlights', 'psource-shortcodes' )
						),
						'logo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show logo', 'psource-shortcodes' ),
							'desc' => __( 'Allows to hide or show the Dailymotion logo', 'psource-shortcodes' )
						),
						'quality' => array(
							'type' => 'select',
							'values' => array(
								'240'  => '240',
								'380'  => '380',
								'480'  => '480',
								'720'  => '720',
								'1080' => '1080'
							),
							'default' => '380',
							'name' => __( 'Quality', 'psource-shortcodes' ),
							'desc' => __( 'Determines the quality that must be played by default if available', 'psource-shortcodes' )
						),
						'related' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show related videos', 'psource-shortcodes' ),
							'desc' => __( 'Show related videos at the end of the video', 'psource-shortcodes' )
						),
						'info' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show video info', 'psource-shortcodes' ),
							'desc' => __( 'Show videos info (title/author) on the start screen', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Dailymotion video', 'psource-shortcodes' ),
					'icon' => 'youtube-play',
					'image' => $images_url . 'dailymotion.svg',
				),
				// audio
				'audio' => array(
					'name' => __( 'Audio', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'psource-shortcodes' ),
							'desc' => __( 'Audio file url. Supported formats: mp3, ogg', 'psource-shortcodes' )
						),
						'width' => array(
							'values' => array(),
							'default' => '100%',
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width. You can specify width in percents and player will be responsive. Example values: <b%value>200px</b>, <b%value>100&#37;</b>', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Play file automatically when page is loaded', 'psource-shortcodes' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'psource-shortcodes' ),
							'desc' => __( 'Repeat when playback is ended', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Custom audio player', 'psource-shortcodes' ),
					'example' => 'media',
					'icon' => 'play-circle',
					'image' => $images_url . 'audio.svg',
				),
				// video
				'video' => array(
					'name' => __( 'Video', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'psource-shortcodes' ),
							'desc' => __( 'Url to mp4/flv video-file', 'psource-shortcodes' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'psource-shortcodes' ),
							'desc' => __( 'Url to poster image, that will be shown before playback', 'psource-shortcodes' )
						),
						'title' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Title', 'psource-shortcodes' ),
							'desc' => __( 'Player title', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Player width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Player height', 'psource-shortcodes' )
						),
						'controls' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Controls', 'psource-shortcodes' ),
							'desc' => __( 'Show player controls (play/pause etc.) or not', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Play file automatically when page is loaded', 'psource-shortcodes' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'psource-shortcodes' ),
							'desc' => __( 'Repeat when playback is ended', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Custom video player', 'psource-shortcodes' ),
					'example' => 'media',
					'icon' => 'play-circle',
					'image' => $images_url . 'video.svg',
				),
				// table
				'table' => array(
					'name' => __( 'Table', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'CSV file', 'psource-shortcodes' ),
							'desc' => __( 'Upload CSV file if you want to create HTML-table from file', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Add horizontal scrollbar if table width larger than page width', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( "<table>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'psource-shortcodes' ),
					'desc' => __( 'Styled table from HTML or CSV file', 'psource-shortcodes' ),
					'icon' => 'table',
					'image' => $images_url . 'table.svg',
				),
				// permalink
				'permalink' => array(
					'name' => __( 'Permalink', 'psource-shortcodes' ),
					'type' => 'mixed',
					'group' => 'content other',
					'atts' => array(
						'id' => array(
							'values' => array( ), 'default' => 1,
							'name' => __( 'ID', 'psource-shortcodes' ),
							'desc' => __( 'Post or page ID', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'psource-shortcodes' ),
							'desc' => __( 'Link target', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => '',
					'desc' => __( 'Permalink to specified post/page', 'psource-shortcodes' ),
					'icon' => 'link',
					'image' => $images_url . 'permalink.svg',
				),
				// members
				'members' => array(
					'name' => __( 'Members', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'message' => array(
							'default' => __( 'This content is for registered users only. Please %login%.', 'psource-shortcodes' ),
							'name' => __( 'Message', 'psource-shortcodes' ), 'desc' => __( 'Message for not logged users', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffcc00',
							'name' => __( 'Box color', 'psource-shortcodes' ), 'desc' => __( 'This color will applied only to box for not logged users', 'psource-shortcodes' )
						),
						'login_text' => array(
							'default' => __( 'login', 'psource-shortcodes' ),
							'name' => __( 'Login link text', 'psource-shortcodes' ), 'desc' => __( 'Text for the login link', 'psource-shortcodes' )
						),
						'login_url' => array(
							'default' => wp_login_url(),
							'name' => __( 'Login link url', 'psource-shortcodes' ), 'desc' => __( 'Login link url', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Content for logged members', 'psource-shortcodes' ),
					'desc' => __( 'Content for logged in members only', 'psource-shortcodes' ),
					'icon' => 'lock',
					'image' => $images_url . 'members.svg',
				),
				// guests
				'guests' => array(
					'name' => __( 'Guests', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'This content will be available only for non-logged visitors', 'psource-shortcodes' ),
					'desc' => __( 'Content for guests only', 'psource-shortcodes' ),
					'icon' => 'user',
					'image' => $images_url . 'guests.svg',
				),
				// feed
				'feed' => array(
					'name' => __( 'RSS feed', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ),
							'desc' => __( 'Url to RSS-feed', 'psource-shortcodes' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Limit', 'psource-shortcodes' ), 'desc' => __( 'Number of items to show', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Feed grabber', 'psource-shortcodes' ),
					'icon' => 'rss',
					'image' => $images_url . 'feed.svg',
				),
				// menu
				'menu' => array(
					'name' => __( 'Menu', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Menu name', 'psource-shortcodes' ), 'desc' => __( 'Custom menu name. Ex: Main menu', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Custom menu by name', 'psource-shortcodes' ),
					'icon' => 'bars',
					'image' => $images_url . 'menu.svg',
				),
				// subpages
				'subpages' => array(
					'name' => __( 'Sub pages', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3, 4, 5 ), 'default' => 1,
							'name' => __( 'Depth', 'psource-shortcodes' ),
							'desc' => __( 'Max depth level of children pages', 'psource-shortcodes' )
						),
						'p' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Parent ID', 'psource-shortcodes' ),
							'desc' => __( 'ID of the parent page. Leave blank to use current page', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'List of sub pages', 'psource-shortcodes' ),
					'icon' => 'bars',
					'image' => $images_url . 'subpages.svg',
				),
				// siblings
				'siblings' => array(
					'name' => __( 'Siblings', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'depth' => array(
							'type' => 'select',
							'values' => array( 1, 2, 3 ), 'default' => 1,
							'name' => __( 'Depth', 'psource-shortcodes' ),
							'desc' => __( 'Max depth level', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'List of cureent page siblings', 'psource-shortcodes' ),
					'icon' => 'bars',
					'image' => $images_url . 'siblings.svg',
				),
				// document
				'document' => array(
					'name' => __( 'Document', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Url', 'psource-shortcodes' ),
							'desc' => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Viewer width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Viewer height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make viewer responsive', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Document viewer by Google', 'psource-shortcodes' ),
					'icon' => 'file-text',
					'image' => $images_url . 'document.svg',
				),
				// gmap
				'gmap' => array(
					'name' => __( 'Google map', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Map width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Map height', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make map responsive', 'psource-shortcodes' )
						),
						'address' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Marker', 'psource-shortcodes' ),
							'desc' => __( 'Address for the marker. You can type it in any language', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Maps by Google', 'psource-shortcodes' ),
					'icon' => 'globe',
					'image' => $images_url . 'gmap.svg',
				),
				// slider
				'slider' => array(
					'name' => __( 'Slider', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'psource-shortcodes' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'psource-shortcodes' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'psource-shortcodes' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'psource-shortcodes' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'psource-shortcodes' ),
								'image'      => __( 'Full-size image', 'psource-shortcodes' ),
								'lightbox'   => __( 'Lightbox', 'psource-shortcodes' ),
								'custom'     => __( 'Slide link (added in media editor)', 'psource-shortcodes' ),
								'attachment' => __( 'Attachment page', 'psource-shortcodes' ),
								'post'       => __( 'Post permalink', 'psource-shortcodes' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'psource-shortcodes' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'psource-shortcodes' ),
							'desc' => __( 'Open links in', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ), 'desc' => __( 'Slider width (in pixels)', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'psource-shortcodes' ), 'desc' => __( 'Slider height (in pixels)', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make slider responsive', 'psource-shortcodes' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'psource-shortcodes' ), 'desc' => __( 'Display slide titles', 'psource-shortcodes' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'psource-shortcodes' ), 'desc' => __( 'Is slider centered on the page', 'psource-shortcodes' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'psource-shortcodes' ), 'desc' => __( 'Show left and right arrows', 'psource-shortcodes' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Pagination', 'psource-shortcodes' ),
							'desc' => __( 'Show pagination', 'psource-shortcodes' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'psource-shortcodes' ),
							'desc' => __( 'Allow to change slides with mouse wheel', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Choose interval between slide animations. Set to 0 to disable autoplay', 'psource-shortcodes' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'psource-shortcodes' ), 'desc' => __( 'Specify animation speed', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Customizable image slider', 'psource-shortcodes' ),
					'icon' => 'picture-o',
					'image' => $images_url . 'slider.svg',
				),
				// carousel
				'carousel' => array(
					'name' => __( 'Carousel', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'psource-shortcodes' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'psource-shortcodes' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'psource-shortcodes' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'psource-shortcodes' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'psource-shortcodes' ),
								'image'      => __( 'Full-size image', 'psource-shortcodes' ),
								'lightbox'   => __( 'Lightbox', 'psource-shortcodes' ),
								'custom'     => __( 'Slide link (added in media editor)', 'psource-shortcodes' ),
								'attachment' => __( 'Attachment page', 'psource-shortcodes' ),
								'post'       => __( 'Post permalink', 'psource-shortcodes' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'psource-shortcodes' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'psource-shortcodes' ),
							'desc' => __( 'Open links in', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 100,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Carousel width (in pixels)', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 20,
							'max' => 1600,
							'step' => 20,
							'default' => 100,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Carousel height (in pixels)', 'psource-shortcodes' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'psource-shortcodes' ),
							'desc' => __( 'Ignore width and height parameters and make carousel responsive', 'psource-shortcodes' )
						),
						'items' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Items to show', 'psource-shortcodes' ),
							'desc' => __( 'How much carousel items is visible', 'psource-shortcodes' )
						),
						'scroll' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 20,
							'step' => 1, 'default' => 1,
							'name' => __( 'Scroll number', 'psource-shortcodes' ),
							'desc' => __( 'How much items are scrolled in one transition', 'psource-shortcodes' )
						),
						'title' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show titles', 'psource-shortcodes' ), 'desc' => __( 'Display titles for each item', 'psource-shortcodes' )
						),
						'centered' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Center', 'psource-shortcodes' ), 'desc' => __( 'Is carousel centered on the page', 'psource-shortcodes' )
						),
						'arrows' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Arrows', 'psource-shortcodes' ), 'desc' => __( 'Show left and right arrows', 'psource-shortcodes' )
						),
						'pages' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Pagination', 'psource-shortcodes' ),
							'desc' => __( 'Show pagination', 'psource-shortcodes' )
						),
						'mousewheel' => array(
							'type' => 'bool',
							'default' => 'yes', 'name' => __( 'Mouse wheel control', 'psource-shortcodes' ),
							'desc' => __( 'Allow to rotate carousel with mouse wheel', 'psource-shortcodes' )
						),
						'autoplay' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 100000,
							'step' => 100,
							'default' => 5000,
							'name' => __( 'Autoplay', 'psource-shortcodes' ),
							'desc' => __( 'Choose interval between auto animations. Set to 0 to disable autoplay', 'psource-shortcodes' )
						),
						'speed' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 20000,
							'step' => 100,
							'default' => 600,
							'name' => __( 'Speed', 'psource-shortcodes' ), 'desc' => __( 'Specify animation speed', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Customizable image carousel', 'psource-shortcodes' ),
					'icon' => 'picture-o',
					'image' => $images_url . 'carousel.svg',
				),
				// custom_gallery
				'custom_gallery' => array(
					'name' => __( 'Gallery', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'gallery',
					'atts' => array(
						'source' => array(
							'type'    => 'image_source',
							'default' => 'none',
							'name'    => __( 'Source', 'psource-shortcodes' ),
							'desc'    => __( 'Choose images source. You can use images from Media library or retrieve it from posts (thumbnails) posted under specified blog category. You can also pick any custom taxonomy', 'psource-shortcodes' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => -1,
							'max' => 100,
							'step' => 1,
							'default' => 20,
							'name' => __( 'Limit', 'psource-shortcodes' ),
							'desc' => __( 'Maximum number of image source posts (for recent posts, category and custom taxonomy)', 'psource-shortcodes' )
						),
						'link' => array(
							'type' => 'select',
							'values' => array(
								'none'       => __( 'None', 'psource-shortcodes' ),
								'image'      => __( 'Full-size image', 'psource-shortcodes' ),
								'lightbox'   => __( 'Lightbox', 'psource-shortcodes' ),
								'custom'     => __( 'Slide link (added in media editor)', 'psource-shortcodes' ),
								'attachment' => __( 'Attachment page', 'psource-shortcodes' ),
								'post'       => __( 'Post permalink', 'psource-shortcodes' )
							),
							'default' => 'none',
							'name' => __( 'Links', 'psource-shortcodes' ),
							'desc' => __( 'Select which links will be used for images in this gallery', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' )
							),
							'default' => 'self',
							'name' => __( 'Links target', 'psource-shortcodes' ),
							'desc' => __( 'Open links in', 'psource-shortcodes' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Width', 'psource-shortcodes' ), 'desc' => __( 'Single item width (in pixels)', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 90,
							'name' => __( 'Height', 'psource-shortcodes' ), 'desc' => __( 'Single item height (in pixels)', 'psource-shortcodes' )
						),
						'title' => array(
							'type' => 'select',
							'values' => array(
								'never' => __( 'Never', 'psource-shortcodes' ),
								'hover' => __( 'On mouse over', 'psource-shortcodes' ),
								'always' => __( 'Always', 'psource-shortcodes' )
							),
							'default' => 'hover',
							'name' => __( 'Show titles', 'psource-shortcodes' ),
							'desc' => __( 'Title display mode', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Customizable image gallery', 'psource-shortcodes' ),
					'icon' => 'picture-o',
					'image' => $images_url . 'custom_gallery.svg',
				),
				// posts
				'posts' => array(
					'name' => __( 'Posts', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'other',
					'article' => 'http://docs.getshortcodes.com/article/43-posts',
					'atts' => array(
						'template' => array(
							'default' => 'templates/default-loop.php', 'name' => __( 'Template', 'psource-shortcodes' ),
							'desc' => __( 'Relative path to the template file. Default templates placed in the plugin directory (templates folder). You can copy them under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/default-loop.php</b> - posts loop<br/><b%value>templates/teaser-loop.php</b> - posts loop with thumbnail and title<br/><b%value>templates/single-post.php</b> - single post template<br/><b%value>templates/list-loop.php</b> - unordered list with posts titles', 'psource-shortcodes' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'psource-shortcodes' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'psource-shortcodes' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'psource-shortcodes' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'psource-shortcodes' )
						),
						'post_type' => array(
							'type' => 'post_type',
							'multiple' => true,
							'values' => array(),
							'default' => 'post',
							'name' => __( 'Post types', 'psource-shortcodes' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'psource-shortcodes' )
						),
						'taxonomy' => array(
							'type' => 'taxonomy',
							'values' => array(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'psource-shortcodes' ),
							'desc' => __( 'Select taxonomy to show posts from', 'psource-shortcodes' )
						),
						'tax_term' => array(
							'type' => 'term',
							'multiple' => true,
							'values' => array(),
							'default' => '',
							'name' => __( 'Terms', 'psource-shortcodes' ),
							'desc' => __( 'Select terms to show posts from', 'psource-shortcodes' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array(
									'IN'     => __( 'IN - posts that have any of selected categories terms', 'psource-shortcodes' ),
									'NOT IN' => __( 'NOT IN - posts that is does not have any of selected terms', 'psource-shortcodes' ),
									'AND'    => __( 'AND - posts that have all selected terms', 'psource-shortcodes' ),
							),
							'default' => 'IN',
							'name' => __( 'Taxonomy term operator', 'psource-shortcodes' ),
							'desc' => __( 'Operator to test', 'psource-shortcodes' )
						),
						// 'author' => array(
						//  'type' => 'select',
						//  'multiple' => true,
						//  'values' => Su_Tools::get_users(),
						//  'default' => 'default',
						//  'name' => __( 'Authors', 'psource-shortcodes' ),
						//  'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'psource-shortcodes' )
						// ),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'psource-shortcodes' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'psource-shortcodes' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'psource-shortcodes' ),
							'desc' => __( 'Enter meta key name to show posts that have this key', 'psource-shortcodes' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'psource-shortcodes' ),
							'desc' => __( 'Specify offset to start posts loop not from first post', 'psource-shortcodes' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'psource-shortcodes' ),
								'asc' => __( 'Ascending', 'psource-shortcodes' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'psource-shortcodes' ),
							'desc' => __( 'Posts order', 'psource-shortcodes' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'psource-shortcodes' ),
								'id' => __( 'Post ID', 'psource-shortcodes' ),
								'author' => __( 'Post author', 'psource-shortcodes' ),
								'title' => __( 'Post title', 'psource-shortcodes' ),
								'name' => __( 'Post slug', 'psource-shortcodes' ),
								'date' => __( 'Date', 'psource-shortcodes' ), 'modified' => __( 'Last modified date', 'psource-shortcodes' ),
								'parent' => __( 'Post parent', 'psource-shortcodes' ),
								'rand' => __( 'Random', 'psource-shortcodes' ), 'comment_count' => __( 'Comments number', 'psource-shortcodes' ),
								'menu_order' => __( 'Menu order', 'psource-shortcodes' ), 'meta_value' => __( 'Meta key values', 'psource-shortcodes' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'psource-shortcodes' ),
							'desc' => __( 'Order posts by', 'psource-shortcodes' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Post parent', 'psource-shortcodes' ),
							'desc' => __( 'Show childrens of entered post (enter post ID)', 'psource-shortcodes' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'psource-shortcodes' ),
								'pending' => __( 'Pending', 'psource-shortcodes' ),
								'draft' => __( 'Draft', 'psource-shortcodes' ),
								'auto-draft' => __( 'Auto-draft', 'psource-shortcodes' ),
								'future' => __( 'Future post', 'psource-shortcodes' ),
								'private' => __( 'Private post', 'psource-shortcodes' ),
								'inherit' => __( 'Inherit', 'psource-shortcodes' ),
								'trash' => __( 'Trashed', 'psource-shortcodes' ),
								'any' => __( 'Any', 'psource-shortcodes' ),
							),
							'default' => 'publish',
							'name' => __( 'Post status', 'psource-shortcodes' ),
							'desc' => __( 'Show only posts with selected status', 'psource-shortcodes' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'psource-shortcodes' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'psource-shortcodes' )
						)
					),
					'desc' => __( 'Custom posts query with customizable template', 'psource-shortcodes' ),
					'icon' => 'th-list',
					'image' => $images_url . 'posts.svg',
				),
				// dummy_text
				'dummy_text' => array(
					'name' => __( 'Dummy text', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'what' => array(
							'type' => 'select',
							'values' => array(
								'paras' => __( 'Paragraphs', 'psource-shortcodes' ),
								'words' => __( 'Words', 'psource-shortcodes' ),
								'bytes' => __( 'Bytes', 'psource-shortcodes' ),
							),
							'default' => 'paras',
							'name' => __( 'What', 'psource-shortcodes' ),
							'desc' => __( 'What to generate', 'psource-shortcodes' )
						),
						'amount' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Amount', 'psource-shortcodes' ),
							'desc' => __( 'How many items (paragraphs or words) to generate. Minimum words amount is 5', 'psource-shortcodes' )
						),
						'cache' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Cache', 'psource-shortcodes' ),
							'desc' => __( 'Generated text will be cached. Be careful with this option. If you disable it and insert many dummy_text shortcodes the page load time will be highly increased', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Text placeholder', 'psource-shortcodes' ),
					'icon' => 'text-height',
					'image' => $images_url . 'dummy_text.svg',
				),
				// dummy_image
				'dummy_image' => array(
					'name' => __( 'Dummy image', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 500,
							'name' => __( 'Width', 'psource-shortcodes' ),
							'desc' => __( 'Image width', 'psource-shortcodes' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1600,
							'step' => 10,
							'default' => 300,
							'name' => __( 'Height', 'psource-shortcodes' ),
							'desc' => __( 'Image height', 'psource-shortcodes' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'any'       => __( 'Any', 'psource-shortcodes' ),
								'abstract'  => __( 'Abstract', 'psource-shortcodes' ),
								'animals'   => __( 'Animals', 'psource-shortcodes' ),
								'business'  => __( 'Business', 'psource-shortcodes' ),
								'cats'      => __( 'Cats', 'psource-shortcodes' ),
								'city'      => __( 'City', 'psource-shortcodes' ),
								'food'      => __( 'Food', 'psource-shortcodes' ),
								'nightlife' => __( 'Night life', 'psource-shortcodes' ),
								'fashion'   => __( 'Fashion', 'psource-shortcodes' ),
								'people'    => __( 'People', 'psource-shortcodes' ),
								'nature'    => __( 'Nature', 'psource-shortcodes' ),
								'sports'    => __( 'Sports', 'psource-shortcodes' ),
								'technics'  => __( 'Technics', 'psource-shortcodes' ),
								'transport' => __( 'Transport', 'psource-shortcodes' )
							),
							'default' => 'any',
							'name' => __( 'Theme', 'psource-shortcodes' ),
							'desc' => __( 'Select the theme for this image', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Image placeholder with random image', 'psource-shortcodes' ),
					'icon' => 'picture-o',
					'image' => $images_url . 'dummy_image.svg',
				),
				// animate
				'animate' => array(
					'name' => __( 'Animation', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'psource-shortcodes' ),
							'desc' => __( 'Select animation type', 'psource-shortcodes' )
						),
						'duration' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 1,
							'name' => __( 'Duration', 'psource-shortcodes' ),
							'desc' => __( 'Animation duration (seconds)', 'psource-shortcodes' )
						),
						'delay' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 0,
							'name' => __( 'Delay', 'psource-shortcodes' ),
							'desc' => __( 'Animation delay (seconds)', 'psource-shortcodes' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'psource-shortcodes' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'content' => __( 'Animated content', 'psource-shortcodes' ),
					'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'psource-shortcodes' ),
					'example' => 'animations',
					'icon' => 'bolt',
					'image' => $images_url . 'animate.svg',
				),
				// meta
				'meta' => array(
					'name' => __( 'Meta data', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'key' => array(
							'default' => '',
							'name' => __( 'Key', 'psource-shortcodes' ),
							'desc' => __( 'Meta key name', 'psource-shortcodes' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'psource-shortcodes' ),
							'desc' => __( 'This text will be shown if data is not found', 'psource-shortcodes' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown before the value', 'psource-shortcodes' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown after the value', 'psource-shortcodes' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'psource-shortcodes' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'psource-shortcodes' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'psource-shortcodes' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Name of your function must include word <b>filter</b>. Example function: ', 'psource-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post meta', 'psource-shortcodes' ),
					'icon' => 'info-circle',
					'image' => $images_url . 'meta.svg',
				),
				// user
				'user' => array(
					'name' => __( 'User data', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'display_name'        => __( 'Display name', 'psource-shortcodes' ),
								'ID'                  => __( 'ID', 'psource-shortcodes' ),
								'user_login'          => __( 'Login', 'psource-shortcodes' ),
								'user_nicename'       => __( 'Nice name', 'psource-shortcodes' ),
								'user_email'          => __( 'Email', 'psource-shortcodes' ),
								'user_url'            => __( 'URL', 'psource-shortcodes' ),
								'user_registered'     => __( 'Registered', 'psource-shortcodes' ),
								'user_activation_key' => __( 'Activation key', 'psource-shortcodes' ),
								'user_status'         => __( 'Status', 'psource-shortcodes' )
							),
							'default' => 'display_name',
							'name' => __( 'Field', 'psource-shortcodes' ),
							'desc' => __( 'User data field name', 'psource-shortcodes' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'psource-shortcodes' ),
							'desc' => __( 'This text will be shown if data is not found', 'psource-shortcodes' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown before the value', 'psource-shortcodes' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown after the value', 'psource-shortcodes' )
						),
						'user_id' => array(
							'default' => '',
							'name' => __( 'User ID', 'psource-shortcodes' ),
							'desc' => __( 'You can specify custom user ID. Leave this field empty to use an ID of the current user', 'psource-shortcodes' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'psource-shortcodes' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Name of your function must include word <b>filter</b>. Example function: ', 'psource-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'User data', 'psource-shortcodes' ),
					'icon' => 'info-circle',
					'image' => $images_url . 'user.svg',
				),
				// post
				'post' => array(
					'name' => __( 'Post data', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'data',
					'atts' => array(
						'field' => array(
							'type' => 'select',
							'values' => array(
								'ID'                    => __( 'Post ID', 'psource-shortcodes' ),
								'post_author'           => __( 'Post author', 'psource-shortcodes' ),
								'post_date'             => __( 'Post date', 'psource-shortcodes' ),
								'post_date_gmt'         => __( 'Post date', 'psource-shortcodes' ) . ' GMT',
								'post_content'          => __( 'Post content', 'psource-shortcodes' ),
								'post_title'            => __( 'Post title', 'psource-shortcodes' ),
								'post_excerpt'          => __( 'Post excerpt', 'psource-shortcodes' ),
								'post_status'           => __( 'Post status', 'psource-shortcodes' ),
								'comment_status'        => __( 'Comment status', 'psource-shortcodes' ),
								'ping_status'           => __( 'Ping status', 'psource-shortcodes' ),
								'post_name'             => __( 'Post name', 'psource-shortcodes' ),
								'post_modified'         => __( 'Post modified', 'psource-shortcodes' ),
								'post_modified_gmt'     => __( 'Post modified', 'psource-shortcodes' ) . ' GMT',
								'post_content_filtered' => __( 'Filtered post content', 'psource-shortcodes' ),
								'post_parent'           => __( 'Post parent', 'psource-shortcodes' ),
								'guid'                  => __( 'GUID', 'psource-shortcodes' ),
								'menu_order'            => __( 'Menu order', 'psource-shortcodes' ),
								'post_type'             => __( 'Post type', 'psource-shortcodes' ),
								'post_mime_type'        => __( 'Post mime type', 'psource-shortcodes' ),
								'comment_count'         => __( 'Comment count', 'psource-shortcodes' )
							),
							'default' => 'post_title',
							'name' => __( 'Field', 'psource-shortcodes' ),
							'desc' => __( 'Post data field name', 'psource-shortcodes' )
						),
						'default' => array(
							'default' => '',
							'name' => __( 'Default', 'psource-shortcodes' ),
							'desc' => __( 'This text will be shown if data is not found', 'psource-shortcodes' )
						),
						'before' => array(
							'default' => '',
							'name' => __( 'Before', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown before the value', 'psource-shortcodes' )
						),
						'after' => array(
							'default' => '',
							'name' => __( 'After', 'psource-shortcodes' ),
							'desc' => __( 'This content will be shown after the value', 'psource-shortcodes' )
						),
						'post_id' => array(
							'default' => '',
							'name' => __( 'Post ID', 'psource-shortcodes' ),
							'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'psource-shortcodes' )
						),
						'filter' => array(
							'default' => '',
							'name' => __( 'Filter', 'psource-shortcodes' ),
							'desc' => __( 'You can apply custom filter to the retrieved value. Enter here function name. Your function must accept one argument and return modified value. Name of your function must include word <b>filter</b>. Example function: ', 'psource-shortcodes' ) . "<br /><pre><code style='display:block;padding:5px'>function my_custom_filter( \$value ) {\n\treturn 'Value is: ' . \$value;\n}</code></pre>"
						)
					),
					'desc' => __( 'Post data', 'psource-shortcodes' ),
					'icon' => 'info-circle',
					'image' => $images_url . 'post.svg',
				),
				// post_terms
				// 'post_terms' => array(
				//  'name' => __( 'Post terms', 'psource-shortcodes' ),
				//  'type' => 'single',
				//  'group' => 'data',
				//  'atts' => array(
				//   'post_id' => array(
				//    'default' => '',
				//    'name' => __( 'Post ID', 'psource-shortcodes' ),
				//    'desc' => __( 'You can specify custom post ID. Leave this field empty to use an ID of the current post. Current post ID may not work in Live Preview mode', 'psource-shortcodes' )
				//   ),
				//   'links' => array(
				//    'type' => 'bool',
				//    'default' => 'yes',
				//    'name' => __( 'Show links', 'psource-shortcodes' ),
				//    'desc' => __( 'Show terms names as hyperlinks', 'psource-shortcodes' )
				//   ),
				//   'format' => array(
				//    'type' => 'select',
				//    'values' => array(
				//     'text' => __( 'Terms separated by commas', 'psource-shortcodes' ),
				//     'br' => __( 'Terms separated by new lines', 'psource-shortcodes' ),
				//     'ul' => __( 'Unordered list', 'psource-shortcodes' ),
				//     'ol' => __( 'Ordered list', 'psource-shortcodes' ),
				//    ),
				//    'default' => 'text',
				//    'name' => __( 'Format', 'psource-shortcodes' ),
				//    'desc' => __( 'Choose how to output the terms', 'psource-shortcodes' )
				//   ),
				//  ),
				//  'desc' => __( 'Terms list', 'psource-shortcodes' ),
				//  'icon' => 'info-circle'
				// ),
				// template
				'template' => array(
					'name' => __( 'Template', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'name' => array(
							'default' => '',
							'name' => __( 'Template name', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'Use template file name (with optional .php extension). If you need to use templates from theme sub-folder, use relative path. Example values: %s, %s, %s', 'psource-shortcodes' ), '<b%value>page</b>', '<b%value>page.php</b>', '<b%value>includes/page.php</b>' )
						)
					),
					'desc' => __( 'Theme template', 'psource-shortcodes' ),
					'icon' => 'puzzle-piece',
					'image' => $images_url . 'template.svg',
				),
				// qrcode
				'qrcode' => array(
					'name' => __( 'QR code', 'psource-shortcodes' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'data' => array(
							'default' => '',
							'name' => __( 'Data', 'psource-shortcodes' ),
							'desc' => __( 'The text to store within the QR code. You can use here any text or even URL', 'psource-shortcodes' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'psource-shortcodes' ),
							'desc' => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'psource-shortcodes' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1000,
							'step' => 10,
							'default' => 200,
							'name' => __( 'Size', 'psource-shortcodes' ),
							'desc' => __( 'Image width and height (in pixels)', 'psource-shortcodes' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 5,
							'default' => 0,
							'name' => __( 'Margin', 'psource-shortcodes' ),
							'desc' => __( 'Thickness of a margin (in pixels)', 'psource-shortcodes' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'psource-shortcodes' ),
								'left' => __( 'Left', 'psource-shortcodes' ),
								'center' => __( 'Center', 'psource-shortcodes' ),
								'right' => __( 'Right', 'psource-shortcodes' ),
							),
							'default' => 'none',
							'name' => __( 'Align', 'psource-shortcodes' ),
							'desc' => __( 'Choose image alignment', 'psource-shortcodes' )
						),
						'link' => array(
							'default' => '',
							'name' => __( 'Link', 'psource-shortcodes' ),
							'desc' => __( 'You can make this QR code clickable. Enter here the URL', 'psource-shortcodes' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open in same tab', 'psource-shortcodes' ),
								'blank' => __( 'Open in new tab', 'psource-shortcodes' ),
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'psource-shortcodes' ),
							'desc' => __( 'Select link target', 'psource-shortcodes' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#000000',
							'name' => __( 'Primary color', 'psource-shortcodes' ),
							'desc' => __( 'Pick a primary color', 'psource-shortcodes' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Background color', 'psource-shortcodes' ),
							'desc' => __( 'Pick a background color', 'psource-shortcodes' )
						),
						'class' => array(
							'type' => 'extra_css_class',
							'name' => __( 'Extra CSS class', 'psource-shortcodes' ),
							'desc' => __( 'Additional CSS class name(s) separated by space(s)', 'psource-shortcodes' ),
							'default' => '',
						),
					),
					'desc' => __( 'Advanced QR code generator', 'psource-shortcodes' ),
					'icon' => 'qrcode',
					'image' => $images_url . 'qrcode.svg',
				),
				// scheduler
				'scheduler' => array(
					'name' => __( 'Scheduler', 'psource-shortcodes' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'time' => array(
							'default' => '',
							'name' => __( 'Time', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'In this field you can specify one or more time ranges. Every day at this time the content of shortcode will be visible. %s %s %s - show content from 9:00 to 18:00 %s - show content from 9:00 to 13:00 and from 14:00 to 18:00 %s - example with minutes (content will be visible each day, 45 minutes) %s - example with seconds', 'psource-shortcodes' ), '<br><br>', __( 'Examples (click to set)', 'psource-shortcodes' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' )
						),
						'days_week' => array(
							'default' => '',
							'name' => __( 'Days of the week', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the week. Every week at these days the content of shortcode will be visible. %s 0 - Sunday %s 1 - Monday %s 2 - Tuesday %s 3 - Wednesday %s 4 - Thursday %s 5 - Friday %s 6 - Saturday %s %s %s - show content from Monday to Friday %s - show content only at Sunday %s - show content at Sunday and from Wednesday to Friday', 'psource-shortcodes' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Examples (click to set)', 'psource-shortcodes' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' )
						),
						'days_month' => array(
							'default' => '',
							'name' => __( 'Days of the month', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the month. Every month at these days the content of shortcode will be visible. %s %s %s - show content only at first day of month %s - show content from 1th to 5th %s - show content from 10th to 15th and from 20th to 25th', 'psource-shortcodes' ), '<br><br>', __( 'Examples (click to set)', 'psource-shortcodes' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' )
						),
						'months' => array(
							'default' => '',
							'name' => __( 'Months', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'In this field you can specify the month or months in which the content will be visible. %s %s %s - show content only in January %s - show content from February to June %s - show content in January, March and from May to July', 'psource-shortcodes' ), '<br><br>', __( 'Examples (click to set)', 'psource-shortcodes' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' )
						),
						'years' => array(
							'default' => '',
							'name' => __( 'Years', 'psource-shortcodes' ),
							'desc' => sprintf( __( 'In this field you can specify the year or years in which the content will be visible. %s %s %s - show content only in 2014 %s - show content from 2014 to 2016 %s - show content in 2014, 2018 and from 2020 to 2022', 'psource-shortcodes' ), '<br><br>', __( 'Examples (click to set)', 'psource-shortcodes' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' )
						),
						'alt' => array(
							'default' => '',
							'name' => __( 'Alternative text', 'psource-shortcodes' ),
							'desc' => __( 'In this field you can type the text which will be shown if content is not visible at the current moment', 'psource-shortcodes' )
						)
					),
					'content' => __( 'Scheduled content', 'psource-shortcodes' ),
					'desc' => __( 'Allows to show the content only at the specified time period', 'psource-shortcodes' ),
					'note' => __( 'This shortcode allows you to show content only at the specified time.', 'psource-shortcodes' ) . '<br><br>' . __( 'Please pay special attention to the descriptions, which are located below each text field. It will save you a lot of time', 'psource-shortcodes' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'psource-shortcodes' ),
					'icon' => 'clock-o',
					'image' => $images_url . 'scheduler.svg',
				),
			) );
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class Shortcodes_Ultimate_Data extends Su_Data {
	function __construct() {
		parent::__construct();
	}
}
