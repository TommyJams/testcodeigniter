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

	public function contactFunc(){

		$values=array
			(
				'contact-form-name'						=> $_POST['cf_name'],
				'contact-form-mail'						=> $_POST['cf_email'],
				'contact-form-message'					=> $_POST['cf_message']
			);

		$to = "contact@tommyjams.com";
		$sender = "alerts@tommyjams.com";
		$subject = "Query received";

		$this->load->library('contactform/Template');
		$Template=new Template($values,'default.php');
		$body=$Template->output();
			
		$this->load->helper('contactmail');
	    $error = send_email($to, $sender, $subject, $body);

	    error_log("Error Value: ".$error);

	   	if($error)
	    	$err = 0;
	    else 
	    	$err = 1;

	    $response['error'] = $err;

	    $this->load->helper('functions');
		createResponse($response);
	}
}