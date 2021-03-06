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
		$this->load->model("mtrainingtypes");
	}
	
	function _loadView() {
		$this->load->view("admin/training/types/vcreate", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('name', "Тип тренировка", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
	}
	
	function _processRequest() {
		$name = $this->security->xss_clean($this->input->post("name"));
		
		$data = array(
			"name" => $name
		);
		
		try {
			$this->mtrainingtypes->persist($data);
			redirect(base_url("admin/training/types/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}