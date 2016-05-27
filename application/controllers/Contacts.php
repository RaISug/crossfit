<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends BController {

	public function index() {
		$this->load->view('vcontacts', $this->data);
	}

}
