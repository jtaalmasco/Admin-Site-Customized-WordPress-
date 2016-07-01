<?php
	// Build the wp-load.php path from a plugin/theme
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;

    $variable = $_POST['Group'];
    $myDomainRows = $wpdb->get_results("SELECT Domain from testing_domain_group where DomainID =$variable");
    foreach ($myDomainRows as $value){ 
    	$result[] = $value->Domain;
    }
    $count = count($result);
    if($count == 1){
    	for($i = 0 ; $i < count($result); $i++){
    		echo $result[$i];		
   		}
   	}
   	else if($count > 1)
   		for($i = 0 ; $i < count($result); $i++){
   			if($i == 0){
    			echo $result[$i] . ",";
    		}
    		else if ($i > 0){
    			echo $result[$i];
    		}		
   		}
 ?>