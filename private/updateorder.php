<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adminpanel"])) {
    $receivedVariable = $_POST["adminpanel"];
    $receivedVariable2 = $_POST["statuspanel"];

    // Process the received variable here
    // echo "Received variable: " . $receivedVariable;
    // echo "Received variable: " . $receivedVariable2;

    session_start();
    include "db.php";
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $sql = 'UPDATE orders SET status = "' . $receivedVariable2 . '" WHERE orderID = "' . $receivedVariable . '"';
    if ($conn->query($sql) === TRUE) {
        echo '<p class="pass">Order Updated successfully</p>';
    } else {
        // Output an error message if the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No data received";
}
