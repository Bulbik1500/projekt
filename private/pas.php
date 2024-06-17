<?php
// Function to perform a Caesar cipher encryption on a password
function cezary($password) {
    $text = ""; // Initialize an empty string
    $text = $password; // Assign the input password to the text variable
    $shift = 3; // Define the shift value for the Caesar cipher
    $result = ''; // Initialize the result string where the encrypted password will be stored
    $shift = $shift % 26; // Ensure the shift value is within the range of the alphabet (0-25)

    // Loop through each character in the input text
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i]; // Get the current character

        // Check if the character is an uppercase letter
        if (ctype_upper($char)) {
            // Encrypt the uppercase letter and append to the result string
            $result .= chr(((ord($char) - ord('A') + $shift) % 26) + ord('A'));
        }
        // Check if the character is a lowercase letter
        elseif (ctype_lower($char)) {
            // Encrypt the lowercase letter and append to the result string
            $result .= chr(((ord($char) - ord('a') + $shift) % 26) + ord('a'));
        } else {
            // If the character is not a letter, leave it unchanged and append to the result string
            $result .= $char;
        }
    }

    // Return the encrypted result
    return $result;
}
?>
