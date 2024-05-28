<?php
include 'db.php';
// Create connection
$conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

function get_email($mail)
{
    echo "<p>$mail</p>";
}

get_email($_GET["getMail"]);
