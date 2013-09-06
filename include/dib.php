<html>
<head>
	<link rel='stylesheet' href='css/edit.css'>
	<!-- Include the JS files -->

</head>
<body>
<section id="left" style="width:100%">
    <div class="gcontent">
        <div class="head" style="background:#000;">
            <h1>DIBS Status</h1>
        </div>
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
                    <div class='gigsTableItemContainer'>
                        <?php 
                        $dibsHistory = (json_decode($_POST['json'])->dibHistory);
                        foreach($dibsHistory as $row){ ?>
                        <?
                        $gig=$row[0];
                        $city=$row[1];
                        $state=$row[2];
                        $formattedDate=$row[3];
                        $time=$row[4];
                        $statuss=$row[5];

                        print("
                        <table width=100% style='text-align:center;'>
                            <tr>
                                <td width=25%><a href='javascript:;' class='highlightRef' onClick=gig('$link');><h3>$gig</h3></a></td>
                                <td width=25%>$city</td>
                                <td width=10%>$formattedDate</td>
                                <td width=10%>$time</td>
                                <td width=30%>
                        ");
                
                                if($statuss==1)
                                {
                                    print("<a href='#' class='greenRef' style='color:#FFF;'>Accepted</a></td></tr><tr><td colspan=4></td><td><center>");
                                    $SQLe = "SELECT mobile FROM `$database`.`members` WHERE link=$promoter";
                                    $resulte = mysql_query($SQLe);
                                    while ($f = mysql_fetch_assoc($resulte))
                                    {
                                        print("<a href='javascript:;' onClick=showProfile('$promoter'); class='greenRef'>$promoter_name</a><br>Contact: $f[mobile]</center>");
                                    }
                                }
                                elseif($statuss==2)
                                {
                                    print("<a href='#' class='redRef' style='color:#FFF;'>Rejected</a>");
                                }
                                elseif($statuss==4)
                                {
                                    print("<a href='#' class='yellowRef' style='color:#FFF;'>Pending</a>");
                                }
                                print("</td>
                            </tr>
                        </table>");                   
                    ?><?php } ?>
                    </div>
                </span>
        </div> <!--boxy-->
	</div> <!--gcontent-->
</section>

<script type="text/javascript">
	$('#loading-indicator').hide();
</script>

</body>
</html>