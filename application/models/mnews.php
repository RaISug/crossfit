<?php

class MNews extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('news', $data);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function findAll() {
		return $this->db->get('news')->result_array();
	}
	
	public function deleteById($albumId) {
		$this->db->trans_begin();
		$this->db->where("id", $albumId)->delete("news");
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function deleteByName($albumName) {
        $this->db->trans_begin();
        $this->db->where("title", $albumName)->delete('news');
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            throw new Exception('Неуспешено изтриване на данните.');
        }
        $this->db->trans_commit();
	}
	
}