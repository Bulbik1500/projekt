<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../styles/userorder.css">
</head>

<body>
<?php
    session_start();
    include "../function/db.php";
    $email = $_SESSION['email'];
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $sql = 'SELECT orders.orderID, orders.email, orders.status, orders.description, orders.servicename, orders.cost , users.name FROM orders LEFT JOIN users ON orders.email = users.email
    WHERE orders.email = "'.$email.'" ORDER BY orders.orderID DESC';
    $result = @$conn->query($sql);

    while ($row = $result->fetch_assoc()){
    echo '<div class="orderdiv" style="clear: both;">';
        echo '<div class="orderdata">';
          echo $row['status'].' | ';
        echo '</div>';
        echo '<div class="orderdata">';
            echo  $row['description'].' | ';
        echo '</div>';
        echo '<div class="orderdata">';
            echo  $row['servicename'].' | ';
        echo '</div>';
        echo  $row['cost'] . "PLN";
        echo '</div>';
    echo '</div>';
    }
    $conn-> close();
    ?>

</body>

</html>