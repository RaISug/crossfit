<?php

class MBookings extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function byScheduleId($scheduleId) {
		return $this->db->where("schedule_id", $schedule_id)->get("bookings")->result_array();
	}
	
}