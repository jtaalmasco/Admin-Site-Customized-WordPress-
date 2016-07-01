<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;
	$UsersUpdate = $_POST['CheckedUsers'];
	$Group = $_POST['Group'];

	$count = count($UsersUpdate);
	echo $count;

	for($i = 0 ; $i < $count; $i++){
    	$wpdb->update( 'testing_users', array('DomainGroup' => $Group), array('UserName' => $UsersUpdate[$i] ), array('%d'),array('%s'));
    }
?>