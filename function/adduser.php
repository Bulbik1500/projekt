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
       $sql = "INSERT INTO users (email, name, surname, password) VALUES ('$email', '$name', '$surname', '$result');";
      if ($conn->query($sql) === TRUE) {
       echo "Accound created successfully";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         }
     $conn->close();
}
