<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artist extends CI_Controller{

	public function artistpage(){
		ob_start();

		$sessionArray = $this->session->all_userdata();
		$database = 'tommyjam_test';

		if (!isset($sessionArray['session_id'])) {
		session_start();
		}

		if(!isset($sessionArray['username_artist']))
		{
			header("Location: index");
			exit;
		}
		
		$username=$sessionArray['username_artist'];
		error_log($username);
		$password=md5($sessionArray['password_artist']);

		$SQLs = "SELECT * FROM `$database`.`members` WHERE fb_id='$username'";
		$results = mysql_query($SQLs);
		$type = "";
		$user = "";
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

		$users = "";
		if($type=="Promoter"){     $users="images/promoter/$user";; }
 		elseif($type=="Artist"){     $users="images/artist/$user"; }
		if(!file_exists($users) && $user==""){$users="images/profile.jpg";}
		else if(!file_exists($users) && $user!=""){$users="https://graph.facebook.com/"."$user/picture&type=large";}

		// loading artist_view file
		$this->load->view('artist_view');
	}

public function profilepage(){

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	// Initializing variables. 
	// Codeigniter throws "undefined variable" error on un-intialized variables.
	$type = "";
	$user = "";
	$nsilver = "";
	$id = "";
	
	if(isset($sessionArray['username_artist'])  && !isset($_GET['id']))
	{
		$username=$sessionArray['username_artist'];
		$password=md5($sessionArray['password_artist']);

		$SQLs = "SELECT * FROM `$database`.`members` WHERE fb_id='$username'";
		$results = mysql_query($SQLs);

		while ($a = mysql_fetch_assoc($results))
		{
			$id=$a["id"];$idaa=$id;$usernam=$a["username"];$name=$a["name"];$_SESSION['name']=$name;$email=$a["email"];
			$street=$a["add"];$city=$a["city"];$state=$a["state"];$country=$a["country"];$pincode=$a["pincode"];
			$mobile=$a["mobile"];
			$fb=$a["fb"];$twitter=$a["twitter"];$youtube=$a["youtube"];$myspace=$a["myspace"];$rever=$a["reverbnation"];
			$gplus=$a["gplus"];$display=$a["display"];$user=$a["user"];$type=$a["type"];$genre=$a["genre"];
			$job=$a["job"];$designation=$a["designation"];
			$artistrate=$a["artistrate"];$adminrate=$a["adminrate"];$about=$a["about"];
			$gold=$a["gold"];$silver=$a["silver"];$nsilver=$a["nsilver"];$bronze=$a["bronze"];$link=$a["link"];

			$response=$a;
		}
	}
	else if(isset($sessionArray['username'])  && !isset($_GET["id"]))
	{
		$username=$sessionArray['username'];
		$password=md5($sessionArray['password']);

		$SQLs = "SELECT * FROM `$database`.`members` WHERE fb_id='$username'";
		$results = mysql_query($SQLs);
		while ($a = mysql_fetch_assoc($results))
		{
			$id=$a["id"];$idaa=$id;$usernam=$a["username"];$name=$a["name"];$_SESSION['name']=$name;$email=$a["email"];
			$street=$a["add"];$city=$a["city"];$state=$a["state"];$country=$a["country"];$pincode=$a["pincode"];
			$mobile=$a["mobile"];
			$fb=$a["fb"];$twitter=$a["twitter"];$youtube=$a["youtube"];$myspace=$a["myspace"];$rever=$a["reverbnation"];$gplus=$a["gplus"];
			$display=$a["display"];$user=$a["user"];$type=$a["type"];$genre=$a["genre"];
			$job=$a["job"];$designation=$a["designation"];
			$artistrate=$a["artistrate"];$adminrate=$a["adminrate"];$about=$a["about"];
			$gold=$a["gold"];$silver=$a["silver"];$nsilver=$a["nsilver"];$bronze=$a["bronze"];$link=$a["link"];

			$response=$a;
		}
	}
	else
	{
		$SQLs = "SELECT * FROM `$database`.`members` WHERE link=$_GET[id]";
		$results = mysql_query($SQLs);

		if (mysql_num_rows($results) == 1) 
		{
			$a = mysql_fetch_array($results);
			$id=$a["id"];$idaa=$id;$usernam=$a["username"];$name=$a["name"];$_SESSION['name']=$name;$email=$a["email"];
			$street=$a["add"];$city=$a["city"];$state=$a["state"];$country=$a["country"];$pincode=$a["pincode"];
			$mobile=$a["mobile"];
			$fb=$a["fb"];$twitter=$a["twitter"];$youtube=$a["youtube"];$myspace=$a["myspace"];$rever=$a["reverbnation"];$gplus=$a["gplus"];
			$display=$a["display"];$user=$a["user"];$type=$a["type"];$genre=$a["genre"];
			$job=$a["job"];$designation=$a["designation"];
			$artistrate=$a["artistrate"];$adminrate=$a["adminrate"];$about=$a["about"];
			$gold=$a["gold"];$silver=$a["silver"];$nsilver=$a["nsilver"];$bronze=$a["bronze"];$link=$a["link"];

			$response=$a;
		}
		else {
			print('<br><br><br><br>No user Exist');
			exit;
		}
	}

	// Initializing variables before they are used. 
	// Codeigniter throws "undefined" error on un-intialized variables.
	$userRating = "";
	$users = "";

	if($nsilver>0)
		{$userRating=round(($gold/2+$silver/2),1);}
	else
		{$userRating=$gold;}

	if($about=="")
		{$about="Add details for this section by editing your profile";}

	if($type=="Promoter"){     $users="images/promoter/$user";$usersa="../images/promoter/$user";; }
 	elseif($type=="Artist"){     $users="images/artist/$user";$usersa="../images/artist/$user"; }

	if(!file_exists($usersa) && $user==""){$users="images/profile.jpg";}
	else if(!file_exists($usersa) && $user!=""){$users="https://graph.facebook.com/"."$user/picture?type=large";}

	$response['userRating'] = $userRating;
	$response['about'] = $about;
	$response['users'] = $users;

    if($type=="Promoter"){   
        $SQLs = "SELECT * FROM `$database`.`transaction` WHERE promoter_id=$link AND status=1 ORDER BY id DESC"; 
    }
    else if($type=="Artist"){   
        $SQLs = "SELECT * FROM `$database`.`transaction` WHERE artist_id=$link AND status=1 ORDER BY id DESC"; 
    }
    $results = mysql_query($SQLs);
	
	while ($a = mysql_fetch_assoc($results))
    {
        $gig_id=$a["gig_id"];$ar_name=$a["artist_name"];$pr_name=$a["promoter_name"];
        $ar_id=$a["artist_id"];$pr_id=$a["promoter_id"];
                               
        $SQL = "SELECT * FROM `$database`.`shop` WHERE link=$gig_id";
        $result = mysql_query($SQL);
        
        while ($b = mysql_fetch_assoc($result))
        {
        	$gig_name=$b["gig"];$v_state=$b["venue_state"];$v_city=$b["venue_city"];$v_date=$b["venue_date"];
        }
		
		$formattedDate = date('d-m-Y',strtotime($v_date));

	}	

$resp['gigsHistory'] = array( 
				"gig_name" => array($gig_name), 
				"ar_name" => array($ar_name), 
				"pr_name" => array($pr_name), 
				"formattedDate" => array($formattedDate), 
				"v_city" => array($v_city)
				);

	error_log(json_encode($resp));
	$this->load->helper('functions');
	createResponse($response);

	//$this->load->view('profile_subview');
	}
}
?>

