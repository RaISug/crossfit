<?php

class MTrainingTypes extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('training_types', $data);
	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function findAll() {
		return $this->db->get("training_types")->result_array();
	}
}