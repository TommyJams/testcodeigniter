<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller{

	public function sessionlogout(){
		ob_start();

		if (!isset($sessionArray['session_id'])) {
			session_start();
		}

		$username=$sessionArray['username'];
		$this->session->sess_destroy();
		redirect('http://testcodeigniter.azurewebsites.net/index');
		exit;
	}
}