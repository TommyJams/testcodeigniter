<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index()
	{
		 echo "Hi, all";
		//$this->load->view('you_view');
	}


	public function you()
	{
		// echo "this is you";
		$this->load->view('you_view');
	}
}
?>