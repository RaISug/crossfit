<?php

class MAlbums extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('albums', $data);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function findAll() {
		return $this->db->get('albums')->result_array();
	}

	public function findAllCoverAlbums() {
		$query = "SELECT a.*, (SELECT g.file_name FROM galery g WHERE g.album_id = a.id LIMIT 1) as file_name FROM albums a";
		return $this->db->query($query)->result_array();
	}
	
	public function deleteById($albumId) {
		$this->db->trans_begin();
		$this->db->where("id", $albumId)->delete("albums");
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function deleteByName($albumName) {
        $this->db->trans_begin();
        $this->db->where("name", $albumName)->delete('albums');
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            throw new Exception('Неуспешено изтриване на данните.');
        }
        $this->db->trans_commit();
	}
	
}