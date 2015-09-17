<?php
/*
Plugin Name: Spinning Odometer
Plugin URI:  http://philweb.site/spinning-odometer
Description: Displays a number like an odometer with spinning numbers
Version:     0.1
Author:     Phil Webster	
Author URI:  http://philweb.site
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

// plugin folder url
if(!defined('SO_PLUGIN_URL')) {
	define('SO_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
// plugin folder path
if(!defined('SO_PLUGIN_DIR')) {
	define('SO_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
}
// plugin root file
if(!defined('SO_PLUGIN_FILE')) {
	define('SO_PLUGIN_FILE', __FILE__);
}

/*
|--------------------------------------------------------------------------
| File Includes
|--------------------------------------------------------------------------
*/

include_once( SO_PLUGIN_DIR . '/includes/install.php');
include_once( SO_PLUGIN_DIR. '/includes/functions.php');
include_once( SO_PLUGIN_DIR. '/includes/scripts.php');
include_once( SO_PLUGIN_DIR. '/includes/so_widget.php');