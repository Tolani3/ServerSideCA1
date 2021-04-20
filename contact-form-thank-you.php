<!-- <!DOCTYPE HTML>
<html>

<head>
	<title>Thank you!</title> -->
<!-- define some style elements-->
<!-- <style>
	h1 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 16px;
		font-weight: bold;
	}

	label,
	a,
	body {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}
</style> -->
<!-- a helper script for validating the form-->
<!-- </head>
</head> -->

<script>
	setTimeout(function() {
		window.location.href = 'index.php';
	}, 5000);
</script>

<div class="container">
	<?php
	include('includes/header.php');
	?>

	<body>
		<h1>Thank you!</h1>
		Thank you for submitting the form. We will contact you soon!
		We will return you to the homepage now.

		<?php
		include('includes/footer.php');
		?>
		<!-- </body>

</html> -->