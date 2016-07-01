<?php
	$wp_root_path = dirname( dirname( dirname( __FILE__ ) ) );
	// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
	require( $wp_root_path . '/wp-load.php' );
 	// Include the now instantiated global $wpdb Class for use
	global $wpdb;
	$EditedDomainName = $_POST['NewDomain'];
	$OrigDomainName = $_POST['OrigDomain'];
	$GroupID = $_POST['Group'];
	$OperatorName = $_POST['Operator'];

	$wpdb->update( 'testing_domain_group', array('Domain' => $EditedDomainName), array('Domain' => $OrigDomainName , 'DomainID' => $GroupID ), array('%s'),array('%s','%d')); 	
	$wpdb->insert('testing_operators_log',array('GroupID' => $GroupID, 'OperatorName' => $OperatorName, 'OperatingType'=>'Edit', 'Domain' => $EditedDomainName), array('%d','%s','%s','%s'));		
?>