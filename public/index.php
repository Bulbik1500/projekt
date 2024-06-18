<?php
$page =  isset($_GET['page']) ? $_GET['page'] : "home";
$folder = "php/";
$files = glob($folder . "*.php");
$file_name = $folder . $page . ".php";
// print_r($file_name);

if (in_array($file_name, $files)) {
    include($file_name);
} else {
    include "php/404.php";
}
