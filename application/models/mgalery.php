<?php

class MGalery extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		
		$fileName = $this->_generateFileName();
		if ($this->_uploadFile($fileName) === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Следните грешки възникнаха при опита да се качи файла: [' . strip_tags($this->upload->display_errors()) . ']');
		}
		
		$data['file_name'] = $fileName . $this->upload->data()['file_ext'];
		
		$this->db->insert('galery', $data);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	function _generateFileName() {
		return strval(time());
	}

	function _uploadFile($fileName) {
		$config = $this->_getImageConfigurations($fileName);
	
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload('file')) {
			return FALSE;
		}
	
		return TRUE;
	}

	function _getImageConfigurations($fileName) {
		return array(
				'upload_path' => 'assets/files',
				'allowed_types' => '*',
				'file_name' => $fileName,
				'max_size' => '10240',
				'max_width' => '2048',
				'max_height' => '1468',
				'remove_spaces' => TRUE
		);
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

	public function findAllImages() {
		return $this->db->where('file_type', 1)->get("galery")->result_array();
	}
	
	public function findAllVideos() {
		return $this->db->where('file_type', 2)->get("galery")->result_array();
	}

	public function byAlbumAndFileTypeId($albumId, $fileTypeId) {
		return $this->db->where("album_id", $albumId)->where("file_type", $fileTypeId)->get("galery")->result_array();
	}
	
}