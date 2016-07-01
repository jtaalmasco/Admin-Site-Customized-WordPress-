<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' ); 
	$current_user = wp_get_current_user();
	echo $current_user->display_name ;			 	
?>