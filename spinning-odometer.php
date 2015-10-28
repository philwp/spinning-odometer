<?php
/*
Plugin Name: Spinning Odometer
Plugin URI:  http://philwp.com/spinning-odometer
Description: Displays a number like an odometer with spinning numbers
Version:     0.3
Author:     Phil Webster	
Author URI:  http://philwp.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

// plugin folder url
if( !defined( 'SO_PLUGIN_URL' )) {
	define( 'SO_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
// plugin folder path
if( !defined( 'SO_PLUGIN_DIR' )) {
	define( 'SO_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
}
// plugin root file
if( !defined( 'SO_PLUGIN_FILE' )) {
	define( 'SO_PLUGIN_FILE', __FILE__ );
}  

/*
|--------------------------------------------------------------------------
| File Includes
|--------------------------------------------------------------------------
*/

include_once( SO_PLUGIN_DIR. '/includes/so_widget.php' );

/*
|--------------------------------------------------------------------------
| Register Widget
|--------------------------------------------------------------------------
*/

function so_register_widget() {
	register_widget( 'SO_Widget' );
}

// hook using widget_init
add_action( 'widgets_init', 'so_register_widget' );