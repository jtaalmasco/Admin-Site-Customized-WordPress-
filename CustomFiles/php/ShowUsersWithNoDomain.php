<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;

	$myrows3 = $wpdb->get_results( "SELECT UserName from testing_users where DomainGroup = '' OR DomainGroup IS NULL ");
	if(!empty($myrows3)){
		foreach ($myrows3 as $value){ 
    		$result[] = $value->UserName;
    	}
    	$count = count($result);
    	for($i = 0 ; $i < $count; $i++){
    		echo $result[$i] . ",";
    	}
	}
?>