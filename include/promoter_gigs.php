<html>
<head>
	<link rel='stylesheet' href='style/edit.css'>
	<!-- Include the JS files -->

</head>
<body>
    <div id="box" style="display:block; height:100%;">
        <div id="content" class="clearfix">
            <section id="left" style=" width:100%;">
                <div class="gcontent" >
                    <div class="head"><h1>My GIGs</h1></div>
                        <div class="boxy" id="boxy" style="overflow-y:auto;">
							<table width='100%' style='padding: 10px 10px; text-align:center;'>
								<tr bgcolor='#ffcc00' height='30px'>
									<td width="25%"><h1>Name</h1></td>
									<td width="25%"><h1>City</h1></td>
									<td width="10%"><h1>Date</h1></td>
									<td width="10%"><h1>Time</h1></td>
									<td width="30%"><h1>Status</h1></td>
								</tr>
							</table>					
                                    <span class="gigs" style="padding:10px;" >
                                    <? $status = (json_decode($_POST['json'])->status); ?>
                                    <? $gig = (json_decode($_POST['json'])->gig); ?>
                                    <? $city = (json_decode($_POST['json'])->venue_city); ?>
                                    <? $formattedDate = (json_decode($_POST['json'])->venue_date); ?>
                                    <? $vtime = (json_decode($_POST['json'])->venue_time); ?>
                                    <? $num_rows = (json_decode($_POST['json'])->num_rows); ?>
                                    <? $f = (json_decode($_POST['json'])->f); ?>
                                    <? $link = (json_decode($_POST['json'])->link); ?>
                                    <? $linker = (json_decode($_POST['json'])->linker); ?>
                                    <? $artist_name = (json_decode($_POST['json'])->artist_name); ?>
                                    <? $artist_id = (json_decode($_POST['json'])->artist_id); ?>
                                    <?                                                                         
                                    print("<div class='gigsTableItemContainer'>
											<table width=100% style='text-align:center;'>
												<tr>
													<td width=25%><a href='javascript:;' onClick=gig('$link'); class='highlightRef'><h3>$gig</h3></a></td>
													<td width=25%>$city</td> 
													<td width=10%>$formattedDate </td>
													<td width=10%>$vtime </td>
                                        ");   
                                    if ($num_rows == 1) 
                                    {
										print("<td>");
										print("<a href='javascript:;' onClick=showProfile('$artist_id'); class ='greenRef'>$artist_name</a><br>Contact: $f");
										print("</td></tr></table></div>");
                                    }
                                    else
                                    {
                                        print("<td><a href='reaction.php?linker=$linker' target='$link' onClick=toggleSlide($link); class ='highlightRef'><img src='images/plus.gif' align='right'></a></td></tr></table></div>
                                                <center><iframe id='$link' name='$link' style='display:none; height:200px; width:50%; background:#ffcc00; overflow-y: auto;'></iframe></center>");
                                    }
                                    
                                    ?>
                                    </span>
                        </div> <!--boxy--> </div> <!--gcontent--><!--
                 <script>
                    document.getElementById('boxy').style.height=self.innerHeight-200+'px';
                </script>-->
            </section>
        </div> <!--content-->
    </div> <!--box-->

	<script type="text/javascript">
		$('#loading-indicator').hide();
	</script>

</body>
</html>