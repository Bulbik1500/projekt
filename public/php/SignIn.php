<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../../private/adduser.php";
    include "../../private/check.php";

    // Handle form submission and validation
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate email fields
        $mail_check = check(@$_POST["email"], @$_POST["Confirm_email"]);
        
        // Validate password fields
        $pass_check = check(@$_POST["password"], @$_POST["confirm_password"]);

        // If both email and password checks pass, proceed with adding user
        if ($pass_check == 1 && $mail_check == 1) {
            add_user($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]);
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/singin.css">
    <link rel="stylesheet" href="../styles/errorAndpass.css">

</head>

<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <div class="social-login">
            <button class="btn google">Sign in with Google</button>
            <button class="btn apple">Sign in with Apple</button>
        </div>
        <div class="divider">Or with email</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- Email inputs with error handling -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="email" name="Confirm_email" placeholder="Confirm Email" required>

            <!-- Password inputs with error handling -->
            <input type="password" name="password" minlength="8" placeholder="Password" required>
            <input type="password" name="confirm_password" minlength="8" placeholder="Confirm Password" required>
            <p class="hint">Use 8 or more characters with a mix of letters, numbers & symbols.</p>

            <!-- Name and surname inputs -->
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="surname" placeholder="Surname" required>

            <!-- Terms checkbox -->
            <label>
                <input type="checkbox" name="terms" required> I Accept the Terms
            </label>

            <!-- Submit button -->
            <button type="submit" class="btn">Sign Up</button>
        </form>

        <!-- Link to login page -->
        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</body>

</html>
