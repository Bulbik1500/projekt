<?php
session_start();

// Redirect to user panel if already logged in
if (isset($_SESSION['email'])) {
    header('Location: ./userpanel.php');
    exit; // Ensure that script stops execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/errorAndpass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Sign In</h2>
            <p>Enter your credentials to access your account</p>
        </div>
        <div class="social-login">
            <button class="btn google"><i class="fab fa-google"></i> Sign in with Google</button>
            <button class="btn apple"><i class="fab fa-apple"></i> Sign in with Apple</button>
        </div>
        <div class="divider">Or with email</div>
        <form action="../../private/loginsys.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" class="btn">Sign In</button>
        </form>
        
        <?php
        // Display error message if set
        if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']); // Clear the session error after displaying
        }
        ?>

        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
        <div class="signup-link">
            Don't have an account? <a href="SignIn.php">Sign Up</a>
        </div>
    </div>
</body>

</html>
