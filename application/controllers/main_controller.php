<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_Controller extends CI_Controller {

	public function index() {
		$this->load->view('home_view');
	}

	function calendar() {
		$this->load->view('calendar_view');
	}
}