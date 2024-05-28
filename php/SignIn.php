<?php
include "db.php";

$email = $_GET["Email"];
$Remail = $_GET["Remail"];
$password = $_GET["password"];
$Rpassword = $_GET["Rassword"];
$name = $_GET["name"];
$surname = $_GET["surname"];

if ($email == $Remail) {
    if ($password == $Rpassword) {
        // pass and email correct 
        echo "all good";
    } else {
        echo "password don't match";
    }
} else {
    echo "email don't match";
}
