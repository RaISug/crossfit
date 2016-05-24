<?php

defined('BASEPATH') or exit('No direct script access allowed');

//TODO: validate query string for xss attacks or sql injections etc.
class Booking extends BController {
	
	function __construct() {
		parent::__construct();
		$this->data["debugMessage"] = "(Booking) Booking attempt";
	}
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE) {
			$queryString = $this->security->xss_clean($_SERVER['QUERY_STRING']);
		 	return $this->_showLoginPage("booking", $queryString);
		} else if ($this->_isDirectAccess() && $this->_isPostRequest() === FALSE) {
			return redirect(base_url("schedule"));
		}
		$this->_startRequestProcessing();
	}

	private function _isDirectAccess() {
		return $this->input->get("schedule") === NULL;
	}
	
	private function _isPostRequest() {
		return $this->input->post("schedule") !== NULL;
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mbookings");
	}
	
	function _loadView() {
		$this->load->view('vbooking', $this->data);
	}
	
	function _additionalViewData() {
		$scheduleId = $this->security->xss_clean($this->input->get("schedule"));
		$userId = $this->session->userdata("user_id");
		
		$bookings = $this->mbookings->byScheduleAndUserId($scheduleId, $userId);
		
		$this->data["scheduleId"] = $scheduleId;
		$this->data["isTrainingBooked"] = empty($bookings) === FALSE;
	}

	function _validationRules() {
		$this->form_validation->set_rules('schedule', "График", 'required|trim|numeric');
	}
	
	function _errorMessages() {
        $this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
        $this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _processRequest() {
		$scheduleId = $this->security->xss_clean($this->input->post("schedule"));
		$userId = $this->session->userdata("user_id");
		
		$bookings = $this->mbookings->byScheduleAndUserId($scheduleId, $userId);
		
		if (empty($bookings)) {
			return $this->_bookTraining($scheduleId, $userId);
		}
		
		$this->_discardBooking($scheduleId, $userId);
	}
	
	function _bookTraining($scheduleId, $userId) {
		$persistData = array(
				"user_id" => $userId,
				"schedule_id" => $scheduleId
		);
		
		try {
			$this->mbookings->persist($persistData);
			redirect(base_url("schedule"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
	
	function _discardBooking($scheduleId, $userId) {
		try {
			$this->mbookings->deleteByScheduleIdAndUserId($scheduleId, $userId);
			redirect(base_url("schedule"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
	
}
