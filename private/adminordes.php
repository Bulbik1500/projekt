<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
=======
    <link rel="stylesheet" href="../../public/styles/userorder.css">
    <script>
        var dataToSend = "variableName=" + encodeURIComponent(variableValue);

        // Prepare the data to send
        var xhr = new XMLHttpRequest();

        // Create a new XMLHttpRequest object
        xhr.open("POST", "/updateorder.php", true);

        // Specify the request method, PHP script URL, and asynchronous
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Set the content type
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {

                // Check if the request is complete
                if (xhr.status === 200) {

                    // Check if the request was successful
                    console.log(xhr.responseText);
                    // Output the response from the PHP script
                } else {
                    console.error("Error:", xhr.status);
                    // Log an error if the request was unsuccessful
                }

            }

        };

        xhr.send(document.getElementById("adminpanel").value);
        xhr.send(document.getElementById("statuspanel"));

        // Send the data to the PHP script
    </script>
</head>

<body>
    <form action="updateorder.php" method="post">
        <select id="adminpanel" name="adminpanel" onchange="getvalue()">
            <?php
            session_start();
            include "./db.php";
            $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
            $sql = 'SELECT users.email, orders.orderID, orders.email, orders.status, orders.description, orders.servicename,users.name, services.cost FROM orders LEFT JOIN users ON orders.email = users.email LEFT JOIN services ON orders.servicename = services.servicename
                    ORDER BY orders.orderID DESC';

            $result = @$conn->query($sql);

            for ($i = 1; $result->num_rows >= $i; $i++) {
                $row = $result->fetch_assoc();
                echo '<option value="' . $row['orderID'] . '">' . $row['email'] . " | " . $row['name'] . " | " . $row['servicename'] . " | " . $row['cost'] . " | " . $row['description'] . " | " . $row['status'] . '</option>';
            }
            $conn->close();
            ?>
        </select>

        <select id="statuspanel" name="statuspanel" onchange="getvalue()">
            <?php
            $conn2 = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
            $sql2 = 'SELECT * FROM status';
            $result2 = @$conn2->query($sql2);
            for ($i = 1; $result2->num_rows >= $i; $i++) {
                $row2 = $result2->fetch_assoc();
                echo '<option value="' . $row2['status'] . '">' . $row2['status'] . '</option>';
            }
            ?>
        </select>

        <button type="submit">Update</button>
    </form>





>>>>>>> afb8afa4202ac1912ebee93bb888a932c9a320b0
</body>

</html>
