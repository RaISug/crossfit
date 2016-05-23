<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BController {
	
	private $_origin = NULL;
	
	function __construct() {
		parent::__construct();
		$this->data["debugMessage"] = "(Login) Login attempt";
	}
	
	public function index() {
		if ($this->input->get("origin") !== NULL && $this->input->get("origin") !== "") {
			$this->_origin = $this->input->get("origin");
		}
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
	
	function _processRequest() {
		$email =  $this->input->post("email");
		$password = $this->input->post("password");
		
		if ($this->musers->isEmailAndPasswordCorrect($email, $password)) {
			return redirect(base_url($this->_origin));
		}
		$this->data["errorMessage"] = "Неуспешен вход. Грешен емайл или парола";
		
		$this->_loadView();
	}
}