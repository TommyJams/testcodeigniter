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

	public function contactHelpFunc(){

		error_log("hello");
		$to = "alerts@tommyjams.com";
		$message = $_POST['cf_message'];
		$name = $_POST['cf_name'];

		$sender = $_POST['cf_email'];
		$subject = "Query received";
		$mess="<p style='text-align:left;'> $name has send you following message: $message </p>";
			
		$this->load->helper('mail');
	    $error = send_email($to, $sender, $subject, $mess);

	    if($error)
	    	$err = 0;
	    else
	    	$err = 1;

	    $response['error'] = $err;

	    $this->load->helper('functions');
		createResponse($response);
	}
}