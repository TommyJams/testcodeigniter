<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function index()
	{
		 echo "We are in index";
		 $this->you();
	}


	public function you()
	{
		// echo "this is you";
		$this->load->view('helloview');
	}
}
?>