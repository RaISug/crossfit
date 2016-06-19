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
	
	/* public function persistData($objectID) {
		$imageName = $this->_generateImageName();
	
		if ($this->_uploadImage($imageName) === FALSE) {
			throw new Exception('Проблем при качването на снимка (размерът на снимката не трябва да надвишава 1МВ)');
		}
	
		$dishData = $this->_generateRowData($objectID);
		$imageName .= $this->upload->data()['file_ext'];
		$dishData['image_name'] = $imageName;
	
		if ($this->_insertInTable($dishData) === FALSE) {
			$this->_removeImageByName($imageName);
			throw new Exception('Проблем при записа на данните');
		}
	
		return TRUE;
	}
	
	function _generateImageName() {
		return microtime(true) * 10000;
	}
	
	function _uploadImage($imageName) {
		$config = $this->_getImageConfigurations($imageName);
	
		$this->load->library('upload');
		$this->upload->initialize($config);
	
		if (!$this->upload->do_upload()) {
			return FALSE;
		}
	
		return TRUE;
	}
	
	function _getImageConfigurations($imageName) {
		return array(
				'upload_path' => 'assets/foodImages',
				'allowed_types' => 'gif|jpg|png',
				'file_name' => $imageName,
				'max_size' => '1024',
				'max_width' => '2048',
				'max_height' => '1468'
		);
	}
	 */
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