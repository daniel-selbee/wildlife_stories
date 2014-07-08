<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	public function __construct() {
		parent::__construct();
	}


	// HEADER
	public function header($title, $pageTitle) {

		$data['title'] = $title;
		$data['pageTitle'] = $pageTitle;
		$this->load->view("header", $data);
	}


	// FOOTER
	public function footer() {

		$this->load->view("footer");
	}



}
