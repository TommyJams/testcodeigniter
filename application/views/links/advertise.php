<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>TommyJams - Advertise</title>

    <link href="/style/style.css" rel="stylesheet" type="text/css" />

    <link href="/style/edit.css" rel="stylesheet" type="text/css" />

    <link href="/style/supersized/supersized.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/script/jquery.min.js" ></script>

    <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>

    <script type="text/javascript" src="/script/main.js"></script> <!--contains document ready function-->

</head>

<body>
 
	<?
	include("include/leftCommon.php");
	?>

	<div id="main-container">

        <div id="inner-container">

            <div class="head">

                <h1>Advertise</h1>

            </div>

            <div id="textContainer">
                
                <p>
                    TommyJams is a fast growing community of Artists, Venues and Fans.
                    <br>
                    <br>
                    There are a lot of target advertising opportunities available on the website:
                    <br>
                    1. Full Screen Banners
                    <br>
                    2. Sidebar Advertisements
                    <br>
                    3. Targeting based on user type, location, and music genre
                    <br>
                    <br>
                    For advertising with us, please drop a message using the form below and we shall get in touch with you.
                </p>
                
                <form name="contact-form" id="contact-form" action="" method="post" class="clear-fix">

                                    <div class="clear-fix">

                                        <ul class="no-list form-line">

                                            <li class="clear-fix block">
                                                <label for="contact-form-name">Your name</label>
                                                <input type="text" name="contact-form-name" id="contact-form-name" value=""/>
                                            </li>
                                            <li class="clear-fix block">
                                                <label for="contact-form-mail">Your e-mail</label>
                                                <input type="text" name="contact-form-mail" id="contact-form-mail" value=""/>
                                            </li>
                                            <li class="clear-fix block">
                                                <label for="contact-form-message">Your message</label>
                                                <textarea name="contact-form-message" id="contact-form-message" rows="1" cols="1"></textarea>   
                                            </li>
                                            <li class="clear-fix block">
                                                <input type="submit" id="contact-form-send" name="contact-form-send" class="button" value="Send"/>
                                            </li>
                                            
                                        </ul>
                                            
                                    </div>

                                </form>
            </div>
        
        </div>

    </div> <!--main-container-->

	<?
	include("include/rightCommon.php");
	?>    

</body>

</html>