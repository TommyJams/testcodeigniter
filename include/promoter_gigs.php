<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url();?>style/edit.css'>
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
                                    <?                                                                         
									if($status==1)
                                    {
                                        print("<div class='gigsTableItemContainer'>
												<table width=100% style='text-align:center;'>
													<tr>
														<td width=25%><a href='javascript:;' onClick=gig('$link'); class='highlightRef'><h3>$gig</h3></a></td>
														<td width=25%>$city</td> 
														<td width=10%>$formattedDate </td>
														<td width=10%>$vtime </td>
                                            ");
                                        
                                        $q2 = "SELECT * FROM `$database`.`transaction` WHERE gig_id=$link AND status=1";
                                        $result_set2 = mysql_query($q2);	
                                        if (mysql_num_rows($result_set2) == 1) 
                                        {
                                            $found = mysql_fetch_array($result_set2);
                                            $artist_id=$found["artist_id"];
                                            $artist_name=$found["artist_name"];

											print("<td>");
											$SQLe = "SELECT mobile FROM `$database`.`members` WHERE link=$artist_id";
											$resulte = mysql_query($SQLe);
											while($f = mysql_fetch_assoc($resulte))
											{
												print("<a href='javascript:;' onClick=showProfile('$artist_id'); class ='greenRef'>$artist_name</a><br>Contact: $f[mobile]");
											}
											print("</td></tr></table></div>");
                                        }
                                        else
                                        {
											$linker=15999*$link;
                                            print("<td><a href='reaction.php?linker=$linker' target='$link' onClick=toggleSlide($link); class ='highlightRef'><img src='images/plus.gif' align='right'></a></td></tr></table></div>
                                                    <center><iframe id='$link' name='$link' style='display:none; height:200px; width:50%; background:#ffcc00; overflow-y: auto;'></iframe></center>");
                                        }
                                    }
                                    elseif($status==2)
                                    {
                                        print("<div class='gigsTableItemContainer'>
                                                <table width=100% style='text-align:center;'>
                                                    <tr>
                                                        <td width=25%><a href='javascript:;' onClick=gig('$link');><font size='+2'>$gig </font></a></td>
                                                        <td width=25%>$city</td> 
                                                        <td width=10%>$formattedDate </td>
                                                        <td width=10%>$vtime </td>
                                                        <td><font color=#a00 >Awaiting Email Verification</font></td>                                                                                                            </tr>                                                </table>                                            </div>");                                    }
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