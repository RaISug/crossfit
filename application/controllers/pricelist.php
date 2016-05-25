<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PriceList extends BController {

	public function index() {
		$this->load->view('vpricelist', $this->data);
	}

}