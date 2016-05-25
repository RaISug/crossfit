<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Participants extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mbookings");
	}
	
	function _loadView() {
		$this->load->view("admin/vparticipants", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('schedule_date', "Дата на графика", 'required|trim');
		$this->form_validation->set_rules('schedule_time', "Час на графика", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
	}
	
	function _processRequest() {
		$date = $this->security->xss_clean($this->input->post("schedule_date"));
		$time = $this->security->xss_clean($this->input->post("schedule_time"));
		
		$dateTime = date($date . " " . $time . ":00");
		
		try {
			$this->data["participants"] = $this->mbookings->findParticipantsByDateTime($dateTime);
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
		}
		
		$this->_loadView();
	}
}