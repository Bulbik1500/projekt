<?php
session_start();
include "./db.php";
include "./pas.php";

$email = $_POST['email'];
$password = $_POST['password'];
$password = cezary($password);


$conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
$sql = 'SELECT * FROM users WHERE email="' . $email  . '" AND password="' . $password . '"';


if ($result = @$conn->query($sql)) {
    $howmany_user = $result->num_rows;
    $row = $result->fetch_assoc();
    if ($howmany_user == 1) {
        $admin = $row['admin'];
        if ($admin == 0) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];

            $result->free_result();
            unset($_SESSION['error']);
            header('Location: ../../public/php/userpanel.php');
        } else {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];

            $result->free_result();
            unset($_SESSION['error']);
            header('Location: adminpanel.php');
        }
    } else {
        $_SESSION['error'] = '<p class="error">Błędne hasło lub email</p>';
        header('Location: ../../public/php/login.php');
    }
}
$conn->close();
