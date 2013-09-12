<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>TommyJams - Help</title>

    <link href="/style/style.css" rel="stylesheet" type="text/css" />

    <link href="/style/edit.css" rel="stylesheet" type="text/css" />

    <link href="/style/supersized/supersized.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/script/jquery.min.js" ></script>

    <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>

    <script type="text/javascript" src="/script/main.js"></script> <!--contains document ready function-->

    <script> 

    function contactHelpCallback(a) 
    {
      $("#loading-indicator").show();      
      console.log("Error: ", JSON.stringify(a));
      
      if(a.error == 1)
      {
        alert('Sorry! There was some error while processing your request. Please try again.');
        window.location.assign("http://testcodeigniter.azurewebsites.net/help") 
      }
      else
      {
		alert('Your request has been received. We will contact you shortly.');
		window.location.assign("http://testcodeigniter.azurewebsites.net/help")  	
  	  }
    }
    
    function contactHelp(obj) 
    {
    	console.log("Error");
      	$("#loading-indicator").show();      
      	$.post('links/contactHelpFunc',{'cf_name': obj.cf_name, 'cf_email': obj.cf_email, 'cf_message': obj.cf_message}, contactHelpCallback,'json');
    }

	$('#contactFormHelp').bind('submit',function(e) 
	{
		e.preventDefault();
			
		var obj = {
                    cf_name:   		document.getElementById('cf_name').value,
                    cf_email:   	document.getElementById('cf_email').value,
                    cf_message:    	document.getElementById('cf_message').value
                };
			
			contactHelp(obj);
		});

	</script>


</head>

<body>
 
    <?
	include("include/leftCommon.php");
	?>

	<div id="main-container">

        <div id="inner-container">

            <div class="head">

                <h1>Help</h1>

            </div>

            <div id="textContainer">
				<p>
					In case of any questions, queries, requests, issues or complaints, kindly use the below provided form to contact us, and we shall get back to you shortly.
                </p>
                <form action="" method="post" id="contactFormHelp" name="contactFormHelp" style="width:50%; margin-top:20px; left:50%; margin-left:25%;">
                    <table style="border:0px; width:100%;">
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your name-->
                                <input type="text" id="cf_name" value="Your name" name="cf_name" style="width:50%; margin-top:10px;">
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your e-mail-->
                                <input type="text" id="cf_email" value="Your e-mail" name="cf_email" style="width:50%; margin-top:10px;">
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your Requirement-->
                                <input type="text" id="cf_message" value="Your requirement" name="cf_message" style="height:200px; width:100%; position:relative; margin-top:10px; font-family: Arial; font-size: 14px;">
                               <!-- <textarea name="cf_message" style="height:200px; width:100%; margin-top:10px; font-family: Arial; font-size: 14px;">Your requirement</textarea> -->
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <input type="submit" value="Send" style="width:auto; margin: 10px auto;">
                            </td>
                        </tr>
                    </table>
                </form>

                <p>
					<br>
                    <h1>FAQ</h1>
					<br>
					<b>Artist: I am an Artist interested to perform at a gig, where do I start?</b>
					<br>
					   <b>TommyJams:</b> Start by logging into the website from the header using your Facebook Login. While registering, please enter your band name, 
					   this will be your main identification on the TommyJams website. You will now be taken to your profile. Start off by updating your 
					   profile on TommyJams (click on Edit Profile), this will help the venues and promoters to identify and connect with you. You can then
					   start searching for the gigs and applying for them.
					<br>
					<br>
					<b>Venue: I am a Venue/Promoter wanting a band for my venue, where do I start?</b>
					<br>
					   <b>TommyJams:</b> Start by logging into the website from the header using your Facebook Login. While registering, please enter your organization/venue name, 
					   this will be your main identification on the TommyJams website. You will now be taken to your profile. Start off by updating your 
					   profile on TommyJams (click on Edit Profile), this will help the artists to identify and connect with you. You can then
					   start launching your gigs and accepting Dibs from artists.
					<br>
					<br>
					<b>User: What is this 'Dibs' button?</b>
					<br>
					   <b>TommyJams:</b> If an artist is interested in performing at a gig, the artist dibs for the gig. The venues and promoters who launched the
					   gig can then monitor the incoming dibs and select the band that they want to perform the gig.
					<br>
					<br>
					<b>Artist: I just found an interesting gig, what do I do?</b>
					<br>
					   <b>TommyJams:</b> Great! You can apply for the gig by clicking on the dibs button that comes in the 'Find Gigs' section or on the Gig Info page itself. You can
						check out the status of your dibs by going to the 'Dibs Status' section.
					<br>
					<br>
					<b>Venue: I launched my gig, what do I do?</b>
					<br>
					   <b>TommyJams:</b> Great! Artists are now going to see your launched gig and start applying. Soon you'll start getting dibs from them.
						You can monitor these dibs in the 'My Gigs' section and accept or reject each Artist's dibs. Whenever you accept an artist's dibs the gig will
						be considered as booked and a rejection will be sent to all the other artists.
					<br>
					<br>
					<br>
				</p>
            </div>
        
        </div>

    </div> <!--main-container-->

	<?
	include("include/rightCommon.php");
	?>    

</body>

</html>