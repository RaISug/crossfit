<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends BController {
	
	public function index() {
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mschedule");
	}
	
	function _isValidRequest() {
		return TRUE;
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
		$this->load->view('vschedule', $this->data);
	}
	
	private function _getTheDateAfterNDays($numberOf) {
		$date = date_create(date("d.m.Y"));
		date_add($date, date_interval_create_from_date_string("$numberOf days"));
		return $date;
	}
}
