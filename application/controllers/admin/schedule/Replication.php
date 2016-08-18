<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Replication extends BController {
	
	public function index() {
		
	}
	
	public function daily() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		
		$this->_processDailyReplication();
	}
	
	public function weekly() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		
		$this->_processWeeklyReplication();
	}
	
	private function _processDailyReplication() {
		$this->_loadModelsAndLibraries();
		$this->_validationRules();
		$this->_errorMessages();

		if ($this->_isValidRequest() === FALSE) {
			return $this->_loadDailyView();
		}
		
		$dayToCopyFrom = $this->security->xss_clean($this->input->post("copy_from"));
		
		$schedules = $this->mschedule->byDay($dayToCopyFrom);
		
		if (count($schedules) === 0) {
			$this->data['errorMessage'] = "Няма тренировки за посочената дата.";
			return $this->_loadDailyView();
		}
		
		$dayToCopyTo = $this->security->xss_clean($this->input->post("copy_to"));
		
		try {
			$this->_replicateDailySchedules($schedules, $dayToCopyTo);
			redirect(base_url("admin/schedule/replication/daily"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadDailyView();
		}
	}
	
	private function _processWeeklyReplication() {
		$this->_loadModelsAndLibraries();
		$this->_validationRules();
		$this->_errorMessages();
		
		if ($this->_isValidRequest() === FALSE) {
			return $this->_loadWeeklyView();
		}
		
		$weekToCopyFrom = $this->security->xss_clean($this->input->post("copy_from"));
		
		$schedules = $this->mschedule->byWeek($weekToCopyFrom);
		
		if (count($schedules) === 0) {
			$this->data['errorMessage'] = "Няма тренировки за посочената седмица.";
			return $this->_loadWeeklyView();
		}
		
		$weekToCopyTo = $this->security->xss_clean($this->input->post("copy_to"));
		
		try {
			$this->_replicateWeeklySchedules($schedules, $weekToCopyTo);
			redirect(base_url("admin/schedule/replication/weekly"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadWeeklyView();
		}
	}
	
	function _replicateDailySchedules($schedules, $dayToCopyTo) {
		foreach ($schedules as $schedule) {
			$trainingTime = date("H:i:s", strtotime($schedule['training_date']));
			
			$scheduleData = array(
				"training_id" => $schedule['training_id'],
				"training_date" => date($dayToCopyTo . " " . $trainingTime)
			);
			$this->mschedule->persist($scheduleData);
		}
	}

	function _replicateWeeklySchedules($schedules, $weekToCopyTo) {
		foreach ($schedules as $schedule) {
			$newWeekNumber = date("W", strtotime($weekToCopyTo));
			$scheduleWeekNumber = date("W", strtotime($schedule['training_date']));
			
			$weekToAdd = intval($newWeekNumber) - intval($scheduleWeekNumber);
			
			$trainingDate = $schedule['training_date'];
			
			if ($weekToAdd >= 0) {
				$trainingDate .= " +";
			} else {
				$trainingDate .= " -";
			}
			
			$trainingDate .= $weekToAdd . " week";
			
			$scheduleData = array(
					"training_id" => $schedule['training_id'],
					"training_date" => date('Y-m-d H:i:s', strtotime($trainingDate))
			);
			$this->mschedule->persist($scheduleData);
		}
	}
	
	function _loadDailyView() {
		$this->load->view("admin/schedule/dailyReplication", $this->data);
	}
	
	function _loadWeeklyView() {
		$this->load->view("admin/schedule/weeklyReplication", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('copy_from', "Дата", 'required|trim');
		$this->form_validation->set_rules('copy_to', "Дата", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mschedule");
	}
}