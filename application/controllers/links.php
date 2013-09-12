<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Links extends CI_Controller{

	public function aboutus(){
		$this->load->view('links/aboutus');
	}

	public function terms(){
		$this->load->view('links/terms');
	}

	public function careers(){
		$this->load->view('links/careers');
	}

	public function press(){
		$this->load->view('links/press');
	}

	public function advertise(){
		$this->load->view('links/advertise');
	}

	public function help(){
		$this->load->view('links/help');
	}

}