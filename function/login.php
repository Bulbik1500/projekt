<?php
function login($email, $password)
{
    // echo "$email | $password";
    include "db.php";
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $sql = 'SELECT email, password FROM users WHERE email="'.$email.'" AND password="'.$password.'"';
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "login succesfull welcome " . $row["email"];
    }
    $conn->close();
}
