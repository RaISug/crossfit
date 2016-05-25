<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Initializer extends BController {

	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		
		$this->load->library("dbinitializer");
		$this->dbinitializer->initialize();
		$this->load->view('admin/vhome', $this->data);
	}

}
