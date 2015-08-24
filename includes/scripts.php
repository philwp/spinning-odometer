<?php
/**
 * Front End Scripts
 *
 * Loads all of the scripts for front end.
 *
 * @access      private
 * @since       1.0 
 * @return      void
**/

function so_load_front_end_scripts () {

	wp_enqueue_style( 'so-styles', SO_PLUGIN_URL . 'assests/css/odometer-theme-car.css');
	
	wp_enqueue_script( 'so-odometer', 
						SO_PLUGIN_URL . 'assests/js/odometer.js',
						array( ));
	// wp_enqueue_script( 'cpn-script', 
	// 					SO_PLUGIN_URL . 'assests/js/script.js',
	// 					array( 'jquery','so-odometer'));
	
}

add_action( 'wp_enqueue_scripts', 'so_load_front_end_scripts');