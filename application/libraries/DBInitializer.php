<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dbinitializer {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->library('bcrypt');
    }

    public function initialize() {
        $this->_createUsersTable();
        $this->_createBookingsTable();
        $this->_createRolesTable();
        $this->_createSchedulesTable();
        $this->_createTrainingsTable();
        $this->_createTrainingTypesTable();
 }

    private function _createUsersTable() {
        if ($this->CI->db->table_exists('users') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `users` (" .
                    "`id` int(11) NOT NULL AUTO_INCREMENT, " .
                    "`email` varchar(128) COLLATE utf8_unicode_ci NOT NULL," .
                    "`password` varchar(256) COLLATE utf8_unicode_ci NOT NULL," .
                    "`first_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL," .
                    "`last_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL," .
                    "`role_id` int(11) NOT NULL," .
                    "PRIMARY KEY (`id`)," .
                    "UNIQUE (`email`)" .
                    ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

            $this->CI->db->trans_begin();
            
            $this->CI->db->query($query);
            $this->_insertAdminInDb();
            
            if ($this->CI->db->trans_status() === FALSE) {
                $this->CI->db->trans_rollback();
                throw new Exception('Неуспешно създаване на таблицата за потребителите.');
            }
            $this->CI->db->trans_commit();
        }
    }

    private function _insertAdminInDb() {
        $password = $this->CI->bcrypt->hash_password('some_password');
        
        $query = "INSERT INTO users (email, password, first_name, last_name, role_id)"
                . " VALUES ('some-email@gmail.com', '". $password ."', 'Първо', 'Второ', '1')";

        $this->CI->db->query($query);
    }

    private function _createBookingsTable() {
        if ($this->CI->db->table_exists('bookings') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `bookings` (" .
                    "`id` int(11) NOT NULL AUTO_INCREMENT," .
                    "`user_id` int(11) NOT NULL," .
                    "`schedule_id` int(11) NOT NULL," .
                    "PRIMARY KEY (`id`)" .
                    ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
            
            $this->CI->db->trans_begin();
            $this->CI->db->query($query);
            
            if ($this->CI->db->trans_status() === FALSE) {
                $this->CI->db->trans_rollback();
                throw new Exception('Неуспешно създаване на таблицата за резервации.');
            }
            $this->CI->db->trans_commit();
        }
    }

    private function _createRolesTable() {
        if ($this->CI->db->table_exists('roles') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `roles` (".
                     "`id` int(11) NOT NULL AUTO_INCREMENT,".
                     "`name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,".
                     "PRIMARY KEY (`id`),".
    				 "UNIQUE (`name`)".
                     ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
            
            $this->CI->db->trans_begin();
            $this->CI->db->query($query);
            
            if ($this->CI->db->trans_status() === FALSE) {
                $this->CI->db->trans_rollback();
                throw new Exception('Неуспешно създаване на таблицата за ролите.');
            }
            $this->CI->db->trans_commit();
        }
    }

    private function _createSchedulesTable() {
        if ($this->CI->db->table_exists('schedules') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `schedules` (".
                     "`id` int(11) NOT NULL AUTO_INCREMENT,".
                     "`training_id` int(11) NOT NULL,".
                     "`training_date` datetime NOT NULL,".
                     "PRIMARY KEY (`id`),".
                     "KEY `training_id` (`training_id`,`training_date`)".
                     ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
            
            $this->CI->db->trans_begin();
            $this->CI->db->query($query);
            
            if ($this->CI->db->trans_status() === FALSE) {
                $this->CI->db->trans_rollback();
                throw new Exception('Неуспешно създаване на таблицата за графиците.');
            }
            $this->CI->db->trans_commit();
        }
    }

    private function _createTrainingsTable() {
    	if ($this->CI->db->table_exists('trainings') === FALSE) {
            $query = "CREATE TABLE IF NOT EXISTS `trainings` (".
                     "`id` int(11) NOT NULL AUTO_INCREMENT,".
                     "`training_type_id` int(11) NOT NULL,".
                     "`description` text COLLATE utf8_unicode_ci NOT NULL,".
                     "`duration` time NOT NULL,".
                     "`seats_count` int(11) NOT NULL,".
                     "PRIMARY KEY (`id`)".
                     ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
            
            $this->CI->db->trans_begin();
            $this->CI->db->query($query);
            
            if ($this->CI->db->trans_status() === FALSE) {
                $this->CI->db->trans_rollback();
                throw new Exception('Неуспешно създаване на таблицата за тренировки.');
            }
            $this->CI->db->trans_commit();
        }
    }
    
    private function _createTrainingTypesTable() {
    	if ($this->CI->db->table_exists('training_types') === FALSE) {
    		$query = "CREATE TABLE IF NOT EXISTS `training_types` (".
    				"`id` int(11) NOT NULL AUTO_INCREMENT,".
    				"`name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,".
    				"PRIMARY KEY (`id`),".
    				"UNIQUE (`name`)".
    				") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
    
    		$this->CI->db->trans_begin();
    		$this->CI->db->query($query);
    
    		if ($this->CI->db->trans_status() === FALSE) {
    			$this->CI->db->trans_rollback();
    			throw new Exception('Неуспешно създаване на таблицата за тренировачни типове.');
    		}
    		$this->CI->db->trans_commit();
    	}
    }

}
