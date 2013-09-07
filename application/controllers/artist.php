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
			redirect('http://testcodeigniter.azurewebsites.net/index');
			exit;
		}
		
		$username=$sessionArray['username_artist'];
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

			$gigRow = array($gig_name, $pr_id, $pr_name, $ar_id, $ar_name, $formattedDate, $v_city);

			$response['gigHistory'][] = $gigRow;

		}	

		$this->load->helper('functions');
		createResponse($response);

		//$this->load->view('profile_subview');
	}

	public function mydibs(){
		ob_start();

		$sessionArray = $this->session->all_userdata();
		$database = 'tommyjam_test';

		if (!isset($sessionArray['session_id'])) {
			session_start();
		}
		if(isset($sessionArray['username_artist']))
		{
			$username=$sessionArray['username_artist'];
			$password=md5($sessionArray['password_artist']);
		}
		elseif(isset($sessionArray['username']))
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
			$artist_id=$found["link"];
		}

		if(isset($sessionArray['username_artist']))
	    {
	    	$SQLs = "SELECT * FROM `$database`.`transaction` WHERE artist_id=$artist_id ORDER BY id DESC";
	    }
	 	elseif(isset($sessionArray['username']))
	    {
	        $SQLs = "SELECT * FROM `$database`.`transaction` WHERE promoter_id=$artist_id ORDER BY id DESC";
	    }
	    
	    $results = mysql_query($SQLs);
	            
	    while ($a = mysql_fetch_assoc($results))
	    {
	        $gig_id=$a["gig_id"];
	        $id=$a["id"];$gig=$a["gig_name"];$promoter=$a["promoter_id"];$promoter_name=$a["promoter_name"];
	        $artist=$a["artist_id"];$artist_name=$a["artist_name"];
	        $link=$a["gig_id"];$statuss=$a["status"];

	        $SQLe = "SELECT * FROM `$database`.`shop` WHERE link=$link";
	        $resulte = mysql_query($SQLe);
	        while ($f = mysql_fetch_assoc($resulte))
	        {
	            $city=$f["venue_city"];$state=$f["venue_state"];$time=$f["venue_time"];$date=$f["venue_date"];
	        }
			$formattedDate = date('d-m-Y',strtotime($date));

			$dibRow = array($gig, $city, $formattedDate, $time, $statuss, $promoter, $promoter_name);

			$response['dibHistory'][] = $dibRow;
		}	

		$this->load->helper('functions');
		createResponse($response);
	}

	public function findGigs()
	{
		$database = 'tommyjam_test';

		$todayTime = strtotime(date("Y-m-d"));

		//What is the query string
		if(isset($_POST['searchString']))								//Search string passed in query?
			$searchGigs = $_POST['searchString'];
		else
		{
			$searchGigs = $this->session->userdata('findGigsString');	//Search string present in session?

			if($searchGigs === FALSE)
				$searchGigs = NULL;										//Empty search string
		}

		// Which page to show?
		if(isset($_POST['findGigsPage']))							//Page passed in query?
			$nPage = $_POST['findGigsPage'];
		else
		{
			$nPage = $this->session->userdata('findGigsPage');		//Page present in session?

			if($nPage === FALSE)										
				$nPage = 1;											//Fresh ask for find gigs
		}
		//$this->session->userdata('session_id');

		/*$scity=$_POST["city"];$scity=$_POST["city"];$scity=$_POST["city"];
		$que = "SELECT DISTINCT venue_city FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2";
		$sea=mysql_query($que);
        while($a = mysql_fetch_assoc($sea))
		{
			$city=$a["venue_city"];
			if(isset($_SESSION["scity"]) & $_SESSION["scity"]!="all" & $city==$_SESSION["scity"])
				print("<option value='$city' selected='selected'>$city</option>");
			else
				print("<option value='$city'>$city</option>");
		}


		$que = "SELECT DISTINCT venue_date FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2";
		$sea=mysql_query($que);
        while($a = mysql_fetch_assoc($sea))
		{
			$date=$a["venue_date"];
			$formattedDate = date('d-m-Y',strtotime($date));
			if(isset($_SESSION["sdate"]) & $_SESSION["sdate"]!="all" & $date==$_SESSION["sdate"])
			{
				print("<option value='$date' selected='selected'>$formattedDate</option>");
			}
			else
			{
				print("<option value='$date'>$formattedDate</option>");
			}
		}

		$que = "SELECT DISTINCT category FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2";
		$sea=mysql_query($que);
        while($a = mysql_fetch_assoc($sea))
		{
			$cat=$a["category"];
			if(!strpos($cat,"/"))
			{
				if(isset($_SESSION["scat"]) & $_SESSION["scat"]!="all" & $cat==$_SESSION["scat"])
					print("<option value='$cat' selected='selected'>$cat</option>");
				else
					print("<option value='$cat'>$cat</option>");
			}
		}

		$que = "SELECT DISTINCT budget_min FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2 ORDER BY budget_min DESC";
		$sea=mysql_query($que);
        while($a = mysql_fetch_assoc($sea))
		{	
			$min=$a["budget_min"];
			if($min>=0)
			{
				if(isset($_SESSION["sbudget"]) & $_SESSION["sbudget"]!="all" & $_SESSION["sbudget"]==$min)
					print("<option value='$min' selected='selected'>$min</option>");
				else
					print("<option value='$min'>$min</option>");
			}
		}*/

		$query = "SELECT COUNT(*) as num FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2";
		$que   = "SELECT               * FROM `$database`.`shop` WHERE (`gig` LIKE '%$searchGigs%' OR `desc` LIKE '%$searchGigs%'  OR `venue_city` LIKE '%$searchGigs%'  OR `promoter_name` LIKE '%$searchGigs%') AND status!=2";
		/*if(isset($_SESSION["scity"]) & $_SESSION["scity"]!="all"){$searchCity = $_SESSION["scity"]; $query.=" AND `venue_city` = '$searchCity'";  $que.=" AND `venue_city` = '$searchCity'";}
		if(isset($_SESSION["sdate"]) & $_SESSION["sdate"]!="all"){$searchDate = $_SESSION["sdate"]; $query.=" AND `venue_date` = '$searchDate'";  $que.=" AND `venue_date` = '$searchDate'";}
		if(isset($_SESSION["scat"] ) & $_SESSION["scat"] !="all"){$searchCat  = $_SESSION["scat"];  $query.=" AND `category` LIKE '%$searchCat%'"; $que.=" AND `category` LIKE '%$searchCat%'";}
		if(isset($_SESSION["sbudget"]) & $_SESSION["sbudget"]!="all"){$searchBudget = $_SESSION["sbudget"]; $query.=" AND `budget_min` >= '$searchBudget'"; $que.=" AND `budget_min` >= '$searchBudget'";}*/
		$que.= " ORDER BY venue_date DESC";
		
		$total_pages = mysql_fetch_array(mysql_query($query));
        $total_pages = $total_pages['num']/6;
        $total_pages = ceil($total_pages);

        //Save gigs data in response
        $v=0;
		$sea=mysql_query($que);
        while($a = mysql_fetch_assoc($sea))
        {
            $v=$v+1;
            $id=$a["id"];$gig=$a["gig"];$cat=$a["category"];
            $city=$a["venue_city"];$state=$a["venue_state"];$country=$a["venue_country"];$pincode=$a["venue_pin"];
            $date=$a["venue_date"];$time=$a["venue_time"];$period=$a["period"];$link=$a["link"];
            $budget_min=$a["budget_min"];$budget_max=$a["budget_max"];$image=$a["image"];$status=$a["status"];
            $dated = strtotime($date);$promoter_name=$a["promoter_name"];$pid=$a["promoter"];
            $linker=$link*15999;
			$formattedDate = date('d-m-Y',$dated);

            if($v<=($nPage*6) && $v>($nPage*6)-6)
            {
                $gigStatus=0;										// Gig is open
                $q4 = "SELECT * FROM `$database`.`transaction` WHERE gig_id=$link AND status=1";
                $result_set4 = mysql_query($q4);	
                if (mysql_num_rows($result_set4) == 1) 		//Gig is Booked
                {
                    $found = mysql_fetch_array($result_set4);
                    $gigStatus=1;
                }
                
            	$q2 = "SELECT link FROM `$database`.`members` WHERE fb_id='$_SESSION[username_artist]'";
                $result_set2 = mysql_query($q2);	
                if (mysql_num_rows($result_set2) == 1) 
                {
                        $found = mysql_fetch_array($result_set2);
                        $artist_id=$found["link"];
                }

                $q4 = "SELECT * FROM `$database`.`transaction` WHERE gig_id=$link AND artist_id=$artist_id";
                $result_set4 = mysql_query($q4);
                if (mysql_num_rows($result_set4) == 1) 
                {
                    $found = mysql_fetch_array($result_set4);
                    $statuss=$found["status"];
                    
                    if($statuss==2){$gigStatus = 2;}				//Dib Rejected
                    elseif($statuss==4){$gigStatus = 4;}			//Dib Pending
                }
            	elseif($todayTime > $dated)
				{
					$gigStatus = -1;								//Gig expired
				}

				$gigRow = array($gig, $link, $pid, $promoter_name, $city, $formattedDate, $time, $gigStatus);
				$response["foundGigs"][] = $gigRow;
            }

        }

		//Save data in session
		$sessionData = array(
	          'findGigsPage'  => $nPage
        );
		$this->session->set_userdata($sessionData);

		//Save some page level data in response
		$response["nPage"] = $nPage;
		$response["total_pages"] = $total_pages;

		$this->load->helper('functions');
		createResponse($response);
	}

}
?>

