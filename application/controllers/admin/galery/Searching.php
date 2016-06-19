<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Searching extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("malbums");
		$this->load->model("mgalery");
	}
	
	function _loadView() {
		$this->load->view("admin/galery/vsearch", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["albums"] = $this->malbums->findAll();
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('albumId', "Албум", 'required|trim|numeric');
		$this->form_validation->set_rules('fileTypeId', "Вид на файла", 'required|trim|numeric');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _processRequest() {
		$albumId = $this->input->post("albumId");
		if ($albumId === NULL) {
			return $this->_loadView();
		}
		
		$albumId = $this->security->xss_clean($albumId);
		$fileTypeId = $this->security->xss_clean($this->input->post("fileTypeId"));
		
		$galeryFiles = $this->mgalery->byAlbumAndFileTypeId($albumId, $fileTypeId);
		
		if (empty($galeryFiles)) {
			$this->data["noResultsFound"] = "Няма намерени резултати за търсената от вас данни.";
		} else {
			$this->data["galeryFiles"] = $galeryFiles;
		}
		
		$this->_loadView();
	}
}