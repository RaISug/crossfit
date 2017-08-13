<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Creation extends BController {
	
	public function index() {
		if ($this->_isUserLoggedIn() === FALSE || $this->_isAdmin() === FALSE) {
			return redirect("errors/forbidden");
		}
		$this->_startRequestProcessing();
	}
	
	function _loadModelsAndLibraries() {
		$this->load->model("mnews");
		$this->load->model("mgalery");
	}

 	function _additionalViewData() {
 		$this->data['galeryFiles'] = $this->mgalery->findAllImages();
	}

	function _loadView() {
		$this->load->view("admin/news/vcreate", $this->data);
	}
	
	function _validationRules() {
		$this->form_validation->set_rules('title', "Заглавие", 'required|trim|is_unique[news.title]');
		$this->form_validation->set_rules('content', "Съдържание", 'required|trim');
		$this->form_validation->set_rules('news_date', "Дата", 'required|trim');
	}
	
	function _errorMessages() {
		$this->form_validation->set_message('required', 'Полете задължително трябва да бъде попълнено');
		$this->form_validation->set_message('is_unique', 'Вече съществува заглавие с това име');
	}
	
	function _processRequest() {
		$content = $this->input->post("content");
		$title = $this->security->xss_clean($this->input->post("title"));
		$newsDate = $this->security->xss_clean($this->input->post("news_date"));
		
		$newsData = array(
				"title" => $title,
				"content" => $content,
				"news_date" => $newsDate
		);
		
		try {
			$this->mnews->persist($newsData);
			redirect(base_url("admin/news/creation"));
		} catch (Exception $exception) {
			$this->data["errorMessage"] = $exception->getMessage();
			$this->_logRequest($exception->getMessage());
			$this->_loadView();
		}
	}
}