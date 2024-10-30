=== Core Options by Room 34 ===
Contributors: room34
Donate link: http://room34.com/donation
Tags: configuration, admin, settings, customization, security, interface
Requires at least: 4.0
Tested up to: 4.9.8
Stable tag: 3.5.4

A core set of enhancements and additional options for general use in WordPress projects.

== Description ==

__NOTE FOR VERSION 3.5.0__
This is a transitional version of the plugin. Over time it has become a bit of a "junk drawer" of customization settings. The philosophy of this plugin is to keep things stripped-down and simple as much as possible. Some of its capabilities are better handled by other single-purpose plugins we or others have created.

This version removes a few of those duplicated features in preparation for a larger retooling with version 4.0. If your favorite feature has gone missing, please check out our other plugins to see if they provide the capabilities you need!

__NOTE FOR WORDPRESS 4.7__
_WordPress 4.7 introduces changes to the REST API that can potentially expose a list of registered usernames, which is a security risk. Version 3.0 of this plugin adds the ability to disable or restrict REST API access for sites that do not need it._

Core Options allows you to customize a variety of aspects of WordPress, mostly in the admin interface, including the following:

= Admin Interface =
* Add Admin Columns
* Customize WordPress Admin Font
* Editor Styles
* Hide Admin Bar
* Hide Admin Bar Items
* Hide Admin Menu Items
* Login Logo Link to Homepage

= Content and Taxonomies =
* Add Taxonomies to Media
* Content Refinements
* Move Featured Image Below Publish
* Retain Term Checklist Order

= Override WP Default Settings =
* Customize WordPress Mail "From" Info
* Remove WordPress Emoji

= Plugin Customizations =
Various options for streamlining and enhancing the admin elements of popular plugins such as Advanced Custom Fields, All in One SEO Pack, Ninja Forms, WCK and Yoast SEO.

= Security =
* Disable XML-RPC
* Disable/restrict REST API _(New in version 3.0.0)_
* Restrict Subscriber Dashboard Access

= Themes and Appearance =
* Add Theme Support
* Custom CSS
* Navigation Refinements

__IMPORTANT:__ This plugin uses PHP closures (anonymous functions), and therefore requires PHP 5.3 or greater. It may cause a fatal error (white screen) on servers running earlier versions of PHP.

== Installation ==

1. Install and activate the plugin under Appearance > Plugins.
3. Navigate to Settings > Core Options to configure.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 3.5.4 =
* Changed filter from login\_headertitle to login\_headertext per deprecation recommendation in WP 5.2.0.

= 3.5.3 =
* Added AJAX bypass to restrict\_dashboard() method to allow front-end use of admin-ajax.php.

= 3.5.2 =
* Changed action for add\_taxonomies\_to\_media method from registered\_taxonomy to init.

= 3.5.1 =
* Fixed bug that prevented Restrict Dashboard from hiding admin bar on front end.

= 3.5.0 =
* Removed certain features that are better handled by other plugins.

= 3.1.5 =
* Fixed bug that caused _all_ selectable admin bar items to be hidden if the general "Hide Admin Bar Items" option was turned on.

= 3.1.4 =
* Updated code for disabling emoji.

= 3.1.2 =
* Added option to convert non-breaking spaces to regular spaces and trim content on save. __Note:__ This feature currently only works on the main content block, not on content stored in custom fields.
* Minor code reformatting.

= 3.1.1 =
* Fixed issue that prevented "Hide Admin Bar Items" from working in WordPress 4.7.

= 3.1.0 =
* Modified core editor styles CSS settings.

= 3.0.1 =
* Minor edits to readme.txt file.

= 3.0.0 =
* Changed AJAX bypass from being universal for all settings to apply only in specific cases where it is relevant (i.e. settings that output HTML code).
* Added ability to disable REST API. This feature has been present in WordPress since version 4.4, but changes to the API introduced in 4.7 can potentially allow hackers to obtain usernames of registered users.
* Added note that plugin requires PHP 5.3 or greater due to use of closures.

= 2.2.2 =
* Now hides Comments admin column if Comments are turned off in Admin Menu.

= 2.2.1 =
* Fixed missing argument in remove_meta_box() calls.

= 2.2.0 =
* Added SVG uploads option under Content Refinements.

= 2.1.0 =
* Added Content Refinements options.
* Added Featured Image Below Publish option.
* Added Navigation options.
* Added Login Logo Link to Homepage option.
* Refinements to Editor Styles implementation.
* Added layout overflow handling to Yoast SEO enhancements.

= 2.0.1 =
* Removed Debug link.

= 2.0.0 =
* Reorganized admin interface with groupings.
* Added XML-RPC controls.

= 1.5.9 =
* Additional Editor Style options.
* Refactored JavaScript on admin settings page.

= 1.5.8 =
* Removed system font option (since it's now the WP default).
* Restored and updated Editor Styles functionality.
* Additional ACF customization options.
* Added option to override default term checklist behavior.
* Prepped for release in the WordPress Plugin Repository.

= 1.5.7 =
Fixed bug in system font option.

= 1.5.6 =
Added system font option.

= 1.5.5 =
Changed how ACF admin gets hidden.

= 1.5.4 =
Added remove_meta_box() if Categories or Tags are hidden.

= 1.5.3 =
Additional admin header options.

= 1.5.2 =
Made admin columns sortable.

= 1.5.1 =
Minor adjustments to Add Taxonomies to Media.

= 1.5.0 =
Added admin column options.

= 1.4.1 =
Bug fixes in streamline_plugin_admin.

= 1.4.0 =
Added custom CSS option.

= 1.3.0 =
Added options to disable WP emoji, customize email "from" info, and override WP admin font.

= 1.2.1 =
Changed add_taxonomies_to_media action to "registered_taxonomy".

= 1.2.0 =
Added ability to add taxonomies to Media Library assets.

= 1.1.2 =
Added check to prevent errors on AJAX requests.

= 1.1.1 =
Changed some instances of "init" to "admin_init" to avoid potential plugin conflicts (e.g. Store Locator Plus).

== Upgrade Notice ==

= 1.5.8 =
Users of pre-repository versions of the plugin may find it has been deactivated after upgrade. Simply navigate to Plugins and reactivate the plugin. All settings will be retained.

