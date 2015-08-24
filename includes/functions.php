<?php

function insert_spinner() {
	$start_num = 1234;
	$end_num = 3456;
	$delay_time = 15;
	echo '<h1>Try it yourself</h1> 
            <div class="odometer" id="example1"> '
                . $start_num . 
           ' </div> 
            <p id="runexample1">Click</p>';
   echo' <script>        setTimeout( function() {
	 	jQuery(".odometer").html('. $end_num.');
	 }, '. $delay_time . ');</script>';
    
}

function cpn_number_validation( $num ) {
	if( is_numeric($num)) {
		return $num;
	}

}