<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
    // Check if the request method is POST and if 'product' is set in $_POST
    $receivedVariable = $_POST["product"];  // Store the value of 'product' from $_POST
    // Process the received variable here

    // Start a session to access session variables
    session_start();
    
    // Include the database connection file
    include "db.php";
    
    // Retrieve the email from the session variable
    $email = $_SESSION['email'];
    
    // Retrieve the description from $_POST
    $description = $_POST['description'];
    
    // Connect to the database using mysqli
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    
    // SQL query to insert data into the 'orders' table
    $sql = 'INSERT INTO orders (orderID, email, status, description, servicename) VALUES ("", "' . $email . '", "Pending", "' . $description . '", "' . $receivedVariable . '");';
    
    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, display success message
        echo '<p class="pass">Order created successfully</p>';
    } else {
        // If there's an error with the query, display the error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the request method is not POST or 'product' is not set in $_POST
    echo "No data received";
}
?>
