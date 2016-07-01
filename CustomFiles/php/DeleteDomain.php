<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;
	$DomainName = $_POST['Domain'];
	$GroupID = $_POST['Group'];
	$OperatorName = $_POST['Operator'];

	$wpdb->delete( 'testing_domain_group', array('DomainID' => $GroupID , 'Domain' => $DomainName) , array('%d', '%s'));
	$wpdb->insert('testing_operators_log',array('GroupID' => $GroupID, 'OperatorName' => $OperatorName, 'OperatingType'=>'Delete', 'Domain' => $DomainName), array('%d','%s','%s','%s'));
?>