<?php

/*
 * Blezyl Santos
 * orders.php
 * Display an order summary
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['loggedin'])) {

    //Redirect to login
    header("location: guestbookLogin.php");
}
//Include files

// Connect to the Database
require ($_SERVER['HOME'] . '/dbcreds.php');


//$cnxn = @mysqli_connect($hostname, $username, $password, $database)
//or die("There was a problem");
//var_dump($cnxn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BootStrap Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Personal Style -->
    <link rel="stylesheet" href="styles/guestbook.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" >
    <title>Admin Guestbook</title>
    <!--favicon -->
    <link rel="icon" type="image/png" href="images/blank.png">
    <!--Icons made by
    <a href="https://www.flaticon.com/authors/freepik" title="Freepik">
        Freepik</a> from
    <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>-->
</head>
<body>

<div class="container" id="main">
    <div class="d-flex bg-light px-5 py-2" >
        <h1><a href="http://blezylsantos.greenriverdev.com/305/classNotes/guestbook.html">Guest List</a></h1>
        <h5 class="ml-auto pt-3"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></h5>

    </div>
    <br>
    <div>
        <table id="order-table" class="display" style="width:100%; overflow-x: scroll">
            <thead>
            <tr>
                <td>Gid</td>
                <td>Name</td>
                <td>Email</td>
                <td>Job</td>
                <td>Company</td>
                <td>Linkedin</td>
                <td>How we met</td>
                <td>Other Message</td>
                <td>Message</td>
                <td>Mailing List</td>
                <td>Preferred Email format</td>
                <td>Submitted Date</td>
            </tr>
            </thead>
            <tbody>


            <?php
            $sql = "SELECT * FROM `guestbook`";
            $result = mysqli_query($cnxn, $sql);
            //var_dump($result);

            foreach ($result as $row) {
                //var_dump($row);
                $gid = $row['gid'];
                $fullname = $row['fname'] . " " . $row['lname'];
                $email = $row['email'];
                $job = $row['job'];
                $company = $row['company'];
                $linkedIn = $row['linkedin'];
                $met = $row['met'];
                $other = $row['other'];
                $message = $row['message'];
                $mailingList = $row['mailingList'];
                $emailFormat = $row['emailFormat'];
                $submit_date = date("M d, Y g:i a", strtotime($row['submitDate']) );

                echo "<tr>";
                echo "<td>$gid</td>";
                echo "<td>$fullname</td>";
                echo "<td>$email</td>";
                echo "<td>$job</td>";
                echo "<td>$company</td>";
                echo "<td>$linkedIn</td>";
                echo "<td>$met</td>";
                echo "<td>$other</td>";
                echo "<td>$message</td>";
                echo "<td>$mailingList</td>";
                echo "<td>$emailFormat</td>";
                echo "<td>$submit_date</td>";
                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>

</div>
<br><br>
<div class="container">
    <a href="http://blezylsantos.greenriverdev.com/305/classNotes/guestbook.html">Guestbook Page</a>
</div>

<br><br><br>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/pizza.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>

    $('#order-table').DataTable( {
        "order": [[ 0, "desc" ]],
        "scrollX": true
    } );

</script>

</body>
</html>