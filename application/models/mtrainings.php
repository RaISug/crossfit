<?php

class MTrainings extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('trainings', $data);
	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function findAll() {
		return $this->db->get("trainings")->result_array();
	}
	
	public function findAllAndIncludeRelations() {
		return $this->db->query("SELECT t.*, tt.* FROM trainings t JOIN training_types tt ON tt.id = t.training_type_id")->result_array();
	}
	
	public function findByTrainingTypeId($trainingTypeId) {
		return $this->db->where("training_type_id", $trainingTypeId)->get("trainings")->result_object();
	}
	
	public function deleteById($trainingId) {
		$this->db->trans_begin();
		$this->db->where("id", $trainingId)->delete('trainings');
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
}