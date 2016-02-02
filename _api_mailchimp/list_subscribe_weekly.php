<?php

/*
 * 
 * Subscribe a New Member to a List using the MCAPI.php class and do some basic error checking.
 * First, include the mailchimp config, which contains the API Class, and the API Key 
 * Then, create a new instance of the MailChimp API class. 
 * 
 */
 
$testMode = 0;
$errorMessage = "";
if ($testMode) {
	echo "success";
} else {
	require_once 'mailchimp_config.php';
	$api = new MCAPI($apikey);
	
	/*
	 * 
	 * Sanitize and set name, email, list, etc. 
	 * 
	 */

	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo "<p>Sorry, there was an error with your email.</p>";
		exit;
	}
		
	if (isset($_POST['firstName'])) { 				$firstName 				= filter_var($_POST['firstName'], FILTER_SANITIZE_STRING); } else { $firstName = ""; }
	if (isset($_POST['lastName'])) { 				$lastName 				= filter_var($_POST['lastName'], FILTER_SANITIZE_STRING); } else { $lastName = ""; }
	if (isset($_POST['email'])) { 					$email 					= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); } else { $email = ""; }
	if (isset($_POST['state'])) { 					$state					= filter_var($_POST['state'], FILTER_SANITIZE_STRING); } else { $state = ""; }
	if (isset($_POST['comment'])) { 				$comment 				= filter_var($_POST['comment'], FILTER_SANITIZE_STRING); } else { $comment = ""; }
	if (isset($_POST['listID'])) { 					$listID 				= filter_var($_POST['listID'], FILTER_SANITIZE_STRING); } else { $listID = ""; }

	/*
	 * 
	 * Populate the $mergeVars, which MailChimp will be expecting.  
	 * 
	 */
	
	$mergeVars = array(
		'FNAME' => $firstName, 
		'LNAME' => $lastName, 
		'EMAIL' => $email,
		'STATE' => $state,
		'COMMENT' => $comment
	);
	
	/*
	 * 
	 * Make the API Call.
	 * listSubscribe($id, $email_address, $merge_vars=NULL, $email_type='html', $double_optin=true, $update_existing=false, $replace_interests=true, $send_welcome=false)
	 */
	
	$result = $api->listSubscribe($listID, $email, $mergeVars, 'html', false, false, true, false);
	if ($api->errorCode){
		//echo "Unable to load listSubscribe()!\n";
		//echo "\tCode=".$api->errorCode."\n";
		echo "<p>".$api->errorMessage."</p>";
	} else {
	    echo "success";
	}

}

?>
