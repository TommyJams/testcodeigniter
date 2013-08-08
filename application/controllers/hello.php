<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller{

	public function index(){
		 echo "You are in index";
		 echo "\n";
		 $this->addstuff();
	}


	public function you(){
		// echo "this is you";
		$this->load->view('helloview');
	}

	public function addstuff(){
		$this->load->model("math");
		echo $this->math->add(2, 2);
	}
}
?>