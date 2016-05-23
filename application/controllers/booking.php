<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends BController {
	
	public function index() {
		if ($this->_isUserLogged() === FALSE) {
		 	return $this->_showLoginPage();
		}
		$this->_startRequestProcessing();
	}

	function _loadModelsAndLibraries() {
		$this->load->model("mbooking");
	}
	
	function _loadView() {
		$this->load->view('vbooking');
	}
	
	function _processRequest() {
		var_dump("TODO: implement booking");
	}
	
}
