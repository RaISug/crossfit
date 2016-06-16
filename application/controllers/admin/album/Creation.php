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
	}
	
	function _loadView() {
		$this->load->view("admin/album/vcreate", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('name', "Тренировка", 'required|trim|is_unique[albums.name]');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('is_unique', 'Вече съществува албум с това име');
	}
	
	function _processRequest() {
		$name = $this->security->xss_clean($this->input->post("name"));
		
		try {
			$this->malbums->persist(array("name" => $name));
			redirect(base_url("admin/album/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}