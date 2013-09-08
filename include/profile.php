<html>
 <head>
	<!-- Include the JS files -->
 </head>
 <body>
    <div id="blanket" style="display:none;                            background-color:#111;
                            opacity: 0.65;
                            position:absolute;
                            z-index: 9001;
                            top:0px;
                            left:0px;
                            width:100%;                            height: 100%; "/>
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
 
	<script type="text/javascript">
		$('#loading-indicator').hide();
	</script>

</body>
</html>