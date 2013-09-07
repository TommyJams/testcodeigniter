<html>
 <head>
	<link rel='stylesheet' href='css/edit.css'>
	<!-- Include the JS files -->

	<script type="text/JavaScript">
	function show(d)
	{ document.getElementById('frameprofessional').style.display="none";
		document.getElementById('frameabout').style.display="none";
		document.getElementById('framecontact').style.display="none";
		document.getElementById('framesocial').style.display="none";	
		document.getElementById(d).style.display="block";	
	}
	</script>

	<!--<script type="text/javascript">
		function init() {
		document.getElementById('loading').style.display = 'none';
		}
		window.onload = init();
	</script>-->

 </head>
 <body><!--
<div id="loading" style="background:#033; padding:10px; color:#FFF; position:absolute; left:40%; top:35%; font-size:16px; width:25%; height:10%; z-index:1500;">please wait, page is loading...</div>-->

 <?  /*if(isset($_GET["id"])) { print("Search result <b> $name </b> <br><br><br>"); }*/ ?>
    <div id="blanket" style="display:none;                            background-color:#111;
                            opacity: 0.65;
                            position:absolute;
                            z-index: 9001;
                            top:0px;
                            left:0px;
                            width:100%;                            height: 100%; "/>
        <?  if(!isset($_GET["id"]))                 {                 ?>
            <div id="profil" style="display:none;">
				<a id="loginBoxClose" href="#" onClick="popup('profil')">
				</a>
                <center>
                    <h2>Upload your Profile Picture</h2>
                </center>
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <table id="uploadTable" style="margin-top: 30px; width: 100%;">
                        <tbody>
                            <tr>
                                <td align="center" style="width: 100%;">
                                    <input name="file" id="image" type="file" size="50" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="width: 100%;">
                                    <span class="hint" style="line-height:10px;">
                                    Valid Image File (.jpg, .png, .bmp)
                                    <br>
                                    Max Size: 150KB
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="width: 100%;">
                                    <input name="submit" id="upload" type="submit" value="Upload Picture"/>
                                </td>
                            </tr>
							<tr>
								<td align="center" style="width: 100%; padding: 20px;">
                                    OR
								</td>
							</tr>
							<tr>
								<td align="center" style="width: 100%;">
									<img src="<? echo'https://graph.facebook.com/'.$username.'/picture'; ?>" style="vertical-align:bottom">
									<input name="submit" id="upload" type="submit" value="Use Facebook Picture"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        <?
        }
        ?>
 <!-- <div id="box" style="display:block;  padding-right:30px;">-->

