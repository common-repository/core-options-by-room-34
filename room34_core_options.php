<?php
/*
Plugin Name: Core Options by Room 34
Plugin URI: http://room34.com/
Description: A core set of enhancements and additional options for general use in WordPress projects. REQUIRES PHP 5.3 OR GREATER.
Version: 3.5.4
Author: Room 34 Creative Services, LLC
Author URI: http://room34.com/
License: GPL2
Text Domain: r34co
*/

/*  Copyright 2012-2015 Room 34 Creative Services, LLC (email: info@room34.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Don't load directly
if (!defined('ABSPATH')) { exit; }

class Room34CoreOptions {
	
	var $name = 'Core Options by Room 34';
	var $version = '3.5.3';
	
	var $deleted_options = array(
		'admin_font' => true,
		'content_refinements' => array('Enable SVG uploads'),
		'custom_css' => true,
		
	);
	
	var $options = array(
		'add_taxonomies_to_media' => array(
			'method' => 'add_taxonomies_to_media',
			'group' => 'Content and Taxonomies',
			'action' => 'init',
			'title' => 'Add Taxonomies to Media',
			'description' => 'Use taxonomies with the Media Library.',
			'type' => 'checkbox_multiple',
			'options' => array(),
		),
		'add_theme_support' => array(
			'method' => 'add_theme_support',
			'group' => 'Themes and Appearance',
			'action' => 'init',
			'title' => 'Add Theme Support',
			'description' => 'Add theme support for additional WordPress capabilities. <div>Note: Uses default options for each; if you need to customize options, please edit the theme&rsquo;s <code>functions.php</code> file instead.</div>',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Automatic Feed Links' =>	"add_theme_support('automatic-feed-links'); ",
				'Custom Background' =>		"add_theme_support('custom-background'); ",
				'Custom Header' =>			"add_theme_support('custom-header'); ",
				'Featured Image' =>			"add_theme_support('post-thumbnails'); ",
				'HTML5' =>					"add_theme_support('html5'); ",
				'Menus' =>					"add_theme_support('menus'); ",
				'Post Formats' =>			"add_theme_support('post-formats'); ",
			),
		),
		'admin_columns' => array(
			'method' => 'admin_columns',
			'group' => 'Admin Interface',
			'action' => 'admin_init',
			'title' => 'Add Admin Columns',
			'description' => 'Add selected columns to the admin "All" pages. <div>Helpful if you need to quickly view attributes of pages or posts in the list.</div>',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Slug' => 'slug',
				'Page Template' => 'template',
			),
		),
		'content_refinements' => array(
			'method' => 'content_refinements',
			'group' => 'Content and Taxonomies',
			'action' => 'init',
			'title' => 'Content Refinements',
			'description' => 'Set various options for adjusting content presentation and capabilities.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Enable Dashicons' =>				"add_action('wp_enqueue_scripts', function() {
														wp_enqueue_style('dashicons');
													}); ",
				'Enable excerpts for Pages' =>		"add_post_type_support('page', 'excerpt'); ",
				'Remove blank paragraphs' =>		"add_filter('the_content', function(\$content) {
														return trim(preg_replace('/<p>(&nbsp;|[\s]*|)<\/p>/','',\$content));
													}); ",
				'Convert &amp;nbsp; and trim' =>	"add_filter('content_save_pre' , function(\$content) {
														return trim(preg_replace('/&nbsp;/',' ',\$content));
													}, 10, 1); ",
			),
		),
		'customize_wp_mail_from' => array(
			'method' => 'customize_wp_mail_from',
			'group' => 'Override WP Default Settings',
			'action' => 'init',
			'title' => 'Customize WordPress Mail "From" Info',
			'description' => 'Customize WordPress mail "From" info to match site details. <div>By default, emails sent by WordPress use "WordPress" as the sender name, along with a generic fake email address. Check here to change the name and email address to your site name and your default admin email address.</div>',
			'type' => 'checkbox',
		),
		'disable_restapi' => array(
			'method' => 'disable_restapi',
			'group' => 'Security',
			'action' => 'init',
			'title' => 'Disable/Restrict REST API',
			'description' => 'Disable/restrict REST API. <div>The REST API offers developers new ways to integrate WordPress data into their applications. However, if you are not using it, it can introduce potential security risks. Turn on this option to completely disable the REST API (WordPress 4.6 or earlier), or to require authentication for REST API calls (WordPress 4.7 or later).</div>',
			'type' => 'checkbox',
		),
		'disable_xmlrpc' => array(
			'method' => 'disable_xmlrpc',
			'group' => 'Security',
			'action' => 'init',
			'title' => 'Disable XML-RPC',
			'description' => 'Disable XML-RPC. <div>XML-RPC is used to publish content to your site from external tools, such as mobile apps. Most sites do not use XML-RPC, however, and it can be exploited by hackers to initiate DDOS attacks. Turn on this option to completely disable XML-RPC on your site.</div>',
			'type' => 'checkbox',
		),
		'editor_styles' => array(
			'method' => 'editor_styles',
			'group' => 'Admin Interface',
			'action' => 'admin_init',
			'title' => 'Editor Styles',
			'description' => 'Add styling to the content editor.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Import site theme CSS' => 'style.css',
				'Add basic "Core Options" styles (may improve appearance with some themes)' => '[PLUGIN_URL]editor-style.css',
			),
		),
		'featured_image_below_publish' => array(
			'method' => 'featured_image_below_publish',
			'group' => 'Content and Taxonomies',
			'action' => 'add_meta_boxes',
			'title' => 'Move Featured Image Below Publish',
			'description' => 'Move Featured Image below Publish box. <div>On sites with many custom taxonomies, plugins or other items that use the editor sidebar, Featured Image can get lost at the bottom of the page. Turn on this option to move Featured Image above these, to directly below the Publish box.</div>',
			'type' => 'checkbox',
		),
		'hide_admin_bar' => array(
			'method' => 'hide_admin_bar',
			'group' => 'Admin Interface',
			'action' => 'init',
			'title' => 'Hide Admin Bar',
			'description' => 'Hide the Admin Bar on site pages for all users. <div>Note: If you only wish to hide the Admin Bar for Subscribers, use the Restrict Dashboard option instead.</div>',
			'type' => 'checkbox',
		),
		'hide_admin_bar_items' => array(
			'method' => 'hide_admin_bar_items',
			'group' => 'Admin Interface',
			'action' => 'init',
			'title' => 'Hide Admin Bar Items',
			'description' => 'Hide the selected Admin Bar items.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'WordPress logo' => 'wp-logo',
				'Comments' => 'comments',
				'Customize' => 'customize',
				'"Howdy" text' => 'howdy',
			),
		),
		'hide_admin_menu_items' => array(
			'method' => 'hide_admin_menu_items',
			'group' => 'Admin Interface',
			'action' => 'admin_menu',
			'title' => 'Hide Admin Menu Items',
			'description' => 'Hide admin menu items that are not used on this site.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Posts' =>		"remove_menu_page('edit.php'); ",
				'Categories' =>	"remove_submenu_page('edit.php','edit-tags.php?taxonomy=category'); 
								add_filter('manage_edit-post_columns', function(\$columns) {
									unset(\$columns['categories']);
									return \$columns;
								});
								remove_meta_box('categorydiv','post','side'); ",
				'Tags' =>		"remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag'); 
								add_filter('manage_edit-post_columns', function(\$columns) {
									unset(\$columns['tags']);
									return \$columns;
								});
								remove_meta_box('tagsdiv-post_tag','post','side'); ",
				'Comments' =>	"remove_menu_page('edit-comments.php'); 
								add_filter('manage_posts_columns', function(\$columns) {
									unset(\$columns['comments']);
									return \$columns;
								});
								add_filter('manage_pages_columns', function(\$columns) {
									unset(\$columns['comments']);
									return \$columns;
								});
								remove_meta_box('commentstatusdiv','post','normal'); ",
				'Pages' =>		"remove_menu_page('edit.php?post_type=page'); ",
				'Media' =>		"remove_menu_page('upload.php'); ",
				'Appearance' =>	"remove_menu_page('themes.php'); ",
				'Plugins' =>	"remove_menu_page('plugins.php'); ",
				'Users' =>		"remove_menu_page('users.php'); ",
				'Tools' =>		"remove_menu_page('tools.php'); ",
				'Settings' =>	"remove_menu_page('options-general.php'); ",
			),
		),
		'hide_plugin_admin' => array(
			'method' => 'hide_plugin_admin',
			'group' => 'Plugin Customizations',
			'action' => 'admin_init',
			'title' => 'Hide Admin',
			'description' => 'Hide plugin admin elements to prevent users from making changes.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Advanced Custom Fields' =>	"remove_menu_page('edit.php?post_type=acf-field-group'); ",
				'WCK' =>					"remove_menu_page('wck-page'); ",
			),
		),
		'hide_plugin_metaboxes' => array(
			'method' => 'hide_plugin_metaboxes',
			'group' => 'Plugin Customizations',
			'action' => 'do_meta_boxes',
			'title' => 'Hide Metaboxes',
			'description' => 'Hide metaboxes generated by commonly used plugins on editing pages.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'All in One SEO Pack' =>	"remove_meta_box('aiosp',null,'advanced'); ",
				'Ninja Forms' =>			"remove_meta_box('ninja_forms_selector',null,'side'); ",
			),
		),
		'login_logo_link_to_homepage' => array(
			'method' => 'login_logo_link_to_homepage',
			'group' => 'Admin Interface',
			'action' => 'init',
			'title' => 'Login Logo Link to Home Page',
			'description' => 'Make logo on login page link to site home page. <div>By default the login page includes a WordPress logo that links to wordpress.org. This option changes the link to go to the site homepage instead.</div>',
			'type' => 'checkbox',
		),
		'navigation_refinements' => array(
			'method' => 'navigation_refinements',
			'group' => 'Themes and Appearance',
			'action' => 'init',
			'title' => 'Navigation Refinements',
			'description' => 'Adjustments to navigation menus to facilitate design or administration.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Remove white space between menu items' =>				"add_filter('wp_nav_menu_items', function(\$items) {
																			return preg_replace('/>(\s|\n|\r)+</', '><', \$items);
																		}); ",
				'Remove option to automatically add pages to menus' =>	"add_action('admin_head', function() {
																			global \$pagenow;
																			if (\$pagenow == 'nav-menus.php') {
																				echo '
																					<style>
																						.auto-add-pages {
																							display: none;
																						}
																					</style>
																				';
																			}
																		}); ",
			),
		),
		'remove_wp_emoji' => array(
			'method' => 'remove_wp_emoji',
			'group' => 'Override WP Default Settings',
			'action' => 'init',
			'title' => 'Remove WordPress Emoji',
			'description' => 'Remove WordPress emoji and related scripts. <div>WordPress now automatically includes JavaScript on every page for displaying emoji. If your site does not use emoji, check this box to remove the emoji-related JavaScript functionality.</div>',
			'type' => 'checkbox',
		),
		'restrict_dashboard' => array(
			'method' => 'restrict_dashboard',
			'group' => 'Security',
			'action' => 'init', // Can't be admin_init because it needs to run on the front end as well!
			'title' => 'Restrict Subscriber Dashboard Access',
			'description' => 'Control whether or not Subscribers can access any part of the Dashboard or the Your Profile page.<br />If turned on, this also removes the Admin Bar that appears at the top of site pages for logged-in Subscribers.',
			'type' => 'select',
			'options' => array(
				0 => 'Off',
				'profile' => 'Allow access to Your Profile page only',
				'none' => 'No Dashboard access',
			),
		),
		'retain_term_checklist_order' => array(
			'method' => 'retain_term_checklist_order',
			'group' => 'Content and Taxonomies',
			'action' => 'init',
			'title' => 'Retain Term Checklist Order',
			'description' => 'Override default behavior of moving checked terms (e.g. categories) to top of list on editing page.',
			'type' => 'checkbox',
		),
		'streamline_plugin_admin' => array(
			'method' => 'streamline_plugin_admin',
			'group' => 'Plugin Customizations',
			'action' => 'init',
			'title' => 'Streamline and Enhance Admin Layouts',
			'description' => 'Modify certain plugin admin elements for an improved interface.',
			'type' => 'checkbox_multiple',
			'options' => array(
				'Advanced Custom Fields' =>	"add_action('admin_head', function() {
												echo '
													<style type=\"text/css\">
														/* Alternate block backgrounds in ACF */
														.acf-row td {
															border-top: 7px solid rgb(223,223,223) !important;
														}
													</style>
												';
											}); ",
				'Yoast SEO' =>				"add_filter('wpseo_use_page_analysis', '__return_false');
											add_filter('wpseo_metabox_prio', function(){ return 'low'; }, 10);
											add_action('admin_head', function() {
												echo '
													<style>#wpseo_meta { overflow: auto; }</style>
												';
											}); ",
			),
		),
	);


	public function __construct() {
		
		// Add admin options page
		add_action('admin_menu', array(&$this,'add_options_page'));
		
		// Prep any options that require additional logic
		$this->_add_taxonomies_to_media_init();
		
		// Apply saved options
		foreach ((array)$this->options as $option) {
			if (get_option('r34co_'.$option['method'])) {
				if (isset($option['method']) && method_exists($this,$option['method'])) {
					if (empty($option['action'])) { $option['action'] = 'init'; }
					if (empty($option['priority'])) { $option['priority'] = 9999; }
					add_action(
						$option['action'],
						array(&$this,$option['method']),
						$option['priority']
					);
				}
			}
		}
		
	}
	
	
	// Add the management page
	public function add_options_page() {
		add_options_page(
			'Room 34 Core Options',
			'Core Options',
			'manage_options',
			'room-34-core-options',
			array(&$this,'options_interface')
		);
	}
	
	
	// The management page interface
	public function options_interface() {

		// Remove deleted options
		foreach ((array)$this->deleted_options as $method => $labels) {
			if ($labels === true) {
				if (delete_option('r34co_'.$method)) {
					echo '<div class="updated"><p>Option <strong>' . ucwords(str_replace('_', ' ', $method)) . '</strong> deleted.</p></div>';
				}
			}
			else {
				foreach ((array)$labels as $label) {
					$lbl = strtolower(preg_replace('/[\W]+/','',$label));
					if (delete_option('r34co_'.$method.'_'.$lbl)) {
						echo '<div class="updated"><p>Option <strong>' . ucwords(str_replace('_', ' ', $method)) . ' / ' . $label . '</strong> deleted.</p></div>';
					}
				}
			}
		}
		
		// Process input
		if (isset($_POST['r34co-nonce']) && wp_verify_nonce($_POST['r34co-nonce'],'room-34-core-options')) {
			foreach ((array)$_POST['r34co'] as $key => $value) {
				update_option('r34co_'.$key, $value);
			}
			echo '<div class="updated"><p><strong>Your updates were saved.</strong> Changes may not appear until next page load.</p></div>';
		}
		
		// Group options
		$opt_groups = array();
		foreach ((array)$this->options as $opt_key => $option) {
			$opt_groups[$option['group']][] = $opt_key;
		}
		ksort($opt_groups);
		
		// Display admin page
		include_once(dirname(__FILE__) . '/r34co-admin.php');
	}
	
	
	// Add taxonomies to media
	public function _add_taxonomies_to_media_init() {
		if (get_option('r34co_add_taxonomies_to_media') || is_admin()) {
			$taxonomies = get_taxonomies(array(
				'public' => true,
				'show_ui' => true,
			), 'objects');
			if (empty($taxonomies)) {
				unset($this->options['add_taxonomies_to_media']);
				return false;
			}
			else {
				$this->options['add_taxonomies_to_media']['options'] = array();
				foreach ((array)$taxonomies as $tax) {
					$this->options['add_taxonomies_to_media']['options'][$tax->labels->name] = $tax->name;
				}
			}
		}
	}
	public function add_taxonomies_to_media() {
		if (get_option('r34co_add_taxonomies_to_media')) {
			foreach ((array)$this->options['add_taxonomies_to_media']['options'] as $label => $tax) {
				$lbl = strtolower(preg_replace('/[\W]+/','',$label));
				if (get_option('r34co_add_taxonomies_to_media_'.$lbl)) {
					register_taxonomy_for_object_type($tax, 'attachment');
				}
			}
		}
	}
	
	
	// Hide admin menu items
	public function add_theme_support() {
		if (get_option('r34co_add_theme_support')) {
			$this->_apply_option_functions(__FUNCTION__);
		}
	}
	
	
	// Add admin columns
	public function admin_columns() {
		foreach ((array)$this->options['admin_columns']['options'] as $label => $col) {
			$lbl = strtolower(preg_replace('/[\W]+/','',$label));
			if (get_option('r34co_admin_columns_'.$lbl)) {
				switch ($col) {
					case 'slug':
						// Add to posts
						add_filter('manage_posts_columns', function($d) {
							$d['r34co_admin_columns_slug'] = 'Slug';
							return $d;
						});
						add_action('manage_posts_custom_column', function($c,$id) {
							if ($c == 'r34co_admin_columns_slug') {
								echo get_post($id)->post_name;
							}
						}, 10, 2);
						add_filter('manage_edit-post_sortable_columns', function($d) {
							$d['r34co_admin_columns_slug'] = 'post_name';
							return $d;
						});
						// Add to pages
						add_filter('manage_pages_columns', function($d) {
							$d['r34co_admin_columns_slug'] = 'Slug';
							return $d;
						});
						add_action('manage_pages_custom_column', function($c,$id) {
							if ($c == 'r34co_admin_columns_slug') {
								echo get_page($id)->post_name;
							}
						}, 10, 2);
						add_filter('manage_edit-page_sortable_columns', function($d) {
							$d['r34co_admin_columns_slug'] = 'post_name';
							return $d;
						});
						break;
					case 'template':
						// Add to pages
						add_filter('manage_pages_columns', function($d) {
							$d['r34co_admin_columns_template'] = 'Template';
							return $d;
						});
						add_action('manage_pages_custom_column', function($c,$id) {
							if ($c == 'r34co_admin_columns_template') {
								$template = pathinfo(get_page_template_slug($id),PATHINFO_FILENAME);
								if (empty($template)) { $template = 'default'; }
								echo $template;
							}
						}, 10, 2);
						add_filter('manage_edit-page_sortable_columns', function($d) {
							$d['r34co_admin_columns_template'] = '_wp_page_template';
							return $d;
						});
						add_action('pre_get_posts', function($q) {
							if (!is_admin()) { return; }
							$orderby = $q->get('orderby');
							if ('_wp_page_template' == $orderby) {
								$q->set('meta_key','_wp_page_template');
								$q->set('orderby','meta_value');
								// Workaround to include items without this meta key
								// Based on: https://core.trac.wordpress.org/ticket/19653#comment:11
								add_filter('get_meta_sql', function($c) {
									$c['join'] = str_replace('INNER JOIN','LEFT JOIN',$c['join']) . $c['where'];
									$c['where'] = '';
									return $c;
								});
							}
						});
						break;
					default:
						break;
				}
			}
		}
	}
	
	
	// Change WP admin font
	public function admin_font() {
		// Bypass on AJAX calls
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) { return; }

		if (get_option('r34co_admin_font')) {
			$font = get_option('r34co_admin_font');
			?>
			<style type="text/css">
				body * { font-family: <?php echo $font; ?>; }
				#wpadminbar .ab-item, #wpadminbar .ab-label
				{ font-family: <?php echo $font; ?> !important; }
			</style>
			<?php
		}
	}


	// Content refinements
	public function content_refinements() { $this->_apply_option_functions(__FUNCTION__); }
	
	
	// Custom CSS
	public function custom_css() {
		// Bypass on AJAX calls
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) { return; }

		if (get_option('r34co_custom_css')) {
			echo '<style type="text/css">' . "\n" . get_option('r34co_custom_css') . "\n" . '</style>';
		}
	}
		
		
	// Customize WP mail "From" info
	public function customize_wp_mail_from() {
		if (get_option('r34co_customize_wp_mail_from')) {
			add_filter('wp_mail_from_name', function() { return get_bloginfo('name'); });
			add_filter('wp_mail_from', function() { return get_bloginfo('admin_email'); });
		}
	}
	
	
	// Disable REST API
	// Based on the Disable REST API plugin by Dave McHale
	// http://www.binarytemplar.com/disable-json-api
	public function disable_restapi() {
		if (get_option('r34co_disable_restapi')) {
			// Require authentication on REST API calls for WP version 4.7 or later
			if (version_compare(get_bloginfo('version'), '4.7', '>=')) {
				add_filter('rest_authentication_errors', function() { 
					if (!is_user_logged_in()) {
						return new WP_Error(
							'rest_cannot_access',
							'Authentication required.',
							'disable-json-api',
							array('status' => rest_authorization_required_code())
						);
					}
				});
			}
			// Disable REST API completely on WP version 4.6 or earlier
			else {
				// WP-API v. 1.x
				add_filter('json_enabled', '__return_false');
				add_filter('json_jsonp_enabled', '__return_false');
				// WP-API v. 2.x
				add_filter('rest_enabled', '__return_false');
				add_filter('rest_jsonp_enabled', '__return_false');
				// Remove REST API info from head/headers
				remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
				remove_action('wp_head', 'rest_output_link_wp_head', 10);
				remove_action('template_redirect', 'rest_output_link_header', 11);
			}
		}
	}
		
		
	// Disable XML-RPC
	public function disable_xmlrpc() {
		if (get_option('r34co_disable_xmlrpc')) {
			add_filter('xmlrpc_enabled', '__return_false');
		}
	}
		
		
	// Add custom Styles menu to WYSIWYG editor
	public function editor_styles() {
		if (get_option('r34co_editor_styles')) {
			foreach ($this->options['editor_styles']['options'] as $name => $path) {
				if (get_option('r34co_editor_styles_' . preg_replace('/[\W]+/','',strtolower($name)))) {
					add_editor_style(str_replace('[PLUGIN_URL]', plugin_dir_url(__FILE__), $path));
				}
			}
		}
	}
	
	
	// Move Featured Image below Publish
	public function featured_image_below_publish() {
		if (get_option('r34co_featured_image_below_publish')) {
			// @todo Add logic to prevent this on post types that don't support thumbnails
			add_meta_box('submitdiv', __('Publish'), 'post_submit_meta_box', null, 'side', 'high');
			add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', null, 'side', 'high');
		}
	}


	// Hide admin bar
	public function hide_admin_bar() {
		if (is_user_logged_in() && get_option('r34co_hide_admin_bar')) {
			add_filter('show_admin_bar', '__return_false');
		}
	}
		
		
	// Hide admin bar items
	public function hide_admin_bar_items() {
		if (is_user_logged_in() && get_option('r34co_hide_admin_bar_items')) {
			add_action(
				'admin_bar_menu',
				function($wp_admin_bar) {
					// Remove admin bar items
					foreach ((array)$this->options['hide_admin_bar_items']['options'] as $label => $node) {
						if (get_option('r34co_hide_admin_bar_items_' . preg_replace('/[\W]+/','',strtolower($label)))) {
							if ($node == 'howdy') {
								// Remove "Howdy" from My Account menu item
								// Based on: http://www.revaultmedia.com/plugins/remove-howdy
								$my_account = $wp_admin_bar->get_node('my-account');
								$wp_admin_bar->add_node(array(
									'id' => 'my-account',
									'title' => str_replace('Howdy, ', '', $my_account->title),
								));
							}
							else {
								$wp_admin_bar->remove_node($node);
							}
						}
					}
				},
				999
			);
		}
	}
		
		
	// Hide plugin admin
	public function hide_plugin_admin() { $this->_apply_option_functions(__FUNCTION__); }
	
	
	// Hide plugin metaboxes
	public function hide_plugin_metaboxes() { $this->_apply_option_functions(__FUNCTION__); }


	// Hide admin menu items
	public function hide_admin_menu_items() { $this->_apply_option_functions(__FUNCTION__); }
	
	
	// Login logo link to homepage
	public function login_logo_link_to_homepage() {
		if (get_option('r34co_login_logo_link_to_homepage')) {
			add_filter('login_headerurl', function() { return home_url('/'); });
			add_filter('login_headertext', function() { return get_bloginfo('name','display'); });		
		}
	}


	// Navigation refinements
	public function navigation_refinements() { $this->_apply_option_functions(__FUNCTION__); }
	
	
	// Remove WP emoji code
	// Based on the Disable Emojis plugin
	// https://geek.hellyer.kiwi/plugins/disable-emojis/
	public function remove_wp_emoji() {
		if (get_option('r34co_remove_wp_emoji')) {
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action('admin_print_styles', 'print_emoji_styles');	
			remove_filter('the_content_feed', 'wp_staticize_emoji');
			remove_filter('comment_text_rss', 'wp_staticize_emoji');	
			remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
			add_filter('tiny_mce_plugins', function($plugins) {
				return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
			});
			add_filter('wp_resource_hints', function($urls, $relation_type) {
				if ('dns-prefetch' == $relation_type) {
					$urls = array_diff($urls, array(apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/')));
				}
				return $urls;
			}, 10, 2);
		}
	}
		
		
	// General check to keep subscribers out of admin area except profile page
	public function restrict_dashboard() {
		// Bypass on AJAX calls (fixes issue with front-end calls to admin-ajax.php)
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) { return; }

		$restrict_level = get_option('r34co_restrict_dashboard');
		// No restrictions
		if (empty($restrict_level)) { return false; }
		// Logged-in user is a subscriber; apply restrictions
		if (is_user_logged_in() && !current_user_can('edit_posts')) {
			// Admin area
			if (is_admin()) {
				if ($restrict_level == 'profile') {
					if (strpos($_SERVER['REQUEST_URI'],'profile.php') === false) {
						header('Location: ' . admin_url('profile.php')); exit;
					}
					else {
						remove_menu_page('index.php');
						add_filter('show_admin_bar', '__return_false');
					}
				}
				elseif ($restrict_level == 'none') {
					header('Location: ' . get_bloginfo('url')); exit;
				}
			}
			
			// Main site
			else {
				add_filter('show_admin_bar', '__return_false');
			}
		}
	}
	
	
	// 
	public function retain_term_checklist_order() {
		if (get_option('r34co_retain_term_checklist_order')) {
			add_filter('wp_terms_checklist_args', function($args) {
				$args['checked_ontop'] = false;
				return $args;
			});		
		}
	}
	
	
	// Streamline plugin admin
	public function streamline_plugin_admin() { $this->_apply_option_functions(__FUNCTION__); }
	
	
	// General purpose method for applying multiple options that contain functions
	public function _apply_option_functions($method) {
		if (get_option('r34co_'.$method)) {
			foreach ((array)$this->options[$method]['options'] as $label => $function) {
				$lbl = strtolower(preg_replace('/[\W]+/','',$label));
				if (get_option('r34co_'.$method.'_'.$lbl)) { eval($function); }
			}
		}
	}


}

add_action('init', 'Room34CoreOptions');
function Room34CoreOptions() {
	global $Room34CoreOptions;
	$Room34CoreOptions = new Room34CoreOptions;
}