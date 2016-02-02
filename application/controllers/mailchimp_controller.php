<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailchimp_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$config = array(
			'apikey' => 'c43618ce102d3dc66b6804dbcc59ec69-us7',
			'secure' => FALSE 
		);
		$this->load->library('MCAPI', $config, 'mailchimp');
	}

	public function index() {}

	public function subscribe() {
		$list_id = "88ee783e7a";
		$errorMessage = "";
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "<p>Sorry, there was an error with your email.</p>";
			exit;
		}
		if (isset($_POST['email'])) { 
			$email 	= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
		} else { 
			$email = ""; 
		}

		/*
		 * 
		 * Populate the $mergeVars, which MailChimp will be expecting.  
		 * 
		 */
		
		$mergeVars = array(
			'EMAIL' => $email
		);
		
		/*
		 * 
		 * Make the API Call.
		 * listSubscribe($id, $email_address, $merge_vars=NULL, $email_type='html', $double_optin=true, $update_existing=false, $replace_interests=true, $send_welcome=false)
		 */

		
		$result = $this->mailchimp->listSubscribe($list_id, $email, $mergeVars, 'html', false, false, true, false);
		if ($this->mailchimp->errorCode){
			echo "<p>".$this->mailchimp->errorMessage."</p>";
		} else {
		    echo "success";
		}
	}
}