<?php
function check($x, $y)
{
    $check = 0;
    if ($y != "" && $x != "") {
        if ($y == $x) {
            $check = 1;
            return  $check;
        } else {
            echo '<p class="error" does not mach </p>';
            return  $check;
        }
    } else {
        echo '<p class="error"> cant be empty </p>';
    }
}
// if ($email == $Remail) {
//     if ($password == $Rpassword) {
//         // pass and email correct 
//         echo "all good";
//         echo "\n";
//         echo "$email | $Remail | $password | $Rpassword | $name | $surname";
//     } else {
//         echo "password don't match";
//     }
// } else {
//     echo "email don't match";
// }
