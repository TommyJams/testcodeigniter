<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artist extends CI_Controller{

	public function artistpage(){
		ob_start();

		$sessionArray = $this->session->all_userdata();

		if (!isset($sessionArray['session_id'])) {
		session_start();
		}

		if(!isset($sessionArray['username_artist']))
		{
			header("Location: index");
			exit;
		}
		
		$database = 'tommyjam_test';
		$username=$sessionArray['username_artist'];
		error_log($username);
		$password=md5($sessionArray['password_artist']);

		//include('connect.php');

		$SQLs = "SELECT * FROM `$database`.`members` WHERE fb_id='$username'";
		$results = mysql_query($SQLs);
		while ($a = mysql_fetch_assoc($results))
		{
			$id=$a["id"];$idaa=$id;$name=$a["name"];
			//$_SESSION['name']=$name;
			$sessionArray['name']=$name;
			$email=$a["email"];$street=$a["add"];$city=$a["city"];$state=$a["state"];$country=$a["country"];$pincode=$a["pincode"];
			$mobile=$a["mobile"];$fb=$a["fb"];$twitter=$a["twitter"];$youtube=$a["youtube"];$myspace=$a["myspace"];$rever=$a["reverbnation"];
			$gplus=$a["gplus"];$display=$a["display"];$user=$a["user"];$type=$a["type"];
			$job=$a["job"];$designation=$a["designation"];
			$artistrate=$a["artistrate"];$adminrate=$a["adminrate"];
		}

		if($type=="Promoter"){     $users="images/promoter/$user";; }
 		elseif($type=="Artist"){     $users="images/artist/$user"; }
		if(!file_exists($users) && $user==""){$users="images/profile.jpg";}
		else if(!file_exists($users) && $user!=""){$users="https://graph.facebook.com/"."$user/picture&type=large";}

		// loading artist_view file
		//$_SESSION = $this->session->all_userdata();
		$this->load-view('artist_view');
	}
}
?>

