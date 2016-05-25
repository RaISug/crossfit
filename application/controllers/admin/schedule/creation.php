<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Creation extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mtrainings");
		$this->load->model("mschedule");
	}
	
	function _loadView() {
		$this->load->view("admin/schedule/vcreate", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["trainings"] = $this->mtrainings->findAll();
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('training', "Тренировка", 'required|trim|numeric');
		$this->form_validation->set_rules('schedule_date', "Дата", 'required|trim');
		$this->form_validation->set_rules('schedule_time', "Час", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _processRequest() {
		$trainingId= $this->security->xss_clean($this->input->post("training"));
		$date = $this->security->xss_clean($this->input->post("schedule_date"));
		$time = $this->security->xss_clean($this->input->post("schedule_time"));
		
		$dateTime = date($date . " " . $time . ":00");

		$scheduleData = array(
			"training_id" => $trainingId,
			"training_date" => $dateTime
		);
		
		try {
			$this->mschedule->persist($scheduleData);
			redirect(base_url("admin/schedule/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}