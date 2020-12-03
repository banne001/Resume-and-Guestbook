<?php
/**
 *  305/classnotes/guestbookLogin.php
 *  Blezyl Santos
 *  11/26/2020
 *  Login Page
 */


//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start session
session_start();

//var_dump($_POST);

//Initialize variables
$err = false;
$errMessage = "";
$username = "";
// if he form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    require('guestbookLogin-creds.php');
    // if they are correct
    if($username == $adminUser && $password != $adminPassword){
        $errMessage = "Incorrect Password";
        $err = true;
    }else if($username == $adminUser && $password == $adminPassword){
        // redirect to index page
        $_SESSION['loggedin'] = true;
        header("location: admin.php");
    } else{
        $err = true;
        $errMessage = "Incorrect Login";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container mt-5 w-50">

    <h1>Login Page for Blezyl's Guestbook</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                <?php echo "value = '$username'"?>
            >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <?php
        if($err){
            echo "<span class='err' id='err-text'>$errMessage</span><br>";
        }
        ?>

        <button type="submit" class="btn btn-secondary">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>