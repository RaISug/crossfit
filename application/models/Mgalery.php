<?php

class MGalery extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('galery', $data);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function deleteById($galeryId) {
		$this->db->trans_begin();
		$this->db->where("id", $galeryId)->delete("galery");
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function deleteByName($name) {
		$this->db->trans_begin();
		$this->db->where("name", $name)->delete("galery");
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function findAll() {
		return $this->db->get("galery")->result_array();
	}
	
	public function byAlbumAndFileTypeId($albumId, $fileTypeId) {
		return $this->db->where("album_id", $albumId)->where("file_type", $fileTypeId)->get("galery")->result_object();
	}
	
}