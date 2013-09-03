<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller{

	public function betalandingpage(){
		// echo "this is you";

		ob_start();

		if (!isset($this->session->userdata('session_id'))) {
			session_start();
		}

		if(isset($this->session->userdata('username'))) {
		//header("Location: promoter.php?success=1");
		header("Location: promoter");	
		exit;
		}

		elseif(isset($this->session->userdata('username_artist'))) {
		//header("Location: artist.php?success=1");
		header("Location: artist");
		exit;
		} 
		
		$this->load->view('betapage_view');
	}
}
?>