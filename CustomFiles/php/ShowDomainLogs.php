<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;

	$myrows2 = $wpdb->get_results( "SELECT GroupID, OperatorName, Time, OperatingType,Domain From testing_operators_log ORDER BY Time DESC");
	if(!empty($myrows2)){
	
		foreach ($myrows2 as $value){
			$data[] = $value;
    	}
		echo json_encode($data);
    }

?>