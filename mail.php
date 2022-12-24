<?php

$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed";
}

$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}

# construct email

$to = "michelleddavies4@gmail.com";
$subject = $_POST["inquiry"];
$content = $_POST["message"];

$message = "
<html>
<head>
<title>New message from my portfolio website!</title>
</head>
<body>
<p>Name: $name</p>
<p>Email: $email</p>
<p>Subject: $subject</p>
<p>Message: <br>$content<br></p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@michelleddavies.github.io>' . "\r\n";

mail($to,$subject,$message,$headers);


?>