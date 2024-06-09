<?php
function cezary($password){
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
        return $result;
}
?>