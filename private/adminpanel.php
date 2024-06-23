<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Media</title>
    <link rel="stylesheet" href="../public/styles/userpanel.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script type="text/javascript">
        function go(loc) {
            document.getElementById('calendar').src = loc;
        }
    </script>
</head>

<body>
    <div class="page">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <a href="../public/index.php"><img src="../public/images/logo.png" alt="Logo"></a>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#" onclick="go('userorders.php')"> Orders</a></li>
                    <li><a href="#" onclick="go('../public/php/addorder.php')">New order</a></li>
                    <li><a href="#">Pages</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
        </aside>
        <div class="content">
            <header class="header">
                <div class="header-left">
                    <h1>Admin Dashboard </h1>

                </div>
                <div class="header-right">
                    <?php
                    echo '<p class="btn"> Welcome ' . $_SESSION["name"] . '. </p>';
                    ?>
                </div>
            </header>
            <main class="main-content">
                <iframe id="calendar" src="about:blank" width="1000" height="450" frameborder="0" scrolling="no">



                </iframe>
            </main>
            <footer class="footer">

            </footer>
        </div>
    </div>
</body>

</html>