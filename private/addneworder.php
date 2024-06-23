<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
    $receivedVariable = $_POST["product"];
    // Process the received variable here
    // echo "Received variable: " . $receivedVariable;
    session_start();
    include "db.php";
    $email = $_SESSION['email'];
    $description = $_POST['description'];
    // echo $description . " | " . $receivedVariable
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $sql = 'INSERT INTO orders (orderID, email, status, description, servicename ) VALUES (" " ,"' . $email . '" , "Pending" , "' . $description . '", "' . $receivedVariable . '");';
    if ($conn->query($sql) === TRUE) {
        echo '<p class="pass">Order created successfully</p>';
    } else {
        // Output an error message if the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No data received";
}
