<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Betapage extends CI_Controller{

	public function betalandingpage(){
		// echo "this is you";

	//	ob_start();
	//	$this->load->library('session');

/*		if (!isset($_SESSION)) {
			session_start();
		}

		if(isset($_SESSION['username'])){
		header("Location: promoter.php?success=1");
		exit;
		}

		elseif(isset($_SESSION['username_artist'])){
		header("Location: artist.php?success=1");
		exit;
		} */
		
		$this->load->view('betapage_view');
	}

}
?>