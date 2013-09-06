<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promoter extends CI_Controller{

	public function promoterpage(){
		ob_start();

		error_log(1);
		$sessionArray = $this->session->all_userdata();
		error_log($sessionArray);
		$database = 'tommyjam_test';

		if (!isset($sessionArray['session_id'])) {
		session_start();
		}

		if(!isset($sessionArray['username']))
		{
			redirect('http://testcodeigniter.azurewebsites.net/index');
			exit;
		}
		
		$username=$sessionArray['username'];
		$password=md5($sessionArray['password']);

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
		$this->load->view('promoter_view');
	}

public function profilepage(){

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	// Initializing variables. 
	// Codeigniter throws "undefined variable" error on un-intialized variables.
	$type = "";
	$user = "";
	$nsilver = "";
	//$id = "";
	
	if(isset($sessionArray['username_artist'])  && !isset($_POST['id']))
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
	else if(isset($sessionArray['username'])  && !isset($_POST["id"]))
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
		$link = $_POST['id'];
		error_log("Post ID: ".$link);

		$SQLs = "SELECT * FROM `$database`.`members` WHERE link='$link'";
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
			error_log('No user Exist');
			exit;
		}
	}

	error_log('1');
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

	error_log('2');

	if($type=="Promoter"){     $users="images/promoter/$user";$usersa="../images/promoter/$user";; }
 	elseif($type=="Artist"){     $users="images/artist/$user";$usersa="../images/artist/$user"; }

	if(!file_exists($usersa) && $user==""){$users="images/profile.jpg";}
	else if(!file_exists($usersa) && $user!=""){$users="https://graph.facebook.com/"."$user/picture?type=large";}

	error_log('3');

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

	error_log('4');

	while ($a = mysql_fetch_assoc($results))
    {
    	error_log('5');

        $gig_id=$a["gig_id"];$ar_name=$a["artist_name"];$pr_name=$a["promoter_name"];
        $ar_id=$a["artist_id"];$pr_id=$a["promoter_id"];
                               
        $SQL = "SELECT * FROM `$database`.`shop` WHERE link=$gig_id";
        $result = mysql_query($SQL);
        
        while ($b = mysql_fetch_assoc($result))
        {
        	$gig_name=$b["gig"];$v_state=$b["venue_state"];$v_city=$b["venue_city"];$v_date=$b["venue_date"];
        }
		
		$formattedDate = date('d-m-Y',strtotime($v_date));

		$gigRow = array($gig_name, $pr_id, $pr_name, $ar_id, $ar_name, $formattedDate, $v_city);

		$response['gigHistory'][] = $gigRow;

		error_log('6');
	}	

	error_log('7');
	$this->load->helper('functions');
	createResponse($response);

	//$this->load->view('profile_subview');
	}
}
?>	