<? if(!isset($_GET["edit"])){ ?>		
<? $userpic = (json_decode($_POST['json'])->users); ?>
<section id="left">
            <div id="userStats">
				<div id="userPic" class="pic">
					<? if(!isset($_GET['id']))
                    {print("<a href='#' onclick=popup('profil')>");}
					else {print("<a href='#'>");}
					print ("<img class='userStatsPic' src='$userpic'/>"); ?></a>
				</div>
				<div class="data">
                    <div style="width:35%; height:100%; float:left;">
                        <div id="userName">
                            <h1 style="display:inline-block;"><? print (json_decode($_POST['json'])->name); ?></h1>
                        </div>
                        <h2 style='padding-top:0px;'>
                            User: <?print (json_decode($_POST['json'])->username);?>
							<br>
                            <?print (json_decode($_POST['json'])->designation);?>
                            <?
							/*print ("$usernam");
                            if($organization!="")
                            {
								print ("$job ");
                            }*/
                            ?>
                        </h2>
                        <h2 style='padding-top:0px;'>
                            <?
                            if((json_decode($_POST['json'])->city)!="")
                            {
                                print(json_decode($_POST['json'])->city);
                            }
                            if((json_decode($_POST['json'])->state)!="")
                            {
                                if((json_decode($_POST['json'])->city)!="")
                                    print(", ");
                                print(json_decode($_POST['json'])->state);
                            }
                            if((json_decode($_POST['json'])->country)!="")
                            {
                                if((json_decode($_POST['json'])->city)!="" || (json_decode($_POST['json'])->state)!="")
                                    print(", ");
                                print(json_decode($_POST['json'])->country);
                            }
                            ?>
                        </h2>
                    </div>
					<div class="socialInfo">
						<div class="userType">
							<h1><?print(json_decode($_POST['json'])->type);?></h1>
						</div>
						<div class="userGenre">
							<h2 style="padding-top:0px;">
							<?
								if((json_decode($_POST['json'])->type)=="Promoter"){print("Style: ");}
								elseif((json_decode($_POST['json'])->type)=="Artist"){print("Genre: ");}
								print(json_decode($_POST['json'])->genre);
							?>
							</h2>
						</div>
						<div class="socialMediaLinks">
                            <? $fb = (json_decode($_POST['json'])->fb); ?>
							<? 
								if($fb!="")
								{
									print("<a href='$fb' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/facebook.png' /></a>");
								    //print("<a href='(json_decode($_POST['json'])->fb)' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/facebook.png' /></a>");
                                }
							?>
                            <? $twitter = (json_decode($_POST['json'])->twitter); ?>
							<?
								if($twitter!="")
								{ 
									print("<a href='$twitter' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/twitter.png' /></a>"); 
								}
							?>
                            <? $rever = (json_decode($_POST['json'])->rever); ?>
							<? 
								if($rever!="")
								{
									print("<a href='$rever' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/reverbnation.png' /></a>"); 
								}
							?>
                            <? $youtube = (json_decode($_POST['json'])->youtube); ?>
							<? 
								if($youtube!="")
								{ 
									print("<a href='$youtube' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/youtube.png' /></a>"); 
								}
							?>
                            <? $myspace = (json_decode($_POST['json'])->myspace); ?>
							<? 
								if($myspace!="")
								{
									print("<a href='$myspace' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/myspace.png' /></a>"); 
								}
							?>
                            <? $gplus = (json_decode($_POST['json'])->gplus); ?>
							<? 
								if($gplus!="")
								{ 
									print("<a href='$gplus' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/gplus.png' /></a>"); 
								}
							?>
						</div>
					</div>
					<div class="medals" style="width:35%; height: auto; float:right; position:relative; top:50%; margin-top:-25px;">
                        <center>
                            <? $userRating = (json_decode($_POST['json'])->userRating); ?>
                            <?                                                         
                            print("<a alt='TommyJams Rating (rated out of 5 by Hosts, Fans, Editor)' title='TommyJams Rating (rated out of 5 by Hosts, Fans, Editor)'><div style='background:#007888; color: #FFF; height:50px; width:50px; '><h1>$userRating</h1></div></a>");
                            /*print("<a alt='User Rating' title='User Rating'><div style='background:#606060; color:#FFF; height:50px; width:50px; margin-top:5px;'><h1>$silver</h1></div></a>");*/
                            ?>
                        </center>
                    </div>
					<!--<div class="sep" style="width:98%;">                    </div>-->
				</div> <!--data-->            
			</div> <!-- userstats -->
            <div id = "blank" style = "display: block; height: 4%; width: 100%" />
            <div id = "userDetails">
                <div style="height: 100%; width:48%; float:left;">
                    <div class="head" style="height:10%; margin-bottom:1%;">
                        <h1>ABOUT ME</h1>
                    </div>
                    <div class="about" style = "height: 88%; background: #000; overflow-y:auto;">
                        <p>
                            <? $about = (json_decode($_POST['json'])->about); ?>
							<? 
								/*convert to URL*/
								$aboutStr = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $about);
								/*format newlines*/
								$aboutStr = nl2br("$aboutStr");
								print ($aboutStr); 
							?>
						</p>
                    </div>
                </div> <!--AboutMe-->
                <div style="height: 100%; width:48%; float:left; margin-left:4%;">  <!--gigs list-->
                    <div class="gcontent">
                        <div class="head" style="height:10%; margin-bottom:1%;">
                            <h1>GIGS PORTFOLIO</h1>
                            <? /*if($type=="promoter"){print("Previous GIGs");}else{print("Previous DIBs");}*/ ?>
                        </div>
                        <div class="boxy">
                            <div class="giglist clearfix">
                                <div id="pgig" style="top:2px;">
									<table>
										<tr>
											<td style="background: #ffcc00; width: 30%;"><h1>GIG NAME</h1></td>
											<td style="background: #ffcc00; width: 30%;">
                                                <h1>
                                                    <?if((json_decode($_POST['json'])->type)=="Promoter"){print("ARTIST");}
                                                    else if((json_decode($_POST['json'])->type)=="Artist"){print("HOST");}?>
                                                </h1>
                                            </td>
											<td style="background: #ffcc00; width: 40%;"><h1>LOCATION</h1></td>
										</tr>
									</table>
                                    <div class="gig" style="">
                                        <span class="gigs" >
                                        <?php 
                                        $gigsHistory = (json_decode($_POST['json'])->gigHistory);
                                        foreach($gigsHistory as $row){ ?>
                                        <?
                                        $gig_name=$row[0];
                                        $pr_id=$row[1];
                                        $pr_name=$row[2];
                                        $ar_id=$row[3];
                                        $ar_name=$row[4];
                                        $date=$row[5];
                                        $city=$row[6];
                                        $gig_id=$gig_id[7];
                                        if((json_decode($_POST['json'])->type)=="Promoter") 
										{ print("<table><tr><td id='gigNameColumn' width='30%'><a href='javascript:;' onClick=gigProfile('$gig_id'); class='highlightRef' >$gig_name</a></td><td id='nameColumn' width='30%'><a href='javascript:;' onClick=showProfile('$ar_id'); class='greenRef' >$ar_name</a></td>"); }
                                        else if((json_decode($_POST['json'])->type)=="Artist")
                                        { print("<table><tr><td id='gigNameColumn' width='30%'><a href='javascript:;' onClick=gigProfile('$gig_id'); class='highlightRef' >$gig_name</a></td><td id='nameColumn' width='30%'><a href='javascript:;' onClick=showProfile('$pr_id'); class='greenRef' >$pr_name</a></td>"); }
										
										print("<td width='40%'>$date<br>$city</td></tr></table>");
                                        ?><?php } ?>
										</span>
                                        <!--<span class="gigs"><? /*print("<td width='40%'>$formattedDate<br>$v_city</td></tr></table>");*/?></span>-->
                                        <!--<span class="gigs" style="color:#999; font-size:9px; line-height:3px; padding-top:10px;"></span>-->
                                    </div>
                                                     
                                </div> <!--pgig-->
                            </div> <!--gigslist-->
                        </div> <!--boxy-->
                    </div> <!--gcontent-->
                </div> <!--gigs list-->
            </div> <!--userDetails-->
		
        
        
        </section>
		
		<? } 
		elseif(isset($_GET["edit"]) && (isset($_SESSION['username_artist']) || isset($_SESSION['username']))) {?>
        <section id="left" >
        <!--<div class="register">-->
            <div id="pageContainer" style = "width:100%; height:100%;">
                <?  if(isset($_GET['success']) && $_GET['success']==1)
                {print("Change Done Successfullly");}
                else{
                    if(isset($_GET['error']) && $_GET['error']==1)
                    {print("Error!!! Fields left blank");}
                    elseif(isset($_GET['error']) && $_GET['error']==2)
                    {print("Error!!! Username or email already exist");                                }
                ?>
                <!--<div id="signUp" class="toggleTab" style="display:block; height:1250px;">-->                            <!--<table width="100%" style="padding: 10px 10px;">            <tr bgcolor="#ffc000" height="30px">            <td><center>GiG</center></td>            <td><center>Venue</center></td>            <td><center>Date</center></td>            <td><center>Time</center></td>            <td><center>Status</center></td>            </tr>-->
                <table id="framemenu" >
                        <tr>
                        <td width="25%"><center><a href="javascript:;" onClick="show('frameprofessional');"><h1>Professional</h1></a></td>
                        <td width="25%"><center><a href="javascript:;" onClick="show('framesocial');"><h1>Social</h1></a></center></td>
                        <td width="25%"><center><a href="javascript:;" onClick="show('framecontact');"><h1>Contact</h1></a></center></td>
                        <td width="25%"><center><a href="javascript:;" onClick="show('frameabout');"><h1>About</h1></a></center></td>
                        <tr>
                </table>
				<!--<br><br><br><br><br><br><br><br><br><br><br><br>-->
                <div id="frameprofessional">
                    <form action="update.php" method="POST" class="cleanForm" id="signUpForm">
                        <fieldset>
                            <!--<p>
                                <label for="Select">Occupation:</label>
                                <select id="select" name="job" style="width:250px;">
                                    <option value="Studying">Student</option>
                                    <option value="Works as">Work</option>
                                </select>
                                <br>
                                <em>Occupation</em>
                            </p>-->
                            <p>
								<? if(isset($_SESSION['username_artist'])) { print("<label for='designation'>Your Role:</label>");}
								   elseif(isset($_SESSION['username']))    { print("<label for='designation'>Designation:</label>");}
								?>
                                
                                <input type="text" id="full-name" name="designation" value="<? print($designation); ?>"  pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" autofocus />
                                <br>
								<? if(isset($_SESSION['username_artist'])) { print("<em>e.g. Guitar, Vocals</em>");}
								   elseif(isset($_SESSION['username']))    { print("<em>e.g. Manager</em>");}
								?>
                            </p>
                            <p>
                                <? if(isset($_SESSION['username_artist'])) { print("<label for='organization'>Band Name: <span class='requiredField'>*</span></label>");}
								   elseif(isset($_SESSION['username']))    { print("<label for='organization'>Organization: <span class='requiredField'>*</span></label>");}
								?>
                                <input type="text" id="username" name="organization" pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" value="<? print($name); ?>" required />
                                <br>
                                <em></em>
                            </p>
							<p>
                                <? if(isset($_SESSION['username_artist'])) { print("<label for='genre'>Genre: </label>");}
								   elseif(isset($_SESSION['username']))    { print("<label for='genre'>Style: </label>");}
								?>
                                <input type="text" id="genrename" name="genre" pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" value="<? print($genre); ?>"/>
								<br>
								<? if(isset($_SESSION['username_artist'])) { print("<em>e.g. Acoustic, Progressive Rock</em>");}
								   elseif(isset($_SESSION['username']))    { print("<em>e.g. Cafe, Lounge or Rock, Electronic</em>");}
								?>
                            </p>
							<center>
                                <div class="centera" style=" width:500px; position:relative; margin-top:10px; ">
                                    <input type="submit" value="Save Changes" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                </div>
                                <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                    <p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
                                </div>
                            </center>
                        </fieldset>                    </form>                </div>
                <div id="framesocial">
                    <form action="update.php" method="POST" class="cleanForm" id="signUpForm">
                        <fieldset>
                            <p>
                                <label for="social">Facebook: <span class="requiredField">*</span></label>
                                <input type="text" id="fb" name="fb" value="<? print($fb); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" required />
                                <br>                                <em>Profile link on Facebook.</em>
                            </p>
                            <p>
                                <label for="social">Twitter: </label>
                                <input type="text" id="twiter" name="twitter" value="<? print($twitter); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                <br>                                <em>Profile link on Twitter.</em>
                            </p>
                            <p>
                                <label for="social">Reverbnation:</label>
                                <input type="text" id="reverbnation" name="rever" value="<? print($rever); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                <br>                                <em>Profile link on Reverbnation.</em>
                            </p>
                            <p>
                                <label for="social">Youtube:</label>
                                <input type="text" id="youtube" name="youtube" value="<? print($youtube); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                <br>                                <em>Profile link on youtube.</em>
                            </p>
                            <p>
                                <label for="social">MySpace:</label>
                                <input type="text" id="myspace" name="myspace" value="<? print($myspace); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                <br>                                <em>Profile link on MySpace.</em>
                            </p>
                            <p>
                                <label for="social">Google plus:</label>
                                <input type="text" id="gplus" name="gplus" value="<? print($gplus); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                <br>                                <em>Profile link on Google+.</em>
                            </p>
                            <center>
                                <div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                    <input type="submit" value="Save Changes" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                </div>
                                <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                    <p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
                                </div>
							</center>
                        </fieldset>
                    </form>                </div>
                <div id="framecontact">
                    <form action="update.php" method="POST" class="cleanForm" id="signUpForm">
                        <fieldset>
                            <p>
                                <label for="phone">Mobile Number: <span class="requiredField">*</span></label>
                                <input type="tel" id="phone" name="mobile" value="<? print($mobile); ?>" pattern="^[0-9]{10,10}$" required/>
                                <br>
                                <em>10 digits</em>
                            </p>

							<p>
                                <label for="email">Email: <span class="requiredField">*</span></label>
                                <input type="email" id="email" name="email" value="<? print($email); ?>" pattern="^[0-9a-zA-Z-,/@_.: ]{3,100}$" required/>
                                <br>
                                <em></em>
                            </p>

                            <p>
                                <label for="add">Address:</label>
                                <input type="text" id="add" name="add" value="<? print($street); ?>" pattern="^[0-9a-zA-Z-,/ ]{3,100}$"/>
                                <br>                                <em>Number, Street, Locality</em>
                            </p>
                            
                            <p>
                                <label for="city">City: <span class="requiredField">*</span></label>
                                <input type="text" id="city" name="city" value="<? print($city); ?>" pattern="^[a-zA-Z ]{3,20}$" required/>
                                <br>                                <em></em>
                            </p>
                            <p>
                                <label for="state">State:</label>
                                <input type="text" id="state" name="state" value="<? print($state); ?>" pattern="^[a-zA-Z ]{3,20}$"/>
                                <br>                                <em></em>
                            </p>
                            
                            <p>
                                <label for="Country">Country: <span class="requiredField">*</span></label>
                                <input type="text" id="country" name="country" value="<? print($country); ?>" pattern="^[a-zA-Z ]{3,20}$" required/>
                                <input type="text" id="pincode" name="pincode" value="<? if($pincode!=0){print($pincode);} ?>" pattern="^[0-9]{6,6}$"/>
                                <br>                                <em>Country & PinCode</em>
                            </p>
							<center>
                                <div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                    <input type="submit" value="Save Changes" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                </div>
                                <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                    <p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
                                </div>
                            <center>
                        </fieldset>
                    </form>
                </div>
                <div id="frameabout">
					<form action="update.php" method="POST" class="cleanForm" id="signUpForm">
                        <fieldset>
                            <p>
                                <label for="fb">About: <span class="requiredField">*</span></label>
                                <textarea cols="60" rows="14"  id="about" name="about"  pattern="^[a-zA-Z0-9/ ,-_.:;&?']{25,20000}$"  required><? print($about); ?></textarea>
                                <br>
                                <em>About yourself</em>
                            </p>
                            <center>
								<div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                    <input type="submit" value="Save Changes" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                </div>
                                <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                    <p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
                                </div>
                            </center>
                        </fieldset>
                    </form>
                </div>
		<!-- </div> end signUp -->
	<? } ?>
</div> <!-- end pageContainer --><!--
<br>
</div>-->
        </section> 
        
       <? } ?>
<!-- box
</div>-->

	<script type="text/javascript">
		$('#loading-indicator').hide();
	</script>

</body>
</html>