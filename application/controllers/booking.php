<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends BController {
	
	function __construct() {
		parent::__construct();
		$this->data["debugMessage"] = "(Booking) Booking attempt";
	}
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE) {
		 	return $this->_showLoginPage("booking");
		}
		$this->_startRequestProcessing();
	}

	function _loadModelsAndLibraries() {
		$this->load->model("mbookings");
	}
	
	function _loadView() {
		$this->load->view('vbooking', $this->data);
	}
	
	function _processRequest() {
		var_dump("TODO: implement booking");
	}
	
}
