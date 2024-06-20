<?php
// Function to add a new user to the database
function add_user($email, $password, $name, $surname) {
    // Include the database configuration file and the password hashing file
    include "db.php"; // This file should contain database connection details
    include "pas.php"; // This file should contain the cezary() function for password hashing

    // Create a new connection to the MySQL database using the connection details from db.php
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);

    // Check if there is an existing user with the provided email
    $check = 'SELECT email, password FROM users WHERE email="' . $email . '"';
    $result_check = $conn->query($check);

    // Initialize a counter to check if any results are returned
    $i = 0;
    while ($result_check->fetch_assoc()) {
        $i++; // Increment counter for each existing email found
    }

    // If the email is already in use, output an error message
    if ($i != 0) {
        echo '<p class="error"> taki email ma już przypiasne konto </p>'; // "This email is already associated with an account"
    } else {
        // If the email is not in use, hash the password using the cezary() function
        $result = cezary($password);

        // Prepare the SQL query to insert the new user into the database
        $sql = "INSERT INTO users (email, name, surname, password) VALUES ('$email', '$name', '$surname', '$result');";

        // Execute the SQL query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo '<p class="pass">Account created successfully</p>';
        } else {
            // Output an error message if the query failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Close the database connection
        $conn->close();
    }
}
?>
