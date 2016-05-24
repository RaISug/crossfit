<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Creation extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("login");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mtrainings");
		$this->load->model("mtrainingtypes");
	}
	
	function _loadView() {
		$this->load->view("admin/training/vcreate", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["trainingTypes"] = $this->mtrainingtypes->findAll();
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('trainingType', "Тип тренировка", 'required|trim|numeric');
		$this->form_validation->set_rules('description', "Дата", 'required|trim');
		$this->form_validation->set_rules('duration', "Час", 'required|trim');
		$this->form_validation->set_rules('seats', "Час", 'required|trim|numeric');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('numeric', 'Не може да въвеждате символи.');
	}
	
	function _processRequest() {
		$trainingTypeId = $this->security->xss_clean($this->input->post("trainingType"));
		$description = $this->security->xss_clean($this->input->post("description"));
		$duration = $this->security->xss_clean($this->input->post("duration"));
		$seats = $this->security->xss_clean($this->input->post("seats"));
		
		$trainingData = array(
			"training_type_id" => $trainingTypeId,
			"description" => $description,
			"duration" => $duration,
			"seats_count" => $seats
		);
		
		try {
			$this->mtrainings->persist($trainingData);
			redirect(base_url("admin/training/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}