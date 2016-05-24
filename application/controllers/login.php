<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BController {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("musers");
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('email', "Име на ястието", 'required|valid_email|trim');
		$this->form_validation->set_rules('password', "Описание", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено.');
		$this->form_validation->set_message('valid_email', 'Емайл адреса трябва да е валиден.');
	}
	
	function _loadView() {
		$this->load->view("vlogin", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["queryString"] = $this->security->xss_clean($_SERVER['QUERY_STRING']);
	}
	
	function _processRequest() {
		$email =  $this->security->xss_clean($this->input->post("email"));
		$password = $this->security->xss_clean($this->input->post("password"));
		
		if ($this->musers->isEmailAndPasswordCorrect($email, $password)) {
			$originPath = $this->security->xss_clean($this->input->get("originPath"));
			
			$originQueryString = $this->security->xss_clean($this->input->get("originQueryString"));
			$queryString = $this->_extractQueryString($originQueryString);
			
			$redirectPath = $originPath !== NULL ? ($originPath . "?" . $queryString) : "";
			return redirect(base_url($redirectPath));
		}
		
		$this->data["errorMessage"] = "Неуспешен вход. Грешен емайл или парола";
		$this->_loadView();
	}
	
}