<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends BController {
	
	public function index() {
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("musers");
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('email', "Име на ястието", 'required|valid_email|is_unique[users.email]|trim');
		$this->form_validation->set_rules('password', "Описание", 'required|min_length[6]|matches[r_password]|trim');
		$this->form_validation->set_rules('r_password', "Описание", 'required|trim');
		$this->form_validation->set_rules('firstName', "Описание", 'required|trim');
		$this->form_validation->set_rules('lastName', "Описание", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено.');
		$this->form_validation->set_message('valid_email', 'Емайл адреса трябва да е валиден.');
        $this->form_validation->set_message('min_length', 'Паролата трябва да бъде по-дълга от 6 символа');
        $this->form_validation->set_message('is_unique', 'Същестува потребител регистриран с тези данни');
        $this->form_validation->set_message('matches', 'Паролите не съвпадат');
	}
	
	function _loadView() {
		$this->load->view("vregistration", $this->data);
	}
	
	function _processRequest() {
		$email = $this->security->xss_clean($this->input->post("email"));
		$password = $this->security->xss_clean($this->input->post("password"));
		$firstName = $this->security->xss_clean($this->input->post("firstName"));
		$lastName = $this->security->xss_clean($this->input->post("lastName"));
		
		try {
			$this->musers->registrate($email, $password, $firstName, $lastName, 0);
			redirect(base_url());
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}		
	}
	
}