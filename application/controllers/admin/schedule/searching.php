<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Searching extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("login");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mschedule");
	}
	
	function _loadView() {
		$this->load->view("admin/schedule/vsearch", $this->data);
	}
	
	function _isValidRequest() {
		return TRUE;
	}
	
	function _processRequest() {
		$scheduleDate = $this->input->post("schedule_date");
		if ($scheduleDate === NULL) {
				return $this->_loadView();
		}
		
		$scheduleDate = $this->security->xss_clean($scheduleDate);
		$schedules = $this->mschedule->byDate(new DateTime($scheduleDate));
		
		if (empty($schedules)) {
			$this->data["noResultsFound"] = "Няма намерени резултати за търсената от вас дата.";
		} else {
			$this->data["schedules"] = $schedules;
		}
		
		$this->_loadView();
	}
}