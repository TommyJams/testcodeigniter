<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TommyJams - Facebook Registration</title>
    <link href="<?php echo base_url();?>style/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/supersized/supersized.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.supersized.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/main.js"></script>
	<script type="text/javascript">
          var _gaq = _gaq || [];
		  var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js'; 
		  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
          _gaq.push(['_setAccount', 'UA-34924795-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
    </script>
</head>

<body>
	<!-- Background overlay -->
        <div id="background-overlay"></div>
    <!-- /Background overlay -->    
    
        <?	include("include/leftSidebar.php");	?>        
            <div id="logoContainer">            
                <a href="<?php echo base_url();?>index">            
                    <img alt="Home" title="Home" src="images/tjlogo_small.png">        
                </a>
            </div>
            <div id="slideText">
                <h3 id="slideTextHeading">
                    Slide Text Heading
                </h3>
                <h4 id="slideTextBody">
                    Slide Text Body
                <h4>
            </div>

        <div id="main-container">
            <div id="inner-container">
                <div class="head">
                    <h1>REGISTRATION</h1>
                </div>

				<div id="textContainer">

					<iframe src="https://www.facebook.com/plugins/registration?
								client_id=<?php echo $appId;?>&
				 				redirect_uri=http://testcodeigniter.azurewebsites.net/fbconnect&
				 				fb_only=true&
				 				fb_register=true&
				 				fields=<?php echo $fb_fields;?>"
							scrolling="auto"
							frameborder="no"
							style="border:none"
							allowTransparency="true"
							width="100%"
							height="330">
					</iframe>
				</div>
			</div>
		</div>
	</body>
</html>