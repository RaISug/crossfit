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
	
	function _loadView() {
		$this->load->view("vlogin", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["queryString"] = $_SERVER['QUERY_STRING'];
	}
	
	function _processRequest() {
		$email =  $this->input->post("email");
		$password = $this->input->post("password");
		
		if ($this->musers->isEmailAndPasswordCorrect($email, $password)) {
			$originPath = $this->input->get("originPath");
			
			$originQueryString = $this->input->get("originQueryString");
			$queryString = $this->_extractQueryString($originQueryString);
			
			$redirectPath = $originPath !== NULL ? ($originPath . "?" . $queryString) : "";
			return redirect(base_url($redirectPath));
		}
		$this->data["errorMessage"] = "Неуспешен вход. Грешен емайл или парола";
		
		$this->_loadView();
	}
	
}