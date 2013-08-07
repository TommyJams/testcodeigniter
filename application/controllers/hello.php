<?php

class Hello extends CI_Controller {

	
	public function you()
	{
		// echo "this is you";
		$this->load->view('you_view');
	}
}
?>