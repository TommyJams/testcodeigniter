<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TommyJams</title>
    <link href="<?php echo base_url();?>style/profile.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/styler.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/supersized/supersized.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo base_url();?>style/style_footer.css" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Voces" rel="stylesheet" type="text/css" />
	  <link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>script/motionpack.js"></script>

    <!--
    <script type="text/javascript" src="http://i3indya.com/js/jquery.aviaSlider.js"></script>
    <script type="text/javascript" src="http://i3indya.com/js/aviaInit.js"></script>
    <style type="text/css">
        #pscroller2{
            width: 800px;
            height: 15px;
        }
        #pscroller2 a{
            text-decoration: none;
        }
        .someclass{ //class to apply to your scroller(s) if desired
        }
    </style>
    -->

    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.supersized.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/main.js"></script> <!--contains document ready function-->
	  <script type="text/javascript" src="<?php echo base_url();?>script/h5f.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>script/functions.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>script/csspopup.js"></script>
    <script language="javascript"> 

    function loadblog(a) 
    {
       /*document.getElementById('lefty').style.display="none";
       document.getElementById('lefty1').style.display="block";  
	     link = 'include/blog/wp-login.php';
	     parent.leftframe.location.href=link; */
    } 

    </script>
    <!-- <script language="javascript"> 
          link = a+".php?include="+a; 
          parent.leftframe.location.href=link; 
    </script> -->

    <script>
    function loadframe(a) 
    {     
		  $("#loading-indicator").show();
      if(a=="left")
        { 
          $("#lefty").load("include/profile.php");
        }
      else if(a=="gigs")
        { 
          $("#lefty").load("include/promoter_gigs.php");
        }
      else if(a=="add")
        { 
          $("#lefty").load("include/gig.php");
        }
		  else if(a.substring(0,9)=="updategig")
        { 
          $("#lefty").load("include/gig.php?"+a);
        }
      /*else if(a=="dib"){ $("#lefty").load("include/dib.php");}*/  
    }
    
    function loadfram(a) 
    {
		  $("#loading-indicator").show();
      $("#lefty").load("include/profile.php?edit=1");
    }

    function promoterGigsCallback(a)
    {
      console.log("All Gigs Data: ", JSON.stringify(a));
      $("#lefty").load("include/promoter_gigs.php", {json: JSON.stringify(a)});
    }
    function promoterGigs()
    {
      $.post('promoter/mygigs','',promoterGigsCallback,'json');
    }

    function promoterProfileCallback(a)
    {
      console.log("Profile Data: ", JSON.stringify(a));
      $("#lefty").load("include/profile.php", {json: JSON.stringify(a)});
    }
    function promoterProfile()
    {
      $.post('promoter/profilepage','',promoterProfileCallback,'json');
    }    

	  function showProfile(user_id)
    {
      $("#loading-indicator").show();
      $.post('artist/profilepage',{id: user_id},showProfileCallback,'json');
      console.log("id: ", user_id);
    }
    function showProfileCallback(a)
    {
      console.log("Data: ", JSON.stringify(a));
      $("#lefty").load("include/profile.php", {json: JSON.stringify(a)}); 
    }

    function gigProfileCallback(a) 
    {
      $("#loading-indicator").show();      
      console.log("Data: ", JSON.stringify(a));
      $("#lefty").load("include/gigs.php", {json: JSON.stringify(a)});
    }
    function gigProfile(user_id) 
    {
      console.log("id: ", user_id);
      $("#loading-indicator").show();      
      $.post('promoter/gigProfilePage',{id: user_id},gigProfileCallback,'json');
    }

    function launchGigCallback(a) 
    {
		  $("#loading-indicator").show();      
		  console.log("All Gig Data: ", JSON.stringify(a));
      $("#lefty").load("include/gigs.php", {json: JSON.stringify(a)});
    }
    function launchGig() 
    {
      $("#loading-indicator").show();      
      $.post('promoter/launchGigFunc',$('#signUpForm').serialize(),launchGigCallback,'json');
    }
    function showLaunchGig() 
    {
      $("#loading-indicator").show();      
      $("#lefty").load("include/gig.php");
    }

    function showDibCallback(a) 
    {
      $("#loading-indicator").show();      
      console.log("All Data: ", JSON.stringify(a));
      $("#".link).load("include/show_dibs.php", {json: JSON.stringify(a)});
    }
    function showDib(linker) 
    {
      console.log("Linker: ", JSON.stringify(linker));
      $("#loading-indicator").show();      
      $.post('promoter/showDibs',{link: linker},showDibCallback,'json');
    }

    </script>
    
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
    
    <? include("include/leftCommon.php"); ?>
	  
    <div id="main-container">
    <div id="lefty">
      </div>
        <div id="lefty1" style="display:none;  overflow-y:hidden;">
            <iframe name="leftframe" id="leftframe1" width="100%" height="100%" frameborder="0"></iframe>
        </div>

        <script>
        <?
          if(isset($_GET["profile"]) && $_GET["profile"]=="search")
          { 
            if(isset($_GET["pages"])){$_SESSION["pages"]=$_GET["pages"];}
            else{$_SESSION["pages"]=1;}
            if(isset($_POST["profile"])){$_SESSION["profile"]=$_POST["profile"];}
            print("$('#lefty').load('include/profile_search.php?page=$_SESSION[pages]');");
          }
          else if(isset($_GET["feed"])){ print("$('#lefty').load('include/feed.php?feed=$_GET[feed]');");}
          else if(isset($_GET["thank"])){ print("$('#lefty').load('include/thank.php?rate=1');");}
          else{ 
                if(!isset($_GET["id"]) && !isset($_GET["gig"]))
                { 
                  //print("$('#lefty').load('include/profile.php');");
                  print("$.post('promoter/profilepage','',showProfileCallback,'json');");
                }
                else if(isset($_GET["id"])){ print("$('#lefty').load('include/profile.php?id=$_GET[id]');");}
                else if(isset($_GET["gig"]) && isset($_GET["added"])){ 
                  print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]&added=new');");}
				        else if(isset($_GET["gig"]) && isset($_GET["edited"])){ 
                  print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]&edited=new');");}
                else if(isset($_GET["gig"])){ print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]');");}
              }
        ?>
        </script>
		
		    <!-- start menu -->
        <div id="menuFooter" style="background:#000;">
          <ul>
            <li>
              <a  href="javascript:;" onClick="showLaunchGig()"><h3>Launch Gig</h3></a>
            </li>
            <li>
              <!--<a  href="javascript:;" onClick="loadframe('gigs');"><h3>My Gigs</h3></a> -->
              <a  href="javascript:;" onClick="promoterGigs()"><h3>My Gigs</h3></a>
            </li>
            <li>
              <a href="javascript:;" onClick="promoterProfile()"><h3>Profile</h3></a>
            </li>
            <li>
              <a href="javascript:;" onClick="loadfram();"><h3>Edit Profile</h3></a>
            </li>
          </ul>
        </div>
        <!-- end menu -->     
      </div>

    </div> <!--main-container-->
    <? include("include/rightCommon.php");  ?>
</body>
</html>
<?
ob_end_flush();
?>