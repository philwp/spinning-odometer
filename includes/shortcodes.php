<?php

function cpn_shortcode() {
	return '<h1>It Works' . insert_spinner() .'</h1>';
}

add_shortcode( 'cpn-numbers', 'cpn_shortcode');
?>