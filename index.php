<?php
/*
Plugin Name: Oracle Slider Plugin
Plugin URI: https://github.com/marcelbadua
Description: Slider Plugin
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

if(!class_exists('ORACLE_SLIDER'))
{
	class ORACLE_SLIDER
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			//require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			//$ORACLE_SLIDER_Settings = new ORACLE_SLIDER_Settings();

			// Register custom post types
			require_once(sprintf("%s/control/template.php", dirname(__FILE__)));
			$ORACLE_SLIDER_TEMPLATE = new ORACLE_SLIDER_TEMPLATE();

			//shortcode
			require_once(sprintf("%s/control/shortcode.php", dirname(__FILE__)));
			$ORACLE_SLIDER_SHORTCODE = new ORACLE_SLIDER_SHORTCODE();

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


	} // END class ORACLE_SLIDER
} // END if(!class_exists('ORACLE_SLIDER'))

if(class_exists('ORACLE_SLIDER'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('ORACLE_SLIDER', 'activate'));
	register_deactivation_hook(__FILE__, array('ORACLE_SLIDER', 'deactivate'));

	// instantiate the plugin class
	$wp_plugin_template = new ORACLE_SLIDER();

}
