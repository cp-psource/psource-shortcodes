=== PSOURCE Shortcodes ===
Contributors: PSOURCE
License: GPLv3
Tags: shortcode, toggle, columns, button, slider, video, map, visual, responsive, shortcodes, youtube, vimeo, audio, mp3, tabs, jquery, box, accordion, toggle, pullquote, list, image, gallery, navigation, permalink, feed, rss, members, membership, guests, carousel, icons, rtl, multilingual
Requires at least: 4.9
Tested up to: 6.5.4
Stable tag: trunk

A comprehensive collection of visual components for your site


== Description ==

[PSOURCE Shortcodes](https://cp-psource.github.io/upfront-shortcodes/) is a comprehensive collection of various visual and functional elements, which you can use in the post editor, text widgets or even in template files. Using PSOURCE Shortcodes you can easily create tabs, buttons, boxes, sliders and carousels, responsive videos and much, much more.

== Changelog ==

= 1.0.0 =
* Changed: Inview.js library replaced with [jQuery.Inview](https://github.com/protonet/jquery.inview)
* Fixed: caching issue with [su_dummy_text]
* Fixed: PHP warning in [su_posts] shortcode when specified template does not exist
* Updated: Font Awesome to version 4.7.0
* Added: responsive styles for [su_pullquote]

= 5.0.2 =
* Fixed: an issue where RTL stylesheet won't displayed if custom CSS field is empty
* Fixed: icon sizes at 'Dashboard - Available Shortcodes' page
* Fixed: [expand] shortcode now works when loaded through AJAX
* Fixed: border-radius on [box] shortcode
* Fixed: compatibility with 'Plugin Organizer'
* Updated: OwlCarousel jQuery plugin
* Added: new attribute 'responsive' for table shortcode: [su_table responsive="no|yes"]
* Added: new attribute 'playsinline' for youtube_advanced shortcode: [su_youtube_advanced playsinline="no|yes"]

= 5.0.1 =
* Fixed: serious security vulnerability, which allows attacker to run any code using filter in meta, post, or user shortcodes. Thanks to Robert L Mathews.
* Fixed: changed admin menu position (it was replacing 'Settings' menu on some installations)
* Fixed: shortcodes prefix field now accepts special characters
* Fixed: old bug when unwanted code parts was added with shortcode
* Fixed: bug, where backslashes were removed from custom CSS code
* Added: new attribute 'ID' for [button] shortcode
* Added: new filter 'su/slides_query', which can be used to modify posts query for slider, carousel and custom_gallery shortcodes
* Added: new filter 'su/assets/custom_css/template' to filter custom css output
* Minor fixes

= 1.0.0 =
* Read [this blog post](https://vanokhin.com/whats-new-in-psource-shortcodes-5/) to learn more about update
* New project website [getshortcodes.com](https://cp-psource.github.io/upfront-shortcodes/)
* New documentation [docs.getshortcodes.com](http://docs.getshortcodes.com/)
* Added: 'Available shortcodes' admin menu
* Removed: 'Examples' admin menu
* Removed: 'Cheatsheet' admin menu
* Fixed: [feed] shortcode (now it uses SimplePie)
* Changed default content for [tabs], [row] and [accordion] shortcodes
* Fixed: [user] shortcode works when user is not logged in
* Changed: Security improvement. Plugin will now strip all HTML tags from Custom CSS code
* Minor improvements and fixes

= 4.10.2 =
* Improved: compatibility with PHP7 ([user] and [post] shortcodes)
* Fixed: [slider] and [custom_gallery] markup (skipped whitespaces among link attributes)
* Removed: user capability check in [permalink]

= 4.10.1 =
* Fixed: lightbox javascript

= 4.10.0 =
* Fixed: security vulnerability at 'Examples' admin page (insecure call of file_get_contents() at inc/core/tools.php:774)
* Fixed: added access check to permalink shortcode. [Pull request #20](https://github.com/gndev/psource-shortcodes/pull/20).
* Added: PHP7 compatibility. Checked with [php7cc](https://github.com/sstalle/php7cc) and [PHP Compatibility Checker](https://wordpress.org/plugins/php-compatibility-checker/). [Pull request #45](https://github.com/gndev/psource-shortcodes/pull/45).
* Added: https support for Google Maps. [Pull request #40](https://github.com/gndev/psource-shortcodes/pull/40).
* Added: https support for Youtube. [Pull request #39](https://github.com/gndev/psource-shortcodes/pull/39).

= 4.9.9 =
* Fixed: vote popup at plugins page
* Minor improvements, fixes

= 4.9.8.1 =
* Fixed: compatibility with WordPress 4.3+
* Added: lightbox captions for slider, carousel and custom_gallery. Commit by [Valentino Pistis](https://github.com/vpistis)
* Changed: text domain from 'su' to 'psource-shortcodes'

= 4.9.8 =
* Added: Spanish translation
* Updated: Font Awesome updated to 4.4.0
* Fixed: buttons line-height on narrow screens
* Fixed: nested spoilers

= 4.9.7 =
* Added: [document] is now compatible with https
* Fixed: carousel items width calculation
* Added: new attribute for [button title=""], [forum topic](https://wordpress.org/support/topic/how-add-title-tag-to-a-button)
* Fixed: stripslashes for [button] content

= 4.9.6 =
* Fixed: Quick fix for disabled custom css since previous update

= 4.9.5 =
* Added: basic RTL support
* Fixed: JS error (blocking shortcodes settings) on WordPress 3.5
* Fixed: minor improvement for slider/gallery posts query. [Forum topic](https://wordpress.org/support/topic/slider-code-suggestion)
* Fixed: minor imrovements on [quote], fixed markup bug for long values in cite, thanks to [Anatoly Yumashev](http://systemo.biz/)
* Added: completely redesigned search feature. Now it's like a Google, but for shortcodes =)
* Added: Insert shortcode popup window hotkey. So now, you can open Insert shortcode window, choose shortcode and insert it with just one click
* Updated: new demo video at plugin settings page (About tab)
* Updated: new plugin's banner and icon

= 4.9.4 =
* Updated: Japanese translation
* Updated: Polish translation
* Fixed: minor fixes in shortcode settings window
* Fixed: vulnerability in Examples preview. Added wp_nonce check. Thanks to [Kacper Szurek](http://security.szurek.pl/)
* Fixed: vulnerability at Custom CSS page. Added wp_nonce check. Thanks to [Ryan Satterfield](https://planetzuda.com/)
* Removed: skins directory creation

= 4.9.3 =
* Updated: owl-carousel.js
* Added: minor UI improvements
* Fixed: [vimeo] ssl issue (thanks to Adam)
* Fixed: multiple errors on cheatsheet page
* Fixed: errors when updating user profile, [forum topic](https://wordpress.org/support/topic/error-message-when-updating-users-in-wp-admin)
* Removed: global skin option at settings page

= 4.9.2 =
* Added: minor improvements for tabs/spoilers anchors (auto-removing extra # characters)
* Added: compatibility with TablePress's advanced editor
* Added: new option for tabs. You can now link any tab to any webpage [su_tab url="http://" target="blank"]
* Added: new option wmode for [youtube_advanced], [forum topic](http://wordpress.org/support/topic/youtube-player-option-request)
* Added: new shortcode [lightbox_content]
* Fixed: lightbox and galleries scripts, [forum topic](http://wordpress.org/support/topic/carousel-su-little-hack)
* Fixed: removed global function $.support.transition, [forum topic](http://wordpress.org/support/topic/transition-check-returns-string-instead-of-object)
* Updated: Russian language
* Updated: Japanese language
* Updated: FontAwesome, 4.1.0
* Updated: Magnific Popup, 0.9.9

= 4.9.1 =
* Added: New shortcode [scheduler]
* Added: New shortcode [expand]
* Added: New options for [divider]
* Added: New option `rel` for [button]
* Fixed: animations script has been changed. CSS animations will be skipped in non-supported browsers, [forum topic](http://wordpress.org/support/topic/disable-animations-on-non-supported-devicesbrowsers)
* Fixed: templates/default-loop.php - removed extra n character in comments number, [forum topic](http://wordpress.org/support/topic/minor-bug-in-templatesdefault-loopphp)
* Fixed: large DB query on sites with many users, [forum topic](http://wordpress.org/support/topic/installing-sc-ultimate-on-site-with-30000-wp-users)

= 4.9.0 =
* New shortcode [qrcode] allows you to generate colorful and responsive QR codes!
* Improved shortcode search. Just type shortcode name and hit Enter
* Updated Animate.css (animations library)
* Updated ACE editor (custom CSS editor)
* Responsive CSS for [tabs]
* Highly decreased plugin size

= 4.8 =
* Minor UI fixes (compatibility with page builders)
* Czech translation by [Punc00](http://nuze.cz/)
* Added: full compatibility with multiple editors on same page - [fourm topic](http://wordpress.org/support/topic/enhance-compatibility-with-other-plugins)
* Fixed: extra CSS class for [menu] - [forum topic](http://wordpress.org/support/topic/extra-css-class-not-working-on-menu-shortcode-video-included)
* Fixed: Swiper click event, Swiper has been updated - [forum topic](http://wordpress.org/support/topic/carousel-links-not-working)
* Fixed: [spoiler]'s content is now hidden until the page is loaded
* New dashboard page: Cheatsheet
* Minor [spoiler] fix, for hidden spoiler content
* Updated Japanese translation

= 4.7 =
* Long-awaited feature: slider, carousel and custom_gallery links can now be open with lightbox
* Long-awaited feature: custom links in slider, carousel and custom_gallery shortcodes
* Fixed https bug in FontAwesome enqueue
* Fixed bug with multiple users queries - [forum topic](http://wordpress.org/support/topic/plugin-making-700-sql-calls)
* New Ghost style for [button]
* Minor UI fixes (for WP 3.9+)
* New shortcode [dailymotion]
* YouTube (advanced) can now use https protocol
* Additional help notes in Shortcode Generator
* Slovak language

= 4.6 =
* Auto-save for shortcodes settings. Now you don't need to adjust it again and again
* New premium add-on - [Extra Shortcodes](hhttps://cp-psource.github.io/upfront-shortcodes/extra/)
* Minor UX improvements
* New locale - VI
* Fixed bug with tax_term IDs in [posts] shortcode, [forum topic](http://wordpress.org/support/topic/posts-tax_term-category-number)
* Fixed bug with service title, [forum topic](http://wordpress.org/support/topic/service-shortcode-not-wrapping-properly-on-mobile-browser)
* Fixed bug with animations names in shortcode generator, [forum topic](http://wordpress.org/support/topic/animations-2)
* Updated settings pages capabilities
* Added some hooks
* Updated .pot file
* Font-Awesome is now loaded from bootstrap CDN. [Technical details](http://stackoverflow.com/questions/20032426/fontawesome-doesnt-display-in-firefox).
* New review - [PSOURCE Shortcodes: Ultimatize your written content](http://wisdmlabs.com/blog/how-to-style-wordpress-themes-with-psource-shortcodes/)
* New review - [Add 40+ New Layout Features To WordPress with PSOURCE Shortcodes](http://www.makeuseof.com/tag/add-40-new-layout-features-wordpress-psource-shortcodes/)
* New review - [Show Me the Shortcode](http://thewpchick.com/show-shortcode/) + Video
* Updated readme.txt
* Compatibility with recent version of [SiteOrigin page builder](siteorigin.com/page-builder/) - it's free!
* Compatibility with recent version of [Visual Composer](http://vc.wpbakery.com/)
* Compatibility with recent version of [Elegant Themes page builder](http://www.elegantthemes.com/gallery/elegant-builder/)

= 4.5 =
* Updated some examples
* Removed import functions. Old versions of plugin (like 3.9.5) is not supported anymore
* Updated custom formatting filter
* Updated Japanese translation
* Added NL translation
* Minor fixes
* Presets. Now you need to adjust the shortcodes only once
* New WP filters for shortcodes attributes
* New option for compatibility mode prefix
* Compatibility mode is now enabled by default
* Font-awesome updated to 4.0.3
* New shortcode [meta]
* New shortcode [user]
* New shortcode [post]
* New attribute limit for [slider], [carousel] and [custom_gallery]
* Minor UX improvements

= 4.4 =
* __IMPORTANT__: new galleries mechanism. Your created galleries will work but will not be visible in admin panel. Now, you're able to create galleries right in "Insert shortcode" window. Also, you can now create galleries from posts, categories or even custom taxonomies.
* Removed all default links (default youtube videos)
* Updated admin page framework Sunrise
* Minor admin panel fixes
* Fixed file_get_contents() (disabled http wrappers) issue at the examples page
* Added classes PSOURCE_Shortcodes_Generator, PSOURCE_Shortcodes_Shortcodes and PSOURCE_Shortcodes_Data
* Removed unused classes MediaUpload and ImageMeta
* New shortocde [dummy_image]
* New shortocde [dummy_text]
* New shortocde [animate]
* New shortocde [youtube_advanced]
* New admin page - Examples
* New admin page - Add-ons
* Font Awesome updated to version 4
* New attr [spoiler icon=""]
* Fixed issue with date format in [posts]
* New slider control for shortcode generator
* Small fixes

= 4.3 =
* New text-shadow picker for [button]
* Anchor navigation for spoilers and tabs - [forum topic](http://wordpress.org/support/topic/hyperlinks-to-spoilers-and-tabs)
* Small fixes
* IMPORTANT: removed old list icons. These icons replaced with new font-awesome icons
* New icon picker for [service], [button] and [list]
* Media manager is now works on widgets page
* Shortcodes inside of [button]
* Fixed fatal error in [media]
* New media manager added for galleries manager
* New media manager added to the file fields in Generator
* Z-index for visual composer - [forum topic](http://wordpress.org/support/topic/compatible-with-visual-composer)
* New attr for [button] onclick
* Fixed settings page
* Fixed [video] player

= 4.2 =
* Font Awesome icons (in Generator)
* Fixed warning in footer - [forum topic](http://wordpress.org/support/topic/bug-showing-in-online-site-after-updating-the-plugin)
* Removed warning at settings page - [forum topic](http://wordpress.org/support/topic/warning-on-settings-page)
* Removed another warning (undefined index) - [forum topic](http://wordpress.org/support/topic/undefined-index-with-wp_debug-true)
* Changed syntax for shortcodes inside of attributes - [documentation](http://gndev.info/kb/how-to-use-another-shortcodes-inside-of-attributes/)
* Small performance improvemets
* Aded font-awesome.css. Will be completely included in closest versions
* Added default taxonomy value for [posts]
* Added default post_type value for [posts]
* Added ability to use shortcodes inside of attributes
* Translated into Japanese
* Fixed [button wide=yes]
* Fixed media query for [column]
* Added new attr [column center=yes]
* Improved js code for spoilers and tabs
* Improved js code for generator
* Added pot file
* Fixed [button] css code
* Updated [accordion], [spoiler] and [tabs] js code
* Fixed [tooltip]
* Updated Greek translation
* Fixed [lightbox]
* Disabled wp_footer check
* Fixed wp_footer notice, again
* Small fix for tooltips
* Fixed wp_footer notice
* Greek translation
* Added compatibility mode prefix for spoilers inside of accordion
* Updated qTip plugin
* Added shortcode [tooltip]
* Added new attribute. [tab disabled="yes"]. Now, any tab can be disabled. [Forum topic](http://wordpress.org/support/topic/tabs-how-to-disable-one-of-the-tabs)
* Added [accordion] scrolling. [Forum topic](http://wordpress.org/support/topic/accordion-usability-issue)
* Added wp_footer check. User will be noticed if current theme doen't includes wp_footer
* Updated caching mechanism. Cache will be reseted when you add or remove terms
* Updated galleries mechanism. Removed some conflicts
* Fixed spoiler background for style=fancy
* Additional access check option for Shortcode Generator

= 4.1 =
* [5 metro skins](hhttps://cp-psource.github.io/upfront-shortcodes/metro-skins/)
* New screencast - [How to create image gallery](http://www.youtube.com/watch?v=kCWyO2F7jTw)
* New attribute "center" for [button]. Buttons can now be centered on the page
* Updated [frame]. Now it can contain other shortcodes
* Updated caching mechanism. Cache now will be reseted on plugin activation
* Fixed many PHP warnings when debug mode enabled
* Added backward compatibility for [media]. Shortcode has basic support for youtube and vimeo videos
* Fixed bug with hidden single [tab]
* Added attribute "active" for tabs container. This option allows you to select tab number that will be open by default
* Fixd button style 3D
* Added backward compatibility for [frame]
* Fixed [column] margins
* Added backward compatibility for [tabs]. Now it accepts style=3 and vertical attributes
* Added backward compatibility for [spoiler]. Now it accepts 0 and 1 as values for attribute open. Also, it now accepts style attribute (1, 2, default, fancy, simple)
* Added custom CSS import from previous versions. Styles will be imported automatically and prepended to the existing CSS-code
* Added backward compatibility for [highlight]. Now it accepts bg and background attributes
* Added backward compatibility for [label]. Now it accepts style and type attributes
* Added backward compatibility for [dropcap]. Now it accepts 1, 2 and 3 as style values
* Added backward compatibility for [permalink]. Now it accepts p and id attributes
* Added backward compatibility for [button]. Need to test
* Added backward compatibility for [members]. Now it accepts style and login attributes
* Added backward compatibility for [box]. Now it accepts color and box_color attributes
* Added backward compatibility for [note]. Now it accepts color and note_color attributes
* Added backward compatibility for [column]. Now it accepts attribute last and can be not wrapped with [row]
* Added backward compatibility for [document]. Now it accepts file and url attributes

= 4.0 =
* [Official plugin page](hhttps://cp-psource.github.io/upfront-shortcodes/)
* [Premium add-on for creating custom shortcodes](hhttps://cp-psource.github.io/upfront-shortcodes/maker/)
* Plugin based on [Sunrise Plugin Framework](https://github.com/gndev/sunrise)
* [GitHub repo](https://github.com/gndev/psource-shortcodes). Now you can easily fork and modify best plugin in the world (:
* Brand new Shortcode Generator, [demo video](http://www.youtube.com/watch?v=DR2c266yWEA)
* [Shortcodes API](http://gndev.info/kb/psource-shortcodes-api-overview/)
* Completely reorganized code. Added and removed some shortcodes
* For security maniacs: timthumb.php replaced by native WordPress mechanism
* For speed-up maniacs: completely rewritten assets mechanism. Now css and js files included on page depend on used shortcodes
* Added new shortcode [posts]. This is awesome and flexible mechanism to display your content in many different ways
* Now you can create your own custom skins for shortcodes
* Columns, google maps, google document viewer, youtube player, vimeo player and custom audio player is now fully responsive

= 3.9 =
* More screencasts
* Special widget for shortcodes
* Small fixes
* Hebrew translation
* [Awesome tutorial by Digital Cascade TV](http://www.youtube.com/watch?v=IjmaXz-b55I)
* Partners section on settings page
* Generator select improved with [Chosen](http://harvesthq.github.com/chosen/)
* Farbtastic color picker

= 3.8 (security release) =
* 2 new translations (Sk, Lt)
* Donate button in control panel
* Updated timthumb.php (version 2.8.10)
* Added 2 useful screencasts

= 3.7 =
* Complete support for nested shortcodes. Check the FAQ page.
* New shortcode [label]
* New style for buttons [button style="5"]
* Fixed images ordering for [custom_gallery], [jcarousel] and [nivo_slider]

= 3.6 =
* Descriptions for [custom_gallery]
* Custom options for jwPlayer
* Fixed size option for sliders and gallery

= 3.5 =
* New shortcode [accordion] for muliple spoilers
* Improved spoiler shortcode (check settings page)
* Multiple tabs bugfix
* Authors can also use shortcode generator
* Nested shortcodes: spoiler, column, tabs, box, note

= 3.4 =
* Belarusian translation
* New shortcode [dropcap]

= 3.3 =
* Changed: [nivo_slider] and [jcarousel] (see docs in console)
* New shortcode: [custom_gallery]
* New parameter: [members login="0|1"]
* New shortcode: guests
* German translation

= 3.0 =
* Button for WYSIWIG editor (search it near Upload/Insert buttons)
* New shortcode: private (private notes for editors)
* Patched and secure timthumb.php

= 2.7 =
* French translation
* Fixed for work with new jQuery 1.6 in WP 3.2

= 2.5 =
* Theme integration

= 2.4 =
* New shortcode: jcarousel

= 2.3 =
* New admin page: Demo

= 2.2 =
* New shortcode: document
* New shortcode: members
* New shortcode: feed
* New attr: link="caption" for [nivo_slider]
* New attr: p for [subpages]
* New tabs style (style=3)

= 2.1 =
* New option: disable any script
* New option: disable any stylesheet
* New attribute for column shortcode - style
* New attribute for spoiler shortcode - style

= 2.0 =
* New shortcode: menu
* New shortcode: subpages
* New shortcode: siblings
* Some admin fixes
* New button attribute - class
* New button attribute - target
* Different tabs styles (1 old + 1 new)

= 1.9 =
* New shortcode: permalink
* New shortcode: bloginfo

= 1.8 =
* Some small additions
* Ajax admin page
* No-js compatibility
* Multiple tabs support

= 1.7 =
* Improved settings page design
* Added shortcode nivo_slider
* Added shortcode photoshop

= 1.6 =
* New admin panel
* Custom CSS editor with syntax hughlight
* Small fixes
* Added donation forms

= 1.5 =
* Added option "Compatibility mode"
* Added new button styles
* Added new list styles
* Added new shortcode media
* Added new shortcode table

= 1.4 =
* Added shortcode "Fancy link"

= 1.3 =
* Some fixes

= 1.2 =
* Localization support

= 1.1 =
* Added options page
* Fixed options saving

= 1.0 =
* Initial release
