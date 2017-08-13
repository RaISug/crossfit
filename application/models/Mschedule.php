<?php

class MSchedule extends CI_Model {

	public function persist($scheduleData) {
		if ($this->isEntryAlreadyPersisted($scheduleData["training_id"], $scheduleData["training_date"])) {
			return;
		}

		$this->db->trans_begin();
		$this->db->insert('schedules', $scheduleData);
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешен запис на данните.');
		}
		$this->db->trans_commit();
	}
	
	private function isEntryAlreadyPersisted($trainingId, $trainingDate) {
		return count($this->byTrainingIdAndDate($trainingId, $trainingDate)) > 0;
	}
	
	public function byTrainingIdAndDate($trainingId, $trainingDate) {
		$query = "SELECT * FROM schedules WHERE training_id = ?"
				." AND DATE_FORMAT(training_date, '%d.%m.%Y') = DATE_FORMAT(?, '%d.%m.%Y')"
				." AND DATE_FORMAT(training_date, '%h:%m:%s') = DATE_FORMAT(?, '%h:%m:%s')";
		
		return $this->db->query($query, array($trainingId, $trainingDate, $trainingDate))->result_array();
	}

	public function deleteById($scheduleId) {
		$this->db->trans_begin();
		$this->db->where("id", $scheduleId)->delete('schedules');
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			throw new Exception('Неуспешено изтриване на данните.');
		}
		$this->db->trans_commit();
	}
	
	public function byDay($day) {
		$query = "SELECT * FROM schedules WHERE DATE_FORMAT(training_date, '%d.%m.%Y') = DATE_FORMAT(?, '%d.%m.%Y')";
		return $this->db->query($query, array($day))->result_array();
	}
	
	public function byWeek($week) {
		$query = "SELECT * FROM schedules WHERE DATE_FORMAT(training_date, '%v') = ?";
		return $this->db->query($query, array(date("W", strtotime($week))))->result_array();
	}
	
	public function forTheNextSevenDays() {
		$query = "SELECT schedules.id, training_types.name, trainings.seats_count,"
				." DATE_FORMAT(schedules.training_date, '%d.%m.%Y') AS training_date,"
				." DATE_FORMAT(schedules.training_date, '%h:%m:%s') AS training_time"
				." FROM schedules"
				." JOIN trainings ON trainings.id = schedules.training_id"
				." JOIN training_types ON training_types.id = trainings.training_type_id"
				." WHERE schedules.training_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)"
				." ORDER BY schedules.training_date";
		return $this->db->query($query)->result_array();		
	}
	
	public function replicateSchedules($schedules, $dayToCopyTo) {
		
	}
	
	public function byId($id) {
		return $this->db->where("id", $id)->get("schedules")->result_array();
	}
	
	public function byDate($date) {
		$query = "SELECT schedules.training_date, schedules.id,"
				 ." trainings.description, trainings.seats_count as available_seats,"
				 ." trainings.duration, training_types.name as training_type,"
				 ." (SELECT COUNT(*) as reserved_seats FROM bookings WHERE bookings.schedule_id = schedules.id) as reserved_seats"
				 ." FROM schedules"
				 ." JOIN trainings ON trainings.id = schedules.training_id"
				 ." JOIN training_types ON training_types.id = trainings.training_type_id"
				 ." WHERE"
				 ." DATE_FORMAT(schedules.training_date, '%d.%m.%Y') = ?"
	 			 ." ORDER BY schedules.training_date";
		return $this->db->query($query, array(date_format($date, "d.m.Y")))->result_object();
	}
	
	public function inDates($dates) {
		$this->_formatDatesTo($dates, "d.m.Y");

		$query = "SELECT schedules.training_date, trainings.id,"
				." trainings.description, trainings.seats_count as seats,"
				." trainings.duration, training_types.name as training_type"
     			." FROM schedules"
		 		." JOIN trainings ON trainings.id = schedules.training_id"
 				." JOIN training_types ON training_types.id = trainings.training_type_id"
 				." WHERE"
				." DATE_FORMAT(schedules.training_date, '%d.%m.%Y') IN ?";
		return $this->db->query($query, array($dates))->result_object();
	}
	
	private function _formatDatesTo(&$dates, $formatType) {
		foreach ($dates as &$date) {
			$date = date_format($date, $formatType);
		}
	}
}