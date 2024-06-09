<?php
function add_user($email, $password, $name, $surname)
{
    $text = "";
    $text = $password;
    $shift = 3;
    $result = '';
    $shift = $shift % 26; // Aby uniknąć dużych przesunięć

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        // Sprawdź, czy litera jest wielka
        if (ctype_upper($char)) {
            $result .= chr(((ord($char) - ord('A') + $shift) % 26) + ord('A'));
        }
        // Sprawdź, czy litera jest mała
        elseif (ctype_lower($char)) {
            $result .= chr(((ord($char) - ord('a') + $shift) % 26) + ord('a'));
        } else {
            // Jeśli to nie litera, pozostaw bez zmian
            $result .= $char;
        }
    }
    include "db.php";
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
        $sql = "INSERT INTO users (email, name, surname, password) VALUES ('$email', '$name', '$surname', '$result');";
        if ($conn->query($sql) === TRUE) {
            echo '<p class="pass">Accound created successfully </p>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
}
