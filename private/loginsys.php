<?php
session_start();  // Start PHP session to access session variables
include "./db.php";  // Include database connection file
include "./pas.php";  // Include password hashing function file (assuming cezary() is a hashing function)

$email = $_POST['email'];  // Get email from POST data
$password = $_POST['password'];  // Get password from POST data
$password = cezary($password);  // Hash the password using cezary() function

$conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);  // Create new MySQLi connection object
$sql = 'SELECT * FROM users WHERE email="' . $email  . '" AND password="' . $password . '"';  // SQL query to select user based on email and hashed password

if ($result = @$conn->query($sql)) {
    // Check if query executed successfully
    $howmany_user = $result->num_rows;  // Number of rows returned by the query
    $row = $result->fetch_assoc();  // Fetch the row from the result set
    if ($howmany_user == 1) {
        // If exactly one user found
        $admin = $row['admin'];  // Check if user is admin
        if ($admin == 0) {
            // If user is not admin
            $_SESSION['email'] = $row['email'];  // Store email in session
            $_SESSION['name'] = $row['name'];  // Store name in session
            $_SESSION['surname'] = $row['surname'];  // Store surname in session

            $result->free_result();  // Free the result set
            unset($_SESSION['error']);  // Unset any previous error session variable
            header('Location: ../../public/php/userpanel.php');  // Redirect to user panel page
        } else {
            // If user is admin
            $_SESSION['email'] = $row['email'];  // Store email in session
            $_SESSION['name'] = $row['name'];  // Store name in session
            $_SESSION['surname'] = $row['surname'];  // Store surname in session

            $result->free_result();  // Free the result set
            unset($_SESSION['error']);  // Unset any previous error session variable
            header('Location: adminpanel.php');  // Redirect to admin panel page
        }
    } else {
        // If no user or more than one user found
        $_SESSION['error'] = '<p class="error">Błędne hasło lub email</p>';  // Set error message in session
        header('Location: ../../public/php/login.php');  // Redirect back to login page
    }
}
$conn->close();  // Close the database connection
?>
