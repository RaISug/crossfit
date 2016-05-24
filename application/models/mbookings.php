<?php

class MBookings extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function byScheduleId($scheduleId) {
		return $this->db->where("schedule_id", $schedule_id)->get("bookings")->result_array();
	}
	
	public function byScheduleAndUserId($scheduleId, $userId) {
		return $this->db->where("schedule_id", $scheduleId)->where("user_id", $userId)->get("bookings")->result_array();
	}
	
	public function persist($data) {
		$this->db->trans_begin();
		$this->db->insert('bookings', $data);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
}