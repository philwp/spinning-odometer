<?php

/**
 * Install
 *
 * Runs on plugin install.
 *
 * @access      private
 * @since       1.0 
 * @return      void
*/

function so_install() {
	
	
}
register_activation_hook( SO_PLUGIN_FILE, 'so_install' );