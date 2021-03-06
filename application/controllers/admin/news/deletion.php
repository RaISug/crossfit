<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Deletion extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mnews");
	}
	
	function _loadView() {
		$this->load->view("admin/news/vdelete", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["news"] = $this->mnews->findAll();
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('id', "Новина", 'required|numeric');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Грешно подадени данни');
	}
	
	function _processRequest() {
		$newsId = $this->security->xss_clean($this->input->post("id"));
		
		try {
			$this->mnews->deleteById($newsId);
			redirect(base_url("admin/news/deletion"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}