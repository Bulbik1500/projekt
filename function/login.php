<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
$sql = 'SELECT email, password FROM users WHERE email="' . $email  . '" AND password="' . $password . '"';



if($result = @$conn->query($sql)){
    $howmany_user = $result->num_rows;
    if ($howmany_user > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header('Location: userpanel.php');
        echo '<p class="pass" >login succesfull welcome ' . $row["email"];
        $result->close();
    } else {
        echo "logowanie nie udane";
    }
}else{
    echo "nie udanie połączenie z DB";
}
$conn->close();
