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
	
	
}

add_action( 'wp_enqueue_scripts', 'so_load_front_end_scripts');

function so_load_admin_scripts () {

	wp_enqueue_script( 'media-upload');
	wp_enqueue_script( 'thickbox');
	wp_enqueue_script( 'so-media-script', SO_PLUGIN_URL . 'assests/js/media-button.js', array('jquery'), '1.0' );

	wp_enqueue_style( 'thickbox');
}

add_action( 'admin_enqueue_scripts', 'so_load_admin_scripts' );