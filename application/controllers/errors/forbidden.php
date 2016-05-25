<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forbidden extends CI_Controller {

	public function index() {
		$this->load->view('errors/html/error_403');
	}

}
