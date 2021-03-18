<?php
$errors = '';
$myemail = 'd00230487@student.dkit.ie'; //<-----Put your DkIT email address here.
if (
	empty($_POST['name'])  ||
	empty($_POST['email']) ||
	empty($_POST['phoneNumber']) ||
	empty($_POST['message'])
) {
	$errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone_number = $_POST['phoneNumber'];
$message = $_POST['message'];

if (!preg_match(
	"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
	$email_address
)) {
	$errors .= "\n Error: Invalid email address";
}

if (!preg_match(
	"/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",
	$phone_number
)) {
	$errors .= "\n Invalid Number!";
}

if (empty($errors)) {
	$to = $myemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. " .
		"Here are the details:\n Name: $name \n Email: $email_address \n PhoneNumber: $phone_number \n Message \n $message";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($to, $email_subject, $email_body, $headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Contact form handler</title>
</head>

<body>
	<!-- This page is displayed only if there is some error -->
	<?php
	echo nl2br($errors);
	?>


</body>

</html>