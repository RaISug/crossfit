<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends BController {
	
	function __construct() {
		parent::__construct();
		$this->data["debugMessage"] = "(Booking) Booking attempt";
	}
	
	public function index() {
		$this->_startRequestProcessing();
	}

	function _loadModelsAndLibraries() {
		$this->load->model("mnews");
	}
	
	function _loadView() {
		$this->load->view('vnews', $this->data);
	}
	
	function _additionalViewData() {
		$this->data["news"] = $this->mnews->findAll();
	}
	
}
