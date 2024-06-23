<?php
session_start();  // Start PHP session to access session variables
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Media</title>
    <link rel="stylesheet" href="../public/styles/userpanel.css">  <!-- Link to custom stylesheet -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  <!-- Link to Google Fonts -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>  <!-- Include jQuery library -->
    <script type="text/javascript">
        // JavaScript function to change iframe source dynamically
        function go(loc) {
            document.getElementById('calendar').src = loc;
        }
    </script>
</head>

<body>
    <div class="page">
        <!-- Main container for the page -->
        <aside class="sidebar">
            <!-- Sidebar section -->
            <div class="sidebar-logo">
                <a href="../public/index.php"><img src="../public/images/logo.png" alt="Logo"></a>  <!-- Link to homepage with logo -->
            </div>
            <nav class="sidebar-nav">
                <!-- Navigation menu -->
                <ul>
                    <li><a href="#" onclick="go('adminordes.php')"> Orders</a></li>  <!-- Link to admin orders page -->
                    <li><a href="#" onclick="go('../public/php/addorder.php')">New order</a></li>  <!-- Link to add new order page -->
                    <li><a href="#">Pages</a></li>
                    <li><a href="../public/php/logout.php">Logout</a></li>  <!-- Link to logout script -->
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>
        <div class="content">
            <!-- Main content area -->
            <header class="header">
                <!-- Header section -->
                <div class="header-left">
                    <h1>Admin Dashboard </h1>  <!-- Heading for the admin dashboard -->
                </div>
                <div class="header-right">
                    <?php
                    echo '<p class="btn"> Welcome ' . $_SESSION["name"] . '. </p>';  // Display welcome message with username
                    ?>
                </div>
            </header>
            <main class="main-content">
                <!-- Main content section -->
                <iframe id="calendar" src="about:blank" width="1000" height="450" frameborder="0" scrolling="no">
                    <!-- Initially blank iframe, will change src dynamically -->
                </iframe>
            </main>
            <footer class="footer">

            </footer>
        </div>
    </div>
</body>

</html>
