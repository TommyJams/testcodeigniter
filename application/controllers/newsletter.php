<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**************************************************************************/
	/**************************************************************************/

	class Newsletter extends CI_Controller{

		public function Newsletter() {

			parent::Controller(); 
		
		}

		function createResponse($response){
	 		echo json_encode($response);
	        exit;
	    }

	    function validateEmail($email){
	        if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i',$email,$result)) return(false);
	        else return(true);
	    }

		public function validateData(){

			$values=array
			(
				'newsletter-form-mail'		=> $_POST['newsletter-form-mail']
			);
			
			$response=array('error'=>0,'info'=>null);
			if($this->validateEmail($values['newsletter-form-mail'])==false)
			{
 				$response['error']=1;
 				$response['info'][]=array('fieldId'=>'newsletter-form-mail','message'=>'Please enter valid email address');	
				//$response['info'][]=array('fieldId'=>'newsletter-form-mail','message'=>NEWSLETTER_FORM_MSG_INVALID_DATA_MAIL);
				$this->createResponse($response);
			}

		}	

	}

?>