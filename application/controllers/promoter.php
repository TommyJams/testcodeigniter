<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promoter extends CI_Controller{

	public function promoterpage(){
		ob_start();

		$sessionArray = $this->session->all_userdata();
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
		
		// Initializing variables
		$type = "";
		$user = "";
		
		while ($a = mysql_fetch_assoc($results))
		{
			$id=$a["id"];$idaa=$id;$name=$a["name"];
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

		$gigRow = array($gig_name, $pr_id, $pr_name, $ar_id, $ar_name, $formattedDate, $v_city, $gig_id);

		$response['gigHistory'][] = $gigRow;
	}	

	$this->load->helper('functions');
	createResponse($response);

	//$this->load->view('profile_subview');
	}

public function mygigs(){
	ob_start();

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	if (!isset($sessionArray['session_id'])) {
		session_start();
	}
	if(isset($sessionArray['username']))
	{
		$username=$sessionArray['username'];
		$password=md5($sessionArray['password']);
	}
	else
	{
		$this->sessionlogout();
		exit;
	}

	$q2 = "SELECT link FROM `$database`.`members` WHERE fb_id='$username'";
    $result_set2 = mysql_query($q2);	
    if (mysql_num_rows($result_set2) == 1) 
    {
        $found = mysql_fetch_array($result_set2);
        $promoter_id=$found["link"];
    } 
    $SQLs = "SELECT * FROM `$database`.`shop`  WHERE promoter=$promoter_id ORDER BY id DESC";
    $results = mysql_query($SQLs);                                                                

    while ($a = mysql_fetch_assoc($results))
    {
        $id=$a["id"];$gig=$a["gig"];$cat=$a["category"];
        $add=$a["venue_add"];$city=$a["venue_city"];$state=$a["venue_state"];$country=$a["venue_country"];
        $pincode=$a["venue_pin"];
        $date=$a["venue_date"];$vtime=$a["venue_time"]; $formattedDate = date('d-m-Y',strtotime($date));
        $period=$a["period"];
        $status=$a["status"];$link=$a["link"];
    	$desc=$a["desc"];$budget_min=$a["budget_min"];$budget_max=$a["budget_max"];$time=$a["time"];   

    	$response = $a;                    
	}

	$this->load->helper('functions');
	createResponse($response);
}

public function sessionlogout(){

	ob_start();
	$sessionArray = $this->session->all_userdata();
	
	if (!isset($sessionArray['session_id'])) {
		session_start();
	}

	$username=$sessionArray['username'];
	$this->session->sess_destroy();
	redirect('http://testcodeigniter.azurewebsites.net/index');
	exit;
}

public function gigProfilePage(){

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	$user_id = $_POST['id']; 
	error_log($user_id);

	$SQLs = "SELECT * FROM `$database`.`shop` WHERE link='$user_id'";
	$results = mysql_query($SQLs);
	$a = mysql_fetch_array($results);
	{
		$id=$a["id"];$gig=$a["gig"];$cat=$a["category"];
		$add=$a["venue_add"];$city=$a["venue_city"];$state=$a["venue_state"];
		$country=$a["venue_country"];$pincode=$a["venue_pin"];
		$fb=$a["fb"];$twitter=$a["twitter"];$web=$a["web"];
		$date=$a["venue_date"];$vtime=$a["venue_time"];$duration=$a["duration"];
		$formattedDate = date('d-m-Y',strtotime($date));
		$period=$a["period"];$promoter_name=$a["promoter_name"];$promoter=$a["promoter"];
	
		/*$SQLs = "SELECT mobile FROM `$database`.`members` WHERE link='$promoter'";
		$result = mysql_query($SQLs);
		$b = mysql_fetch_array($result);
		{$mobile=$b["mobile"];}*/
	
		//if(!isset($_SESSION["username"])){$mobile=$mobile[0]." * * * * * * * *";}
			
		$status=$a["status"];$link=$a["link"];$image=$a["image"];
		$desc=$a["desc"];$budget_min=$a["budget_min"];
		$budget_max=$a["budget_min"]+$a["budget_min"]*$a["budget_max"]/100;$time=$a["time"];

		$response = $a;
	}

	if($image=="")
	{
		$image="gigs.jpg";
	}

	$gigs="images/gig/$image";
	$response['gigs'] = $gigs;

	$todayTime = strtotime(date("Y-m-d"));
	$dated = strtotime($date); 

	$username = $sessionArray['username']; 

	$yes=0;

	$SQLsa = "SELECT link FROM `$database`.`members` WHERE `fb_id`='$username'";
	$resultsa = mysql_query($SQLsa);
	if (!$resultsa)
		die("Database query failed: " . mysql_error());
	$pl = mysql_fetch_assoc($resultsa);
	$prolink=$pl["link"];

	//$link = $response["link"];
	error_log($link);

    $q4 = "SELECT * FROM `$database`.`transaction` WHERE gig_id=$link AND status=1";
    $result_set4 = mysql_query($q4);	
	if (mysql_num_rows($result_set4) == 1) 
    {
        $found = mysql_fetch_array($result_set4);
        $yes=1;
		$artist_booked_id=$found["artist_id"];
		$artist_booked_name=$found["artist_name"];

		$response['artist_booked_id'] = $artist_booked_id;
		$response['artist_booked_name'] = $artist_booked_name;

		$gigStatus = 1;
		$response['gigStatus'] = $gigStatus;	
		$yes = 1;	
    }

    //$promoter = $response["promoter"];
	elseif($promoter==$prolink)
	{
		$gigStatus = 2;
		$response['gigStatus'] = $gigStatus;
	}
    
    elseif(isset($sessionArray['username_artist']))
    { 
    	$gigSession = 1;
    	$username_artist = $sessionArray['username_artist'];
    	$q2 = "SELECT link FROM `$database`.`members` WHERE fb_id='$username_artist'";
        $result_set2 = mysql_query($q2);	    
        if (mysql_num_rows($result_set2) == 1) 
        {
            $found = mysql_fetch_array($result_set2);
            $artist_id = $found["link"];
        }

        $q4 = "SELECT * FROM `$database`.`transaction` WHERE gig_id=$link AND artist_id=$artist_id";
        $result_set4 = mysql_query($q4);	
        if (mysql_num_rows($result_set4) == 1) 
        {                    
			$found = mysql_fetch_array($result_set4);
            $statuss=$found["status"];
            if($statuss==1){$gigStatus = 3; $response['gigStatus'] = $gigStatus;}
            elseif($statuss==2){$gigStatus = 4; $response['gigStatus'] = $gigStatus;}
            elseif($statuss==4){$gigStatus = 5; $response['gigStatus'] = $gigStatus;}
        }
	
		elseif($todayTime > $dated)
		{
			$gigStatus = 6;
			$response['gigStatus'] = $gigStatus;
		}
        else
        {                       
            if($yes!=1)
        	{   
        		$gigStatus = 7;
        		$response['gigStatus'] = $gigStatus;
        	}
        }
    }    
                        
	$this->load->helper('functions');
	createResponse($response);

}

public function launchGigFunc(){

	ob_start();

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	if (!isset($sessionArray['session_id'])){
		session_start();
	}

	if(isset($sessionArray['username']))
	{
		$username=$sessionArray['username'];
		$password=md5($sessionArray['password']);
		$actual_type = 'venue';
	}

	elseif(isset($sessionArray['username_artist']))
	{
		$username=$sessionArray['username_artist'];
		$password=$sessionArray['password_artist'];
		$actual_type = 'artist';
	}

	$q1 = "SELECT * FROM `$database`.`members` WHERE fb_id='$username'";
	$result_set1 = mysql_query($q1);	
	if (mysql_num_rows($result_set1) == 1) 
	{
		$founded = mysql_fetch_array($result_set1);
		$pid=$founded["link"];$name=$founded["name"];$email=$founded["email"];
	}

	$SQLs = "SELECT id FROM `$database`.`shop`";
	$results = mysql_query($SQLs);
	while ($a = mysql_fetch_assoc($results))
	{
		$id=$a["id"];
	}

	$totalSlots=$_POST["slotNum"];
	for($iSlot=1;$iSlot<=$totalSlots;$iSlot++)
	{
		$id=$id+1;
		$ida=$id*16993; /*changed to 16993 wiz. prime number so that profile id should never match gig id*/

		$fb=$_POST['fb'];if($fb && !startsWith($fb,'http')){	$fb='http://'.$fb;}
		$twitter=$_POST['twitter'];if($twitter && !startsWith($twitter,'http')){	$twitter='http://'.$twitter;}
		$web=$_POST['web'];if($web && !startsWith($web,'http')){	$web='http://'.$web;}

		if($totalSlots>1)
			$gig=$_POST['gig'].': Slot '.$iSlot;
		else
			$gig=$_POST['gig'];

		$cat=$_POST['cat'];
		$budget_min=$_POST['budget_min'];
		$budget_max=$_POST['budget_max'];
		$date=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['date'];
		$time=$_POST['hours'].':'.$_POST['minute'].' '.$_POST['am'];
		$duration=$_POST['duration'];
		$venue_add=$_POST['add'];
		$venue_city=$_POST['city'];
		$venue_state=$_POST['state'];
		$venue_country=$_POST['country'];
		$venue_pin=$_POST['pincode'];
		$desc=$_POST['desc'];
			
		$q2 = "INSERT INTO `$database`.`shop` (`gig`, `category`, `budget_min`, `budget_max`, `venue_date`, `venue_time`, `duration`, `venue_add`, `venue_city`, `venue_state`, `venue_country`, `venue_pin`, `fb`, `web`, `twitter`, `desc`, `promoter`, `promoter_name`, `link`, `status`) 
				VALUES('$gig', '$cat', '$budget_min', '$budget_max', '$date', '$time', '$duration', '$venue_add', '$venue_city', '$venue_state', '$venue_country',  '$venue_pin',  '$fb',  '$web',  '$twitter', '$desc', '$pid', '$name', '$ida', '1')";
		$result_set2 = mysql_query($q2);
		if (!$result_set2)
		{
				die("Database query failed: " . mysql_error());
		}
	}
		
/*	if($totalSlots>1)
		$gig=$_POST['gig'];*/

	$to = $email;
	$sender = "alerts@tommyjams.com";
	$subject = "Launched Gig: $gig";
	$mess="<p style='text-align:left;'> Dear $name,<br><br>Congratulations!<br>Your gig '$gig' has been launched successfully on TommyJams.
				<br>We will keep you updated with any dibs you receive on the gig. You can also monitor them by logging onto your profile on TommyJams and going to the 'My Gigs' section.
				<br>We wish you all the very best for the gig.<br><br>Happy Jamming,<br>Team TommyJams<br><br></p>";
		
	$this->load->helper('mail');
    send_email($to, $sender, $subject, $mess);

	$to = "alerts@tommyjams.com";
	$this->load->helper('mail');
    send_email($to, $sender, $subject, $mess);

    $image="gigs.jpg";
	
	$gigs="images/gig/$image";
	$response['gigs'] = $gigs;

    $gigStatus = 2;

    $response['gig'] = $gig; 
    $response['cat'] = $cat;   
	$response['budget_min'] = $budget_min;
	$response['budget_max'] = $budget_max;
	$response['formattedDate'] =  $date;
	$response['vtime'] = $time;
	$response['duration'] = $duration;
	$response['fb'] = $fb;
	$response['web'] = $web;
	$response['twitter'] = $twitter;
	$response['desc'] = $desc;
	$response['promoter_name'] = $name;
	$response['city'] = $venue_city;
	$response['state'] = $venue_state;
	$response['country'] = $venue_country;
	$response['gigStatus'] = $gigStatus;
	$response['add'] = $venue_add;
	$response['pincode'] = $venue_pin;

	$this->load->helper('functions');
	createResponse($response);
}

public function updateGigPage(){

	$sessionArray = $this->session->all_userdata();
	$database = 'tommyjam_test';

	if(isset($sessionArray['username']))
	{
		$username=$sessionArray['username'];
		$password=md5($sessionArray['password']);
	}
	else
	{
		redirect('http://testcodeigniter.azurewebsites.net/index');
		exit;
	}

	if(isset($_GET["updategig"]))
	{
		$SQLsa = "SELECT link FROM `$database`.`members` WHERE `fb_id`='$username'";
		$resultsa = mysql_query($SQLsa);
		if (!$resultsa)
			die("Database query failed: " . mysql_error());
		$pl = mysql_fetch_assoc($resultsa);
		$plink=$pl["link"];
		$link=$_GET["updategig"];

		$SQLs = "SELECT * FROM `$database`.`shop` WHERE `link`=$link AND `promoter`=$plink";
		$results = mysql_query($SQLs);
		if (!$results)
			die("Database query failed: " . mysql_error());

		$a = mysql_fetch_assoc($results);
		$do="updategig&id=$link";
		$show=0;
		$ok="Update Gig";

		$durationSaved = $a['duration'];
		$timeSaved = $a['venue_time'];
		$tempExplode1 = explode(":",$timeSaved);
		$hourSaved = $tempExplode1[0];
		$tempExplode2 = explode(" ",$tempExplode1);
		$minSaved = $tempExplode2[0];
		$amSaved = $tempExplode2[1];
	}
	else
	{
		$do="add";
		$show=1;
		$ok="Launch Gig";
							
		$todayDate = intval(date("d"));
		$todayMonth = intval(date("m"));
		$todayYear = intval(date("Y"));
	}
}

}
?>	
