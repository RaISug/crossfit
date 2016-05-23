<?php

class MUsers extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library("bcrypt");
	}

	public function isEmailAndPasswordCorrect($email, $password) {
		$this->db->where('email', $email);
		$queryResult = $this->db->get('users');
	
		if ($queryResult->num_rows() == 1) {
			$queryResult = $queryResult->result_array();

			if ($this->bcrypt->check_password($password, $queryResult[0]['password'])) {
				$sessionData = array(
					'user_id' => $queryResult[0]['id'],
					'email' => $queryResult[0]['email'],
					'role_id' => $queryResult[0]['role_id'],
				);
				$this->session->set_userdata($sessionData);
				
				return TRUE;
			}
		}
		
		//TODO: add debug log that describes the unexpected behaivior
		return FALSE;
	}
	
}