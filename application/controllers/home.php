<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends BController {

	public function index() {
		$this->load->view('vhome', $this->data);
	}

}
