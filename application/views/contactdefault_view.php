<html>

	<head>

	</head>

	<body>

	<ul>
		<?php foreach ($contactdetails as $key):?>		
		<div><b>Name</b>: <?php echo $key['contact-form-name']; ?></div>
		<div><b>E-mail</b>: <?php echo $key['contact-form-mail']; ?></div>
		<div><b>Message</b>: <?php echo nl2br($key['contact-form-message']); ?></div>

		<?php endforeach;?>
	</ul>


	</body>

</html>
