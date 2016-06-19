<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Creation extends BController {
	
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
		$this->load->view("admin/galery/vcreate", $this->data);
	}
	
	function _additionalViewData() {
		$this->data['albums'] = $this->malbums->findAll();
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('album_id', "Албум", 'required|trim');
		$this->form_validation->set_rules('file_type', "Вид на файла", 'required|trim');
		$this->form_validation->set_rules('file', "Файл", 'required|trim');
		$this->form_validation->set_rules('description', "Час", 'trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', "Полете '%s' задължително трябва да бъде попълнено");
		$this->form_validation->set_message('numeric', "Полето '%s', не може да съдържа символи.");
	}
	
	function _processRequest() {
		$albumId = $this->security->xss_clean($this->input->post("album_id"));
		$fileType = $this->security->xss_clean($this->input->post("file_type"));
		$description = $this->security->xss_clean($this->input->post("description"));
		
		$galeryData = array(
			"album_id" => $albumId,
			"description" => $description,
			"file_type" => $fileType
		);
		
		try {
			$this->mgalery->persist($galeryData);
			redirect(base_url("admin/galery/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}