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
	<!--
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
    </style>    -->
	
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/motionpack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery.supersized.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/h5f.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/functions.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/csspopup.js"></script>
	<!--contains document ready function-->
    <script language="javascript">
	
    function loadblog(a) 
    {
        /*document.getElementById('lefty').style.display="none";
        document.getElementById('lefty1').style.display="block";
        link = 'include/blog/wp-login.php';
        parent.leftframe.location.href=link; */
    } 
    </script>
    <!--<script language="javascript"> 
        link = a+".php?include="+a; 
        parent.leftframe.location.href=link; 
    </script>-->
    
    <script>
    function loadframe(a) 
    {
		$("#loading-indicator").show();
        if(a=="left"){  $("#lefty").load("include/profile.php");}
        else if(a=="gig"){  $("#lefty").load("include/artist_gigs.php");}
        else if(a=="dib"){ $("#lefty").load("include/dib.php");}
    }
    function gig(a) 
    {
		$("#loading-indicator").show();
		$("#lefty").load("include/gigs.php?gig="+a);
    }
	function showProfile(user_id)
    {
    	//var abc = user_id; 
    	$("#loading-indicator").show();
		$.post('artist/profilepage',{id: user_id},showProfileCallback,'json');
		//console.log("id: ", JSON.stringify(id));
		console.log("id: ", user_id);
    }
    function showProfileCallback(a)
    {
		console.log("Data: ", JSON.stringify(a));
		$("#lefty").load("include/profile.php", {json: JSON.stringify(a)});	
    }
    function loadfram(a) 
    {
		$("#loading-indicator").show();
		$("#lefty").load("include/profile.php?edit=1");
    }
	function loadFindGigsPage(a)
    {
		$("#lefty").load("include/artist_gigs.php?page="+a);
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

	<?	include("include/leftCommon.php");	?>

	<div id="main-container">
		<div id="lefty" style="display:block;">
		</div>
		<div id="lefty1" style="display:none;  overflow-y:hidden;">
			<iframe name="leftframe" id="leftframe1" width="100%" height="100%" frameborder="0"></iframe>
		</div>
		<script>
			<? if(isset($_GET["gigs"]) && $_GET["gigs"]=="search")
			{ 
				if(isset($_GET["page"])){$_SESSION["page"]=$_GET["page"];}
				else{
				$_SESSION["page"]=1;
				if(isset($_POST["search"])){$_SESSION["searchGigs"]=$_POST["search"];}
				if(isset($_POST["city"])){$_SESSION["scity"]=$_POST["city"];}else{$_SESSION["scity"]="all";}
				if(isset($_POST["date"])){$_SESSION["sdate"]=$_POST["date"];}else{$_SESSION["sdate"]="all";}
				if(isset($_POST["cat"])){$_SESSION["scat"]=$_POST["cat"];}else{$_SESSION["scat"]="all";}
				if(isset($_POST["budget_min"])){$_SESSION["sbudget"]=$_POST["budget_min"];}else{$_SESSION["sbudget"]="all";}
				}
				print("$('#lefty').load('include/artist_gigs.php');");
			}
			elseif(isset($_GET["profile"]) && $_GET["profile"]=="search")
			{ 
				if(isset($_GET["pages"])){$_SESSION["pages"]=$_GET["pages"];}
				else{$_SESSION["pages"]=1;}
				if(isset($_POST["profile"])){$_SESSION["profile"]=$_POST["profile"];}
				print("
				$('#lefty').load('include/profile_search.php?page=$_SESSION[pages]');"                                );
			}
			else if(isset($_GET["feed"])){ print("$('#lefty').load('include/feed.php?feed=$_GET[feed]');");}
			else if(isset($_GET["thank"])){ print("$('#lefty').load('include/thank.php?rate=1');");}
			else {
				if(!isset($_GET["id"]) && !isset($_GET["gig"])){ 
					//print("$('#lefty').load('include/profile.php');");
					print("$.post('artist/profilepage','',showProfileCallback,'json');");
				}
				else if(isset($_GET["id"])){ print("$('#lefty').load('include/profile.php?id=$_GET[id]');");}
				else if(isset($_GET["gig"])){ print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]');");}
			}
			?>
		</script>
		<!--
			<div id="righty">
				<div class="scroll" style=" background:url('images/scrollup.png') no-repeat; background-position:center;">
					<a href="javascript:;" onClick="scroll('down');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>                            </div>
				<div id="rightyframe" >
				</div>
				<div class="scroll" style=" background:url('images/scrolldown.png') no-repeat; background-position:center;"><a href="javascript:;" onClick="scroll('up');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>                        </div>
			</div>
		-->

		<!-- start menu -->
		<div id="menuFooter" style="background:#000;">
			<ul>
			  <li>
				<a  href="javascript:;" onClick="loadframe('gig');"><h3>Find Gigs</h3></a>
			  </li>
			  <li>
				<a  href="javascript:;" onClick="loadframe('dib');"><h3>Dibs Status</h3></a>
			  </li>
			  <li>
				<a href="javascript:;" onClick="loadframe('left');"><h3>Profile</h3></a>
			  </li>
			  <li>
				<a href="javascript:;" onClick="loadfram();"><h3>Edit Profile</h3></a>
			  </li>
			</ul>
		</div>
		<!-- end menu --> 

	</div> <!--main-container-->
	
    <?	include("include/rightCommon.php");	?>

</body>
</html>
<?
ob_end_flush();
?>