<?php
/*
Plugin Name: Oracle Pop Up Plugin
Plugin URI: https://github.com/marcelbadua
Description: Pop up shortcode Plugin
Version: 1.0
Author: Marcel Badua
Author URI: marcel.com
License: GPL2
*/
/*
Copyright 2015  Marcel Badua  (email : hello@marcelbadua.com)

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

if(!class_exists('ORACLE_POPUP'))
{
	class ORACLE_POPUP
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			//require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			//$ORACLE_POPUP_Settings = new ORACLE_POPUP_Settings();

			// Register custom post types
			// require_once(sprintf("%s/control/template.php", dirname(__FILE__)));
			// $ORACLE_POPUP_TEMPLATE = new ORACLE_POPUP_TEMPLATE();

			//shortcode
			require_once(sprintf("%s/control/shortcode.php", dirname(__FILE__)));
			$ORACLE_POPUP_SHORTCODE = new ORACLE_POPUP_SHORTCODE();

			//$plugin = plugin_basename(__FILE__);
			//add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
		} // END public function __construct

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate

		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=wp_plugin_template">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}


	} // END class ORACLE_POPUP
} // END if(!class_exists('ORACLE_POPUP'))

if(class_exists('ORACLE_POPUP'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('ORACLE_POPUP', 'activate'));
	register_deactivation_hook(__FILE__, array('ORACLE_POPUP', 'deactivate'));

	// instantiate the plugin class
	$wp_plugin_template = new ORACLE_POPUP();

}
