<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbconnect extends CI_Controller{

	public function connectFb(){

		ob_start();
		// Path to PHP-SDK
		require 'src/facebook.php';

		/*define('FACEBOOK_APP_ID', '566516890030362');
		define('FACEBOOK_SECRET', '731fb276b0e0e1a8a77ecbdf72e2591b'); */

		define('FACEBOOK_APP_ID', '204029036428158');
		define('FACEBOOK_SECRET', '74203bd7fc3f0100d2c02ad74b28b308'); 
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

        $this->input->get('registered');

  			if ($_GET['registered']=='no')
			 	   $this->load->view('fbConnect1_view', $data1);

        elseif ($_GET['registered']=='fbregistered') //User registered just now
        {
            //enter into database
            if ($_REQUEST) 
            {
              //echo '<p>signed_request contents:</p>';
              $response = parse_signed_request($_REQUEST['signed_request'], FACEBOOK_SECRET);
              //echo '<pre>';
              //print_r ($response);
              //echo '</pre>';
              
              //$verification = check_registration($response,$fb_fields);
              if($response)
              {
                $fbid=$response["user_id"]; 
                //  include("connect.php");
                $this->load->helper('connect');          
                $query_check1 = "SELECT * FROM `$database`.`members` WHERE fb_id = '$fbid'";
                $result_check1 = mysql_query($query_check1);  

                //if user is logged in on facebook but has never registered on tommyjams
                if(mysql_num_rows($result_check1) != 0)
                {
                  print ("
                    <br><br>
                    You are already registered with us. Try logging in again. In case of any issues, please contact us.
                    <br><br><br>
                    <center><a href='index.php' style='width:120px; height:20px; background:#ffcc00;'>Continue</a></center>
                  ");
                }
                else
                {
                  $email=$response["registration"]["email"];
                  $password=rand(111111,9999999);
                  //$password=$response["registration"]["password"];
                  $password=md5($password);
                  $username=mysql_real_escape_string($response["registration"]["name"]);
                  $city_country=$response["registration"]["location"]["name"];
                  $split=explode(",", $city_country); //Eg. Split "Bangalore, India" into "Bangalore" and "India"
                  if ($split[2]) //Eg. "Bankok, Krung Thep, Thailand"
                  {
                    $city=addslashes($split[0]);
                    $state=trim($split[1]);
                    $state=addslashes($state);
                    $country=trim($split[2]);
                    $country=addslashes($country);
                  }
                  else //Eg. "Bangalore, India"
                  {
                    $city=addslashes($split[0]);
                    $state="";
                    $country=trim($split[1]);
                    $country=addslashes($country);
                  }
                  $you=$fbid;
                  $birth=$response["registration"]["birthday"];
                  $fb=addslashes('http://www.facebook.com/').$fbid;
                  $gender=$response["registration"]["gender"];
                  $phone=$response["registration"]["phone"];
                  $organization=mysql_real_escape_string($response["registration"]["org"]);
                  $actual_type=$response["registration"]["usertype"];
                  if($actual_type=='promoter'){$what="Promoter";}
                  elseif($actual_type=='venue'){$what="Promoter";}
                  elseif($actual_type=='artist'){$what="Artist";}
                  else{$what="Artist";}

                  //print_r($user_profile);
                  $fb_username=mysql_real_escape_string($user_profile["username"]);
                  $about=$user_profile["bio"];
                  $about=addslashes($about);
                  /*
                  $emp=$user_profile["work"]["0"]["employer"]["name"];
                  $emp=addslashes($emp);
                  $emp_position=$user_profile["work"]["0"]["position"]["name"];
                  $emp_position=addslashes($emp_position);
                  $student="Student";
                  $student=$user_profile["education"]["0"]["school"]["name"];
                  $student=addslashes($student);
                  if($emp!=""){$job="Work as"; $organization=$emp;}else{$job="Studying"; $organization=$student;}
                  */
                  
                  // include("connect.php");
                  $this->load->helper('connect');
                  /*
                  $SQLs = "SELECT id FROM `$database`.`members`";
                  $results = mysql_query($SQLs);
                  while ($a = mysql_fetch_assoc($results))
                  {
                    $id=$a["id"];
                  }
                  $id=$id+1;
                  $ida=$id*15993;
                  $link="$ida";
                  */
                  $ip=$_SERVER['REMOTE_ADDR'];

                  $query = "INSERT INTO `$database`.`members` (`id`, `type`, `actual_type`, `dob`, `name`, `username`, `fb_username`,`password`, `email`, `mobile`, `fb_id`, `city`, `state`,`country`, `about`, `gender`, `fb`, `status`, `job`, `user`, `ip`, `time`)
                                     VALUES (NULL, '$what', '$actual_type', '$birth', '$organization', '$username', '$fb_username', '$password', '$email', '$phone', '$fbid', '$city', '$state', '$country', '$about', '$gender', '$fb', '1', '$job', '$fbid', '$ip', CURRENT_TIMESTAMP)";

                  $ress = mysql_query($query);
                  if (!$ress)
                  {
                    echo 'Database query failed:'. mysql_error();
                  }
                  else
                  {
                    print ("
                    <br><br>
                    You are successfully registered
                    <br><br><br>
                    <table border=0>
                      <tr><td width=150>Band/Organisation</td><td>$organization</td></tr>
                      <tr><td width=150>User Name</td><td>$username</td></tr>
                      <tr><td>Email</td><td>$email</td></tr>
                      <tr><td>City</td><td>$city</td></tr>
                    </table>
                    <br><br><br>
                    <center><a href='fbconnect?registered=yes' style='width:120px; height:20px; background:#ffcc00;'>Continue</a></center>
                    "); 
                  }
                }    
              }    
            } 
          }     	
  	}
} 	
?>

