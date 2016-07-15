<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends BController {
	
	public function index() {
		$this->_startRequestProcessing();
	}
	
	public function mobile() {
		$this->_loadModelsAndLibraries();
		if ($this->_isValidDateInterval()) {
			$interval = $this->input->get("interval");
			$interval = $this->security->xss_clean($interval);
			
			$date = $this->_getTheDateAfterNDays($interval);
			$dailySchedules = $this->mschedule->byDate($date);
			
			foreach ($dailySchedules as &$dailySchedule) {
				$dateTime = explode(" ", $dailySchedule->training_date);
				$dailySchedule->date = $dateTime[0];
				$dailySchedule->time = $dateTime[1];
			}
			
			$this->data['schedule'] = $dailySchedules;
		} else {
			$this->data['errorMessage'] = "Невалидна дата";
		}
		
		$this->_loadView();
	}
	
	function _isValidDateInterval() {
		$interval = $this->input->get("interval");
		return $interval >= 0 && $interval <= 6;
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mschedule");
	}
	
	function _isValidRequest() {
		return TRUE;
	}
	
	function _loadView() {
		$this->load->view('vschedule', $this->data);
	}
	
	public function _processRequest() {
		$schedules = array();
		for ($interval = 0 ; $interval < 7 ; $interval++) {
			$dailySchedules = $this->mschedule->byDate($this->_getTheDateAfterNDays($interval));

			foreach ($dailySchedules as &$dailySchedule) {
				$dateTime = explode(" ", $dailySchedule->training_date);
				$dailySchedule->date = $dateTime[0];
				$dailySchedule->time = $dateTime[1];
			}
			
			array_push($schedules, $dailySchedules);
		}

		$this->data['schedules'] = $schedules;
		$this->_loadView();
	}
	
	private function _getTheDateAfterNDays($numberOf) {
		$date = date_create(date("d.m.Y"));
		date_add($date, date_interval_create_from_date_string("$numberOf days"));
		return $date;
	}
}
