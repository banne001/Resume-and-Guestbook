<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Practice</title>
</head>
<body>
<?php
$to = "blezylsantos@gmail.com";
$subject = "Resume Inquiry";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$headers = "Name: $name <$email>";

$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if (!preg_match($email_exp, $email)) {
    $error_message .= 'The Email address you entered does not appear to be valid.<br>';
}



// create email headers

$sent = mail($to, $subject, $message,$headers);
var_dump($_POST);
if ($sent) {

    echo "<html>
    <head>
        <title>Thank You</title>
    </head>
    <body>
    <h1>Thank You</h1>
    <p>Thank you for your message $name</p>
    <p>$message</p>
    </body>
    </html>";

} else {
    echo
    "<head>
        <title>Something went wrong</title>
    </head>
    <body>
    <h1>Something went wrong</h1>
    <p>We could not send your feedback. Please try again.</p>";
}
?>

</body>
</html>
