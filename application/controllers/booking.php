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
			$queryString = $_SERVER['QUERY_STRING'];
		 	return $this->_showLoginPage("booking", $queryString);
		} else if ($this->_isDirectAccess()) {
			//TODO: redirect to some page or return error
		}
		$this->_startRequestProcessing();
	}

	private function _isDirectAccess() {
		//TODO: check presence of schedule param
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mbookings");
	}
	
	function _loadView() {
		$this->load->view('vbooking', $this->data);
	}
	
	function _additionalViewData() {
		$scheduleId = $this->input->get("schedule");
		$userId = $this->session->userdata("user_id");
		
		$bookings = $this->mbookings->byScheduleAndUserId($scheduleId, $userId);
		
		$this->data["scheduleId"] = $scheduleId;
		$this->data["isTrainingBooked"] = empty($bookings) === FALSE;
	}
	
	function _processRequest() {
		$scheduleId = $this->input->get("schedule");
		$userId = $this->session->userdata("user_id");
		
		$persistData = array(
			"user_id" => $userId,
			"schedule_id" => $scheduleId
		);
		
		try {
			$this->mbookings->persist($persistData);
			redirect(base_url("schedule?success"));
		} catch (Exception $exception) {
            $this->data["persistance_error"] = "Неуспешно записване";
			$this->_loadView();
		}
	}
	
}
