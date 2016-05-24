<?php

class MTrainingTypes extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function findAll() {
		return $this->db->get("training_types")->result_array();
	}
}