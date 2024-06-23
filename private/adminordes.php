<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/adminorder.css">
    <title>Zamówienia</title>
</head>

<body>
    <?php
    session_start();
    include "./db.php";

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        echo "Użytkownik nie jest zalogowany.";
        exit();
    }

    $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);

    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $sql = 'SELECT users.name, users.email, orders.orderID, orders.status, orders.description, orders.servicename, services.cost 
            FROM orders 
            LEFT JOIN users ON orders.email = users.email 
            LEFT JOIN services ON orders.servicename = services.servicename
            ORDER BY orders.orderID DESC';

    echo '<div class="container">';
    echo '<h1>Zamówienia</h1>';
    echo '<table>';
    echo '<thead><tr><th>Imię</th><th>Email</th><th>Status</th><th>Opis</th><th>Usługa</th><th>Koszt (PLN)</th></tr></thead>';
    echo '<tbody>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['status']) . '</td>';
            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
            echo '<td>' . htmlspecialchars($row['servicename']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cost']) . ' PLN</td>';
            echo '</tr>';
        }
        $result->free();
    } else {
        echo '<tr><td colspan="6">Błąd: ' . $conn->error . '</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    $conn->close();
    ?>
</body>

</html>
