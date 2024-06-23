<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/userorder.css">
</head>

<body>
    <?php
    session_start();
    include "./db.php";
    $email = $_SESSION['email'];
    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
    $sql = 'SELECT users.email, orders.orderID, orders.email, orders.status, orders.description, orders.servicename,users.name, services.cost FROM orders LEFT JOIN users ON orders.email = users.email LEFT JOIN services ON orders.servicename = services.servicename
    ORDER BY orders.orderID DESC';
    $result = @$conn->query($sql);
        
    while ($row = $result->fetch_assoc()) {
        echo '<div class="orderdiv" style="clear: both;">';
        echo '<div class="orderdata">';
        echo  $row['name'] . ' | ';
        echo '</div>';
        echo '<div class="orderdata">';
        echo  $row['email'] . ' | ';
        echo '</div>';
        echo $row['status'] . ' | ';
        echo '</div>';
        echo '<div class="orderdata">';
        echo  $row['description'] . ' | ';
        echo '</div>';
        echo '<div class="orderdata">';
        echo  $row['servicename'] . ' | ';
        echo '</div>';
        echo '<div class="orderdata">';
        echo  $row['cost'] . "PLN";
        echo '</div>';
        echo '</div>';
    }
    $conn->close();
    ?>

</body>

</html>