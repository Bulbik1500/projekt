<?php
// Function to check if two input values are the same
function check($x, $y) {
    // Initialize a variable to keep track of the check status
    $check = 0;

    // Check if both $x and $y are not empty
    if ($y != "" && $x != "") {
        // If $x and $y are equal, set $check to 1 and return it
        if ($y == $x) {
            $check = 1;
            return $check;
        } else {
            // If $x and $y are not equal, output an error message and return 0
            echo '<p class="error">does not match</p>';
            return $check;
        }
    } else {
        // If either $x or $y is empty, output an error message
        echo '<p class="error">cannot be empty</p>';
    }
}
?>
