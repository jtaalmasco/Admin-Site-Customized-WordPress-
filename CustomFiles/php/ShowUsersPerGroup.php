<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;

	$UsersGroup = $_POST['UserGroup'];
	$myrows = $wpdb->get_results( "SELECT UserName from testing_users WHERE DomainGroup=$UsersGroup");
	
	if(!empty($myrows)){
	foreach ($myrows as $value){ 
    	$result[] = $value->UserName;
    }
    $count = count($result);
    for($i = 0 ; $i < $count; $i++){
    	echo $result[$i] . ",";
    }
    }
?>