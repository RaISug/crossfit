<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends BController {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model("malbums");
		$this->load->model("mgalery");
	}
	
	public function index() {
		if ($this->_isAlbumRequest()) {
			$albumId = $this->input->get('id');
			$albumId = $this->security->xss_clean($albumId);
			
			$this->data["images"] = $this->mgalery->byAlbumAndFileTypeId($albumId, 1);
			$this->data["videos"] = $this->mgalery->byAlbumAndFileTypeId($albumId, 2);
		} else {
			$this->data['albums'] = $this->malbums->findAllCoverAlbums();
		}

		$this->load->view('vgalery', $this->data);
	}
	
	function _isAlbumRequest() {
		return $this->input->get('id') !== NULL;
	}
	
}
