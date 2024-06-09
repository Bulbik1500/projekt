<?php
function add_user($email, $password, $name, $surname)
{
 
    include "db.php";
    include "pas.php";
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $check = 'SELECT email, password FROM users WHERE email="' . $email . '"';
    $result_check = $conn->query($check);

    $i = 0;
    while ($result_check->fetch_assoc()) {
        $i++;
    }

    if ($i != 0) {
        echo  '<p class="error"> taki email ma już przypiasne konto </p>';
    } else {
        $result = cezary($password);
        $sql = "INSERT INTO users (email, name, surname, password) VALUES ('$email', '$name', '$surname', '$result');";
        if ($conn->query($sql) === TRUE) {
            echo '<p class="pass">Accound created successfully </p>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
}
