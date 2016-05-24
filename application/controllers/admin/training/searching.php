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
		$this->load->model("mtrainings");
		$this->load->model("mtrainingtypes");
	}
	
	function _loadView() {
		$this->load->view("admin/training/vsearch", $this->data);
	}
	
	function _additionalViewData() {
		$this->data["trainingTypes"] = $this->mtrainingtypes->findAll();
	}
	
	function _isValidRequest() {
		return TRUE;
	}
	
	function _processRequest() {
		$trainingTypeId = $this->input->post("trainingType");
		if ($trainingTypeId === NULL) {
				return $this->_loadView();
		}
		
		$trainingTypeId = $this->security->xss_clean($trainingTypeId);
		$trainings = $this->mtrainings->findByTrainingTypeId($trainingTypeId);
		
		if (empty($trainings)) {
			$this->data["noResultsFound"] = "Няма намерени резултати за търсената от вас дата.";
		} else {
			$this->data["trainings"] = $trainings;
		}
		
		$this->_loadView();
	}
}