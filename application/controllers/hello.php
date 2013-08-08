<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller{

	public function index(){
		// echo "You are in index";
		// $this->addstuff();
		 $this->you();
	}


	public function you(){
		// echo "this is you";
		$data['title'] = "Welcome";
		$data['val1'] = "2";
		$data['val2'] = "8";

		$this->load->model('math');

		$data['addTotal'] = $this->math->add($data['val1'], $data['val2']);
		$data['subTotal'] = $this->math->add($data['val1'], $data['val2']);

		$this->load->view('helloview', $data);
	}

	public function addstuff(){
		$this->load->model("math");
		echo $this->math->add(2, 2);
	}
}
?>