<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbconnect extends CI_Controller{

	public function connectFb(){

		ob_start();
		// Path to PHP-SDK
		require 'src/facebook.php';

		/*define('FACEBOOK_APP_ID', '566516890030362');
		define('FACEBOOK_SECRET', '731fb276b0e0e1a8a77ecbdf72e2591b'); */

		define('FACEBOOK_APP_ID', '345757728821408');
		define('FACEBOOK_SECRET', '42aeca9ddfaf5cb977f2d136a24dcbd1'); 
		$facebook = new Facebook(array(
  		/*'appId'  => '345757728821408',
  		'secret' => '42aeca9ddfaf5cb977f2d136a24dcbd1',*/
  		'appId'  => FACEBOOK_APP_ID,
  		'secret' => FACEBOOK_SECRET,
		));

		$fb_fields="[{'name':'name'},{'name':'email'},{'name':'location'},{'name':'birthday'},{'name':'usertype','description':'User Type','type':'select','options':{'artist':'Artist','venue':'Venue','promoter':'Promoter'},'default':'artist'},{'name':'org','description':'Band/Organisation Name','type':'text'},{'name':'phone','description':'Phone Number','type':'text'},]";
 
		// See if there is a user from a cookie
		$user = $facebook->getUser();

		if ($user) {
  			try {
    			// Proceed knowing you have a logged in user who's authenticated.
    			$user_profile = $facebook->api('/me');
  			} catch (FacebookApiException $e) {
    			console.log('<pre>'.htmlspecialchars(print_r($e, true)).'</pre>');
    			$user = null;
  			}
		}
  		$params = array(
  		'scope' => 'read_stream, friends_likes, user_birthday, user_about_me, user_website, user_photos, user_location, user_hometown, user_interests, email',
		);
 
 		if ($user) {
  			$logoutUrl = $facebook->getLogoutUrl();
		} 
		else {
  			$loginUrl = $facebook->getLoginUrl($params);
		}

		function parse_signed_request($signed_request, $secret) {
  			list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  			// decode the data
  			$sig = base64_url_decode($encoded_sig);
  			$data = json_decode(base64_url_decode($payload), true);

  			if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    			error_log('Unknown algorithm. Expected HMAC-SHA256');
    			return null;
  			}

  			// check sig
  			$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  			if ($sig !== $expected_sig) {
    			error_log('Bad Signed JSON signature!');
    			return null;
  			}

  			return $data;
		}

		function base64_url_decode($input) {
    		return base64_decode(strtr($input, '-_', '+/'));
		}

		function verify_fields($f,$sf) {
    		//$fields = json_encode($sf);
			//print_r ($fields);
			//print_r ($f);
    		return (strcmp($fields,$f) === 0);
		}

		function check_registration($response, $fb_fields) {
        	if ($response && isset($response["registration_metadata"]["fields"])) {
            	$verified = verify_fields($response["registration_metadata"]["fields"], $fb_fields);

            	if (!$verified) { // fields don't match!
                	echo 'Registration metadata failed. Fields dont match.';
					return false;
            	}	
            	else { // we verified the fields, insert the Data to the DB
                	echo 'Registration metadata passed!';
					return true;
            	}
        	}
			echo 'Response not found.';
			return false;
  		}
  			
  			$data1['fb_fields']="[{'name':'name'},{'name':'email'},{'name':'location'},{'name':'birthday'},{'name':'usertype','description':'User Type','type':'select','options':{'artist':'Artist','venue':'Venue','promoter':'Promoter'},'default':'artist'},{'name':'org','description':'Band/Organisation Name','type':'text'},{'name':'phone','description':'Phone Number','type':'text'},]";
  			$data1['appId']= FACEBOOK_APP_ID;

  			//	if ($_GET['registered']=='no')
			$this->load->view('fbConnect1_view', $data1);

		// elseif ($_GET['registered']=='fbregistered')

  		
  	}
	
/*	public function checkRegistrationStatus(){
		if ($_GET['registered']=='no')
			$this->load->view('fbConnect1_view','FACEBOOK_APP_ID');


	}*/
} 	
?>

