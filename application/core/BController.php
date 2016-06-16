<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//TODO: Move all functions that are not used for request processing
    
class BController extends CI_Controller {
	
    /*
     * За да се позволи използването на debug logging трябва
     * да се промени $config['log_threshold'] = 0; да бъде
     * равно на $config['log_threshold'] = 2; 
     * 2 е индикатор за debug режим
     */
	
    public function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data["debugMessage"] = "";
        $this->data['is_debug_enabled'] = FALSE;
        $this->data['is_profiler_enabled'] = FALSE;
        $this->data['isUserLoggedIn'] = $this->_isUserLoggedIn();
        $this->data['userRole'] = $this->session->userdata('role_id');
        $this->data['currentlyLoggedUser'] = $this->session->userdata('user_id');
        $this->_loadModelsAndLibraries();
    }

    function _loadModelsAndLibraries() {
        
    }

    public function _startRequestProcessing() {
        if ($this->_isUserInRole() === FALSE) {
        	return redirect(base_url("forbidden"));
        }
        
        $this->_validationRules();
        $this->_errorMessages();
        $this->_requestProfiling();
        $this->_additionalViewData();

        if ($this->_isValidRequest() == FALSE) {
            $this->_logRequest($this->data['debugMessage']);
            $this->_loadView();
        } else {
            $this->_processRequest();
        }
    }

    public function _isUserInRole() {
        return TRUE;
    }
    
    public function _validationRules() {
        
    }

    public function _errorMessages() {
        
    }

    function _requestProfiling() {
        if ($this->data['is_profiler_enabled'] !== FALSE) {
            $this->output->enable_profiler();
        }
    }

    public function _isValidRequest() {
        return $this->form_validation->run();
    }

    function _logRequest($logMessage) {
        if ($this->data['is_debug_enabled'] !== FALSE) {
            log_message('debug', $logMessage);
        }
    }

    public function _additionalViewData() {
        
    }

    public function _loadView() {
        $this->load->view('template', $this->data);
    }

    public function _processRequest() {
        
    }

    function _isUserLoggedIn() {
        if ($this->session->userdata('user_id') === FALSE) {
            return FALSE;
        } else if ($this->session->userdata('user_id') === NULL) {
        	return FALSE;
        }
        return TRUE;
    }
    
    function _showLoginPage($originPath = "", $originQueryString = "") {
    	if ($originPath === "") {
    		redirect(base_url("login"));
    	} else if ($originQueryString === "") {
    		redirect(base_url("login?originPath=" . $originPath));
    	} else {
    		redirect(base_url("login?originPath=" . $originPath . "&originQueryString=(" . $originQueryString . ")"));
    	}
    }
    
    function _isClient() {
        return $this->session->userdata('role_id') === '0';
    }

    function _isAdmin() {
        return $this->session->userdata('role_id') === '1';
    }
    
    function _extractQueryString($originQueryString) {
    	if ($originQueryString === NULL) {
    		return "";
    	}
    
    	$queryString = str_replace("(", "", $originQueryString);
    	$queryString = str_replace(")", "", $queryString);
    
    	return $queryString;
    }

}
