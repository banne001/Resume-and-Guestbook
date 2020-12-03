<?php

//echo "<p>guestFunctions.php is loaded</p>";

function validName($name)
{
    return !empty($name); //&& ctype_alpha($name);
}

function validMet($met)
{
    return !($met == "none");
}
function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validurl($url){
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url);
}