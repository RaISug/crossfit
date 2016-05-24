<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Deletion extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("login");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mtrainings");
	}
	
	function _loadView() {
		$this->load->view("admin/training/vdelete", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('training', "Тренировка", 'required|trim|numeric');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _processRequest() {
		$trainingId = $this->security->xss_clean($this->input->post("training"));
		
		try {
			$this->mtrainings->deleteById($trainingId);
			$this->data["successMessage"] = "Успешно изтрит елемент";
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
		}
		
		$this->_loadView();
	}
}