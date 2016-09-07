<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>contact</title>
</head>

<body>

<?php

$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["telephone"];
$comment = $_POST["comments"];
$subject = "Web Contact Form";

//Enter your email address
$to = "crector@butler.edu";


//Prepare Email Body Text
	$Body = "";
	$Body .= "Name: ";
	$Body .= $firstName . ' ' . $lastName;
	$Body .= "\n";
	$Body .= "Phone Number: ";
	$Body .= $phone;
	$Body .= "\n";
	$Body .= "Email: ";
	$Body .= $email;
	$Body .= "\n";
	$Body .= "Comments: ";
	$Body .= $comment;
	$Body .= "\n";
	
//Send Email
$send_contact= mail($to,$subject,$Body);
if($send_contact) {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=Thanks.php\">";
}
 else {
	 print "<meta http-equiv=\"refresh\" content=\"0;URL=ContactError.html\">";
}
?>


            
</body>
</html>

